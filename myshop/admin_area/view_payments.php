<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Customers</title>
</head>

<body>
<?php
if(isset($_GET['view_payments']))
{?>
<table class="table" border="1">
<thead>
  <tr>
  <td colspan="8">View All Payments</td>
  </tr>
  
  <tr>
    <td>Payment No</td>
    <td>Invoice No</td> 
    <td>Amount Paid</td>
	<td>Payments Method</td>
    <td>Ref No</td>
    <td>Payment Date</td>
  </tr>
  </thead>
  
  <?php
  	$i=0;
  	$get_pay = "select * from payments";
	$run_pay = mysqli_query($con,$get_pay);
	while($row_pay = mysqli_fetch_array($run_pay))
	{
		$pay_id = $row_pay['payment_id'];
		
		$invoice = $row_pay['invoice_no'];
		$amount = $row_pay['amount'];
		$pay_meth = $row_pay['payment_mode'];
		$ref = $row_pay['ref_no'];
		$date = $row_pay['payment_date'];
		
	
		$i++;
	
  ?>
  <tr>
    <td><?php echo"$i"; ?></td>
    
    <td>
    <?php
	 
	 echo"$invoice";	
	?>
   
    </td>
    <td><?php echo $amount;?></td>
    <td><?php echo $pay_meth; ?></td>
    <td><?php echo"$ref";?></td>
    <td><?php echo"$date";?></td>
    
    </tr>
  <?php } ?>
</table>
<?php } 
?>
</body>
</html>