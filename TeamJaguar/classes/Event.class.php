<?php
require_once 'UserTools.class.php';
require_once 'DB.class.php';


class Event {

	public $cID;
	public $cname;
	public $ctype;
	public $cDateClosed;
	public $cDateOpen;

	//Constructor is called whenever a new object is created.
	//Takes an associative array with the DB row as an argument.
	function __construct($data) {
		$this->cID = (isset($data['cID'])) ? $data['cID'] : "";
		$this->cname = (isset($data['cname'])) ? $data['cname'] : "";
		$this->ctype = (isset($data['ctype'])) ? $data['ctype'] : "";
		$this->cDateClosed = (isset($data['cDateClosed'])) ? $data['cDateClosed'] : "";
		$this->cDateOpen = (isset($data['cDateOpen'])) ? $data['cDateOpen'] : "";
	}
	

	public function save($isNewUser = false) {
		//create a new database object.
		$db = new DB();
		
		
		$data = array(
				"cID" => "'$this->cID'",
				"cname" => "'$this->cname'",
				"ctype" => "'$this->ctype'",
				"cDateClosed" => "'$this->cDateClosed'",
				"cDateOpen" => "'$this->cDateOpen'"
		);
			
		$this->eID = $db->insert($data, 'capsule'); 
	
	return true;
	}
	
	public function getID(){
		
	}
	
	public function getName(){
		
	}
	
}

?>