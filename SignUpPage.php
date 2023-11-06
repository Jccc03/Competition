<?php
    // Below is connection to database (WIP)
    $host = 'Localhost'; // 127.0.0.1
    $user =  'root'; //This needs to be changed depending of the user/developer
    $password = '';
    $database = 'sdp';
    $connection = mysqli_connect($host, $user, $password, $database);

    if (isset($_POST["SignUp_btn"])){
        $username = $_POST["UserName"];
        $email = $_POST["UserEmail"];
        $CPlate = $_POST["UserCarP"];
        $password = $_POST["UserPassword"];

        // Remember to create Database and follow the table name and collunm name below !!!!!!!!!!!!!!!!
        $query = "INSERT INTO `tblcustomer`(`UserName`, `UserEmail`, `UserCarP`, `UserPassword`) VALUES ('$username','$email','$CPlate','$password')";

        if (mysqli_query($connection,$query)){
            header("Location: LoginPage.php");
        } else {
            echo "Something Went Wrong, Please Try Again";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Page</title>
    <link rel="stylesheet" href="LoginSign.css">
</head>
<body>
    <div class="container">
        <h2>Sign Up</h2>
        <form action="" method="POST">
            <!-- Ask for Username  -->
            <div class="SignUp_form">
                <label for="UserName">Username</label>
                <input type="text" id="UserName" name="UserName" placeholder="Car Parker" required>
            </div>
            <!-- Ask for User Email  -->
            <div class="SignUp_form">
                <label for="UserEmail">Email</label>
                <input type="email" id="UserEmail" name="UserEmail" placeholder="Example@email.com" required>
            </div>
            <!-- Ask for User Car Plate Number  -->
            <div class="SignUp_form">
                <label for="UserCarP">Car Plate Number</label>
                <input type="text" id="UserCarP" name="UserCarP" placeholder="WWW 8888 " required>
            </div>
            <!-- Create Password  -->
            <div class="SignUp_form">
                <label for="UserPassword">Password</label>
                <input type="password" id="UserPassword" name="UserPassword"  required>
            </div>
            <!-- Confirm Password  -->
            <div class="SignUp_form">
                <label for="UserCPassword">Confirm Password</label>
                <input type="password" id="UserCPassword" name="UserCPassword"  required>
            </div>

            <button type="submit" name="SignUp_btn">Sign Up</button>
            <div>
                <a href="LoginPage.php" class="LIPbtn">Log In Here</a>
                <a href="HomePage" class="HPbtn">WIP</a>
            </div>
        </form>
        <script src="PassVal.js"></script>

    </div>

    
</body>
</html>