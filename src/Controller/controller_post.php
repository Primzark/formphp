<?php
session_start();


if (!isset($_SESSION['user_id'])) {
    header('Location: ../../public/');
    exit;
}

require_once '../../config.php';


$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   
    if ($_FILES['photo']['error'] == UPLOAD_ERR_NO_FILE) {
        $errors['photo'] = 'Please select a photo';
    }

    
    if (empty($_POST['description'])) {
        $errors['description'] = 'Please enter a comment';
    }

    if (empty($errors)) {
        $pdo = new PDO(
            'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8',
            DB_USER,
            DB_PASS
        );
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO `76_posts` (`post_timestamp`, `post_description`, `post_private`, `user_id`) 
                VALUES (:timestamp, :description, :private, :user_id)";
        $stmt = $pdo->prepare($sql);

        function safeInput($string) {
            $input = trim($string);
            $input = htmlspecialchars($input);
            return $input;
        }

        $stmt->bindValue(':timestamp', time(), PDO::PARAM_INT);
        $stmt->bindValue(':description', safeInput($_POST['description']), PDO::PARAM_STR);
        $stmt->bindValue(':private', 0, PDO::PARAM_INT);
        $stmt->bindValue(':user_id', $_SESSION['user_id'], PDO::PARAM_INT);
        $stmt->execute();

        $post_id = $pdo->lastInsertId();

    
        $original_name = basename($_FILES["photo"]["name"]);
        $pic_name = substr(uniqid() . '_' . $original_name, 0, 45);
        $sql = "INSERT INTO `76_pictures` (`pic_name`, `post_id`) 
                VALUES (:pic_name, :post_id)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':pic_name', $pic_name, PDO::PARAM_STR);
        $stmt->bindValue(':post_id', $post_id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            $upload_directory = '../../asset/img/';
            move_uploaded_file($_FILES["photo"]["tmp_name"], $upload_directory . $pic_name);
            header('Location: ../../controller_home.php');
            exit;
            
        }

        $pdo = null;
    }
}

include_once '../View/view_post.php';