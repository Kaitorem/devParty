<?php
namespace App\Repository\RoleRepository;

use Role;

require_once('Connection.php');
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Model' . DIRECTORY_SEPARATOR . 'Role.class.php';
//require_once($_SERVER['DOCUMENT_ROOT'].'/Model/Role.class.php');



function add(Role $role) {
    global $bdd;
    $request = $bdd->prepare("INSERT INTO roles VALUES ( null, :libelle);");
    $request->bindValue(":libelle", $role->getLibelle());
    $request->execute();
    $id = $bdd->lastInsertId();
    $role->setId($id);
}

function update(Role $role) {
    global $bdd;
    $request = $bdd->prepare("UPDATE roles SET libelle = :libelle WHERE id = :id");
    $request->bindValue(":libelle", $role->getLibelle());
    $request->bindValue(":id", $role->getId());
    $request->execute();
}

function findOneById(int $id): Role
{
    global $bdd;
    $request = $bdd->prepare("SELECT * FROM roles WHERE id = :id;");
    $request->bindValue(":id", $id);
    $request->execute();
    $result = $request->fetch();
    return new Role($result['libelle'], $result['id']);
}

function findAll() : array {
    global $bdd;
    $request = $bdd->prepare("SELECT * FROM roles;");
    $request->execute();
    $result = $request->fetchAll();
    $array = [];
    foreach ($result as $item) {
        $role = new Role($item['libelle'], $item['id']);
        $array[] = $role;
    }
    return $array;
}

function delete(int $id) {
    global $bdd;
    $request = $bdd->prepare("DELETE FROM roles WHERE id = :id;");
    $request->bindValue(":id", $id);
    $request->execute();
}