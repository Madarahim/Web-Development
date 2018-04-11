<?php
require_once 'classes/UserTools.class.php';
require_once 'classes/DB.class.php';


class UsersEvents {

	public $eid;
	public $id;
	public $username;

	//Constructor is called whenever a new object is created.
	//Takes an associative array with the DB row as an argument.
	function __construct($data) {
		$this->eid = (isset($data['eid'])) ? $data['eid'] : "";
		$this->id = (isset($data['id'])) ? $data['id'] : "";
		$this->username= (isset($data['username'])) ? $data['username'] : "";
	}
	
	public function setEvent($EVENTID, $USERID, $USERNAME){
		$id= $USERID;
		$username = $USERNAME;
		$eid = $EVENTID;
	}

	public function save($isNewUser = false) {
		//create a new database object.
		$db = new DB();
		
		$data = array(
				"id" => "'$this->id'",
				"username" => "'$this->username'",
				"eid" => "'$this->eid'",
				
		);

		$this->eid = $db->insert($data, 'usersevents'); 
	
	return true;
	}
	
}

?>