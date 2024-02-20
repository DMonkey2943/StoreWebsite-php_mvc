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
    .box_left {
        width: 50%;
        float: left;
        border: 1px solid #666;
        padding: 8px;
    }

    .box_right {
        width: 45%;
        float: right;
        border: 1px solid #666;
        padding: 8px;
    }

    .submit_order {
        display: inline-block;
        padding: 8px 50px;
        margin-bottom: 16px;
        font-size: 20px;
        font-weight: bold;
        border-radius: 5px;
        border: none;
        background: rgba(0, 90, 0, 0.8);
        color: white;
        cursor: pointer;
    }
</style>
<form action="" method="POST">
    <div class="main">
        <div class="content">
            <div class="section group">
                <div class="content_top">
                    <div class="heading">
                        <h3>Offline Payment</h3>
                    </div>
                    <div class="clear"></div>
                </div>

                <div class="box_left">
                    <div class="cartpage">
                        <?php
                        if (isset($update_quantity_cart)) {
                            echo $update_quantity_cart;
                        }
                        ?>
                        <?php
                        if (isset($delcart)) {
                            echo $delcart;
                        }
                        ?>
                        <table class="tblone">
                            <tr>
                                <th width="5%">ID</th>
                                <th width="15%">Product Name</th>
                                <!-- <th width="10%">Image</th> -->
                                <th width="15%">Price</th>
                                <th width="25%">Quantity</th>
                                <th width="20%">Total Price</th>
                            </tr>
                            <?php
                            $get_pd_cart = $cart->get_product_cart();
                            if ($get_pd_cart) {
                                $subTotal = 0;
                                $qty = 0;
                                $i = 0;
                                while ($result = $get_pd_cart->fetch_assoc()) {
                                    $i++;
                            ?>
                                    <tr>
                                        <td><?php echo $i ?></td>
                                        <td><?php echo $result['productName'] ?></td>
                                        <td><?php echo number_format($result['price']) . 'VNĐ' ?></td>
                                        <td>
                                            <?php echo $result['quantity'] ?>
                                        </td>
                                        <td>
                                            <?php
                                            $total = $result['price'] * $result['quantity'];
                                            echo number_format($total) . 'VNĐ'
                                            ?>
                                        </td>
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
                        if ($check_cart) {
                        ?>
                            <table style="float:right;text-align:left;" width="40%">
                                <tr>
                                    <th>Sub Total : </th>
                                    <td><?php
                                        echo number_format($subTotal) . 'VNĐ';
                                        Session::set('sum', $subTotal);
                                        Session::set('qty', $qty);
                                        ?></td>
                                </tr>
                                <tr>
                                    <th>VAT (10%): </th>
                                    <td>
                                        <?php $vat = $subTotal * 0.1;
                                        echo number_format($vat) . 'VNĐ '; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Grand Total :</th>
                                    <td><?php echo number_format($subTotal + $vat) . 'VNĐ' ?></td>
                                </tr>
                            </table>
                        <?php
                        } else {
                            echo 'Your cart is empty! Please shopping now';
                        }
                        ?>
                    </div>
                </div>

                <div class="box_right">
                    <table class="tblone">
                        <?php
                        $id = Session::get('customer_id');
                        $get_customer = $cs->show_customer($id);
                        if ($get_customer) {
                            while ($result = $get_customer->fetch_assoc()) {
                        ?>
                                <tr>
                                    <td>Name</td>
                                    <td>:</td>
                                    <td><?php echo $result['name'] ?></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td><?php echo $result['email'] ?></td>
                                </tr>
                                <tr>
                                    <td>Phone</td>
                                    <td>:</td>
                                    <td><?php echo $result['phone'] ?></td>
                                </tr>
                                <tr>
                                    <td>City</td>
                                    <td>:</td>
                                    <td><?php echo $result['city'] ?></td>
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <td>:</td>
                                    <td><?php echo $result['address'] ?></td>
                                </tr>
                                <tr>
                                    <td>Zipcode</td>
                                    <td>:</td>
                                    <td><?php echo $result['zipcode'] ?></td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <a href="editprofile.php">Update Profile</a>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </table>
                </div>

            </div>
        </div>
        <center>
            <!-- <input type="submit" name="order" class="submit_order" value="Order Now"> -->
            <a href="?orderID=order" class="submit_order">Order Now</a>
        </center>
    </div>

</form>
<?php
include 'inc/footer.php';
?>