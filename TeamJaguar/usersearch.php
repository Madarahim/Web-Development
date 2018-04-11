<?php
error_reporting(0);

require_once 'includes/global.inc.php';

if(isset($_POST['search']))
{
	$valueToSearch = $_POST['valueToSearch'];
	$query =  "SELECT * FROM users WHERE username LIKE '%".$valueToSearch."%'";
	$search_result=setTable($query);
	$query2 = "Select * from capsule where cAdmin = '".$_SESSION["username"]."'";
	$search_result2=setTable($query2);
 
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
$countCapsules = 0;

//first loop consumes all data in mysql so nothing left
//this while loop stores the data in rows
$rows = array ();
while($row2 = mysqli_fetch_array($search_result2)){
	$rows[] = $row2;
}

//get the link from the selected value
$select1 = $_POST['capsule_name_select'];

?>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<!--<link rel="stylesheet" href="indexPageCSS.css">
<link rel="stylesheet" href="sideNav.css">-->
<link rel="stylesheet" href="simpleCSS.css">
<link rel="stylesheet" href="usersearch.css">
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
						<h1 id="titleName">Search for User</h1>
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
												<th></th>
												<th>Username</th>
												<th>First Name</th>
												<th>Last Name</th>
												<th>Add To Your Capsule</th>
											</tr>
										</thead>
										<tbody>
										
										<?php while($row = mysqli_fetch_array($search_result)){?>
										
											<tr>
												<td><?php echo $count++;?></td>
												<td><?php echo $row['username'];?></td>
												<td><?php echo $row['fname'];?></td>
												<td><?php echo $row['lname'];?></td>
												<!--4/13/17 chris' code-->
												<td>
													<select name="capsule_name_select" onchange="location = this.value;">
														<option>--Select Capsule--</option>
														<?php foreach($rows as $row){ ?>
															<option value="<?php echo $row['link'];?>"><?php echo $row['cname'];?></option>
														<?php }?>
													</select>
												</td>
											</tr>
										
										<?php } ?>
										<tbody>
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