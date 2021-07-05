<?php include 'inc/header.php'; ?>

<?php
if (isset($_GET['delpro'])) {
	$delId = $_GET['delpro'];
	$delProduct = $ct->delProductByCart($delId);
}
?>


<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$cartId = $_POST['cartId'];
	$quantity = $_POST['quantity'];

	$updateCart = $ct->updateCartQuantity($cartId, $quantity); // Create Method in Brand.php class 
	if ($quantity <= 0) {
		$delProduct = $ct->delProductByCart($cartId);
	}
}

?>

<?php
if (!isset($_GET['id'])) {
    echo "<meta http-equiv='refresh' content='0;URL=?id=live'/> ";
}
?>
 



<div class="main">
	<div class="content">
		<div class="cartoption">
			<div class="cartpage">
				<h2>Koszyk</h2>
				<?php
				if (isset($updateCart)) {
					echo $updateCart;
				}
				if (isset($delProduct)) {
					echo $delProduct;
				}  ?>


				<table class="tblone">
					<tr>
						<th width="5%">Lp.</th>
						<th width="30%">Nazwa produktu</th>
						<th width="10%">Podgląd</th>
						<th width="15%">Cena</th>
						<th width="15%">Ilość</th>
						<th width="15%">Kwota</th>
						<th width="10%">Usuń</th>
					</tr>
					<?php
					$getPro = $ct->getCartProduct();  // Create this method in our Cart.php Class page. 
					if ($getPro) {
						$i = 0;
						$sum = 0;
						while ($result = $getPro->fetch_assoc()) {
							$i++;
					?>
							<tr>
								<td><?php echo $i;  ?></td>
								<td><?php echo $result['productName'];  ?></td>
								<td><img src="admin/<?php echo $result['image']; ?>" alt="" /></td>
								<td><?php echo $result['price'];  ?> PLN </td>
								<td>

									<form action="" method="post">
										<input type="hidden" name="cartId" value="<?php echo $result['cartId']; ?>" />
										<input type="number" name="quantity" value="<?php echo $result['quantity']; ?>" />
										<input type="submit" name="submit" value="Przelicz" />
									</form>
								</td>
								<td>
									<?php
									$total = $result['price'] * $result['quantity'];
									echo $total;
									?> PLN

								</td>
								<td><a onclick="return confirm('Czy na pewno chcesz usunąć <?php echo strtolower($result['productName']);  ?>?');" href="
								?delpro=<?php echo $result['cartId']; ?>">X</a></td>
							</tr>
							<?php
							$qty = $qty +  $result['quantity'];
							$sum = $sum + $total;
							Session::set("qty", $qty);
							Session::set("sum", $sum);
							?>

					<?php }
					}   ?>
				</table>
				<?php
				$getData = $ct->checkCartTable();
				if ($getData) {
				?>






					<table style="float:right;text-align:left;" width="40%">
						<tr>
							<th>Wartość zamówienia: </th>
								<td> <?php echo $sum;  ?> PLN</td>
						</tr>
						<tr>
							<!-- <th>VAT : </th>
							<td>
								23%
							</td> -->
						</tr>
						<tr>
							<!-- <th>Całość :</th>
							<td><?php
								$vat = $sum * 0.23;
								$gtotal = $sum + $vat;
								echo $gtotal;
								?> </td>  This will be only used if shop operates in a different country where VAT is not added to the actual price-->  
						</tr>
					</table>

				<?php } else {
					header("Location:index.php");
					//echo "cart empty";
				} ?>
			</div>
			<div class="shopping">
				<div class="shopleft">
					<a href="index.php"> <img style="float: right;" src="images/shop.png" alt="" /></a>
				</div>
				<div class="shopright">
					<a href="payment.php"> <img style="float: right;" src="images/check.png"  alt="" /></a>
				</div>
			</div>
		</div>
		<div class="clear"></div>
	</div>
</div>
</div>

<?php include 'inc/footer.php'; ?>