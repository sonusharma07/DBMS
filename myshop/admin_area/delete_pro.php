
<?php
	include'../includes/db.php';
	if(isset($_GET['delete_pro'])){
		$delte_id=$_GET['delete_pro'];
		
		$delete_pro = "delete from products where product_id='$delte_id'";
		$run_delete = mysqli_query($con,$delete_pro);
		if($run_delete)
		{
			echo"<script>alert('product is deleted')</script>";
			echo"<script>window.open('adindex.php?view_products','_self')</script>";
	
		}
	}
?>