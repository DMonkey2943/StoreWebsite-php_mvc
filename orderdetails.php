<?php
include 'inc/header.php';
?>

<?php
$login_check = Session::get('customer_login');
if($login_check==false) {
	header("Location: login.php");
}
?>

<div class="main">
	<div class="content">
		<div class="cartoption">
			<div class="cartpage">
				<h2 >Your Details Ordered</h2>
				
				<table class="tblone">
					<tr>
						<th width="5%">ID</th>
						<th width="25%">Product Name</th>
						<th width="10%">Image</th>
						<th width="15%">Price</th>
						<th width="10%">Quantity</th>
						<th width="10%">Date</th>
						<th width="15%">Status</th>
						<th width="10%">Action</th>
					</tr>
					<?php
                    $customerID = Session::get('customer_id');
					$get_cart_ordered = $cart->get_cart_ordered($customerID);
					if($get_cart_ordered){
						$qty = 0;
                        $i=0;
						while($result = $get_cart_ordered->fetch_assoc()) {
                            $i++;
					?>
					<tr>
						<td><?php echo $i ?></td>
						<td><?php echo $result['productName'] ?></td>
						<td><img src="admin/uploads/<?php echo $result['image'] ?>" alt="" /></td>
						<td><?php echo number_format($result['price']).'VNĐ' ?></td>
						<td> <?php echo $result['quantity'] ?> </td>
                        <td><?php echo $fm->formatDate($result['dateOrder']) ?></td>
						<td>
                            <?php
                            if($result['status']==0){
                                echo "Pending";
                            } else {
                                echo "Processed";
                            }
                            ?>
                        </td>
                        <?php
                        if($result['status']==0) {
                        ?>
                        <td><?php echo "N/A" ?></td>
                        <?php
                        } else {
                        ?>
						<td><a onclick="return confirm('Are you want to delete?');" href="?cartID=<?php echo $result['cartID'] ?>">Xóa</a></td>
                        <?php
                        }
                        ?>
                    </tr>
					<?php
					    }
					}
					?>
					
				</table>
				
			</div>
			
		</div>
		<div class="clear"></div>
	</div>
</div>

<?php
include 'inc/footer.php';
?>