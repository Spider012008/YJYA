<?php
include "connexion.php";

$id = $_GET['id'];

$sql = "DELETE FROM produit WHERE id_produit=?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);

header("Location: liste_produits.php");
?>
