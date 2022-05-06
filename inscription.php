<?php

    require_once("fonctions_comptes.php");
    $username = $_POST["username"];
    $pass = $_POST["pass"];
    $email = $_POST["email"];

    if (creer_compte($username, $email, $pass)){
        session_start();
        $_SESSION["username"]=$username;
        header("Location: http://localhost/");
        exit();
    }

    else{
        echo "Erreur dans la création du compte";
    }
?>