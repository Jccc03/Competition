<?php
    //Below is connection to database (WIP)
    $host = 'Localhost'; // 127.0.0.1
    $user =  'root'; //This needs to be changed depending of the user/developer
    $password = '';
    $database = 'sdp';
    $connection = mysqli_connect($host, $user, $password, $database);

// Create a database connection
// $conn = mysqli_connect($servername, $username, $password, $database);

// Check the connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
