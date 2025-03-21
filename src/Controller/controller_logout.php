<?php

session_start();


unset($_SESSION);


session_destroy();

include_once '../View/view_home.php';
header("Location: controller_connexion.php");