 <?php include'../includes/db.php'
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin-Area</title>
<!--<link type="text/css" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet" media="all" />-->
<!--<link type="text/css" href="styles/admincss.css" rel="stylesheet" media="all" />-->
 <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
</head>

<body>

<div>
	<form action="insert_products.php" method="post" enctype="multipart/form-data">
      <table class="table" width="700" border="1" align="center">
        <tr>
          <td height="60" colspan="2"><div align="center">
            <h1>Insert New Products</h1>
          </div></td>
        </tr>
        <tr>
          <td width="200"><div align="right">Product Name:</div></td>
          <td width="500"><input name="p_name" type="text" id="p_name" size="50" /></td>
        </tr>
        <tr>
          <td><div align="right">Product Catagory:</div></td>
          <td><select name="p_cat" >
          	<option>Select a Catogory</option>
          	<?php
 						
                    	$cat_query = "select * from catagory";
                        $run_cat= mysqli_query($con,$cat_query);
                        
        				while($cat_row = mysqli_fetch_array($run_cat)){
                        	$cat_id = $cat_row['cat_id'];
                            $cat_name = $cat_row['cat_title'];
                        	echo "<option value='$cat_id'>$cat_name</option>";
                        }                
			?>
          </select></td>
        </tr>
        <tr>
          <td><div align="right">Product Brand:</div></td>
          <td><select name="p_brand" >
          	  <option>Select a Brand</option>
          		<?php
                    	$brand_query = "select * from brands";
                        $run_brand= mysqli_query($con,$brand_query);
                        
        				while($brand_row = mysqli_fetch_array($run_brand)){
                        	$brand_id = $brand_row['brand_id'];
                            $brand_name = $brand_row['brand_title'];
                        	echo "<option value='$brand_id'>$brand_name</option>";
                   	    }                
    			?>
          </select></td>
        </tr>
        <tr>
          <td><div align="right">Product Image 1:</div></td>
          <td><input type="file" name="image1" id="image1" /></td>
        </tr>
        <tr>
          <td><div align="right">Product Image 2:</div></td>
          <td><input type="file" name="image2" id="image2" /></td>
        </tr>
        <tr>
          <td><div align="right">Product Image 3:</div></td>
          <td><input type="file" name="image3" id="image3" /></td>
        </tr>
        <tr>
          <td><div align="right">Product Price :</div></td>
          <td><input type="text" name="price" id="price" /></td>
        </tr>
        <tr>
          <td><div align="right">Product Description:</div></td>
          <td><textarea name="pro_desc" id="pro_desc" cols="45" rows="5"></textarea></td>
        </tr>
        <tr>
          <td><div align="right">Product Keywords:</div></td>
          <td><input name="prod_keywords" type="text" id="prod_keywords" size="50" /></td>
        </tr>
        <tr>
          <td colspan="2"><div align="center">
            <input type="submit" name="prod_insert" id="submit" value="Submit" />
          </div></td>
        </tr>
      </table>
  </form>
</div>

</body>
<?php
	if(isset($_POST['prod_insert'])){
		$prod_title = $_POST['p_name'];
		$prod_cat = $_POST['p_cat'];
		$prod_brand = $_POST['p_brand'];
		$prod_price = $_POST['price'];
		$prod_desc = $_POST['pro_desc'];
		$prod_keywords = $_POST['prod_keywords'];
		$status = "on";
		
		
		$prod_imag1 = $_FILES['image1']['name'];
		$prod_imag2 = $_FILES['image2']['name'];
		$prod_imag3 = $_FILES['image3']['name'];
		
		
		$temp_name1 = $_FILES['image1']['tmp_name'];
		$temp_name2 = $_FILES['image2']['tmp_name'];
		$temp_name3 = $_FILES['image3']['tmp_name'];
		
		if($prod_title == '' OR $prod_cat == '' OR $prod_brand =='' OR $prod_price =='' OR $prod_desc =='' OR $prod_keywords =='' OR						                 $prod_imag1 =='' OR $prod_imag2 =='' OR $prod_imag2=='' )
		{
			echo"<script>alert('Fill all the fields !!!')</script>";
			exit();
		}else{
		
		move_uploaded_file($temp_name1 , "prod_image/$prod_imag1");
		move_uploaded_file($temp_name2 , "prod_image/$prod_imag2");
		move_uploaded_file($temp_name3 , "prod_image/$prod_imag3");
		
		
		$prod_insert_quer = "insert into products(cat_id ,brand_id,date ,product_title,product_img1,product_img2,product_img3,product_price,product_desc,status) values( '$prod_cat' , '$prod_brand' ,NOW(),'$prod_title','$prod_imag1','$prod_imag2','$prod_imag3','$prod_price','$prod_desc' ,'$status')";
		$run_product = mysqli_query($con,$prod_insert_quer);
		
		
		if($run_product){
			
			echo"<script>window.open('adindex.php','_self')";
			echo"<script>alert('Product is Added !!!')</script>";
			
	
		}
		else{
			echo"aila error".$con->error;
			echo"<script>alert('Product NOt Added !!! $con->error')</script>";
			exit();
		}
		}
	}
?>


</html>