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
						<?php
							if(isset($_SESSION['_user_id']) && isset($_SESSION['email']))
								echo '<li><a href="./logout.php">Logout</a></li>';
							else
								echo '<li><a href="./login.php">Login</a></li>';
						?>	
					</ul>
				</nav>
				<img src="images/cart.png" width="30px" height="30px">
				<img src="images/menu.png" class="menu-icon" onClick="menutoggle()">
			</div>
			<div class="row">
				<div class="col-2">
					<h1> Give Your Workout <br> A New Style! </h1>
					<a href="" class="btn1"> Explore Now &#8594</a>
				</div>
				<div class="col-2">
					<img src="images/image1.png">
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="JSCode/menuToggle.js"></script>