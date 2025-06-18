<?php

include_once '../../config.php';
session_start();

$erreurs = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Vérification de l'email
    if (isset($_POST['email']) && empty($_POST['email'])) {
        $erreurs['email'] = 'Champ obligatoire';
    }

    // Vérification du mot de passe
    if (isset($_POST['password']) && empty($_POST['password'])) {
        $erreurs['password'] = 'Veuillez insérer votre mot de passe';
    }

    // Si les champs sont remplis
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

            // Vérification de l'existence de l'utilisateur
            if (!$utilisateur) {
                $erreurs['connexion'] = 'Pseudo ou adresse e-mail incorrect';
            } else {
                // Vérification du mot de passe
                if (password_verify($_POST['password'], $utilisateur['user_password'])) {
                    $_SESSION = $utilisateur;
                    header('Location: controller_profil.php');
                    exit();
                } else {
                    $erreurs['connexion'] = 'Mot de passe incorrect';
                }
            }

        } catch (PDOException $e) {
            die('Erreur de connexion à la base de données : ' . $e->getMessage());
        }
    }
}

// Inclusion de la vue de connexion
include_once '../View/view_connexion.php';
