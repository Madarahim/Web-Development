<?php 
//register.php

require_once 'includes/global.inc.php';

//initialize php variables used in the form
$username = "";
$fname="";
$lname ="";
$password = "";
$password_confirm = "";
$email = "";
$error = "";

//check to see that the form has been submitted
if(isset($_POST['submit-form'])) { 

	//retrieve the $_POST variables
	$username = $_POST['username'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$password = $_POST['password'];
	$password_confirm = $_POST['password-confirm'];
	$email = $_POST['email'];

	//initialize variables for form validation
	$success = true;
	$userTools = new UserTools();
	
	//validate that the form was filled out correctly
	//check to see if user name already exists
	if($userTools->checkUsernameExists($username))
	{
	    $error .= "That username is already taken.<br/> \n\r";
	    $success = false;
	}

	//check to see if passwords match
	if($password != $password_confirm) {
	    $error .= "Passwords do not match.<br/> \n\r";
	    $success = false;
	}

	if($success)
	{
	    //prep the data for saving in a new user object
	    $data['username'] = $username;
		$data['fname'] = $fname;
		$data['lname'] = $lname;
	    $data['password'] = md5($password); //encrypt the password for storage
	    $data['email'] = $email;
	
	    //create the new user object
	    $newUser = new User($data);
	
	    //save the new user to the database
	    $newUser->save(true);
	
	    //log them in
	    $userTools->login($username, $password);
	
	    //redirect them to a welcome page
	    header("Location: welcome.php");
	    
	}

}

//If the form wasn't submitted, or didn't validate
//then we show the registration form again
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
	<title>Registration</title>
</head>
<body>
<!-- end navbar -->
	<?php include("sideBar.php"); ?>
	<div class="container">
            <div class="row"> 
				<div class="center-block">
					<div>
						<h1 id="titleName">Event Share Register</h1>
					</div>
				</div>
            </div>
           
    </div>
	<?php echo ($error != "") ? $error : ""; ?>
	
	<!--<form action="register.php" method="post">
	Fisrtname: <input type="text" value ="<
	Username: <input type="text" value="<//?php echo $username; ?>" name="username" /><br/>
	Password: <input type="password" value="<//?php echo $password; ?>" name="password" /><br/>
	Password (confirm): <input type="password" value="<//?php echo $password_confirm; ?>" name="password-confirm" /><br/>
	E-Mail: <input type="text" value="<//?php echo $email; ?>" name="email" /><br/>
	<input type="submit" value="Register" name="submit-form" />
	<a href="index.php">Home</a>
	
	</form>
	-->
	<form action="register.php" method="post">
		<div class="form-group">
			<label for="exampleInputName1">First Name:</label>
			<input type="text" class="form-control" id="exampleInputName1" placeholder="First Name" value="<?php echo $fname; ?>" name="fname">
		</div>
		<div class="form-group">
			<label for="exampleInputName1">Last Name:</label>
			<input type="text" class="form-control" id="exampleInputName1" placeholder="Last Name" value="<?php echo $lname; ?>" name="lname">
		</div>
		<div class="form-group">
			<label for="exampleInputUsername1">Username:</label>
			<input type="text" class="form-control" id="exampleInputUsername1" placeholder="Username" value="<?php echo $username; ?>" name="username">
		</div>
		<div class="form-group">
			<label for="exampleInputPassword1">Password:</label>
			<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" value="<?php echo $password; ?>" name="password">
		</div>
		<div class="form-group">
			<label for="exampleInputPassword1">Confirm Password:</label>
			<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" value="<?php echo $password_confirm; ?>" name="password-confirm">
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">Email:</label>
			<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Email" value="<?php echo $email; ?>" name="email" >
		</div>
		<button type="submit" class="btn btn-primary" value="Register" name="submit-form">Submit</button>
		<a href="index.php">Home</a>
	</form>
</body>
</html>