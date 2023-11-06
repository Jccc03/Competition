<?php
// Include your database connection code here
include 'config.php';

$query = "SELECT booking.*, tblcustomer.Username, tblcustomer.UserCarP FROM booking
          JOIN tblcustomer ON booking.UserID = tblcustomer.UserID"; // Join the booking and tblcustomer tables
$result = mysqli_query($connection, $query);

// Check for success message in the URL
$successMessage = isset($_GET['successMessage']) ? $_GET['successMessage'] : '';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Page</title>
    <link rel="stylesheet" type="text/css" href="AdminPageStyle.css">
    <style>
        .button {
            background-color: #3498db; /* Default background color */
            color: #fff; /* Default text color */
            padding: 10px 20px;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s; /* Transition effect on hover */
        }

        .button:hover {
            background-color: #2980b9; /* New background color on hover */
            color: #fff; /* New text color on hover */
        }
    </style>
</head>
<body>
    <h1>Admin Page</h1>
    <h2>Booking Information</h2>
    
    <?php
    if (!empty($successMessage)) {
        echo '<p style="color: green;">' . $successMessage . '</p>';
    }
    ?>
    
    <table>
        <tr>
            <th>User ID</th>
            <th>Username</th> <!-- Add Username column -->
            <th>Car Plate</th> <!-- Add Car Plate column -->
            <th>Location</th>
            <th>Start Time</th>
            <th>Time Duration</th>
            <th>Payment Status</th>
            <th>Action</th>
        </tr>

        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>{$row['UserID']}</td>";
            echo "<td>{$row['Username']}</td>"; // Display the username
            echo "<td>{$row['UserCarP']}</td>"; // Display the car plate
            echo "<td>{$row['Location']}</td>";
            echo "<td>{$row['StartTime']}</td>";
            echo "<td>{$row['TimeDuration']}</td>";
            echo "<td>{$row['PaymentStatus']}</td>";
            echo "<td>";

            // Add a JavaScript confirmation dialog to the link
            echo '<a href="simulate_payment.php?bookingID=' . $row['BookingID'] . '&confirm=true" onclick="return confirm(\'Are you sure you want to simulate payment for BookingID ' . $row['BookingID'] . '?\');">Simulate Payment</a>';
            
            echo "</td>";
            echo "</tr>";
        }
        ?>                      
    </table>
    <br>
    <a href="AdminPage.php" class="button">Back to Admin Page</a>
</body>
</html>
