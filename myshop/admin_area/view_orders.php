<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Customers</title>
</head>

<body>
<?php
if(isset($_GET['view_orders']))
{?>
<table class="table" border="1">
<thead>
  <tr>
  <td colspan="8">View All Orders</td>
  </tr>
  
  <tr>
    <td>Serial No</td>
    <td>Customer</td>
    <td>Invoice No</td> 
    <td>Product ID</td>
	<td>Quantity</td>
    <td>Status</td>
    <td>Delete</td>
  </tr>
  </thead>
  
  <?php
  	$i=0;
  	$get_cus = "select * from pending_orders";
	$run_cus = mysqli_query($con,$get_cus);
	while($row_cus = mysqli_fetch_array($run_cus))
	{
		$order_id = $row_cus['order_id'];
		$c_id = $row_cus['customer_id'];
		$invoice = $row_cus['invoice_no'];
		$p_id = $row_cus['product_id'];
		$qty = $row_cus['qty'];
		$status = $row_cus['order_status'];
		
	
	$get_cusid="select * from customers where customer_id='$c_id'";
	 $run_cusid=mysqli_query($con,$get_cusid);
	 $cus_row = mysqli_fetch_array($run_cusid);
	 $cus_email = $cus_row['customer_email'];
		
		$i++;
	
  ?>
  <tr>
    <td><?php echo"$i"; ?></td>
    
    <td>
    <?php
	 
	 echo"$cus_email";	
	?>
   
    </td>
    <td><?php echo $invoice;?></td>
    <td><?php echo $p_id; ?></td>
    <td><?php echo"$qty";?></td>
    <td><?php echo"$status";?></td>
    <td><a href="delete_order.php?delete_order=<?php echo $order_id;?>" >Delete</a></td>
    </tr>
  <?php } ?>
</table>
<?php } 
?>
</body>
</html>