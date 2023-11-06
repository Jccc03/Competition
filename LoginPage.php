<?php
    session_start();
    // Below is connection to database (WIP)
    $host = 'Localhost'; // 127.0.0.1
    $user =  'root'; //This needs to be changed depending of the user/developer
    $password = '';
    $database = 'sdp';
    $connection = mysqli_connect($host, $user, $password, $database);

if (isset($_POST["login_btn"])){
    // Takes input from the HTML form and put into attributes
    $email = $_POST["login_email"];
    $password = $_POST["login_password"];
    
    if ($email == "admin@login.com" && $password == "adminlogin"){
        // Admin login
        header("Location: AdminPage.php"); // Redirect User to Registered HomePage
    } else {
        // User login
        // Query for Database (Remember to create database.)
        $query = "SELECT * FROM tblcustomer WHERE UserEmail = '$email' AND UserPassword = '$password'";
        $result = mysqli_query($connection, $query);
        $row = mysqli_fetch_assoc($result); //To find the ID of customer
        $count = mysqli_num_rows($result); //To see if number is one or zero

        // If count is one = found customer data
        if ($count == 1){
            echo "Log In Successfully";
            //$_SESSION is for taking data from the database to save into session cookies. Data taken is UserID, Email, and Username
            $_SESSION['UserID'] = $row["UserID"];
            $_SESSION['UserEmail'] = $row["UserEmail"];
            $_SESSION['UserName'] = $row["UserName"];
            header("Location: userpage.php"); // Remember to change this to user page
        } else {
            echo "Record Not Found, Please Try Again";
        }
    }
}

    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- To connect to css  -->
    <link rel="stylesheet" href="LoginSign.css"> 
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <!-- Form for login  asking for email and password-->
        <form name="login" action="" method="POST">
            <div name="login_form">
                <label for="email">Email </label>
                <input type="email" id="login_email" name="login_email" placeholder="example@email.com" required>
            </div>
            <div name="login_form">
                <label for="Password">Password </label>
                <input type="password" id="login_password" name="login_password" required>
            </div>
            <!-- button to submit form  -->
            <button type="submit" name="login_btn">Log In</button>
            <div>
                <a href="SignUpPage.php" class="SUPbtn">Sign Up Here</a>
                <a href="HomePage" class="HPbtn">WIP</a>
            </div>
        </form>
    </div>
</body>
</html>