<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo $pagetitle; ?></title>
</head>
<header>
    <a href='indexx.php?'>Nos good goods</a>
    <a href='indexx.php?action=readAll&controller=utilisateur'>Accueil utilisateur</a>
    <a href='indexx.php?action=voirPanier&controller=ControllerPanier'>Mon panier</a>

</header>
<body>
<?php
$filepath = File::build_path(array("view", "$view.php"));
require $filepath;
?>
</body>
<footer>
    <p style="border: 1px solid black;text-align:right;padding-right:1em;">
        Site de Yvang et Djulie
    </p>
</footer>
</html>