
<?php
class User {
    
    public $pseudo;
    private $mdp;
    public $nom;
    public $prenom;
    public $mail;
    public $avatar;
    public $genre;
    public $age;
    public $annonces;
    
    
    function __construct($pseudo, $mdp, $nom, $prenom, $mail, $avatar, $genre, $age, $annonces) {
        $this->pseudo = $pseudo;
        $this->mdp = $mdp;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->mail = $mail;
        $this->avatar = $avatar;
        $this->genre = $genre;
        $this->age = $age;
        $this->annonces = $annonces;
    }

    function getPseudo() {
        return $this->pseudo;
    }

    function getMdp() {
        return $this->mdp;
    }

    function getNom() {
        return $this->nom;
    }

    function getPrenom() {
        return $this->prenom;
    }

    function getMail() {
        return $this->mail;
    }

    function getAvatar() {
        return $this->avatar;
    }

    function getGenre() {
        return $this->genre;
    }

    function getAge() {
        return $this->age;
    }

    function getAnnonces() {
        return $this->annonces;
    }

    function setPseudo($pseudo) {
        $this->pseudo = $pseudo;
    }

    function setMdp($mdp) {
        $this->mdp = $mdp;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    function setMail($mail) {
        $this->mail = $mail;
    }

    function setAvatar($avatar) {
        $this->avatar = $avatar;
    }

    function setGenre($genre) {
        $this->genre = $genre;
    }

    function setAge($age) {
        $this->age = $age;
    }

    function setAnnonces($annonces) {
        $this->annonces = $annonces;
    }


}
