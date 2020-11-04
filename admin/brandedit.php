<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php'?>

<?php
if (! isset($_GET['id']) || $_GET['id'] == null) {
    // echo "<script> window.location='catlistphp';</script>";
} else {
    $id = $_GET['id'];
    echo "ïd is " . $_GET['id'];
}

?>

<?php
$brand = new brand();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    if ($_POST['submit']) {
        
        $brandname = $_POST['brandName'];
        $updateCat = $brand->updateBrand($id, $brandname);
    }
}

?>

<div class="grid_10">
	<div class="box round first grid">
		<h2>Update Category</h2>
		<div class="block copyblock"> 
               <?php
            if (isset($updateCat)) {
                echo $updateCat;
            }
            
            ?>
           
            
            <?php
            
            $getbrand = $brand->getBrandByID($id);
            if ($getbrand) {
                while ($result = $getbrand->fetch_assoc()) {
                    
                    ?>
                    
                     <form action="" method="post">
				<table class="form">
					<tr>
						<td><input type="text" name="brandName" size="25"
							value=<?php echo $result['brandname']?> /></td>
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