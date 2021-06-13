<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classes/Brand.php' ?>

<?php 
$brand =  new Brand();


// Create Category Class object
if (isset($_GET['delbrand'])) {  // get his delete id from our link 
	$id = $_GET['delbrand']; // get this id and take it on $id variable 
	$delBrand = $brand->delBrandById($id); // we have to create this method in our Brand.php Class 

}  

?>


<div class="grid_10">
	<div class="box round first grid">
		<h2>Category List</h2>
		<div class="block">
		<?php
		if (isset($delBrand)) { 
			echo  $delBrand;


		}

		

		?>


			<table class="data display datatable" id="example">
				<thead>
					<tr>
						<th>Serial No.</th>
						<th>Brand  Name</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>

					<?php
					$getBrand = $brand->getAllBrand(); // with this category object i access this method getAllCat() 
					if ($getBrand) {  // if condition start from here 
						$i = 0;
						while ($result = $getBrand->fetch_assoc()) {  // while loop start from here.
							$i++;
					?>


							<tr class="odd gradeX">
								<td><?php echo $i; ?></td>
								<td><?php echo $result['brandName']; ?></td>
								<td><a href="brandedit.php?brandid=<?php echo $result['brandId']; ?>">Edytuj</a>
									|| <a onclick="return confirm('Czy na pewno chcesz usunąć')" href="?delbrand=<?php echo $result['brandId']; ?>">Usuń</a></td>
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