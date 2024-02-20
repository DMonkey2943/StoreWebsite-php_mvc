<?php
include 'inc/header.php';
?>

<?php
$login_check = Session::get('customer_login');
if ($login_check == false) {
    header('Location: login.php');
}
?>


<style>
    .wrapper_method {
        text-align: center;
        width: 550px;
        margin: 15px auto;
        border: 1px solid #666;
        padding: 20px;
        background: cornsilk;
    }

    .payment {
        padding-bottom: 12px;
        text-align: center;
        font-size: 18px;
        font-weight: bold;
        text-decoration: underline;
    }

    /* .wrapper_method p {
        text-align: center;
        padding: 10px;
        border: 1px solid #666;
        margin: 10px;
    } */

    .payment_link {
        display: block;
        padding: 10px;
        border: 1px solid #666;
        margin: 16px;
        color: black;
    }
    .payment_link:hover {
        opacity: 0.8;
    }

    .previous {
        border: 1px solid grey;
        padding: 8px 16px;
        margin-top: 20px;
        background: grey;
        color: white;
    }
</style>

<div class="main">
    <div class="content">
        <div class="section group">
            <div class="content_top">
                <div class="heading">
                    <h3>Payment Method</h3>
                </div>
                <div class="clear"></div>
            </div>

            <div class="wrapper_method">
                <h3 class="payment">Choose your method payment</h3>
                <a class="payment_link" href="offlinepayment.php">Offline Payment</a>
                <a class="payment_link" href="onlinepayment.php">Online Payment</a>
                <a class="previous" href="cart.php">Previous</a>
            </div>

        </div>
    </div>

    <?php
    include 'inc/footer.php';
    ?>