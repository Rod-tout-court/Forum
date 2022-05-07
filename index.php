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
    $sql = "SELECT title, pseudo, fil.fil_id, COUNT(msg_id) FROM message 
    INNER JOIN fil ON fil.fil_id=message.fil_id
    INNER JOIN utilisateur ON utilisateur.user_id=fil.user_id
    GROUP BY fil.fil_id 
    ORDER BY publication DESC";
    
    $result=$link->query($sql);
    while ($row = mysqli_fetch_row($result)){
        $titre=$row[0];
        $pseudo=$row[1];
        $fil_id = $row[2];
        $lien="http://localhost/fils.php?id_fil=".$fil_id;
        $nb_msg=$row[3];
        #recherche des dates du premier et du dernier messages posté
        $sql="SELECT MAX(publication), MIN(publication) FROM message 
            WHERE fil_id=$fil_id";
        $result = $link->query($sql);
        $date = mysqli_fetch_row($result);
        $date_max = $date[0];
        $date_min = $date[1];
        $content.="<tr><td class=\"titre\"><a href=\"$lien\">$titre</a></td><td class=\"auteur\">$pseudo</td><td class=\"date\">$date_min</td><td class=\"date\">$date_max</td><td class=\"nb_message\">$nb_msg</td></tr>";
    }
    $link->close();

    $content .= "</table>
    <p id=\"nouveau_fil\"><a href=\"http://localhost/nouveau_fil.php\">+nouveau fil</a></p>";

    build_page("Forum - Accueil", $content);
?>