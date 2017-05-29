
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Insert Cat</title>
</head>

<body>

<form class="form_group" action="" method="post">
<input type="text" name="cat_title" />
<input type="submit" name="insert_cat" value="Insert cat" />
</form>
</body>
</html>
<?php
if(isset($_POST['insert_cat']))
{
	
	$cat_t = $_POST['cat_title'];
	$insert_cat = "insert into catagory(cat_title) values('$cat_t') ";
	$run_cat =  mysqli_query($con,$insert_cat);
	if($run_cat)
	{
		echo"<script>alert('New Category added!!')</script>";
		echo"<script>window.open('adindex.php?view_cats','_self')</script>";	
	}
	 }
?>