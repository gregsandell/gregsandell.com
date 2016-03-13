<?php
$_http_user_agent = $_SERVER['HTTP_USER_AGENT'];
if (strpos($_http_user_agent, "obile") !== false) { ?>
	  <html><head>
    <meta HTTP-EQUIV="REFRESH" content="0; url=http://www.gregsandell.com/i">
	  </head><body></body></html>  <?php
} else { 
    $_cpath = $_SERVER['DOCUMENT_ROOT'];
    include($_cpath . "/pageHome.php");
}
?>



