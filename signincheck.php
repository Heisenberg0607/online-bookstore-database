<?php
require_once __DIR__ . '/db_con.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit('Method not allowed');
}
$userid = trim($_POST['userid'] ?? '');
$password = $_POST['password'] ?? '';
if ($userid === '' || $password === '') {
    http_response_code(400);
    exit('A username and password are required.');
}

$hash = password_hash($password, PASSWORD_DEFAULT);
$permission = 'user';
$date = date('Y-m-d');
$stmt = mysqli_prepare($db, 'INSERT INTO user (userid, password, permission, date) VALUES (?, ?, ?, ?)');
mysqli_stmt_bind_param($stmt, 'ssss', $userid, $hash, $permission, $date);
$success = mysqli_stmt_execute($stmt);
if ($success) {
    header('Location: ./login.php');
    exit;
}
http_response_code(400);
exit('Registration failed. The user ID may already exist.');
