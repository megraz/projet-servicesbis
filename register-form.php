<!DOCTYPE html>
<?php

  /*echo "<pre>";
  print_r($_SESSION); //print_r — Affiche des informations lisibles pour une variable
  echo "</pre>";

  include_once './DataBase.php';

  if (isset($_FILES['avatar']) and !empty($FILES['avatar']['name'])) {
  $tailleMax = 2097152; //on fixe la taille max à 2 Mo
  $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');

  if ($FILES['avatar']['size'] <= $tailleMax) {
  $extensionUpload = strtolower(substr(strrchr($FILES['avatar']['name'], '.'), 1)); //ignore le 1 caractère et prend l'extension qui vient après le point
  if (in_array($extensionUpload, $extensionsValides)) {
  $chemin = "./avatars/" . $_SESSION['id'] . "." . $extensionUpload; //id de la personne
  $resultat = move_uploaded_file($FILES['avatar']['tmp_name'], $chemin); //tmp_name = chemin temporaire du fichier et $relustat vérif si le déplacement est fait
  if ($resultat) {
  $updateavatar = $DataBase->prepare('UPDATE user SET avatar = :avatar WHERE id = :id');
  $updateavatar->execute(array('avatar' => $_SESSION['id'] . "." . $extentionUpload, 'id' => $_SESSION['id']
  )); //id=id de la session
  } else {
  $msg = "Erreur durant l'importation de votre photo de profil";
  }
  } else {
  $msg = "Votre photo de profil doit être au format jpg, jpeg, gif ou png";
  }
  } else {
  $msg = "Votre photo de profil ne doit pas dépasser 2Mo";
  }
  } */
?>

<html  lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">  	
        <meta name="viewport" content="width=device-width, user-scalable=yes" /><!--user-scalable=yes” sert à indiquer que l’utilisateur peut zoomer sur le contenu-->
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!--<link rel="stylesheet" href="css/style.css" />-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <title>Formulaire inscription</title>

        <style type="text/css">
            body{
                background-color:  #d5dac1;
                text-align: center;
                margin: 0 auto;
            }
            h1{
                color: #3ea6cb; /*#3795b6 #5da5db #7784a1 #69bbf9*/
            }
        </style>

    </head>
    <body class="container">
                <h1>INSCRIPTION</h1>
                <form action="register.php" method="POST" enctype="multipart/form-data">
                    <section class="form_inscrip">
                        <label for="pseudo">Pseudo</label>
                        <input type="text" name ="pseudo" required="required"/>
                        <br/>
                        <br/>
                        <label for="mdp">Mot de passe</label>
                        <input type="password" name="mdp" required="required"/>
                        <br/>
                        <br/>
                        <!--required, pour les champs à saisie obligatoire-->
                        <label for="nom">Nom</label>
                        <input type="text"  name="nom" placeholder="nom" required="required"/> <!--Le Placeholder a pour but de décrire brièvement un champs. Sa valeur s’affiche à l’intérieur du champs lorsque celui-ci est vide-->
                        <br/>
                        <br/>
                        <label for="prenom">Prenom</label>
                        <input type="text" name="prenom" placeholder="prenom" required="required"/>
                        <br/>
                        <br/>
                        <label for="mail">Mail</label>
                        <input type="email"  name="mail" placeholder="sophie@example.com" size="32" minlength="3" maxlength="64" required="required">
                        <br/>
                        <br/>

                        <?php
                        if (!empty($userinfo['avatar'])) {
                            ?>
                            <img src="./avatars/<?php echo $userinfo['avatar']; ?>" width="150" />
                            <?php
                        }
                        ?>
                        <label for="avatar">Avatar</label>
                        <input type="file" name="avatar" required="required" style="text-align: center; margin: auto"/>
                        <br/>
                        <label for="genre">Genre</label>
                        <div><input type="radio" name="genre" value="feminin" required="required"/>Féminin
                            <input type="radio" name="genre" value="masculin" required="required"/>Masculin</div>
                        <br/>
                        <label for="age">Age</label>
                        <input type="number" name="age"/>
                        <br/>
                        <br/>
                        <input type="submit" name="inscription" class="btn btn-primary" value="Valider" />     
                    </section>
                </form>
    </body>
</html>
