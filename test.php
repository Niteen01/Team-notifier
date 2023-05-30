<?php
session_start();
include"config.php";
$db = new Database();
if (($_SERVER['REQUEST_METHOD'] == 'POST') && (isset($_POST['new-task']) && isset($_POST['deadline']) && isset($_POST['desc']))) {
    $newtask = $_POST['new-task'];
    $tag = $_POST['tag'];
    $deadline = $_POST['deadline'];
    $time = $_POST['time'];
    $desc = $_POST['desc'];
    $addedby= $_SESSION['name'];
    $inputTimestamp = strtotime($deadline);
    $currentTimestamp = time();

//
if (empty($newtask)) {
    header("Location: home.php?error=Title is required");
    exit();
}else if(empty($deadline)){
    header("Location: home.php?error= Date is required");
    exit();
}
else if(empty($desc)){
    header("Location: home.php?error=Description is required");
    exit();
}

else if($inputTimestamp <= $currentTimestamp){
    header("Location: home.php?error=Date must be of future");
    exit();
    }
else{
    $data = array(
        'tag' => $tag,
        'title' => $newtask,
        'time' => $time,
        'date' => $deadline,
        'description' => $desc,
        'addedby' =>"added by-".$addedby
        );
        $db->insert('lists', $data);
        $lists = $db->select('lists', '*', 'progress = 0');
        header("Location: home.php?success=added task successfully");
        exit();
        }
}
?>