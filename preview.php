<?php include 'inc/header.php'; ?>
<?php
if (!isset($_GET['proid'])  || $_GET['proid'] == NULL) { // I get this id from brandlist.php page as brandedit.php?brandid 
	echo "<script>window.location = '404.php';  </script>";
} else {
	$id = $_GET['proid']; // I get this brandid and take this on $id variable. 
}
?>
<?php
 $brand =  new Brand();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $quantity = $_POST['quantity'];
        
		$addCart = $ct->addToCart($quantity, $id); // Create Method in Brand.php class 
		
    } 

?>
<div class="main">
<div class="content">
    	<div class="section group">
	 <div class="cont-desc span_1_of_2">	
     <?php 
 	 $getPd = $pd->getSingleProduct($id); 
              if ($getPd) {
        while ($result = $getPd->fetch_assoc()) { 
	 ?> 
 
  <div class="grid images_3_of_2">
	 <img src="admin/<?php echo $result['image']; ?>" alt="" /> 
	 </div>
	 <div class="desc span_3_of_2">
	 <h2><?php echo $result['productName'];?> </h2> 
	 <p><?php echo $fm->textShorten($result['body'], 200);?></p>	 
	 <div class="price">
	 <p>Cena: <span><?php echo $result['price'];?> PLN</span></p> 
	 <p>Kategoria: <span><?php echo $result['catName'];?></span></p> 
	 <p>Producent:<span><?php echo $result['brandName'];?></span></p> 
	   </div>
	 <div class="add-cart">
	 <form action="" method="post">
	 <input type="number" class="buyfield" name="quantity" value="1"/>
	 <input type="submit" class="buysubmit" name="submit" value="Dodaj do koszyka"/>
		 </form>				
				</div>
			<span style= "color: red; font-size: 18px;">
		

         <?php 
		 
		 if(isset($addCart)){
			 echo $addCart;
		 }
		 
		 ?>
		 </span>
			</div>
			<div class="product-desc">
			<h2>Szczegóły</h2>
			<?php echo $result['body'];?>  
	    </div>
		<?php } } ?>  		
	</div>
			<div class="rightsidebar span_3_of_1">
				<h2>Kategorie</h2>
				<ul>
				 <?php 
				 $getCat = $cat->getAllCat();
				 if($getCat){
					 while ($result = $getCat->fetch_assoc()){

					 
				 
				 
				 ?>

<li><a href="productbycat.php?catId=<?php echo $result['catId']; ?>"><?php echo $result['catName']; ?></a></li>
					 <?php }} ?>
					
				</ul>

			</div>
		</div>
	</div>
</div>
<?php include 'inc/footer.php'; ?>