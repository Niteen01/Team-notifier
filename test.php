<?php
include"config.php";
$db = new Database();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $newtask = $_POST['new-task'];
    $tag = $_POST['tag'];
    $deadline = $_POST['deadline'];
    $time = $_POST['time'];
    $desc = $_POST['desc'];

    $data = array(
        'title' => $newtask,
        'tag' => $tag,
        'date' => $deadline,
        'time' => $time,
        'description' => $desc
    );
    $db->insert('lists', $data);
}
// $lists = $db->select('lists', '*', 'progress = 0');
 header("Location: ./home.php");

?>