<?php
include "connexion.php";

$produit_plus = null;

if (isset($_POST['rechercher'])) {
    $date_debut = $_POST['date_debut'];
    $date_fin   = $_POST['date_fin'];

    // Requête : somme des quantités par produit sur la période
    $sql = "SELECT p.nom, SUM(a.quantite) AS total_achete
            FROM achat a
            JOIN produit p ON a.id_produit = p.id_produit
            WHERE a.date_achat BETWEEN ? AND ?
            GROUP BY a.id_produit
            ORDER BY total_achete DESC
            LIMIT 1";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$date_debut, $date_fin]);

    $produit_plus = $stmt->fetch();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Produit le plus acheté</title>
</head>
<body>

<h2>Produit le plus acheté sur une période</h2>

<form method="post">
    Date début : <input type="date" name="date_debut" required>
    Date fin   : <input type="date" name="date_fin" required>
    <button type="submit" name="rechercher">Rechercher</button>
</form>

<?php if ($produit_plus): ?>
    <h3>Résultat :</h3>
    <p>Produit : <strong><?= $produit_plus['nom'] ?></strong></p>
    <p>Quantité vendue : <strong><?= $produit_plus['total_achete'] ?></strong></p>
<?php elseif (isset($_POST['rechercher'])): ?>
    <p>Aucun produit trouvé sur cette période.</p>
<?php endif; ?>

<a href="liste_produits.php">Retour à la liste des produits</a>

</body>
</html>
