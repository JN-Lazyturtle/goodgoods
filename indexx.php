<?php

$DS = DIRECTORY_SEPARATOR;
require_once __DIR__ . $DS . 'librairie' . $DS . 'File.php';
require_once File::build_path(array('controller', 'routeur.php'));

session_start();
error_reporting(E_ALL); //pour forcer l'affichage des warnings
ini_set('display_errors', 1);