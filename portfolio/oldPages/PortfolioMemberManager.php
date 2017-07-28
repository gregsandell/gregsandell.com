<?php
	require_once 'DB.php'; 
	require_once '/home/db/DbConfigManager.php';
	include 'DateObj.php';
class PortfolioMemberManager {
	var $users;
	var $EXPIRATION_BY_DATE = "dateExpiration";
	var $EXPIRATION_BY_DAYS = "daysExpiration";
	var $EXPIRATION_INVALID = "invalidExpiration";
	var $AUTHENTICATION_SUCCEEDED = "succeeded";
	var $UNKNOWN_USER = "unknownUser";
	var $EMPTY_DATE = "00/00/0000";
	function PortfolioMemberManager() {
		$users = array();
		$db = $this->connect();
		$res = $this->makeQuery($db);
		$this->fillUsers($res);
		$db->disconnect(); 
	}
	function isUser($user) {
		return(isset($this->users[$user]));
	}
	function getUser($user) {
		return($this->users[$user]);
	}	
	function getUserExpirationType($member) {
		$result = $this->EXPIRATION_INVALID;
		if ($this->isUser($member)) {
			$userObj = $this->getUser($member);
			if (intval($userObj->numDays) > 0) {
					$result = $this->EXPIRATION_BY_DAYS;
			}
			if ($userObj->starts != $this->EMPTY_DATE &&
						$userObj->expires != $this->EMPTY_DATE) {
				$result = $this->EXPIRATION_BY_DATE;
			}
		}
		return($result);
	}
	function authenticate($member) {
		$reason = $this->AUTHENTICATION_SUCCEEDED;
		if (!$this->isUser($member)) {
			return($this->UNKNOWN_USER);
		}
		$userObj = $this->getUser($member);
		$dateObj = new DateObj();
		switch($this->getUserExpirationType($member)) {
			case $this->EXPIRATION_INVALID:
				$reason = $this->EXPIRATION_INVALID;
				break;
			case $this->EXPIRATION_BY_DATE:
				if (!$dateObj->isAfterToday($userObj->expires)) {
					$reason = $this->EXPIRATION_BY_DATE;
				}
				break;
			case $this->EXPIRATION_BY_DAYS:
				$started = $this->_updateStarted($userObj);
				$expirationDate = $dateObj->addDays($started, intval($userObj->numDays));		
				if (!$dateObj->isAfterToday($expirationDate)) {
					$reason = $this->EXPIRATION_BY_DAYS;
				}	
				break;
		}
		return($reason);
	}
	function _updateStarted($userObj) {
		$started = $userObj->started;
		if ($started == $this->EMPTY_DATE) {
			$dateObj = new DateObj();
			$sql = "update user set started = CURRENT_DATE() where pk = " . $userObj->pk; 
			$db = $this->connect();
			$db->query($sql); 
			$sql = "select DATE_FORMAT(started, '%m/%d/%Y') as started from user where pk = " . $userObj->pk;
			$res = $db->query($sql); 
			if (DB::isError($res)) {
	   		 die($res->getMessage());  
			}
			$row = $res->fetchRow(DB_FETCHMODE_OBJECT);
	    if (DB::isError($row)) {
	        die($row->getMessage()); 
		  }
			$started = $row->started;
		}
		return($started);
	}
		
	function findMemberOnQueryString() {
		foreach ($this->users as $user) {
			if (isset($_REQUEST[$user->name])) {
				return($user->name);
			}
		}
		return("");
	}

	function fillUsers($res) {
		while ($row = $res->fetchRow(DB_FETCHMODE_OBJECT)) {
	    if (DB::isError($row)) {
	        die($row->getMessage());  // fetchRow can return an error object
	                                  // like most PEAR::DB methods.
	    }
			$name = $row->name;
			$this->users[$name] = new UserObj($row->pk, $name, $row->starts, $row->expires, $row->numDays, $row->started);
		}
	}

		
	function makeQuery($db) {
		$sql = "SELECT pk as pk, name as name, DATE_FORMAT(starts, '%m/%d/%Y') as starts, DATE_FORMAT(expires, '%m/%d/%Y') as expires, numDays as numDays, DATE_FORMAT(started, '%m/%d/%Y') as started from user";
		$res = $db->query($sql);        // $db->query processes the query in the
                                // string $sql, using the database
                                // connection we built before in $db.
                                //
                                // $res will be a result resource object
                                // or an error object

		if (DB::isError($res)) {        // Check the result object in case there
   		 die($res->getMessage());    // was an error, and handle it here.
		}
		return($res);
	}

		
	function connect() {
		$cfgManager = new DbConfigManager();
		$cfg = $cfgManager->getCfg("portfolio");
		$dsn = $cfg->getDsnString();
		$db = DB::connect($dsn, TRUE); 
		if (DB::isError($db)) {         // Check whether the object is a connection or // an error.
			die($db->getMessage());     // Print out a message and exit if it's 
		}
		return($db);
	}
}
class UserObj {
	var $pk;
	var $name;
	var $starts;
	var $expires;
	var $numDays;
	var $started;
	function UserObj($pk, $name, $starts, $expires, $numDays, $started) {
		$this->pk = $pk;
		$this->name = $name;
		$this->starts = $starts;
		$this->expires = $expires;
		$this->numDays = $numDays;
		$this->started = $started;
	}

}

?>	
