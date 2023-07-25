<?php

require_once dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'Repository' . DIRECTORY_SEPARATOR . 'CategorieRepository.php';
require_once dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'Model' . DIRECTORY_SEPARATOR . 'Evenement.class.php';
require_once dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'Repository' . DIRECTORY_SEPARATOR . 'EvenementRepository.php';

if( isset($_POST['id']) &&
    isset($_POST['titre']) &&
    isset($_POST['description']) &&
    isset($_POST['categorie']) &&
    isset($_POST['prix']) &&
    isset($_POST['date'])

) {
    $id = $_POST['id'];
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $categorie = \App\Repository\CategorieRepository\findOneById($_POST['categorie']);
    $prix = $_POST['prix'];
    $date = $_POST['date'];

    $evenement = \App\Repository\EvenementRepository\findOneById($id);
    $evenement->setTitre($titre);
    $evenement->setDescription($description);
    $evenement->setCategorie($categorie);
    $evenement->setPrix($prix);
    $evenement->setDate($date);


    \App\Repository\EvenementRepository\update($evenement);
}

header("Status: 301 Moved Permanently", false, 301);
header("Location: http://localhost:8888/sitedev/DevParty/view/admin/updateEvent.php?id=". $evenement->getId());
//header("Location: http://localhost:63342/DevParty-main/view/admin/updateEvent.php?id=". $evenement->getId());
exit;