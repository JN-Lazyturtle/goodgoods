<?php
$prixTotal = 0;
$prixTotalPanier = 0;

echo "<div>Mon panier</div>";

echo "<table> <thead> 
<tr><th>Produit :</th><th>Quantité :</th><th>Prix unitaire :</th><th>Montant total :</th><th>Ajouter :</th><th>Supprimer :</th></tr>";

if(!empty($_SESSION['panier']->getLignesPanier())){
foreach ($_SESSION['panier']->getLignesPanier() as $idProduit => $quantite)
    $produit = ModelProduit::getProduitParId($idProduit);
    $prixTotal = $produit->getPrix()*$quantite;
    $prixTotalPanier += $prixTotal;
echo "<tr><th>$produit->getNom()</th><th>{$quantite}</th><th>{$produit['prixU']}</th><th>$produit->getPrix()</th>
            <th><a href='ajoutPanier.php?id=$idProduit&prixU={$produit['prixU']}&page=voirPanier'>+</a></th>
            <th><a href='suppPanier.php?id=$idProduit&prixU={$produit['prixU']}&page=voirPanier'>-</a></th></tr>
</thead>";

echo "<div>$prixTotalPanier</div>";
}
echo "<div><a href='view/produits.php'>Retour aux produits</a></div>"
?>