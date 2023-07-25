<?php
namespace App\Repository\EvenementRepository;

require_once('Connection.php');
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Model' . DIRECTORY_SEPARATOR . 'Evenement.class.php';
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Model' . DIRECTORY_SEPARATOR . 'Categorie.class.php';
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Model' . DIRECTORY_SEPARATOR . 'User.class.php';
require_once 'CategorieRepository.php';
require_once 'UserRepository.php';
//require_once($_SERVER['DOCUMENT_ROOT'] . '/Model/Evenement.class.php');
//require_once($_SERVER['DOCUMENT_ROOT'] . '/Model/Categorie.class.php');
//require_once($_SERVER['DOCUMENT_ROOT'] . '/Model/User.class.php');

use Evenement;
use PDO;

function add(Evenement $evenement) {
    global $bdd;
    $request = $bdd->prepare("INSERT INTO evenements VALUES ( null, :titre, :description, :image, :categorie, :nbrParticipant, :createur, :prix, :date);");
    $request->bindValue(":titre", $evenement->getTitre());
    $request->bindValue(":description", $evenement->getDescription());
    $request->bindValue(":image", $evenement->getImage());
    $request->bindValue(":categorie", $evenement->getCategorie()->getId(), PDO::PARAM_INT);
    $request->bindValue(":nbrParticipant", $evenement->getNbrParticipant(), PDO::PARAM_INT);
    $request->bindValue(":createur", $evenement->getCreateur()->getId(), PDO::PARAM_INT);
    $request->bindValue(":prix", strval($evenement->getPrix()));
    $request->bindValue(":date", $evenement->getDate());
    $request->execute();
    $id = $bdd->lastInsertId();
    $evenement->setId($id);
}

function update(Evenement $evenement) {
    global $bdd;
    $request = $bdd->prepare("UPDATE evenements SET titre = :titre, description = :description, image = :image, categorie = :categorie, nbrParticipant = :nbrParticipant, createur = :createur, prix = :prix, date = :date WHERE id = :id");
    $request->bindValue(":titre", $evenement->getTitre());
    $request->bindValue(":description", $evenement->getDescription());
    $request->bindValue(":image", $evenement->getImage());
    $request->bindValue(":categorie", $evenement->getCategorie()->getId());
    $request->bindValue(":nbrParticipant", $evenement->getNbrParticipant());
    $request->bindValue(":createur", $evenement->getCreateur()->getId());
    $request->bindValue(":prix", $evenement->getPrix());
    $request->bindValue(":date", $evenement->getDate());
    $request->bindValue(":id", $evenement->getId());
    $request->execute();
}

function findOneById(int $id): Evenement {
    global $bdd;
    $request = $bdd->prepare("SELECT * FROM evenements WHERE id = :id;");
    $request->bindValue(":id", $id);
    $request->execute();
    $result = $request->fetch();
    $categorie = \App\Repository\CategorieRepository\findOneById($result['categorie']);
    $createur = \App\Repository\UserRepository\findOneById($result['createur']);
    return new Evenement($result['id'],$result['titre'], $result['description'], $result['image'], $categorie, $result['nbrParticipant'], $createur, $result['prix'], $result['date']);
}

function findAll(): array {
    global $bdd;
    $request = $bdd->prepare("SELECT * FROM evenements;");
    $request->execute();
    $result = $request->fetchAll();
    $array = [];
    foreach ($result as $item) {
        $categorie = \App\Repository\CategorieRepository\findOneById($item['categorie']);
        $createur = \App\Repository\UserRepository\findOneById($item['createur']);
        $evenement = new Evenement($item['id'], $item['titre'], $item['description'], $item['image'], $categorie, $item['nbrParticipant'], $createur, $item['prix'], $item['date']);
        $array[] = $evenement;
    }
    return $array;
}

function delete(int $id) {
    global $bdd;
    $request = $bdd->prepare("DELETE FROM evenements WHERE id = :id;");
    $request->bindValue(":id", $id);
    $request->execute();
}

function findAllDescById(): array {
    global $bdd;
    $request = $bdd->prepare("SELECT * FROM `evenements` ORDER BY id DESC;");
    $request->execute();
    $result = $request->fetchAll();
    $array = [];
    foreach ($result as $item) {
        $categorie = \App\Repository\CategorieRepository\findOneById($item['categorie']);
        $createur = \App\Repository\UserRepository\findOneById($item['createur']);
        $evenement = new Evenement($item['id'], $item['titre'], $item['description'], $item['image'], $categorie, $item['nbrParticipant'], $createur, $item['prix'], $item['date']);
        $array[] = $evenement;
    }
    return $array;
}
