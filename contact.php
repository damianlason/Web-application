<?php include 'inc/header.php'; ?>

 <div class="main">
    <div class="content">
    	<div class="support">
  			<div class="support_desc">
  				<h3>Kontakt</h3>
  				<p>Aby się z nami skontaktować skorzystaj z poniższego formularza. Odpowiemy najszybciej jak to będzie możliwe!</p>
  			</div>
  				<img src="web/images/contact.png" alt="" />
  			<div class="clear"></div>
  		</div>
    	<div class="section group">
				<div class="col span_2_of_3">
				  <div class="contact-form">
				  	<h2>Formularz kontaktowy</h2>
					  <?php
  if (isset($_REQUEST['email']))  {
  //Email information
  $admin_email = "lasondamian9@gmail.com";
  $email = $_REQUEST['email'];
  $subject = $_REQUEST['subject'];
  $comment = $_REQUEST['comment'];
  //send email
  mail($admin_email, "$subject", $comment, "From:" . $email);
  //Email response
  echo "Wiadomość wysłana !!!";
  }
  //if "email" variable is not filled out, display the form
  else  {
?>
 <form method="post">
  Twój email: <input name="email" type="text" required/><br />
  Temat: <input name="subject" type="text" required/><br />
  Wiadomość:<br />
  <textarea name="comment" rows="15" cols="40"></textarea><br />
  <input type="submit" value="Wyślij" />
  </form>
<?php
  }
?>
				  </div>
  				</div>
				<div class="col span_1_of_3">
      			<div class="company_address">
				     	<h2>Informacje</h2>
						   		<p>Kraków, ul. Konwaliowa 12</p>
				   		<p>Tel:(48) 123 456 789</p>
				   		<p>Fax: (000) 000 00 00 0</p>
				 	 	<p>Email: <span>support@myagdmyrtv</span></p>
				   </div>
				 </div>
			  </div>    	
    </div>
 </div>
</div>
<?php include 'inc/footer.php'; ?>