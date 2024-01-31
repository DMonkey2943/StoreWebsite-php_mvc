<?php 
	include 'inc/header.php';
	include 'inc/slider.php';
?>

		<div class="main">
			<div class="content">
				<div class="content_top">
					<div class="heading">
						<h3>Feature Products</h3>
					</div>
					<div class="clear"></div>
				</div>
				<div class="section group">
					<?php
					$product_feature = $product->getproduct_feature();
					if($product_feature) {
						while($result = $product_feature->fetch_assoc()) {						
					?>
					<div class="grid_1_of_4 images_1_of_4">
						<a href="details.php"><img src="admin/uploads/<?php echo $result['image'] ?>" alt="" height="200px"/></a>
						<h2><?php echo $result['productName'] ?></h2>
						<p><?php echo $fm->textShorten($result['product_desc'], 40) ?></p>
						<p><span class="price"><?php echo number_format($result['price']).'VNĐ' ?></span></p>
						<div class="button"><span><a href="details.php?proID=<?php echo $result['productID'] ?>" class="details">Details</a></span></div>
					</div>
					<?php
						}
					}
					?>					
				</div>
				<div class="content_bottom">
					<div class="heading">
						<h3>New Products</h3>
					</div>
					<div class="clear"></div>
				</div>
				<div class="section group">
					<?php
					$product_new = $product->getproduct_new();
					if($product_new) {
						while($result_new = $product_new->fetch_assoc()) {						
					?>
					<div class="grid_1_of_4 images_1_of_4">
						<a href="details.php"><img src="admin/uploads/<?php echo $result_new['image'] ?>" alt="" height="200px"/></a>
						<h2><?php echo $result_new['productName'] ?> </h2>
						<p><span class="price"><?php echo number_format($result_new['price']).'VNĐ' ?></span></p>
						<div class="button"><span><a href="details.php?proID=<?php echo $result_new['productID'] ?>" class="details">Details</a></span></div>
					</div>
					<?php
						}
					}
					?>
				</div>
			</div>
		</div>
	

<?php 
	include 'inc/footer.php';
?>