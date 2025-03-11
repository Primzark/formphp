<?php
session_start();

require_once '../../config.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: ../../public/');
    exit;
}

// Get post ID from URL (e.g., ?id=15)
$post_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($post_id <= 0) {
    header('Location: controller_home.php'); // Invalid ID, redirect
    exit;
}

$pdo = new PDO(
    'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8',
    DB_USER,
    DB_PASS
);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Fetch the specific post
$sql = "SELECT p.*, pic.pic_name 
        FROM `76_posts` p 
        NATURAL JOIN `76_pictures` pic 
        WHERE p.post_id = :post_id AND p.user_id = :user_id";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':post_id' => $post_id,
    ':user_id' => $_SESSION['user_id']
]);
$post = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$post) {
    header('Location: controller_home.php'); // Post not found or not owned
    exit;
}

$pdo = null;

include_once '../View/view_post_detail.php';