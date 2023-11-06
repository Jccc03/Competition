<?php
// Include your database connection code here
include 'config.php';

// Define a query to fetch the booking details for the currently logged-in user
session_start();
if (!isset($_SESSION['UserID'])) {
    // Redirect users to the login page if they are not logged in
    header("Location: LoginPage.php");
    exit();
}

$loggedInUserID = $_SESSION['UserID'];

// Define a query to fetch the user's name and email
$queryCustomer = "SELECT Username, UserEmail FROM tblcustomer WHERE UserID = $loggedInUserID";
$resultCustomer = mysqli_query($connection, $queryCustomer);

if (!$resultCustomer) {
    // Handle the case where the query fails
    echo "Failed to retrieve user details.";
    exit();
}

// Fetch the user's name and email
$userData = mysqli_fetch_assoc($resultCustomer);
$userName = $userData['Username'];
$userEmail = $userData['UserEmail'];

$query = "SELECT b.BookingID, c.Username, c.UserCarP, b.Location, b.StartTime, b.TimeDuration
          FROM booking b
          JOIN tblcustomer c ON b.UserID = c.UserID
          WHERE b.UserID = $loggedInUserID AND b.PaymentStatus <> 'Paid'"; // Exclude records with PaymentStatus 'Paid'

$result = mysqli_query($connection, $query);

if (!$result) {
    // Handle the case where the query fails
    echo "Failed to retrieve booking details.";
    exit();
}
?>



<!DOCTYPE html>
<html>
<head>
    <title>Checkout - Payment Page</title>
    <style>
        /* Container styles */
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #f5f5f5;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            padding: 20px;
            overflow: hidden;
        }

        /* Header styles */
        h1 {
            color: #333;
        }

        /* Section styles */
        .section {
            margin: 20px 0;
        }

        /* Form group styles */
        .form-group {
            margin-bottom: 10px;
        }

        label {
            font-weight: bold;
            display: block;
        }

        input[type="text"],
        input[type="email"],
        input[type="b-card"],
        input[type="cvv"],
        input[type="expdate"]{
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            margin-top: 5px;
        }

        /* Cart styles */
        .cart {
            text-align: left;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        /* Button styles */
        button, a.button {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            margin-right: 10px;
            transition: background-color 0.3s, color 0.3s;
            text-decoration: none;
            display: inline-block;
        }

        button:hover, a.button:hover {
            background-color: #333;
        }

        /* Notification styles */
        .notification {
            background-color: #007BFF;
            color: #fff;
            padding: 10px;
            display: none;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Checkout - Payment Page</h1>
    
    <div class="section">
        <h2 class="section-title">Basic Details</h2>
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $userName; ?>" readonly>
        
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $userEmail; ?>" readonly>
            <label for="bank-details">Bank Card:</label>
            <input type="b-card" id="b-card" name="b-card">
            <label for="cvv">CVV:</label>
            <input type="cvv" id="cvv" name="cvv">
            <label for="ExpiryDate">Expiry Date:</label>
            <input type="expdate" id="expdate" name="expdate">           
        </div>
    </div>

    <div class="section">
        <h2 class="section-title">Order Details</h2>
        <div class="cart">
            <table>
                <tr>
                    <th>Booking ID</th>
                    <th>Username</th>
                    <th>Car Plate</th>
                    <th>Location</th>
                    <th>Start Time</th>
                    <th>Time Duration</th>
                    <th>Action</th>
                </tr>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>{$row['BookingID']}</td>";
                    echo "<td>{$row['Username']}</td>";
                    echo "<td>{$row['UserCarP']}</td>";
                    echo "<td>{$row['Location']}</td>";
                    echo "<td>{$row['StartTime']}</td>";
                    echo "<td>{$row['TimeDuration']} hours</td>";
                    echo '<td><a class="button" href="delete_booking.php?bookingID=' . $row['BookingID'] . '">Delete</a></td>';
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </div>

    <button id="proceed-button" type="button">Proceed to Payment</button>
    <div id="notification" class="notification">
        Your payment has been done. Admin will verify and notify via payment history in profile section.
    </div>
    
    <a href="userpage.php" class="button">Back to main page</a>
    <a href="profile.php" class="button">Go to Profile page</a>
</div>

<script>
    const proceedButton = document.getElementById('proceed-button');
    const notification = document.getElementById('notification');

    proceedButton.addEventListener('click', () => {
        notification.style.display = 'block';
        setTimeout(() => {
            notification.style.display = 'none'; // Corrected this line
            // You can add the code here to proceed with the payment
        }, 3000); // Notification disappears after 3 seconds (adjust as needed)
    });

</script>
</body>
</html>
