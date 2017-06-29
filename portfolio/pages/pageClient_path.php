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
	$g_key = $g_globals->Key->path;
	$g_sidebarKey = "pageClient_" . $g_key;
	$g_section = "samples";
	$linksTitle = "Other Site Links";
	$position = $g_resume->getPosition($g_key);
	$mainCopy = "";
	if (isset($position)) {
		/* 'Maytag' is a client in the portfolio, but not a 'position' in the resume */
		$mainCopy = "<h1>Client: Pathfinder Software</h1>";
	}
	$inlinePhp = $_cpath . "/portfolio/innerClientGallery.php";
	$inlinePhp2 = $_cpath . "/portfolio/innerClientDescription.php";
	$mainCopy2 = "<div>";
    $g_engagementDetails = "The samples here show work for three clients.  Two of these are mobile applications for medical purposes. <i>AACN Bedside</i> is an iPhone app replacing old laminated card media sold by the American Association of Critical Care Nurses.  This is a hybrid mobile app written with a web stack but wrapped inside a native app so it could be sold on the App Store.  <i>ContinuCare</i> is an iPad ‘digital concierge’ for the iPad for client Kimberly-Clark, to connect heart patients, their nurses and caregivers.  <i>MetroPulse</i> is an interactive web tool for exploring census and demographic data for client <i>Chicago Metropolitan Agency for Planning</i>.";

include($_cpath . "/templateMain.php");

?>
