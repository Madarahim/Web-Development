<?php
//Items.php
require_once 'includes/global.inc.php';
include ("Items.class.php");


$iName_deli = "";
$iName_cuttlery = "";
$iName_veggies = "";
$iName_condements = "";
$iName_entertainment = "";
$iName_drinks= "";
$iQty_deli = "";
$iQty_cuttlery = "";
$iQty_veggies = "";
$iQty_drinks = "";

if(isset($_POST['submit-form'])){
	
	$iName_deli = $_POST['item'];
	$iQty_deli = $_POST['item_deli'];
	$iName_cuttlery = $_POST['Cutlery'];
	$iName_veggies = $_POST['Veggies'];
	$iName_condements = $_POST['Condements'];
	$iName_entertainment = $_POST['Entertainment'];
	$iName_drinks= $_POST['Drinks'];
	$iQty_cuttlery = $_POST['item_cuttlery']
	$iQty_veggies = $_POST['item_veggies'];
	$iQty_drinks = $_POST['item_drinks'];
}
	

?>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="bootstrap/bootstrap/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<html>

<style>
h2{background-color:black; color: white; border: 1px solid; padding:0; margin:0; font-family: "Courier New", georgia, verdana}
h1{color: black; padding:5; margin:0; font-family: "Times New Roman", georgia, verdana}

#reg{font-size: 14px;}
p{display: incline-block;}
</style>

<head>
<title/>ItemsPage</title>
</head>

<div>
<h4>Which items are you bringing to the event?</h4>
</div>

<div>
<form action = "Event.class.php" method = "post" onsubmit = "return notification()">
<input type="checkbox" id = "checkbox" name="item" value="Deli">Meat<br> 
<label for = "item_deli">How many lbs are you bringing?</label><br>
<input id = "item_deli" type = "radio" value = "1" name = "item_deli">1
<input id = "item_deli" type = "radio" value = "2" name = "item_deli">2
<input id = "item_deli" type = "radio" value = "3" name = "item_deli">3
<input id = "item_deli" type = "radio" value = "4" name = "item_deli">4
<input id = "item_deli" type = "radio" value = "5" name = "item_deli">5+
<br>
<br>
</div>

<div>
<input type="checkbox" name="Cutlery" value="Plates">Plates<br>
<input type="checkbox" name="Cutlery" value="Forks">Forks<br>
<input type="checkbox" name="Cutlery" value="Cups">Cups<br>
<input type="checkbox" name="Cutlery" value="Spoons">Spoons<br>
<input type="checkbox" name="Cutlery" value="Knives">Knives<br>
<label for = "item_cuttlery">How many bags are you bringing?</label><br>
<input id = "item_cuttlery" type = "radio" value = "1" name = "item_cuttlery">1
<input id = "item_cuttlery" type = "radio" value = "2" name = "item_cuttlery">2
<input id = "item_cuttlery" type = "radio" value = "3" name = "item_cuttlery">3
<input id = "item_cuttlery" type = "radio" value = "4" name = "item_cuttlery">4
<input id = "item_cuttlery" type = "radio" value = "5" name = "item_cuttlery">5+
<br>
<br>
</div>

<div>
<input type="checkbox" name="Veggies" value="Salad">Salad<br>
<input type="checkbox" name="Veggies" value="Lettuce">Lettuce<br>
<input type="checkbox" name="Veggies" value="Tomatoes">Tomatoes<br>
<label for = "item_veggies">How many bags are you bringing?</label><br>
<input id = "item_veggies" type = "radio" value = "1" name = "item_veggies">1
<input id = "item_veggies" type = "radio" value = "2" name = "item_veggies">2
<input id = "item_veggies" type = "radio" value = "3" name = "item_veggies">3
<input id = "item_veggies" type = "radio" value = "4" name = "item_veggies">4
<input id = "item_veggies" type = "radio" value = "5" name = "item_veggies">5+
<br>
<br>
</div>

<div>
<input type="checkbox" name="Condements" value="Ketchup">Ketchup<br>
<input type="checkbox" name="Condements" value="Mustard">Mustard<br>
<input type="checkbox" name="Condements" value="Relish">Relish<br>
<input type="checkbox" name="Condements" value="BBQ Sauce">BBQ Sauce<br>
<input type="checkbox" name="Condements" value="Ranch">Ranch<br>
<br>
<input type="checkbox" name="Entertainment" value="Music">Music<br>
<input type="checkbox" name="Entertainment" value="Instruments">Instruments<br>
<input type="checkbox" name="Entertainment" value="Games">Games
<br>
<br>
</div>

<div>
<input type="checkbox" name="Drinks" value="Water">Water<br>
<input type="checkbox" name="Drinks" value="Soda">Soda<br>
<input type="checkbox" name="Drinks" value="Alcohol">Alcohol<br>
<label for = "item_drinks">How many gallons are you bringing?</label><br>
<input id = "item_drinks" type = "radio" value = "1" name = "item_drinks">1
<input id = "item_drinks" type = "radio" value = "2" name = "item_drinks">2
<input id = "item_drinks" type = "radio" value = "3" name = "item_drinks">3
<input id = "item_drinks" type = "radio" value = "4" name = "item_drinks">4
<input id = "item_drinks" type = "radio" value = "5" name = "item_drinks">5+
<br>
<a href = "EventCreator.php">Back</a>
<input type="submit" value="Submit" name = "submit-form">

<script>
function notification()
{
	alert("Your request has been submitted! We will now make your event avaliable for public viewing. Thank you for using Event Sharer!");
	window.location.replace("index_loggedIn.php");
	return false;
}
</script>


</form>
</div>

</html>