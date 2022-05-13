<?php

echo "<h1>~ Nos good goods ~</h1>";

echo "<div class='listeProduit'>";
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
echo "</div>";



?>
<!--</body>-->
<!--</html>-->