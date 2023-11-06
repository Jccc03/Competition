<?php
// Include your database connection code here
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['bookingID'])) {
    $bookingID = $_GET['bookingID'];

    // Update the booking status to mark it as paid
    $updateQuery = "UPDATE booking SET PaymentStatus = 'Paid' WHERE BookingID = $bookingID";
    $result = mysqli_query($connection, $updateQuery);

    if ($result) {
        // Successful payment update
        echo '<script>alert("Payment is successful!");</script>';
    } else {
        // Payment update failed
        echo '<script>alert("Payment could not be processed. Please try again.");</script>';
    }
}

// Redirect back to the admin page
header("Location: admin_simulate_payments.php");
?>
