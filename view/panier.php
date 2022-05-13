<?php
if (empty($panier->getLignesPanier())) {
    echo "<h3> vous n'avez rien dans votre panier, pour revenir aux achats cliquez <a href='listeProduits.php'>ici</a></h3>";
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
        foreach ($panier->getLignesPanier() as $id => $qte) {
            $produit = ModelProduit::getProduitParId($id);
            echo "<tr> 
            <td>" . $produit->getNom() . "</td>
            <td>" . $qte . "</td>
            <td>" . $produit->getPrix() . "</td>
            <td>" . $produit->getPrix() * $qte . "</td>   
            <th><a href='indexx.php?controller=ControllerPanier&action=majPanierSupp&idProduit=' . $produit->getID().>-</a></th></tr></tr>'";
        }
        echo " </tbody >
        </table > ";
}

