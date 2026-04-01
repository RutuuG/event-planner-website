<?php
// DB connection
$conn = new mysqli("localhost", "root", "", "event_planner");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm = $_POST['confirmpassword'];

// 1. Match passwords
if ($password !== $confirm) {
    die("Passwords do not match.");
}

// 2. Check if email already exists
$sql = "SELECT * FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    die("Email already registered.");
}

// 3. Save user
$hashed = password_hash($password, PASSWORD_DEFAULT);
$insert = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
$insert->bind_param("sss", $name, $email, $hashed);

if ($insert->execute()) {
    echo "Signup successful! <a href='login.html'>Login now</a>";
} else {
    echo "Signup failed: " . $insert->error;
}
?>
