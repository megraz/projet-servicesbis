<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include_once 'User.php';
        include_once 'DataBase.php';
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
    </body>
</html>