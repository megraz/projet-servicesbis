<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <title>Mon espace personnel</title>

        <style type="text/css">
            body{
                background-color:  #d5dac1;
                margin-top: 20px;
                margin-left: 80px;
            }
            h2{
                color: #3795b6; /*#3795b6 #5da5db #7784a1 #69bbf9*/
                text-align: center;
            }
        </style>

    </head>
    <body>
        <h2>Mon Espace Personnel</h2>
        <?php
        include_once './User.php';
        include_once './DataBase.php';
        include_once './Post.php';


        $instance = new DataBase;
        session_start();
        if (isset($_SESSION['nom'])) {
            $user = $_SESSION ['nom'];
            if (is_file('utilisateur/' . $user . '.txt')) {
                $contenu = unserialize(file_get_contents('utilisateur/' . $user . '.txt'));
                $instance = new DataBase;
                echo $instance->afficheUser($contenu);
                echo '<a href="post_form.php"><button>Créer une nouvelle annonce</button></a><br/>';
                echo '<form action="logout.php" method="POST"><button>Se déconnecter</button></form>';
                echo '<a href="index.php">Retour</a>';
            }
        } else {
            echo'
        <form method="POST" action="login.php">
            <label for="pseudo">Pseudo</label>
            <input type="text" name="pseudo"/>
            <label for="mdp">Mot de passe</label>
            <input type="password" name="mdp"/>
            <input type="submit" name="login"/>
        </form>';
        }
        ?>

        <h2>Mes Annonces</h2>


        <?php
        $listeAnnonces = $instance->listePosts();
        foreach ($listeAnnonces as $annonce) {
            $author = $annonce->getAuthor();
            if ($author == $user) {
                echo $instance->affichePost($annonce);

                echo'
                  <div class="boutons">
                  <form method="POST" action="delete.php">
                  <input type="hidden" name="filename" ' . 'value="' . $annonce->getTitle() . '"class="text">
                  <input type="submit" value="Supprimer">
                  </form>
                  
                  <form method="POST" action="edit_form.php">
                  <input type="hidden" name="filename" value="' . $annonce->getTitle() . '">
                  <input type="submit" value="Modifier">
                  </form>
                  </div>';
            }
        }
        ?>
    </body>
</html>