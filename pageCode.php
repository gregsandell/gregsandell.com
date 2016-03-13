<?php
	$_cpath = $_SERVER['DOCUMENT_ROOT'];
	$g_section = "code";
	$linksTitle = "Other Site Links";
	$inlinePhp = "/innerPageCode.php";
	
	$mainCopy = "";
include($_cpath . "/objSidebar.php");
$g_sidebarKey = "pageCode";
$g_slideshowKey = "logos";

include($_cpath . "/templateMain.php");

?>
