<!DOCTYPE html>

<html  lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">  	
        <meta name="viewport" content="width=device-width, user-scalable=yes" /><!--user-scalable=yes” sert à indiquer que l’utilisateur peut zoomer sur le contenu-->
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <!--coller le lien bootstrap-->
        <title>Nos services</title>

        <style type="text/css">
            body{
                background-color:  #d5dac1;
            }
            .inscription_formulaire {
                margin-top: 30px;
            }
            h1{
                color: #3795b6; /*#3795b6 #5da5db #7784a1 #69bbf9*/
                text-align: center;
            }
            .recherche{
                text-align: center;
            }
            .carousel-page{
                width:100%;
                height:400px;
                background-color:#5f666d;
                color:white;
            }

        </style>

    </head>
    <body class="container">
        <!--Pour afficher le carrousel de Bootstrap utiliser les classes .carousel et .slide ainsi que l’attribut « data-ride » auquel nous donnerons la valeur « carousel »-->
        <div id="my_carousel" class="carousel slide" data-ride="carousel">
            <!-- Bulles Les marqueurs ronds seront mis en forme par la classe .carousel-indicators-->
            <ol class="carousel-indicators">
                <li data-target="#my_carousel" data-slide-to="0" class="active"></li>
                <li data-target="#my_carousel" data-slide-to="1"></li>
                <li data-target="#my_carousel" data-slide-to="2"></li>
            </ol>
            <!-- Slides -->
            <div class="carousel-inner" role="listbox"><!--Les images,le contenu HTML (texte, titre, boutons…) sont désignés par la classe .carousel-inner-->
                <!-- Page 1 -->
                <div class="item active">  
                    <div class="carousel-page">
                        <img src="images/student1.jpg" class="img-responsive" style="margin:0px auto;" />
                    </div> 
                    <div class="carousel-caption">Trouvez le service qu'il vous faut</div>
                </div>   
                <!-- Page 2 -->
                <div class="item"> 
                    <div class="carousel-page"><img src="images/business1.jpg" class="img-responsive img-rounded" 
                                                    style="margin:0px auto;"  /></div> 
                    <div class="carousel-caption">Réparation et Dépannage</div>
                </div>  
                <!-- Page 3 -->
                <div class="item">  
                    <div class="carousel-page">
                        <img src="images/jelly-babies1.jpg" class="img-responsive img-rounded" 
                             style="margin:0px auto;max-height:100%;"  />
                    </div>  
                    <div class="carousel-caption">Babysitting</div>
                </div>     
            </div>
            <!-- Contrôles Les flèches de défilement s’affichent grâce à la classe .carousel-control-->
            <a class="left carousel-control" href="#my_carousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Précédent</span>
            </a>
            <a class="right carousel-control" href="#my_carousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Suivant</span>
            </a>
        </div>

        <?php
        session_start();
        if (!isset($_SESSION['nom'])) {
            ?>

            <form method="POST" action="login.php">
                <section class="inscription_formulaire">
                    <div class="form-group">
                        <label for="pseudo">Pseudo</label>
                        <input type="text" name="pseudo"/>
                        <label for="mdp">Mot de passe</label>
                        <input type="password" name="mdp"/>
                        <input type="submit" class="btn btn-success" name="login"/>
                    </div>
            </form>

            <a href="register-form.php">S'inscrire</a>
            <a href="post_form.php">Poster une annonce</a>

            <?php
        } else {
            echo 'Bonjour ' . $_SESSION['nom'];
            echo '<form action="logout.php" method="POST"><button>Se déconnecter</button></form>';
            echo '<a href="espaceperso.php">Espace personnel</a><br/>';
            echo '<a href="post_form.php">Poster une annonce</a>';
        }
        ?>

        <h1>De quel service avez-vous besoin ?</h1>
        <form class="recherche" method="POST" action="index.php">
            <div class="form-group">
                <select name ="ttescategories">
                    <option value="toutescategories" class="btn btn-default btn-xs" selected="selected">Toutes les catégories</option>
                    <option value="Reparation">Réparation et Dépannage</option>
                    <option value="Mode">Mode et Bien-être</option>
                    <option value="Information">Information et conseils</option>
                    <option value="Demenagements">Déménagements</option>
                    <option value="Babysitting">Babysitting</option>
                </select>
                <input type="text" placeholder="mot clé"/>
                <input type="text" placeholder="Localisation"/>
                <input type="submit" class="btn btn-info" value="Rechercher"/>
            </div>
        </form>

        <?php
        include_once './Post.php';
        include_once './DataBase.php';

        $dossier = 'posts/';
        $files = scandir($dossier);
        foreach ($files as $content) {
            if (!is_dir($content)) {
                echo '<section><h3>' . basename($content, ".txt") . '</h3>';
                echo '<div class="text">';
                $contenu = unserialize(file_get_contents($dossier . $content));
                $instance = new DataBase();
                //var_dump($contenu);
                echo $instance->affichePost($contenu);
                echo '</div>';
            }
        }
        ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!-- Le javascript-->
        <!-- Placed at the end of the document so the pages load faster -->
        <!--<script type="text/javascript" src="js/jquery-1.12.3.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>-->
        <script type="text/javascript">
            $(document).ready(function(){
            $('#myCarousel').carousel({
                interval: 2000,
                cycle: true
            });
             });
    </script>
</body>
</html>