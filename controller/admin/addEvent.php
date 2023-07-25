<?php

use function App\Repository\EvenementRepository\add;

session_start();
require_once dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'Repository' . DIRECTORY_SEPARATOR . 'CategorieRepository.php';
require_once dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'Repository' . DIRECTORY_SEPARATOR . 'UserRepository.php';
require_once dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'Model' . DIRECTORY_SEPARATOR . 'Evenement.class.php';
require_once dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'Repository' . DIRECTORY_SEPARATOR . 'EvenementRepository.php';
//require_once $_SERVER['DOCUMENT_ROOT'].'/Repository/CategorieRepository.php';
//require_once $_SERVER['DOCUMENT_ROOT'].'/Repository/UserRepository.php';
//require_once($_SERVER['DOCUMENT_ROOT'].'/Model/Evenement.class.php');
//require_once($_SERVER['DOCUMENT_ROOT'].'/Repository/EvenementRepository.php');

if(
    isset($_POST['titre']) &&
    isset($_POST['description']) &&
    isset($_FILES['img']) &&
    isset($_POST['categorie']) &&
    isset($_POST['prix']) &&
    isset($_POST['date'])

) {
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $categorie = \App\Repository\CategorieRepository\findOneById($_POST['categorie']);
    $nbrParticipant = 0;
    $createur = \App\Repository\UserRepository\findOneByEmail($_SESSION['username']);
    $prix = $_POST['prix'];
    $date = $_POST['date'];
    // IMAGE
    $uploaddir = dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'images'. DIRECTORY_SEPARATOR;
    //$uploaddir = $_SERVER['DOCUMENT_ROOT'].'\view\images\\';
    $uploadfile = $uploaddir . basename($_FILES['img']['name']);
    $nameImage = basename($_FILES['img']['name']);

    $evenement = new Evenement(null, $titre, $description, $nameImage, $categorie, $nbrParticipant, $createur, $prix, $date);

    if (move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile)) {
        echo "Le fichier est valide, et a été téléchargé
           avec succès. Voici plus d'informations :\n";
    } else {
        echo "Attaque potentielle par téléchargement de fichiers.
          Voici plus d'informations :\n";
    }
    add($evenement);
}

if ($user->getRole()->getLibelle() === 'Administrateur') {
  header("Status: 301 Moved Permanently", false, 301);
  header("Location: http://localhost:8888/sitedev/DevParty/view/admin/admin.php");
  //header("Location: http://localhost:63342/DevParty-main/view/public/index.php");
  exit;
}
if ($user->getRole()->getLibelle() === 'Membre') {
  header("Status: 301 Moved Permanently", false, 301);
  header("Location: http://localhost:8888/sitedev/DevParty/view/admin/membre.php");
  //header("Location: http://localhost:63342/DevParty-main/view/public/index.php");
  exit;
}


