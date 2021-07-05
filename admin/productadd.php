<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classes/Category.php'; ?>
<?php include '../classes/Product.php'; ?>
<?php include '../classes/Brand.php';  ?>

<?php
$pd = new Product();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

    $insertProduct = $pd->productInsert($_POST, $_FILES); //passing $_POST  $FILES is for the images
}

?>






<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Product</h2>
        <div class="block">
            <?php //return  message   in our product add page 
            if (isset($insertProduct)) {
                echo $insertProduct;
            }
            ?>

            <form action="" method="post" enctype="multipart/form-data">
                <table class="form">

                    <tr>
                        <td>
                            <label>Nazwa</label>
                        </td>
                        <td>
                            <input type="text" name="productName" placeholder="Wpisz nazwę produktu..." class="medium" />
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
                                $cat = new Category(); //creating object for this class
                                $getCat = $cat->getAllCat();  //get category and access method getAllCat to read data
                                if ($getCat) {
                                    while ($result = $getCat->fetch_assoc()) {




                                ?>

                                        <option value=" <?php echo $result['catId']; ?>"> <?php echo $result['catName'];   ?></option>
                                <?php }  //this will display Categories and names
                                } ?>
                               
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
                                $brand = new Brand(); // what happenes here is analogically same as in line 29

                                $getBrand = $brand->getAllBrand();  //
                                if ($getBrand) {
                                    while ($result = $getBrand->fetch_assoc()) {




                                ?>

                                        <option value="<?php echo $result['brandId']   ?>"><?php echo $result['brandName'];  ?></option>
                                <?php }
                                } ?>
                                
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td style="vertical-align: top; padding-top: 9px;">
                            <label>Opis</label>
                        </td>
                        <td>
                            <textarea class="tinymce" name="body"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Cena</label>
                        </td>
                        <td>
                            <input type="text" name="price" placeholder="Wpisz cenę..." class="medium" />
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>Obrazek</label>
                        </td>
                        <td>
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
                                <option value="0">Polecany</option>
                                <option value="1">Główny</option>
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
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php'; ?>