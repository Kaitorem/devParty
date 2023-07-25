<?php
session_start();
require_once dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'Repository' . DIRECTORY_SEPARATOR . 'UserRepository.php';
require_once dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'Repository' . DIRECTORY_SEPARATOR . 'EvenementRepository.php';

use App\Repository\UserRepository;
use App\Repository\EvenementRepository;



if (isset($_SESSION['username']) && isset($_GET['id'])) {
    $user = UserRepository\findOneByEmail($_SESSION['username']);
    $id = $_GET['id'];
    $event = EvenementRepository\findOneById($id);
    $event->setNbrParticipant($event->getNbrParticipant() + 1);
    EvenementRepository\update($event);
    UserRepository\inscriptionEvenement($user, $event);
}

if (!isset($_SESSION['username'])) {
    header("Status: 301 Moved Permanently", false, 301);
    header("Location: http://localhost:8888/sitedev/DevParty/view/public/index.php");
    //header("Location: http://localhost:63342/DevParty-main/view/public/index.php");
    exit;
}

if ($user->getRole()->getLibelle() === 'Etudiant') {
    header("Status: 301 Moved Permanently", false, 301);
    header("Location: http://localhost:8888/sitedev/DevParty/view/public/connect.php");
    //header("Location: http://localhost:63342/DevParty-main/view/public/index.php");
    exit;
} elseif (!isset($_SESSION['username'])) {
    header("Status: 301 Moved Permanently", false, 301);
    header("Location: http://localhost:8888/sitedev/DevParty/view/public/index.php");
    //header("Location: http://localhost:63342/DevParty-main/view/public/index.php");
    exit;
}

if ($user->getRole()->getLibelle() === 'Administrateur' || $user->getRole()->getLibelle() === 'Membre') {
    header("Status: 301 Moved Permanently", false, 301);
    header("Location: http://localhost:8888/sitedev/DevParty/view/admin/admin.php");
    //header("Location: http://localhost:63342/DevParty-main/view/public/index.php");
    exit;
}
