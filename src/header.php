<?php 
    if(!isset($_SESSION)) { 
        session_start(); 
    } 
    if (isset($_SESSION['username'])) {
        $sUsername = $_SESSION['username'];
        $sMail = $_SESSION['email'];
        $sAvatar = $_SESSION['avatar'];
    }
    else {
        $sUsername = NULL;
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<div class="topnav">
    <!-- Si l'utilisateur est connecté -->
    <?php if($sUsername != null) { ?>
        <a class="active" href="index.php">Accueil</a>
        <a href="logout.php">Se déconnecter</a>
        <a href="profile.php">Mon profil</a>
    <!-- Si l'utilisateur n'est pas connecté -->
    <?php } else { ?>
        <a class="active" href="index.php">Accueil</a>
        <a href=login.php>Se connecter !</a>
        <a href="register.php">S'inscrire</a>
    <?php   
        }
    ?>
</div>
