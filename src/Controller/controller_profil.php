<?php
session_start();
require_once '../../config.php';

// Check if logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../public/');
    exit;
}

$pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Get user's posts with picture and like data
$sql = "SELECT p.post_id, p.post_description, p.post_timestamp, p.post_private,
        u.user_pseudo, u.user_avatar,
        pic.pic_name,
        COUNT(l.like_id) as like_count,
        EXISTS(SELECT 1 FROM `76_likes` WHERE user_id = :user_id AND post_id = p.post_id) as user_liked
        FROM `76_posts` p
        JOIN `76_users` u ON p.user_id = u.user_id
        LEFT JOIN `76_pictures` pic ON p.post_id = pic.post_id
        LEFT JOIN `76_likes` l ON p.post_id = l.post_id
        WHERE p.user_id = :user_id
        GROUP BY p.post_id, u.user_pseudo, pic.pic_name
        ORDER BY p.post_timestamp DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute(['user_id' => $_SESSION['user_id']]);
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

include_once '../View/view_profil.php';
?>