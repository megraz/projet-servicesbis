<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html  lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">  	
        <meta name="viewport" content="width=device-width, user-scalable=yes" /><!--user-scalable=yes” sert à indiquer que l’utilisateur peut zoomer sur le contenu-->
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <title></title>

        <style type="text/css">
            body{
                background-color: #d5dac1; /*#ceffe5*/
                margin-top: 20px;
            }
        </style>

    </head>
    <body class="container">
        <?php
        session_start();
        if (isset($_SESSION['nom'])) {
            ?>


            <form action="create-post.php" method="POST">
                <label for="title">Titre</label>
                <input type="text" name="title" required="required"/>
                <br/>
                <br/>
                <label for="description">Description</label>
                <br/>
                <textarea cols="50" rows="10" name="description" required="required">Vous pouvez écrire quelque chose ici</textarea>
                <br/>
                <br/>
                <select name="categories" required="required">
                    <option value="toutescategories" selected="selected">Toutes les catégories</option>
                    <option value="Reparation">Réparation et Dépannage</option>
                    <option value="Mode">Mode et Bien-être</option>
                    <option value="Information">Information et conseils</option>
                    <option value="Demenagements">Déménagements</option>
                    <option value="Babysitting">Babysitting</option>
                </select>
                </br>
                <br/>
                <label for="price">Prix</label>
                <input type="number" name="price" required="required"/> €
                <br/>
                <br/>
                <label for="photo">Photo</label>
                <input type="file"name="photo" required="required"/>
                <br/>
                <br/>
                <input type="submit" class="btn btn-primary" value="Envoyer" name="newpost"/>
            </form>

            <?php
        } else {
            echo 'connectez-vous !';
            ?>
            <form method="POST" action="login.php">
                <label for="pseudo">Pseudo</label>
                <input type="text" name="pseudo"/>
                <label for="mdp">Mot de passe</label>
                <input type="password" name="mdp"/>
                <input type="submit" class="btn btn-success" name="login"/>
            </form>
            <a href="register-form.php">S'inscrire</a>
            <?php
        }
        ?>
        <br/>
        <a href="index.php">Retour</a>
    </body>
</html>
