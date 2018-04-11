<!--php file for collecting your events from the db-->
<?php
//require_once 'UserTools.class.php';
//require_once 'DB.class.php';

class GetEvents{
	public $userid;
	public $username;
	public $eventID;
	
	function __construct($data){
		$numEvent = $data;
	}
	
	public function getName(){
		//$db = new DB();
		//$info = $db->selectInfo("events.ename", "users natural join usersevents natural join events");
		//print_r(array_values($info));
		//while(list($key,$val) = each($info)){
		//	echo "$val
		//	<br>";
		//}

	}
	
	public function getLocation(){
		
	}
	
	public function getPeople(){
		
	}
	
}
?>