<?php
    error_reporting(E_ALL);
    require_once('../fonctions_support.php');
    require_once('../fonctions_comptes.php');

    $titre = "Test";

    if (cookie_check()){
        $cookie = "false";
    }
    else {
        $cookie = "true";
    }

    $contenu = "cookie ? $cookie";

    build_page($titre, $contenu);


?>