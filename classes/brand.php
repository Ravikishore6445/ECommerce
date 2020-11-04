<?php
include_once ('../lib/mySession.php');
// mySession::checkLogin(); // Here i just added our Session Method

include_once ('../lib/myDatabase.php');
?>
<?php

class brand
{

    private $db;

    public function __construct()
    {
        $this->db = new myDatabase();
    }

    public function addBrand($brandName)
    {
        if (empty($brandName)) {
            $msg = "brand name should not be empty";
            return $msg;
        } else {
            $query = "Insert into tbl_brand (brandname) VALUES ('$brandName')";
            $catinsert = $this->db->insertdata($query);
            if ($catinsert) {
                $msg = "<span class = 'success'>brand Added successfully.</span>";
                return $msg;
            } else {
                $msg = "<span class = 'error'>brand not added.</span>";
                return $msg;
            }
        }
    }

    public function getAllBrand()
    {
        $query = "select * from tbl_brand";
        $result = $this->db->readData($query);
        return $result;
    }

    public function getBrandByID($id)
    {
        $query = "select * from tbl_brand where brandid='$id'";
        echo "query is " . $query;
        $result = $this->db->readData($query);
        return $result;
    }

    public function updateBrand($id, $brandname)
    {
        if (empty($brandname)) {
            $msg = "brand name should not be empty";
            return $msg;
        } else {
            $query = "update tbl_brand set brandname = '$brandname' where brandid='$id'";
            $catinsert = $this->db->updatedata($query);
            if ($catinsert) {
                $msg = "<span class = 'success'>brand updated successfully.</span>";
                return $msg;
            } else {
                $msg = "<span class = 'error'>brand not updated.</span>";
                return $msg;
            }
        }
    }

    public function deleteBrand($id)
    {
        if (empty($id)) {
            $msg = "id should not be empty";
            return $msg;
        } else {
            $query = "delete from tbl_brand where brandid = '$id'";
            echo "delete query is" . " " . $query;
            $del = $this->db->deletedata($query);
            if ($del) {
                $msg = "<span class = 'success'>brand deleted successfully.</span>";
                return $msg;
            } else {
                $msg = "<span class = 'error'>brand not deleted.</span>";
                return $msg;
            }
        }
    }
}
    



