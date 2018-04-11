<?php
//login.php

require_once 'includes/global.inc.php';

$error = "";
$username = "";
$password = "";

//check to see if they've submitted the login form
if(isset($_POST['submit-login'])) { 

	$username = $_POST['username'];
	$password = $_POST['password'];

	$userTools = new UserTools();
	if($userTools->login($username, $password)){ 
		//successful login, redirect them to a page
		header("Location: dashboard.php");
	}else{
		$error = "Incorrect username or password. Please try again.";
	}
}
?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<!--<link rel="stylesheet" href="indexPageCSS.css">
<link rel="stylesheet" href="sideNav.css">-->
<link rel="stylesheet" href="simpleCSS.css">
<link rel="stylesheet" href="formLOGIN.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300">
<link rel="stylesheet" href="bootstrap/bootstrap/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<html>
<head>
	<title>Login</title>
</head>
<body>

<!-- end navbar -->
	 <?php include("sideBar.php"); ?>
	<div class="container">
            <div class="row"> 
				<div class="center-block">
					<div>
						<h1 id="titleName">Time Capsule LOGIN</h1>
					</div>
				</div>
            </div>
           
    </div>
<?php
if($error != "")
{
    echo $error."<br/>";
}
?>
	
	<!--<form action="login.php" method="post">
			Username: <input type="text" name="username" value="<?php echo $username; ?>" /><br/>
			Password: <input type="password" name="password" value="<?php echo $password; ?>" /><br/>
			<input type="submit" value="Login" name="submit-login" />
			<a href="index.php">Home</a>
	</form>-->
	<form action="login.php" method="post">
		<div class="form-group">
			<label for="exampleInputUsername1">Username</label>
			<input type="text" class="form-control" id="exampleInputUsername1" placeholder="Username" name="username" value="<?php echo $username; ?>">
		</div>
		<div class="form-group">
			<label for="exampleInputPassword1">Password</label>
			<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" value="<?php echo $password; ?>">
		</div>
		<button type="submit" class="btn btn-primary" value="Login" name ="submit-login">Submit</button>
	</form>
		

	
</body>
</html>