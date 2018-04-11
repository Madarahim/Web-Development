<?php
//welcome.php

require_once 'includes/global.inc.php';

//check to see if they're logged in
if(!isset($_SESSION['logged_in'])) {
	header("Location: login.php");
}

//get the user object from the session
$user = unserialize($_SESSION['user']);

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
	<title>Welcome</title>
</head>
<body>
<!-- end navbar -->
	<?php include("sideBar.php"); ?>
	<div class="container">
            <div class="row"> 
				<div class="center-block">
					<div>
						<h1 id="titleName">WELCOME</h1>
					</div>
				</div>
            </div>
           
    </div>
	<div class="center-block">
            <div class="row">
                <div class="center-block">
                    <div class="well">
						<img src="webappIMAGE/forkIcon.png" alt="Cake">
						<!-- sentence --> 
						<h1 id="introduction">Congrats, <?php echo $_SESSION["username"]; ?>.</h1>
						<h4 id = "introductionStatement">You've been registered and logged in. Welcome!</h4>
						<!-- button here -->
						<button type="button" class="btn black-background white" id="logoutBtn">Log Out</button>
						<button type="button" class="btn black-background white" id="goHome">Go Home</button>
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
    document.getElementById("logoutBtn").onclick = function () {
        location.href = "logout.php";
    };
	document.getElementById("goHome").onclick = function () {
        location.href = "index.php";
    };
	
	function openNav() {
		document.getElementById("mySidenav").style.width = "100%";
	}

	function closeNav() {
		document.getElementById("mySidenav").style.width = "0";
	}
</script>
</html>