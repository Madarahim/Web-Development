<!-- this php file saves new events to db-->
<?php 

require_once 'includes/global.inc.php';
require_once 'classes/event.class.php';
require_once 'usersevents.class.php';

//check to see if they're logged in
if(!isset($_SESSION['logged_in'])) {
	header("Location: youreventspage.php");
}
$userid = $user->id;
$username = $user->username;

//initialize php variables used in the form
$cname = "";
$ctype = "";
$cDateO = "";
$cDateC = "";
$message="";

$userTools = new UserTools();

if(isset($_POST['eSubmit'])){
	//retrieve the $_POST variables
	$cname = $_POST['cName'] + " Time Capsule";
	//$elocation = $_POST['StreetAddress'] . ', ' . $_POST['City'] . ', ' . $_POST['State'] . ' ' . $_POST['Zip'] ;
	//$eimage = $_POST['etype'];
	$ctype = $_POST['cType']; //type of files allowed to be uploaded
	$cDateC = $_POST['cDateClosed']; //date open
	$cDateO = $_POST['cDateOpened']; //date open
	//$eAnticipatedPeople = $_POST['eAnticipatedPeople'];

	//prep the data for saving in a new user object
	$data['cname'] = $cname;
	//$data['elocation'] = $elocation;
	//$data['eimage'] = $eimage;
	$data['ctype'] = $ctype; //encrypt the password for storage
	$data['cDateClosed'] = $cDateC;
	$data['cDateOpen'] = $cDateO;
	//$data['eTime'] = $eTime;
	//$data['eAnticipatedPeople'] = $eAnticipatedPeople;
		
	//create the new user object
	$newEvent = new Event($data);

		
	//save the new user to the database
	$newEvent->save(true);
	$eid = $newEvent->eID;

	//shared table connecting user and event
	/*$dataPK['eid'] = $eid;
	$dataPK['id']= $userid;
	$dataPK['username']= $username;
	$newUsersEvent = new UsersEvents($dataPK);
	$newUsersEvent->save(true);*/
	//$newUsersEvent->setEvent($eid, $userid, $username);
	//if($newEvent->save = true){
		//echo "correct";
	//}
	//$newUsersEvent->save(true);

			
		

	$message = "Capsule Created<br/>";

	//initialize php variables used in the form



	//check to see that the form has been submitted
	//If the form wasn't submitted, or didn't validate
	//then we show the registration form again
	header("Location: index.php");
	header("Location: userprofile.php");
	
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

<div>

<!--<style>
h2{background-color:black; color: white; border: 1px solid; padding:0; margin:0; font-family: "Courier New", georgia, verdana}
h1{color: black; padding:5; margin:0; font-family: "Times New Roman", georgia, verdana}

#reg{font-size: 14px;}
p{display: incline-block;}
</style>-->

<head>
<title/>Time Capsule</title>
</head>
<body background="images/food.jpg">
<!-- end navbar -->
	<?php include("sideBar.php"); ?>
	<div class="container">
            <div class="row"> 
				<div class="center-block">
					<div>
						<h1 id="titleName">Create a Time Capsule <?php echo $username ?>!</h1>
					</div>
				</div>
            </div>
           
    </div>
	<div style="color:white;"> <?php echo $message; ?></div>
<!-- User will select the date of the event-->
<form action="eventcreator.php" method= "post">
		<div class="form-group">
			<label for="exampleInputName1">Time Capsule Name:</label>
			<input type="text" class="form-control" id="cName" name="cName">
		</div>
		<div class="form-group">
			<label for="exampleInputDate1">Date to be Closed:</label>
			<input type="date" class="form-control" id="cDateClosed" name="cDateClosed">
		</div>
		<div class="form-group">
			<label for="exampleInputTime1">Date to be Opened In the Future:</label>
			<input type="date" class="form-control" id="cDateOpened" name="cDateOpened">
		</div>
		<div class="form-group">
			<label for="sel1">Time Capsule Type:</label>
			<select class="form-control" id="sel1" name="cType">
				<option value = "Image">Image</option>
				<option value = "Video">Video</option>
				<option value = "Notes">Notes</option>
				<option value = "Audio">Audio</option>
				<option value = "Gifs">Gifs</option>
			</select>
			<!--<input type="text" class="form-control" id="exampleInputEmail1" value="<//?php echo $email; ?>" name="email">-->
		</div>
		<!--<div class="form-group">
			<label for="exampleInputLocation1">Address:</label>
			<input type="address" class="form-control" id="StreetAddress" name="StreetAddress">
		</div>
		<div class="form-group">
			<label for="exampleInputLocation1">City:</label>
			<input type="address" class="form-control" id="City" name="City">
		</div>
		<div class="form-group">
			<label for="exampleInputLocation1">State:</label>
			<input type="address" class="form-control" id="State" name="State">
		</div>
		<div class="form-group">
			<label for="exampleInputLocation1">Zip Code:</label>
			<input type="address" class="form-control" id="Zip" name="Zip">
		</div>
		<div class="form-group">
			<label for="exampleInputPeople1">Number of Expected people:</label>
			<input type="address" class="form-control" id="eAnticipatedPeople" name="eAnticipatedPeople">
		</div>-->
		<button type="submit" class="btn btn-primary" value="eSubmit" name ="eSubmit">Create</button>
		
</form>


<!--<a href="index_loggedIn.php">Cancel</a>-->
<!--<form action = "ItemSelection.php">-->
<!--<input type = "submit" name = "eSubmit">-->

</div>

</body>




</html>

                  