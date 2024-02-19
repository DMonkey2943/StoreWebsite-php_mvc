<?php
include 'inc/header.php';
?>

<?php
if (isset($_GET['catID']) && $_GET['catID'] != NULL) {
    $id = $_GET['catID'];
} else {
    echo "<script>window.location ='404.php'</script>";
}

// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     $catName = $_POST['catName'];
//     $updateCat = $cat->update_category($catName, $id);
// }
?>

<div class="main">
	<div class="content">
		<div class="content_top">
			<?php
			$nameCat = $cat->get_name_by_cat($id);
			if($nameCat) {
				while($result_name = $nameCat->fetch_assoc()) {
			?>
			<div class="heading">
				<h3>Category: <?php echo $result_name['catName'] ?></h3>
			</div>
			<?php
				}
			} else {
				echo 'Category Not Available';
			}
			?>
			<div class="clear"></div>
		</div>
		<div class="section group">
			<?php
			$productByCat = $cat->get_product_by_cat($id);
			if($productByCat) {
				while($result = $productByCat->fetch_assoc()) {
			?>
			<div class="grid_1_of_4 images_1_of_4">
				<a href="preview-3.php"><img src="admin/uploads/<?php echo $result['image'] ?>" alt="" height="200px" /></a>
				<h2><?php echo $result['productName'] ?></h2>
				<p><?php echo $fm->textShorten($result['product_desc'], 40) ?></p>
				<p><span class="price"><?php echo number_format($result['price']).'VNĐ'  ?></span></p>
				<div class="button"><span><a href="details.php?proID=<?php echo $result['productID'] ?>" class="details">Details</a></span></div>
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