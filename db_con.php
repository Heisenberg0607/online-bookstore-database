<?php
/**
 * Database connection for the archived coursework application.
 * Configure DB_HOST, DB_USER, DB_PASSWORD and DB_NAME in your local environment.
 * Defaults match a typical WAMP localhost development installation.
 * This does NOT make the legacy SQL queries safe for public deployment.
 */
function db_connect() {
    static $connection = null;
    if ($connection instanceof mysqli) {
        return $connection;
    }

    $host = getenv('DB_HOST') ?: 'localhost';
    $user = getenv('DB_USER') ?: 'root';
    $password = getenv('DB_PASSWORD') !== false ? getenv('DB_PASSWORD') : '';
    $database = getenv('DB_NAME') ?: 'bookstore';

    $connection = mysqli_connect($host, $user, $password, $database);
    if (!$connection) {
        http_response_code(500);
        exit('Could not connect to the database. Check local configuration.');
    }
    mysqli_set_charset($connection, 'utf8mb4');
    return $connection;
}

$db = db_connect();
function mq($sql) {
    global $db;
    return mysqli_query($db, $sql);
}
