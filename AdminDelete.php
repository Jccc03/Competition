<?php
if (isset($_GET['userID']))
$id = $_GET['userID'];

$host = 'Localhost'; // 127.0.0.1
$user =  'root'; //This needs to be changed depending of the user/developer
$password = '';
$database = 'sdp';
$connection = mysqli_connect($host, $user, $password, $database);

$query = "DELETE FROM tblcustomer WHERE UserID =  '$id'";
if(mysqli_query($connection, $query)){
    header("location:AdminPage.php");
}
?>