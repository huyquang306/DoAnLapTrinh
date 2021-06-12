    <?php
		$product_latest = $product->getLatest();
	?>
	
	<div class="small-container">
		<h2 class="title">Latest Products</h2>
		<div class="row">
			<?php foreach($product_latest as $item){ ?>
			<div class="col-4">
				<img src="<?php echo $item['item_image'] ?>">
				<h4> <?php echo $item['item_name'] ?> </h4>
				<div class="rating">
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star-o"></i>
				</div>
				<p> <?php echo '$' . $item['item_price'] ?> </p>
			</div>
			<?php } ?>
		</div>
	</div>