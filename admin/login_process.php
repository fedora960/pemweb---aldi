<?php
session_start();
include_once 'db.php';

$username = $_POST['username'];
$password = $_POST['password'];

// Query untuk mencari user berdasarkan username dan password
$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Jika user ditemukan, set session username
    $_SESSION['username'] = $username;
    
    // Redirect ke halaman dashboard atau halaman yang diotorisasi
    header("Location: index.php");
    exit();
} else {
    echo "Invalid username or password";
}

$conn->close();
?>
