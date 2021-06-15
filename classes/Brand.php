<?php


include_once '../lib/Database.php';
include_once '../helpers/Format.php';

?>
<?php
class Brand
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function brandInsert($brandName)
    {
        $brandName = $this->fm->validation($brandName); // Validation for special Characters             
        $brandName =  mysqli_real_escape_string($this->db->link, $brandName); // Validation for mysqli   
        if (empty($brandName)) {
            $msg = "<span class= 'error'>Brand field must not be empty !</span>"; // validation for empty 
            return $msg;
        } else {
            $query = "INSERT INTO tbl_brand(brandName) VALUES ('$brandName') ";
            $brandinsert = $this->db->insert($query);
            if ($brandinsert) {
                $msg = "<span class= 'success'>Brand Inserted Successfully.</span>";
                return $msg;
            } else {
                $msg = "<span class= 'error'>Brand  not Inserted Successfully.</span>";
                return $msg;
            }
            // else its will insert data in to the database with insert query.
        }
    }
    public function getAllBrand()
    {
        $query = "SELECT * FROM tbl_brand ORDER BY brandId DESC";
        $result =  $this->db->select($query);
        return $result;
    }

    public function getUpdateById($id)
    {
        $query = "SELECT * FROM tbl_brand WHERE brandId ='$id' ";
        $result = $this->db->select($query);
        return $result;
    }
    public function brandUpdate($brandName, $id)
    {
        $brandName = $this->fm->validation($brandName); // Validation for special Characters             
        $brandName =  mysqli_real_escape_string($this->db->link, $brandName); // Validation for mysqli   
        $id =  mysqli_real_escape_string($this->db->link, $id); // Validation for mysqli   
        if (empty($brandName)) {
            $msg = "<span class= 'error'>Brand field must not be empty</span>";
            return $msg;
        } else {
            $query = "UPDATE tbl_brand
            SET
            brandName = '$brandName' 
            WHERE brandId = '$id' ";
            $update_row =  $this->db->update($query);
            if ($update_row) {
                $msg = "<span class= 'success'>Brand has been updated</span>";
                return $msg;
            } else {
                $msg = "<span class= 'error'>Brand not updated</span>";
                return $msg;
            }
        }
    }
    public function delBrandById($id){
        $query = "DELETE FROM tbl_brand WHERE brandId ='$id' ";
        $branddeldata = $this->db->delete($query);
        if ($branddeldata) {
            $msg = "<span class='success'>Brand Deleted Successfully.</span> ";
        return $msg; // return this message 
        }else {
            $msg = "<span class='error'>Brand Not Deleted .</span> ";
               return $msg; // return this message 
            }
    }
}


?>