<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');


?>
<?php



class Category
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function catInsert($catName)
    {
        
        if (empty($catName)) {
            $msg = "<span class= 'error'>Category field cannot be !</span>"; // validation for empty 
            return $msg;
        } else {
            $query = "INSERT INTO tbl_category(catName) VALUES ('$catName') ";
            $catinsert = $this->db->insert($query);
            if ($catinsert) {
                $msg = "<span class= 'success'>Category Inserted Successfully.</span>";
                return $msg;
            } else {
                $msg = "<span class= 'error'>Category  not Inserted Successfully.</span>";
                return $msg;
            }
            // else its will insert data in to the database with insert query.
        }
    }


    public function  getAllCat()
    {
        $query = "SELECT * FROM tbl_category ORDER BY catId DESC";
        $result =  $this->db->select($query);
        return $result;
    }
    public function getCatById($id)
    {
        $query = "SELECT * FROM tbl_category WHERE catId ='$id' ";
        $result = $this->db->select($query);
        return $result;
    }
    public function catUpdate($catName, $id)
    {
        $catName = $this->fm->validation($catName); // Validation for special Characters             
        $catName =  mysqli_real_escape_string($this->db->link, $catName); // Validation for mysqli   
        $id =  mysqli_real_escape_string($this->db->link, $id); // Validation for mysqli   
        if (empty($catName)) {
            $msg = "<span class= 'error'>Category field must not be empty</span>";
            return $msg;
        } else {
            $query = "UPDATE tbl_category
            SET
            catName = '$catName' 
            WHERE catId = '$id' ";
            $update_row =  $this->db->update($query);
            if ($update_row) {
                $msg = "<span class= 'success'>Category has been updated</span>";
                return $msg;
            } else {
                $msg = "<span class= 'error'>Category not updated</span>";
                return $msg;
            }
        }
    }
    public function delCatById($id)
    {
        $query = "DELETE FROM tbl_category WHERE catId ='$id' ";
        $deldata = $this->db->delete($query);
        if ($deldata) {
            $msg = "<span class='success'>Category Deleted Successfully.</span> ";
            return $msg; // return this Message 
        } else {
            $msg = "<span class='error'>Category Not Deleted .</span> ";
            return $msg; // return this Message 
        }
    }
}




?>