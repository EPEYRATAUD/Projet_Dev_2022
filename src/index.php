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
<title>Accueil</title>
</head>
<body>
    <div class="topnav">
        <a class="active" href="#home">Home</a>
        <a href="#news">News</a>
        <a href="#contact">Contact</a>
        <a href="#about">About</a>
    </div>
    <h1>The mystery game</h1>

    <?php 
        if($sUsername != null) {
            echo "Salut, tu es connecté en tant que ", $sUsername; ?>
            <a href="logout.php">Se déconnecter</a>
    <?php
        } else {
            echo "T pas co gang"; ?>
            <a href="login.php">Login</a>
    <?php   
    
        }
    ?>





</body>
</html>