<?php
    require_once("fonctions_support.php");

    $form = 
    "<h2>Connexion</h2>

                <form action=\"connexion.php\" method=\"post\">
                    <table class=\"connexion\">
                        <tr><td class=\"connexion\"><label for=\"username\">Nom d'utilisateur</label></td><td class=\"connexion\"><input type=\"text\" name=\"username\" id=\"username\"></td></tr>
                        <tr><td class=\"connexion\"><label for=\"pass\">mot de passe</label></td><td class=\"connexion\"><input type=\"password\" name=\"pass\" id=\"pass\"></td></tr>
                    </table>
                    <input type=\"submit\" value=\"Connexion\">
                </form>";

    build_page("Connexion", $form);

?>

