<?php
if(isset($_GET['edit_cat']))
{
	$edit_id = $_GET['edit_cat'];
	
	$edit_cat = "select * from catagory where cat_id='$edit_id'";
	$run_cat =  mysqli_query($con,$edit_cat);
	$row_edit = mysqli_fetch_array($run_cat);
	$cat_title = $row_edit['cat_title'];
 }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<form class="form_group" action="" method="post">
<input type="text" name="cat_title" value="<?php echo $cat_title ?>"/>
<input type="submit" name="insert_cat" value="Update" />
</form>
</body>
</html>
<?php
if(isset($_POST['insert_cat']))
{
	
	$cat_t = $_POST['cat_title'];
	$insert_cat = "update catagory set cat_title='$cat_t' where cat_id='$edit_id' ";
	$run_cat =  mysqli_query($con,$insert_cat);
	if($run_cat)
	{
		echo"<script>alert('Category Update!!')</script>";
		echo"<script>window.open('adindex.php?view_cats','_self')</script>";	
	}
	 }
?>