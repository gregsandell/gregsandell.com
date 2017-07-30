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
	$g_key = $g_globals->Key->maytag;
	$g_sidebarKey = "pageClient_" . $g_key;
	$g_section = "portfolio";
	$linksTitle = "Other Site Links";
	$position = $g_resume->getPosition($g_key);
	$g_title = 'Greg Sandell - Portfolio - eCommerce';
	$mainCopy = "";
	if (isset($position)) {
		$mainCopy = "<h1>Client: " . $position->company . "</h1>";
	}
	$inlinePhp = $_cpath . "/portfolio/innerClientGallery.php";
	$inlinePhp2 = $_cpath . "/portfolio/innerClientDescription.php";
	$mainCopy2 = "<div>";
    $g_engagementDetails = "Team lead (13 developers) for major design and technology overhaul of Maytag Corp's website and online product catalogue. Architected and developed the approaches for authentication, membership architecture, session management, cookie-management, URL-rewriting, auto-signin and sticky routing on Broadvision platform.";

include($_cpath . "/templateMain.php");

?>
