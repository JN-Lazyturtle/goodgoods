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
