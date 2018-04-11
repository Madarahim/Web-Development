<?php
error_reporting(0);

require_once 'includes/global.inc.php';

if(isset($_POST['search']))
{
	$valueToSearch = $_POST['valueToSearch'];
	$query =  "SELECT * FROM capsule WHERE cname LIKE '%".$valueToSearch."%'";
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
<link rel="stylesheet" href="capsulesearch.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300">
<link rel="stylesheet" href="bootstrap/bootstrap/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<html>
<head>

<!--<h1 id="eventTitle">EVENT SHARE</h1>-->

    <title/>T.C.</title>
	<link rel="shortcut icon" href="eventIcon.ico" />
</head>
<body id="homePageBody" >
	

     <?php include("sideBar.php"); ?>

	
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
									<input type="text" name="valueToSearch" placeholder="Sergio's Work"><br><br>
									<input type="submit" name="search" value="Search"><br><br>
									<table class="table table-condensed">
										<thead>
											<tr>
												<th>Name</th>
												<th>Owner</th>
												<th>Close Date</th>
												<th>People in Capsule</th>
												<th>Link</th>

											</tr>
										</thead>
										<?php while($row = mysqli_fetch_array($search_result)){?>
										<tbody>
											<tr>
												<td><?php echo $row['cname'];?></td>
												<td><?php echo $row['cAdmin'];?></td>
												<td><?php echo $row['cDateClosed'];?></td>
												<td><?php echo $row['numberPeople'];?></td>
												<td><a href="<?php echo $row['link'];?>">Go</a></td>
												
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