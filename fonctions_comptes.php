<?php
    /**
     * Fonction qui gère le contenu du bandeau si une personne à une session ouverte
     */
    require_once("fonctions_bdd.php");
    function header_compte(){
        if(isset($_SESSION["username"])){
            echo '<div class="container" id="c_connexion"><a href="http://localhost/connexion.php" class="bouton" id="connexion">'.$_SESSION["username"].'</a></div>
            <div class="container" id="c_connexion"><a href="http://localhost/deconnexion.php" class="bouton" id="connexion">deconnexion</a></div>';
        }

        else{
            echo '<div class="container" id="c_connexion"><a href="http://localhost/page_connexion.php" class="bouton" id="connexion">connexion</a></div>
                  <div class="container" id="c_inscription"><a href="http://localhost/page_inscription.php" class="bouton" id="inscription">inscription</a></div>';
        }
    }

    /**
     * TODO
     * verifier qu'un pseudo n'est pas déjà pris
     */
    function creer_compte($username="",$email="",$pass=""): bool{
        session_start();
        $link = connexion();
        $link->set_charset("utf8");
        $username = $link->real_escape_string($username);
        $email = $link->real_escape_string($email);
        $pass = $link->real_escape_string($pass);
        $pass = password_hash($pass, PASSWORD_BCRYPT);
        
        //verification de l'unicité du pseudo
        $sql_verif = "SELECT pseudo FROM utilisateur WHERE pseudo='$username'";
        $verification = $link->query($sql_verif);
        
        if (mysqli_fetch_assoc($verification)){
            return false;
        }
        $sql = "INSERT INTO utilisateur (pseudo, email, hash_pass, anon) values ('$username', '$email', '$pass', false)";
        $link->query($sql);
        se_connecter($username, $pass);
        $link->close();
        return true;
    }

    function verif_compte($username=""){
        $link = connexion();

    }

    function se_connecter($username, $pass){
        $link = connexion();
        $pass = $link->real_escape_string($pass);
        $username = $link->real_escape_string($username);

        $sql = "SELECT user_id, pseudo, hash_pass FROM utilisateur WHERE pseudo='$username'";
        $query = $link->query($sql);
        $row = mysqli_fetch_row($query);

        $hash = $row[2];
        $user_id = $row[0];
        var_dump($hash);
        var_dump(password_hash($pass, PASSWORD_BCRYPT));
        session_start();
        if($username!="" && $pass != "" && password_verify($pass, $hash)){
        $_SESSION["username"]=$username;
        $_SESSION["user_id"]=$user_id;
        return true ;
        }
        else{
            return false;
        }
    }

    /**
     * TODO
     * Redirection vers le menu
     */
    function se_deconnecter(){
        session_start();
        unset($_SESSION["username"]);
        session_destroy();
        header("Location: http://localhost");
    }
?>