<?php include 'inc/header.php'; ?>
<?php include 'inc/slider.php'; ?>




<div class="main">
	<div class="content">
		<div class="content_top">
			<div class="heading">
				<h3>Polecane</h3>
			</div>
			<div class="clear"></div>
		</div>
		<div class="section group">
			<?php
			$getFpd = $pd->getFeaturedProduct(); // With Product class object i create on method 
			if ($getFpd) {
				while ($result = $getFpd->fetch_assoc()) {
			?>

					<div class="grid_1_of_4 images_1_of_4">
                        <div class="product-card">
						    <a href="preview.php?proid=<?php echo $result['productId']; ?>">
						    	<img class="product-image" src="admin/<?php echo $result['image']; ?>" alt="" /></a>
						    <div class="product-details">
                                <h2 class="product-name"><?php echo $result['productName']; ?> </h2>
						        <p><?php echo $fm->textShorten($result['body'], 60); ?></p>
						        <p><span class="price"><?php echo $result['price']; ?> PLN</span></p>
						        <div class="button"><span><a href="preview.php?proid=<?php echo $result['productId']; ?>" >Szczegóły</a></span></div>
                            </div>
                        </div>
					</div>

			<?php  }
			}  ?> 
		</div>
		<div class="content_bottom">
			<div class="heading">
				<h3>Nowe produkty</h3>
			</div>
			<div class="clear"></div>
		</div>
		<div class="section group">

		<?php
			$getNpd = $pd->getNewProduct(); // With Product class object i create on method 
			if ($getNpd) {
				while ($result = $getNpd->fetch_assoc()) {
			?>

                    <div class="grid_1_of_4 images_1_of_4">
                        <div class="product-card">
                            <a href="preview.php?proid=<?php echo $result['productId']; ?>">
                                <img class="product-image" src="admin/<?php echo $result['image']; ?>" alt="" /></a>
                            <div class="product-details">
                                <h2><?php echo $result['productName']; ?> </h2>
                                <p><?php echo $fm->textShorten($result['body'], 60); ?></p>
                                <p><span class="price"><?php echo $result['price']; ?> PLN</span></p>
                                <div class="button"><span><a href="preview.php?proid=<?php echo $result['productId']; ?>">Szczegóły</a></span></div>
                            </div>
                        </div>
                    </div>
                <?php  }  }  ?>
        </div>
	</div>
</div>
</div>

<?php include 'inc/footer.php'; ?>