<?php
include "connexion.php";

// Récupération des produits triés du plus récent au plus ancien
$stmt = $pdo->query("SELECT * FROM produit ORDER BY date_ajout DESC");
$produits = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Liste des produits (du plus récent au plus ancien)</title>
</head>
<body>

<h2>Liste des produits (du plus récent au plus ancien)</h2>

<?php if (count($produits) > 0): ?>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prix</th>
            <th>Date d'ajout</th>
        </tr>

        <?php foreach ($produits as $p): ?>
        <tr>
            <td><?= $p['id_produit'] ?></td>
            <td><?= $p['nom'] ?></td>
            <td><?= $p['prix'] ?></td>
            <td><?= $p['date_ajout'] ?></td>
        </tr>
        <?php endforeach; ?>
        <?php if (count($produits) > 0): ?>


    </table>
<?php else: ?>
    <p><strong>Aucun produit n’est disponible pour le moment.</strong></p>
<?php endif; ?>

<br>
<a href="ajouter_produit.php">Ajouter un produit</a>

</body>
</html>
