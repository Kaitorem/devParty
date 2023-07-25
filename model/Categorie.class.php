<?php

class Categorie {

    private $id;
    private string $libelle;

    public function __construct($libelle, $id = null) {
        $this->id = $id;
        $this->libelle = $libelle;
    }

    public function getId() {
        return $this->id;
    }

    public function setId(int $id) {
        $this->id = $id;
    }

    public function getLibelle() {
        return $this->libelle;
    }

    public function setLibelle(string $libelle) {
        $this->libelle = $libelle;
    }

}