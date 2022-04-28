<?php

    $DS = DIRECTORY_SEPARATOR;
    require_once __DIR__.$DS.'librairie'.$DS.'File.php';
    require_once File::build_path(array('controller', 'routeur.php'));

    session_start();