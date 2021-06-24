<?php include 'inc/header.php'; ?>

<?php
$login = Session::get("cuslogin");
if ($login == false){
	header("Location:login.php");
}
?>

<style>
.tblone{width: 550px; margin: 0 auto; border: 2px solid #ddd; }
.tblone tr td{text-align: justify;}


</style>

 <div class="main">
    <div class="content">    	
     <div class="section group">

    <?php
    $id = Session::get('cmrId');
    $getdata  =  $cmr->getCustomerData($id);
    if($getdata){
        while($result = $getdata->fetch_assoc()){
    
    ?>



    <table class = "tblone">
    <tr>
        <td colspan="3"> <h2> Informacje o profilu</h2> </td>
        
    </tr>

    <tr>
        <td width = "20%"> Klient </td>
        <td width = "5%"> : </td>
        <td>  <?php echo $result['nameAndSurname']; ?> </td>
    </tr>
    <tr>
        <td> Telefon </td>
        <td>  : </td>
        <td>  <?php echo $result['phone']; ?>  </td>
    </tr>
    <tr>
        <td> Email </td>
        <td>  : </td>
        <td>  <?php echo $result['email']; ?>  </td>
    </tr>
    <tr>
        <td> Adres </td>
        <td>  : </td>
        <td>  <?php echo $result['address']; ?>  </td>
    </tr>
    <tr>
        <td> Miasto </td>
        <td>  : </td>
        <td>  <?php echo $result['city']; ?>  </td>
    </tr>
    <tr>
        <td> Kod pocztowy </td>
        <td>  : </td>
        <td>  <?php echo $result['zip']; ?>  </td>
    </tr>
    <tr>
        <td> Kraj </td>
        <td>  : </td>
        <td>  <?php echo $result['country']; ?>  </td>
    </tr>
    <tr>
        <td>  </td>
        <td>   </td>
        <td> <a href="editprofile.php"> Aktualizuj Profil </a> </td>
    </tr>

    </table>

        <?php } }?>


      </div>
       <div class="clear"></div>
    </div>
 </div>
</div>   
    <?php include 'inc/footer.php'; ?>
