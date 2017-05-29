<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>view Brands</title>
</head>

<body>

<table class="table" border="1">
  <thead>
  <tr>
  	<td colspan="4">All Brands</td>
  </tr>
  <tr>
    <td>Brand ID</td>
    <td>Brand Title</td>
    <td>Edit</td>
    <td>Delete</td>
    
  </tr>
  
  </thead>
  
  <?php
  $get_b = "select * from brands";
  $run_b = mysqli_query($con,$get_b);
  while($row  = mysqli_fetch_array($run_b))
  {
	  $brand_id = $row['brand_id'];
	  $b_title = $row['brand_title'];
  
    ?>
  <tr>
    <td><?php echo"$brand_id"; ?></td>
    <td><?php echo"$b_title"; ?></td>
    <td><a href="adindex.php?edit_brand=<?php echo $brand_id; ?>">Edit</a></td>
    <td><a href="adindex.php?delete_brand=<?php echo $brand_id; ?>">Delete</a></td>
  </tr>
  <?php } ?>
</table>


</body>
</html>