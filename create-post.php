<?php
include_once './Post.php';
include_once './DataBase.php';


if (isset($_POST['newpost'])) {
    $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    $newpost = new DataBase;
    $newpost->createPost(new Post($post['title'], $post['photo'], $post['description'], $post['price'], $post['categories'])) ;
    $newpostdata = unserialize(file_get_contents('posts/' . $post['title'] . '.txt'));
    $instance = new DataBase();
    echo $instance->affichePost($newpostdata);
    
       /*$instance->createPost(new Post($post['title'], $post['photo'], $post['description'], $post['price'], $contenu, $post['categories']));
            header("location:index.php");*/
        
    
} else {
    echo 'pas d\'article';
}
