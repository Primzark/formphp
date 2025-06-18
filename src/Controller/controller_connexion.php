<?php

include_once '../../config.php';
session_start();

$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['email'] ?? '')) {
        $errors['email'] = 'Email is required';
    }

    if (empty($_POST['password'] ?? '')) {
        $errors['password'] = 'Please enter a password';
    }

    if (empty($errors)) {
        // Connexion à la base de données avec PDO
        $pdo = new PDO(
            'mysql:host=' . DB_HOST . ';port=8889;dbname=' . DB_NAME . ';charset=utf8',
            DB_USER,
            DB_PASS
        );
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Requête SQL pour trouver l'utilisateur
        $sql = 'SELECT * FROM 76_users WHERE user_pseudo = :email OR user_mail = :email';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user === false) {
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
    }
}

// Inclusion de la vue de connexion
include_once '../View/view_connexion.php';
