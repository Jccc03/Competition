<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="AdminPageStyle.css">
    <title>Admin Edit User Profile</title>
</head>
<body>
    <h2>Admin Edit User Profile</h2>

    <?php
    if (isset($_GET['userID'])) {
        $id = $_GET['userID'];
        $host = 'Localhost'; // 127.0.0.1
        $user =  'root'; //This needs to be changed depending on the user/developer
        $password = '';
        $database = 'sdp';
        $connection = mysqli_connect($host, $user, $password, $database);

        $loadProfileQuery = "SELECT * FROM tblcustomer WHERE UserID = '$id'";
        $result = mysqli_query($connection, $loadProfileQuery);

        if ($result && mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);

            if (isset($_POST['btnEditUser'])) {
                // Get data from the form
                $Username = $_POST['Usernametxt'];
                $UserEmail = $_POST['UserEmailtxt'];
                $UserCarP = $_POST['UserCarPtxt'];
                $UserPassword = $_POST['UserPasswordtxt'];

                // Update the customer's profile
                $updateQuery = "UPDATE tblcustomer SET Username = '$Username', UserEmail = '$UserEmail',
                    UserCarP = '$UserCarP', UserPassword = '$UserPassword' WHERE UserID = '$id'";

                if (mysqli_query($connection, $updateQuery)) {
                    // Display success message and redirect
                    echo '<script>alert("Customer profile updated successfully.");</script>';
                    // You can redirect to another page here
                } else {
                    // Display error message
                    echo '<script>alert("Error updating Customer profile. ' . mysqli_error($connection) . '");</script>';
                }
            }
    ?>
            <!-- Form for editing customer profile -->
            <form action="" method="post">
                Username: <input type="text" name="Usernametxt" value="<?php echo $row['Username']; ?>"><br>
                User Email: <input type="text" name="UserEmailtxt" value="<?php echo $row['UserEmail']; ?>"><br>
                User Car Plate: <input type="password" name="UserCarPtxt" value="<?php echo $row['UserCarP']; ?>"><br>
                User Password: <input type="text" name="UserPasswordtxt" value="<?php echo $row['UserPassword']; ?>"><br>
                <input type="submit" value="Update Customer Profile" name="btnEditUser">
            </form>
    <?php
        }
    }
    ?>
    <br>
    <p>Click <a href="AdminPage.php">here</a> to go back to the list.</p>
</body>
</html>