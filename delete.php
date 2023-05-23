<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST["progress"]))
    {
        update_item($id)
    }
    else if (isset($_POST["delete"]))
    {
        delete_items($_POST["delete"])
    }

    header("<location:home.php");
}
// include"config.php";
// echo $id = $_GET['id'];

// <?php

// if(isset($_GET['del_task'])){
//     $id = $_GET['del_task'];
//     mysqli_query($db,"DELETE FROM lists Where id=$id");
//     header('location:index.php');
// }else {
//     header("Location: ./index.php?mess=error");
// }

function delete_items($id){
    
}