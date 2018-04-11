<?php 

require_once 'includes/global.inc.php';

//check to see if they're logged in
if(!isset($_SESSION['logged_in'])) {
	header("Location: login.php");
}

//get the user object from the session
$user = unserialize($_SESSION['user']);

//initialize php variables used in the form
$fname = $user->fname;
$lname = $user->lname;
$email = $user->email;
$message = "";

//check to see that the form has been submitted
if(isset($_POST['submit-settings'])) { 

	//retrieve the $_POST variables
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];

	$user->fname = $fname;
	$user->lname = $lname;
	$user->email = $email;
	$user->save();

	$message = "Settings Saved<br/>";
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
	<title>Account</title>
</head>
<body>
	<?php include("sideBar.php"); ?>
	<div class="container">
            <div class="row"> 
				<div class="center-block">
					<div>
						<h1 id="titleName">Account Settings</h1>
					</div>
				</div>
            </div>
           
    </div>
	<div style="color:white;"> <?php echo $message; ?></div>

	<!--<form action="settings.php" method="post">
	
	E-Mail: <input type="text" value="<//?php echo $email; ?>" name="email" /><br/>
	<input type="submit" value="Update" name="submit-settings" />
	
	</form>-->
	<form action="settings.php" method="post">
		<div class="form-group">
			<label for="exampleInputName1">First Name:</label>
			<input type="text" class="form-control" id="exampleInputName1" value="<?php echo $fname; ?>" name="fname">
		</div>
		<div class="form-group">
			<label for="exampleInputName1">Last Name:</label>
			<input type="text" class="form-control" id="exampleInputName1" value="<?php echo $lname; ?>" name="lname">
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">Email:</label>
			<input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $email; ?>" name="email">
		</div>
		<button type="submit" class="btn btn-primary" value="Update" name ="submit-settings">Save</button>
	</form>
</body>
</html>