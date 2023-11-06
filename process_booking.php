<?php
// Include your database connection code here
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userID = $_POST['user_id'];
    $location = $_POST['location'];
    $start_time = $_POST['start_time'];
    $time_duration = $_POST['time_duration'];
    $Username = $_POST['Username']; // Add this line to retrieve the username
    $carplate = $_POST['car_plate']; // Add this line to retrieve the car plate

    // Insert the booking into the database
    $insertQuery = "INSERT INTO booking (UserID, Location, StartTime, TimeDuration, Username, CarPlate) 
                    VALUES ($userID, '$location', '$start_time', $time_duration, '$Username', '$carplate')";
    mysqli_query($connection, $insertQuery);
}

// Redirect the user back to the booking page or display a success message
header("Location: parkingtest.php");
?>
