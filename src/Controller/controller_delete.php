<?php
session_start();
require_once '../../config.php';

// Check if logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../public/');
    exit;
}

// Check if post_id is provided
if (!isset($_GET['post_id']) || !is_numeric($_GET['post_id'])) {
    header('Location: controller_profil.php');
    exit;
} 

$pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Verify the post belongs to the user
$sql = "SELECT COUNT(*) FROM `76_posts` WHERE post_id = :post_id AND user_id = :user_id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':post_id', $_GET['post_id'], PDO::PARAM_INT);
$stmt->bindValue(':user_id', $_SESSION['user_id'], PDO::PARAM_INT);
$stmt->execute();
$isOwner = $stmt->fetchColumn();

if (!$isOwner) {
    header('Location: controller_profil.php');
    exit;
}

// Delete the post (cascades to likes, comments, pictures)
$sql = "DELETE FROM `76_posts` WHERE post_id = :post_id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':post_id', $_GET['post_id'], PDO::PARAM_INT);
$stmt->execute();

// Redirect to profile
header('Location: controller_profil.php');
exit;
?>