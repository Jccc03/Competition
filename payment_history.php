<?php
// Include your database connection code here
include 'config.php';

// Check if the user is logged in (adjust this logic based on your authentication system)
session_start();
if (!isset($_SESSION['UserID'])) {
    // Redirect the user to the login page if they are not logged in
    header("Location: LoginPage.php");
    exit();
}

// Get the currently logged-in user's ID
$loggedInUserID = $_SESSION['UserID'];

// Query the database to retrieve payment history for the logged-in user
$query = "SELECT b.*, c.Username, c.UserCarP FROM booking b
          JOIN tblcustomer c ON b.UserID = c.UserID
          WHERE b.UserID = $loggedInUserID";

$result = mysqli_query($connection, $query);

// Check for success message in the URL
$successMessage = isset($_GET['successMessage']) ? $_GET['successMessage'] : '';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Payment History</title>
    <style>

    .button {
        background-color: #3498db;
        color: #fff;
        padding: 10px 10px;
        text-decoration: none;
        border: none;
        border-radius: 5px;
        transition: background-color 0.3s, color 0.3s;
    }

    .button:hover {
        background-color: #2980b9;
        color: #fff;
    }

    table {
        width: 100%;
        border;
    }

    table, th, td {
        border: 1px solid #ddd; /* Add a border around the table and cells */
    }

    th, td {
        padding: 8px;
        text-align: left;
    }

    tr:nth-child(even) {
        background-color: white; /* Add alternating row background color */
    }
</style>
</head>
<body>
    <div class="header">
        <h2>Payment History</h2>
    </div>
    <br>
    <div class="container">
        <div class="profile_info">
            <table>
                <tr>
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Car Plate</th>
                    <th>Location</th>
                    <th>Start Time</th>
                    <th>Time Duration</th>
                    <th>Payment Status</th>
                </tr>

                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>{$row['UserID']}</td>";
                    echo "<td>{$row['Username']}</td>"; // Display user's name
                    echo "<td>{$row['UserCarP']}</td>"; // Display user's car plate
                    echo "<td>{$row['Location']}</td>";
                    echo "<td>{$row['StartTime']}</td>";
                    echo "<td>{$row['TimeDuration']}</td>";
                    echo "<td>{$row['PaymentStatus']}</td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
</div>
    <br>
    <br>
    <a href="profile.php" class="button">Back to Profile</a>
</body>
</html>