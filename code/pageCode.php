<?php
	$_cpath = $_SERVER['DOCUMENT_ROOT'];
	$g_section = "code";
	$linksTitle = "Other Site Links";
	$inlinePhp = $_cpath . "/code/innerPageCode.php";
	
	$mainCopy = "";
include($_cpath . "/objSidebar.php");
$g_sidebarKey = "pageCode";
$g_slideshowKey = "logos";
$g_title = "Greg Sandell - Code";

include($_cpath . "/templateMain.php");

?>
