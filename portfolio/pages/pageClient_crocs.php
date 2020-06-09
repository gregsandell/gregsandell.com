<?php
	$_cpath = $_SERVER['DOCUMENT_ROOT'];
	if (!isset($g_resume)) {
		include_once($_cpath . "/resume/objResume.php");
		$resMan = new ResumeManager();
		$g_resume = $resMan->res;
	}
	if (!isset($g_globals)) {
		include_once($_cpath . "/objGlobals.php");
		$g_globals = new GlobalsObj();
	}
	$g_slideshowKey = "projects";
	$g_key = $g_globals->Key->crocs;
	$g_sidebarKey = "pageClient_" . $g_key;
	$g_section = "portfolio";
	$linksTitle = "Other Site Links";
	$position = $g_resume->getPosition($g_key);
	$mainCopy = "";
	if (isset($position)) {
		/* 'Maytag' is a client in the portfolio, but not a 'position' in the resume */
		$mainCopy = "<h1>Client: " . $position->company . "</h1>";
	}
	$inlinePhp = $_cpath . "/portfolio/innerClientGallery.php";
	$inlinePhp2 = $_cpath . "/portfolio/innerClientDescription.php";
	$mainCopy2 = "<div>";
    $g_engagementDetails = "Created Automated UI Testing Platform for the crocs.com eCommerce site";
	$g_title = 'Greg Sandell - Portfolio - eCommerce';

include($_cpath . "/templateMain.php");

?>