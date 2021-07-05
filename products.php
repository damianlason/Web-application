<?php include 'inc/header.php'; ?>

 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Produkty</h3>
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
						<a href="preview.php?proid=<?php echo $result['productId']; ?>">
                            <div class="product-details">
							<img class="product-image" src="admin/<?php echo $result['image']; ?>" alt="" class="productImage"/></a>
						<h2><?php echo $result['productName']; ?> </h2>
						<p><?php echo $fm->textShorten($result['body'], 60); ?></p>
						<p><span class="price"><?php echo $result['price']; ?> PLN</span></p>
						<div class="button"><span><a href="preview.php?proid=<?php echo $result['productId']; ?>" class="details">Szczegóły</a></span></div>
                    </div>
					</div>

			<?php  }
			}  ?> 
				</div>
				
			</div>
			<div class="content_bottom">
    		<div class="heading">
    		</div>
    		<div class="clear"></div>
    	</div>
			
			</div>
    </div>
 </div>
</div>

<?php include 'inc/footer.php'; ?>