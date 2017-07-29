<?php
	$_cpath = $_SERVER['DOCUMENT_ROOT'];
	$g_section = "talks";
	$linksTitle = "Other Site Links";
	$inlinePhp = $_cpath . "/talks/innerPageTalks.php";
	
	$mainCopy = "";
include($_cpath . "/objSidebar.php");
$g_sidebarKey = "pageTalks";
$g_slideshowKey = "logos";
$g_title = "Greg Sandell - Talks";

include($_cpath . "/templateMain.php");

?>
