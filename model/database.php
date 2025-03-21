<?php
    $dsn = 'mysql:host=localhost;dbname=my_guitar_shop';
    $username = 'root';
    $password = '';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../view/database_error.php');
        exit();
    }
?>