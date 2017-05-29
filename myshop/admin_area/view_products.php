<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
if(isset($_GET['view_products']))
{?>
<table class="table" border="1">
<thead>
  <tr>
  <td colspan="8">View Products</td>
  </tr>
  
  <tr>
    <td>Product No</td>
    <td>Title</td>
    <td>Image</td>
    <td>Price</td>
    <td>Total Sold</td>
    <td>Status</td>
    <td>Edit</td>
    <td>Delete</td>
  </tr>
  </thead>
  
  <?php
  	$i=0;
  	$get_pro = "select * from products";
	$run_pro = mysqli_query($con,$get_pro);
	while($row_pro = mysqli_fetch_array($run_pro))
	{
		$p_id = $row_pro['product_id'];
		$p_title = $row_pro['product_title'];
		$p_img = $row_pro['product_img1'];
		$p_price = $row_pro['product_price'];
		$p_status = $row_pro['status'];
		$i++;
	
  ?>
  <tr>
    <td><?php echo"$i"; ?></td>
    <td><?php echo"$p_title"; ?></td>
    <td><img src='prod_image/<?php echo"$p_img"; ?>' /></td>
    <td><?php echo"$p_price";?></td>
    <td>
    <?php
		$get_sold = "select * from pending_orders where product_id = '$p_id'";
		$run_sold = mysqli_query($con,$get_sold);
		$count = mysqli_num_rows($run_sold);
		echo"$count";
	?>
    
    </td>
    <td>
    <?php echo"$p_status";?>
    </td>
    <td><a href='adindex.php?edit_pro=<?php echo"$p_id"; ?>'>Edit</a></td>
    <td><a href='delete_pro.php?delete_pro=<?php echo"$p_id"; ?>'>Delete</a></td>
  </tr>
  <?php } ?>
</table>
<?php } 
?>
</body>
</html>