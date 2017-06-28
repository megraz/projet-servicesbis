<?php

class Post {

    protected $title;
    protected $categorie;
    protected $photo;
    protected $date;
    protected $description;
    protected $localisation;
    protected $price;

    function __construct($title, $categorie, $photo, $date, $description, $localisation, $price) {
        $this->title = $title;
        $this->categorie = $categorie;
        $this->photo = $photo;
        $this->date = $date;
        $this->description = $description;
        $this->localisation = $localisation;
        $this->price = $price;
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



}
