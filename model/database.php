<?php
    $dsn = 'mysql:host=localhost; dbname=todolist';
    $username = 'root';
    $title = filter_input(INPUT_POST, 'title');
    $description = filter_input(INPUT_POST, 'description');

    try{
        $db = new PDO($dsn, $username);

    } catch (PDOException $e){
        $error_message = 'Database Error';
        $error_message .= $e->getMessage();
        include('database_error.php');
        exit();
    }
?>