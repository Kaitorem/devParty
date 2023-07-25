<?php

    require_once dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'Repository' . DIRECTORY_SEPARATOR . 'CategorieRepository.php';
    //require_once $_SERVER['DOCUMENT_ROOT'].'/Repository/CategorieRepository.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Page d'administration</title>
</head>
<body>
    <form action="../../Controller/admin/addRole.php" method="post">
        <fieldset>
            <legend>Formulaire ajout role :</legend>

            <label for="libelleRole">Libelle du role : </label>
            <input type="text" id="libelleRole" name="libelle">

            <input type="submit" value="Enregistrer">
        </fieldset>
    </form>

    <form action="../../Controller/admin/addCategorie.php" method="post">
        <fieldset>
            <legend>Formulaire ajout categorie :</legend>

            <label for="libelleCategorie">Libelle de la categorie : </label>
            <input type="text" id="libelleCategorie" name="libelle">

            <input type="submit" value="Enregistrer">
        </fieldset>
    </form>

    <form action="../../Controller/admin/addEvent.php" method="post" enctype="multipart/form-data">
        <fieldset style="display: flex;flex-direction: column;">
            <legend>Formulaire ajout evenement :</legend>

            <label for="titre">Titre : </label>
            <input type="text" id="titre" name="titre">

            <label for="description">Description : </label>
            <textarea name="description" id="description" cols="30" rows="10"></textarea>

            <label for="img">Photo de l'evenement (max : 2Mo ) : </label>
            <input id="img" name="img" type="file" />

            <label for="categorie">Categorie de l'evenement : </label>
            <select name="categorie" id="categorie">
                <option value="" selected disabled>--Please choose an option--</option>
                <?php
                    $categories = \App\Repository\CategorieRepository\findAll();

                    foreach ($categories as $category) {
                        echo "<option value=".$category->getId().">".$category->getLibelle()."</option>";
                    }
                ?>
            </select>

            <label for="prix">Prix de l'evenement : </label>
            <input type="number" id="prix" name="prix" min="0.00" max="10000.00" step="0.01" />

            <label for="date">Date de l'evenement : </label>
            <input type="date" name="date" id="date">
            
            <input type="submit" value="Enregistrer">
        </fieldset>
    </form>
</body>
</html>