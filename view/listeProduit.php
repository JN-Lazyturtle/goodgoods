<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Liste des voitures</title>
</head>
<body>
<?php

if (!empty($tab_p)) {
//    echo '<pre>';
//    print_r($tab_p);
//    echo '</pre>';

    echo"<div class='listeProduit'>";
    foreach ($tab_p as $p){
        echo "<div class='cadre' style='background-color: antiquewhite'>
                    
                    <h2>".$p->getNom()."</h2>
                    <img class='gif' style='width:30%' src='../img/".$p->getIdProduit().".png'>
                    <p>". $p->getDescription() ."</p>
                    <h3>".$p->getPrix()."€</h3>
                    
             </div>";
    }
    echo "</div>";
}
?>
</body>
</html>