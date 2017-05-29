	<?php
                    	$brand_query = "select * from brands";
                        $run_brand= mysqli_query($con,$brand_query);
                        
        				while($brand_row = mysqli_fetch_array($run_brand)){
                        	$brand_id = $brand_row['brand_id'];
                            $brand_name = $brand_row['brand_title'];
                        	echo "<li><a href='index.php?brand = $brand_id'>$brand_name</a></li>";
                   	    }                
    ?>