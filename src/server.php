<?php

if(!isset($_SESSION)) { 
    session_start(); 
} 
?>
<?php
// *********************************** Initialiser les variables ***********************************

$username = "";
$email    = "";
$errors = array(); 
$connexion = '';
$disconnected = '';


// *********************************** Connexion à la base de donnée ***********************************

$db = mysqli_connect('localhost', 'root', '', 'mysterynumber');

// *********************************** Vérification utilisateur connecté ***********************************

if (!isSet($_SESSION['username'])) {
  $disconnected = "Vous n'êtes pas connecté ! \n";
  $connexion = " <a href='../authentification/login.php'>Se connecter</a>";
}

// *********************************** Inscription d'un utilisateur ***********************************

if (isset($_POST['reg_user'])) {
  // On récupère le contenu des champs remplis par l'utilisateur.
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  // Vérifier si les champs sont remplis + vérif mdp confirmation
  if (empty($username) OR empty($password_1) OR empty($password_2) OR empty($email)) { 
    echo "Tous les champs ne sont pas rempli !"; 
  } elseif ($password_1 != $password_2) {
    echo "Les mots de passe ne correspondent pas !"; 
  } else {
    if (!$user) { 
      if ($user['username'] === $username) {
        echo "Pseudo déjà utilisé !";
      }
      if($user['email'] === $email) {
          echo "Cet adresse mail est déjà utilisée !";
      } 
      else {
          // On chiffre le mot de passe avant de l'enregistrer dans la base de données
          $password = md5($password_1);
          // On prépare puis on éxécute une requète pour insèrer le contenu des champs + le pwd chiffré dans la base de données
          $query = "INSERT INTO users (username, passwod, email ) VALUES('$username', '$password', '$email')";
          mysqli_query($db, $query);
        
          $_SESSION['username'] = $username;
          $_SESSION['success'] = "Vous êtes maintenant connectés !";
          header('location: ../index.php');
        }
      }  
  }

  // On vérifie dans la base de données si
  // Un utilisateur existe déjà avec le même username ou mail

}