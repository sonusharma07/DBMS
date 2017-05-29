<?php
	$c = $_SESSION['customer_email'];
	$get_c = "select * from customers where customer_email='$c'";
	$run_c = mysqli_query($con,$get_c);
	$row = mysqli_fetch_array($run_c);
	$cus_id = $row['customer_id'];
	
	
		
?>

<table class="table table-striped table-inverse" width="700px" align="center">
<thead align="center">
<tr>
	<th align="center">Order no</th>
    <th align='center'>Due amount</th>
    <th align='center'>Invoice no</th>
    <th align='center'>Total Products</th>
    <th align='center'>Order Date</th>
    <th align='center'>Paid/Unpaid</th>
    <th align='center'>Status</th>
   
</tr>
</thead>
<?php
$i = 1;
$get_orders = "select * from customer_orders where customer_id='$cus_id'";
$run_orders = mysqli_query($con,$get_orders);					
while($row_order = mysqli_fetch_row($run_orders))
{
	
	
	$order_id = $row_order[0];
	$due_amount = $row_order[2];
	$invoice_no = $row_order[3];
	$products = $row_order[4];
	$date = $row_order[5];
	$status = $row_order[6];
	
	if($status == 'Pending')
	{
		$status = 'Unpaid';
	}else
	{
		$status = 'Paid';
	}
	echo"
	<tr align='center'>
		<td>$i</td>
		<td>$due_amount</td>
		<td>$invoice_no</td>
		<td>$products</td>
		<td>$date</td>
		<td>$status</td>
		<td><a href='confirm.php?order_id=$order_id'><button type='button' class='btn btn-primary'>Confirm if Paid</button></a></td>
	</tr>	
	";
	$i++;
	

}

?>


</table>