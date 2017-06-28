<?php
session_start();
require_once 'includes/dbconnect.php';

if (isset($_SESSION['userSession'])!="") {
	header("Location: pages/home.php");
	exit;
}

if (isset($_POST['btn-login'])) {
	
	$email = strip_tags($_POST['email']);
	$password = strip_tags($_POST['password']);
	
	$email = $DBcon->real_escape_string($email);
	$password = $DBcon->real_escape_string($password);
	
	$query = $DBcon->query("SELECT user_id, email, password FROM tbl_users WHERE email='$email'");
	$row=$query->fetch_array();
	
	$count = $query->num_rows; // if email/password are correct returns must be 1 row
	
	if (password_verify($password, $row['password']) && $count==1) {
		$_SESSION['userSession'] = $row['user_id'];
		header("Location: pages/adminpanel.php");
	} else {
		$msg = "<div class='alert alert-danger'>
					<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Invalid Username or Password !
				</div>";
	}
	$DBcon->close();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Coding Cage - Login & Registration System</title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="button.js"></script>
<link rel="stylesheet" href="css/style.css" type="text/css" />
</head>
<body>

<div class="signin-form">

	<div class="container">
     
        
       <form method="post" id="login-form">
      
        <h2 class="form-signin-heading">Sign In</h2><hr />
        
        <?php
		if(isset($msg)){
			echo $msg;
		}
		?>
        
        <div class="group">
        <input type="email" name="email" required />
        <span class="highlight"></span>
		<span class="bar"></span>
		<label>E-mail</label>
        <span id="check-e"></span>
        </div>
        
        <div class="group">
        <input type="password" name="password" required />
         <span class="highlight"></span>
		<span class="bar"></span>
		<label>Password</label>
        </div>
       
        
        <div class="form-group">
            <button type="submit" class="button buttonBlue" name="btn-login" id="btn-login">
    		<span class="glyphicon glyphicon-log-in"></span> &nbsp; Login
    		
    		<div class="ripples buttonRipples"><span class="ripplesCircle"></span></div>
			</button> 
            
<!--             <a href="register.php" class="btn btn-default" style="float:right;">Sign UP Here</a> -->
            
        </div>  
        
        
      
      </form>

    </div>
    
</div>

</body>
</html>