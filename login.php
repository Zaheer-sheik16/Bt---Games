<?php
// Configuration
$db_host = 'localhost';
$db_username = 'Zaheer_S';
$db_password = '16Sur@ya2003';
$db_name = 'id22350171_BtGames';

$conn = new mysqli('localhost', 'Zaheer_S', '16Sur@ya2003', 'id22350171_BtGames');

if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM users WHERE username = '$username'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $user_data = $result->fetch_assoc();
    if (password_verify($password, $user_data['password'])) {
        // Login successful, start session and redirect to dashboard
        session_start();
        $_SESSION['username'] = $username;
        header('Location: dashboard.php');
        exit;
    } else {
        echo "Invalid password";
    }
} else {
    echo "Username not found";
}

$conn->close();
?>