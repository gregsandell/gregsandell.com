<?php
	$_cpath = $_SERVER['DOCUMENT_ROOT'];
	$g_section = "talks";
	$linksTitle = "Other Site Links";
	$inlinePhp = "/innerPageTalks.php";
	
	$mainCopy = "";
include($_cpath . "/objSidebar.php");
$g_sidebarKey = "pageTalks";
$g_slideshowKey = "logos";

include($_cpath . "/templateMain.php");

?>
