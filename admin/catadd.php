﻿<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Category.php'  ?>

<?php
   $cat = new Category();
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$catName = $_POST['catName'];

		$insertCat = $cat->catInsert($catName);
	}

?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Dodaj nową kategorię</h2>
               <div class="block copyblock"> 
        <?php
            if (isset($insertCat)){
                echo $insertCat;
            }
            ?>

                 <form action= " " method="post">
                    <table class="form">					
                        <tr>
                            <td>  
                              <input type="text" name="catName" placeholder="Wprowadź nazwę kategorii..." class="medium" /> 
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Dodaj" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>


