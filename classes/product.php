<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/ECommerce/lib/mySession.php';
// mySession::checkLogin(); // Here i just added our Session Method
include_once $_SERVER['DOCUMENT_ROOT'].'/ECommerce/lib/myDatabase.php';
?>
<?php

class product
{

    private $db;

    public function __construct()
    {
        $this->db = new myDatabase();
    }

    public function addproduct($_data, $FILE)
    {
        $productName = $_POST['productname'];
        $catID = $_POST['catid'];
        $brandID = $_POST['brandid'];
        $body = $_POST['body'];
        $price = $_POST['price'];
        $type = $_POST['type'];
        
        $permitted = array(
            'jpg',
            'png',
            'jpeg',
            'gif'
        );
        $file_name = $FILE['image']['name'];
        $file_size = $FILE['image']['size'];
        $file_temp = $FILE['image']['tmp_name'];
        
        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
        
        $uploaded_image = "upload/" . $unique_image;
        if ($productName == "" || $catID == "" || $brandID == "" || $body == "" || $price == "" || $type == "") {
            $msg = "<span class = 'error'>field must not be empty.</span>";
            echo $msg;
        } else {
            move_uploaded_file($file_temp, $uploaded_image);
            $query = "INSERT into tbl_product(productname,catid,brandid,body,price,image,type)VALUES
           ('$productName','$catID','$brandID','$body','$price','$uploaded_image','$type')";
            $inserted_row = $this->db->insertdata($query);
            if ($inserted_row) {
                $msg = "<span class = 'success'>product Added successfully.</span>";
                return $msg;
            } else {
                $msg = "<span class = 'success'>product not added.</span>";
                return $msg;
            }
        }
    }

    public function getAllProducts()
    {
        $query = "SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName
         FROM tbl_product
         INNER JOIN tbl_category
         ON tbl_product.catId = tbl_category.catId
         INNER JOIN tbl_brand
         ON tbl_product.brandId = tbl_brand.brandId
         ORDER BY tbl_product.productId DESC";
        
        $result = $this->db->readData($query);
        return $result;
    }

    public function updateProduct($id, $name)
    {
        $query = "UPDATE tbl_product SET productname = '$name' where productid='$id'";
        
        $productupdate = $this->db->updatedata($query);
        if ($productupdate) {
            $msg = "<span class = 'success'>product updated successfully.</span>";
            return $msg;
        } else {
            $msg = "<span class = 'success'>product not updated.</span>";
        }
        
        return $result;
    }

    public function getProductByID($id)
    {
        $query = "select * from tbl_product where productid='$id'";
        $result = $this->db->readData($query);
        return $result;
    }

    public function deleteProduct($id)
    {
        $query = "delete from tbl_product where productid = '$id'";
        echo "delete query is" . " " . $query;
        $del = $this->db->deletedata($query);
        if ($del) {
            $msg = "<span class = 'success'>product deleted successfully.</span>";
            return $msg;
        } else {
            $msg = "<span class = 'error'>product not deleted.</span>";
            return $msg;
        }
    }
}
    



