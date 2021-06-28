<?php
    $item_id = $_GET['item_id'];
	foreach($product->getData() as $item):
		if($item['item_id'] == $item_id):
?>

<?php 
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		if(isset($_SESSION['_user_id'])){
			$cart->addToCart($_POST['_user_id'],$_POST['item_id'],$_POST['item_quantity']);
		} else{
			header("Location: login.php");
		}
	}
?>

    <div class="small-container single-product">
		<div class="row">
			<div class="col-2">
				<img src="<?php echo $item['item_image']?>" width="100%" id="big-img">
				<div class="small-img-row">
					<div class="small-img-col">
						<img src="./images/gallery-1.jpg" width="100%" class="small-img">
					</div>
					<div class="small-img-col">
						<img src="./images/gallery-2.jpg" width="100%" class="small-img">
					</div>
					<div class="small-img-col">
						<img src="./images/gallery-3.jpg" width="100%" class="small-img">
					</div>
					<div class="small-img-col">
						<img src="./images/gallery-4.jpg" width="100%" class="small-img">
					</div>
				</div>		
			</div>	
	
			<script type="text/javascript" src="JSCode/product-image-display.js"></script>				
			
            <div class="col-2">
                <h1><?php echo $item['item_name'] ?></h1>
				<h4>by <?php echo $item['item_brand'] ?></h4>
                <h4>$<?php echo $item['item_price'] ?></h4>
                <p>Select Size</p>
                <select>
                    <option>S</option>
                    <option>M</option>
                    <option>L</option>
                    <option>XL</option>
                    <option>XXL</option>
                </select>
                
				<form method="post">
					<p>Select Number</p>
					<input type="number" name = "item_quantity" value="1">					
					<input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?>"><br>
					<input type="hidden" name="_user_id" value="<?php if(isset($_SESSION['_user_id'])){echo $_SESSION['_user_id'];} ?>"><br>
					<button class="btn" type="submit">Add To Cart</button>
				</form>
				                
            </div>
        </div>
    </div>

<?php 
	endif;
	endforeach;
?>