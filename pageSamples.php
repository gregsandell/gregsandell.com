<?php
	$_cpath = $_SERVER['DOCUMENT_ROOT'];
	$g_section = "samples";
	$g_slideshowKey = "logos";
	$mainCopy = "";
	$linksTitle = "Clients";
	include("portfolio/portfolioData.php");
	$g_portfolio = new Portfolio();
	$g_portfolio->loadData();
	$g_sidebarKey = "pageSamples";
include($_cpath . "/templateMain.php");

?>
