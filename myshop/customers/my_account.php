<?php
session_start();
if(!isset($_SESSION['customer_email']))
{
  echo "<script>window.open('../checkout.php','_self')</script>";
}


include 'functions/function.php';
$con = new mysqli('localhost','root','','myshop');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Myshop_Account</title>
<link type="text/css" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet" media="all" />

<link type="text/css" href="styles/style.css" rel="stylesheet" media="all" /> 
</head>


<body>
	<!-- Main container Starts-->
    <div class="main_wrapper">
    	
      <div class="header_wrapper"><!-- header sec strt-->
       <a href="../index.php"><img src="../images/logo.png" style="float:left; padding-top:5px"/></a>
      </div><!-- header sec end-->
        
        <div id="navbar"><!--Navigation bar starts-->
        	<ul id="menu">
            	<li><a href="../index.php">Home</a></li>
                <li><a href="../all_products.php">All Products</a></li>
                <li><a href="my_account.php">My account</a></li>
                <?php
					if(isset($_SESSION['customer_email'])){
				
                echo"<span style='display:none;'<li><a href='../customer_register.php'>Sign Up</a></li></span>";
                }else{
					echo"<li><a href='../customer_register.php'>Sign Up</a></li>";
				}
				
				 ?>
                <li><a href="../cart.php">Shopping Cart</a></li>
                <li><a href="contact.php">Contact Us</a></li>
       
            <div id="" style="float:right;">
            	
                	
                	<div id="">
                    	
                    	<?php
						if(!isset($_SESSION['customer_email']))
						 {
						 	echo "<b>Welcome !</b>";
						 }else
						 {
							 echo "<b>Welcome".$_SESSION['customer_email']."</b>";	
						 }
						 
                            
                         if(!isset($_SESSION['customer_email']))
						 {
						 	echo "<a href='../checkout.php' style='color:#C03'>Login</a>";
						 }else
						 {
							 echo "<a href='../logout.php' style='color:#C03'>Logout</a>";	
						 }
						 ?>
                         
                    </div>
                 </div>
               
             </ul>
        </div><!--Navigation bar ends-->
        
        
      <div class="content_wrapper" style="background-image:url(../images/540212780.jpg);"><!--conent area starts-->
      
        	<div id="left_sidebar"><!-- left bar conent area-->
            	<div id="sidebar_title">Manage Account: </div>
                	<ul id="cats">
                    	<?php
							$user_mail = $_SESSION['customer_email'];
							$get_cus_pic = "select * from customers where customer_email = '$user_mail'";
							$run_mail = mysqli_query($con,$get_cus_pic);
							if($run_mail)
							{
							}
							else
							{
								echo"$con->error";
							}
							$row = mysqli_fetch_array($run_mail);
							
							$cust_pic = $row['customer_image'];
							echo "<div><img src='customer_photos/$cust_pic' width='180px' height='120px'></div>";
						?>
							                    
                    	<li><a href="my_account.php?my_orders">My Orders</a></li>
                        <li><a href="my_account.php?edit_account">Edit Account</a></li>
                        <li><a href="my_account.php?change_pass">Edit Password</a></li>
                        <li><a href="my_account.php?delete_account">Delete Account</a></li>
                        <li><a href="../logout.php">Logout</a></li>                 
                    </ul>
               
            
      	 	</div> <!--left bar conent area ends-->
                
             
            <div class="container" id="right_content"><!-- right bar conent area--> 
                
                <!--<div id="content-box"  style="margin: 0 auto;  display: table;">-->
                 	<h2 style="background:#000; color:#0FC ; padding:10px; text-align:center; border-top:2px solid #FFF ">Manage Your Acount</h2>
                    <?php
						getDefault();
					?>
                    <?php
					if(isset($_GET['my_orders']))
					{
						include("my_orders.php");
					}
					?>
                <!--</div>-->
                
                
                
                
            </div> <!--right bar conent area ends-->
        
           
       
        
        
      <div class="footer_area">
      		<h3 style="color:#000;padding-top:20px;text-align:center">&copy; by Sonu Sharma and Soyal Ahimed</h3>
            
      </div><!--footer sec-->
    
     </div><!--conent area ends-->

    </div> <!--Main container ends-->
    
</body>
</html>