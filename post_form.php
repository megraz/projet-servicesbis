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
        <title></title>
    </head>
    <body>
        <?php
        session_start();
        if (isset($_SESSION['nom'])) {
            ?>


            <form action="create-post.php" method="POST">
                <label for="title">Titre</label>
                <input type="text" name="title"/>
                <br/>
                <label for="description">Description</label>
                <br/>
                <textarea cols="50" rows="10" name="description">Vous pouvez écrire quelque chose ici</textarea>
                <br/>
                <select name="categories">
                    <option value="toutescategories" selected="selected">Toutes les catégories</option>
                    <option value="Reparation">Réparation et Dépannage</option>
                    <option value="Mode">Mode et Bien-être</option>
                    <option value="Information">Information et conseils</option>
                    <option value="Demenagements">Déménagements</option>
                    <option value="Babysitting">Babysitting</option>
                </select>
                </br>
                <label for="price">Prix</label>
                <input type="number" name="price"/> €
                <br/>
                <label for="photo">Photo</label>
                <input type="file"name="photo"/>
                <br/>
                <input type="submit" value="Envoyer" name="newpost"/>
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
                <input type="submit" name="login"/>
            </form>
            <a href="register-form.php">S'inscrire</a>
            <?php
        }
        ?>
        <a href="index.php">Retour</a>
    </body>
</html>
