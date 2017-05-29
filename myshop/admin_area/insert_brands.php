
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Insert Cat</title>
</head>

<body>

<form class="form_group" action="" method="post">
<input type="text" name="b_title" />
<input type="submit" name="insert_brand" value="Insert brand" />
</form>
</body>
</html>
<?php
if(isset($_POST['insert_brand']))
{
	
	$brand_t = $_POST['b_title'];
	$insert_b = "insert into brands(brand_title) values('$brand_t') ";
	$run_b =  mysqli_query($con,$insert_b);
	if($run_b)
	{
		echo"<script>alert('New Brand added!!')</script>";
		echo"<script>window.open('adindex.php?view_brands','_self')</script>";	
	}
	 }
?>