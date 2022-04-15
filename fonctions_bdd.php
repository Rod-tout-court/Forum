<?php
require_once("fonctions_support.php");
require_once("fonctions_comptes.php");

    function connexion(){
        $link = mysqli_connect("localhost", "root", "", "forum");
        return $link;
    }

    
?>