<?php
include 'inc/header.php';
?>

<?php
if (isset($_GET['cartID']) ) {
	$cartID = $_GET['cartID'];
	$delcart = $cart->del_product_cart($cartID);
}

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
	$cartID = $_POST['cartID'];
    $quantity = $_POST['quantity'];
	$update_quantity_cart = $cart->update_quantity_cart($quantity, $cartID);
	if($quantity == 0) {
		$delcart = $cart->del_product_cart($cartID);
	}
}
?>
<?php
if(!isset($_GET['id'])) {
	echo "<meta http-equiv='refresh' content='0; URL=?id=live'>";
}
?>

<div class="main">
	<div class="content">
		<div class="cartoption">
			<div class="cartpage">
				<h2>Your Cart</h2>
				<?php
				if(isset($update_quantity_cart)) {
					echo $update_quantity_cart;
				}
				?>
				<?php
				if(isset($delcart)) {
					echo $delcart;
				}
				?>
				<table class="tblone">
					<tr>
						<th width="20%">Product Name</th>
						<th width="10%">Image</th>
						<th width="15%">Price</th>
						<th width="25%">Quantity</th>
						<th width="20%">Total Price</th>
						<th width="10%">Action</th>
					</tr>
					<?php
					$get_pd_cart = $cart->get_product_cart();
					if($get_pd_cart){
						$subTotal = 0;
						$qty = 0;
						while($result = $get_pd_cart->fetch_assoc()) {
					?>
					<tr>
						<td><?php echo $result['productName'] ?></td>
						<td><img src="admin/uploads/<?php echo $result['image'] ?>" alt="" /></td>
						<td><?php echo number_format($result['price']).'VNĐ' ?></td>
						<td>
							<form action="" method="post">
								<input type="hidden" name="cartID" value="<?php echo $result['cartID'] ?>" min="0" />
								<input type="number" name="quantity" value="<?php echo $result['quantity'] ?>" min="0" />
								<input type="submit" name="submit" value="Update" />
							</form>
						</td>
						<td>
							<?php 
							$total = $result['price']*$result['quantity'];
							echo number_format($total).'VNĐ' 
							?>
						</td>
						<td><a onclick="return confirm('Are you want to delete?');"  href="?cartID=<?php echo $result['cartID'] ?>">Xóa</a></td>
					</tr>
					<?php
						$subTotal += $total;
						$qty += $result['quantity'];
					}
					}
					?>
					
				</table>
				<?php
				$check_cart = $cart->check_cart();
				if($check_cart) {
				?>
				<table style="float:right;text-align:left;" width="40%">
					<tr>
						<th>Sub Total : </th>
						<td><?php 
							echo number_format($subTotal).'VNĐ';
							Session::set('sum', $subTotal);
							Session::set('qty', $qty);
						?></td>
					</tr>
					<tr>
						<th>VAT (10%): </th>
						<td>
							<?php $vat = $subTotal*0.1;
							echo number_format($vat).'VNĐ ' ; ?>
						</td>
					</tr>
					<tr>
						<th>Grand Total :</th>
						<td><?php echo number_format($subTotal + $vat).'VNĐ' ?></td>
					</tr>
				</table>
				<?php
				} else {
					echo 'Your cart is empty! Please shopping now';
				}
				?>
			</div>
			<div class="shopping">
				<div class="shopleft">
					<a href="index.php"> <img src="images/shop.png" alt="" /></a>
				</div>
				<div class="shopright">
					<a href="payment.php"> <img src="images/check.png" alt="" /></a>
				</div>
			</div>
		</div>
		<div class="clear"></div>
	</div>
</div>

<?php
include 'inc/footer.php';
?>