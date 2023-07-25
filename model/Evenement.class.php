<?php

class Evenement {

    private ?int $id;
    private string $titre;
    private string $description;
    private string $image;
    private Categorie $categorie;
    private int $nbrParticipant;
    private User $createur;
    private float $prix;
    private string $date;

    public function __construct($id, $titre, $description, $image, $categorie, $nbrParticipant, $createur, $prix, $date) {
        
        $this->id = $id;
        $this->titre = $titre;
        $this-> description = $description;
        $this->image = $image;
        $this->categorie = $categorie;
        $this->nbrParticipant = $nbrParticipant;
        $this->createur = $createur;
        $this->prix = $prix;
        $this->date = $date;
    }

    public function getId() {
        return $this->id;
    }

    public function setId(int $id) {
        $this->id = $id;
    }

    public function getTitre() {
        return $this->titre;
    }

    public function setTitre(string $titre) {
        $this->titre = $titre;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription(string $description) {
        $this->description = $description;
    }

    public function getImage() {
        return $this->image;
    }

    public function setImage(string $image) {
        $this->image = $image;
    }

    public function getCategorie() {
        return $this->categorie;
    }

    public function setCategorie(Categorie $categorie) {
        $this->categorie = $categorie;
    }

    public function getNbrParticipant() {
        return $this->nbrParticipant;
    }

    public function setNbrParticipant(int $nbrParticipant) {
        $this->nbrParticipant = $nbrParticipant;
    }

    public function getCreateur() {
        return $this->createur;
    }

    public function setCreateur(User $createur) {
        $this->createur = $createur;
    }

    public function getPrix() {
        return $this->prix;
    }

    public function setPrix(float $prix) {
        $this->prix = $prix;
    }

    public function getDate() {
        return $this->date;
    }

    public function setDate(string $date) {
        $this->date = $date;
    }
}