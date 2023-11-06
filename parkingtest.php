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
<html>
<head>
    <title>Parking Booking System</title>
    <link rel="stylesheet" type="text/css" href="parkingt.css">
</head>
<body>
    <div class="container">
        <h1>Book Your Parking</h1>
        <form method="post" action="process_booking.php">
            <input type="hidden" name="user_id" value="<?php echo $row['UserID']; ?>">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $row['Username']; ?>" required>
            <label for="car_plate">Car Plate Number:</label>
            <input type="text" id="car_plate" name="car_plate"  value="<?php echo $row['UserCarP']; ?>" required>
            <label for="location">Select a Parking Location:</label>
            <select name="location" required>
                <option value="APU Indoor">APU Indoor</option>
                <option value="APU Outdoor">APU Outdoor</option>
                <option value="Mrantti">Mrantti</option>
                <!-- Add more predefined locations here -->
            </select>
            <label for="start_time">Start Time:</label>
            <input type="time" name="start_time" required>
            <label for="time_duration">Time Duration (in hours):</label>
            <input type="number" name="time_duration" min="1" max="5" step="1" required>
            <input type="submit" value="Book Now">
        </form>
        <button class="back-button" onclick="goBack()">Back</button>
        <a href="payment.php" class="button">Checkout Payment</a>

        <!-- JavaScript to navigate back when the button is clicked -->
        <script>
            function goBack() {
                window.history.back();
            }
        </script>
    </div>
</body>
</html>