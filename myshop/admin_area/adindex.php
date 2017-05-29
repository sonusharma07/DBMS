<?php
session_start();
include '../functions/function.php';
if(!isset($_SESSION['admin_email']))
{
	echo "<script>window.open('adminlogin.php','_self')</script>";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<!--<link href='//fonts.googleapis.com/css?family=Iceland' rel='stylesheet'>-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin_index</title>
<link type="text/css" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet" media="all" />

<link type="text/css" href="styles/admincss.css" rel="stylesheet" media="all" />

</head>


<body>
	<!-- Main container Starts-->
    <div class="main_wrapper">
    	
      <div class="header_wrapper"><!-- header sec strt-->
       	<a href="adindex.php"><img src="../images/logo.png" style="float:left; padding-top:5px"/></a>
      </div><!-- header sec end-->
        
        <div id="navbar"><!--Navigation bar starts-->
        	<ul id="menu">
            	<li><a href="../index.php">Home</a></li>
                <li><a href="#">Contact Us</a></li>
                
                
                
                <!--heading cart-->
                <div id="" style="float:right;">
                	
                	<div id="">
                    	<span>
                    	<?php
						if(!isset($_SESSION['admin_email']))
						 {
						 	echo "<b>Welcome !</b>";
						 }else
						 {
							 echo "<b>Welcome ".$_SESSION['admin_email']."</b>";	
						 }
						 ?>
                       
                         <?php  
                         if(!isset($_SESSION['admin_email']))
						 {
						 	echo "<a href='adminlogin.php' style='color:#C03'>Login</a>";
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
                    	<li><a href="adindex.php?insert_product">Insert New Product</a></li>
                        <li><a href="adindex.php?view_products">ViewAll Products</a></li>
                        <li><a href="adindex.php?insert_cat">Insert New Catagory</a></li>
                        <li><a href="adindex.php?view_cats">View All Catagory</a></li>
                        <li><a href="adindex.php?insert_brands">Insert New Brands</a></li>
                        <li><a href="adindex.php?view_brands">View All Brands</a></li>
                        <li><a href="adindex.php?view_customers">View Customers</a></li> 
                        <li><a href="adindex.php?view_orders">View Orders</a></li>
                        <li><a href="adindex.php?view_payments">View_payments</a></li> 
                        <li><a href="Logout.php">Admin Logout</a></li>              
                    </ul>
              
       </div> <!--left bar conent area ends-->
            
            <div class="container" id="right_content"><!-- right bar conent area-->
            	
               
                
                <div class="row" id = "content-box" >
                 <?php
				 	if(isset($_GET['insert_product']))
					{
						include("insert_products.php");
					}
					
					if(isset($_GET['view_products']))
					{
						include("view_products.php");
					}
					if(isset($_GET['edit_pro']))
					{
						include("edit_pro.php");
					}
					if(isset($_GET['insert_cat']))
					{
						include("insert_cat.php");
					}
					if(isset($_GET['view_cats']))
					{
						include("view_cats.php");
					}
					if(isset($_GET['edit_cat']))
					{
						include("edit_cat.php");
					}
					if(isset($_GET['delete_cat']))
					{
						include("delete_cat.php");
					}
					if(isset($_GET['insert_brands']))
					{
						include("insert_brands.php");
					}
					if(isset($_GET['view_brands']))
					{
						include("view_brands.php");
					}
					if(isset($_GET['edit_brand']))
					{
						include("edit_brand.php");
					}
					if(isset($_GET['delete_brand']))
					{
						include("delete_brand.php");
					}
					if(isset($_GET['view_customers']))
					{
						include("view_cust.php");
					}
					if(isset($_GET['view_orders']))
					{
						include("view_orders.php");
					}
					if(isset($_GET['view_payments']))
					{
						include("view_payments.php");
					}
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