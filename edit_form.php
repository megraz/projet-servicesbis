<!DOCTYPE html>
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
                background-color: #d5dac1;
                margin-top: 20px;
            }
        </style>

    </head>
    <body class="container">
        <?php
        include_once './DataBase.php';
        include_once './User.php';
        include_once './Post.php';

        $instance = new DataBase();
        if (isset($_POST['filename'])) {
            $file = htmlspecialchars($_POST['filename']);
            $post = $instance->readPost($file);
            $title = $post->getTitle();
            $description = $post->getDescription();
            $price = $post->getPrice();
            $photo = $post->getPhoto();
            echo'
                <form action="edit.php" method="POST">
                    <label for="title">Titre</label>
                    <input type="text" name="title" value="' . $title . '"/>
                    <br/><input type="hidden" name="previoustitle" value="' . $title . '"/><br/>
                    <label for="description">Description</label><br/>
                    <textarea cols="50" rows="10" name="description" >' . $description . '</textarea><br/>
                    <br/><label for="price">Prix</label>
                    <input type="number" name="price" value="' . $price . '"/> €
                    <br/><br/>
                    <label for="photo">Photo</label>
                    <input type="file" name="photo"/><br/>
                    <br/><input type="submit" class="btn btn-primary" value="Envoyer" name="editpost"/>
                </form>';
        }
        ?>
    </body>
</html>
