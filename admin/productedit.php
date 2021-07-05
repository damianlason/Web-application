<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Product.php';  ?>// include our Product Class 
<?php include '../classes/Category.php';  ?>// include our Category Class 
<?php include '../classes/Brand.php';  ?>  // include our Brand Class 
 
<?php 
 if (!isset($_GET['proid'])  || $_GET['proid'] == NULL ) {
     echo "<script>window.location = 'productedit.php';  </script>";
  }else {
    $id = $_GET['proid']; // get this id from productlist.php page and take this with one variable as $id 
 
  }
 
   $pd =  new Product(); // Create object for Product Class 
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']) ) {
       $updateProduct = $pd->productUpdate($_POST, $_FILES, $id); // This method is for update data 
    }
 
?> 
 
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Product</h2>
        <div class="block">  
 
<?php 
if (isset($updateProduct)) {  // Show update data message 
   echo $updateProduct;
}
 
?>
 
   <?php 
     $getProd = $pd->getProById($id);  // in our product class I created one method with id 
     if ($getProd) {
        while ($value = $getProd->fetch_assoc()) {
            # code...
          ?>
 
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Nazwa</label>
                    </td>
                    <td>
  <input type="text" name="productName" value="<?php echo $value['productName']; ?>" class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Kategoria</label>
                    </td>
                    <td>
                        <select id="select" name="catId">
                            <option>Wybierz kategorię</option>
                 <?php
                    $cat = new Category();
                    $getCat =  $cat->getAllCat();
                    if ($getCat) {
                       while ($result = $getCat->fetch_assoc()) {
                           
                      
                 ?>
                       <option 
                      
                       <?php 
 
                           if ($value['catId'] == $result['catId']) { ?>
                              selected = "selected"
             <?php }  ?> value="<?php echo $result['catId'];  ?>"><?php echo $result['catName']; ?></option>
 
                       <?php   }  } ?>
                            
                        </select>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Marka</label>
                    </td>
                    <td>
                        <select id="select" name="brandId">
                            <option>Wybierz markę</option>
 
 <?php
                    $brand = new Brand();
                    $getBrand =  $brand->getAllBrand();
                    if ($getBrand) {
                     while ($result = $getBrand->fetch_assoc()) {
                    
                 ?>
                       <option 
                    <?php 
 
                           if ($value['brandId'] == $result['brandId']) { ?>
                              selected = "selected"
                          <?php }  ?> value="<?php echo $result['brandId'];  ?>"><?php echo $result['brandName']; ?></option>
                             <?php   }  } ?>
                        </select>
                    </td>
                </tr>
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Opis</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name="body">
                           <?php echo  $value['body']; ?>
 
                        </textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Cena</label>
                    </td>
                    <td>
                        <input type="text" name="price" value="<?php echo  $value['price']; ?>" class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Obrazek</label>
                    </td>
                    <td>
                        <img src="<?php echo $value['image'];?>" height="60px; width="80px;"><br/>
                        <input type="file" name="image" />
                    </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Typ produktu</label>
                    </td>
                    <td>
                        <select id="select" name="type">
                            <option>Wybierz typ produktu</option>
                          <?php
                        if ($value['type'] == 0) { ?>
                           <option selected = "selected" value="0">Polecany</option>
                            <option value="1">Główny</option>
                       <?php } else {  ?>
 
                            <option value="0">Polecany</option>
                            <option selected = "selected" value="1">Główny</option>
                        <?php }  ?>
                        </select>
                    </td>
                </tr>
 
				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Zapisz" />
                    </td>
                </tr>
            </table>
            </form>
 
      <?php  } } ?>
 
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>