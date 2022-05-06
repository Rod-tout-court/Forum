<?php
    require_once("fonctions_support.php");
    require_once("fonctions_bdd.php");
    $id_fil = $_GET["id_fil"];
    $link=connexion();

    $sql="SELECT publication, content, pseudo FROM message
        INNER JOIN fil ON message.fil_id=fil.fil_id
        INNER JOIN utilisateur ON utilisateur.user_id=message.user_id
        WHERE fil.fil_id=$id_fil
        ORDER BY msg_id ASC";

    $request=$link->query($sql);
    $content="";
    while($row = mysqli_fetch_row($request)){
        $date=$row[0];
        $message=$row[1];
        $pseudo=$row[2];
        $content="<div id=\"message\">
                    <p id=\"entete\">$pseudo</p>
                    <p>$message</p>
                    </div><p id=\"repondre\"><a href=\"repondre.html\">+répondre</a></p>
                </div>";
    }

    build_page("Fil", $content);


?>