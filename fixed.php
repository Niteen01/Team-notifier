<?php
session_start();
include"config.php";
$db = new Database();
$connection = $db->getPrivateVariable();
    
$id = $_GET['id'];
$where="ID=".$id;
$result = $db->select('lists','progress', $where);
$row = $result->fetch_assoc();
if ($row) {
    $progress = $row['progress'];
}
    if($progress==0 || $progress==1){
        $progress=2;
        $name=$_SESSION['name'];
    }
    else{
        $progress=0;
        $name = "";
    }
$sql="UPDATE `lists` SET `progress`= $progress  WHERE ID=$id";
mysqli_query($connection,$sql);
header("location:home.php?name= <?php echo $name; ?>");
?>