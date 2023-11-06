<?php
session_start();
include 'config.php';
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

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update_profile_btn"])) {
    // Handle the form submission to update the user's profile
    $newUsername = $_POST["new_username"];
    $newEmail = $_POST["new_email"];
    $newPassword = $_POST["new_password"];
    $newCarP = $_POST["new_carp"];

    // Perform validation and update the database as needed
    // You should add validation and security measures here to prevent SQL injection

    // Update the user's information in the database
    $updateQuery = "UPDATE tblcustomer SET Username = '$newUsername', UserEmail = '$newEmail', UserPassword = '$newPassword', UserCarP = '$newCarP' WHERE UserID = $UserID";
    if (mysqli_query($connection, $updateQuery)) {
        // Update successful, redirect to the profile page
        header("Location: profile.php");
        exit();
    } else {
        // Handle the case where the update fails
        echo "Profile update failed. Please try again.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="editprofile.css"> <!-- Link to your CSS file -->
</head>
<body>
    <div class="header">
        <h1>Saifut Smart Parking</h1>
    </div>
    <div class="container">
        <h1>Edit Profile</h1>
        <form name="edit_profile" action="" method="POST">
            <div class="edit_form">
                <label for="new_username">Username</label>
                <input type="text" id="new_username" name="new_username" value="<?php echo $row['Username']; ?>" required>
            </div>
            <div class="edit_form">
                <label for="new_email">Email</label>
                <input type="email" id="new_email" name="new_email" value="<?php echo $row['UserEmail']; ?>" required>
            </div>
            <div class="edit_form">
                <label for="new_password">New Password</label>
                <input type="password" id="new_password" name="new_password" required>
            </div>
            <div class="edit_form">
                <label for="new_carp">New Car Plate Number</label>
                <input type="text" id="new_carp" name="new_carp"  value="<?php echo $row['UserCarP']; ?>" required>
            </div>
            <button type="submit" name="update_profile_btn">Update Profile</button>
        </form>
        <a href="profile.php">Back to Profile</a>
    </div>
</body>
</html>
