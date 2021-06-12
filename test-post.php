<?php
    session_start();
	require('function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RED STORE</title>
    <link rel="stylesheet" type="text/css" href="./style.css" />
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<style>
			#search-bar{
				width: 200px;
				height: 30px;
			}
			form{
				display: inline-block;
			}
			form button{
				width: 30px;
				height: 30px;
				cursor: pointer;
				border-color: red;
			}
	</style>
	<form method="post">	
		<input type="text" id="search-bar" placeholder="Search" name="product_name">
		<input type="submit" name="search" value="submit"><i class="fa fa-search">
	</form>
	<?php
		if($_SERVER['REQUEST_METHOD'] == 'POST'){ 
			if(isset($_POST['search'])){
				$test = $product->Search($_POST["product_name"]);
				print_r($test);
			}
		} else{
			print_r($product_shuffle);
		}
		
	?>
</body>