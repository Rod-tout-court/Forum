<?php
    require_once("fonctions_bdd.php");
    if(!isset($_SESSION)){
        session_start();
    }
    $msg_id = $_GET["msg_id"];

    $id=$_SESSION["user_id"];
    $identite=$_POST["identite"];
    $message=$_POST["msg"];

    if($identite=="public"){
        $link=connexion();
        $id=$link->real_escape_string($id);
        $message=$link->real_escape_string($message);
        
        #recherche du message et du fil auquel on doit répondre
        $sql="SELECT fil_id FROM message WHERE msg_id=$msg_id";
        $request = $link->query($sql);
        $id_fil = mysqli_fetch_row($request);
        echo "id_fil = $id_fil";
        $id_fil=$id_fil[0];
        ajouter_mesg($link, $message, $id_fil, $id);
        $link->close();
    }

    header("Location: http://localhost/fils.php?id_fil=$id_fil");
?>