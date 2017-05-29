
<?php
	include'../includes/db.php';
	if(isset($_GET['delete_cat'])){
		$delte_id=$_GET['delete_cat'];
		
		$delete_cat = "delete from catagory where cat_id='$delte_id'";
		$run_delete = mysqli_query($con,$delete_cat);
		if($run_delete)
		{
			echo"<script>alert('Catagory is deleted')</script>";
			echo"<script>window.open('adindex.php?view_cats','_self')</script>";
	
		}
	}
?>