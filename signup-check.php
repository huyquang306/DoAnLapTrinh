<?php 
session_start(); 
require "Database/db-controller.php";
$db = new DBController();

if (isset($_POST['username']) && isset($_POST['password'])
    && isset($_POST['email']) && isset($_POST['repassword'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$username = validate($_POST['username']);
	$pass = validate($_POST['password']);

	$repass = validate($_POST['repassword']);
	$email = validate($_POST['email']);

	$user_data = 'username='. $username. '&email='. $email;


	if (empty($username)) {
		header("Location: signup.php?error=User Name is required&$user_data");
	    exit();
	}
	else if(empty($email)){
        header("Location: signup.php?error=Email is required&$user_data");
	    exit();	
	}
	else if(empty($pass)){
        header("Location: signup.php?error=Password is required&$user_data");
	    exit();
	}
	else if(empty($repass)){
        header("Location: signup.php?error=Confirm Password is required&$user_data");
	    exit();
	}
	else if($pass !== $repass){
        header("Location: signup.php?error=The confirmation password does not match&$user_data");
	    exit();
	}
	else{

		// hashing the password
        $pass = md5($pass);

	    $sql = "SELECT * FROM users WHERE email='$email' ";
		$result = mysqli_query($db->con, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: signup.php?error=The username is taken, try another&$user_data");
	        exit();
		}else{
           $sql2 = "INSERT INTO users(_user_name, _password, email) VALUES('$username', '$pass', '$email')";
           $result2 = mysqli_query($db->con, $sql2);
           if ($result2) {
           	 header("Location: signup.php?success=Your account has been created successfully");
	         exit();
           }else {
	           	header("Location: signup.php?error=unknown error occurred&$user_data");
		        exit();
           }
		}
	}	
}else{
	header("Location: signup.php");
	exit();
}