<?php
include "connexion.php";

if (isset($_POST['ajouter'])) {
    $nom = $_POST['nom'];
    $prix = $_POST['prix'];

    $sql = "INSERT INTO produit (nom, prix) VALUES (?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nom, $prix]);

    header("Location: liste_produits.php");
}
?>

<!DOCTYPE html>
<html>
<head><title>Ajouter produit</title></head>
<body>

<h2>Ajouter un produit</h2>

<form method="post">
    Nom : <input type="text" name="nom" required><br><br>
    Prix : <input type="number" step="0.01" name="prix" required><br><br>
Date_ajout:<input type="date" name="date_ajout" required><br><br>

    <button type="submit" name="ajouter">Ajouter</button>
</form>

<a href="liste_produits.php">Voir les produits</a>

</body>
</html>
