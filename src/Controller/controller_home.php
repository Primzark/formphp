<?php
session_start();
require_once '../../config.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: ../../public/');
    exit;
}

$pdo = new PDO(
    'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8',
    DB_USER,
    DB_PASS
);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$sql = "
    SELECT 
    post_id,
    post_timestamp,
    post_description,
    user_pseudo,
    pic_name,
    user_id
FROM 76_posts
NATURAL JOIN 76_users
NATURAL JOIN 76_pictures
WHERE user_id IN (
    :user_id,
    (SELECT fav_id FROM 76_favorites WHERE user_id = :user_id)
)
ORDER BY post_timestamp DESC
";

$stmt = $pdo->prepare($sql);
$stmt->execute([':user_id' => $_SESSION['user_id']]);
$allPosts = $stmt->fetchAll(PDO::FETCH_ASSOC);

include_once '../View/view_home.php';