<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name     = trim($_POST['name']);
    $email    = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm  = $_POST['confirmpassword'];

    if ($password !== $confirm) {
        die("❌ Passwords do not match.");
    }

    // Check if email already exists
    $check = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $check->bind_param("s", $email);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        die("❌ Email already registered.");
    }
    $check->close();

    // Hash password
    $hashed = password_hash($password, PASSWORD_DEFAULT);

    // Insert into users table
    $stmt = $conn->prepare("INSERT INTO users (name, email, password, created_at) VALUES (?, ?, ?, NOW())");
    if (!$stmt) {
        die("❌ Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("sss", $name, $email, $hashed);

    if (!$stmt->execute()) {
        die("❌ Execute failed: " . $stmt->error);
    }

    $stmt->close();
    $conn->close();

    // Redirect after successful signup
    header("Location: login.php");
    exit();
} else {
    echo "❌ Invalid request.";
}
?>
