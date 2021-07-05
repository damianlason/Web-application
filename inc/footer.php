<div class="footer">
   	  <div class="wrapper">	
	     <div class="section group">
				 <div class="col_1_of_4 span_1_of_4">

                     <a href="index.php"><img src="images/logonobg.png" alt="" /></a>
                 </div>

				<div class="col_1_of_4 span_1_of_4">
					<h4>Nawigacja</h4>
						<ul>
                            <li><a href="index.php">Strona główna</a></li>
                            <li><a href="products.php">Produkty</a></li>
                            <li><a href="contact.php">Kontakt</a></li>
                            <?php
                            $chkCart = $ct->checkCartTable();
                            if ($chkCart) { ?>
                                <li><a href="cart.php">Koszyk</a></li>
                                <li><a href="payment.php">Płatność</a></li>
                            <?php } ?>
						</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Konto</h4>
						<ul>
                            <?php
                            $login = Session::get("cuslogin");
                            if($login == true){ ?>
                                <li><a href="profile.php">Profil</a></li>
                                <li><a href="?cid=">Wyloguj</a></li>
                            <?php
                            }
                            ?>


						</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Kontakt</h4>
						<ul>
							<li><span>support@myagdmyrtv</span></li>
							<li><span>www.myagdmyrtv.pl</span></li>
						</ul>
						 <div class="social-icons">
							<h4>Follow Us</h4>
					   		  <ul>
							      <li class="facebook"><a href="#" target="_blank"> </a></li>
							      <li class="twitter"><a href="#" target="_blank"> </a></li>
							      <li class="googleplus"><a href="#" target="_blank"> </a></li>
							      <li class="contact"><a href="#" target="_blank"> </a></li>
							      <div class="clear"></div>
						     </ul>
   	 					</div>
				</div>
			</div>
			<div class="copy_right">

                <p><span class="blue">MYAGDMYRTV</span> &amp; ALL RIGHTS RESERVED ® </p>

		   </div>
     </div>
    </div>
    <script type="text/javascript">
		$(document).ready(function() {

			var defaults = {
	  			containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear'
	 		};


			$().UItoTop({ easingType: 'easeOutQuart' });

		});
	</script>
    <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
    <link href="css/flexslider.css" rel='stylesheet' type='text/css' />
	  <script defer src="js/jquery.flexslider.js"></script>
	  <script type="text/javascript">

		$(window).load(function(){
		  $('.flexslider').flexslider({
			animation: "slide",
			start: function(slider){
			  $('body').removeClass('loading');
			}
		  });
		});
	  </script>
</body>
</html>
