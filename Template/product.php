<div class="categories">
		<div class="small-container">
			<div class="row">
				<div class="col-3">
					<img src="images/category-1.jpg">
				</div>
				<div class="col-3">
					<img src="images/category-2.jpg">
				</div>
				<div class="col-3">
					<img src="images/category-3.jpg">
				</div>
			</div>
		</div>
	</div>
	<div class="small-container">
		<h2 class="title">Featured Products</h2>
		<style>
			#search-bar{
				width: 345px;
				height: 30px;
			}
			form{
				display: inline-block;
			}
			form button{
				width: 30px;
				height: 30px;
				cursor: pointer;
				background-color: #ee3110; 
			}
			form button i{
				color: white; 
			}

		</style>
		<form method="get">
			<input type="text" id="search-bar" placeholder="Search" name="product_name">
			<button type="submit" name="search"><i class="fa fa-search"></i></button>
		</form>
		
		<!-- FilterElements-->

		<div id="myBtnContainer">
			<button class="btn active" onclick="filterSelection('all')"> Show All</button>		
			<button class="btn" onclick="filterSelection('shirt')"> Shirt</button>
			<button class="btn" onclick="filterSelection('jeans')"> Jeans</button>
			<button class="btn" onclick="filterSelection('sneaker')"> Sneaker</button>
			<button class="btn" onclick="filterSelection('others')"> Others</button>			
		</div>


		<div class="row-filterDiv">
		<?php 
			if($_SERVER['REQUEST_METHOD'] == 'GET'){ 
				if(isset($_GET['search'])){
					$test = $product->Search($_GET["product_name"]);
					foreach($test as $item){ ?>
						<div class="filterDiv <?php echo $item['item_type'] ?>">
						<img src="<?php echo $item['item_image'] ?>">
						<a href="<?php printf('%s?item_id=%s','product-details.php',$item['item_id']) ?>">
							<h4><?php echo $item['item_name'] ?></h4>	
						</a>
						<div class="rating">
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star-o"></i>
						</div>
						<p> <?php echo '$' . $item['item_price'] ?> </p>		
						</div>
					<?php } 
				}else{
					foreach($product_shuffle as $item) { ?>
						<div class="filterDiv <?php echo $item['item_type'] ?>">
							  <img src="<?php echo $item['item_image'] ?>">
							<a href="<?php printf('%s?item_id=%s','product-details.php',$item['item_id']) ?>">
								<h4><?php echo $item['item_name'] ?></h4>	
							</a>
							<div class="rating">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-o"></i>
							</div>
							<p> <?php echo '$' . $item['item_price'] ?> </p>		
						</div>
					<?php }			
				}
			} 
		?> 
		</div>
	</div>
	<script type="text/javascript" src="JSCode/filterSelection.js" ></script>