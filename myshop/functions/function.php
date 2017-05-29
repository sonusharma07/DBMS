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
								
								<div class='col col-lg-4' id = 'single_product'>
									<p>$pro_title</p>
									<img src='admin_area/prod_image/$pro_img' height='180' width = '180'/></br>
									<p><b> Price : $$pro_price</b></p>
									<div id='price' style='clear:both'>
									<a href='details.php?pro_id=$pro_id'><button type='button' class='btn btn-primary'>Details</button></a>
									<a href='index.php?add_cart=$pro_id'><button type='button' class='btn btn-primary'>Add Cart</button></a>
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
								<div class='col col-lg-4' id = 'single_product'>
									<p>$pro_title</p>
									<img src='admin_area/prod_image/$pro_img' height='180' width = '180'/></br>
									<p><b> Price : $$pro_price</b></p>
									<div id='price' style='clear:both'>
									<a href='details.php?pro_id=$pro_id'><button type='button' class='btn btn-primary'>Details</button></a>
									<a href='index.php?add_cart=$pro_id'><button type='button' class='btn btn-primary'>Add Cart</button></a>
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
								
								<div class='col col-lg-4' id = 'single_product'>
									<p>$pro_title</p>
									<img src='admin_area/prod_image/$pro_img' height='180' width = '180'/></br>
									<p><b> Price : $$pro_price</b></p>
									<div id='price' style='clear:both'>
									<a href='details.php?pro_id=$pro_id'><button type='button' class='btn btn-primary'>Details</button></a>
									<a href='index.php?add_cart=$pro_id'><button type='button' class='btn btn-primary'>Add Cart</button></a>
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
								
								<div class='col col-lg-4' id = 'single_product'>
									<p>$pro_title</p>
									<img src='admin_area/prod_image/$pro_img' height='180' width = '180'/></br>
									<p><b> Price : $$pro_price</b></p>
									<div id='price' style='clear:both'>
									<a href='details.php?pro_id=$pro_id'><button type='button' class='btn btn-primary'>Details</button></a>
									<a href='index.php?add_cart=$pro_id'><button type='button' class='btn btn-primary'>Add Cart</button></a>
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
											<a href='index.php?pro_id=$pro_id' style='float:left'><button type='button' class='btn btn-primary'>Back</button></a>
											<a href='index.php?add_cart=$pro_id' style='float:right'><button type='button' class='btn btn-primary'>Add Cart</button></a>
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

			$join_for_amnt = "select * from products where product_id='$p_id'";
			$run_join = mysqli_query($con,$join_for_amnt);
			if($run_join){
				$pr_arr = mysqli_fetch_array($run_join);
				$amt = $pr_arr['product_price'];

			}else{
				echo "$con->error";
			}



			$q = "insert into cart(p_id,ip_add,qty,amnt) values ('$p_id','$ip_add','1','$amt')";
			$run_q = mysqli_query($con,$q);
			if($run_q)
			{
				echo "<script>window.open('index.php','_self')</script>";
			}
			else
			{
				
				echo "$con->error";
			}

			
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