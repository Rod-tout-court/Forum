<?php

    require_once("fonctions_comptes.php");
    require_once("fonctions_support.php");
    $username = $_POST["username"];
    $pass = $_POST["pass"];

    if (se_connecter($username, $pass)){
        session_start();
        $_SESSION["username"]=$username;

        header("Location: http://localhost/Forum/Forum");
    }

    else{
        echo "Erreur de connexion: $username@$pass";
    }
?>