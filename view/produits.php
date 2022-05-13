<?php

echo "<h1>~ Nos good goods ~</h1>";

echo "<div style='display: flex; justify-content: space-between'>"; // le plus grand div

echo "<div class='listeProduit'>"; // div liste produits (à gauche)
foreach ($tab_p as $p) {
    $source = "img/".$p->getIdProduit().'.png';

    echo "<div class='cadre' style='width : 60%'>
                    <h2>" . $p->getNom() . "</h2>
                    <img class='gif' style='width:15%' src='" . $source . "'>
                    <p>" . $p->getDescription() . "</p>
                    <h3>" . $p->getPrix() . "€</h3>
                    <a href='indexx.php?action=majPanierAjout&controller=ControllerPanier&id=" . $p->getIdProduit() . "&view=produits'>Ajouter au panier</a>
             </div>";
}
echo "</div>"; // div liste produits (à gauche)


echo "<div> <p>Catégories</p>"; // div categorie

foreach ($tab_categorie as $categorie) {
    $categorie = $categorie['nomCategorie'];
    echo "<p> <a href='indexx.php?action=readAll&controller=ControllerProduit&action=readAll&categorie=$categorie'> $categorie </a> </p>";
}

echo "</div>"; // div categorie

echo "</div>"; // le plus grand div



?>
<!--</body>-->
<!--</html>-->