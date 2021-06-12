<?php
	session_start();
	include 'Database/db-controller.php';
	$db = new DBController();
	
	if(isset($_POST['email']) && isset($_POST['password'])){
		function validate($data){
			$data = trim($data);
			$data = stripcslashes($data);
			$data = htmlspecialchars($data);
			return $data; 
		}
		$email = validate($_POST['email']);
		$pass = validate($_POST['password']);
		$pass = md5($pass);
		if(empty($email)){
			header("Location: login.php?error=User name is required");
			exit();
		}else if(empty($pass)){
			header("Location: login.php?error=Password is required");
			exit();
		}else{
			$sql = "SELECT * from users WHERE email = '$email' and _password = '$pass'";
			$result = mysqli_query($db->con, $sql);

			if(mysqli_num_rows($result) === 1){
				$row = mysqli_fetch_assoc($result);
				if($row['email'] === $email && $row['_password'] === $pass){
                    $_SESSION['email'] = $row['email'];
					$_SESSION['_user_name'] = $row['_user_name'];
					$_SESSION['_user_id'] = $row['_user_id'];
					header("Location: index.php");
				}else{
					header("Location: login.php?error=Incorrect username or password");
					exit();
				}
			}else{
				header("Location: login.php?error=Incorrect username or password");
				exit();
			}
		}
	}
	else{
		header("Location: login.php");
		exit();
	}
?>