<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Nombre mystère</title>
</head>
<?php 

include('header.php');
include('server.php');

$userEmail = '';
$userPasswd = '';
$userName = '';
$error = '';

$sessionName = $_SESSION['username'];
$query = mysqli_query($db, "SELECT * FROM users WHERE username = '".$sessionName."'");
$user = mysqli_fetch_array($query);
$userEmail = $user['email'];
$userPasswd = $user['password'];
$userName = $user['username'];

if ($sessionName == 'admin') {
  $pfp = "https://cdn.discordapp.com/attachments/758664515872096284/975541657560821760/unknown.png";
} else $pfp = "https://cdn.discordapp.com/attachments/758664515872096284/975541657560821760/unknown.png";

if (isset($_POST['edit'])) {
  $newUser = mysqli_real_escape_string($db, $_POST['Pseudo_2']);
  $newEmail = mysqli_real_escape_string($db, $_POST['Email_2']);
  $newPass1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $newPass2 = mysqli_real_escape_string($db, $_POST['password_2']);
  $updatedPass = md5($newPass1);

  if (!empty($newUser)) {
      $db->query("UPDATE users SET username = '".$newUser."' WHERE username = '".$sessionName."'");
      $_SESSION['username'] = $newUser;
      header('Location:profile.php');  
  }

  if (!empty($newEmail)) {
    $db->query("UPDATE users SET email = '".$newEmail."' WHERE username = '".$sessionName."'");
    $_SESSION['email'] = $newUser;
    header('Location:profile.php');
  }

  if (!empty($newPass1 && !empty($newPass2))) {
    if ($newPass1 != $newPass2) {
      echo "Les mots de passe doivent correspondre.";
    }

    if ($newPass1 == $userPasswd) {
      echo "Votre mot de passe ne doit pas être le même que l'ancien.";
    }  
  
    if ($newPass1 == $newPass2) {
      $db->query("UPDATE users SET Password = '".$updatedPass."' WHERE username = '".$sessionName."'");
      header('Location:profile.php');
    }
  }
} 

?>

<html>
  <head>
    <title>Profil</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body style="text-align:center; position:center;">
    <div text-align: center class="card" style="width: 18rem; margin-left: auto; margin-right: auto; width:30em">
      <img class="card-img-top" src="<?php echo $pfp ?>" alt="Image de profil">
      <div class="card-body">
        <h5 class="card-title">Votre Profil</h5>
        <p class="card-text">Vous pouvez consulter et modifier vos informations de compte dans cette section</p>
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">Pseudo: <?php echo $userName ?></li>
        <li class="list-group-item">E-mail: <?php echo $userEmail ?></li>
      </ul>
      <div class="card-body">
        <form method="post" action="profile.php">
          <input type="text" placeholder="Nouveau pseudo" name="Pseudo_2">
          <input type="text" placeholder="Nouvelle adresse Mail" name="Email_2">
          <br><br>
          <input type="password" placeholder="Nouveau mot de passe" name="password_1">
          <input type="password" placeholder="Confirmez votre mot de passe" name="password_2">
          <br><br>
          <button type="submit" name="edit">Modifier</button>
        </form>
      </div>
      <?php echo $error?>
    </div><br><br>

    <hr>
  </body>
</html>