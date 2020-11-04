<?php
include_once ('../lib/mySession.php');
// mySession::checkLogin(); // Here i just added our Session Method

include_once ('../lib/myDatabase.php');
?>

<?php

class adminLogin
{

    private $db;

    public function __construct()
    {
        $this->db = new myDatabase();
        // $this->format = new myFormat();
    }

    public function login_check($adminuser, $adminpwd)
    {
        
        echo "ïs it comimg here";
        
           if (empty($adminuser) || empty($adminpwd)) {
            $loginmsg = "Username or password should not be empty";
            return $loginmsg;
        } else {
            $query = "select  * from tbl_admin where  adminUser ='$adminuser' and adminPass = '$adminpwd' ";
            $result = $this->db->readData($query);
            if ($result != false) {
                $value = $result->fetch_assoc();
                mySession::set("adminlogin", "true");
                mySession::set("adminId", $value['adminId']);
                mySession::set("adminUser", $value['adminUser']);
                mySession::set("adminName", $value['adminName']);
               header("Location:dashboard.php");
            } else {
                $loginmsg = "Username or password not match";
                return $loginmsg;
            }
        }
    }
}

