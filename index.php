<?php
    $_http_user_agent = $_SERVER['HTTP_USER_AGENT'];
	$_cpath = $_SERVER['DOCUMENT_ROOT'];

if (strpos($_http_user_agent, "obile") !== false) { ?>
	  <html><head>
    <meta HTTP-EQUIV="REFRESH" content="0; url=/j">
	  </head><body></body></html>  <?php
} else { 
    include("/home/pageHome.php");
}
?>

