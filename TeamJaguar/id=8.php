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
	 <div class="jumbotron" style="background-color: black !important;">
	  <h1 id="Eventname">Sergio's Party</h1>
	  <p id="eventsub">I'm excited! - Room ID: 8</p>
	</div>
	<div>
		<div id="functionButtons">
			<ol class="breadcrumb">
			  <li><button type="button" class="btn btn-link" data-toggle="modal" data-target="#myModal">Add Item</button></li>
			  <li><a href="#">Delete Item</a></li>
			  <li><a href="#">Invite</a></li>
			</ol>
	
		</div>
		<!--list of things we have and what we dont have-->
		<div>
			<h4><strong>What we need:</strong></h4>
			
			
			<h4 id="listTitle"><strong>What we have:</strong></h4>
			
		</div>
		
	</div>
	
	<!-- Button trigger modal -->

<!-- Modal --> <!-- doesnt do anything at this time! -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Item</h4>
      </div>
      <div class="modal-body">
        <form action="eventcreator.php" method= "post">
		<div class="form-group">
			<input type="text" class="form-control" placeholder="food name: ie. pizza" id="eName" name="eName">
		</div>
		<div class="form-group">
			<input type="text" class="form-control" placeholder ="amount: ie. 3" id="eName" name="eName">
		</div>
		<div class="form-group">
			<input type="text" class="form-control" placeholder ="details: ie. little ceasars please!" id="eName" name="eName">
		</div>
		<div class="form-group">
			<button type="button" class="btn btn-primary">+Item</button>
		</div>
		
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
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
