<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: ../../public/');
    exit;
}

require_once '../../config.php';

function safeInput($string) {
    $input = trim($string);
    $input = htmlspecialchars($input);
    return $input;
}

$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_FILES['photo']['error'] == UPLOAD_ERR_NO_FILE) {
        $errors['photo'] = 'Please select a photo';
    }
    if (empty($_POST['description'])) {
        $errors['description'] = 'Please enter a comment';
    }
    if (!function_exists('imagewebp')) {
        $errors['photo'] = 'WebP support is not enabled on this server';
    }

    if (!empty($errors)) {
        include_once '../View/view_post.php';
        exit;
    }

    $pdo = new PDO(
        'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8',
        DB_USER,
        DB_PASS
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "INSERT INTO `76_posts` (`post_timestamp`, `post_description`, `post_private`, `user_id`) 
            VALUES (:timestamp, :description, :private, :user_id)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':timestamp', time(), PDO::PARAM_INT);
    $stmt->bindValue(':description', safeInput($_POST['description']), PDO::PARAM_STR);
    $stmt->bindValue(':private', 0, PDO::PARAM_INT);
    $stmt->bindValue(':user_id', $_SESSION['user_id'], PDO::PARAM_INT);
    $stmt->execute();
    $post_id = $pdo->lastInsertId();

    $upload_directory = '../../asset/img/';
    $pic_name = "post_{$post_id}.webp";
    $target_file = $upload_directory . $pic_name;

    $image_type = exif_imagetype($_FILES['photo']['tmp_name']);
    if (in_array($image_type, [IMAGETYPE_JPEG, IMAGETYPE_PNG])) {
        $image = ($image_type == IMAGETYPE_JPEG) 
            ? imagecreatefromjpeg($_FILES['photo']['tmp_name']) 
            : imagecreatefrompng($_FILES['photo']['tmp_name']);
    } else {
        $errors['photo'] = 'Only JPEG and PNG images are supported';
        include_once '../View/view_post.php';
        exit;
    }

    if (imagewebp($image, $target_file, 80)) {
        imagedestroy($image);
        $sql = "INSERT INTO `76_pictures` (`pic_name`, `post_id`) VALUES (:pic_name, :post_id)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':pic_name', $pic_name, PDO::PARAM_STR);
        $stmt->bindValue(':post_id', $post_id, PDO::PARAM_INT);
        $stmt->execute();
        header('Location: controller_home.php');
        exit;
    } else {
        $errors['photo'] = 'Failed to save image';
        include_once '../View/view_post.php';
        exit;
    }
}

include_once '../View/view_post.php';
?>