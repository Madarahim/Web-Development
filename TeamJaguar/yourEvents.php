<!-- this php file saves new events to db-->
<?php 

require_once 'includes/global.inc.php';
require_once 'classes/event.class.php';
require_once 'usersevents.class.php';

//check to see if they're logged in
if(!isset($_SESSION['logged_in'])) {
	header("Location: login.php");
}
$userid = $user->id;
$username = $user->username;

//initialize php variables used in the form
$ename = "cool";
$elocation="my house";
$eimage = null;
$etype = "party";
$eDate = "2014-12-12";
$eTime = "05:12:12";
$eAnticipatedPeople = 5;

$userTools = new UserTools();
	
//prep the data for saving in a new user object
$data['ename'] = $ename;
$data['elocation'] = $elocation;
$data['eimage'] = $eimage;
$data['etype'] = $etype; //encrypt the password for storage
$data['eDate'] = $eDate;
$data['eTime'] = $eTime;
$data['eAnticipatedPeople'] = $eAnticipatedPeople;
	
//create the new user object
$newEvent = new Event($data);

	
//save the new user to the database
$newEvent->save(true);
$eid = $newEvent->eID;

$dataPK['eid'] = $eid;
$dataPK['id']= $userid;
$dataPK['username']= $username;
$newUsersEvent = new UsersEvents($dataPK);
$newUsersEvent->save(true);
//$newUsersEvent->setEvent($eid, $userid, $username);
//if($newEvent->save = true){
	//echo "correct";
//}
//$newUsersEvent->save(true);

	    
	



//initialize php variables used in the form



//check to see that the form has been submitted
//If the form wasn't submitted, or didn't validate
//then we show the registration form again
?>

hi <?php echo $username ?>, id: <?php echo $userid ?> event id <?php echo $eid ?> done!