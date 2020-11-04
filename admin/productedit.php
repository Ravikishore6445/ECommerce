<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/product.php'?>

<?php
if (! isset($_GET['id']) || $_GET['id'] == null) {
    // echo "<script> window.location='catlistphp';</script>";
} else {
    $id = $_GET['id'];
    echo "ïd is " . $_GET['id'];
}

?>

<?php
$product = new product();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    if ($_POST['submit']) {
        $productname = $_POST['productname']; 
        echo "product name is    ".$productname;
        $updateProduct = $product->updateProduct($id, $productname);
    }
}

?>

<div class="grid_10">
	<div class="box round first grid">
		<h2>Update Category</h2>
		<div class="block copyblock"> 
               <?php
               if (isset($updateProduct)) {
                   echo $updateProduct;
            }
            
            ?>
           
            
            <?php
            
            $getproduct = $product->getProductByID($id);
            if ($getproduct) {
                while ($result = $getproduct->fetch_assoc()) {
                    
                    ?>
                    
                     <form action="" method="post">
				<table class="form">
					<tr>
						<td><input type="text" name="productname" size="25"
							value=<?php echo $result['productname']?> /></td>
					</tr>
					<tr>
						<td><input type="submit" name="submit" Value="Update" /></td>
					</tr>

				</table>


			</form>
                    
                    
         <?php
                }
            }
            ?>
            
               
               
               
                
		</div>
	</div>
</div>
<?php include 'inc/footer.php';?>