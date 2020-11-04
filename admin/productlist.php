<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/product.php'?>


<?php
$product = new product();
$productid = $_GET['delproduct'];
$delproduct = $product->deleteProduct($productid);
?>

<div class="grid_10">
	<div class="box round first grid">
		<h2>Post List</h2>
		<div class="block">
		<?php
if ($delproduct) {
    
    echo $delproduct;
}

?>
		
			<table class="data display datatable" id="example">
				<thead>
					<tr>
						<th>Product ID</th>
						<th>Product Name</th>
						<th>Category</th>
						<th>Brand</th>
						<th>Description</th>
						<th>Price</th>
						<th>image</th>
						<th>type</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				<?php
    $getproduct = $product->getAllProducts();
    if ($getproduct) {
        while ($result = $getproduct->fetch_assoc()) {
            
            ?>
				      	<tr class="odd gradeX">
						<td class="center"><?php echo $result['productid']?></td>
						<td class="center"><?php echo $result['productname']?></td>
						<td class="center"><?php echo $result['catid']?></td>
						<td class="center"><?php echo $result['brandid']?></td>
						<td class="center"><?php echo $result['body']?></td>
						<td class="center"><?php echo $result['price']?></td>
						<td class="center"><img src="<?php echo $result['image'];?>"
							height="40px" width="60px";></td>
						<td class="center">
						<?php
            if ($result['type'] == 0) {
                echo "featured";
            } else {
                echo "general";
            }
            
            ?>
						
						</td>

						<td><a href="productedit.php?id=<?php echo $result['productid']?>">Edit</a>
							|| <a onclick="return confirm('Are you sure to delete')"
							href="?delproduct=<?php echo $result['productid']; ?>">Delete</a></td>
					</tr>					
				        
				        
				        
				    
				    <?php
        }
    }
    ?>    
				        
				
				
				
				
				
				
				
				</tbody>
			</table>

		</div>
	</div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
