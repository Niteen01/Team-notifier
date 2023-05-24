<?php
include"config.php";
$db = new Database();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sortby = $_POST['sortby'];
}

$lists = $db->select('lists ORDER BY tag ASC;', '*', '');
// print_r($lists);

header("Location: ./home.php");

?>