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

$sql = "SELECT user_pseudo FROM 76_user";
$stmt= $pdo->prepare($sql);
$stmt->execute(array(':search => $search'));
$stmt->setFetchMode(PDO::FETCH_ASSOC);
