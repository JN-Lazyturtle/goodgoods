<?php
session_start();
error_reporting(E_ALL); //pour forcer l'affichage des warnings
ini_set('display_errors', 1);
//var_dump($_SESSION);
session_destroy();
//unset($_SESSION);
//var_dump($_SESSION);
header("Location:ind.php");