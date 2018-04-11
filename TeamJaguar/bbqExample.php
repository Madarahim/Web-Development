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
?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<!--<link rel="stylesheet" href="indexPageCSS.css">
<link rel="stylesheet" href="sideNav.css">-->
<link rel="stylesheet" href="simpleCSS.css">
<link rel="stylesheet" href="eventPage.css">
<link rel="stylesheet" href="sideBar.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300">
<link rel="stylesheet" href="bootstrap/bootstrap/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="sideBarjs.js"></script>
<html/>
<head/>
    <title/>T.C.</title>
	<!--<div id="heading" >
		<h1/>BBQ</h1>
		<h2/>Let's get Smokin' - Room ID: 20343</h2>
	</div>-->
</head>
<body>
	<div id="wrapper">
        <div class="overlay"></div>
		
        <!-- Sidebar -->
        <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
            <ul class="nav sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                       Time Capsule
                    </a>
                </li>
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li>
                    <a href="howto.php">How To</a>
                </li>
                <li>
                    <a href="calendar.php">Calendar</a>
                </li>
                <li>
                    <a href="aboutus.php">About Us</a>
                </li>
                <li>
                    <a href="contact.php">Contact</a>
                </li>
				<!--<li>
					<a href="#">Log In</a>
				</li>
				<li>
					<a href="#">Sign Up</a>
				</li>-->
				<br/>
				<br/>
				<li>
				
					<?php if(isset($_SESSION['logged_in'])) : ?>
					<?php $user = unserialize($_SESSION['user']); ?>
					<p style="color:white;">...Hello, <?php echo strtoupper($user->username); ?>. You are logged in.</p><br/> <a href="logout.php"/>Logout</a><a href="settings.php"/>Change Email</a>
					<?php else : ?>
					<p style="color:white;">...You are not logged in.</p> <a href="login.php"/>Log In</a><a href="register.php"/>Register</a>
					<?php endif; ?>
				
				</li>
            </ul>
        </nav>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <button type="button" class="hamburger is-closed" data-toggle="offcanvas">
                <span class="hamb-top"></span>
    			<span class="hamb-middle"></span>
				<span class="hamb-bottom"></span>
            </button>
           
        </div>
		
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

		  
	
			
	
	<!-- information about webapp goes here-->
	<!--<div class="container-fluid" id="centerInfo">-->
	<!--class="jumbotron"-->
	 <div img src ="images/astro.jpg" style="width: 100%; height: 100%;">
	  <h1 id="Eventname">Sergio's Amazing Work Time Capsule</h1>
	  <p id="eventsub">Can't wait to grow old. - Room ID: 204419</p>
	  <p id="eventsub">Date Until Time Capsule is closed: 10 days</p>
	  <p id="eventsub">Date Until Time Capsule is opened: 3 yrs 5 mths 10 days 3 hrs 20 min</p>
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
			<p>Hey guys! This time capsule is super important to me. MY work friends are my best friends. So add anything you want!
			Let me know if I havent added anyone or if I should invite someone in the comments!</p>
			
			<h4 id="listTitle"><strong>Items in Time Capsule:</strong></h4>
			<ul id="taking">
				<li><i>Sergio</i> added "Drunk night at the beach!" - drunkbeach.jpg</li><br/>
				<li><i>Deniis</i> added "Gif of Steven falling xD" - hsg1333.gifv</li><br/>
				<li><i>Big O</i> added "Pic of my fat" - fatass.png</li><br/>
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
</html>
