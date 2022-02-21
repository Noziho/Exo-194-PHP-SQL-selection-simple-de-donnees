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


$stmt = DB_Connect::dbConnect()->prepare("
    SELECT * FROM user
");



if ($stmt->execute()) {
    foreach ($stmt->fetchAll() as $user) { ?>
        <div>Utilisateur: <?= $user['nom'] . " " . $user['prenom'] . "<br>" .
        "Rue: " . $user['rue'] . "<br>" .
        "Numero: " . $user['numero']. "<br>".
        "Code postal: " . $user['code_postal'] . "<br>" .
        "Ville: " . $user['ville'] . "<br>" .
        "Pays: " . $user['pays'] . "<br>" .
        "Mail: " .$user['mail'] . "<br>" . "<br><br>"

        ?></div><?php

    }
}