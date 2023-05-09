<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

$username = $_POST['username'];
$password = $_POST['password'];

$conn = new mysqli("localhost","root","root","accounts");
if($conn->connect_error){
    die("connection failed".$conn->connect_error);
}
$data=mysqli_query($conn,$sql);

?>