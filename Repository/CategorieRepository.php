<?php
namespace App\Repository\CategorieRepository;

use Categorie;

require_once('Connection.php');
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Model' . DIRECTORY_SEPARATOR . 'Categorie.class.php';
//require_once($_SERVER['DOCUMENT_ROOT'].'/Model/Categorie.class.php');



function add(Categorie $categorie) {
    global $bdd;
    $request = $bdd->prepare("INSERT INTO categories VALUES ( null, :libelle);");
    $request->bindValue(":libelle", $categorie->getLibelle());
    $request->execute();
    $id = $bdd->lastInsertId();
    $categorie->setId($id);
}

function update(Categorie $categorie) {
    global $bdd;
    $request = $bdd->prepare("UPDATE categories SET libelle = :libelle WHERE id = :id");
    $request->bindValue(":libelle", $categorie->getLibelle());
    $request->bindValue(":id", $categorie->getId());
    $request->execute();
}

function findOneById($id) : Categorie {
    global $bdd;
    $request = $bdd->prepare("SELECT * FROM categories WHERE id = :id;");
    $request->bindValue(":id", $id);
    $request->execute();
    $result = $request->fetch();
    return new Categorie($result['libelle'], $result['id']);

}

function findAll() : array {
    global $bdd;
    $request = $bdd->prepare("SELECT * FROM categories;");
    $request->execute();
    $result = $request->fetchAll();
    $array = [];
    foreach ($result as $item) {
        $categorie = new Categorie($item['libelle'], $item['id']);
        $array[] = $categorie;
    }
    return $array;
}

function delete(int $id) {
    global $bdd;
    $request = $bdd->prepare("DELETE FROM categories WHERE id = :id;");
    $request->bindValue(":id", $id);
    $request->execute();
}