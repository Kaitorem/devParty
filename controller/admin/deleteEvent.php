<?php
require_once dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'Repository' . DIRECTORY_SEPARATOR . 'EvenementRepository.php';

use App\Repository\EvenementRepository;



if (isset($_GET['id'])) {
    $id = $_GET['id'];
    EvenementRepository\delete($id);
}

header("Status: 301 Moved Permanently", false, 301);
header("Location: http://localhost:8888/sitedev/DevParty/view/admin/admin.php");
//header("Location: http://localhost:63342/DevParty-main/view/public/index.php");
exit;
