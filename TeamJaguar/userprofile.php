<!--user profile-->
<?php
require_once 'includes/global.inc.php';
?>
<!--abduls part to add images-->
<?php
if(!mysql_connect("localhost","root",""))
{
	echo 'db connection error';
}
if(!mysql_select_db("eventshare"))
{
	echo 'db selection error..';
}
?>

<?php
if(isset($_POST['bt-upload']))
{
	$target_dir="userprofile/";
	$target_file=$target_dir.basename($_FILES['img']['name']);
	$imgType=pathinfo($target_file,PATHINFO_EXTENSION);
	$imgSize=$_FILES['img']['size']/1024; //size in kb
	$check=getimagesize($_FILES['img']['tmp_name']);
	$uploadOk=1;
	$msg='';
	if($check!==false)
	{
		$uploadOk=1;
	}
	else
	{
		$msg .= "file is not image";
		$uploadOk=0;
	}
	
	
	if(!$uploadOk==0)
	{
		if(!move_uploaded_file($_FILES['img']['tmp_name'],$target_file))
		{
			$msg.="error in uploading image..";
		}
		else
		{
			$delete=mysql_query("DELETE FROM image WHERE username=".'"'.$_SESSION["username"].'"');
		
			$insert=mysql_query("INSERT INTO image(name,size,username) VALUES ('".$_FILES['img']['name']."','".$imgSize."','".$_SESSION["username"]."')"      );
		
		}
	}
}
?>

<!--added by abdul 4/12/17-->
<?php 
if(isset($_POST['background-upload']))
{
	$target_dir="userprofile/";
	$target_file=$target_dir.basename($_FILES['backgroundimg']['name']);
	$imgType=pathinfo($target_file,PATHINFO_EXTENSION);
	$imgSize=$_FILES['backgroundimg']['size']/1024; //size in kb
	$check=getimagesize($_FILES['backgroundimg']['tmp_background']);
	$uploadOk=1;
	$msg='';
	move_uploaded_file($_FILES['backgroundimg']['tmp_name'],$target_file);

			$delete=mysql_query("DELETE FROM backgroundimage WHERE username=".'"'.$_SESSION["username"].'"');
		
			$insert=mysql_query("INSERT INTO backgroundimage(background,username) VALUES ('".$target_file."','".$_SESSION["username"]."')"      );
		
		
	

}
?>
<!-- end abdul 4/12/17 -->

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<!--<link rel="stylesheet" href="indexPageCSS.css">
<link rel="stylesheet" href="sideNav.css">-->
<link rel="stylesheet" href="simpleCSS.css">
<link rel="stylesheet" href="userprofile.css">
<link rel="stylesheet" href="form.css">
<link rel="stylesheet" href="userprofile_button.css">
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
<!-- added/updated by abdul 4/12/17-->
<?php

$backgroundquery=mysql_query("SELECT * FROM backgroundimage WHERE username=".'"'.$_SESSION["username"].'"');
$backgroundresult=mysql_fetch_array($backgroundquery)

?>
<body id="homePageBody" background="<?php echo $backgroundresult['background']; ?>">

<!-- end added/updated by abdul 4/12/17-->
	 <?php include("sideBar.php"); ?>
	<!--class="jumbotron"-->
		<div class="container">
            <div class="row"> 
				<div class="center-block">
					<div>
						<h1 id="titleName"><?php echo $_SESSION["username"]; ?>'s Profile</h1>
					</div>
				</div>
				<div class="center-block">
						<div class="row">
							<div class="center-block">
								<div class="well">
									<!--abdul's part!!! -->
									
									<div id="inputImageForm">
               
										<?php
										$query=mysql_query("SELECT * FROM image WHERE username=".'"'.$_SESSION["username"].'"');
										$result=mysql_fetch_array($query)
		
										?>
										
										<!--<img src="userprofile/main.jpg" alt="time capsule" style="width: 430px; height: 240px;" >-->
										<form method="post" enctype="multipart/form-data" id="profilePic">
											<b>Edit user picture</b><input type="file" name="img" size="20" />	
											<input type="submit" name="bt-upload" value="Upload" />
										</form>
										<!-- form to change the background image added by abdul-->
										<form method="post" enctype="multipart/form-data" id="backgroundPic">
											<b>Edit background</b><input type="file" name="backgroundimg" />
											<input type="submit" name="background-upload" value="Upload" />
										</form>
										<!-- end form to change backgrnd-->
									</div>
									<img src="userprofile/<?php echo $result['name']; ?>" height="240px" width="430px" alt="<?php echo $result['name']; ?>" />
									<!-- sentence --> 
									<h1 id="introduction">Hey Gang!</h1>
									<div id="functionButtons">
									<ol class="breadcrumb">
									  <li><a href="#" id="hideImageEdit">Edit Image</a></li>
									  <li><a href="#">+Capsule</a></li>
									  <li><a href="#">-Capsule</a></li>
									  <li><a href="#">+Friends</a></li>
									  <li><a href="#">+Message</a></li>
									</ol>
								</div>
									
								</div>
							</div>
						</div>
				</div><!--end center block-->
				<!--end menu-->
				<div class="center-block">
					<div class="row">
						<div class="center-block">
							<div class="well">
								<!-- sentence --> 
								<h1 id="introduction">About Me:</h1>
								<h4 id = "introductionStatement">My name is Sergio, I just want to make memories. Add me if you know me!</h4>
							</div>
						</div>
					</div>
				</div> <!--end info block-->
				<div class="center-block">
					<div class="row">
						<div class="center-block">
							<div class="well">
								<!-- sentence --> 
								<h1 id="introduction">Friends:</h1>
								<!--grab people with array and foreach-->
									<a href="#">CTpopher - Chris Vargas</a><br/>
									<a href="#">BigAbduu - Abdul Rahim</a><br/>
							</div>
						</div>
					</div>
				</div> <!--end info block-->
				<div class="center-block">
					<div class="row">
						<div class="center-block">
							<div class="well">
								<!-- sentence --> 
								<h1 id="introduction">Time Capsules I belong to:</h1>
								<table class="table table-condensed">
							<thead>
							  <tr>
								<th>Capsule Name</th>
								<th>Close Date</th>
								<th>Open Date</th>
							  </tr>
							</thead>
							<tbody>
							  <tr>
								<td><a href="timecapsuleexample2.php"/>Sergio's Work</a></td>
								<td>03/15/2017</td>
								<td>03/15/2018 @ 8:30 AM</td>
							  </tr>
							</tbody>
						  </table>
							</div>
						</div>
					</div>
				</div> <!--end info block-->
			</div>
		</div>
		
</body>
<script>

$(document).ready(function(){
	$("#inputImageForm").hide();
    $("#hideImageEdit").click(function(){
        $("#inputImageForm").toggle();
    });
});
</script>
</html>