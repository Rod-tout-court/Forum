<?php
    require_once("fonctions_support.php");

    $form = 
    "<form action=\"inscription.php\" method=\"post\">
    <h2>Inscription</h2>
    <hr>
    <table>
        <tr><td><label for=\"email\">E-mail</label></td><td><input type=\"email\" name=\"email\" id=\"email\"></td></tr>
        <tr><td><label for=\"username\">Nom d'utilisateur</label></td><td><input type=\"text\" name=\"username\" id=\"username\"></td></tr>
        <tr><td><label for=\"pass\">mot de passe</label></td><td><input type=\"password\" name=\"pass\" id=\"pass\"></td></tr>
    </table>
    <input type=\"submit\" value=\"S'inscrire\">
</form>";

    build_page("Connexion", $form);

?>