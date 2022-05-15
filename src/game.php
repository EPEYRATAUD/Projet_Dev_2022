<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Nombre mystère</title>
</head>
<?php include 'header.php';?>



<?php
if (!isset($_POST["guess"])) {
     $_SESSION["count"] = 0; //Initialiser le nombre
     $message = "Bienvenue dans le jeu du nombre mystère!";
     $_POST["numToGuess"] = rand(0,1000);
     echo("Voici le nombre à deviner : ");
     echo $_POST["numToGuess"];
} else if ($_POST["guess"] > $_POST["numToGuess"]) { //greater than
    $message = $_POST["guess"]." C'est trop grand. Essayez un nombre plus petit !";
    $_SESSION["count"]++; //Déclare la variable $count à incrémenter de 1.

} else if ($_POST["guess"] < $_POST["numToGuess"]) { //less than
    $message = $_POST["guess"]." C'est trop petit. Essayez un nombre plus grand !";
    $_SESSION["count"]++; //Déclare la variable $count à incrémenter de 1.

} else { // doit être équivalent
    $_SESSION["count"]++;
    $message = "Bien joué! Vous avez deviné le nombre mystère en ".$_SESSION["count"]." essai(s)!"; 
    unset($_SESSION["count"]);
        //Inclue la variable $count dans le $message pour montrer à l’utilisateur combien d’essais l’ont pris.
}
?>
<html>
    <head>
        <title>A PHP number guessing script</title>
    </head>
    <body>
    <h1><?php echo $message; ?></h1>
        <form action="" method="POST">
        <p><strong>Entrez votre nombre ici:</strong>
            <input type="text" name="guess"></p>
            <input type="hidden" name="numToGuess" 
                   value="<?php echo $_POST["numToGuess"]; ?>" ></p>
    <p><input type="submit" value="Envoyer votre nombre !"/></p>
        </form>
    </body>
</html>
