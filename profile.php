<?php
include 'config.php';
session_start();
if (!isset($_SESSION['UserID'])) {
    // Redirect users to the login page if they are not logged in
    header("Location: LoginPage.php");
    exit();
}

// Include your database connection code here (similar to your login page)

// Retrieve the user's information from the database using the UserID stored in the session
$UserID = $_SESSION['UserID'];
$query = "SELECT * FROM tblcustomer WHERE UserID = $UserID";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($result);

if (!$row) {
    // Handle the case where the user's data is not found in the database
    echo "User not found. Please try again.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <link rel="stylesheet" href="profile.css"> <!-- Link to your CSS file -->
    
</head>
<body>
    <div class="header">
        <h1>Saifut Smart Parking</h1>
    </div>
    <div class="container">
        <h2>Profile</h2>
        <div class="profile_info">
            <p><strong>Username:</strong> <?php echo $row['Username']; ?></p>
            <p><strong>Email:</strong> <?php echo $row['UserEmail']; ?></p>
            <p><strong>Car Plate Number:</strong> <?php echo $row['UserCarP']; ?></p>
        </div>
        <a href="edit_profile.php">Edit Profile</a>
        <a href="payment_history.php">View Payment History</a>
        <a href="userpage.php">Back</a>
        <a href="homepage.php">Logout</a>
    </div>
</body>
</html>

