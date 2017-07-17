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
                background-color: #d5dac1; /*#ceffe5*/
                margin-top: 20px;
            }
        </style>

    <body class="container">
        <?php
        include_once './Post.php';
        include_once './DataBase.php';
        include_once './User.php';


        // on teste la déclaration de la variable
        if (isset($_POST['newpost'])) {
            session_start();
            if (isset($_SESSION['nom'])) {
                $user = $_SESSION['nom'];
                $instance = new DataBase();


                if (is_file('utilisateur/' . $user . '.txt')) {
                    //$newpost = new DataBase;

                    $contenu = unserialize(file_get_contents('utilisateur/' . $user . '.txt'));
                    $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                    $newUser = unserialize(file_get_contents('utilisateur/' . $user . '.txt'));
                    //var_dump($newUser);
                    $instance->createPost(new Post($post['title'], $post['photo'], $post['description'], $post['price'],$contenu, $post['categories'], $post['localisation']));//$newUser
                    //$newpostdata = unserialize(file_get_contents('posts/' . $post['title'] . '.txt'));
                    //echo $instance->affichePost($newpostdata);

                    //$instance->createPost(new Post($post['title'], $post['photo'], $post['description'], $post['price'], $contenu, $post['categories']));
                    header("location:index.php"); // On redirige le visiteur vers la page d'accueil
                }
            }
            /*
              // on teste la déclaration de la variable
              if (isset($_POST['newpost'])) {
              $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
              $newpost = new DataBase;
              $newpost->createPost(new Post($post['title'], $post['photo'], $post['description'], $post['price'], $post['categories'])) ;
              $newpostdata = unserialize(file_get_contents('posts/' . $post['title'] . '.txt'));
              $instance = new DataBase();
              echo $instance->affichePost($newpostdata); */
        } else {
            echo 'pas d\'article';
        }
        ?>
        
    </body>
</html>