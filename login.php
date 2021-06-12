<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" type="text/css" href="./style.css" />
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="header">    
        <div class="container">
			<div class="navbar">
				<div class="logo">
					<img src="images/logo.png" width="125px">
				</div>
				<nav>
					<ul id="MenuItems">
						<li><a href="./index.php">Home</a></li>
						<li><a href="">Products</a></li>
						<li><a href="">About</a></li>
						<?php
							if(isset($_SESSION['_user_id']) && isset($_SESSION['email']))
								echo '<li><a href="./cart.php">Cart</a></li>';
							else
								echo '<li><a href="./login.php">Cart</a></li>';
						?>
						<li><a href="./login.php">Login</a></li>
					</ul>
				</nav>
				<img src="images/cart.png" width="30px" height="30px">
				<img src="images/menu.png" class="menu-icon" onClick="menutoggle()">
			</div>			
		</div>

	<script type="text/javascript" src="./menuToggle.js"></script>
	
		<div class="account-page">
			<div class="container">
				<div class="row">
					<div class="col-2">
						<img src="./images/image1.png" width="100%">
					</div>
					<div class="col-2">
						<div class="form-container">

							<!--Login Form-->                                          
							<form id="loginform" action="login-check.php" method="post">
								<span>LOGIN</span>

								<?php if(isset($_GET['error'])){ ?>
									<p class="error"><?php echo $_GET['error'] ?></p>
								<?php }?>

								<input type="text" placeholder="Email" name="email"><br>
								<input type="password" placeholder="Password" name="password"><br>
								<button type="submit" class="btn">Login</button>
								<a>Forgot Password</a>
								<a href="signup.php">Create An Account</a>							
							</form>							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<script type="text/javascript" src="JSCode/login.js"></script>



<?php
    include('Template/footer.php');
?>