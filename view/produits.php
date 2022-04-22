<?php
//session_start();
//?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nos good goods</title>
    </style>
</head>
<header>
    <?php
//    $panier = $_SESSION['panier'];
//    foreach ($_SESSION['panier'] as $id => $produit)
//    $quantite += $produit['qte'];
    echo "<div> Panier : " . 0 . " produits</div>
    <div><a href='indexx.php?action=voirPanier&controller=ControllerPanier'>Voir panier</a></div>";
    ?>
</header>
<body style="background-color: darkolivegreen">
<?php

echo "<h1>~ Nos good goods ~</h1>";

//if (!empty($tab_p)) {
//    echo '<pre>';
//    print_r($tab_p);
//    echo '</pre>';

echo "<div class='listeProduit'>";
foreach ($tab_p as $p) {
    $source = File::build_path(array('img', $p->getIdProduit().'.png'));

    echo "<div class='cadre' style='width : 60%'>
                    <h2>" . $p->getNom() . "</h2>
                    <img class='gif' style='width:15%' src='" . $source . "'>
                    <p>" . $p->getDescription() . "</p>
                    <h3>" . $p->getPrix() . "€</h3>
                    <a href='model/ajoutPanier.php?id=" . $p->getIdProduit() . "&prix=" . $p->getPrix() . "&page=listeProduit'>Ajouter au panier</a>
             </div>";
}
echo "</div>";



?>
</body>
</html>