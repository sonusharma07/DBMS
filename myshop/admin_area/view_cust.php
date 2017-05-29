<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Customers</title>
</head>

<body>
<?php
if(isset($_GET['view_customers']))
{?>
<table class="table" border="1">
<thead>
  <tr>
  <td colspan="8">View Customers</td>
  </tr>
  
  <tr>
    <td>Serial No</td>
    <td>Image</td>
    <td>Name</td>
    
    <td>Country</td>
	<td>Email</td>
  </tr>
  </thead>
  
  <?php
  	$i=0;
  	$get_cus = "select * from customers";
	$run_cus = mysqli_query($con,$get_cus);
	while($row_cus = mysqli_fetch_array($run_cus))
	{
		$c_id = $row_cus['customer_id'];
		$c_name = $row_cus['customer_name'];
		$c_email = $row_cus['customer_email'];
		$c_image = $row_cus['customer_image'];
		$c_country = $row_cus['customer_country'];
		$i++;
	
  ?>
  <tr>
    <td><?php echo"$i"; ?></td>
    
    <td><img src="../customers/customer_photos/<?php echo $c_image; ?> " width="100px" height="50px" /></td>
    <td><?php echo"$c_name"; ?></td>
    <td><?php echo"$c_country"; ?></td>
    <td><?php echo"$c_email";?></td>
    
    </tr>
  <?php } ?>
</table>
<?php } 
?>
</body>
</html>