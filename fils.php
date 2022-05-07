<?php
    require_once("fonctions_support.php");
    require_once("fonctions_bdd.php");
    $id_fil = $_GET["id_fil"];
    $link=connexion();

    $sql_titre = "SELECT title FROM fil WHERE fil_id=$id_fil";
    $result = $link->query($sql_titre);
    $titre = mysqli_fetch_row($result);
    $titre = $titre[0];
    $content="<h2>$titre</h2>";

    $sql="SELECT publication, content, pseudo, msg_id FROM message
        INNER JOIN fil ON message.fil_id=fil.fil_id
        INNER JOIN utilisateur ON utilisateur.user_id=message.user_id
        WHERE fil.fil_id=$id_fil
        ORDER BY msg_id ASC";

    $result=$link->query($sql);
    $content.="<table id=\"message\">";
    while($row = mysqli_fetch_row($result)){
        $date=$row[0];
        $message=$row[1];
        $pseudo=$row[2];
        $msg_id=$row[3];
        $content.="<tr id=\"entete\"><td>$pseudo</td></tr>
                    <tr><td>$message</td></tr>
                    <tr><td id=\"repondre\"><a href=\"repondre.php?msg_id=$msg_id\">+répondre</td></tr>";
    }
    $content .= "</table>";
    build_page($titre, $content);
    $link->close();
?>