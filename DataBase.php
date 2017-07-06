<?php

/* class Database (ce que l'on peut mettre dedans):
  serialize;
  unserialize
  fopen
  fwrite
  file_get_content
  scandir

  Les choses à ne surtout pas mettre dans la class Database :
  $_POST/$_GET
  echo ''
  html
  User :              Evenement :
 * Database: 
 * 
 * methode creer User/info user/ creer dossier utilisateur
 * creer post/evenement/ organiser ou poster un evenement/ mettre une annonce
 * lire post
 * auth user / autentifier l'utilisateur
 */
/* * CRUD : create, read, update, delete
 * 
 * creer User (argument : instance de User) -> prendre cette instance et 
 * la mettre dans le fichier
 * creer Post/Evenement( instance de post: $post)
 * lire Evenement/Post ( )-> juste recuperer les fichiers et les afficher 
 * sous forme de tableau
 * auth User( $ID, $mdp)
 * 
 * DATABASE
 * 
 * function connexion($identifiant, $mdp)
 * if(is_file("user/" .$identifiant. ".txt"))->verifier s'il existe un 
 * utilisateur avec l'identifiant $identifiant.
 * 
 * $user = unserialize(file_get_contents(...))->on recupere l'instance de user 
 * qu'on avait stocké dans le fichier au moment de l'inscription.
 * nb.unserialize — Crée une variable PHP à partir d'une valeur linéarisée
 * 
 * if($user->getMdp() == $mdp)-> on compare le mdp stocké dans le fichier 
 * à celui passé en argument de la function .
 */
/* CCL :
 * include_once './Utilisateur.php';
  class Database {

  public function creerUser(Utilisateur $utilisateur){

  // On verifie si le dossier utilisateur existe dêjà
  if(!is_dir("utilisateur")) {
  //sinon on le crée
  mkdir("utilisateur");
  }
  //On crée un nouveau fichier pour l'utilisateur
  $new_file = fopen("utilisateur/".$utilisateur->getLogin() .".txt", "w");

  fwrite($new_file, serialize($utilisateur));
  //on ferme le fichier
  fclose($new_file);
  //On lance la session à l'inscription et on y
  //stock le nom d'utilisateur
  session_start();
  $_SESSION['utilisateur'] = $utilisateur;
  }
  }
 */

class DataBase {

    //creer un nouvel utilisateur
    public function createUser(User $user) {
        // On verifie si le dossier utilisateur existe dêjà 
        if (!is_dir('utilisateur')) {
            //sinon on le crée
            mkdir('utilisateur');
        }
        $userdata = serialize($user);
        //On crée un nouveau fichier pour l'utilisateu
        $file = fopen('utilisateur/' . $user->getPseudo() . '.txt', 'w');
        fwrite($file, $userdata);
        fclose($file);
    }

    //afficher  les infos de l'utilisateur
    public function afficheUser(User $user) {
        return '<pre>Pseudo : ' . $user->getPseudo() . '</pre><pre>' .
                $user->getNom() . '</pre><pre>' .
                $user->getPrenom() . '</pre><pre>' .
                $user->getMail() . '</pre><pre>' .
                $user->getAvatar() . '<img src="</pre><pre>">' .
                $user->getGenre() . '</pre><pre>' .
                $user->getAge() . '</pre>' .
                $user->getDate()->format('d/m/y H:i') . '<pre></pre>';
    }

    //creer un post (une annonce)
    public function createPost(Post $post) {
        if (!is_dir('posts')) {
            mkdir('posts');
        }
        $postdata = serialize($post);
        $file = fopen('posts/' . $post->getTitle() . '.txt', 'w');
        fwrite($file, $postdata);
        fclose($file);
    }

    //afficher un post
    public function affichePost(Post $post) {
        return '</pre><pre><img src="' .
                $post->getPhoto() . '"></pre><pre>' .
                $post->getDescription() . '</pre><pre>' .
                $post->getPrice() . '€</pre><pre>' .
                //$post->getDate()->format('d/m/y H:i') . '</pre>';
                $post->getCategorie() . '</pre><pre>' .
                $post->getAuthor() . '</pre>';
    }

    //afficher photo Avatar
    public function afficheAvatar() {
        $db = new DataBase('mysql:dbname=site;host=localhost', 'root', '');
        $db->setAttribute(db::ATTR_ERRMODE, db::ERRMODE_EXCEPTION);
        $db->setAttribute(db::ATTR_DEFAULT_FETCH_MODE, db::FETCH_OBJ);
    }

    public function listeUser(): array {
        $dossier = './utilisateur/';
        $files = scandir($dossier);
        $listeUser = [];
        foreach ($files as $user) {
            if (!is_dir($user)) {
                $listeUser[] = unserialize(file_get_contents($dossier . $user));
            }
        }
        return $listeUser;
    }

    public function listePosts(): array {
        $dossier = './posts/';
        $files = scandir($dossier);
        $listePosts = [];
        foreach ($files as $post) {
            if (!is_dir($post)) {
                $listePosts[] = unserialize(file_get_contents($dossier . $post));
            }
        }
        return $listePosts;
    }

}
