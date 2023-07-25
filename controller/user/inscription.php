<?php

require_once dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'Repository' . DIRECTORY_SEPARATOR . 'UserRepository.php';
//require_once($_SERVER['DOCUMENT_ROOT'].'/Repository/UserRepository.php');

use App\Repository\UserRepository as UserRepository;
use App\Repository\RoleRepository as RoleRepository;


if (isset($_POST['email']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['mdp'])) {
    $email = $_POST['email'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $password = $_POST['mdp'];
    $role = RoleRepository\findOneById(1);
    $user = new User(null, $email, $password, $nom, $prenom, $role);
    UserRepository\add($user);
} else {
    echo 'Tous les champs doivent etre renseigner !';
    return;
}

header("Status: 301 Moved Permanently", false, 301);
header("Location: http://localhost:8888/sitedev/DevParty/view/public/index.php");
//header("Location: http://localhost:63342/DevParty-main/view/public/index.php");
exit;
