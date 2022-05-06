<?php
    require_once("fonctions_support.php");
    require_once("fonctions_bdd.php");
    if(!isset($_SESSION)){
    session_start();
    }

    $content="<h2>Dernier fil</h2>
        <table>
            <thead>
                <tr><td>Titre</td><td>auteur</td><td>date du premier post</td><td>date du dernier post</td><td>Nombre de messages</td></tr>
            </thead>";        
    $link=connexion();
    $sql = "SELECT title, pseudo, fil.fil_id FROM message 
    INNER JOIN fil ON fil.fil_id=message.fil_id
    INNER JOIN utilisateur ON utilisateur.user_id=fil.user_id
    GROUP BY fil.fil_id 
    ORDER BY publication DESC";
    
    $result=$link->query($sql);
    while ($row = mysqli_fetch_row($result)){
        $titre=$row[0];
        $pseudo=$row[1];
        $lien="http://localhost/fils.phps?id_fil=".$row[2];
        $content.="<tr><td class=\"titre\"><a href=\"$lien\">$titre</a></td><td class=\"auteur\">$pseudo</td><td class=\"date\">01/01/1970</td><td class=\"date\">01/01/1970</td><td class=\"nb_message\">nombre de messages</td></tr>";
    }


    $content .= "</table>
    <p id=\"nouveau_fil\"><a href=\"http://localhost/nouveau_fil.php\">+nouveau fil</a></p>";

    $link->close();
    build_page("Forum - Accueil", $content);
?>