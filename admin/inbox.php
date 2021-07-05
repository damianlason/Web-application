<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../classes/Cart.php');
?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Zamówienia</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Id klienta</th>
							<th>Id zamowienia</th>
							<th>Nazwa Produktu</th>
							<th>Ilość </th>
							<th>Cena </th>
						</tr>
					</thead>
					<tbody>
						<?php
						$ct= new Cart();
						$fm = new Format();
						$getOrder = $ct->getAllOrderProduct();
						if ($getOrder){
							while ($result = $getOrder->fetch_assoc()){

							
						
						?>



						<tr class="odd gradeX">
							<td><?php echo $result['cmrId'];?></td>
							<td><?php echo $result['id'];?></td>
							<td><?php echo $result['productName'];?></td>
							<td><?php echo $result['quantity'];?></td>
							<td><?php echo $result['price'];?></td>


							<!-- <td><a href="">Wykonane</a> -->
						</tr>
							<?php } } ?>
						
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
