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
	$g_key = $g_globals->Key->tenx;
	$g_sidebarKey = "pageClient_" . $g_key;
	$g_section = "samples";
	$linksTitle = "Other Site Links";
	$position = $g_resume->getPosition($g_key);
	$mainCopy = "";
	if (isset($position)) {
		/* 'Maytag' is a client in the portfolio, but not a 'position' in the resume */
		$mainCopy = "<h1>Client: " . $position->company . "</h1>";
	}
	$inlinePhp = $_cpath . "/portfolio/innerClientGallery.php";
	$inlinePhp2 = $_cpath . "/portfolio/innerClientDescription.php";
	$mainCopy2 = "<div>Here is some friendly mainCopy2";
    $g_engagementDetails = "Front End Developer on the <b>auction.com</b> Real Estate auction platform.  This is an eBay-like hosted web application allowing RE investors to bid for Bank-Owned or Foreclosed properties.";

include($_cpath . "/templateMain.php");

?>
