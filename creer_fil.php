<?php
    require_once("fonctions_bdd.php");
    if(!isset($_SESSION)){
        session_start();
    }
    $id=$_SESSION["user_id"];
    $titre=$_POST["titre"];
    $identite=$_POST["identite"];
    $message=$_POST["msg"];

    if($identite=="public"){
        $link=connexion();
        $id=$link->real_escape_string($id);
        $titre=$link->real_escape_string($titre);
        $message=$link->real_escape_string($message);

        #Création du fil
        $sql="INSERT INTO fil (title, user_id, salon_id) VALUES ('$titre', $id, 1);";
        $link->query($sql);

        #Insertion du message dans le fil
        $max_id=$link->query("SELECT MAX(fil_id) FROM fil");
        $max_id = mysqli_fetch_row($max_id);
  
        ajouter_mesg($link, $message, $max_id[0], $id);
        $link->close();
    }

    header("Location: http://localhost");
?>