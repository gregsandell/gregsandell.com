<?php
	$_cpath = $_SERVER['DOCUMENT_ROOT'];
	$g_section = "portfolio";
	$linksTitle = "Other Publications";
	$inlinePhp = $_cpath . "/portfolio/innerPageDissertation.php";
	
	$mainCopy = "";
	include($_cpath . "/objSidebar.php");
	$g_sidebarKey = "pagePublications";
	$g_slideshowKey = "";

	include($_cpath . "/templateMain.php");

?>
