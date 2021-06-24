<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classes/Category.php' ?>

<?php 
$cat =  new Category();  // Create Category Class object
 if (isset($_GET['delcat'])) {
 $id = $_GET['delcat']; // get this delcat Id and take this on $id variable 
 $delCat = $cat->delCatById($id);//With Category class object i access method with id  
 
}  
 
?>


<div class="grid_10">
	<div class="box round first grid">
		<h2>Lista kategorii</h2>
		<div class="block">
		<?php
		if(isset($delCat)){
			echo $delCat;
		}

		

		?>


			<table class="data display datatable" id="example">
				<thead>
					<tr>
						<th>Numer</th>
						<th>Nazwa kategorii</th>
						<th>Opcje</th>
					</tr>
				</thead>
				<tbody>

					<?php
					$getCat = $cat->getAllCat(); // with this category object i access this method getAllCat() 
					if ($getCat) {  // if condition start from here 
						$i = 0;
						while ($result = $getCat->fetch_assoc()) {  // while loop start from here.
							$i++;
					?>


							<tr class="odd gradeX">
								<td><?php echo $i; ?></td>
								<td><?php echo $result['catName']; ?></td>
								<td><a href="catedit.php?catid=<?php echo $result['catId']; ?>">Edytuj</a>
									|| <a onclick="return confirm('Czy na pewno chcesz usunąć')" href="?delcat=<?php echo $result['catId']; ?>">Usuń</a></td>
							</tr>

					<?php 	}
					}  ?>



					
				</tbody>
			</table>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		setupLeftMenu();

		$('.datatable').dataTable();
		setSidebarHeight();
	});
</script>
<?php include 'inc/footer.php'; ?>