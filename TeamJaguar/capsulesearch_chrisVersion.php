<?php
error_reporting(0);

require_once 'includes/global.inc.php';

if(isset($_POST['search']))
{
	$valueToSearch = $_POST['valueToSearch'];
	$query =  "SELECT * FROM users WHERE username LIKE '%".$valueToSearch."%'";
	$search_result=setTable($query);
 
}
//else{
//	$query = "SELECT * FROM `users`";
//	$search_result = setTable($query);
//}
function setTable($query){
	$servername = "localhost";
	$databasename = "eventshare";
	$username = "root";
	$password = "";
	$conn = new mysqli($servername, $username, $password, $databasename) or die("Unable to connect");
	$result = mysqli_query($conn, $query);
	return $result;
}

$count =1;
?>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<!--<link rel="stylesheet" href="indexPageCSS.css">
<link rel="stylesheet" href="sideNav.css">-->
<link rel="stylesheet" href="simpleCSS.css">
<link rel="stylesheet" href="sideBar.css">
<link rel="stylesheet" href="usersearch.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300">
<link rel="stylesheet" href="bootstrap/bootstrap/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="sideBarjs.js"></script>
<html>
<head>

<!--<h1 id="eventTitle">EVENT SHARE</h1>-->

    <title/>T.C.</title>
	<link rel="shortcut icon" href="eventIcon.ico" />
</head>
<body id="homePageBody" >
	
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
					<p style="color:white;">...Hello, <?php echo $_SESSION["username"]; ?></p><br/> <a href="logout.php"/>Logout</a>
					<a href="settings.php"/>Change Email</a>
					<a href="userprofile.php"/>Your profile</a>
					<a href="youreventspage.php"/>Your events</a>
					<a href="dashboard.php"/>Dash</a>
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
	
	<div class="container">
            <div class="row"> 
				<div class="center-block">
					<div>
						<h1 id="titleName">Search for Capsule</h1>
					</div>
				</div>
				<!--end menu-->
				<div class="center-block">
					<div class="row">
						<div class="center-block">
							<div class="well">
								<form method="post">
									<input type="text" name="valueToSearch" placeholder="BigDave"><br><br>
									<input type="submit" name="search" value="Search"><br><br>
									<table class="table table-condensed">
										<thead>
											<tr>
												<th>CapsuleName</th>
												<th>Administrator</th>
												<th>CloseDate</th>

											</tr>
										</thead>
										<?php while($row = mysqli_fetch_array($search_result)){?>
										<tbody>
											<tr>
												<td><?php echo $row['capsulename'];?></td>
												<td><?php echo $row['administrator'];?></td>
												<td><?php echo $row['closedate'];?></td>
												
											</tr>
										<tbody>
										<?php } ?>
									</table>

								</form>
							</div>
						</div>
					</div>
				</div> <!--end info block-->
			</div>
		</div>
</body>
</html>