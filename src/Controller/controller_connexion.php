<?php

include_once '../../config.php';
session_start();

// Uncomment the next line for debugging purposes
// var_dump($_POST);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['email'])) {
        if (empty($_POST['email'])) {
            $errors['email'] = 'Email is required';
        }
    }
    if (isset($_POST['password'])) {
        if (empty($_POST['password'])) {
            $errors['password'] = 'Please enter a password';
        }
    }

    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $pdo = new PDO(
            'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8',
            DB_USER,
            DB_PASS
        );
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = 'SELECT * FROM 76_users WHERE user_pseudo = :email OR user_mail = :email;';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
        $stmt->execute();

        $found = $stmt->rowCount() > 0;
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$found) {
            $errors['connexion'] = 'Incorrect username';
        } else {
            if (password_verify($_POST['password'], $user['user_password'])) {
                $_SESSION = $user;
                header('Location: controller_profil.php');
                exit();
            } else {
                $errors['connexion'] = 'Incorrect password';
            }
        }
        $pdo = null;
    }


}





include_once '../View/view_connexion.php';
