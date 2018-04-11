<?php
//index.php 
//echo '<link href="indexPage.css" rel="stylesheet">';
//echo '<link href="event.css" rel="stylesheet">';

echo '<link href="headings.css" rel="stylesheet">';
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
$images = array("slideshowexample/fat.jpg", "slideshowexample/prom.jpg", "slideshowexample/stevenfall.jpg", "images/astro.jpg", "slideshowexample/gify.gif",
"slideshowexample/one.jpg", "slideshowexample/two.jpg", "slideshowexample/giphy.gif");

?>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<!--<link rel="stylesheet" href="indexPageCSS.css">
<link rel="stylesheet" href="sideNav.css">-->
<link rel="stylesheet" href="simpleCSS.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300">
<link rel="stylesheet" href="bootstrap/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="/lib/w3.css"><!--for carasoul-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<html/>
<head/>
	<link rel="stylesheet" href="eventPage.css">
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
	<div class="imageOnBorder">
	  <h1 id="Eventname">Sergio's Work Time Capsule</h1>
	  <p id="eventSub">Work friends = great friends. - Room ID: 204419</p>
	  <p id="eventSub">Days Until Time Capsule is closed: 10 days</p>
		<div id="clockdiv">
		  <div>
		   <p id="eventSub">Time Capsule is opened in:</p>
		  </div>
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
	
		<div id="functionButtons">
			<ol class="breadcrumb">
			  <li><a href="#" id="get_file">Add Item</a></li>
			  <input type="file" id="my_file">
			  <li><a href="#">Delete Item</a></li>
			  <li><a href="#">Invite</a></li>
			</ol>
	
		</div>
		<!--list of things we have and what we dont have-->
		<div id="interiorInfo">
			<h1>Info:</h1>
			<p>Hey guys! This time capsule is super important to me. MY work friends are my best friends. So add anything you want!
			Let me know if I havent added anyone or if I should invite someone in the comments!</p>
		<div>
			<h1 class="listTitle">People in this Capsule:</h1>
			<!--grab people with array and foreach-->
			<a href="#">John</a>
			<a href="#">Nick</a>
			<a href="#">Sarah</a>
			<a href="#">Bob</a>
			<a href="#">Jimmy</a>
			<a href="#">Lou</a>
			<a href="#">Eric</a>
			<a href="#">Abdul</a>
		</div>
		<div id="thingsIWant">
			<h1 class="listTitle">Items I want in Time Capsule:</h1>
			<!--<ul id="taking">-->
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
			<ul id="taking">
				<?php foreach($items as $item): ?>
					<li><?php echo $item; ?></li><br/>
				<?php endforeach; ?>
			</ul>
			<?php endif; ?>
				
			<!--</ul>-->
		</div>
		<div id="thingsPeopleAreTaking">
			<h1 class="listTitle">Items in Time Capsule: 23</h1>
		</div>
		<div>
			<input type="submit" value="Hide" id="hide" /> <!--doesnt work yet -->
		</div>
		</div>
		<div id="listOfImages">
			
			<?php if($images):?>
			<?php for($x = 0; $x <= 2; $x++):?>
			<?php foreach($images as $value): ?>
				<img src="<?php echo $value; ?>" class="img-thumbnail" alt="image[]" width="304" height="236">
			<?php endforeach; ?>
			<?php endfor; ?>
			<?php endif; ?>
			
			
		</div>
		


		
		
	
	<div id="comments">
	
	<section id="comments" class="body">
	  
		<header>
			<h2 id=commentHeading">Comments</h2>
		</header>
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
</script>
</html>
