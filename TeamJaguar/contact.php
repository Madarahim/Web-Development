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
<body id="homePageBody" background="images/contact.jpg">
	<?php include("sideBar.php"); ?>
	
	
	<div class="container">
            <div class="row"> 
				<div class="center-block">
					<div>
						<h1 id="titleName">Coming Soon</h1>
					</div>
				</div>
            </div>
           
    </div>

		  
	
			
	
	<!-- information about webapp goes here-->
	<div class="center-block">
            <div class="row">
                <div class="center-block">
                    <div class="well">
						<h1 id="introduction">Contact Us</h1>
						<p id = "introductionStatement">Phone: (123)456-7890<br/><br/>Email: we_dont_have_one_yet@soon.com</p>
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




