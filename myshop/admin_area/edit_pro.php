 <?php include'../includes/db.php';
 if(isset($_GET['edit_pro']))
 {
	 $edit_id = $_GET['edit_pro'];
	 $get_edit = "select * from products where product_id='$edit_id'";
	 $run_edit = mysqli_query($con,$get_edit);
	 $row_edit = mysqli_fetch_array($run_edit);
	
	 $p_title = $row_edit['product_title'];
	 $cat_id = $row_edit['cat_id'];
	 
	 $brand_id = $row_edit['brand_id'];
	 $p_image1 = $row_edit['product_img1'];
	 $p_image2 = $row_edit['product_img2'];
	 $p_image3 = $row_edit['product_img3'];
	 $p_price = $row_edit['product_price'];
	 $p_desc = $row_edit['product_desc'];
	 
	 
	 $get_cat = "select * from catagory where cat_id='$cat_id'";
	 $run_cat = mysqli_query($con,$get_cat);
	 if(!$run_cat)
	 {
		 echo"$con->error";	 }
	 $row_cat = mysqli_fetch_array($run_cat);
	 $cat_title = $row_cat['cat_title'];
	
	
	 $get_brand = "select * from brands where brand_id='$brand_id'";
	 $run_brand = mysqli_query($con,$get_brand);
	 $row_brand = mysqli_fetch_array($run_brand);
	 $brand_title = $row_brand['brand_title'];

 }
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
	<form  method="post" enctype="multipart/form-data">
      <table class="table" width="700" border="1" align="center">
        <tr>
          <td height="60" colspan="2"><div align="center">
            <h1>Edit Products</h1>
          </div></td>
        </tr>
        <tr>
          <td width="200"><div align="right">Product Name:</div></td>
          <td width="500"><input name="p_name" type="text"  value="<?php echo $p_title; ?>" id="p_name" size="50" /></td>
        </tr>
        <tr>
          <td><div align="right">Product Catagory:</div></td>
          <td><select name="p_cat" >
          	<option value="<?php echo $cat_id; ?>"><?php echo $cat_title; ?></option>
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
          	  <option value="<?php echo $brand_id; ?>"><?php echo $brand_title; ?></option>
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
          <td><input type="file" name="image1" value ="<?php echo $p_image1 ?>" id="image1" /><img src="prod_image/<?php echo $p_image1 ?>" /></td>
        </tr>
        <tr>
          <td><div align="right">Product Image 2:</div></td>
          <td><input type="file" name="image2" value="<?php echo $p_image2 ?>" id="image2" /><img src="prod_image/<?php echo $p_image2 ?>" /></td>
        </tr>
        <tr>
          <td><div align="right">Product Image 3:</div></td>
          <td><input type="file" name="image3" value="<?php echo $p_image3 ?>" id="image3" /><img src="prod_image/<?php echo $p_image3 ?>" /></td>
        </tr>
        <tr>
          <td><div align="right">Product Price :</div></td>
          <td><input type="text" name="price"  value="<?php echo $p_price; ?>" id="price" /></td>
        </tr>
        <tr>
          <td><div align="right">Product Description:</div></td>
          <td><textarea name="pro_desc"  id="pro_desc" cols="45" rows="5"><?php echo $p_desc; ?></textarea></td>
        </tr>
        <tr>
          <td><div align="right">Product Keywords:</div></td>
          <td><input name="prod_keywords" type="text" id="prod_keywords" size="50" /></td>
        </tr>
        <tr>
          <td colspan="2"><div align="center">
            <input type="submit" name="update_prod" id="submit" value="Update" />
          </div></td>
        </tr>
      </table>
  </form>
</div>

</body>
<?php
	if(isset($_POST['update_prod'])){
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
		
		
		$prod_insert_quer = "update products set cat_id='$prod_cat',brand_id='$prod_brand',
		date=NOW(),product_title='$prod_title',product_img1='$prod_imag1',product_img2='$prod_imag2',product_img3='$prod_imag3',
		product_price='$prod_price',product_desc='$prod_desc' where product_id='$edit_id'"; 
		$run_product = mysqli_query($con,$prod_insert_quer);
		
		
		if($run_product){
			
			echo"<script>window.open('adindex.php?view_products','_self')";
			echo"<script>alert('Product Updated !!!')</script>";
			
	
		}
		else{
			echo"aila error".$con->error;
			echo"<script>alert('Product NOt Updated!!! $con->error')</script>";
			exit();
		}
		}
	}
?>


</html>