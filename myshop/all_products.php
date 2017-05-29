<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Myshop_All_products</title>
<link type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet" media="all" />
<link type="text/css" href="styles/style.css" rel="stylesheet" media="all" />
</head>

<?php
include 'functions/function.php';
?>
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
                <li><a href="checkout.php">Sign Up</a></li>
                <li><a href="cart.php">Shopping Cart</a></li>
                <li><a href="#">Contact Us</a></li>
        <!--heading cart-->
                <div id="" style="float:right;">
                	
                	<div id="">
                    	<?php
							$ip = getRealIpAddr();
							echo $ip;
							cart();
						?>
                    	<?php
						if(!isset($_SESSION['customer_email']))
						 {
						 	echo "<b>Welcome !</b>";
						 }else
						 {
							 echo "<b>Welcome".$_SESSION['customer_email']."</b>";	
						 }
						 ?>
                        <b style="color:#FFF;">Your Cart</b>
                        <span>- Item:<?php cart_item() ?>- Price:<?php total_price() ?> -<a href="cart.php" style="color:#999">got to Cart</a> <?php 
                            
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
            
            <div class="container" id="right_content"><!-- right bar conent area-->
            	
                
                
                <div class='row' id="content-box">
                 	<?php
						//getProduct();
						getAllproduct();
						getCatproduct();
						getBrandproduct();
					?>
                </div>
                
                
                
                
            </div> <!--right bar conent area ends-->
        
       
        
        
      <div class="footer_area">
      		<h3 style="color:#000;padding-top:20px;text-align:center">&copy; by Sonu Sharma and Soyal Ahimed</h3>
      </div><!--footer sec-->
    
    
     </div><!--conent area ends-->
    
    
    
    
    </div>
    <!--Main container ends-->
</body>
</html>