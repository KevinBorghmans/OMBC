<?php
session_start();
include_once '../includes/dbconnect.php';

if (!isset($_SESSION['userSession'])) {
	header("Location: ../index.php");
}

$query = $DBcon->query("SELECT * FROM tbl_users WHERE user_id=".$_SESSION['userSession']);
$userRow=$query->fetch_array();
$DBcon->close();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome - <?php echo $userRow['email']; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"> 
<link href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> 

<link rel="stylesheet" href="../css/adminpanel.css" type="text/css" />
</head>
<body>

        <nav>
        	<div class="logo">
        		<img class="img-size" src="../img/logo.png" alt="logo"/>
        	</div>
        	<div class="adminpanel">
	        	<h1></h1>
        	</div>
        </nav>

<aside>
	
          <ul style="padding: 0px;">
          		<li><img class="user-img-size" src="../img/Bart.png" alt="user" />
<h3 class="text-center"><?php echo $userRow['username']; ?></h1></li>
          		
            <li><h5 style="color: white; text-align: center;"><a href="../includes/logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp; Logout</a></h3></li>
        	</ul>
        	
    <ul style="padding-top: 50px; text-decoration: none; list-style-type:none;">
	    <li style="padding-bottom: 5px; "><a href=""><h4>Algemeen</h4></a></li>
	    <li><a href=""><h4>Club</h4></a></li>
    </ul>
</aside>
	
	
</div>

</body>
</html>