
<?php
    /**
     * Fichier contenant les fonction de base d'affichage des pages html
     */

    function head_base($titre){?>
        <!DOCTYPE html>
        <html lang="fr">
            <head>
                <title><?php echo "$titre" ?></title>
                <meta charset="UTF-8">
                <link rel="stylesheet" href="http://localhost/Forum/Forum/base.css">
                <link rel="stylesheet" href="http://localhost/Forum/Forum/table.css">
            </head>

            <body>
                <div id="bandeau">
                    <h1><a id="titre" href="http://localhost/Forum/Forum/index.php">Forum</a></h1>
                    <div class="container" id="c_connexion"><a href="http://localhost/Forum/Forum/connexion.php" class="bouton" id="connexion">connexion</a></div>
                    <div class="container" id="c_inscription"><a href="http://localhost/Forum/Forum/inscription.php" class="bouton" id="inscription">inscription</a></div>  
                    <hr id="barre">
                </div>

                <div id="colg">


                    <nav id="choixsallons">
                        <h1>Différents salons</h1>
            
                        <ul id="Salon1">
            
                            <li><a href="#voyage">Salon voyage</a></li>
                            <li><a href="#conseil">Salon conseil</a></li>
                            <li><a href="#conseil">Salon cullinaire</a></li>
                        </ul>
                    </nav>
                </div>


<?php       
    }
?>

<?php
    function foot_base() {?>
            <div id="pub">
            <h2>Publicité</h2>
    
            <section id="cold">
    
                <ul id="Pub1">
                    <li>
                        <a  class="image" href="#conseil"><img src="http://localhost/Forum/Forum/canno.jpg" alt="Cannot photo" /></a>
                    </li>
                    <li>
                        <a class="image" href="#conseil"><img src="http://localhost/Forum/Forum/elephant.jpg" alt="Photo elephant" /></a>
                    </li>
                    <li>
                        <a class="image" href="#conseil"><img src="http://localhost/Forum/Forum/libre.jpg" alt="La liberté" /></a>
                    </li>
                </ul>
    
            </section>
    
            <section id="coldb">
                <ul id="Pub2">
                    <li>
                        <a class="image" href="#conseil"><img src="http://localhost/Forum/Forum/soleil.jpg" alt="Levé Soleil" /></a>
                    </li>
                    <li>
                        <a class="image" href="#conseil"><video src="http://localhost/Forum/Forum/video.webm" alt="Video de motivation" autoplay ></video></a>
                    </li>
    
                </ul>
            </section>
        </div>
        </body>
        </html>
<?php }
?>

<?php
    function content_base($content) {?>

        <div id="contenue">
           <?php echo "$content"; ?>
        </div>
<?php } ?>

<?php
    function build_page($titre, $contenu){
        head_base($titre);
        content_base($contenu);
        foot_base();
?>

<?php } ?>