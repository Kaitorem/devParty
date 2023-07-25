<?php

use function App\Repository\CategorieRepository\add;

require_once dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'Repository' . DIRECTORY_SEPARATOR . 'CategorieRepository.php';
//require_once($_SERVER['DOCUMENT_ROOT'].'\Repository\CategorieRepository.php');

if (isset($_POST['libelle'])) {
    $libelle = $_POST['libelle'];
    $categorie = new Categorie($libelle);
    add($categorie);
}

header("Status: 301 Moved Permanently", false, 301);
header("Location: http://localhost:8888/sitedev/DevParty/view/admin/admin.php");
//header("Location: http://localhost:63342/DevParty/view/admin/admin.php");
exit;