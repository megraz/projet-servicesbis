<!DOCTYPE html>

<html  lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">  	
        <meta name="viewport" content="width=device-width, user-scalable=yes" /><!--user-scalable=yes” sert à indiquer que l’utilisateur peut zoomer sur le contenu-->
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
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
            .full {
    width: 100%;    
}
.gap {
	height: 30px;
	width: 100%;
	clear: both;
	display: block;
}
.footer {
	background: #5f666d;
	height: auto;
	padding-bottom: 30px;
        /*padding-left: 140px;*/
	position: relative;
	width: 100%;
	border-bottom: 1px solid #CCCCCC;
	border-top: 1px solid #DDDDDD;
}
.footer p {
	margin: 0;
}
.footer img {
	max-width: 100%;
}
.footer h3 {
	border-bottom: 1px solid #BAC1C8;
	color: #f7f7f7;
	font-size: 18px;
	font-weight: 600;
	line-height: 27px;
	padding: 40px 0 10px;
	text-transform: uppercase;
}
.footer ul {
	font-size: 13px;
	list-style-type: none;
	margin-left: 0;
	padding-left: 0;
	margin-top: 15px;
	color: #f7f7f7;
}
.footer ul li a {
	padding: 0 0 5px 0;
	display: block;
}
.footer a {
	color: #f7f7f7;
}
.supportLi h4 {
	font-size: 20px;
	font-weight: lighter;
	line-height: normal;
	margin-bottom: 0 !important;
	padding-bottom: 0;
}
.newsletter-box input#appendedInputButton {
	background: #FFFFFF;
	display: inline-block;
	float: left;
	height: 30px;
	clear: both;
	width: 100%;
}
.newsletter-box .btn {
	border: medium none;
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	-o-border-radius: 3px;
	-ms-border-radius: 3px;
	border-radius: 3px;
	display: inline-block;
	height: 40px;
	padding: 0;
	width: 100%;
	color: #fff;
}
.newsletter-box {
	overflow: hidden;
}
.bg-gray {
	background-image: -moz-linear-gradient(center bottom, #BBBBBB 0%, #F0F0F0 100%);
	box-shadow: 0 1px 0 #B4B3B3;
}
.social li {
	background: none repeat scroll 0 0 #ffee4c;
	border: 2px solid #ffee4c;
	-webkit-border-radius: 50%;
	-moz-border-radius: 50%;
	-o-border-radius: 50%;
	-ms-border-radius: 50%;
	border-radius: 50%;
	float: left;
	height: 36px;
	line-height: 36px;
	margin: 0 8px 0 0;
	padding: 0;
	text-align: center;
	width: 36px;
	transition: all 0.5s ease 0s;
	-moz-transition: all 0.5s ease 0s;
	-webkit-transition: all 0.5s ease 0s;
	-ms-transition: all 0.5s ease 0s;
	-o-transition: all 0.5s ease 0s;
}
.social li:hover {
	transform: scale(1.15) rotate(360deg);
	-webkit-transform: scale(1.1) rotate(360deg);
	-moz-transform: scale(1.1) rotate(360deg);
	-ms-transform: scale(1.1) rotate(360deg);
	-o-transform: scale(1.1) rotate(360deg);
}
.social li a {
	color: #EDEFF1;
}
.social li:hover {
	border: 2px solid #fbe407;
	background: #ffe700;
}
.social li a i {
	font-size: 16px;
	margin: 0 0 0 5px;
	color: #EDEFF1 !important;
}

        </style>

    </head>
    <body class="container">
                <?php
        session_start();
        if (!isset($_SESSION['nom'])) {
            ?>
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


            <section class="inscription_formulaire">
                <form method="POST" action="login.php">
                    <div class="form-group">
                        <label for="pseudo">Pseudo</label>
                        <input type="text" name="pseudo"/>
                        <label for="mdp">Mot de passe</label>
                        <input type="password" name="mdp"/>
                        <input type="submit" class="btn btn-success" name="login"/>
                    </div>
                </form>
                <a class="btn btn-warning" href="register-form.php">S'inscrire</a>
                <a class="btn btn-primary" href="post_form.php">Poster une annonce</a>
            </section>
            <div class="row">
                <?php
            } else {
                echo '<div class="accueil" style="font-size: 20px">Bonjour ' . $_SESSION['nom'];
                echo '</div><div class="row"><div class="col-sm-4"><form action="logout.php" method="POST"><button class="btn btn-danger">Se déconnecter</button></form></div>';
                echo '<div class="col-sm-4" style="text-align:right"><a href="espaceperso.php"><button style="color:#27e092">Espace personnel</button></a><br/></div>';
                echo '<div class="col-sm-4" style="text-align:right"><a href="post_form.php"><button class="btn btn-primary">Poster une annonce</button></a></div></div>';
            }
            ?>
        </div>
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
        include_once 'User.php';

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
            $(document).ready(function () {
                $('#myCarousel').carousel({
                    interval: 2000,
                    cycle: true
                });
            });
        </script>
        
        <footer>
    <div class="footer" id="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
                    <h3> Services</h3>
                    <ul>
                        <li> <a href="#"> Déposer une annonce</a> </li>
                        <li> <a href="#"> Trouver un service</a> </li>
                        <li> <a href="#"> Options d'annonce </a> </li>
                        <li> <a href="#"> Aide</a> </li>
                    </ul>
                </div>
                <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
                    <h3> TOP CATÉGORIES</h3>
                    <ul>
                        <li> <a href="#"> Déménagement</a> </li>
                        <li> <a href="#"> Babysitting</a> </li>
                        <li> <a href="#"> Dépannage</a> </li>
                        <li> <a href="#"> Mode</a> </li>
                    </ul>
                </div>
                <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
                    <h3> A propos </h3>
                    <ul>
                        <li> <a href="#"> Contact </a> </li>
                        <li> <a href="#"> FAQ </a> </li>
                        <li> <a href="#"> Espace presse</a> </li>
                    </ul>
                </div>
                <div class="col-lg-3  col-md-3 col-sm-6 col-xs-12 ">
                    <h3> Rejoignez-nous </h3>
                    <ul class="social">
                        <li> <a href="#"> <i class=" fa fa-facebook">   </i> </a> </li>
                        <li> <a href="#"> <i class="fa fa-twitter">   </i> </a> </li>
                        <li> <a href="#"> <i class="fa fa-google-plus">   </i> </a> </li>
                        <li> <a href="#"> <i class="fa fa-pinterest">   </i> </a> </li>
                        <li> <a href="#"> <i class="fa fa-youtube">   </i> </a> </li>
                    </ul>
                </div>
            </div>
            <!--/.row--> 
        </div>
        <!--/.container--> 
    </div>
      </footer>
    </body>
</html>