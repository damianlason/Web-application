<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Product.php'; ?>
<?php include_once '../helpers/Format.php'; ?>



<?php
$pd = new Product(); // creating object for product class. This is to access method textShorten in Format.php 
$fm = new Format();



?>

<?php 
 if (isset($_GET['delpro'])) {
 $id = $_GET['delpro']; // get this delcat Id and take this on $id variable 
 $delpro = $pd->delProById($id);//With Category class object i access method with id  
 
}  
 
?>






<div class="grid_10">
    <div class="box round first grid">
        <h2>Product list</h2>
        <div class="block">  
		<?php
		if(isset($delpro)){
			echo $delpro;
		}

		

		?>
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>Lp</th>
					<th>Nazwa</th>
					<th>Kategoria</th>
					<th>Firma</th>
					<th>Opis</th>
					<th>Cena</th>
					<th>Zdjęcie</th>
					<th>Typ</th>
					<th></th>
				</tr>

			</thead>
			<tbody>
				<?php $getPd = $pd->getAllproduct(); // this will be created later on in Product class, at the moment it stays highlighted as red
				if ($getPd){
					$i = 0;
					while ($result = $getPd->fetch_assoc()){
						$i++;
				 
				?>
				<tr class="odd gradeX">
					<td><?php echo $i; ?> </td>
					<td><?php echo $result['productName'] ; ?></td>
					<td><?php echo $result['catName']; ?></td>
					<td><?php echo $result['brandName']; ?></td>
					<td><?php echo $fm->textShorten($result['body'], 30); ?></td>
					<td><?php echo $result['price']; ?></td>
					<td><img src="<?php echo $result['image']; ?>" height="40px" width="60px";></td> 
					<td><?php
					
					if($result['type'] == 0){
						echo "Featured";
					}else {
						echo "General";
					}
					
					?></td>
					<td><a href="productedit.php?proid=<?php echo $result['productId']; ?>">Edytuj</a>
									|| <a onclick="return confirm('Czy na pewno chcesz usunąć')" href="?delpro=<?php echo $result['productId']; ?>">Usuń</a></td>
							</tr>
				</tr>
				<?php } } ?> 
			
			</tbody>
		</table>

       </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
