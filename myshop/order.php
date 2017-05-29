<?php
include 'functions/function.php';

if(isset($_GET['cus_id']))
{
	$cus_id=$_GET['cus_id']; 

	$total = "";
	
	$ip_add = getRealIpAddr();
	$cart_price = "select * from cart,products where cart.ip_add = '$ip_add' AND products.product_id = cart.p_id";
	$run_check = mysqli_query($con,$cart_price);
	$status = 'Pending';
	$invoice_no = mt_rand();
	$count_pro = mysqli_num_rows($run_check);
	
	while($row_price = mysqli_fetch_array($run_check))
	{
		
		$pro_price = array($row_price['product_price']);
		$value = array_sum($pro_price);
		$total += $value;
		
	}
	echo "$total";


}

$get_cart = "select * from cart";
$run_cart = mysqli_query($con,$get_cart);
$get_qty = mysqli_fetch_array($run_cart);
$qty = $get_qty['qty'];

$p_id = $get_qty['p_id'];
if($count_pro !=0)
{
	if(is_null($qty) )
	{
		
		$qty = 1;
		echo"hell $qty";
		$sub_total =$total;
	}
	else
	{
		$qty=$qty;
		$sub_total = $total*$qty;
	}
	$q = "insert into customer_orders(customer_id,due_amount,invoice_no,total_products,order_date,order_status) values('$cus_id','$sub_total','$invoice_no','$count_pro',NOW(),'$status')";
	
	
	$run_i = mysqli_query($con,$q);
	if($run_i)
	{
		echo "<script>alert('Order Submitted')</script>";
		
		$empty_cart = "delete from cart where ip_add = '$ip_add'";
		$run_empty  = mysqli_query($con,$empty_cart);
		
		$for_order = "select * from customer_orders where invoice_no='$invoice_no'";
		$run_order  = mysqli_query($con,$for_order);
		$order_row = mysqli_fetch_array($run_order);
		$order_id = $order_row['order_id'];
		
		$insert_into_porders = "insert into pending_orders(order_id,customer_id,invoice_no,product_id,qty,order_status) values('$order_id','$cus_id','$invoice_no','$p_id','$qty','$status')";
		
		$run_pending = mysqli_query($con,$insert_into_porders);
		if($run_pending)
		{
		
		}else
		{
			echo"$con->error";
		}
		echo "<script>window.open('customers/my_account.php','_self')</script>";
	}
	else
	{
		echo"$con->error";
	}
}
else
{
	echo"<script>alert('Your Cart is Empty!!')</script>";
	echo "<script>window.open('index.php','_self')</script>";
}
?>