
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
//$nbVisite = 1;
//$_SESSION["connecté"]="oui";
//$_SESSION["Nb de visite"]=$nbVisite+$nbVisite;
if(!isset($_SESSION['visite'])){
    $_SESSION['visite'] = 1;
}else
    $_SESSION['visite']++;
echo $_SESSION['visite'];


// GESTION DU PANIER
if(!isset($_SESSION['panier'])){
    // ce tableau n'est pas présent dans la session
    $_SESSION['panier'] = [];
}
$panier = $_SESSION['panier'];

$id_p = $_GET['id'];
$prixU = $_GET['prixU'];

if (!isset($panier[$id_p])){
    // ce produit n'est pas présent dans le panier
    $panier[$id_p]=['qte'=>1, 'prixU'=>$prixU];
} else {
    $panier[$id_p]['qte']++;
}
$_SESSION['panier']=$panier;
//header('Location:listeProduits.php');

echo "<pre>";
//print_r($panier);
echo "yo mama";
echo "</pre>";
?>
<a href="controller/routeur.php?action=readAll">Voir produit</a>;
<a href="deconnexion.php">O</a>;

</body>
</html>