<?php

$regex_name = "/^[a-zA-Z]+$/";
$regex_email = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
$regex_password = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/";
$errors = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['nom'])) {
        if (empty($_POST['nom'])) {
            $errors['nom'] = 'champs obligatoire';
        } else if (!preg_match($regex_name, $_POST['nom'])) {
            $errors['nom'] = 'caractère non autorisés';
        }
    }

    if (isset($_POST['prenom'])) {
        if (empty($_POST['prenom'])) {
            $errors['prenom'] = 'champs obligatoire';
        } else if (!preg_match($regex_name, $_POST['prenom'])) {
            $errors['prenom'] = 'caractère non autorisés';
        }
    }

    if (isset($_POST['email'])) {
        if (empty($_POST['email'])) {
            $errors['email'] = 'champs obligatoire';
        } else if (!preg_match($regex_email, $_POST['email'])) {
            $errors['email'] = 'email non valide';
        }
    }

    if (isset($_POST['password'])) {
        if (empty($_POST['password'])) {
            $errors['password'] = 'champs obligatoire';
        } else if (!preg_match($regex_password, $_POST['password'])) {
            $errors['password'] = 'mot de passe non identique';
        }
    }

    if (isset($_POST['confirm_password'])) {
        if (empty($_POST['confirm_password'])) {
            $errors['confirm_password'] = 'champs obligatoire';
        } else if ($_POST['password'] != $_POST['confirm_password']) {
            $errors['confirm_password'] = 'mot de passe non identique';
        }
    }

    if (isset($_POST['dob'])) {
        if (empty($_POST['dob'])) {
            $errors['dob'] = 'champs obligatoire';
        }
    }

    if (!isset($_POST['genre'])) {
        $errors['genre'] = 'champs obligatoire';
    }

    if (!isset($_POST['terms'])) {
        $errors['terms'] = 'champs obligatoire';
    }
}


include_once '../View/view-inscription.php';



