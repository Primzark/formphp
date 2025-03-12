<?php
session_start();
require_once '../../config.php';






$pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $sql = " select * from `76_pictures`
        natural join 76_posts
        where user_id = :user_id;";

        $stmt = $pdo->prepare($sql);
        

    
        $stmt->bindValue(':user_id', $_SESSION['user_id'], PDO::PARAM_INT);

        $stmt->execute();

        $post = $stmt->fetchAll(PDO::FETCH_ASSOC);

include_once '../View/view_profil.php';
?>