<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Brand.php';  ?> // Include Brand Class 
 <?php
  if (!isset($_GET['brandid'])  || $_GET['brandid'] == NULL ) { // I get this id from brandlist.php page as brandedit.php?brandid 
     echo "<script>window.location = 'catlist.php';  </script>";
  }else {
    $id = $_GET['brandid']; // I get this brandid and take this on $id variable. 
 }
 ?>
<?php 
   $brand =  new Brand();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $brandName = $_POST['brandName'];
        
        $updateBrand = $brand->brandUpdate($brandName, $id); // Create Method in Brand.php class 
    }
 
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Update Category</h2>
               <div class="block copyblock"> 
              <?php 
                    if (isset($updateBrand)) { // showing the return message from Brand class 
                        echo $updateBrand;
                    }
              ?>
  
     <?php 
        $getBrand = $brand->getUpdateById($id);  // Create Method in Brand.php class for show data by id
        if ($getBrand) {
           while ($result = $getBrand->fetch_assoc()) {
           
     ?>
                 <form action=" " method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="brandName"  value="<?php echo $result['brandName']; ?>" class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php    }  }  ?>
 
 
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>