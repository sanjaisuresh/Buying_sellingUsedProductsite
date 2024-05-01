<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "olx";
// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $phone = $_POST["phone"];
    $sql = "INSERT INTO users (email, password, phone) VALUES ('$email', '$password', '$phone')";

    if ($conn->query($sql) === TRUE) {
        // Successful signup
        header("Location: login.html"); 
        exit();
    } else {
        // Error occurred
        $error = "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>
