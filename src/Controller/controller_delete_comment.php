<?php
session_start();
require_once '../../config.php';

// Check if logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../public/');
    exit;
}

// Check if com_id and post_id are provided
if (
    !isset($_GET['com_id']) || !is_numeric($_GET['com_id']) ||
    !isset($_GET['post_id']) || !is_numeric($_GET['post_id'])
) {
    header('Location: controller_profil.php');
    exit;
}

$pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Verify the comment belongs to the user
$sql = "SELECT COUNT(*) FROM `76_comments` WHERE com_id = :com_id AND user_id = :user_id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':com_id', $_GET['com_id'], PDO::PARAM_INT);
$stmt->bindValue(':user_id', $_SESSION['user_id'], PDO::PARAM_INT);
$stmt->execute();
$isOwner = $stmt->fetchColumn();

if (!$isOwner) {
    header('Location: controller_fullpic.php?post_id=' . $_GET['post_id']);
    exit;
}

// Delete the comment
$sql = "DELETE FROM `76_comments` WHERE com_id = :com_id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':com_id', $_GET['com_id'], PDO::PARAM_INT);
$stmt->execute();

// Redirect back to the fullpic page
header('Location: controller_fullpic.php?post_id=' . $_GET['post_id']);
exit;
?>