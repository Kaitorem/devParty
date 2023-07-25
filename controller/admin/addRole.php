<?php
use App\Repository\RoleRepository as RoleRepository;

require_once dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'Repository' . DIRECTORY_SEPARATOR . 'RoleRepository.php';
//require_once($_SERVER['DOCUMENT_ROOT'].'\Repository\RoleRepository.php');

if (isset($_POST['libelle'])) {
    $libelle = $_POST['libelle'];
    $role = new Role($libelle);
    RoleRepository\add($role);
}

header("Status: 301 Moved Permanently", false, 301);
header("Location: http://localhost:8888/sitedev/DevParty/view/admin/admin.php");
//header("Location: http://localhost:63342/DevParty/view/admin/index.php");
exit;