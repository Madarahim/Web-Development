
<?php
// Event.Class

require_once 'classes/UserTools.class.php';
require_once 'classes/DB.class.php';
//require_once 'tc_calendar.class.php';

class Event{

	// The event class will be an object that users create, giving
	// it a name, date, time, and will choose the event type.
	// Each event will have an ID to in order to track all events
	// and will connect to each person's distinct user ID from the 
	// database.
	
	public $eid;  //event ID number to be generated numerically
	public $etime; // time of the event to be set by the user
	public $edate; // date of the event to be set by the user
	public $eventType; //type of event to be set by the user
	public $attendees; // # of attendees of the event
	public $efkUserId; // time of the event to be set by the user
	
	
	//Constructor is called whenever a new object is created.
	
	function __construct() {
		$this->eid = "";
		$this->etime = "";
		$this->edate = "";
		$this->eventType = "";
		$this->efkUserId = "";
	}
	
	// Define the various get and set methods of the event class
	
	} // end class
	function getTime()
	{
	
	}
	
	
	function getDates(){
		
	
	}
	function setTypes(){
	
	// Bring up a box that contains the different types to select from
	// Also defin what types the user should be able to select
	
	
	}
	function getTypes($eventType)
	{
		$this->eventType = $eventType;
	}
	



?>

