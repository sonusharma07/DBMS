<?php
session_start();
include('functions/function.php');
if(isset($_GET['order_id']))
	{
		$order_id = $_GET['order_id'];
	}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet" media="all" />
<link type="text/css" href="styles/style.css" rel="stylesheet" media="all" /> 
<title>confirm</title>
</head>

<body style="background-color:#FFF; ">
<div class="container-fluid">
<form action="" method="post">

<table class="table table-bordered table-inverse table-sm" style="">
	<tr align="center">
    	<td colspan="5"><a href="../index.php"><img src="../images/logo.png" alt="go to Home"/></a><h2>Confirm Your Payment</h2></td>
    </tr>
     <tr><td align="right">Order No:</td>
     	<td><input type="text" name="or_id" value=<?php echo "$order_id";?> style="visibility=hidden;" /></td>
     </tr>
    <tr>
    	<td align="right">Invoice No:</td>
        <td><input type="text" name="invoice_no" /></td>
    </tr>
    
    <tr>
    	<td align="right">Amount Paid</td>
        <td><input type="text" name="amount" /></td>
    </tr>
    
    <tr>
    	<td align="right">Select Payment Mode:</td>
        <td><select name="payment_method" />
        	<option>Select Payment</option>
            <option>Bank Transfer</option>
            <option>Paypal</option>
            </select>
        </td>
    </tr>
   
    <tr>
    	<td align="right">Transaction Id</td>
        <td><input type="text" name="tr" /></td>
    </tr>
   
    
    <tr>
    	<td align="right">Payment Date</td>
        <td><input type="text" name="date" /></td>
    </tr>
    
    <tr align="center"> 
    	
        <td colspan="5"><input type="submit" name="confirm" value="Confirm Payment"/></td>
    </tr>
   
</table>
</form>
</div>
</body>
</html>

<?php
if(isset($_POST['confirm']))
{
	//$update_id = $_GET['update_id'];
	$update_id = $_POST['or_id'];
	echo "$update_id";
	$invoice = $_POST['invoice_no'];
	$amount = $_POST['amount'];
	$payment_method = $_POST['payment_method'];
	$ref_no = $_POST['tr'];
	$date = $_POST['date'];
	
	$q = "insert into payments(o_id,invoice_no,amount,payment_mode,ref_no,payment_date) values('$update_id','$invoice','$amount','$payment_method','$ref_no','$date')";
	$run_q = mysqli_query($con,$q);
	$complete = 'Complete';
	if($run_q)
	{
		echo "<h2 style='text-align:center; color:green;'>Payment recieved,your order will be completed within 24  hours</h2>";
		
		$update_order = "update customer_orders set order_status='$complete' where order_id='$update_id'";
		$run_update = mysqli_query($con,$update_order);
		if($run_update)
		{

		}else
		{
			echo"$con->error";
		}
		$update_pend_order = "update pending_orders set order_status='$complete' where order_id='$update_id'";
		$run_p_update = mysqli_query($con,$update_pend_order);
		if($run_p_update)
		{
			echo "<script>window.open('my_account.php','_self')</script>";	
		}else{
			echo"$con->error";
		}
	}else
	{
		echo"$con->error";
	}
}
?>