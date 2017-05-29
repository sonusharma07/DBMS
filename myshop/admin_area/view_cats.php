<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>view cats</title>
</head>

<body>

<table class="table" border="1">
  <thead>
  <tr>
  	<td colspan="4">All Category</td>
  </tr>
  <tr>
    <td>Category ID</td>
    <td>Catagory Title</td>
    <td>Edit</td>
    <td>Delete</td>
    
  </tr>
  
  </thead>
  
  <?php
  $get_cats = "select * from catagory";
  $run_cat = mysqli_query($con,$get_cats);
  while($row  = mysqli_fetch_array($run_cat))
  {
	  $cat_id = $row['cat_id'];
	  $cat_title = $row['cat_title'];
  
    ?>
  <tr>
    <td><?php echo"$cat_id"; ?></td>
    <td><?php echo"$cat_title"; ?></td>
    <td><a href="adindex.php?edit_cat=<?php echo $cat_id; ?>">Edit</a></td>
    <td><a href="adindex.php?delete_cat=<?php echo $cat_id; ?>">Delete</a></td>
  </tr>
  <?php } ?>
</table>


</body>
</html>