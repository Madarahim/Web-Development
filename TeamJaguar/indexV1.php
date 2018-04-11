<!--this php file is for someone already logged in-->

<?php
//index.php 
//echo '<link href="headings.css" rel="stylesheet">';
//echo '<link href="indexPage.css" rel="stylesheet">';
require_once 'includes/global.inc.php';
?>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="indexCSS.css">
<link rel="stylesheet" href="bootstrap/bootstrap/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
<html>
<head>
<style>
.mySlides {display:none;}
</style>

<div>
<style>
h2{background-color:black; color: white; border: 1px solid; padding:0; margin:0; font-family: "Courier New", georgia, verdana}
h1{background-color:black; color: white; padding:0; margin:0; font-family: "Courier New", georgia, verdana} 
#eventTitle{font-size: 150px;}
p{display: incline-block;}
</style>
<div>
<h1 id="eventTitle">EVENT</h1>

<div class="mySlides">
  <h1>Creator.</h1>
</div>

<div class="mySlides">
  <h1>Maker.</h1>
</div>

<div class="mySlides">
  <h1>Planner.</h1>
</div>

<div class="mySlides">
  <h1>Sharer.</h1>
</div>

</div>
</div>
<script>
var slideIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > x.length) {
        slideIndex = 1;
    }
    x[slideIndex-1].style.display = "block";
    setTimeout(carousel, 2000);
    
}
</script>

    <title/>E.S.</title>
	<!--<div id="heading" >
		<h1/>Event Organizer</h1>
		<h2/>Create. Share. Add. Invite. Buy. Let's Party</h2>
	</div>-->
	<link rel="shortcut icon" href="eventIcon.ico" />
</head>
<body>


	<!-- nav bar -->
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
		  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>
		  <a class="navbar-brand" href="#">Home</a>
		</div>
		<!-- Collect the nav links, forms, and other content for toggling -->
		<!-- nav menu -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		  <!-- nav menu options -->
		  <ul class="nav navbar-nav">
			<li class="active"><a href="#">Add Event<span class="sr-only">(current)</span></a></li>
			<li><a href="#">Delete Event</a></li>
			<!--dropdown -->
			<li class="dropdown">
			  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Account <span class="caret"></span></a>
			  <ul class="dropdown-menu">
				<!--<li><a href="#">Account</a></li>-->
				<li><a href="#">Info</a></li>
				<li><a href="#">Friends</a></li>
				<li role="separator" class="divider"></li>
				<li><a href="#">Calendar</a></li>
				<li role="separator" class="divider"></li>
				<li><a href="#">Account</a></li>
			  </ul>
			</li>
		  </ul>
		  <!-- end nav menu options -->
		  <!-- nav menu submit 
		  <form class="navbar-form navbar-left">
			<div class="form-group">
			  <input type="text" class="form-control" placeholder="Search">
			</div>
			<button type="submit" class="btn btn-default">Submit</button>
		  </form>
		  -->
		  
		  <!-- nav menu dropdown -->
		  <ul class="nav navbar-nav navbar-right">
			
			<?php if(isset($_SESSION['logged_in'])) : ?>
			<?php $user = unserialize($_SESSION['user']); ?>
			Hello, <?php echo strtoupper($user->username); ?>. You are logged in. <a href="logout.php"/>Logout</a> | <a href="settings.php"/>Change Email</a>
			<?php else : ?>
			You are not logged in. <a href="login.php"/>Log In</a> | <a href="register.php"/>Register</a>
			<?php endif; ?>
	</div>
			<!--<li class="dropdown">
			  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
			  <ul class="dropdown-menu">
				<li><a href="#">Action</a></li>
				<li><a href="#">Another action</a></li>
				<li><a href="#">Something else here</a></li>
				<li role="separator" class="divider"></li>
				<li><a href="#">Separated link</a></li>
			  </ul>
			</li>
			-->
		  </ul>
		  
		  <!-- end nav menu dropdown -->
		  
		</div><!-- /.navbar-collapse -->
		
		<!-- end nav menu -->
		
	  </div><!-- /.container-fluid -->
	</nav>
	
	<!-- end nav bar -->

	<!--navigational bar-->
	<!--
	<div id="events">
		<ul class = "nav navbar-nav">
			<li class="active"><a href="index.php">Home<span class="sr-only">(current)</span></a></li>
			<li><a href="#">Add Event</a></li>
			<li><a href="#">Delete Event</a></li>
		</ul>
	</div>
	
	<div>
		<h2 id="eventLabel"/>Your Events:</h2>
		<ul id="eventList">
			<li>Omid's Graduation</li>
			<li>Dennis' Potluck</li>
			<li>Sergio's Birthday</li>
			<li>Game Night</li>
			<li><a href="bbqExample.php">BBQ</a></li>
		</ul>
		
	</div>-->
	<!--registration, requires global.inc.php-->
	
	<!--<div id="registration">
		<?php if(isset($_SESSION['logged_in'])) : ?>
		<?php $user = unserialize($_SESSION['user']); ?>
			Hello, <?php echo strtoupper($user->username); ?>. You are logged in. <a href="logout.php"/>Logout</a> | <a href="settings.php"/>Change Email</a>
		<?php else : ?>
			You are not logged in. <a href="login.php"/>Log In</a> | <a href="register.php"/>Register</a>
		<?php endif; ?>
	</div>-->
	
	<!-- information about webapp goes here-->
	<div class="container-fluid" id="informationDIV">
		<h3 id="webInfo">What does Event Sharer do?</h3>
		<br/>
		<p>We wanted a place where we could plan a BBQ, or a picnic, or any event that requires someone bringing something.
		We wanted to make it easy and painless. Remove all the annoying back and forth texting.
		Our team wanted to make a place where organization was intuitive.
		Create an event. Invite people. Decide what you want people to bring and people choose what they bring.
	
	</p>
	
	</div> <!-- end div>
</body>
</html>




