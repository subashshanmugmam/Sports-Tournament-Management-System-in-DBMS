<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sports_tournament";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];

// Simple password verification (replace with proper hashing in production)
if ($username === "root" && $password === "") {
    $_SESSION['loggedin'] = true;
    header("location: dashboard.php");
    exit;
}

echo "Invalid username or password.";
?>