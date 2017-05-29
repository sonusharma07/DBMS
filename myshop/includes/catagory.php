 <?php
 						
                    	$cat_query = "select * from catagory";
                        $run_cat= mysqli_query($con,$cat_query);
                        
        				while($cat_row = mysqli_fetch_array($run_cat)){
                        	$cat_id = $cat_row['cat_id'];
                            $cat_name = $cat_row['cat_title'];
                        	echo "<li><a href='index.php?cat = $cat_id'>$cat_name</a></li>";
                        }                
?>