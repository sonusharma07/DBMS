<?php
@session_start();

?>

<div>
	
    
	<form action="checkout.php" method="post" enctype="multipart/form-data">
    <table class="table" width="800px">
    	<tr align="center" ><td colspan="2"><h2>Login Or Register</h2></td></tr>
    	<tr>
        <td width="330" align="right"><label>Email</label></td><td width="458"><input type="text"  name="c_email"/></td>
        </tr>
        <tr>
        <td align="right"><label>Password</label></td><td><input type="password"  name="c_pass" /></td>
        </tr>
        <tr>
        	<td colspan="2" align="center"><input type="submit"  name="c_login" value="login" /></td>
        </tr>
        <tr>
        	<td colspan="2" align="center"><a href="forgot_password.php">Forgot Password</a></td>
        </tr>
     </table> 
    </form>
    <h2 style="text-align:center " ><a href="customer_register.php" >New ? Register Now</a></h2>
 
</div> 

<?php
if(isset($_POST['c_login'])){
	$customer_email = $_POST['c_email'];
	$customer_pass = $_POST['c_pass'];
	$cus_q = "select * from customers where  customer_email = '$customer_email' AND customer_pass = '$customer_pass'";
	$run_cus = mysqli_query($con,$cus_q);
	$check_cus = mysqli_num_rows($run_cus);
	
	
	$get_ip = getRealIpAddr();
	$sel_cart = "select * from cart where ip_add = '$get_ip'";
	$run_cart = mysqli_query($con,$sel_cart);
	$check_cart = mysqli_num_rows($run_cart);
	if($check_cus ==0){
		echo "<script>alert('Email or password is wrong,try again')</script>";
		exit();
	}
	
	if($check_cus==1 AND $check_cart==0){
		$_SESSION['customer_email']=$customer_email;
		echo "<script>window.open('customers/my_account.php','_self')</script>";
	}
	else
	{
		$_SESSION['customer_email']=$customer_email;
		//echo "<script>window.open('payment_options.php','_self')</script>";
        include("payment_options.php");
		
    }
	
	
}


?>