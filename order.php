<?php include 'inc/header.php'; ?>
 
 <?php 
  $login =  Session::get("cuslogin");
  if ($login == false) {
  	header("Location:login.php");
  }
  ?>

   <?php
   if (isset($_GET['orderid']) && $_GET['orderid'] == 'order' ) {
   $cmrId =  Session::get("cmrId");
   $insertOrder = $ct->orderProduct($cmrId); // create this method in our Cart.php Class page 
   $delData = $ct->delCustomerCart();
   header("Location:index.php");
   }
 ?>
 
  
<style>
 .division{width: 50%;float: left;}
.tblone{width: 500px; margin: 0 auto; border: 2px solid #ddd; font-size: 13px;} 
 .tblone tr td{text-align: justify;} 
 
 .tbltwo{float:right;text-align:left; width: 50%;border: 2px solid #ddd;margin-right: 14px;margin-top: 12px;}
 .tbltwo tr td{text-align: justify; padding: 5px 10px;} 
 .ordernow{}
 .ordernow a{width:150px;margin: 5px auto 0;padding: 7px 0; text-align: center;display: block;background: #555;border: 1px solid #333;color: #fff;border-radius: 3px;font-size: 25px; margin-bottom: 40px;}
 
</style>
 
 <div class="main">
    <div class="content">
      <div class="section group">
       <div class="division">  
 
<table class="tblone">
              <tr>
                <td>numer</td>
                <td>Produkt</td>
                 
                <td>Cena</td>
                <td>Ilość</td>
                <td>Suma</td>
               </tr>
                                <?php
          $getPro = $ct->getCartProduct();
          if ($getPro) {
            $i = 0;
            $sum = 0;
            $qty = 0;
            while ($result = $getPro->fetch_assoc()) {
               $i++;
                     ?>
                <tr>
                <td><?php echo $i;  ?></td>
                <td><?php echo $result['productName'];  ?></td>
                
                <td> <?php echo $result['price'];  ?> PLN</td>
                 <td> <?php echo $result['quantity'];  ?></td>
                <td>
                  
                </td>
                <td> 
                  <?php 
                  $total = $result['price'] * $result['quantity'];
                  echo $total;
                   ?> PLN     
                 </td>
               
              </tr>
              <?php 
                  $qty = $qty +  $result['quantity'];
                $sum = $sum + $total;
                  ?>
                <?php } }   ?>
             </table>
 
             <table class="tbltwo">
              <tr>
                <th>Całość: </th>
                <td> <?php echo $sum;  ?> PLN</td>
              </tr>
              
              
 
                 <tr>
                <th>Ilość :</th>
                <td> <?php echo $qty; ?></td>
              </tr>
             </table>
       </div>
        <div class="division">  
 <?php 
   $id = Session::get('cmrId');
   $getdata = $cmr->getCustomerData($id);
   if ($getdata) {
     while ($result = $getdata->fetch_assoc()) {
   ?>
     <table class="tblone">
        <tr>
           <td colspan="3"> <h2>  Twoje dane </h2> </td>
           
      </tr>
       <tr>
          <td width="20%"> Imię  </td>
          <td width="5%"> : </td>
          <td> <?php echo $result['nameAndSurname']; ?>  </td>
      </tr>
        <tr>
          <td> Telefon  </td>
          <td> : </td>
          <td> <?php echo $result['phone']; ?> </td>
      </tr>
 
        <tr>
          <td> Email  </td>
          <td> : </td>
          <td> <?php echo $result['email']; ?>  </td>
      </tr>
        <tr>
          <td> Adres  </td>
          <td> : </td>
          <td> <?php echo $result['address']; ?>  </td>
      </tr>
        <tr>
          <td> Miasto  </td>
          <td> : </td>
          <td><?php echo $result['city']; ?>  </td>
      </tr>
        <tr>
          <td> Kod Pocztowy  </td>
          <td> : </td>
          <td> <?php echo $result['zip']; ?>  </td>
      </tr>
        <tr>
          <td> Państwo  </td>
          <td> : </td>
          <td> <?php echo $result['country']; ?>  </td>
      </tr>
  
      </table>
   <?php   } }  ?>  
       </div>
 
     </div>
 </div>
   <div class="ordernow"> <input type="button" class="ordernoww" href="?orderid=order"> Zamów </a></div>
 
</div>
   
    <?php include 'inc/footer.php'; ?>