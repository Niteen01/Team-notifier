<?php
include "config.php";

$desc = $_POST['desc'];
$newtask = $_POST['new-task'];
$tag = $_POST['tag'];
$deadline = $_POST['deadline'];
$time = $_POST['time'];

mysqli_query($db , "INSERT INTO `lists`(`title`, `tag`, `date`, `time`, `description`) VALUES ('$newtask','$tag','$deadline','$time','$desc' )");

?>