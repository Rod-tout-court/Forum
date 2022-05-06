<?php
require_once("fonctions_support.php");
require_once("fonctions_comptes.php");

    function connexion(){
        $link = mysqli_connect("localhost", "root", "", "forum");
        return $link;
    }

    function ajouter_mesg($link, $message, $id_fil, $id_user){
        $sql="INSERT INTO message (content, user_id, fil_id) VALUES ('$message',$id_user ,$id_fil)";
        $link->query($sql);
    }
?>