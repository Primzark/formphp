<?php

include_once '../../config.php';

var_dump($_POST);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['email'])) {
        if (empty($_POST['email'])) {
            $errors['email'] = 'champs obligatoire';
        }
    }
    if (isset($_POST['password'])) {
        if (empty($_POST['password'])) {
            $errors['password'] = "Inserer mot de passe";
        }
    }

    if (!empty($_POST['email']) && !empty($_POST['password'])) {

        $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        var_dump($pdo);
        $sql = "SELECT * FROM 76_users WHERE user_pseudo = :email OR user_mail = :email;";

        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':email', $_POST['email'], PDO::PARAM_STR);

        $stmt->execute();

        $stmt->rowCount() == 0 ? $found = false : $found = true;

        $user = $stmt->fetch(PDO::FETCH_ASSOC);



        if ($found == false) {
            var_dump($_POST);
            $errors['connexion'] = 'pseudo incorrecte';
        } else  {
            var_dump($user);
        }
    }


}





include_once '../View/view_connexion.php'; ?>