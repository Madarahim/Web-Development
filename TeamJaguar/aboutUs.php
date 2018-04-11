<!--VERSION2 this php file is for someone already logged in-->


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
					</div>
				</div>
            </div>
           
    </div>

		  
	
			
	
	<!-- information about webapp goes here-->
	<div class="center-block">
            <div class="row">
                <div class="center-block">
                    <div class="well">
						<h1 id="introduction">About Us</h1>
						<p id = "introductionStatement">Our team is comprised of 4 people. We decided to do this as a school project but it has become a 
			personal project that we have invested a lot of time into. <br/><br/>
			We loved saving things at home but realized that time moved fast and we wanted a way to appreciate the small things.
So we made a webapp that
would allow you or anyone to tell peoplethat you wanted to start a time capsule and fill it with memories. We worked really hard so we hope you enjoy using what we made.			</p>
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




