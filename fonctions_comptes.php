<?php
    /**
     * Fonction vérifiant la présence d'un cookie de connexion, retourne true si il y en a un, false sinon.
     */
    function cookie_check(){
        $c=0; //compteur du nombre d'élément présent dans $_COOKIE
        foreach($_COOKIE as $value){
            $c++;
        }
        return $c == 0;
    }

    /**
     * Pose un cookie pour 24h claculer à partir du hash du mot de passe, du timestamp et d'un nombre aléatoire
     */
    function poser_cookie($hashpass){
        $time=time();
        $cookie=hash("sha256",$hashpass+"$time");
        setcookie("session", $cookie, 3600*24);
    }

?>