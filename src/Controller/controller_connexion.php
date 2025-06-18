<?php

include_once '../../config.php';
session_start();

$erreurs = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST')  {
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
        try {
            // Connexion à la base de données avec PDO
            $pdo = new PDO(
                'mysql:host=' . DB_HOST . ';port=8889;dbname=' . DB_NAME . ';charset=utf8',
                DB_USER,
                DB_PASS
            );
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Requête SQL pour trouver l'utilisateur
            $requete = "SELECT * FROM 76_users WHERE user_pseudo = :email OR user_mail = :email;";
            $stmt = $pdo->prepare($requete);
            $stmt->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
            $stmt->execute();

            $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);



        if ($found == false) {
            var_dump($_POST);
            $errors['connexion'] = 'Incorrect username';
        } else {
            var_dump($user);
            if (password_verify($_POST['password'], $user['user_password'])) {
                $_SESSION = $user;
                header('Location: controller_profil.php');
                exit();
            } else {
                $errors['connexion'] = 'Incorrect password';
            }

        } catch (PDOException $e) {
            die('Erreur de connexion à la base de données : ' . $e->getMessage());
        }
    }
}

// Inclusion de la vue de connexion
include_once '../View/view_connexion.php';
