<?php
$prixTotalPanier = 0;
if (empty($panier->getLignesPanier())) {
    echo "<h3> vous n'avez rien dans votre panier, pour revenir aux achats cliquez <a href='indexx.php'>ici</a></h3>";
} else {
    echo "<div>Mon panier</div>";
    echo "<table>
    <thead>
        <tr>
            <th>nom</th>
            <th>qte</th>
            <th>prix</th>
            <th>montant total</th>
        </tr>
    </thead>
    <tbody>";
    echo "<pre>".print_r($panier->getLignesPanier())."</pre>";
        foreach ($panier->getLignesPanier() as $id => $qte) {
            $produit = ModelProduit::getProduitParId($id);
            $prixTotal = $produit->getPrix() * $qte;
            $prixTotalPanier += $prixTotal;
            echo "<tr> 
            <td>" . $produit->getNom() . "</td>
            <td>" . $qte . "</td>
            <td>" . $produit->getPrix() . "</td>
            <td>" . $prixTotal . "</td>   
            <th><a href='indexx.php?action=majPanierAjout&controller=ControllerPanier&id=$id&view=panier'>+</a></th></tr></tr>
            <th><a href='indexx.php?action=majPanierSupp&controller=ControllerPanier&id=$id'>-</a></th></tr></tr>";

        }
        echo " </tbody >
        </table > ";
        echo $prixTotalPanier;
}

