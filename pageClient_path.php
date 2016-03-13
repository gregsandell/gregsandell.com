<?php
	if (!isset($g_resume)) {
		include_once($_SERVER['DOCUMENT_ROOT'] . "/objResume.php");
		$resMan = new ResumeManager();
		$g_resume = $resMan->res;
	}
	if (!isset($g_globals)) {
		include_once($_SERVER['DOCUMENT_ROOT'] . "/objGlobals.php");
		$g_globals = new GlobalsObj();
	}
	$g_slideshowKey = "projects";
	$g_key = $g_globals->Key->path;
	$g_sidebarKey = "pageClient_" . $g_key;
	$g_section = "samples";
	$linksTitle = "Other Site Links";
	$position = $g_resume->getPosition($g_key);
	$mainCopy = "";
	if (isset($position)) {
		/* 'Maytag' is a client in the portfolio, but not a 'position' in the resume */
		$mainCopy = "<h1>Client: American Association of Critical Care Nurses</h1>";
	}
	$inlinePhp = "/innerClientGallery.php";
	$inlinePhp2 = "/innerClientDescription.php";
	$mainCopy2 = "<div>";
    $g_engagementDetails = "Wrote this hybrid iOS/web appstore application for the American Association of Critical Care Nurses (AACN) to replace their print media version of their product (laminated cards) with an iPhone app.  Written using jQuery Mobile, JSON, AngularJS, Trigger.io, and TestFlight";

include($_cpath . "/templateMain.php");

?>
