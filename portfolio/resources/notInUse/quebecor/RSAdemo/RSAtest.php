<?php
require("bailey.php");
set_time_limit(0);
mt_srand((double)microtime()*10000);
/*
	Possible Querystring variables
*/
	$gq_bits = $_REQUEST['gq_bits'];
	$gq_mtext = $_REQUEST['gq_mtext'];
	$gq_n = $_REQUEST['gq_n'];
	$gq_e = $_REQUEST['gq_e'];
	$gq_d = $_REQUEST['gq_d'];
	$gq_new = $_REQUEST['gq_newkeys'];
	$gq_htext = $_REQUEST['gq_htext'];
	$gq_frame = $_REQUEST['gq_frame'];

$readonly = ""; 
// print("gq_frame = " . $gq_frame);
function framesetHTML() {
	$s = "<html>\n<head>\n<title>Quebecor RSA Encryption Test Page</title>
		</head>\n
		<frameset framespacing=0 cols='50%,*'>
			<frameset framespacing=0 rows='20%,20%,*'>
				<frame name='makeFrame' 
					src='RSAtest.php?gq_frame=makeFrame'
					frameborder='1'/>
				<frame name='transmitFrame' 
					src='RSAtest.php?gq_frame=transmitFrame'
					frameborder='1'/>
				<frame name='encodeFrame' 
					src='RSAtest.php?gq_frame=encodeFrame'
					frameborder='1'/>
			</frameset>\n
			<frameset framespacing=0 rows='50%,*'>
				<frame name='receiveFrame' 
					src='RSAtest.php?gq_frame=receiveFrame'
					frameborder='1'/>
				<frame name='decodeFrame' 
					src='RSAtest.php?gq_frame=decodeFrame'
					frameborder='1'/>
			</frameset>
		</frameset>
		</html>
	";
	return($s);
}
//// print("here 1<br>");
function HTMLheadTitleBody($ttitle) {
	$s = "<html>\n<head>\n<title>" . $ttitle . "</title>\n
		</head>\n<body>\n";
	return($s);
}
// print("here 2<br>");
function HTMLclose() {
	$s = "\n</body>\n</html>\n";
	return($s);
}
function nothing() {
    print(HTMLheadTitleBody("nothing"));
    print("empty frame");
    print(HTMLclose());
}
// print("here 3<br>");
function timerBegin() {
	list($usec, $sec) = explode(" ",microtime());
	return((float)$usec + (float)$sec);
}
// print("here 4<br>");
function timerEnd($sstart) {
	return(timerBegin() - $sstart);
}
// print("here 5<br>");

function eValuesDropdown($ppre) {
	$eValues = array("*", "3","5","7","11","13","17","19","23","65537");
	$ss = "<select name='gq_e'>\n";
	$iSelect = 0;
	for ($i = 0; $i < sizeof($eValues); $i++) {
		if ($ppre == $eValues[$i]) {
			$iSelect = $i;
			break;
		}
	}
	for ($i = 0; $i < sizeof($eValues); $i++) {
		$ss .= sprintf("<option value='%s' ", $eValues[$i]);
		if ($i == $iSelect) {
			$ss .= "SELECTED";
		}
		$ss .= sprintf(">%s\n", $eValues[$i]);
	}
	$ss .= "</select>\n";
	return($ss);
}
function bitsDropdown($ppre) {
	$bitValues = array("16","32","64","128","512","1024","2048");
	$ss = "<select name='gq_bits'>\n";
	$iSelect = 3;
	for ($i = 0; $i < sizeof($bitValues); $i++) {
		if ($ppre == $bitValues[$i]) {
			$iSelect = $i;
			break;
		}
	}
	for ($i = 0; $i < sizeof($bitValues); $i++) {
		$ss .= sprintf("<option value='%s' ", $bitValues[$i]);
		if ($i == $iSelect) {
			$ss .= "SELECTED";
		}
		$ss .= sprintf(">%s\n", $bitValues[$i]);
	}
	$ss .= "</select>\n";
	return($ss);
}


function makeFormHTML() {
	global $gq_e, $gq_bits, $gq_submit;
	$s = "<table cellpadding=0 cellspacing=0 border=0><tr>
		<td><form action='RSAtest.php' name='makeForm' 
					method='GET'>\n
		<input type=hidden name=gq_frame value='makeFrame'>\n
		<b>e: </b>" . eValuesDropdown($gq_e) .
		"<b>bits: </b>" . bitsDropdown($gq_bits) .
		"<input type=Submit name=gq_submit value='Generate New Keys'>\n
		</form></td></tr>
		<tr><td><i>(* - Allows program to select value for <strong>e</strong>)</i></td>
		</tr></table>
	";
	return($s);
}

function transmitFormHTML() {
	global $gq_e, $gq_n, $gq_d, $gq_submit;
/*
		The stuff below was just for checking one of Adam's keys.
	if ($gq_n == "" && $gq_d == "") {
		$gq_n = "d83088dd4b26fdb4339674f695ff02a94848918efea106884f3c5292ff2aa20e96f09cbe53a837ff4e23ecd68eb85754891df3277158124ce9ac1a5d4a62b04d";
		$gq_d = "adb1f914cb5fcd70ee0dd1759938253c3b5e4accb7da4a74542d242f04a28d466e7e9fccc8d2fd2ad9c33fee024f874769fe2e1b1c076b5335c06325907ba425";
	}
*/
	$s = "<form action='RSAtest.php' name='transmitForm' 
					method='GET'>\n
		<input type=hidden name=gq_frame value='transmitFrame'>\n
		<b>e: </b><input type=text name=gq_e size=3 value='" . $gq_e . "' " .
		$readonly . ">
		<b>n: </b><textarea name=gq_n cols=40 rows=1 " . $readonly . ">" . $gq_n . "</textarea><br>\n
		<b>d: </b><textarea name=gq_d cols=40 rows=1 " . $readonly . ">" . $gq_d . "</textarea><br>\n
		<input type=Submit name=gq_submit value='Distribute Keys'>\n
		</form>
	";
	return($s);
}
function encodeFormHTML() {
	global $gq_e, $gq_n, $gq_mtext, $gq_etext, $gq_submit;
	if ($gq_mtext == "") {
/*	This is just a pre-entered message which resembles the token
		that will actually be in use
*/
		$gq_mtext = "<Assertion><EmployeeID>123456789</EmployeeID><TransactionID>45gsrtr6231asd1254653dsf</TransactionID><TimeStamp>20020401gs<Date>04/01/2002</Date><Time>10:04:05:000</Time><TTL>0</TTL></TimeStamp></Assertion>";
		$gq_mtext = "Adam";
	}
	$s = "<form action='RSAtest.php' name='encodeForm' 
//					method='GET'>\n
		<input type=hidden name=gq_frame value='encodeFrame'>\n
		<table border=1 cellpadding=0 cellspacing=0><tr><td>
		<center><b>Public Key</b></center>
		<b>e: </b><input type=text name=gq_e size=3 value='" . $gq_e . "' " . $readonly . ">
		<b>n: </b><textarea name=gq_n cols=40 rows=1 " . $readonly . ">" . $gq_n . "</textarea><br>\n
		</td></tr></table><br>
		<b>Plaintext Message: </b><br><textarea name=gq_mtext cols=50 rows=4>" . 
			$gq_mtext . "</textarea><br>\n
		<b>Encrypted Message: </b><br><textarea name=gq_etext cols=50 rows=4 " . $readonly . ">" . $gq_etext . "</textarea><br>\n
		<input type=Submit name=gq_submit value='Encode &amp; Send Message'>\n
		</form>
	";
	return($s);
}
function receiveFormHTML() {
	global $gq_d, $gq_n, $gq_etext, $gq_submit;
	$s = "<form action='RSAtest.php' name='receiveForm' 
					method='GET'>\n
		<input type=hidden name=gq_frame value='receiveFrame'>\n
		<table border=1 cellpadding=0 cellspacing=0><tr><td>
		<center><b>Private Key</b></center>
		<b>n: </b><textarea name=gq_n cols=40 rows=1 " . $readonly . ">" . $gq_n . "</textarea><br>\n
		<b>d: </b><textarea name=gq_d cols=40 rows=1 " . $readonly . ">" . $gq_d . "</textarea><br>\n
		</td></tr></table><br>
		<b>Encrypted Message: </b><br><textarea name=gq_etext cols=50 rows=4 " . $readonly . ">" . $gq_etext . "</textarea><br>\n
		<input type=Submit name=gq_submit value='Decode Message'>\n
		</form>
	";
	return($s);
}
function decodeFormHTML() {
	global $gq_mtext;
	$s = "<form action='' name='decodeForm' method='GET'>\n
		<input type=hidden name=gq_frame value='decodeFrame'>\n
		<b>Decrypted Message in Plaintext: </b><br><textarea name=gq_mtext cols=50 rows=4 " . $readonly . ">" . 
			$gq_mtext . "</textarea><br>\n
		</form>
		<form action='RSAtest.php' name='startoverForm' target=_top> 
			<input type=hidden name=gq_frame value='start'>\n
			<input type=Submit name=gq_submit value='Done. Start Over.'>\n
		</form>
	";
	return($s);
}
function unhtmlentities ($string)
{
	$trans_tbl = get_html_translation_table (HTML_ENTITIES);
	$trans_tbl = array_flip ($trans_tbl);
	return strtr ($string, $trans_tbl);
}
// print("here 6 gqbits=[" . $gq_bits . "]<br>");
switch($gq_frame) {
	case 'makeFrame':
		print(HTMLheadTitleBody("RSA Test Key Generation frame"));
		print(makeFormHTML());
		$j = "<scrip" . "t language=Javascript>
					parent.makeFrame.document.bgColor = 'yellow';
					parent.transmitFrame.document.bgColor = 'white';
					parent.encodeFrame.document.bgColor = 'white';
					parent.receiveFrame.document.bgColor = 'white';
					parent.decodeFrame.document.bgColor = 'white';
					</scrip" . "t>\n";
		print($j);
		if ($gq_submit != "") {
				$sstart = timerBegin();
				if ($gq_e == "*") {
						list($n, $e, $d)=gen_RSA_keys2($gq_bits);
				}
					else {
						list($n, $e, $d)=gen_RSA_keys($gq_bits, $gq_e);
					}
				$eend = sprintf("%.3f sec.", timerEnd($sstart));
				$temp = gmp_init("0x" . (string)$n);
				$ndec = (string)gmp_strval($temp, 10);
				printf("<i>Processing time:  %s</i>", $eend); 
				$j = "<scrip" . "t language=Javascript>
	//					window.document.bgColor = 'white';
						parent.makeFrame.document.bgColor = 'white';
						parent.transmitFrame.document.bgColor = 'yellow';
						parent.encodeFrame.document.bgColor = 'white';
						parent.receiveFrame.document.bgColor = 'white';
						parent.decodeFrame.document.bgColor = 'white';
						window.document.makeForm.gq_e.value = '" . hexdec($e) . "';
						parent.transmitFrame.document.transmitForm.gq_n.value = '" . 
							$n . "';
						parent.transmitFrame.document.transmitForm.gq_e.value = '" . 
							hexdec($e) . "';
						parent.transmitFrame.document.transmitForm.gq_d.value = '" . 
							$d . "';
						alert('Generating the keys took " . $eend . " of processing ' +

							'time.\\n\\n' +
							'In the highlighted frame, distribute the keys to ' +
							'the Sender and Receiver agents.');  
						</scrip" . "t>\n";
				print($j);
		}
			else {
				$j = "<scrip" . "t language=Javascript>
					alert('Generate a key in the highlighted frame.');
					</scrip" . "t>\n";
				print($j);
			}
		print(HTMLclose());
		break;
	case 'transmitFrame':
		print(HTMLheadTitleBody("RSA Test transmit frame"));
		print(transmitFormHTML());
		if ($gq_submit != "") {
				$j = "<scrip" . "t language=Javascript>
					parent.makeFrame.document.bgColor = 'white';
					parent.transmitFrame.document.bgColor = 'white';
					parent.encodeFrame.document.bgColor = 'yellow';
					parent.receiveFrame.document.bgColor = 'white';
					parent.decodeFrame.document.bgColor = 'white';
					parent.encodeFrame.document.encodeForm.gq_e.value = '" . $gq_e . "';
					parent.encodeFrame.document.encodeForm.gq_n.value = '" . $gq_n . "';
					parent.receiveFrame.document.receiveForm.gq_n.value = '" . $gq_n . "';
					parent.receiveFrame.document.receiveForm.gq_d.value = '" . $gq_d . "';
					alert('Notice that the public key is now known by the Sender ' +
						'and the private key is now known by the Receiver.\\n\\n' +
						'The sender uses only the public key to encode the message.' +
						' It does not know the private key.\\n\\nThe encoded ' +
						'message will be sent to the receiver with a web form ' +
						'submission over the internet.\\n\\n' +
						'The highlighted frame is the Sender.  Choose a message ' +
						'to encode, and send the encoded message to the Receiver.');
					</scrip" . "t>\n";
				print($j);
		}
		print(HTMLclose());
		break;
	case 'encodeFrame':
		print(HTMLheadTitleBody("RSA Test encode frame"));
		print("<h2>Sender</h2>");
		print(encodeFormHTML());
		if ($gq_submit != "") {
				$sstart = timerBegin();
		    $enc = RSA_Encrypt((string)dechex($gq_e), (string)$gq_n, $gq_mtext);
				$eend = sprintf("%.3f sec.", timerEnd($sstart));
				printf("<i>Processing time:  %s</i>", $eend); 
				$encOut = implode("|", $enc);
/*  Stuff for testing a key that Adam gave me.

$encOut = "d83088dd4b26fdb4339674f695ff02a94848918efea106884f3c5292ff2aa20e96f09cbe53a837ff4e23ecd68eb85754891df3277158124ce9ac1a5d4a62b04d";
				$temp1 = gmp_init("0x" . $encOut);
$decEncOut = gmp_strval($temp1, 10);
				$msByte = "{";
				for ($i = 0; $i < strlen($encOut); $i += 2) {
					$comma = ($i == (strlen($encOut)-2)) ? "" : ", ";
					$msByte .= hexdec(substr($encOut, $i, 2)) . $comma;
				}
				$msByte .= "}";
*/
				$j = "<scrip" . "t language=Javascript>
					parent.makeFrame.document.bgColor = 'white';
					parent.transmitFrame.document.bgColor = 'white';
					parent.encodeFrame.document.bgColor = 'white';
					parent.receiveFrame.document.bgColor = 'yellow';
					parent.decodeFrame.document.bgColor = 'white';
					window.document.encodeForm.gq_etext.value = '" . $encOut . "';
					parent.receiveFrame.document.receiveForm.gq_etext.value = '" . $encOut . "';
					alert('It took " . $eend . " to encrypt the message.\\n\\n' + 
						'The message was broken into " . sizeof($enc) . 
						" ' + parent.makeFrame.document.makeForm.gq_bits.value + 
						'-bit blocks.\\n\\n' +
						'The encoded message has been sent and received in ' +
						' the highlighted frame.  Now decode the message.');
					</scrip" . "t>\n";
/* Stuff for testing a token Adam gave me
				$j .= "<scrip" . "t language=Javascript>
					prompt('XML modulus base64 unencoded', '" . 
						base64_decode("2DCI3Usm/bQzlnT2lf8CqUhIkY7+oQaITzxSkv8qog6W8Jy+U6g3/04j7NaOuFdUiR3zJ3FYEkzprBpdSmKwTQ==") . 
					"');
					prompt('The hexModulus as a hex string', '" . $encOut . "');
					prompt('The hexModulus as a hex string, base64 encoded', '" . 
						base64_encode($encOut) . "');
					prompt('The hexModulus as a decimal string', '" . $decEncOut . "');
					prompt('The hexModulus as a decimal string, base64 encoded', '" . 
						base64_encode($decEncOut) . "');
					prompt('Byte array of hexModulus', '" . $msByte . "');
					prompt('Byte array of hexModulus, base64 encoded', '" . 
						base64_encode($msByte) . "');
					</scrip" . "t>\n";
*/
				print($j);
				
		}
		print(HTMLclose());
		break;
	case 'receiveFrame':
		print(HTMLheadTitleBody("RSA Test receive frame"));
		print("<h2>Receiver</h2>");
		print(receiveFormHTML());
		if ($gq_submit != "") {
		    $enc = explode("|", $gq_etext);
				$sstart = timerBegin();
		    $dec=RSA_Decrypt((string)$gq_d, (string)$gq_n, $enc);
				$eend = sprintf("%.3f sec.", timerEnd($sstart));
				printf("<i>Processing time:  %s</i>", $eend); 
				$j = "<scrip" . "t language=Javascript>
					parent.makeFrame.document.bgColor = 'white';
					parent.transmitFrame.document.bgColor = 'white';
					parent.encodeFrame.document.bgColor = 'white';
					parent.receiveFrame.document.bgColor = 'white';
					parent.decodeFrame.document.bgColor = 'yellow';
					parent.decodeFrame.document.decodeForm.gq_mtext.value = '" . unhtmlentities($dec) . "';
					alert('The message has been decrypted.  It took " . $eend .
						" of processing time.\\n\\nDoes the message in ' +
						'the highlighted frame match the original?');
					</scrip" . "t>\n";
				print($j);
				
		}
		print(HTMLclose());
		break;
	case 'decodeFrame':
		print(HTMLheadTitleBody("RSA Test decode frame"));
		print(decodeFormHTML());
		print(HTMLclose());
		break;
	case 'start':
// 		print("in start<br>");
		print(framesetHTML());
		break;  
}
// print("here 7<br>");
//			parent.controlFrame.pageForm.gq_e.value = '" . $e . "';
		
		

?>
