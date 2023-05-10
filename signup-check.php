<?php 
session_start(); 
include "cred.php";

if (isset($_POST['uname']) && isset($_POST['password']) && isset($_POST['name']) && isset($_POST['re_password'])) {


	$uname = $_POST['uname'];
	$pass = $_POST['password'];
	$re_pass = $_POST['re_password'];
	$name = $_POST['name'];

	// $user_data = 'uname='. $uname. '&name='. $name;


	if (empty($uname)) {
		header("Location: signup.php?error=User Name is required");
	    exit();
	}else if(empty($pass)){
        header("Location: signup.php?error=Password is required");
	    exit();
	}
	else if(empty($re_pass)){
        header("Location: signup.php?error=Re Password is required");
	    exit();
	}

	else if(empty($name)){
        header("Location: signup.php?error=Name is required");
	    exit();
	}

	else if($pass !== $re_pass){
        header("Location: signup.php?error=The confirmation password  does not match");
	    exit();
	}

	else{


	    $sql = "SELECT * FROM cred WHERE username='$uname' ";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: signup.php?error=The username is taken try another");
	        exit();
		}else {
           $sql2 = "INSERT INTO cred(username, password, name) VALUES('$uname', '$pass', '$name')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 header("Location: index.php?success=Your account has been created successfully");
	         exit();
           }else {
	           	header("Location: signup.php?error=unknown error occurred");
		        exit();
           }
		}
	}
	
}else{
	header("Location: signup.php");
	exit();
}