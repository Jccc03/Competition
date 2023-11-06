<?php
include 'config.php'; // Include your database connection code

// Function to get the total count based on a query
function getCount($connection, $query) {
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("Database query failed.");
    }
    $row = mysqli_fetch_assoc($result);
    return $row['Total'];
}

// Query to count the total registered users
$queryTotalUsers = "SELECT COUNT(UserID) AS Total FROM tblcustomer";
$totalUsers = getCount($connection, $queryTotalUsers);

// Query to count the total paid users
$queryPaidUsers = "SELECT COUNT(UserID) AS Total FROM booking WHERE PaymentStatus = 'Pending'";
$totalPaidUsers = getCount($connection, $queryPaidUsers);
$totalUnpaidUsers = $totalUsers - $totalPaidUsers;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Statistics</title>
    <link rel="stylesheet" type="text/css" href="AdminPageStyle.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
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
<body>
    <h1>Statistics</h1>
    
    <div style="max-width: 400px;">
        <canvas id="registeredUsersChart"></canvas>
    </div>

    <p>Total Registered Users: <?php echo $totalUsers; ?></p>

    <div style="max-width: 400px;">
        <canvas id="paidUsersChart"></canvas>
    </div>

    <p>Total Paid Users: <?php echo $totalUnpaidUsers; ?></p>
    <p>Total Unpaid Users: <?php echo $totalPaidUsers; ?></p>

    <script>
        // JavaScript to create the pie chart for registered users
        var ctx1 = document.getElementById('registeredUsersChart').getContext('2d');
        var registeredUsersChart = new Chart(ctx1, {
            type: 'pie',
            data: {
                labels: ['Registered Users'],
                datasets: [{
                    data: [<?php echo $totalUsers; ?>],
                    backgroundColor: ['#36A2EB']
                }]
            }
        });

        // JavaScript to create the pie chart for paid and unpaid users
        var ctx2 = document.getElementById('paidUsersChart').getContext('2d');
        var paidUsersChart = new Chart(ctx2, {
            type: 'pie',
            data: {
                labels: ['Unpaid Users', 'Paid Users'],
                datasets: [{
                    data: [<?php echo $totalPaidUsers; ?>, <?php echo $totalUnpaidUsers; ?>],
                    backgroundColor: ['#36A2EB', '#FFCE56']
                }]
            }
        });
    </script>

    <br>
    <a href="admin_simulate_payments.php" class="button">Admin View and Simulate Payments</a>
    <a href="AdminPage.php" class="button">Back</a>
</body>
</html>