<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/Database.php');
include_once($filepath . '/../helpers/Format.php');


?>
 
<?php

class Cart
{
    private $db;
    private $fm;

    public    function __construct()
    {
        $this->db   = new Database();
        $this->fm   = new Format();
    }

    public function addToCart($quantity, $id)
    {
        $quantity = $this->fm->validation($quantity); // Validation for special Characters             
        $quantity =  mysqli_real_escape_string($this->db->link, $quantity); // Validation for mysqli  
        $productId =  mysqli_real_escape_string($this->db->link, $id);
        $sId = session_id();

        $squery = "SELECT * FROM tbl_product WHERE productId = '$productId'";
        $result = $this->db->select($squery)->fetch_assoc();
        $productName = $result['productName'];
        $price = $result['price'];
        $image = $result['image'];

        $chquery = $squery = "SELECT * FROM tbl_cart WHERE productId = '$productId' AND  sId='$sId'";
        $getPro = $this->db->select($chquery);
        if ($getPro) {
            $msg = "Product Already Added!";
            return $msg;
        } else {




            $query = "INSERT INTO tbl_cart(sId, productId, productName,price, quantity, image) 
            VALUES ('$sId','$productId','$productName','$price','$quantity','$image')";





            $inserted_row = $this->db->insert($query);
            if ($inserted_row) {
                header("Location:cart.php");
            } else {
                header("Location:404.php");
            }
        }
    }
    public function getCartProduct()
    {
        $sId = session_id();
        $query = "SELECT * FROM tbl_cart WHERE sId ='$sId' ";
        $result = $this->db->select($query);
        return $result;
    }
    public function updateCartQuantity($cartId, $quantity)
    {
        $cartId =  mysqli_real_escape_string($this->db->link, $cartId);
        $quantity = mysqli_real_escape_string($this->db->link, $quantity);

        $query = "UPDATE tbl_cart
            SET
            quantity = '$quantity' 
            WHERE cartId = '$cartId' ";
        $update_row =  $this->db->update($query);
        if ($update_row) {
            header("Location:cart.php");
        } else {
            $msg = "<span class= 'error'>quantity  not updated</span>";
            return $msg;
        }
    }
    public function delProductByCart($delId)
    {
        $delId =  mysqli_real_escape_string($this->db->link, $delId);
        $query = "DELETE FROM tbl_cart WHERE cartId ='$delId' ";
        $deldata = $this->db->delete($query);
        if ($deldata) {
            echo "<script>window.location = 'cart.php'; </script>";
        } else {
            $msg = "<span class='error'>Product Not Deleted .</span> ";
            return $msg; // return this Message 
        }
    }
    public function checkCartTable()
    {
        $sId = session_id();
        $query = "SELECT * FROM tbl_cart WHERE sId = '$sId'";
        $result = $this->db->select($query);
        return $result;
    }
    public function delCustomerCart()
    {
        $sId = session_id();
        $query = "DELETE FROM tbl_cart WHERE sId = '$sId'";
        $this->db->delete($query);
    }
    public function orderProduct($cmrId)
    {
        $sId = session_id();
        $query = "SELECT * FROM tbl_cart WHERE sId ='$sId' ";
        $getPro = $this->db->select($query);
        if ($getPro) {
            while ($result = $getPro->fetch_assoc()) {
                $productId     = $result['productId'];
                $productName   = $result['productName'];
                $quantity      = $result['quantity'];
                $price         = $result['price'];
                $image         = $result['image'];
                $date = $result['date'];

                $query = "INSERT INTO tbl_order(cmrId, productId, productName, quantity, price, image, date) 
                VALUES ('$cmrId','$productId','$productName','$quantity','$price','$image', Now())";

                $inserted_row = $this->db->insert($query);
            }
        }
        
    }
    public function getAllOrderProduct() {
    $query = " 
    SELECT *
    FROM tbl_order
    INNER JOIN tbl_customer
       ON tbl_order.cmrId = tbl_customer.id";
    
    $result = $this->db->select($query);
    return $result;
    }
    
    
}

?>