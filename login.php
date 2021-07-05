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
				<input name="pass" placeholder="Password" type="password">
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
										<input type="text" name="nameAndSurname" TABINDEX="1" placeholder="Imię i Nazwisko" />
									</div>

									<div>
										<input type="text" name="city" TABINDEX="3" placeholder="Miasto" />
									</div>

									<div>
										<input type="text" name="zip" TABINDEX="5" placeholder="Kod pocztowy" />
									</div>
									<div>
										<input type="text" name="email" TABINDEX="7" placeholder="Email" />
									</div>
								</td>
								<td>
									<div>
										<input type="text" name="address" TABINDEX="2" placeholder="Adres" />
									</div>
									<div>
										<input type="text" name="country" TABINDEX="4" placeholder="Kraj" />
									</div>

									<div>
										<input type="text" name="phone" TABINDEX="6" placeholder="Telefon" />
									</div>

									<div>

										<input type="text" name="pass" TABINDEX="8" placeholder="Hasło" />

									</div>
								</td>
							</tr>
						</tbody>
					</table>
					<div class="search">
						<div><button class="grey" name="register">Utwórz konto</button></div>
					</div>
					<div class="clear"></div>
				</form>
		</div>


		<div class="clear"></div>
	</div>
</div>
</div>
<?php include 'inc/footer.php'; ?>