<?php
include 'inc/header.php';
?>

<?php
if (isset($_GET['orderID']) && $_GET['orderID'] == 'order') {
    $customerID = Session::get('customer_id');
    $insertOrder = $cart->insert_order($customerID);
    $delCart = $cart->del_all_data_cart();
    header("Location: success.php");
}
// else {
//     echo "<script>window.location ='404.php'</script>";
// }

// if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
//     $quantity = $_POST['quantity'];
//     $addToCart = $cart->add_to_cart($quantity, $id);
// }
?>

<style>
    h2.success_order {
        color: green;
        font-size: 32px;
        text-align: center;
        margin: 30px;
    }

    .success_note {
        text-align: center;
        font-size: 20px;
        padding: 8px;
    }
</style>

<div class="main">
    <div class="content">
        <div class="section group">
            <h2 class="success_order">Success Order</h2>
            <?php
            $customerID = Session::get('customer_id');
            $get_amount = $cart->get_amount_price($customerID);
            if ($get_amount) {
                $amount = 0;
                while ($result = $get_amount->fetch_assoc()) {
                    $price = $result['price'];
                    $amount += $price;
                }
            }
            ?>
            <p class="success_note">Total Price You Have Bought From My Website:
                <?php
                $total = $amount * 1.1;
                echo number_format($total).'VNĐ';
                ?>
            </p>
            <p class="success_note">We will contact as soon as possible. Please see your order details here
                <a href="orderdetails.php">Click Here</a>
            </p>
        </div>
    </div>

</div>

<?php
include 'inc/footer.php';
?>