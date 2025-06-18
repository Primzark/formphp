<?php
session_start();

require_once("../../config.php");

$regex_name = "/^[a-zA-Z]+$/";
$regex_pseudo = "/^[a-zA-Z0-9._%+-]{4,}$/";
$regex_email = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
$regex_password = "/^[a-zA-Z.@-]{4,}$/";
$errors = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    var_dump($_POST);
    if (empty($_POST['nom'])) {
        $errors['nom'] = 'This field is required';
    } else if (!preg_match($regex_name, $_POST['nom'])) {
        $errors['nom'] = 'Invalid characters';
    }


    if (isset($_POST['prenom'])) {
        if (empty($_POST['prenom'])) {
            $errors['prenom'] = 'This field is required';
        } else if (!preg_match($regex_name, $_POST['prenom'])) {
            $errors['prenom'] = 'Invalid characters';
        }
    }


    $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM 76_users WHERE user_pseudo = :pseudo";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);
    $stmt->execute();
    $stmt->rowCount() == 0 ? $found = false : $found = true;
    $pdo = '';

    if (isset($_POST['pseudo'])) {
        if (empty($_POST['pseudo'])) {
            $errors['pseudo'] = 'This field is required';
        } else if (!preg_match($regex_pseudo, $_POST['pseudo'])) {
            $errors['pseudo'] = 'Invalid username';
        } else if ($found == true) {
            $errors['pseudo'] = 'Username not available';
        }
    }


    if (isset($_POST['email'])) {
        if (empty($_POST['email'])) {
            $errors['email'] = 'This field is required';
        } else if (!preg_match($regex_email, $_POST['email'])) {
            $errors['email'] = 'Invalid email address';
        } else if ($found == true) {
            $errors['email'] = 'Email not available';
        }
    }


    if (isset($_POST['password'])) {
        if (empty($_POST['password'])) {
            $errors['password'] = 'This field is required';
        } else if (!preg_match($regex_password, $_POST['password'])) {
            $errors['password'] = 'Invalid password';
        }
    }

    if (isset($_POST['confirm_password'])) {
        if (empty($_POST['confirm_password'])) {
            $errors['confirm_password'] = 'This field is required';
        } else if ($_POST['password'] != $_POST['confirm_password']) {
            $errors['confirm_password'] = 'Passwords do not match';
        }
    }

    if (isset($_POST['dob'])) {
        if (empty($_POST['dob'])) {
            $errors['dob'] = 'This field is required';
        }
    }

    if (!isset($_POST['genre'])) {
        $errors['genre'] = 'This field is required';
    }

    if (!isset($_POST['terms'])) {
        $errors['terms'] = 'This field is required';
    }



    if (empty($errors)) {

        $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        var_dump($pdo);
        $sql = "INSERT INTO `76_users` (user_lastname,user_firstname,user_pseudo,user_birthdate,user_mail,user_password,user_gender) 
                VALUES (:lastname,:firstname,:pseudo,:birthdate,:mail,:password,:gender);";

        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':lastname', $_POST['nom'], PDO::PARAM_STR);
        $stmt->bindValue(':firstname', $_POST['prenom'], PDO::PARAM_STR);
        $stmt->bindValue(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);
        $stmt->bindValue(':birthdate', $_POST['dob'], PDO::PARAM_STR);
        $stmt->bindValue(':mail', $_POST['email'], PDO::PARAM_STR);
        $stmt->bindValue(':password', password_hash($_POST['password'], PASSWORD_DEFAULT), PDO::PARAM_STR);
        $stmt->bindValue(':gender', $_POST['genre'], PDO::PARAM_STR);

        if ($stmt->execute()) {
            header('Location: controller_confirmation.php');
            exit();
        }

    }

}
include_once '../View/view_inscription.php';