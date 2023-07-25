<?php
// Initialiser la session
session_start();

// Détruire la session.
if(session_destroy())
{
    // Redirection vers la page de connexion
    header("Status: 301 Moved Permanently", false, 301);
    header("Location: http://localhost:8888/sitedev/DevParty/view/public/index.php");
    //header("Location: http://localhost:63342/DevParty-main/view/public/index.php");
}
?>