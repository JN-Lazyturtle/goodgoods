<?php
//session_start();
//?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>
<?php

$prixTotal = 0;
$prixTotalPanier = 0;

echo "<div>Mon panier</div>";

echo "<table> <thead> 
<tr><th>Produit :</th><th>Quantité :</th><th>Prix unitaire :</th><th>Montant total :</th><th>Ajouter :</th><th>Supprimer :</th></tr>";

foreach ($_SESSION['panier'] as $id => $produit)
    $prixTotal = $produit['prixU']*$produit['qte'];
$prixTotalPanier += $prixTotal;
echo "<tr><th>$id</th><th>{$produit['qte']}</th><th>{$produit['prixU']}</th><th>$prixTotal</th>
            <th><a href='ajoutPanier.php?id=$id&prixU={$produit['prixU']}&page=voirPanier'>+</a></th>
            <th><a href='suppPanier.php?id=$id&prixU={$produit['prixU']}&page=voirPanier'>-</a></th></tr>
</thead>";

echo "<div>$prixTotalPanier</div>";
echo "<div><a href='listeProduits.php'>Retour aux produits</a></div>"
?>
</body>
</html>