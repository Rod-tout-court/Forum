<?php
    require_once("fonctions_bdd.php");
    $link = connexion();
    $max_id=$link->query("SELECT MAX(fil_id) FROM fil");
    $max_id = mysqli_fetch_row($max_id);
    echo $max_id[0];
?>