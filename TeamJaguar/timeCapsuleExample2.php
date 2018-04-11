<?php include 'config.php'; ?>
<?php
//index.php 
//echo '<link href="indexPage.css" rel="stylesheet">';
//echo '<link href="event.css" rel="stylesheet">';

//echo '<link href="headings.css" rel="stylesheet">';
echo '<link rel="stylesheet" href="css/main.css" type="text/css" />';

require_once 'includes/global.inc.php';

//items for things wanted
$items = array();
if('POST' === $_SERVER['REQUEST_METHOD']) {
    if( ! empty($_POST['item'])) {
        $items[] = $_POST['item'];
    }
    if(isset($_POST['items']) && is_array($_POST['items'])) {
        foreach($_POST['items'] as $item) {
            $items[] = $item;
        }
    }
}

//images
$images = array("slideshowexample/fat.jpg", "slideshowexample/prom.jpg", "slideshowexample/stevenfall.jpg", "images/astro.jpg", "slideshowexample/gify.gif",
"slideshowexample/one.jpg", "slideshowexample/two.jpg", "slideshowexample/giphy.gif");
$multiplyImages = 2; //just for show
$countImages = count($images) * $multiplyImages;


?>



<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<!--<link rel="stylesheet" href="indexPageCSS.css">
<link rel="stylesheet" href="sideNav.css">-->
<link rel="stylesheet" href="simpleCSS2.css">
<link rel="stylesheet" href="timecapsuleExample2_Body.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300">
<link rel="stylesheet" href="bootstrap/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="/lib/w3.css"><!--for carasoul-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!--<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>-->
<script src="jquery.masonry.min.js"></script>
<html/>
<head/>
	<link rel="stylesheet" href="eventPage2.css">
    <title/>T.C.</title>
	<!--<div id="heading" >
		<h1/>BBQ</h1>
		<h2/>Let's get Smokin' - Room ID: 20343</h2>
	</div>-->
</head>
<body>
	<?php include("sideBar.php"); ?>
		  
	
			
	
	<!-- information about webapp goes here-->
	<!--<div class="container-fluid" id="centerInfo">-->
	<!--class="jumbotron"-->
		<div class="container">
            <div class="row"> 
				<div class="center-block">
					<div>
						<h1 id="titleName">Sergio's Work Time Capsule</h1>
					</div>
				</div>
				<div class="center-block">
						<div class="row">
							<div class="center-block">
								<div class="well">
									<img src="images/astro.jpg" alt="time capsule" style="width: 430px; height: 240px;" >
									<!-- sentence --> 
									<h1 id="introduction">Room ID: 204419</h1>
									<h4 id = "introductionStatement">Days Until Time Capsule is Closed: 10 days</h4>
									<h4 id="introductionStatement">Time Capsule is opened in:</h4>
									<div id="clockdiv">
									  <div>
										<span class="days"></span>
										<div class="smalltext">Days</div>
									  </div>
									  <div>
										<span class="hours"></span>
										<div class="smalltext">Hours</div>
									  </div>
									  <div>
										<span class="minutes"></span>
										<div class="smalltext">Minutes</div>
									  </div>
									  <div>
										<span class="seconds"></span>
										<div class="smalltext">Seconds</div>
									  </div>
									</div>
									
								</div>
							</div>
							<!--<div class="col-lg-8 col-xs-12 col-centered">
								<div class="well" id="introduction">Let's Start</div>
							</div>
							<div class="col-lg-8 col-xs-12 col-centered">
								<div class="well" id="introductionStatement">Create. Build. Share. Manage. All in one simple place.</div>
							</div>-->
						</div>
				</div><!--end center block-->
				<div class="center-block">
					<div class="row">
						<div class="center-block">
							<div class="well">
								<div id="functionButtons">
									<ol class="breadcrumb">
									  <li><a href="#" id="get_file">Add Item</a></li>
									  <input type="file" id="my_file">
									  <li><a href="#">Delete Item</a></li>
									  <li><a href="#">Invite</a></li>
									  <li><a href="#" id="editName">Edit</a></li>
									</ol>
							
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end menu-->
				<div class="center-block">
					<div class="row">
						<div class="center-block">
							<div class="well">
								<!-- sentence --> 
								<h1 id="introduction">INFO:</h1>
								<h4 id = "introductionStatement">Hey guys! This time capsule is super important to me. MY work friends are my best friends. So add anything you want!
					Let me know if I havent added anyone or if I should invite someone in the comments!</h4>
							</div>
						</div>
					</div>
				</div> <!--end info block-->
				<div class="center-block">
					<div class="row">
						<div class="center-block">
							<div class="well">
								<!-- sentence --> 
								<h1 id="introduction">People in this Capsule:</h1>
								<a id="hideDeleteButton">Delete</a><br/>
								<!--grab people with array and foreach-->
									<a href="#" id="bob">Bob</a><a id="del3" class="del" style="display:none;"> [-] </a><br/>
									<a href="#" id="jimmy">Jimmy</a><a id="del4" class="del" style="display:none;"> [-]</a><br/>
									<a href="#" id="lou">Lou</a><a id="del5" class="del" style="display:none;"> [-]</a><br/>
									<a href="#">Eric</a><a id="del6" class="del" style="display:none;"> [-]</a><br/>
									<a href="#">Abdul</a><a id="del7" class="del" style="display:none;"> [-] </a><br/>
									<a href="#" id="john">John</a><a id="del" class="del" style="display:none;"> [-] </a><br/>
									<a href="#" id="nick">Nick</a><a id="del1" class="del" style="display:none;"> [-] </a><br/>
									<a href="#" id="sarah">Sarah</a><a id="del2" class="del" style="display:none;"> [-] </a><br/>
									<br/><br/>
									<h3>Pending:</h3>
									<a href="#">Micharl - bigMike</a>
							</div>
						</div>
					</div>
				</div> <!--end info block-->
				<div class="center-block">
					<div class="row">
						<div class="center-block">
							<div class="well">
								<!-- sentence --> 
								<h1 id="introduction">Things I Want in this Capsule:</h1>
								<form method="post" id="addItemsToList">
									<input type="submit" value="+" />
									<input type="text" name="item" />
									<?php if($items): ?>
									<?php foreach($items as $item): ?>
										<input type="hidden" name="items[]" value="<?php echo $item; ?>" />
									<?php endforeach; ?>
									<?php endif; ?>
								</form>
								<br/>
								<?php if($items): ?>
								<ul id="taking" class="list-unstyled">
									<?php foreach($items as $item): ?>
										<li><?php echo $item; ?></li><br/>
									<?php endforeach; ?>
								</ul>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div> <!--end info block-->
				<div class="center-block">
					<div class="row">
						<div class="center-block">
							<div class="well">
								<!-- sentence --> 
								<h1 id="introduction">Items in Time Capsule: <?php echo $countImages ?></h1>
								<div>
									<input type="submit" value="Hide" id="hide" /> <!--doesnt work yet -->
								</div>
								<div id="listOfImages">
									
									<?php if($images):?>
									<?php for($x = 0; $x < $multiplyImages; $x++):?> <!--remove this letter, its only for show -->
									<?php foreach($images as $value): ?>
										<img src="<?php echo $value; ?>" class="img-thumbnail" alt="image[]" width="304" height="236">
									<?php endforeach; ?>
									<?php endfor; ?>
									<?php endif; ?>
									
									
								</div>
		
							</div>
						</div>
					</div>
				</div> <!--end info block-->
				<div class="center-block">
					<div class="row">
						<div class="center-block">
							<div class="well">
								<!-- sentence --> 
								<h1 id="introduction">Comments</h1>
							
								<div class="container" > 
									<div id="display" class="col-md-8 col-md-offset-1">
									 <?php 
									 /* set a query for retrieving the data .*/ 
									 $sqlQuery = "SELECT * FROM `tblcomment` order by ID asc"; 
									 /* execute the query */
									 $result = mysql_query($sqlQuery) or die(mysql_error());
									 /* loop the executed query */
									 while ($row = mysql_fetch_array($result)) {

									 echo '<div class="panel panel-primary">'; 
									 echo '<div class="panel-heading"><span class="glyphicon glyphicon-user"> </span> Posted by : ' . $row['PERSON'].'</div>';
									 echo '<div class="panel-body">';
									 echo $row['COMMENT'];
									 echo '</div>';
									 echo '<div class="panel-footer">';
									 echo 'Date Posted:' . $row['DATEPOSTED'];
									 echo '</div>';
									 if(isset($_SESSION['logged_in'])) : //delete button should only happen if user is signed in
									 $user = unserialize($_SESSION['user']); 
									 echo '<div>';
									 echo '<button class="btn btn-primary btn-sm" id="delete" name="'.$row['DATEPOSTED'].'" type="submit">Delete Comment</button>';
									 echo '</div>';
									 endif; 
									 echo '</div>'; 
									 } 
									 ?>
									</div>
									
								
									<?php if(isset($_SESSION['logged_in'])) : ?>
									<?php $user = unserialize($_SESSION['user']); ?>
									 <!-- panel -->
									 <div class="col-md-8 col-md-offset-1">
										 <div class="panel">
											 <div class="panel-heading"><h2>Post your comments</h2></div>
											 <div class="panel-body span6 form-horizontal">
												 <div class="row">
													 <div class="form-group"> 
														 <div class="panel-heading">
														 <input rows="6" class="form-control input-sm" id="name" name="name" placeholder=
														 "Name" type="text" value="">
														 </div> 
													 </div>
												 </div> 
											 <div class="row">
												 <div class="form-group">
													 <div class="panel-heading"> 
													 <textarea class="form-control input-sm" rows="6" name="COMMENT" id="COMMENT" > 
													 </textarea> 
													 </div>
												 </div>
											 </div>
												 <div class="row">
													 <div class="form-group">
														 <div class="panel-heading"> 
														 <button class="btn btn-primary btn-sm" id ="submit" type="submit" >Post Comment</button> 
														 </div>
													 </div>
												 </div> 
											 </div>
										 </div> 
										<!-- end panel -->
									 </div> 
									<?php else : ?>
										<div class="col-md-8 col-md-offset-1">
											<div class="panel">
												<div class="panel-heading"><h2>Login to Post a Comment</h2></div>
												<h3><a href="login.php">Log In</a><p></p><a href="register.php">Register</a></h3>
											</div>
										</div>
									<?php endif;?>
								</div> <!--end container-->
							
								
							</div>
						</div>
					</div>
				</div> <!--end info block-->
			</div>
		</div>
		
		<!--class="centerImageBlock"  mansonry.js!!!!-->
		<!--<div id="con" >
			  <div class="masonryImages"><img src="images/astro.jpg" class="img-thumbnail" width="304" height="236"></div>
			  <div class="masonryImages"><img src="images/astro.jpg" class="img-thumbnail" width="304" height="236"></div>
			  <div class="masonryImages"><img src="images/astro.jpg" class="img-thumbnail" width="304" height="236"></div>
	
		</div>-->


		
		
	
	
 
</body>

<script type="text/javascript">
	document.getElementById('get_file').onclick = function() {
		document.getElementById('my_file').click();
	};
	
	function getTimeRemaining(endtime) {
  var t = Date.parse(endtime) - Date.parse(new Date());
  var seconds = Math.floor((t / 1000) % 60);
  var minutes = Math.floor((t / 1000 / 60) % 60);
  var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
  var days = Math.floor(t / (1000 * 60 * 60 * 24));
  return {
    'total': t,
    'days': days,
    'hours': hours,
    'minutes': minutes,
    'seconds': seconds
  };
}

function initializeClock(id, endtime) {
  var clock = document.getElementById(id);
  var daysSpan = clock.querySelector('.days');
  var hoursSpan = clock.querySelector('.hours');
  var minutesSpan = clock.querySelector('.minutes');
  var secondsSpan = clock.querySelector('.seconds');

  function updateClock() {
    var t = getTimeRemaining(endtime);

    daysSpan.innerHTML = t.days;
    hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
    minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
    secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

    if (t.total <= 0) {
      clearInterval(timeinterval);
    }
  }

  updateClock();
  var timeinterval = setInterval(updateClock, 1000);
}

//var deadline = new Date(Date.parse(new Date()) + 15 * 24 * 60 * 60 * 1000);
//var deadline = new Date(Date.parse(December 31 2015 23:59:59 GMT+0200));
var deadline = 'December 31 2018 23:59:59 GMT+0200';
initializeClock('clockdiv', deadline);

$("#hide").click(function(){
	$("#listOfImages").toggle();
});

$("#del").click(function(){
	$("#john").toggle();
	$("#del").toggle();
	alert("John is going to be removed from this capsule");
});
$("#del1").click(function(){
	$("#nick").toggle();
	$("#del1").toggle();
	alert("Nick is going to be removed from this capsule");
});
$("#del2").click(function(){
	$("#sarah").toggle();
	$("#del2").toggle();
	alert("Sarah is going to be removed from this capsule");
});

$("#hideDeleteButton").click(function(){
	$(".del").toggle();
	
});


$(function(){
 
    var $container = $('#con');
  
    $container.imagesLoaded( function(){
      $container.masonry({
        itemSelector : '.masonryImage'
      });
    });
  
  });
  
  //this is for comments !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
  $(document).on("click", "#submit", function () {

 jQuery("#display").fadeIn(900, 0); 
 /* load all variables */
 var name = document.getElementById('name').value
 var COMMENT = document.getElementById('COMMENT').value 
 
 $.ajax({ //create an ajax request to load_page.php
 type:"POST", 
 url: "process.php", 
 dataType: "text", //expect html to be returned 
 data:{NAME:name,COMMENT:COMMENT}, 
 success: function(data){ 
 $("#display").html(data); 
 
 }
 }); 
}); 
//delete comment
  $(document).on("click", "#delete", function () {
 //jQuery("#display").fadeIn(900, 0); 
 /* load all variables */
 //alert("44"+this.name);
 var date_Posted = this.name
 //alert(name);
 //var COMMENT = document.getElementById('COMMENT').value 
 
 $.ajax({ //create an ajax request to load_page.php
 type:"POST", 
 url: "delete_comment.php", 
 dataType: "text", //expect html to be returned 
 data:{DATEPOSTED:date_Posted},
 success: function(data){ 
 $("#display").html(data); 
 
 }

 }); 
}); 

</script>
</html>
