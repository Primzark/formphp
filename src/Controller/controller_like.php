<?php
session_start();
require_once '../../config.php';

if (!isset($_SESSION['user_id'])) {
    echo "error: not logged in";
    exit;
}

if (!isset($_GET['post_id']) || !is_numeric($_GET['post_id'])) {
    echo "error: invalid post_id";
    exit;
}

$pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Check if the user already liked this post
$sql = "SELECT like_id FROM `76_likes` WHERE user_id = :user_id AND post_id = :post_id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_id', $_SESSION['user_id'], PDO::PARAM_INT);
$stmt->bindValue(':post_id', $_GET['post_id'], PDO::PARAM_INT);
$stmt->execute();
$like = $stmt->fetch(PDO::FETCH_ASSOC);

if ($like) {
    // Unlike: Remove the like
    $sql = "DELETE FROM `76_likes` WHERE like_id = :like_id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':like_id', $like['like_id'], PDO::PARAM_INT);
    $stmt->execute();
    echo "unliked";
} else {
    // Like: Add a new like
    $sql = "INSERT INTO `76_likes` (`user_id`, `post_id`) VALUES (:user_id, :post_id)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':user_id', $_SESSION['user_id'], PDO::PARAM_INT);
    $stmt->bindValue(':post_id', $_GET['post_id'], PDO::PARAM_INT);
    $stmt->execute();
    echo "liked";
}
exit;
?>