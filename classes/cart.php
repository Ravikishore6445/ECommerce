<?php 
include_once $_SERVER['DOCUMENT_ROOT'].'/ECommerce/lib/myDatabase.php';

?>


<?php 

class cart
{
   private $db;
   
   public function __construct(){
       $this->db = new myDatabase();
            
   }
    
}

?>