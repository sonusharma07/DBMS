<!DOCTYPE html>
<html>
	<head>
		<title>Payment Options</title>
	</head>
<body>
<?php
//include 'functions/function.php';
?>
<div align="center" style="padding:20px">
<?php
$ip = getRealIpAddr();
$get_cus = "select * from customers where customer_ip='$ip'";
$run_cus = mysqli_query($con,$get_cus);

if($run_cus){
	$customer = mysqli_fetch_array($run_cus);
	
	$cus_id = $customer['customer_id'];
	
}else
{
	echo "$con->error";
}

?>
<h3 align="center">Payment Options</h3>
<b>Pay With</b>&nbsp;<a href="http://www.paypal.com"><img src="images/payment.jpg" width="100" height="50" /> </a><b> Or <a href="order.php?cus_id=<?php echo $cus_id; ?>">Pay Offline</a>
</div>
</body>
</html>