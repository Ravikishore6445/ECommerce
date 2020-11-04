<?php
//include_once ('../config/config.php');
include_once $_SERVER['DOCUMENT_ROOT'].'/ECommerce/config/config.php';



class myDatabase
{

    public $host = DB_HOST;

    public $username = DB_USER;

    public $pwd = DB_PASS;

    public $dbname = DB_NAME;

    public $link;

    public $err;

    public function __construct()
    {
        $this->connectDB();
    }

    public function connectDB()
    {
        $this->link = new mysqli($this->host, $this->username, $this->pwd, $this->dbname);
        
        if (! $this->link) {
            $this->err = "connection failed";
            echo $this->err;
        }
    }

    // read data
    public function readData($query)
    {
        $result = $this->link->query($query) or die($this->link->error);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }

    public function insertdata($query)
    {
        $insert_data = $this->link->query($query) or die($this->link->error);
        if ($insert_data) {
            return $insert_data;
        } else {
            return false;
        }
    }

    public function updatedata($query)
    {
        $update_data = $this->link->query($query) or die($this->link->error);
        if ($update_data) {
            return $update_data;
        } else {
            return false;
        }
    }

    public function deletedata($query)
    {
        $delete_data = $this->link->query($query) or die($this->link->error);
        if ($delete_data) {
            return $delete_data;
        } else {
            return false;
            
        }
    }
}



