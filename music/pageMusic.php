<?php
	$_cpath = $_SERVER['DOCUMENT_ROOT'];
	$g_section = "music";
	$linksTitle = "Other Site Links";
	$inlinePhp = $_cpath . "/music/innerPageMusic.php";
	
	$mainCopy = "";
	include($_cpath . "/objSidebar.php");
	$g_sidebarKey = "pageMusic";
	$g_slideshowKey = "logos";

	include($_cpath . "/templateMain.php");


?>
