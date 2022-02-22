<?php
require __DIR__ . '/Config.php';
require __DIR__ . '/DB_Connect.php';
/**
 * 1. Importez le fichier SQL se trouvant dans le dossier SQL.
 * 2. Connectez vous à votre base de données avec PHP
 * 3. Sélectionnez tous les utilisateurs et affichez toutes les infos proprement dans un div avec du css
 *    ex:  <div class="classe-css-utilisateur">
 *              utilisateur 1, données ( nom, prenom, etc ... )
 *         </div>
 *         <div class="classe-css-utilisateur">
 *              utilisateur 2, données ( nom, prenom, etc ... )
 *         </div>
 * 4. Faites la même chose, mais cette fois ci, triez le résultat selon la colonne ID, du plus grand au plus petit.
 * 5. Faites la même chose, mais cette fois ci en ne sélectionnant que les noms et les prénoms.
 */

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>


<h1>Non trié</h1>
<?php
$stmt = DB_Connect::dbConnect()->prepare("
    SELECT * FROM user
");


if ($stmt->execute()) {
    foreach ($stmt->fetchAll() as $user) { ?>
        <div><?php
        foreach ($user as $key => $value) {
            echo $key . " : " . $value . "<br><br><hr>";
        } ?>

        </div><?php
    }
} ?>
<h1>Trié en DESC: </h1>
<?php

$stmt = DB_Connect::dbConnect()->prepare("
    SELECT * FROM user ORDER BY id DESC
");


if ($stmt->execute()) {
    foreach ($stmt->fetchAll() as $user) { ?>
        <div>
            <?php
            foreach ($user as $key => $value) {
                echo $key . " : " . $value . "<br><br><hr>";
            } ?>

        </div>
        <?php

    }
}

?>
<h1>Trié en DESC avec nom et prénoms: </h1>
<?php

$stmt = DB_Connect::dbConnect()->prepare("
    SELECT * FROM user ORDER BY id DESC
");


if ($stmt->execute()) {
    foreach ($stmt->fetchAll() as $user) { ?>
        <div>Utilisateur: <?= $user['nom'] . " " . $user['prenom'] . "<br><br>"

        ?></div><?php

    }
} ?>

</body>
</html>