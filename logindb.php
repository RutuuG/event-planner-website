<?php
session_start();
$conn = new mysqli("localhost", "root", "", "event_planner");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$email = $_POST['email'];
$password = $_POST['password'];

// Check if email exists
$sql = "SELECT * FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
    $user = $result->fetch_assoc();

    if (password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user['name'];
        header("Location: index.html");  // ✅ redirect to home
        exit();
    } else {
        echo "Incorrect password.";
    }
} else {
    echo "User not found.";
}
?>
