<?php
    session_start();
	require('function.php'); 
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['search'])){
            $product_search = $product->Search($_POST['product_name']);
        }
    }  
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

<?php
    include('Template/header.php')
?>

<?php
    include('test-login.php')
?>

<?php
    include('Template/latest-product.php')
?>
		  	
<?php
    include('Template/offer.php')
?>	
	
<?php
    include('Template/comment.php')
?>	
		
<?php
    include('Template/advertisement.php')
?>
	
<?php
    include('Template/footer.php')
?>