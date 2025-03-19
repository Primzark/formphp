<?php
session_start();
require_once '../../config.php';

// Redirect if not logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../public/');
    exit;
}

// Ensure post_id is provided
if (!isset($_GET['post_id']) || !is_numeric($_GET['post_id'])) {
    header('Location: controller_home.php');
    exit;
}

$pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Fetch the specific post with like data
$sql = "SELECT p.*, u.user_pseudo, pic.pic_name,
               COUNT(l.like_id) as like_count,
               EXISTS(SELECT 1 FROM `76_likes` WHERE user_id = :user_id AND post_id = p.post_id) as user_liked
        FROM `76_posts` p 
        JOIN `76_users` u ON p.user_id = u.user_id 
        LEFT JOIN `76_pictures` pic ON p.post_id = pic.post_id 
        LEFT JOIN `76_likes` l ON p.post_id = l.post_id
        WHERE p.post_id = :post_id
        GROUP BY p.post_id, u.user_pseudo, pic.pic_name";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    'post_id' => $_GET['post_id'],
    'user_id' => $_SESSION['user_id']
]);
$post = $stmt->fetch(PDO::FETCH_ASSOC);

// If no post found, redirect to home
if (!$post) {
    header('Location: controller_home.php');
    exit;
}

// Fetch comments for this post
$sql = "SELECT c.*, u.user_pseudo 
        FROM `76_comments` c 
        JOIN `76_users` u ON c.user_id = u.user_id 
        WHERE c.post_id = :post_id 
        ORDER BY c.com_timestamp ASC";
$stmt = $pdo->prepare($sql);
$stmt->execute(['post_id' => $_GET['post_id']]);
$comments = $stmt->fetchAll(PDO::FETCH_ASSOC);

include_once '../View/view_fullpic.php';
?>