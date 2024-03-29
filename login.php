<?php
include 'inc/header.php';
// include 'inc/slider.php';
?>

<?php
$login_check = Session::get('customer_login');
if ($login_check) { //Ng dung da dang nhap
	header('Location: order.php');
}
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
	$insertCustomer = $cs->insert_customer($_POST);
}
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
	$loginCustomer = $cs->login_customer($_POST);
}
?>

<div class="main">
	<div class="content">
		<div class="login_panel">
			<h3>Existing Customers</h3>
			<p>Sign in with the form below.</p>
			<?php
			if (isset($loginCustomer)) {
				echo $loginCustomer;
			}
			?>
			<form action="" method="POST">
				<input type="text" name="email" class="field" placeholder="Email">
				<input type="password" name="password" class="field" placeholder="Password">
				<p class="note">If you forgot your passoword just enter your email and click <a href="#">here</a></p>
				<div class="buttons">
					<div><input type="submit" name="login" class="grey" value="Sign In"></div>
				</div>
			</form>
		</div>

		<?php

		?>
		<div class="register_account">
			<h3>Register New Account</h3>
			<?php
			if (isset($insertCustomer)) {
				echo $insertCustomer;
			}
			?>
			<form action="" method="POST">
				<table>
					<tbody>
						<tr>
							<td>
								<div>
									<input type="text" name="name" placeholder="Name">
								</div>

								<div>
									<input type="text" name="city" placeholder="City">
								</div>

								<div>
									<input type="text" name="zipcode" placeholder="Zip-Code">
								</div>
								<div>
									<input type="text" name="email" placeholder="E-Mail">
								</div>
							</td>
							<td>
								<div>
									<input type="text" name="address" placeholder="Address">
									<!-- <input type="text" value="Address" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Address';}"> -->
								</div>
								<div>
									<select id="country" name="country" onchange="change_country(this.value)" class="frm-field required">
										<option value="null">Select a Country</option>

										<option value="hcm">TP. Ho Chi Minh</option>
										<option value="hn">Ha Noi</option>
										<option value="ct">Can Tho</option>
										<option value="ag">An Giang</option>
										<option value="nt">Nha Trang</option>
										<option value="na">Nghe An</option>
										<option value="hg">Hau Giang</option>
										<!-- <option value="AT">Austria</option>
										<option value="AZ">Azerbaijan</option>
										<option value="BS">Bahamas</option>
										<option value="BH">Bahrain</option>
										<option value="BD">Bangladesh</option> -->

									</select>
								</div>

								<div>
									<input type="text" name="phone" placeholder="Phone">
								</div>

								<div>
									<input type="text" name="password" placeholder="Password">
								</div>
							</td>
						</tr>
					</tbody>
				</table>
				<div class="search">
					<div><input type="submit" name="submit" class="grey" value="Create Account"></div>
				</div>
				<p class="terms">By clicking 'Create Account' you agree to the <a href="#">Terms &amp; Conditions</a>.</p>
				<div class="clear"></div>
			</form>
		</div>
		<div class="clear"></div>
	</div>
</div>


<?php
include 'inc/footer.php';
?>