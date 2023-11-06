<?php
include 'config.php'; // Include your database connection code

// Fetch user information from the database
$query = "SELECT * FROM tblcustomer";
$result = mysqli_query($connection, $query);

// Add HTML and PHP code to display user information
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
            margin-bottom: 10px;
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
    <h2>User Information</h2>
    <table>
        <tr>
            <th>User ID</th>
            <th>Name</th>
            <th>Car Plate</th>
            <th>Email</th>
            <th>Password</th>
            <th>Action</th>
        </tr>

        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>{$row['UserID']}</td>";
            echo "<td>{$row['Username']}</td>";
            echo "<td>{$row['UserCarP']}</td>";
            echo "<td>{$row['UserEmail']}</td>";
            echo "<td>{$row['UserPassword']}</td>";
            echo "<td>";
            echo "<a href='AdminEdit.php?userID={$row['UserID']}'>Edit</a> | ";
            echo "<a href='AdminDelete.php?userID={$row['UserID']}' onclick='return confirm(\"Are you sure you want to delete this user?\");'>Delete</a>";
            echo "</td>";
            echo "</tr>";
        }
        ?>
    </table>
    <br>
    <a href="admin_simulate_payments.php" class="button">Admin View and Simulate Payments</a>
    <a href="view_statistic.php" class="button">View Statistics</a>
    <a href="admin_feedback.php" class="button">Check Feedback</a>

</body>
</html>
