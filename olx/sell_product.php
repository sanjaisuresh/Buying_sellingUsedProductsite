<?php
session_start();

if (!isset($_SESSION["email"])) {
    header("Location: login.html");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "olx";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract and sanitize the input data (you should add more validation and sanitation)
    $email = $_SESSION["email"];
    $productName = $_POST["product-name"];
    $category = $_POST["category"];
    $ownerName = $_POST["owner-name"];

    // Handle file upload
    $imageData = file_get_contents($_FILES["product-image"]["tmp_name"]);

    // Check if the image data was successfully read
    if ($imageData !== false) {
        // File uploaded successfully, now save the data to the database
        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO sellproduct (email, product_name, category, owner_name, image_data) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssb", $email, $productName, $category, $ownerName, $imageData);

        if ($stmt->execute()) {
            // Product data saved successfully
            header("Location: dashboard.html");
            exit();
        } else {
            // Error occurred
            $error = "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        $error = "Error reading image data.";
    }
} else {
    $error = "Invalid request.";
}

if (isset($error)) {
    // Handle and display errors here
    echo $error;
}

$conn->close();
?>
