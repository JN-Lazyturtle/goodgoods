<?php
session_start();
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <style>.produit{
            border: 1px dotted black;

        }
    </style>
</head>
<body>

<?php

$lesProduits=[1=>['nom'=>'Oxygène tropicale', 'prixU'=>20, 'libelle'=>"Oxygène en provenance direct de Tahiti"],
    2=>['nom'=>'Oxygène parisienne', 'prixU'=>15, 'libelle'=>"Oxygène en provenance direct de la capitale de l'amour"],
    3=>['nom'=>'Oxygène marine', 'prixU'=>25, 'libelle'=>"Oxygène en provenance direct des fonds marins"],
];
foreach ($lesProduits as $id => $leProduit) {
    echo "<div class='produit'><div>Produit n°{$id}</div>"
        . "<div>Tarif : {$leProduit['nom']}</div>"
        . "<div>Tarif : {$leProduit['libelle']}</div>"
        . "<div>Tarif : {$leProduit['prixU']}</div>"
        . "<div><a href='ajoutPanier.php?id=$id&prixU=&page=listeProduits'>+</a></div></div>";
}

$quantite = 0;
$panier = $_SESSION['panier'];
foreach ($_SESSION['panier'] as $id => $produit)
    $quantite+=$produit['qte'];
echo "<div> Panier : " . $quantite . " produits</div>
                <div><a href='voirPanier.php'>Voir panier</a></div>";

echo "<pre> print_r($panier) </pre>";
?>
</body>
</html>
