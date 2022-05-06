<?php
    require_once("fonctions_support.php");
    if(!isset($_SESSION)){
    session_start();
    }

    if(isset($_SESSION["username"]))
    {
    $contenu="<form action=\"creer_fil.php\" method=\"post\">
    <div id=\"div_titre\">
        <label for=\"titre_fil\">Titre</label><br>
        <input type=\"text\" maxlength=\"40\" name=\"titre\" id=\"titre_fil\"><br>
    </div>
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
        $contenu="<p>Vous devez être connecté pour créer un nouveau fil</p>";
    }
    build_page("Nouveau fil",$contenu);
?>