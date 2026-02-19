<?php
$conn = new mysqli("localhost", "root", "", "login_system");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<script>alert('Login Successful'); window.location='login.html';</script>";
} else {
    echo "<script>alert('Invalid Email or Password'); window.location='login.html';</script>";
}

$conn->close();
?>
