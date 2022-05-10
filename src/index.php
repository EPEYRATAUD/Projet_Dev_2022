<?php 
    session_start();

    if (isset($_SESSION['username'])) {
        $sUsername = $_SESSION['username'];
    }
    else {
        $sUsername = NULL;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Accueil</title>
</head>
<body>
    <!-- On inclut le header -->
    <?php include 'header.php';?>
    <h1>The mystery game</h1>

    <!-- Si l'utilisateur est connecté -->
    <?php
        if($sUsername != null) {
            echo "Tu es connecté en tant que ", $sUsername; ?>
            <div>
                <br>
                <a href="logout.php">Se déconnecter</a>
                <hr>
                <a href="game.php">Jouer au jeu</a>
            </div>
    <!-- Si l'utilisateur n'est pas connecté -->
    <?php
        } else {
            echo "Tu n'es pas connecté."; ?>
            <a href="login.php">Se connecter !</a>
    <?php   
        }
    ?>
</body>
</html>