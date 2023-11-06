<?php
session_start();
$host = 'Localhost'; // 127.0.0.1
$user =  'root'; //This needs to be changed depending of the user/developer
$password = '';
$database = 'sdp';
$connection = mysqli_connect($host, $user, $password, $database);

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to the login page if not logged in
    exit();
}

$userid = $_SESSION['UserID']; 

// Get user input from the edit profile form
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

// You should add validation and sanitation here to improve security

// Check if the password field is empty; if so, do not update the password
if (empty($password)) {
    $query = "UPDATE users SET username = '$username', email = '$email' WHERE id = $userid";
} else {
    // Hash the new password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    $query = "UPDATE users SET username = '$username', email = '$email', password = '$hashed_password' WHERE id = $userid";
}

$result = mysqli_query($conn, $query);

if (!$result) {
    die("Error: " . mysqli_error($conn));
} else {
    header("Location: profile.php"); // Redirect to the user's profile page after updating
    exit();
}
?>
