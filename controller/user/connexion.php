<?php
session_start();

require_once dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'Repository' . DIRECTORY_SEPARATOR . 'UserRepository.php';
//require_once($_SERVER['DOCUMENT_ROOT'].'/Repository/UserRepository.php');

use App\Repository\UserRepository as UserRepository;

if (isset($_POST['email']) && isset($_POST['mdp'])) {
    $email = $_POST['email'];
    $password = $_POST['mdp'];
    $user = UserRepository\findOneByEmailAndPassword($email, $password);
    $_SESSION['username'] = $user->getEmail();
    if ($user->getRole()->getLibelle() === 'Administrateur') {
        header("Status: 301 Moved Permanently", false, 301);
        header("Location: http://localhost:8888/sitedev/DevParty/view/admin/admin.php");
        //header("Location: http://localhost:63342/DevParty-main/view/admin/admin.php");
        exit;
    } elseif ($user->getRole()->getLibelle() === 'Membre') {
        header("Status: 301 Moved Permanently", false, 301);
        header("Location: http://localhost:8888/sitedev/DevParty/view/admin/membre.php");
        //header("Location: http://localhost:63342/DevParty-main/view/public/index.php");
        exit;
    } else {
      header("Status: 301 Moved Permanently", false, 301);
      header("Location: http://localhost:8888/sitedev/DevParty/view/public/connect.php");
      //header("Location: http://localhost:63342/DevParty-main/view/public/index.php");
      exit;
  }
} else {
    echo 'Tous les champs doivent etre renseigner !';
    return;
}

header("Status: 301 Moved Permanently", false, 301);
header("Location: http://localhost:8888/sitedev/DevParty/view/public/index.php");
//header("Location: http://localhost:63342/DevParty-main/view/public/index.php");
exit;