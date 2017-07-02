<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Modifier fichier</title>
    </head>
    <body>
        <?php
        if (isset($_POST['fichier']) && isset($_POST['contenu'])) {
            //On stock les infos du post dans des variables
            $fileName = filter_input(INPUT_POST, 'fichier', FILTER_SANITIZE_URL);
            $content = filter_input(INPUT_POST, 'contenu', FILTER_SANITIZE_URL);

            $fileName = htmlspecialchars($_POST['fichier']);
            $content = htmlspecialchars($_POST['contenu']);
            //On vérifie que le fichier existe bien
            if (is_file('posts/' . $fileName)) {
                //On remplace le contenu du fichier comme on avait fait pour la création de celui ci
                $file = fopen('posts/' . $fileName, 'w');
                fwrite($file, $content);
                fclose($file);
                //feedback utilisateur
                echo 'vous avez modifié le fichier.';
            }
        }
        /*
          Ici, on affiche les informations actuelles du fichier et de son contenu pour le modifier via
          un formulaire et un textarea
         */
        if (isset($_GET['fichier'])) {
            $file = $_GET['fichier'];
            //On vérifie que le fichier existe bien
            if (is_file('posts/' . $file)) {
                //On affiche son titre et on récupère son contenu comme sur l'index.php
                echo '<h2>' . basename($file, ".txt") . '</h2>';
                $content = file_get_contents('posts/' . $file);
                //On crée un formulaire de type post qui redirigera vers la même page pour traiter
                //la modification du fichier
                echo '<form method="post" action="">';
                //On indique le nom du fichier à modifier dans un input caché (type="hidden")
                echo '<input type="hidden" name="fichier" '
                . 'value="' . $file . '">';
                echo '<textarea name="contenu">'
                . $content . '</textarea>';
                echo '<button>Modifier</button>';
                echo '</form>';
            }
        }
        ?>
        <a href="index.php">Retour</a>

    </body>
</html>
