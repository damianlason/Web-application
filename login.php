<?php include 'inc/header.php'; ?>

<?php
$login = Session::get("cuslogin");
if ($login == true){
	header("Location:order.php");
}
?>


<?php
		if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {

			$customLogin = $cmr->customerLogin($_POST);
		}

?>


<div class="main">
	<div class="content">
		<div class="login_panel">
		<?php
		if (isset($customLogin)) {
			echo $customLogin;
		}
		?>
			<h3>Dla zarejestrowanych klientów</h3>
			<p>Zaloguj</p>
			
			

			<form action=" " method="post">
				<input name="email" placeholder="Email" type="text">
				<input name="pass" placeholder="Password" type="pasword">
				<div class="buttons"><div><button class="grey" name="login">Zaloguj</button></div>
			</div>
			</form>
			
		</div>

		<?php
		if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {

			$customerReg = $cmr->customerRegistration($_POST);
		}

		?>
		<?php
		if (isset($customerReg)) {
			echo $customerReg;
		}
		?>




		<div class="register_account">
			<h3>Rejestracja</h3>
			<form action=" " method="post">
				<form>
					<table>
						<tbody>
							<tr>
								<td>
									<div>
										<input type="text" name="nameAndSurname" placeholder="Imię i Nazwisko" />
									</div>

									<div>
										<input type="text" name="city" placeholder="Miasto" />
									</div>

									<div>
										<input type="text" name="zip" placeholder="Kod pocztowy" />
									</div>
									<div>
										<input type="text" name="email" placeholder="Email" />
									</div>
								</td>
								<td>
									<div>
										<input type="text" name="address" placeholder="Adres" />
									</div>
									<div>
										<input type="text" name="country" placeholder="Kraj" />
									</div>

									<div>
										<input type="text" name="phone" placeholder="Telefon" />
									</div>

									<div>
										<input type="text" name="pass" placeholder="hasło" />
									</div>
								</td>
							</tr>
						</tbody>
					</table>
					<div class="search">
						<div><button class="grey" name="register">Utwórz konto</button></div>
					</div>
					<p class="terms">Klikając "Utwórz konto" zgadzasz się na przetwarzanie danych <a href="#">Terms &amp; Conditions</a>.</p>
					<div class="clear"></div>
				</form>
		</div>
		<div class="clear"></div>
	</div>
</div>
</div>
<?php include 'inc/footer.php'; ?>