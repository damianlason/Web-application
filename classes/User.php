<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/Database.php');
include_once($filepath . '/../helpers/Format.php');
?>
<?php

class User
{
    private $db;
    private $fm;

    public    function __construct()
    {
        $this->db   = new Database();
        $this->fm   = new Format();
    }
    public function customerRegistration($data)
    {
        $nameAndSurname        =  mysqli_real_escape_string($this->db->link, $data['nameAndSurname']);
        $address     =  mysqli_real_escape_string($this->db->link, $data['address']);
        $city        =  mysqli_real_escape_string($this->db->link, $data['city']);
        $country     =  mysqli_real_escape_string($this->db->link, $data['country']);
        $zip         =  mysqli_real_escape_string($this->db->link, $data['zip']);
        $phone       =  mysqli_real_escape_string($this->db->link, $data['phone']);
        $email       =  mysqli_real_escape_string($this->db->link, $data['email']);
        $pass        =  mysqli_real_escape_string($this->db->link, md5($data['pass']));
        if ($nameAndSurname == "" || $address == "" || $city == "" || $country == "" || $zip == "" || $phone == ""  || $email == ""  || $pass == "") {
            $msg = "<span class='error'>Pole nie może być puste .</span> ";
            return $msg; // return message 
        }
        $mailquery = "SELECT * FROM tbl_customer WHERE email='$email' LIMIT 1";
        $mailchk = $this->db->select($mailquery);
        if ($mailchk != false) {
            $msg = "<span class='error'>Email już zarejestrowany</span> ";
            return $msg; // return message 
        } else {
            $query = "INSERT INTO tbl_customer(nameAndSurname, address, city, country, zip, phone, email, pass) 
            VALUES ('$nameAndSurname','$address','$city','$country','$zip','$phone','$email','$pass')";

            $inserted_row = $this->db->insert($query);
            if ($inserted_row) {
                $msg = "<span class='success'>Użytkownik zarejestrowany poprawnie</span> ";
                return $msg; // Return message
            } else {
                $msg = "<span class='error'>Błąd w dodaniu użytkownika .</span> ";
                return $msg; // Return message 
            }
        }
    }

    public function customerLogin($data)
    {
        $email       =  mysqli_real_escape_string($this->db->link, $data['email']);
        $pass        =  mysqli_real_escape_string($this->db->link, md5($data['pass']));
        if ($email == ""  || $pass == "") {
            $msg = "<span class='error'>Field Must Not be empty .</span> ";
            return $msg; // return message 
        }

        $query = "SELECT * FROM tbl_customer WHERE email='$email' AND pass='$pass' ";
        $result = $this->db->select($query);
        if ($result != false) {
            $value = $result->fetch_assoc();
            Session::set("cuslogin", true);
            Session::set("cmrId", $value['id']);
            Session::set("cmrName", $value['nameAndSurname']);
            header("Location:cart.php"); // redirect to order.php page after login 
        } else {
            $msg = "<span class='error'>Email Or Password Not Matched</span> ";
            return $msg; // return message 
        }
    }

    public function getCustomerData($id)
    {
        $query = "SELECT * FROM tbl_customer WHERE Id = '$id' ";
        $result = $this->db->select($query);
        return $result;
    }
    public function getCustomerName($nameAndSurname)
    {
        $query = "SELECT * FROM tbl_customer WHERE nameAndSurname = '$nameAndSurname' ";
        $result = $this->db->select($query);
        return $result;
    }

    public function customerUpdate($data, $cmrId) {
        $nameAndSurname   	 =  mysqli_real_escape_string($this->db->link, $data['nameAndSurname'] );
         $address     =  mysqli_real_escape_string($this->db->link, $data['address'] );
         $city   	 =  mysqli_real_escape_string($this->db->link, $data['city'] );
         $country     =  mysqli_real_escape_string($this->db->link, $data['country'] );
         $zip    	 =  mysqli_real_escape_string($this->db->link, $data['zip'] );
         $phone       =  mysqli_real_escape_string($this->db->link, $data['phone'] );
         $email       =  mysqli_real_escape_string($this->db->link, $data['email'] );
          
      if ($nameAndSurname == "" || $address == "" || $city == "" || $country == "" || $zip == "" || $phone == ""  || $email == "" ) {
             $msg = "<span class='error'>Field Must Not be empty .</span> ";
                    return $msg;
         } else { 
             $query = "UPDATE tbl_customer
                SET
                nameAndSurname 		= '$nameAndSurname',
                address 	= '$address',
                city 		= '$city',
                country 	= '$country',
                zip 		= '$zip',
                phone		= '$phone',
                email 		= '$email'
                WHERE id    = '$cmrId' "; 
                $update_row  = $this->db->update($query);
                if ($update_row) {
                    $msg = "<span class='success'>Customer Data Updated Successfully.</span> ";
                    return $msg;// return some message
                }else {
                    $msg = "<span class='error'>Customer Data Not Updated .</span> ";
                    return $msg; // return some message 
                }
          }
     }
}
?>