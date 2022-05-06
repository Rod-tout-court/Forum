<?php

    require_once("fonctions_comptes.php");
    require_once("fonctions_support.php");
    $username = $_POST["username"];
    $pass = $_POST["pass"];

    if (se_connecter($username, $pass)){

        header("Location: http://localhost/");
    }

    else{
        echo "Erreur de connexion: $username@$pass";
    }
?>