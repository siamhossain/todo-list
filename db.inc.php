<?php

    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '2693');
    define('DB_NAME', 'todo_list');

    $connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
    if(!$connection){
        die("Failed to connct to database" . mysqli_error($connection));
    }