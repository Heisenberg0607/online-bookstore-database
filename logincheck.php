<?php
require_once __DIR__ . '/db_con.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit('Method not allowed');
}
$userid = trim($_POST['userid'] ?? '');
$password = $_POST['password'] ?? '';
$stmt = mysqli_prepare($db, 'SELECT userid, password FROM user WHERE userid = ?');
mysqli_stmt_bind_param($stmt, 's', $userid);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$user = mysqli_fetch_assoc($result);
if ($user && password_verify($password, $user['password'])) {
    session_regenerate_id(true);
    $_SESSION['userid'] = $user['userid'];
    header('Location: ./index.php');
    exit;
}
http_response_code(401);
echo '<p>Invalid user ID or password. <a href="login.php">Try again</a>.</p>';
