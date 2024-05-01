<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "olx";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Successful login
        session_start();
        $_SESSION["email"] = $email;
        header("Location: dashboard.html"); 
        exit();
    } else {
        $error = "Invalid email or password.";
    }
}

$conn->close();
?>

