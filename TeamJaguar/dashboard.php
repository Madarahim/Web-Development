<!--dashboard-->
<!--to do : this is where the login page goes too and you can see your profile from here-->
<?php
require_once 'includes/global.inc.php';
?>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<!--<link rel="stylesheet" href="indexPageCSS.css">
<link rel="stylesheet" href="sideNav.css">-->
<link rel="stylesheet" href="simpleCSS.css">
<link rel="stylesheet" href="dashboard.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300">
<link rel="stylesheet" href="bootstrap/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<html>
<head>

<!--<h1 id="eventTitle">EVENT SHARE</h1>-->

    <title/>T.C.</title>
	<link rel="shortcut icon" href="eventIcon.ico" />
</head>
<body id="homePageBody">
	<?php include("sideBar.php"); ?>
	
	<!--class="jumbotron"-->
		<div class="container">
            <div class="row"> 
				<div class="center-block">
					<div>
						<h1 id="titleName">Your DashBoard</h1>
					</div>
				</div>
				<div class="center-block">
						<div class="row">
							<div class="center-block">
								<div class="well">
									<div id="functionButtons">
										<ol class="breadcrumb">
											<li><a href="#" id="get_file">Edit Dash</a></li>
										  <li><a href="userprofile.php">Your Profile</a></li>
										  <li><a href="#">Messages</a></li>
										  <li><a href="#">Friends</a></li>
										  <li><a href="capsulesearch.php">Find Capsule</a>
										</ol>
									</div>
									
								</div>
							</div>
						</div>
				</div><!--end center block-->
				<!--end menu-->
				<div class="center-block">
					<div class="row">
						<div class="center-block">
							<div class="well">
								<!-- sentence --> 
								<h1 id="introduction">Facts:</h1>
								<h1 id="facts">Time Capsule</h1>
								<p id="factoid">You are part of <b/>4</b> Time Capsule's.</p>
								<p id="factoid">You created <b/>1</b> Time Capsule's.</p>
								<p id="factoid">The next time capsule closes in <b>10</b> days.</p>
								<p id="factoid">A capsule opens in <b>6</b> months.</p>
								<p id="factoid">You have opened <b>0</b> capsules.</p>
								<p id="factoid">You have added <b>10</b> gifs to capsules.</p>
								<p id="factoid">You have added <b>1</b> video to capsules.</p>
								<p id="factoid">You have added <b>102</b> pictures to capsules.</p>
								<br/>
								<h1 id="facts">Friends</h1>
								<p id="factoid">You have <b/>10</b> Friends.</p>
								<p id="factoid">Your oldest friend is <b/>Chris</b>.</p>
								<p id="factoid">Your newest friend is <b/>Abdul</b>.</p>
								<p id="factoid">You are friends with <b>43</b> people.</p>
								<!--slideshow of information -- >
								<!-- youre in x time capsules, next time capsule closing is, next time capsule opening is, friends -->
								
								
							</div>
						</div>
					</div>
				</div> <!--end info block-->
				<div class="center-block">
					<div class="row">
						<div class="center-block">
							<div class="well">
								<!-- sentence --> 
								<h1 id="introduction">Friends:</h1>
								<button id="findfriend" type="button" class="btn btn-primary btn-block">Find Friend</button>
								<br/><br/>
								<!--grab people with array and foreach-->
									<a href="#">CTpopher - Chris Vargas</a><br/>
									<a href="#">BigAbduu - Abdul Rahim</a><br/>
									<a href="#">MCat - Mike Douglas</a><br/>
									<a href="#">canine_1233 - Mark Summers</a><br/>
									<a href="#">_prince_ - James Halpert</a><br/>
									<a href="#">theBoss12 - Sammy Sam</a><br/>
									<a href="#">youtuber1 - Christopher Rich</a><br/>
									<a href="#">smallStepB - Carla Carl</a><br/>
									<a href="#">dance12Star - Kris Yeller</a><br/>
									<a href="#">timeToLive - Steph Cardova</a><br/>
							</div>
						</div>
					</div>
				</div> <!--end info block-->
				<div class = "center-block">
					<div class="row">
						<div class="center-block">
							<div class="well">
								<!-- sentence --> 
								<h1 id="introduction">My Capsules:</h1>
								<button id="createcapsule" type="button" class="btn btn-primary btn-block">New Capsule</button>
								<br/>
								<table class="table table-condensed">
							<thead>
							  <tr>
							    <th></th>
								<th>Capsule Name</th>
								<th>Owner</th>
								<th>Close Date</th>
								<th>Open Date</th>
								<th>People</th>
							  </tr>
							</thead>
							<tbody>
							  <tr>
								<td>1</td>
								<td><a href="timecapsuleexample2.php"/>Sergio's Work</a></td>
								<td>You - bigSerg</td>
								<td>03/15/2017</td>
								<td>03/15/2018 @ 8:30 AM</td>
								<td>27</td>
							  </tr>
							  <tr>
								<td>2</td>
								<td><a href="chris_christmascapsule.php"/>Christmas Fun</a></td>
								<td>Chris - CTpopher</td>
								<td>04/01/2017</td>
								<td>12/21/2017 @ 10:30 AM</td>
								<td>16</td>
							  </tr>
							  <tr>
								<td>3</td>
								<td><a href="sammy_garciafamily.php"/>Garcia Family</a></td>
								<td>Sammy - theBoss12</td>
								<td>04/15/2017</td>
								<td>01/01/2020 @ 6:30 PM</td>
								<td>32</td>
							  </tr>
							  <tr>
								<td>4</td>
								<td><a href="timecapsuleexample2.php"/>Love</a></td>
								<td>Carla - smallStepB</td>
								<td>02/14/2017</td>
								<td>02/14/2024 @ 12:30 AM</td>
								<td>2</td>
							  </tr>
							</tbody>
						  </table>
							</div>
						</div>
					</div>
				</div><!--end info block-->
			</div>
		</div>
		
		
<script>		
document.getElementById("createcapsule").onclick = function () {
        location.href = "eventcreator.php";
    };
document.getElementById("findfriend").onclick = function () {
        location.href = "usersearch.php";
    };
</script>

</body>
</html>