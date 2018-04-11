<?php
//index.php 
//echo '<link href="indexPage.css" rel="stylesheet">';
//echo '<link href="event.css" rel="stylesheet">';

//echo '<link href="headings.css" rel="stylesheet">';
echo '<link rel="stylesheet" href="css/main.css" type="text/css" />';
require_once 'includes/global.inc.php';
require('Persistence.php');
$comment_post_ID = 1;
$db = new Persistence();
$comments = $db->get_comments($comment_post_ID);
$has_comments = (count($comments) > 0);

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
$images = array("slideshowexample/mexican1.jpg", "slideshowexample/mexican2.jpg", "slideshowexample/mexican3.jpg", "slideshowexample/mexicangirl.gif");
$multiplyImages = 2; //just for show
$countImages = count($images) * $multiplyImages;


?>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<!--<link rel="stylesheet" href="indexPageCSS.css">
<link rel="stylesheet" href="sideNav.css">-->
<link rel="stylesheet" href="simpleCSS2.css">
<link rel="stylesheet" href="sammy_garciafamily_Body.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300">
<link rel="stylesheet" href="bootstrap/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="/lib/w3.css"><!--for carasoul-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
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
						<h1 id="titleName">Sergio Garcia Family Time Capsule</h1>
					</div>
				</div>
				<div class="center-block">
						<div class="row">
							<div class="center-block">
								<div class="well">
									<img src="images/family.jpg" alt="time capsule" style="width: 430px; height: 240px;" >
									<!-- sentence --> 
									<h1 id="introduction">Room ID: 323433</h1>
									<h4 id = "introductionStatement">Days Until Time Capsule is Closed: 5 days</h4>
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
								<h4 id = "introductionStatement">Para mi familia, the Garcia family rules!</h4>
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
								<!--grab people with array and foreach-->
									<a href="#">Jose</a>
									<a href="#">Eddy</a>
									<a href="#">Manuel</a>
									<a href="#">Esther</a>
									<a href="#">Lupe</a>
									<a href="#">Marisol</a>
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
								<div id="comments">
	
									<section id="comments" class="body">
										<ol id="posts-list" class="hfeed<?php echo($has_comments?' has-comments':''); ?>">
										  <li class="no-comments">Be the first to add a comment.</li>
										  <?php
											foreach ($comments as $comment) {
											  ?>
											  <li><article id="comment_<?php echo($comment['id']); ?>" class="hentry">  
												<footer class="post-info">
												  <abbr class="published" title="<?php echo($comment['date']); ?>">
													<?php echo( date('d F Y', strtotime($comment['date']) ) ); ?>
												  </abbr>

												  <address class="vcard author">
													By <a class="url fn" href="#"><?php echo($comment['comment_author']); ?></a>
												  </address>
												</footer>

												<div class="entry-content">
												  <p><?php echo($comment['comment']); ?></p>
												</div>
											  </article></li>
											  <?php
											}
										  ?>
										</ol>

										
										<div id="respond">

											<h3>Leave a Comment</h3>
											

										  <form action="post_comment.php" method="post" id="commentform">

											<label for="comment_author" class="required" style="color: black !important;">Your name</label>
											<input type="text" name="comment_author" id="comment_author" value="" tabindex="1" required="required">

											<label for="email" class="required" style="color: black !important;">Your email:</label>
											<input type="email" name="email" id="email" value="" tabindex="2" required="required">

											<label for="comment" class="required" style="color: black !important;">Your message</label>
											<textarea name="comment" id="comment" rows="10" tabindex="4"  required="required"></textarea>

											<!-- comment_post_ID value hard-coded as 1 -->
											<input type="hidden" name="comment_post_ID" value="<?php echo($comment_post_ID); ?>" id="comment_post_ID" />
											<input name="submit" type="submit" value="Submit comment" />

										  </form>

									</div>
									</section>
								</div>
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


$(function(){
 
    var $container = $('#con');
  
    $container.imagesLoaded( function(){
      $container.masonry({
        itemSelector : '.masonryImage'
      });
    });
  
  });
</script>
</html>
