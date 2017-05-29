<?php
session_start();
include 'functions/function.php'; 
include'includes/db.php';
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Myshop_SignUp</title>
<link type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet" media="all" />
<link type="text/css" href="styles/style.css" rel="stylesheet" media="all" />
</head>


<body>
	<!-- Main container Starts-->
    <div class="main_wrapper">
    	
      <div class="header_wrapper"><!-- header sec strt-->
       <a href="index.php"><img src="images/logo.png" style="float:left; padding-top:5px"/></a>
      </div><!-- header sec end-->
        
        <div id="navbar"><!--Navigation bar starts-->
        	<ul id="menu">
            	<li><a href="index.php">Home</a></li>
                <li><a href="all_products.php">All Products</a></li>
                <li><a href="customers/my_account.php">account</a></li>
                <li><a href="cart.php">Shopping Cart</a></li>
                <li><a href="#">Contact Us</a></li>
       
            
                 <!--heading cart-->
                <div id="" style="float:right;">
                	
                	<div id="">
                    	<?php
							
							cart();
						?>
                    	<?php
						if(!isset($_SESSION['customer_email']))
						 {
						 	echo "<b>Welcome !</b>";
						 }else
						 {
							 echo "<b>Welcome ".$_SESSION['customer_email']."</b>";	
						 }
						 ?>
                        <b style="color:#FFF;">Your Cart</b>
                        <span>- Item:<?php cart_item() ?>- Price:<?php total_price() ?> -<a href="cart.php" style="color:#999">go to Cart</a> <?php 
                            
                         if(!isset($_SESSION['customer_email']))
						 {
						 	echo "<a href='checkout.php' style='color:#C03'>Login</a>";
						 }else
						 {
							 echo "<a href='logout.php' style='color:#C03'>Logout</a>";	
						 }
						 ?>
                         </span>
                    </div>
                    
                </div>
             </ul>
        </div><!--Navigation bar ends-->
        
        
      <div class="content_wrapper"><!--conent area starts-->
        	<div id="left_sidebar"><!-- left bar conent area-->
            	<div id="sidebar_title">Catagory </div>
                	<ul id="cats">
                    	<?php
							getCat();
							
						?>                    
                    </ul>
               <div id="sidebar_title">Brands</div>
                	<ul id="cats">
                    	<?php
							getBrand();
						?>      
                    </ul>   
            
       </div> <!--left bar conent area ends-->
            
            <div id="right_content"><!-- right bar conent area-->
            	

                <div id="content-box" >
                 	  <form action="customer_register.php" method="post" enctype="multipart/form-data">
                    	<table class="table" width="700px"  align="center">
                        	<tr>
                            	<td colspan="3" align="center" ><h2>Create A Account</h2></tr>
                            </tr>
                            <tr>
                            	<td align="right"><b>Customer Name</b></td>
                                <td><input type="text" name="c_name" required /></td>
                            </tr>
                            
                             <tr>
                            	<td align="right"><b>Customer Email</b></td>
                                <td><input type="text" name="c_email" required /></td>
                            </tr>
                            
                             <tr>
                            	<td align="right"><b>Customer Password</b></td>
                                <td><input type="text" name="c_pass" required /></td>
                            </tr>
                            
                             <tr>
                            	<td align="right"><b>Customer Country</b></td>
                                <td>
                                	<select name="c_country">
                                    	<option>Select a Country</option>
                                        <option>India</option>
                                        <option>China</option>
                                        <option>USA</option>
                                        </select>
                                
                                </td>
                            </tr>
                            
                             <tr>
                            	<td align="right"><b>Customer City</b></td>
                                <td><input type="text" name="c_city" required /></td>
                            </tr>
                            
                             <tr>
                            	<td align="right"><b>Customer Mobile no:</b></td>
                                <td><input type="text" name="c_contact" required /></td>
                            </tr>
                            
                             <tr>
                            	<td align="right"><b>Customer Address</b></td>
                                <td><input type="text" name="c_address" required /></td>
                            </tr>
                            
                             <tr>
                            	<td height="26" align="right"><b>Customer Image</b></td>
                               <td><input type="file" name="c_image"  required /></td>
                            </tr>
                            
                            
                            <tr>
                            	<td colspan="3" align="center"> <input type="submit" value="Register" name="register" /></td>
                            </tr>
                            
                       </table>     
                    </form>
                </div>
                
                 
                
                
            </div> <!--right bar conent area ends-->
        
     
        
        
      <div class="footer_area">
      		<h3 style="color:#000;padding-top:20px;text-align:center">&copy; by Sonu Sharma and Soyal Ahimed</h3>
      </div><!--footer sec--></div>
      
         </div><!--conent area ends-->
</body>
</html>

<?php
	if(isset($_POST['register'])){
		
		$c_name = $_POST['c_name'];
		$c_email = $_POST['c_email'];
		$c_pass = $_POST['c_pass'];
		$c_city = $_POST['c_city'];
		$c_country = $_POST['c_country'];
		$c_address = $_POST['c_address'];
		$c_contact = $_POST['c_contact'];
		$c_image = $_FILES['c_image']['name'];
		$c_image_tmp = $_FILES['c_image']['tmp_name'];
		$c_ip = getRealIpAddr();
		
		$insert_cust = "insert into customers(customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_ip,customer_image) values('$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address','$c_ip','$c_image')";
		
		$run_cust = mysqli_query($con,$insert_cust);
		
		move_uploaded_file($c_image_tmp,"customers/customer_photos/$c_image");
		
		$sel_cart = "select * from cart where ip_add = '$c_ip'";
		$run_cart = mysqli_query($con,$sel_cart);
		$check_cart = mysqli_num_rows($run_cart);
		
		
		if($check_cart>0)
		{
			echo"<script>alert('account created!!')</script>";
			$_SESSION['customer_email']=$c_email;
			echo"<script>window.open('checkout.php','_self')</script>";
			
		}
		else
		{
			
			echo"<script>window.open('index.php','_self')</script>";
			echo"<script>alert('account created!!')</script>";
		}
	
}	



?>
	















