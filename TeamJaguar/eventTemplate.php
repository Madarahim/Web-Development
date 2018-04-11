<!-- this is a general template for the events -->
<?php
//index.php 
//echo '<link href="indexPage.css" rel="stylesheet">';
//echo '<link href="event.css" rel="stylesheet">';
echo '<link href="headings.css" rel="stylesheet">';
echo '<link rel="stylesheet" href="css/main.css" type="text/css" />';
require_once 'includes/global.inc.php';
require_once 'classes/event.class.php';







require('Persistence.php');
$comment_post_ID = 1;
$db = new Persistence();
$comments = $db->get_comments($comment_post_ID);
$has_comments = (count($comments) > 0);
?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<!--<link rel="stylesheet" href="indexPageCSS.css">
<link rel="stylesheet" href="sideNav.css">-->
<link rel="stylesheet" href="simpleCSS.css">
<link rel="stylesheet" href="eventPage.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300">
<link rel="stylesheet" href="bootstrap/bootstrap/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<html/>
<head/>
    <title/>E.S.</title>
	<!--<div id="heading" >
		<h1/>BBQ</h1>
		<h2/>Let's get Smokin' - Room ID: 20343</h2>
	</div>-->
</head>
<body>
	<?php include("sideBar.php"); ?>

		  
	
			
	
	<!-- information about webapp goes here-->
	<!--<div class="container-fluid" id="centerInfo">-->
	 <div class="jumbotron">
	  <h1 id="Eventname">BBQ</h1>
	  <p id="eventsub">Let's Get Started! - Room ID: 204419</p>
	</div>
	<div>
		<div id="functionButtons">
			<ol class="breadcrumb">
			  <li><a href="#">Add Item</a></li>
			  <li><a href="#">Delete Item</a></li>
			  <li><a href="#">Invite</a></li>
			</ol>
	
		</div>
		<!--list of things we have and what we dont have-->
		<div>
			<p>What we need:</p>
			<div class="checkbox">
			  <label><input type="checkbox" value="">Chicken</label>
			</div>
			<div class="checkbox">
			  <label><input type="checkbox" value="">BBQ Sauce</label>
			</div>
			<div class="checkbox disabled">
			  <label><input type="checkbox" value="">Cups and Plates</label>
			</div>
			
			<p id="listTitle">What we have:</p>
			<ul id="taking">
				<li><i>Sergio</i> is bringing "Drinks"!</li><br/>
				<li><i>Deniis</i> is bringing "Booze and a lot of it"!</li><br/>
				<li><i>Big O</i> is bringing "Himself"!</li><br/>
			<ul>
		</div>
		
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

    <label for="comment_author" class="required">Your name</label>
    <input type="text" name="comment_author" id="comment_author" value="" tabindex="1" required="required">

    <label for="email" class="required">Your email:</label>
    <input type="email" name="email" id="email" value="" tabindex="2" required="required">

    <label for="comment" class="required">Your message</label>
    <textarea name="comment" id="comment" rows="10" tabindex="4"  required="required"></textarea>

    <!-- comment_post_ID value hard-coded as 1 -->
    <input type="hidden" name="comment_post_ID" value="<?php echo($comment_post_ID); ?>" id="comment_post_ID" />
    <input name="submit" type="submit" value="Submit comment" />

  </form>

</div>
	</section>
	</div>
 
</body>
</html>
