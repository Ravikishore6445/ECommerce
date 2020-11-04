<?php
include_once ('../lib/mySession.php');
// mySession::checkLogin(); // Here i just added our Session Method

include_once ('../lib/myDatabase.php');
?>
<?php

class category
{

    private $db;

    public function __construct()
    {
        $this->db = new myDatabase();
    }

    public function addCategory($catName)
    {
        if (empty($catName)) {
            $msg = "category name should not be empty";
            return $msg;
        } else {
            $query = "Insert into tbl_category (catname) VALUES ('$catName')";
            $catinsert = $this->db->insertdata($query);
            if ($catinsert) {
                $msg = "<span class = 'success'>Category Added successfully.</span>";
                return $msg;
            } else {
                $msg = "<span class = 'error'>Category not inserted.</span>";
                return $msg;
            }
        }
    }

    public function getAllCat()
    {
        $query = "select * from tbl_category";
        $result = $this->db->readData($query);
        return $result;
    }

    public function getCatByID($id)
    {
        $query = "select * from tbl_category where catid='$id'";
        echo "query is ".$query;
        $result = $this->db->readData($query);
        return $result;
    }
    
    public function updateCategory($id,$catname)
    {
        echo "is it coming to update";
        if (empty($catname)) {
            $msg = "category name should not be empty";
            return $msg;
        } else {
            $query = "update tbl_category set catname = '$catname' where catid='$id'";
            echo "update query is"." ".$query; 
            $catinsert = $this->db->updatedata($query);
            if ($catinsert) {
                $msg = "<span class = 'success'>Category updated successfully.</span>";
                return $msg;
            } else {
                $msg = "<span class = 'error'>Category not updated.</span>";
                return $msg;
            }
        }
    }
    
    
    public function deleteCategory($id)
    {
        if (empty($id)) {
            $msg = "id should not be empty";
            return $msg;
        } else {
            $query = "delete from tbl_category where catid = '$id'";
            echo "delete query is"." ".$query;
            $del = $this->db->deletedata($query);
            if ($del) {
                $msg = "<span class = 'success'>Category deleted successfully.</span>";
                return $msg;
            } else {
                $msg = "<span class = 'error'>Category not deleted.</span>";
                return $msg;
            }
        }
    }
    
    
}
    



