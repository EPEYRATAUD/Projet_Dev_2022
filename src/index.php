<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Accueil | MysteryGame</title>
    <link rel="stylesheet" href="css/<?php echo $joursite?>">
</head>
<body>
    <!-- On inclut le header -->
    <?php include 'header.php';?>
    <!-- Si l'utilisateur est connecté -->
    <?php
    if($sUsername != null) {?>
        <div text-align: center;>
            <strong>
                <br>
                <?php
                echo "Tu es connecté en tant que '",$sUsername,"'" ?>
                <br><br>
                <a href="logout.php">Se déconnecter</a>
                <br><br>
                <hr>
            </strong>
        </div>
    <h1> <?php
        $jour = date("d");
        $mois = date("m");
        $annee = date("Y");
    ?></h1>
    <div text-align: center;>
        <strong>
            <?php Print("Date du jour : $jour-$mois-$annee"); ?>
        </strong>
    </div>
    <?php 
    $heure = date("H");
    if($heure > 7 && $heure < 19) {
        $joursite = "style.css";
    } 
    else {
        $joursite = "style2.css";
    }    
    ?>
    <div text-align: center;>
        <h1>The mystery game</h1>
        <a href="game.php">Jouer au jeu</a>
    </div>

    <!-- Si l'utilisateur n'est pas connecté -->
    <?php
        } else {
            echo "Tu n'es pas connecté."; ?>
            <a style="font-size:200%;"href="login.php">Se connecter !</a>
    <?php   
        }
    ?>
    <footer>
        <br><br><br><br><br><br><br><br><br><br><br><br>
        <h1>Voici la météo du jour pour la ville de :</h1>
        <img src ="https://www.prevision-meteo.ch/uploads/widget/bordeaux_1.png">
    </footer>
</body>
</html>
