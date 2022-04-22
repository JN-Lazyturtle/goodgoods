<?php
session_start();
error_reporting(E_ALL); //pour forcer l'affichage des warnings
ini_set('display_errors', 1);
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php


// GESTION DU PANIER
if (!isset($_SESSION['panier'])) {
    // ce tableau n'est pas présent dans la session
    $_SESSION['panier'] = [];
}
$panier = $_SESSION['panier'];

$idProduit = $_GET['idProduit'];
$prix = $_GET['prix'];
$page = $_GET['page'];


    if (!isset($panier[$idProduit])) {
        // ce produit n'est pas présent dans le panier
        $panier[$idProduit] = ['qte' => 1, 'prixU' => $prix];
    } else {
        $panier[$idProduit]['qte']++;
    }


$_SESSION['panier'] = $panier;
header('Location:'.$page.'.php');

echo "<pre>";
print_r($panier);
"</pre>";
?>


</body>
</html>
