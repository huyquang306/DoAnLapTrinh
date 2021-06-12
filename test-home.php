<?php
	require("function.php");
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['delete-cart'])){
            $delete = $cart->deleteCart($_POST['item_id'],'product');
        }
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $cart->addToProduct($_POST['item_brand'], $_POST['item_name'], $_POST['item_price'], $_POST['item_image'], $_POST['item_type']);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>
    h1{
        font-weight: bolder;
	    color:#ff523b;
        font-family: cursive;               
    }
    .admin-table{
    margin: 50px auto ;
    }
    .admin-table{
        display: none;
    }
    .show-table{
        display: table;
    }
	button{
        display: inline-block;
        border: none;
        outline: none;
        padding: 8px 12px;
        background-color: lightgray;
        cursor: pointer;
        border-radius: 5px;
    }
    button:hover{
        background-color: #ee3110;
	    color: white;
    }
	td input{
		width: 120px;
	}
</style>
<body>
    <div class="header">
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <img src="images/logo.png" width="125px">
                </div>
            </div>
        </div>
    </div>
    
    <div class="small-container">
        <h1>ADMIN PAGE</h1>      
        <div id="myBtnContainer">
			<button class="btn active" onclick="tableSelection('products')"> Products</button>
			<button class="btn" onclick="tableSelection('users')"> Users</button>
			<button class="btn" onclick="tableSelection('orders')"> Orders</button>	
			<button class='btn' onclick="tableSelection('add')">Add Product</button>		
		</div>
            <table class="products admin-table">
                <tr>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Product Brand</th>
                    <th>Product Price</th>
                    <th>Product Type</th>
					<th>Delete</th>
                </tr>
                <?php foreach($product_shuffle as $item){ ?>
                <tr>
                    <td><?php echo $item['item_id'] ?></td>
                    <td><?php echo $item['item_name'] ?></td>
                    <td><?php echo $item['item_brand'] ?></td>
                    <td><?php echo $item['item_price'] ?></td>
                    <td><?php echo $item['item_type'] ?></td>
					<td>
						<form method="post">
							<input type="hidden" value="<?php echo $item['item_id'] ?>" name="item_id">
							<button type="submit" name="delete-cart">Remove</button>
						</form>
					</td>
                </tr>
                <?php }?>
            </table>

            <table class="users admin-table">
                <tr>
                    <th>User ID</th>
                    <th>User Name</th>
                    <th>Email</th>
                </tr>
                <?php foreach($user_shuffle as $item){ ?>
                <tr>
                    <td><?php echo $item['_user_id'] ?></td>
                    <td><?php echo $item['_user_name'] ?></td>
                    <td><?php echo $item['email'] ?></td>
                </tr>
                <?php }?>
            </table>

            <table class="orders admin-table">
                <tr>
                    <th>Cart ID</th>
                    <th>User Name</th>
                    <th>Product </th>
                </tr>
                <?php foreach($cart_shuffle as $item): ?>
                <tr>
                    <td><?php echo $item['cart_id'] ?></td>
                    <?php 
                        $cart_product = $product->getProduct($item['item_id']);
                        $cart_user = $product->getUser($item['_user_id']);
                        array_map(function($temp1,$temp2){                 
                    ?>                  
                    <td><?php echo $temp1['_user_name'] ?></td>
                    <td><?php echo $temp2['item_name'] ?></td>
                </tr>
                <?php 
                    },$cart_user, $cart_product);  
                    endforeach; 
                ?>
            </table>

			<table class='add admin-table'>
					<tr>
						<th>Product Name</th>
						<th>Product Brand</th>
						<th>Product Price</th>
						<th>Product Images</th>
						<th>Product Type</th>
						<th></th>
					</tr>
					<tr>
						<form method="post">
							<td><input type="text" name="item_name"></td>
							<td><input type="text" name="item_brand"></td>
							<td><input type="text" name="item_price"></td>
							<td><input type="text" name="item_image"></td>
							<td><input type="text" name="item_type"></td>
							<td><button type="submit" class="btn">Add</button></td>
						</form>
					</tr>
			</table>      
        <script type="text/javascript" src="./JSCode/admin-table.js" ></script>
    </div>
</body>
</html>