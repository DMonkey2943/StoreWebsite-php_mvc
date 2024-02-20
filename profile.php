<?php
include 'inc/header.php';
?>

<?php
$login_check = Session::get('customer_login');
if ($login_check == false) {
    header('Location: login.php');
}
?>


<?php
// if (isset($_GET['proID']) && $_GET['proID'] != NULL) {
//     $id = $_GET['proID'];
// } else {
//     echo "<script>window.location ='404.php'</script>";
// }

// if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
//     $quantity = $_POST['quantity'];
// 	$addToCart = $cart->add_to_cart($quantity, $id);
// }
?>

<div class="main">
    <div class="content">
        <div class="section group">
            <div class="content_top">
                <div class="heading">
                    <h3>Profile Customer</h3>
                </div>
                <div class="clear"></div>
            </div>

            <table class="tblone">
                <?php
                $id = Session::get('customer_id');
                $get_customer = $cs->show_customer($id);
                if($get_customer) {
                    while($result = $get_customer->fetch_assoc()) {
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
                <!-- <tr>
                    <td>Country</td>
                    <td>:</td>
                    <td><?php echo $result['country'] ?></td>
                </tr> -->
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
                <?php
                    }
                }
                ?>
            </table>

        </div>
    </div>

    <?php
    include 'inc/footer.php';
    ?>