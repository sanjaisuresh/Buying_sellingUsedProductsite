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
    $email = $_SESSION["email"];
    $username = $_POST["username"];
    $address = $_POST["address"];
    $whatsapp = $_POST["whatsapp"];
    $dob = $_POST["dob"];
    $aadhar = $_POST["aadhar"];

    // Update the user's profile in the database
    $sql = "UPDATE users 
            SET username = '$username', 
                address = '$address', 
                whatsapp = '$whatsapp', 
                dob = '$dob', 
                aadhar = '$aadhar' 
            WHERE email = '$email'";

    if ($conn->query($sql) === TRUE) {
        // Profile updated successfully
        header("Location: user_profile.php");
        exit();
    } else {
        // Error occurred
        $error = "Error updating profile: " . $conn->error;
    }
}

// Retrieve the user's profile data for display
$email = $_SESSION["email"];
$sql = "SELECT * FROM users WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $username = $row["username"];
    $address = $row["address"];
    $whatsapp = $row["whatsapp"];
    $dob = $row["dob"];
    $aadhar = $row["aadhar"];
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            padding: 20px;
            width: 300px;
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            color: #007bff;
        }

        .input-group {
            margin-bottom: 15px;
            text-align: left;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="date"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .btn {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
        }

        .input-group:not(:last-child) {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>User Profile</h2>
        <form action="user_profile.php" method="post">
            <div class="input-group">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" required value="<?php echo $username; ?>">
            </div>
            <div class="input-group">
                <label for="address">Address:</label>
                <input type="text" name="address" id="address" required value="<?php echo $address; ?>">
            </div>
            <div class="input-group">
                <label for="whatsapp">WhatsApp Number:</label>
                <input type="text" name="whatsapp" id="whatsapp" required value="<?php echo $whatsapp; ?>">
            </div>
            <div class="input-group">
                <label for="dob">Date of Birth:</label>
                <input type="date" name="dob" id="dob" required value="<?php echo $dob; ?>">
            </div>
            <div class="input-group">
                <label for="aadhar">Aadhar Number:</label>
                <input type="text" name="aadhar" id="aadhar" required value="<?php echo $aadhar; ?>">
            </div>
            <button type="submit" class="btn">Update Profile</button>
        </form>
    </div>
</body>
</html>
