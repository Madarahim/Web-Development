<!--VERSION2 this php file is for someone already logged in-->

<?php
require_once 'includes/global.inc.php';
?>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<!--<link rel="stylesheet" href="indexPageCSS.css">
<link rel="stylesheet" href="sideNav.css">-->
<link rel="stylesheet" href="simpleCSS.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300">
<link rel="stylesheet" href="bootstrap/bootstrap/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<html>
<head>

<!--<h1 id="eventTitle">EVENT SHARE</h1>-->

    <title/>T.C.</title>
	<link rel="shortcut icon" href="eventIcon.ico" />
</head>
<body id="homePageBody" background="images/timecap.jpg">
	<?php include("sideBar.php"); ?>

	<!-- information about webapp goes here-->
	<!--<div class="container-fluid" id="centerInfo">-->
	<div class="container">
            <div class="row"> 
				<div class="center-block">
					<div>
						<h1 id="titleName">Time Capsule</h1>
					<div>
				</div>
            </div>
           
    </div>
	<div class="center-block">
            <div class="row">
                <div class="center-block">
                    <div class="well">
						<img src="images/tc.png" alt="time capsule" style="width: 430px; height: 240px;" >
						<!-- sentence --> 
						<h1 id="introduction">Let's Start</h1>
						<h4 id = "introductionStatement">Build. Create. Share. Manage your time capsule. All in one simple place.</h4>
						<!-- button here -->
						<button type="button" class="btn black-background white" id="bottonEvent">Create Capsule</button>
						<button type="button" class="btn black-background white" id="EventExample">EXAMPLE</button>
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
        location.href = "eventcreator.php";
    };
	document.getElementById("EventExample").onclick = function () {
        location.href = "timeCapsuleExample2.php";
    };
	
	function openNav() {
		document.getElementById("mySidenav").style.width = "100%";
	}

	function closeNav() {
		document.getElementById("mySidenav").style.width = "0";
	}
</script>

</html>




