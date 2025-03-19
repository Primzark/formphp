<?php
session_start();
require_once '../../config.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../public/');
    exit;
}

// Connect to the database
$pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);

// Get posts, users, pictures, and count likes
$sql = "SELECT p.post_id, p.post_description, p.post_timestamp, 
        u.user_pseudo, u.user_avatar, 
        pic.pic_name,
        COUNT(l.like_id) as like_count
        FROM `76_posts` p
        JOIN `76_users` u ON p.user_id = u.user_id
        JOIN `76_pictures` pic ON p.post_id = pic.post_id
        LEFT JOIN `76_likes` l ON p.post_id = l.post_id
        GROUP BY p.post_id, p.post_description, p.post_timestamp, u.user_pseudo, u.user_avatar, pic.pic_name
        ORDER BY p.post_timestamp DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$allPosts = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Fix timestamps and check if user liked each post
foreach ($allPosts as &$post) {
    $post['post_timestamp'] = is_numeric($post['post_timestamp']) ? $post['post_timestamp'] : time();
    // Check if I liked this post
    $sql = "SELECT COUNT(*) as liked FROM `76_likes` WHERE post_id = :post_id AND user_id = :user_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['post_id' => $post['post_id'], 'user_id' => $_SESSION['user_id']]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $post['user_liked'] = $result['liked']; // 1 if I liked it, 0 if not
}
unset($post);

// Show the page
include_once '../View/view_home.php';
?>