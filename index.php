<?php
    include('lib/Mobile_Detect.php');
	$_cpath = $_SERVER['DOCUMENT_ROOT'];
	$detect = new Mobile_Detect;

if ($detect->isMobile() && !$detect->isTablet()) { ?>
	  <html><head>
    <meta HTTP-EQUIV="REFRESH" content="0; url=/j">
	  </head><body></body></html>  <?php
} else { 
    include($_cpath . "/home/pageHome.php");
}
?>

