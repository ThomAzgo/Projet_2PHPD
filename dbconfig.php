<?php
    $database = [
            'host' => 'dbseverhost',
            'database' => 'database',
            'username' => 'root',
            'password' => '',
    ];

    $dsn = "mysql:host={$database['host']};dbname={$database['database']};charset=utf8";
    $link = new PDO($dsn, $database['username'], $database['password'], [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
?>