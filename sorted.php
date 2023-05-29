<?php
include"config.php";
$db = new Database();
$sortby="";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sortby = $_POST['sortby'];
        if($sortby=='frontend'){
            // echo $sortby."frontend";
            $result = $db->select('lists ORDER BY tag DESC', '*', );
        }
        else{
            $result = $db->select('lists ORDER BY tag ASC', '*', );
            // echo $sortby."backend";
        }
}
else{
    $result=$db->select("lists","*", );
} 


// function sorted(){
//     return $result;
// }

// print_r($lists);

header("Location:./home.php?value=$sortby");

                // $rows = array();
                // while ($row = $result->fetch_assoc()) {
                //     $rows[] = $row;
                //         echo $row['title']."  ";
                //         echo $row['tag']."  ";
                //         echo $row['date']."  ";
                //         echo $row['time']."  ";
                //         echo $row['description']."\n";

                // }