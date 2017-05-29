<?php
if(isset($_GET['edit_brand']))
{
	$edit_id = $_GET['edit_brand'];
	
	$edit_brand = "select * from brands where brand_id='$edit_id'";
	$run_brand =  mysqli_query($con,$edit_brand);
	$row_edit = mysqli_fetch_array($run_brand);
	$brand_title = $row_edit['brand_title'];
 }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>edit Brand</title>
</head>

<body>

<form class="form_group" action="" method="post">
<input type="text" name="brand_title" value="<?php echo $brand_title; ?>"/>
<input type="submit" name="update_brand" value="Update" />
</form>
</body>
</html>
<?php
if(isset($_POST['update_brand']))
{
	
	$brand_t = $_POST['brand_title'];
	$up_brand = "update brands set brand_title='$brand_t' where brand_id='$edit_id' ";
	$run_up =  mysqli_query($con,$up_brand);
	if($run_up)
	{
		echo"<script>alert('Brand Update!!')</script>";
		echo"<script>window.open('adindex.php?view_brands','_self')</script>";	
	}
	 }
?>