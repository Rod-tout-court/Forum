<?php
    function connexion(){
        $link = mysqli_connect("localhost", "root", "", "forum");
        return $link;
    }
?>