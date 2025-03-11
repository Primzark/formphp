<?php

session_start();


unset($_SESSION);


session_destroy();

header('Location:../../src/Controller/controller_connexion.php');



