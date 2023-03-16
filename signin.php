<?php
// Start session
session_start();

// Connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get user input
$username = $_POST['username'];
$password = $_POST['password'];

// Check if user exists
$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
    // Set session variables
    $_SESSION['username'] = $username;
    // Redirect to homepage
    header("Location: index.php");
} else {
    echo "Invalid username or password";
}

// Close database connection
mysqli_close($conn);
?>
