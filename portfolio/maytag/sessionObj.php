<?php 
class Session {
	var $authenticated;
	var $members;
	var $user;
	function Session() {
		session_name("18thStreet");
		session_start();
		$this->user = isset($_SESSION["user"]) ? $_SESSION["user"] : "";
		$this->authenticated = isset($_SESSION["authenticated"]) ? $_SESSION["authenticated"] : "";
		$this->members = array();
		$this->loadMembers();
	}
	function loadMembers() {
		$this->addMember("sears");
		$this->addMember("protech");
	}
	function addMember($user) {
		$this->members[$user] = $user;
	}
	function authenticate() {
		$member = $this->findMemberOnQueryString();
		if ($member != "") {
			$this->setAuthenticated(true);
			$this->setUser($member);
			$this->sendAuthenticationEmail();
		}
	}
	function findMemberOnQuerystring() {
		foreach ($this->members as $member) {
			if (isset($_REQUEST[$member])) {
				return($member);
			}
		}
		return("");
	}

	function setUser($user) {
		$this->user = $user;
		$_SESSION["user"] = $this->user;
	}
	function isAuthenticated() {
		return($this->authenticated == 'true');
	}
	function notAuthenticated() {
		return($this->authenticated != 'true');
	}
	function setAuthenticated($state) {
		$this->authenticated = $state ? "true" : "false";
		$_SESSION["authenticated"] = $this->authenticated;
	}
	function logout() {
		$this->setAuthenticated(false);
		$this->user = "";
	}
	function getUser() { 
		return($this->user);
	}
	function sendPageviewEmail($url) {
		$emailMsg = "[" . $this->getUser() . "] viewed page [" . $url . "]";
		$emailSubj = "[" . $this->getUser() . "] viewed [..." . substr($url, -20) . "]";
		$this->emailAlert($emailSubj, $emailMsg);
	}
	function sendAuthenticationEmail() {
		$timeArray = localtime();
		setLocale(LC_ALL, 0);
		putenv("TZ=US/Central");
		$timeStamp = strftime("%a, %I:%M %p(CST), %b %d, %Y");
		$emailMsg = "[". $this->getUser() . "] authenticated at " . $timeStamp;
		$this->emailAlert($emailMsg, $emailMsg);
	}
	function emailAlert($sbj, $msg) {
		$myname = "Greg Sandell's Portfolio Email Spy";
		$myemail = "greg.sandell@gmail.com";
		$contactname = "18thStreet.net Webmaster";
		$contactemail = $myemail;
		$myreplyemail = $myemail;
		$headers = "MIME-Version: 1.0\r\n"; 
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
		$headers .= "From: ".$myname. " <" .$myemail.">\r\n"; 
		$headers .= "To: ".$contactname." <".$contactemail.">\r\n"; 
		$headers .= "Reply-To: ".$myname." <$myreplyemail>\r\n"; 
		$headers .= "X-Priority: 1\r\n"; 
		$headers .= "X-MSMail-Priority: High\r\n"; 
		$headers .= "X-Mailer: Just My Server";
		return(mail ($myemail, $sbj, $msg, $headers));
	}
}
