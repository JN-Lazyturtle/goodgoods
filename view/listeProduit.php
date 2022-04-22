<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>~ Nos good goods ~</title>
</head>
<body style="background-color: darkolivegreen">
<?php

if (!empty($tab_p)) {
    echo '<pre>';
    print_r($tab_p);
    echo '</pre>';

    echo"<div class='listeProduit'>";
    foreach ($tab_p as $p){
        echo "<div class='cadre' style='width : 60%'>
                    
                    <h2>".$p->getNom()."</h2>
                    <img class='gif' style='width:20%' src='../img/".$p->getIdProduit().".png'>
                    <p>". $p->getDescription() ."</p>
                    <h3>".$p->getPrix()."€</h3>
                    <a href='model/ajoutPanier.php?id=".$p->getIdProduit()."&prix=".$p->getPrix()."&page=listeProduit'>Ajouter au panier</a>

             </div>";
    }
    echo "</div>";
}
?>
</body>
</html>