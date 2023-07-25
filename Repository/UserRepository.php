<?php
namespace App\Repository\UserRepository;
use App\Repository\RoleRepository as RoleRepository;
use User;
use Evenement;

require_once('Connection.php');
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Model' . DIRECTORY_SEPARATOR . 'User.class.php';
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Model' . DIRECTORY_SEPARATOR . 'Evenement.class.php';
//require_once($_SERVER['DOCUMENT_ROOT'].'/Model/User.class.php');
require_once 'RoleRepository.php';


function add(User $user) {
    // // Creation de la connexion a la base de données avec la variable $bdd qui contient la connnexion PDO
    global $bdd;
    // // Preparation de notre requete SQL
    $request = $bdd->prepare("INSERT INTO users VALUES ( null, :email, :password, :nom, :prenom, :role);");
    // // Remplacement des variables par des valeurs
    $request->bindValue(":nom", $user->getNom());
    $request->bindValue(":prenom", $user->getPrenom());
    $request->bindValue(":email", $user->getEmail());
    $request->bindValue(":password", $user->getPassword());
    $request->bindValue(":role", $user->getRole()->getId());
    // // Execution de la requete
    $request->execute();
    $id = $bdd->lastInsertId();
    $user->setId($id);
}

function update(User $user) {
    global $bdd;
    $request = $bdd->prepare("UPDATE users SET nom = :nom, prenom = :prenom, email = :email, password = :password, role = :role WHERE id = :id;");
    $request->bindValue(":nom", $user->getNom());
    $request->bindValue(":prenom", $user->getPrenom());
    $request->bindValue(":email", $user->getEmail());
    $request->bindValue(":password", $user->getPassword());
    $request->bindValue(":role", $user->getRole()->getId());
    $request->bindValue(":id", $user->getId());
    $request->execute();
}

function findOneById(int $id): User
{
    global $bdd;
    $request = $bdd->prepare("SELECT * FROM users WHERE id = :id;");
    $request->bindValue(":id", $id);
    $request->execute();
    $result = $request->fetch();

    $role = RoleRepository\findOneById($result['role']);

    return new User($result['id'], $result['email'], $result['password'], $result['nom'], $result['prenom'], $role);
}

function findOneByEmailAndPassword(string $email, string $password): User
{
    global $bdd;
    $request = $bdd->prepare("SELECT * FROM users WHERE email = :email AND password = :password;");
    $request->bindValue(":email", $email);
    $request->bindValue(":password", $password);
    $request->execute();
    $result = $request->fetch();
    $role = RoleRepository\findOneById($result['role']);

    return new User($result['id'], $result['email'], $result['password'], $result['nom'], $result['prenom'], $role);
}

function findOneByEmail(string $email): User
{
    global $bdd;
    $request = $bdd->prepare("SELECT * FROM users WHERE email = :email;");
    $request->bindValue(":email", $email);
    $request->execute();
    $result = $request->fetch();
    $role = RoleRepository\findOneById($result['role']);

    return new User($result['id'], $result['email'], $result['password'], $result['nom'], $result['prenom'], $role);
}

function findAll() : array {
    global $bdd;
    $request = $bdd->prepare("SELECT * FROM users;");
    $request->execute();
    $result = $request->fetchAll();
    $array = [];
    foreach ($result as $item) {
        $role = RoleRepository\findOneById($item['role']);
        $user = new User($item['id'], $item['email'], $item['password'], $item['nom'], $item['prenom'], $role);
        $array[] = $user;
    }
    return $array;
}

function delete(int $id) {
    global $bdd;
    $request = $bdd->prepare("DELETE FROM users WHERE id = :id;");
    $request->bindValue(":id", $id);
    $request->execute();
}

function inscriptionEvenement(User $user, Evenement $event) {
    global $bdd;
    $request = $bdd->prepare("INSERT INTO inscriptions VALUES (:id_evenement, :id_user);");
    $request->bindValue(":id_evenement", $event->getId(), \PDO::PARAM_INT);
    $request->bindValue(":id_user", $user->getId(), \PDO::PARAM_INT);
    try {
        $request->execute();
    } catch (\Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}