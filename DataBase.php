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
    
    private $db;
    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=site_services', 'admin', 'simplon');
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    
    public function getAllUser() {
        //On exécute la requête de sélection
        $query = $this->db->query('SELECT * FROM user');
        //On crée un tableau vide 
        $users = [];
        //On boucle sur les résultats
        while ($ligne = $query->fetch()) {
            //On crée une instance de chien avec les valeurs
            //de chaque ligne de résultats
            $user = new user($ligne['pseudo'], $ligne['mdp'], $ligne['nom'], $ligne['prenom'], $ligne['mail'], $ligne['avatar'], $ligne['genre'], $ligne['age'], $ligne['annonces'], $ligne['date'], $ligne['id']);
            //On ajoute l'instance en question au tableau
            $users[] = $user;
        }
        //On renvoie le tableau
        return $users;
    }
    
    public function getUserById(int $id) {
        //On prépare la requête de sélection par id avec un
        //placeholder pour la valeur de l'id
        $queryId = $this->db->prepare('SELECT * FROM user WHERE id=:id');
        //On assigne la valeur de l'id avec le paramètre
        //attendu par la fonction
        $queryId->bindValue('id', $id, PDO::PARAM_INT);
        //On exécute la requête
        $queryId->execute();
        //Si on a bien récupérée une seule ligne
        if ($queryId->rowCount() == 1) {
            //On fetch la ligne en question
            $ligneid = $queryId->fetch();
            //On crée une instance de user à partir de cette ligne
            $user = new user($ligneid['pseudo'], $ligneid['mdp'], $ligneid['nom'], $ligneid['prenom'], $ligneid['mail'], $ligneid['avatar'], $ligneid['genre'], $ligneid['age'], $ligneid['annonces'], $ligneid['date'], $ligneid['id']);
            //On retourne l'instance en question
            return $user;
        }
    }
        public function addUser(User $user): bool {
        $pseudo = $user->getPseudo();
        $mdp = $user->getMdp();
        $nom = $user->getNom();
        $prenom = $user->getPrenom();
        $mail = $user->getMail();
        $avatar = $user->getAvatar();
        $genre = $user->getGenre();
        $age = $user->getAge();
        $annonces = $user->getAnnonces();
        $date = $user->getDate()->format('Y-m-d');
        
        $stmt = $this->pdo->prepare('INSERT INTO user (pseudo, mdp, nom, prenom, mail, avatar, genre, age, annonces, date) VALUES (:pseudo, :mdp, :nom, :prenom, :mail, :avatar, :genre, :age, :annonces, :date);');
        $stmt->bindValue('pseudo', $pseudo);
        $stmt->bindValue('mdp', $mdp);
        $stmt->bindValue('nom', $nom);
        $stmt->bindValue('prenom', $prenom);
        $stmt->bindValue('mail', $mail);
        $stmt->bindValue('avatar', $avatar);
        $stmt->bindValue('genre', $genre);
        $stmt->bindValue('age', $age);
        $stmt->bindValue('annonces', $annonces);
        $stmt->bindValue('age', $age);

        if ($stmt->execute()) {

        $user->setId(intval($this->pdo->lastInsertId()));
        return TRUE;
        }
        return FALSE;
        }



/*
//On prépare la requête d'ajout avec des placeholders pour les
        //values
        $queryInsert = $this->db->prepare('INSERT INTO user '
                . '(pseudo, mdp, nom, prenom, mail, avatar, genre, age, annonces, date) '
                . 'VALUES (:pseudo, :mdp, :nom, :prenom, :mail, :avatar, :genre, :age, :annonces, :date)');
        //On assigne les paramètres en les récupérant depuis l'argument
        $queryInsert->bindValue('pseudo', $user->getPseudo(), PDO::PARAM_STR);
        $queryInsert->bindValue('mdp', $user->getMdp(), PDO::PARAM_STR);
        $queryInsert->bindValue('nom', $user->getNom(), PDO::PARAM_STR);
        $queryInsert->bindValue('prenom',$user->getPrenom(), PDO::PARAM_STR);
        $queryInsert->bindValue('mail', $user>getMail(), PDO::PARAM_STR);
        $queryInsert->bindValue('avatar', $user->getAvatar(), PDO::PARAM_STR);
        $queryInsert->bindValue('genre', $user->getGenre(), PDO::PARAM_STR);
        $queryInsert->bindValue('age', $user->getAge(), PDO::PARAM_STR);
        $queryInsert->bindValue('annonces', $user->getAnnonces(), PDO::PARAM_STR);
        $queryInsert->bindValue('date', $user->date()->format('Y-m-d'), PDO::PARAM_STR);
        //On exécute en vérifiant si l'exécution fonctionne ou non
        if ($queryInsert->execute()) {
            //si oui on récupère l'id de la ligne qui vient d'être ajoutée
            //On le convertit en int et on l'assigne à notre user
            $user->setId(intval($this->db->lastInsertId()));
            //On renvoie true pour dire que tout s'est bien passé
            return true;
        }
        //On renvoie false si ya eu un problème quelconque
        return false;
    }
    */
    
    
    
    
    
    
    
    
    
    
    
    
    //CREATE
    //
    /*creer un nouvel utilisateur
    public function createUser(User $user) {
        // On verifie si le dossier utilisateur existe dêjà 
        if (!is_dir('utilisateur')) {
            //sinon on le crée
            mkdir('utilisateur');
        }
        $userdata = serialize($user);
        //On crée un nouveau fichier pour l'utilisateur
        $file = fopen('utilisateur/' . $user->getPseudo() . '.txt', 'w');
        fwrite($file, $userdata);
        fclose($file);
    }*/
    
    
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
    
    //READ
    //
    //unserialize user
    public function readUser($user): User {
        return unserialize(file_get_contents('utilisateur/' . $user . '.txt'));
    }

    //unserialize annonce
    public function readPost($title): Post {
        $post = unserialize(file_get_contents('posts/' . $title . '.txt'));
        return $post;
    }
    
    // pour parcourir les posts
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
    
    //pour parcourir les utilisateurs
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
    
    //UPDATE
    //
    //modifier un article
    public function modifierPost(Post $post, $previoustitle) {
        unlink('posts/' . $previoustitle . '.txt');
        $postdata = serialize($post);
        //On remplace le contenu du fichier comme on avait fait pour la création de celui ci
        $fichier = fopen('posts/' . $post->getTitle() . '.txt', 'w');
        fwrite($fichier, $postdata);
        fclose($fichier);
    }
    
    
    //DELETE
    //
    //suprimer un post
    public function suprimerPost($post) {
        //On supprime le fichier
        unlink('posts/' . $post . '.txt');
    }
    
    
    //AFFICHER
        //afficher un post
    public function affichePost(Post $post) {
        return '</pre><pre><img src="' .
                $post->getPhoto() . '"></pre><pre>' .
                $post->getDescription() . '</pre><pre>' .
                $post->getPrice() . '€</pre><pre>' .
                $post->getDate()->format('d/m/y H:i') . '</pre><pre>Auteur : '.
                $post->getAuthor() . '</pre><pre>Catégorie :' .
                $post->getCategorie() . '</pre>';
    }
    
        //afficher  les infos de l'utilisateur
    public function afficheUser(User $user) {
        return '<pre>Pseudo : ' . $user->getPseudo() . ' <img src="avatars/avatar5.png" width=32px></pre><pre>Nom : ' .
                $user->getNom(). '</pre><pre>Prenom :' .
                $user->getPrenom() . '</pre><pre>Mail :' .
                $user->getMail() . '</pre><pre>genre : ' .
                $user->getGenre() . '</pre><pre>Age :  ' .
                $user->getAge() . '</pre><pre>Date inscription :  '.
                $user->getDate()->format('d/m/y H:i') . '</pre>';
    }
    
    /*afficher photo Avatar
    public function afficheAvatar() {
        $db = new DataBase('mysql:dbname=site_service;host=localhost', 'admin', 'simplon');
        $db->setAttribute(db::ATTR_ERRMODE, db::ERRMODE_EXCEPTION);
        $db->setAttribute(db::ATTR_DEFAULT_FETCH_MODE, db::FETCH_OBJ);
    }*/

}

 
