<? php
// Item.class.php

require_once Event.class.php
require_once EventCreator.class.php

class Items{

	// This class will create item objects that will store the info from users 
	// during the ItemSelection page. Each item object will have a variable for 
	// name and quantity. 

	public var $iName;
	public var $iQty;
	
	function __construct($itemName,$itemQty){	
		$this->iName = $itemName;
		$this->iQty = $itemQty;
	}
	
	function get_name(){
		return $this->iName;
	}
	
	function get_qty(){
		return $this->iQty;
	}



}


?> 