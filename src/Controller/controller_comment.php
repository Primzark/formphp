<?php
session_start();
require_once '../../config.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: ../../public/');
    exit;
}

if (!isset($_GET['post_id']) || !is_numeric($_GET['post_id'])) {
    header('Location: controller_home.php');
    exit;
}

$pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Fetch post details
$sql = "SELECT p.*, u.user_pseudo 
        FROM `76_posts` p 
        JOIN `76_users` u ON p.user_id = u.user_id 
        WHERE p.post_id = :post_id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':post_id', $_GET['post_id'], PDO::PARAM_INT);
$stmt->execute();
$post = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$post) {
    header('Location: controller_home.php');
    exit;
}

// Handle comment submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $com_text = trim($_POST['com_text'] ?? '');
    if (!empty($com_text)) {
        $com_timestamp = time();
        $sql = "INSERT INTO `76_comments` (`post_id`, `user_id`, `com_text`, `com_timestamp`) 
                VALUES (:post_id, :user_id, :com_text, :com_timestamp)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':post_id', $_GET['post_id'], PDO::PARAM_INT);
        $stmt->bindValue(':user_id', $_SESSION['user_id'], PDO::PARAM_INT);
        $stmt->bindValue(':com_text', $com_text, PDO::PARAM_STR);
        $stmt->bindValue(':com_timestamp', $com_timestamp, PDO::PARAM_INT);
        $stmt->execute();
        header("Location: controller_fullpic.php?post_id=" . $_GET['post_id']);
        exit;
    } else {
        $error = "The comment cannot be empty.";
    }
}

include_once '../View/view_comment.php';
?>