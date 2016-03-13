<?php
	$_cpath = $_SERVER['DOCUMENT_ROOT'];
	$section = "samples";
	$mainCopy = "";
	$linksTitle = "Clients";
	include("portfolio/portfolioData.php");
	$g_portfolio = new Portfolio();
	$g_portfolio->loadData();
	$g_sidebarKey = "pageSamples";
include($_cpath . "/templateMain.php");

?>
