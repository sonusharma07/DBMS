<?php
session_start();
include 'functions/function.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cart</title>
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
                <li><a href="customers/my_account.php">Account</a></li>
                <li><a href="#">Contact Us</a></li>
       
        <!--heading cart-->
                <div id="" style="float:right;">
                	
                	<div id="">
                    	<?php
							$ip = getRealIpAddr();
							//echo $ip;
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
                        <span>- Item:<?php cart_item() ?>- Price:<?php total_price() ?> -<a href="index.php" style="color:#999">got to Shop</a> <?php 
                            
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
            	<div class="heading">
                	
                	<div id="headline_content">
                    	<?php
							
							cart();
						?>
                    	
                    </div>
                    
                </div>
                
                
                <div id = "content-box" style=" margin:0 auto; display:table;"  >
                <form action="cart.php" method="post" enctype="multipart/form-data">
                    <br/>
                    <br/>
                    <div class="form-group">
                 	<table class="table table-bordered" width="720px;" >
                    	<thead class="thead-inverse">
                        <tr  style="">
                        	<td>Remove</td>
                        	<td>Products</td>
                            <td>Initial Amt</td>
                            <td>Quantity</td>
							<td>TotalPrice</td>
                        </tr>
                        </thead>
                        
    <?php                    
                        $total = "";
	
	$ip_add = getRealIpAddr();
	$cart_price = "select * from products JOIN cart  ON cart.ip_add = '$ip_add' AND products.product_id = cart.p_id";
	$run_check = mysqli_query($con,$cart_price);
	while($row_price = mysqli_fetch_array($run_check))
	{
		$i=0;
		$pro_price = array($row_price['product_price']);
		$int_value = array_sum($pro_price);
		
		$pro_title = $row_price['product_title'];
		$pro_img = $row_price['product_img1'];
		$prod_id = $row_price['product_id'];
		
		$total += $int_value;
	
	
    ?>                    
                        
                        
                        <tr>
                        	<td><input type="checkbox" name="remove[]" value="<?php echo "$prod_id"; ?>"/></td>
                            <td><?php echo "$pro_title"; ?><br/> <img src="admin_area/prod_image/<?php echo"$pro_img"; ?>" height="80" width="80"/></td>
                            
                            <td><?php echo "$int_value";?></td>
                            <td><input type="text" name ="qnty[<?php echo "$prod_id"; ?>]" value="<?php $qy ="select * from cart where p_id='$prod_id'";
                            $qy_run = mysqli_query($con,$qy); $arr = mysqli_fetch_array($qy_run); $v = $arr['qty']; echo "$v";?>" size="3"/></td>
                            


                            <?php
								if(isset($_POST['update']))
								{
                                    $val_array = array();
                                    
									$total="";
                                   $qn  = $_POST['qnty'];
                                    //print_r($qn);
                                    

                                    $pd = "select * from cart";
                                    $run_pd = mysqli_query($con,$pd);
                                    while($pd_row = mysqli_fetch_array($run_pd))
                                    {
                                        $p_id = $pd_row['p_id'];
                                         $qt_pid = $qn[$p_id];
                                         $q = "update cart set qty='$qt_pid' where p_id='$p_id'";
                                         $run_q = mysqli_query($con,$q);
                                       
                                         $item_price = "select * from products where  products.product_id = '$p_id'";
                                         $run_price = mysqli_query($con,$item_price);
                                         $price_row = mysqli_fetch_array($run_price);
                                         $price = $price_row['product_price'];
                                         $value = $price*$qt_pid;
                                         array_push($val_array, $value);
                                        // print_r($val_array);

                                         $a = "update cart set amnt='$value' where p_id='$p_id'";
                                         $run_q = mysqli_query($con,$a);
                                         //echo"$value";
                                         $total = $total+$value;
                                         //echo "$total";
                                         
                                    }        





                                    //$item_price = "select * from cart,products where cart.ip_add = '$ip_add' AND products.product_id = cart.p_id";
                                    //$run_price = mysqli_query($con,$run_price);
									
                                    
                                    //while($arr = mysqli_fetch_array($run_price)) 
                                    //{
                                     //   $pid = $arr['product_id'];

                                     //   $qty_cart = select *
                                    //}



                                    //echo"$qn";
                                    //echo "$value";
									//$q = "update cart set qty='$qn' where ip_add='$ip_add'";
									//$run_q = mysqli_query($con,$q);
									//$total = $total*$qn;
                                    
								}
							?>
                        <td><input type="text" name ="amt" value="<?php $amt ="select * from cart where p_id='$prod_id'";
                            $amt_run = mysqli_query($con,$amt); $arr = mysqli_fetch_array($amt_run); $v = $arr['amnt']; echo "$v";?>" size="3" disabled/></td>
                        </tr>
                        
                        
                        
                        <?php } ?>
                        <tr >
                        	<td>Sub Total</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?php echo "$total";?></td>
                        </tr> 
                        
                        
                        <tr >
                            <td></td>
                        	<td align="right"><input type="submit" name = "update" value ="Update"/></td>
                            <td align="right"><input type="submit" name = "Continue" value ="Continue Shop"/></td>
                            <td align="right"><button><a href="checkout.php">checkout</a></button></td>
                            <td></td>
                        </tr> 
                    </table>
                    </div>
 </form>
 
 </br>
 
 <?php
 function updateme()
 {
 if(isset($_POST['update']))
 {
	global $con;
	 foreach($_POST['remove'] as $rm)
	 {
		 $rm_pro = "delete from cart where p_id='$rm'";
		 $run_rm = mysqli_query($con,$rm_pro);
		 if($run_rm)
		 {
			 echo" <script>window.open('cart.php',_self)</script>";
		 }else
		 {
			 echo"$con->error";
		 }
	 }
	 
 }
 
  if(isset($_POST['Continue']))
  {
	   
	 echo" <script>window.open('index.php','_self')</script>";  
  }
 }
 
 echo @$upd= updateme();
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