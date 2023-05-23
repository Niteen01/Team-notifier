<?php
// if (isset($_GET['ID'])) {
    include"config.php";
    $db = new Database();
    $connection = $db->getPrivateVariable();
    
$id = $_GET['id'];
$sql = "DELETE FROM lists WHERE ID='$id'";
mysqli_query($connection,$sql);
header("location:home.php");

// }
?>