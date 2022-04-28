<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo $pagetitle; ?></title>
</head>
<header style = "display: flex; justify-content: space-between">
    <div>
        <a href='indexx.php?' style='margin: 5px'>Nos good goods</a>
    </div>
    <div>
        <?php
        if (isset($_SESSION['utilisateur']))
        echo "Bonjour ".$_SESSION['utilisateur']->getprenom();

        echo "<a href='indexx.php?action=voirPanier&controller=ControllerPanier' style='margin: 5px'>Mon panier</a>";

        if (!isset($_SESSION['utilisateur'])) {
            echo "<a href='indexx.php?action=formConnexion&controller=ControllerUtilisateur' style='margin: 5px'>Se connecter</a>";
            echo "<a href='indexx.php?action=formCreationCompte&controller=ControllerUtilisateur' style='margin: 5px'>Créer un compte</a>";
        }
        ?>
    </div>

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