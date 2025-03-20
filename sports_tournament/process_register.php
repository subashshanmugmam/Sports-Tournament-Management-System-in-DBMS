<?php
session_start();
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validate input
    if (empty($email) || empty($password) || empty($confirm_password)) {
        header("Location: auth.php?error=empty_fields");
        exit();
    }

    if ($password !== $confirm_password) {
        header("Location: auth.php?error=password_mismatch");
        exit();
    }

    // Check if email exists
    $sql = "SELECT id FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        header("Location: auth.php?error=email_exists");
        exit();
    }

    // Create new user
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (email, password) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $hashed_password);

    if ($stmt->execute()) {
        $_SESSION['user_id'] = $stmt->insert_id;
        header("Location: dashboard.php?registration=success");
        exit();
    } else {
        header("Location: auth.php?error=database_error");
        exit();
    }
} else {
    header("Location: auth.php");
    exit();
}