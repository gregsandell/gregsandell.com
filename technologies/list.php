<?php
	$_cpath = $_SERVER['DOCUMENT_ROOT'];
	$g_section = "technologies";
	$linksTitle = "Other Site Links";
	$mainCopy = "";
	$inlinePhp = $_cpath . "/technologies/innerPageList.php";
	$g_sidebarKey = "potpourri";
	$g_title = "Greg Sandell - Programming Technologies";
	$g_slideshowKey = "logos";
	if (!isset($g_sidebarManager)) {
		include_once($_cpath . "/objSidebar.php");
		$g_sidebarManager = new SidebarPageManager($g_portfolio);
		$g_sidebarManager->load();
	}
include_once($_cpath . "/templateMain.php");

?>


