<?php
	$con = new mysqli('localhost','root','','myshop');
	
	function getCat(){
		global $con;
		$cat_query = "select * from catagory";
                        $run_cat= mysqli_query($con,$cat_query);
                        
        				while($cat_row = mysqli_fetch_array($run_cat)){
                        	$cat_id = $cat_row['cat_id'];
                            $cat_name = $cat_row['cat_title'];
                        	echo "<li><a href='index.php?cat=$cat_id'>$cat_name</a></li>";
                        }  
	}
	
	
	
	function getBrand(){
		global $con;
		$brand_query = "select * from brands";
                       $brand_query = "select * from brands";
                        $run_brand= mysqli_query($con,$brand_query);
                        
        				while($brand_row = mysqli_fetch_array($run_brand)){
                        	$brand_id = $brand_row['brand_id'];
                            $brand_name = $brand_row['brand_title'];
                        	echo "<li><a href='index.php?brand=$brand_id'>$brand_name</a></li>";
                   	    }   
	}
	
	function getProduct(){
						global $con;
					if(!isset($_GET['cat'])){
						if(!isset($_GET['brand'])){
						$content_disp = "select * from products order by rand() LIMIT 0,6 ";
						$run_prod = mysqli_query($con,$content_disp);
						if($run_prod){
						while($prod_detail= mysqli_fetch_array($run_prod)){
							$pro_id = $prod_detail['product_id'];
							$pro_title = $prod_detail['product_title'];
							$pro_price = $prod_detail['product_price'];
							$pro_cat = $prod_detail['cat_id'];
							$pro_img = $prod_detail['product_img1'];
							$pro_desc = $prod_detail['product_desc'];
							$pro_brand = $prod_detail['brand_id'];
							
							echo "
								
								<div id = 'single_product'>
									<p>$pro_title</p>
									<img src='admin_area/prod_image/$pro_img' height='180' width = '180'/></br>
									<p><b> Price : $$pro_price</b></p>
									<div id='price' style='clear:both'>
									<a href='details.php?pro_id=$pro_id' style='float:left'>Details</a>
									<a href='index.php?add_cart=$pro_id' style='float:right'><button>Add Cart</button></a>
									</div>								
								</div>
								
							";
					}
						} else{
							echo"$con->error";
						}
						
//product_id  
//cat_id
//rand_id
//date
//product_title
///product_img1
//product_img2
//product_img3
////product_price
//product_desc
///status
					}
					}
				
	}
	
	function getCatproduct(){
		global $con;
		if(isset($_GET['cat'])){
						$cata = $_GET['cat']; 
						$content_disp = "select * from products where cat_id = '$cata' order by rand() LIMIT 0,6 ";
						$run_prod = mysqli_query($con,$content_disp);
						if(!mysqli_num_rows($run_prod)){
							echo"<h1>No Products</h1>";		
						}
						if($run_prod){
						while($prod_detail= mysqli_fetch_array($run_prod)){
							$pro_id = $prod_detail['product_id'];
							$pro_title = $prod_detail['product_title'];
							$pro_price = $prod_detail['product_price'];
							$pro_cat = $prod_detail['cat_id'];
							$pro_img = $prod_detail['product_img1'];
							$pro_desc = $prod_detail['product_desc'];
							$pro_brand = $prod_detail['brand_id'];
							
							echo "
								
								<div id = 'single_product'>
									<p>$pro_title</p>
									<img src='admin_area/prod_image/$pro_img' height='180' width = '180'/></br>
									<p><b> Price : $$pro_price</b></p>
									<div id='price' style='clear:both'>
									<a href='details.php?pro_id=$pro_id' style='float:left'>Details</a>
									<a href='index.php?add_cart=$pro_id' style='float:right'><button>Add Cart</button></a>
									</div>								
								</div>
								
							";
						}
						}else{
							echo"$con->error";
						}
				}
				
					
		}
		
		function getBrandproduct(){
		global $con;
		if(isset($_GET['brand'])){
						$brand = $_GET['brand']; 
						$content_disp = "select * from products where brand_id = '$brand' order by rand() LIMIT 0,6 ";
						$run_prod = mysqli_query($con,$content_disp);
						if(!mysqli_num_rows($run_prod)){
							echo"<h1>No Products</h1>";		
						}
						if($run_prod){
						while($prod_detail= mysqli_fetch_array($run_prod)){
							$pro_id = $prod_detail['product_id'];
							$pro_title = $prod_detail['product_title'];
							$pro_price = $prod_detail['product_price'];
							$pro_cat = $prod_detail['cat_id'];
							$pro_img = $prod_detail['product_img1'];
							$pro_desc = $prod_detail['product_desc'];
							$pro_brand = $prod_detail['brand_id'];
							
							echo "
								
								<div id = 'single_product'>
									<p>$pro_title</p>
									<img src='admin_area/prod_image/$pro_img' height='180' width = '180'/></br>
									<p><b> Price : $$pro_price</b></p>
									<div id='price' style='clear:both'>
									<a href='details.php?pro_id=$pro_id' style='float:left'>Details</a>
									<a href='index.php?add_cart=$pro_id' style='float:right'><button>Add Cart</button></a>
									</div>								
								</div>
								
							";
						}
						}else{
							echo"$con->error";
						}
				}
				
					
		}
		
		
		
		function getAllproduct(){
						global $con;
					
						$content_disp = "select * from products  ";
						$run_prod = mysqli_query($con,$content_disp);
						if($run_prod){
						while($prod_detail= mysqli_fetch_array($run_prod)){
							$pro_id = $prod_detail['product_id'];
							$pro_title = $prod_detail['product_title'];
							$pro_price = $prod_detail['product_price'];
							$pro_cat = $prod_detail['cat_id'];
							$pro_img = $prod_detail['product_img1'];
							$pro_desc = $prod_detail['product_desc'];
							$pro_brand = $prod_detail['brand_id'];
							
							echo "
								
								<div id = 'single_product'>
									<p>$pro_title</p>
									<img src='admin_area/prod_image/$pro_img' height='180' width = '180'/></br>
									<p><b> Price : $$pro_price</b></p>
									<div id='price' style='clear:both'>
									<a href='details.php?pro_id=$pro_id' style='float:left'>Details</a>
									<a href='index.php?add_cart=$pro_id' style='float:right'><button>Add Cart</button></a>
									</div>								
								</div>
								
							";
					}
						} else{
							echo"$con->error";
						}
						
						}
						
						
						
		function getDetailsProduct(){
						global $con;
						if(isset($_GET['pro_id'])){
							$pid = $_GET['pro_id'];		
							$content_disp = "select * from products where product_id = '$pid'  ";
							$run_prod = mysqli_query($con,$content_disp);
							if($run_prod){
								while($prod_detail= mysqli_fetch_array($run_prod)){
									$pro_id = $prod_detail['product_id'];
									$pro_title = $prod_detail['product_title'];
									$pro_price = $prod_detail['product_price'];
									$pro_cat = $prod_detail['cat_id'];
									$pro_img = $prod_detail['product_img1'];
									$pro_img = $prod_detail['product_img2'];
									$pro_img = $prod_detail['product_img3'];
									$pro_desc = $prod_detail['product_desc'];
									$pro_brand = $prod_detail['brand_id'];
									
									echo "
										
										<div id = 'single_product'>
											<p>$pro_title</p>
											<img src='admin_area/prod_image/$pro_img' height='180' width = '180'/>
											<img src='admin_area/prod_image/$pro_img' height='180' width = '180'/>
											<img src='admin_area/prod_image/$pro_img' height='180' width = '180'/></br>
											
											<p><b> Price : $$pro_price</b></p>
											
											<p><b>$pro_desc</b></p>
											<div id='price' style='clear:both'>
											<a href='index.php?pro_id=$pro_id' style='float:left'>Back</a>
											<a href='index.php?add_cart=$pro_id' style='float:right'><button>Add Cart</button></a>
											</div>								
										</div>
										
									";
								}
						}else{
							echo"$con->error";
						}
						
						}
						
		}
		
function getRealIpAddr()
{
	if(!empty($_SERVER['HTTP_CLIENT_IP']))
	//check ip from share internet
	{
		$ip = $_SERVER['HTTP_CLIENT_IP'];
	}
	else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
	{
		//to check ip is pass from proxy
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	}
	else
	{
		$ip = $_SERVER['REMOTE_ADDR'];
	}
	return $ip;
						
}





//default things account

function getDefault()
{
	global $con;
	$c = $_SESSION['customer_email'];
	$get_c = "select * from customers where customer_email='$c'";
	$run_c = mysqli_query($con,$get_c);
	$row = mysqli_fetch_array($run_c);
	
		$cus_id = $row['customer_id'];
		if(!isset($_GET['my_orders'])){
			if(!isset($_GET['edit_account'])){
				if(!isset($_GET['change_pass'])){
					if(!isset($_GET['delete_account'])){
					
					$get_orders = "select * from customer_orders where customer_id='$cus_id' AND order_status = 'Pending'";
					
					$run_orders = mysqli_query($con,$get_orders);
					$count_orders = mysqli_num_rows($run_orders);
					if(!$run_orders){
						echo"$con->error";
					}
					if($count_orders >0){
						echo"
						<div style='padding:10px;'></div>
						<h3 style='color:red'>Important!</h3>
						<h3>You have $count_orders Pending orders</h3>
						<h3>View oreder details <a href='my_account.php?my_orders'>LINK</a></h3>
						<h3><a href='payoffline.php'>Pay OffLine</a></h3> 
						</div>
						";
					}
	}
}
}
}


	
}
function cart()
{
	if(isset($_GET['add_cart'])){
		global $con;
		
		$p_id = $_GET['add_cart'];
		$ip_add = getRealIpAddr();
		$check_pro = "select * from cart where ip_add='$ip_add' AND p_id = '$p_id'";
		$run_check = mysqli_query($con,$check_pro);
		if(mysqli_num_rows($run_check)>0)
		{
			
		}else
		{
			global $con;
			$q = "insert into cart(p_id,ip_add) values ('$p_id','$ip_add')";
			$run_q = mysqli_query($con,$q);
			echo "<script>window.open('index.php','_self')</script>";
		}
	}
}

function cart_item()
{
		global $con;
		if(isset($_GET['add_cart']))
		{
			$ip_add = getRealIpAddr();
			$check_item = "select * from cart where ip_add = '$ip_add'";
			$run_check = mysqli_query($con,$check_item);
			$value = mysqli_num_rows($run_check);
			
		}else{
			$ip_add = getRealIpAddr();
			$check_item = "select * from cart where ip_add = '$ip_add'";
			$run_check = mysqli_query($con,$check_item);
			$value = mysqli_num_rows($run_check);
			
		}
		echo "$value";
}

function total_price()
{
	$total = "";
	global $con;
	$ip_add = getRealIpAddr();
	$cart_price = "select * from cart,products where cart.ip_add = '$ip_add' AND products.product_id = cart.p_id";
	$run_check = mysqli_query($con,$cart_price);
	while($row_price = mysqli_fetch_array($run_check))
	{
		
		$pro_price = array($row_price['product_price']);
		$value = array_sum($pro_price);
		$total += $value;
	}
	echo "$total";
}


?>