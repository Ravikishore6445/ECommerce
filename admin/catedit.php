<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Category.php'?>

<?php
if (! isset($_GET['id']) || $_GET['id'] == null) {
    // echo "<script> window.location='catlistphp';</script>";
} else {
    $id = $_GET['id'];
    echo "ïd is " . $_GET['id'];
}

?>

<?php
$cat = new category();

echo "is it comimg here to update";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    if ($_POST['submit']) {
        
        $catname = $_POST['catName'];
        $updateCat = $cat->updateCategory($id, $catname);
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
            
            $getcat = $cat->getCatByID($id);
            if ($getcat) {
                while ($result = $getcat->fetch_assoc()) {
                    
                    ?>
                    
                     <form action="" method="post">
				<table class="form">
					<tr>
						<td><input type="text" name="catName" size="25"
							value=<?php echo $result['catname']?> /></td>
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