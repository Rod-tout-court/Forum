<?php
    require_once("fonctions_support.php");
    if(!isset($_SESSION)){
    session_start();
    }

    $msg_id=$_GET["msg_id"];

    if(isset($_SESSION["username"]))
    {
    $contenu="<form action=\"creer_msg.php?msg_id=$msg_id\" method=\"post\">
    <div>
        <input type=\"radio\" name=\"identite\" id=\"ID\" value=\"public\" checked> Publier sous mon nom <br>
        <input type=\"radio\" name=\"identite\" id=\"ID\" value=\"anon\"> Anonyme
    </div>
    <div id=\"div_message\">
        <label for=\"message\">Message</label><br>
        <textarea name=\"msg\" name=\"message\" id=\"message\" cols=\"30\" rows=\"10\"></textarea>
    </div>
    <input type=\"submit\" value=\"Envoyer\">
    </form>";
    }

    else{
        $contenu="<p>Vous devez être connecté pour répondre</p>";
    }
    build_page("Nouveau fil",$contenu);
?>