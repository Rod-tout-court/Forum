<?php
    /**
     * Fonction qui gère le contenu du bandeau si une personne à une session ouverte
     */
    require_once("fonctions_bdd.php");
    function header_compte(){
        if(isset($_SESSION["username"])){
            echo '<div class="container" id="c_connexion"><a href="http://localhost/Forum/Forum/connexion.php" class="bouton" id="connexion">'.$_SESSION["username"].'</a></div>';
        }

        else{
            echo '<div class="container" id="c_connexion"><a href="http://localhost/Forum/Forum/connexion.php" class="bouton" id="connexion">connexion</a></div>
                  <div class="container" id="c_inscription"><a href="http://localhost/Forum/Forum/inscription.php" class="bouton" id="inscription">inscription</a></div>';
        }
    }

    /**
     * TODO
     * verifier qu'un pseudo n'est pas déjà pris
     */
    function creer_compte($username,$email,$pass): bool{
        $link = connexion();
        $pass = password_hash($pass, PASSWORD_DEFAULT);
        $sql = "INSERT INTO utilisateur (pseudo, email, hash_pass) values ($username, $email, $pass)";
        $retour = $link->query($sql);
        $link->close();
        return $retour;
    }

    function se_connecter($username, $pass){
        $link = connexion();
        $pass = password_hash($pass, PASSWORD_DEFAULT);
        $sql = "SELECT pseudo, hash_pass FROM utilisateur WHERE pseudo=$username AND hash_pass=$pass";
        $retour = $link->query($sql);

        return $retour;
    }

    /**
     * TODO
     * Redirection vers le menu
     */
    function se_deconnecter(){
        session_destroy();
    }
?>