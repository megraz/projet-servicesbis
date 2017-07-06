<?php

class Post {

    public $title;
    public $categorie;
    public $photo;
    public $date;
    public $description;
    public $localisation;
    public $price;
    public $author;

    function __construct($title, $photo, $description, $price, $categorie, User $author) {
        $this->title = $title;
        $this->categorie = $categorie;
        $this->photo = $photo;
        $this->date = new DateTime();
        $this->description = $description;
        //$this->localisation = $localisation;
        $this->price = $price;
        $this->author = $author->getPseudo();
    }

    function getTitle() {
        return $this->title;
    }

    function getCategorie() {
        return $this->categorie;
    }

    function getPhoto() {
        return $this->photo;
    }

    function getDate() {
        return $this->date;
    }

    function getDescription() {
        return $this->description;
    }

    function getLocalisation() {
        return $this->localisation;
    }

    function getPrice() {
        return $this->price;
    }

    function getAuthor() {
        return $this->author;
    }

    function setTitle($title) {
        $this->title = $title;
    }

    function setCategorie($categorie) {
        $this->categorie = $categorie;
    }

    function setPhoto($photo) {
        $this->photo = $photo;
    }

    function setDate($date) {
        $this->date = $date;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    function setLocalisation($localisation) {
        $this->localisation = $localisation;
    }

    function setPrice($price) {
        $this->price = $price;
    }

    function setAuthor($author) {
        $this->author = $author;
    }

    //afficher un post
  /*  public function affichePost() {
        return '</pre><pre><img src="' .
                $this->getPhoto() . '"></pre><pre>' .
                $this->getDescription() . '</pre><pre>' .
                $this->getPrice() . '€</pre><pre>' .
                //$post->getDate()->format('d/m/y H:i') . '</pre>';
                $this->getCategorie() . '</pre><pre>' .
                $this->getAuthor() . '</pre>';
    }*/

}
