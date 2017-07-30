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
	$g_key = $g_globals->Key->ies;
	$g_sidebarKey = "pageClient_" . $g_key;
	$g_section = "portfolio";
	$linksTitle = "Other Site Links";
	$position = $g_resume->getPosition($g_key);
	$g_title = 'Greg Sandell - Portfolio - Education';
	$mainCopy = "";
	if (isset($position)) {
		/* 'Maytag' is a client in the portfolio, but not a 'position' in the resume */
		$mainCopy = "<h1>Client: " . $position->company . "</h1>";
	}
	$inlinePhp = $_cpath . "/portfolio/innerClientGallery.php";
	$inlinePhp2 = $_cpath . "/portfolio/innerClientDescription.php";
	$mainCopy2 = "<div>";
    $g_engagementDetails = "Architected company website (www.IESAbroad.org) replacing an older and increasingly brittle ASP/IIS system.  Developed XML-based content management system and a flexible, extensible page templating system around 40 different study abroad programs in 26 centers in 19 countries.";

include($_cpath . "/templateMain.php");

?>
