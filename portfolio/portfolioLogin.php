<?php
	$email = $_POST["email"];
	$route = $_POST["route"];
	session_name("18thStreet");
	session_start();
	$timeArray = localtime();
	setLocale(LC_ALL, 0);
	putenv("TZ=US/Central"); 
	$timeStamp = strftime("%a, %I:%M %p(CST), %b %d, %Y");
	$emailMsg = "[" . $email . "] authenticated at " . $timeStamp;
	$failedEmailMsg = "[" . $email . "] failed authentication " . $timeStamp;
	switch($email) {
		case "orin.fink@thirdwavellc.com":
		case "jeff.janda@thirdwavellc.com":
		case "rajiv.synghal@navteq.com":
		case "jsokel@g2switchworks.com":
			$_SESSION["authenticated"] = "true";
			$_SESSION["email"] = $email;
			// emailAlert($emailMsg, $emailMsg);
			break;
		case "gjs0146":
			$_SESSION["authenticated"] = "true";
			$_SESSION["email"] = $email;
			break;
		default:
			// emailAlert($failedEmailMsg, $failedEmailMsg);
	}
	$url = $route . "/";
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

?>
<html>
	<head>
		<script type="text/javascript">
			location.href = "<?php print($url) ?>";
		</script>
	</head>
	<body/>
</html>

