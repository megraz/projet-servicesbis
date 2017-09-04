<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once './User.php';
include_once './DataBase.php';

if (isset($_POST['inscription'])) {
    $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    $user = new DataBase();
    //$pseudo, $mdp, $nom, $prenom, $mail, $avatar, $genre, $age
    $user->addUser(new User($post['pseudo'], md5($post['mdp']), $post['nom'], $post['prenom'], $post['mail'], $post['avatar'], $post['genre'], $post['age'], $post['annonces'], $post['date']));
    header("location:index.php");
    session_start();
    $_SESSION['nom'] = $post['pseudo'];
    $_SESSION['avatar'] = $post['avatar'];
    $_SESSION['genre'] = $post['genre'];
    $_SESSION['age'] = $post['age'];
}
//On lance la session à l'inscription et on y stock le nom d'utilisateur