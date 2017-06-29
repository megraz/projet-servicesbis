<!DOCTYPE html>

<html  lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">  	
        <meta name="viewport" content="width=device-width, user-scalable=yes" /><!--user-scalable=yes” sert à indiquer que l’utilisateur peut zoomer sur le contenu-->
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="css/style.css" />
        <title>Formulaire inscription</title>

    </head>
    <body>
        <h1>INSCRIPTION</h1>
        <form action="register.php" method="POST">
            <section class="form_inscrip">
                <label for="pseudo">Pseudo</label>
                <input type="text" name ="pseudo" required="required"/>
                <br/>
                <label for="mdp">Mot de passe</label>
                <input type="password" name="mdp" required="required"/>
                <br/>
                <!--required, pour les champs à saisie obligatoire-->
                <label for="nom">Nom</label>
                <input type="text"  name="nom" placeholder="nom" required="required"/> <!--Le Placeholder a pour but de décrire brièvement un champs. Sa valeur s’affiche à l’intérieur du champs lorsque celui-ci est vide-->
                <br/>
                <label for="prenom">Prenom</label>
                <input type="text" name="prenom" placeholder="prenom" required="required"/>
                <br/>
                <label for="mail">Mail</label>
                <input type="email"  name="mail" placeholder="sophie@example.com" size="32" minlength="3" maxlength="64" required="required">
                <br/>
                <label for="avatar">Avatar</label>
                <input type="file" name="avatar" required="required"/>
                <br/>
                <label for="genre">Genre</label>
                <div><input type="radio" name="genre" value="feminin" required="required"/>Féminin
                    <input type="radio" name="genre" value="masculin" required="required"/>Masculin</div>
                <label for="age">Age</label>
                <input type="number" name="age"/>
                <br/>
                <input type="submit" name="inscription" value="Valider" />
            </section>

        </form>
    </body>
</html>
