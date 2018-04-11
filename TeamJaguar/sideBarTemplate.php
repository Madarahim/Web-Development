<script src="sideBarjs.js"></script>
<link rel="stylesheet" href="sideBar.css">
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