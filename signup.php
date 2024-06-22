<?php
// Configuration
$db_host = 'localhost';
$db_username = 'Zaheer_S';
$db_password = '16Sur@ya2003';
$db_name = 'id22350171_BtGames';

// Create connection
$conn = new mysqli('localhost', 'Zaheer_S', '16Sur@ya2003', 'id22350171_BtGames');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}

// Get form data
$username = $_POST['username'];
$password = $_POST['password'];

// Check if username already exists
$query = "SELECT * FROM users WHERE username = '$username'";
$result = $conn->query($query);
if ($result->num_rows > 0) {
    echo "Username already exists";
    exit;
}

// Insert new user into database
$query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
if ($conn->query($query) === TRUE) {
    echo "Account created successfully";
    header('Location: login.php');
    exit;
} else {
    echo "Error: ". $query. "<br>". $conn->error;
}

// Close connection
$conn->close();
?>