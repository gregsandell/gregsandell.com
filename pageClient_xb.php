<?php
	if (!isset($g_resume)) {
		include_once($_SERVER['DOCUMENT_ROOT'] . "/resume/objResume.php");
		$resMan = new ResumeManager();
		$g_resume = $resMan->res;
	}
	if (!isset($g_globals)) {
		include_once($_SERVER['DOCUMENT_ROOT'] . "/objGlobals.php");
		$g_globals = new GlobalsObj();
	}
	$g_slideshowKey = "projects";
	$g_key = $g_globals->Key->xb;
	$g_sidebarKey = "pageClient_" . $g_key;
	$g_section = "samples";
	$linksTitle = "Other Site Links";
	$position = $g_resume->getPosition($g_key);
	$mainCopy = "";
	if (isset($position)) {
		/* 'Maytag' is a client in the portfolio, but not a 'position' in the resume */
		$mainCopy = "<h1>Client: " . $position->company . "</h1>";
	}
	// $inlinePhp = "/innerClientGallery.php";
	$inlinePhp = "";
	$inlinePhp2 = "/innerClientDescription.php";
	$mainCopy2 = "<div>";
    $g_engagementDetails = "Developer for overhaul of company website in PHP.";

include($_cpath . "/templateMain.php");

?>
