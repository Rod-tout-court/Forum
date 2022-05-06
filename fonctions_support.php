
<?php
    /**
     * Fichier contenant les fonction de base d'affichage des pages html
     */

    require_once('fonctions_comptes.php');

    function head_base($titre){?>
        <!DOCTYPE html>
        <html lang="fr">
            <head>
                <title><?php echo "$titre" ?></title>
                <meta charset="UTF-8">
                <link rel="stylesheet" href="http://localhost/base.css">
                <link rel="stylesheet" href="http://localhost/table.css">
                <link rel="stylesheet" href="http://localhost/connexion.css">
            </head>

            <body>
                <div id="bandeau">
                    <h1><a id="titre" href="http://localhost/index.php">Forum</a></h1>
                    <?php header_compte()?>
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
    
                <ul class="pub">
                    <li>
                        <a  class="image" href="#conseil"><img src="http://localhost/canno.jpg" alt="Cannot photo" /></a>
                    </li>
                    <li>
                        <a class="image" href="#conseil"><img src="http://localhost/elephant.jpg" alt="Photo elephant" /></a>
                    </li>
                    <li>
                        <a class="image" href="#conseil"><img src="http://localhost/libre.jpg" alt="La liberté" /></a>
                    </li>
                </ul>
    
                <ul class="pub">
                    <li>
                        <a class="image" href="#conseil"><img src="http://localhost/soleil.jpg" alt="Levé Soleil" /></a>
                    </li>
                    <li>
                        <a class="image" href="#conseil"><video src="http://localhost/video.webm" alt="Video de motivation" autoplay ></video></a>
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
    }
?>
