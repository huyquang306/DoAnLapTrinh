<?php
    session_start();
    require("function.php");
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['delete-cart'])){
            $delete = $cart->deleteItem($_POST['item_id'],'cart');
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
    <link rel="stylesheet" type="text/css" href="style.css"/>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>
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
    td{
        width: 33%;
    }
</style>
<body>
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
            <script type="text/javascript" src="JSCode/menuToggle.js"></script>
        </div>	
    </div>	

	<script type="text/javascript" src="./menuToggle.js"></script>
	<div class="small-container cart-page">
        <table>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
            <?php 
                $userid = $_SESSION['_user_id'];
                $subtotal = 0;
                foreach($product->getCartProduct('cart',$userid) as $cart):      
                    foreach($product->getProduct($cart['item_id']) as $item):                
            ?>
            <tr>
                <td>
                    <div class="cart-info">
                        <img src="<?php echo $item['item_image'] ?>">
                        <div>
                            <p><?php echo $item['item_name'] ?></p>
                            <small><?php echo "Price: $" . $item['item_price'] ?></small>
                            <br>
                            <form method="post">
                                <input type="hidden" value="<?php echo $item['item_id'] ?>" name="item_id">
                                <button type="submit" name="delete-cart">Remove</button>
                            </form>                           
                        </div>
                    </div>
                </td>

                <td><?php echo $cart['item_quantity']?></td>
                <td>
                    <?php                        
                        $total = $cart['item_quantity']*$item['item_price'];
                        $subtotal += floatval($total);
                        echo "$" . floatval($total)
                    ?>
                </td>
            </tr>
            <?php
                    endforeach;
                endforeach;
            ?>
        </table>

        <div class="total-price">
            <table>
                <tr>
                    <td>Subtotal</td>
                    <td><?php echo isset($subtotal) ? "$" . $subtotal : 0 ?></td>
                </tr>               
            </table>
        </div>
    </div>
	
<?php
    include('Template/footer.php');
?>