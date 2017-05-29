<?php
session_start();
include'../includes/db.php';

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AdminLogin</title>
<link type="text/css" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet" media="all" />

<link type="text/css" href="styles/adminlogincss.css" rel="stylesheet" media="all" />
</head>

<body>

<!-- This is a very simple parallax effect achieved by simple CSS 3 multiple backgrounds, made by http://twitter.com/msurguy -->
<div class="container">
	<div class="row flipeffect" style="margin-top:80px;">
		<div class="col-md-4 col-md-offset-4 panel front">
			<form method="POST" action="" accept-charset="UTF-8" role="form" id="loginform" class="form-signin">			  
        <fieldset>
			  	<h2>Please sign in As admin</h2>
				    <input class="form-control" placeholder="E-mail" name="email" type="text">				    	
            <input class="form-control" placeholder="Password" name="password" type="password" value="">					
            <div class="checkbox">
              <label><input name="remember" type="checkbox" value="Remember Me"> Remember Me</label>
            </div>
				    <input class="btn btn-lg btn-primary btn-block" type="submit" name="admin_login" value="Admin Login">				    
           
		  	</form>		
		</div>
  	</div>
</div>
</body>
</html>
<?php
if(isset($_POST['admin_login']))
{
	$user_email = $_POST['email'];
	$user_pass = $_POST['password'];
	
	$sel_admin = "select * from admins where admin_email='$user_email' AND admin_pass='$user_pass'";
	$run_admin = mysqli_query($con,$sel_admin);
	$num_admin = mysqli_num_rows($run_admin);
	
	if($run_admin==1)
	{
		$_SESSION['admin_email']=$user_email;
		echo"<script>window.open('adindex.php?logged_in','_self')</script>";
	}
	else
	{
		echo"<script>alert('Something Went Wrong!!!')</script>";
	}
}
?>
