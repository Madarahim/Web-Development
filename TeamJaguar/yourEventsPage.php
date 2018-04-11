<!--your events should show up here-->
<?php
require_once 'includes/global.inc.php';
require_once 'classes/event.class.php';
require_once 'usersevents.class.php';
require_once 'classes/getevents.class.php';

//check to see if they're logged in
//if(!isset($_SESSION['logged_in'])) {
//	header("Location: login.php");
//}

//get the user object from the session
$user = unserialize($_SESSION['user']);
$userid = $user->id;

//$getEventsInfo = new GetEvents($userid);
//$getEventsInfo->getName();



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

    <title/>T.C.</title>
	<link rel="shortcut icon" href="eventIcon.ico" />
</head>
<body id="homePageBody" background="images/friendsBlur.jpg">
	<?php include("sideBar.php"); ?>
	<div class="container">
            <div class="row"> 
				<div class="center-block">
					<div>
						<h1 id="titleName">...</h1>
					<div>
				</div>
            </div>
           
    </div>

		  
	
			
	
	<!-- information about webapp goes here-->
	<div class="center-block">
            <div class="row">
                <div class="center-block">
                    <div class="well">
						<h1 id="introduction">Your Time Capsules</h1>
						
						  <p>A list of your upcoming Capsules!</p>            
						  <table class="table table-condensed">
							<thead>
							  <tr>
								<th>Capsule Name</th>
								<th>Close Date</th>
								<th>Open Date</th>
							  </tr>
							</thead>
							<tbody>
							  <tr>
								<td><a href="timecapsuleexample2.php"/>Sergio's Work</a></td>
								<td>03/15/2017</td>
								<td>03/15/2018 @ 8:30 AM</td>
							  </tr>
							  <tr>
								<td><a href="id=4.php"/>Family Fun</a></td>
								<td>3/11/2017</td>
								<td>12/23/2020 @ 11:00 PM</td>
							  </tr>
							</tbody>
						  </table>
						
					</div>
                </div>
                <!--<div class="col-lg-8 col-xs-12 col-centered">
                    <div class="well" id="introduction">Let's Start</div>
                </div>
                <div class="col-lg-8 col-xs-12 col-centered">
                    <div class="well" id="introductionStatement">Create. Build. Share. Manage. All in one simple place.</div>
                </div>-->
            </div>
    </div>
</body>

<script type="text/javascript">
    document.getElementById("bottonEvent").onclick = function () {
        location.href = "bbqExample.php";
    };
	document.getElementById("EventExample").onclick = function () {
        location.href = "bbqExample.php";
    };
	
	function openNav() {
		document.getElementById("mySidenav").style.width = "100%";
	}

	function closeNav() {
		document.getElementById("mySidenav").style.width = "0";
	}
</script>

</html>
