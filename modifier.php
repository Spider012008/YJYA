<?php
include "connexion.php";

$id = $_GET['id'];

if (isset($_POST['modifier'])) {
    $nom  = $_POST['nom'];
    $prix = $_POST['prix'];
    $date = $_POST['date_ajout'];

    $sql = "UPDATE produit SET nom=?, prix=?, date_ajout=? WHERE id_produit=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nom, $prix, $date, $id]);

    header("Location: liste_produits.php");
}

$stmt = $pdo->prepare("SELECT * FROM produit WHERE id_produit=?");
$stmt->execute([$id]);
$p = $stmt->fetch();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Modifier produit</title>
</head>
<body>

<h2>Modifier le produit</h2>

<form method="post">
    Nom : <input type="text" name="nom" value="<?= $p['nom'] ?>" required><br><br>
    Prix : <input type="number" step="0.01" name="prix" value="<?= $p['prix'] ?>" required><br><br>
    Date : <input type="date" name="date_ajout" value="<?= $p['date_ajout'] ?>" required><br><br>

    <button type="submit" name="modifier">Modifier</button>
</form>

</body>
</html>
