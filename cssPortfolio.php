<?php
	$_cpath = $_SERVER['DOCUMENT_ROOT'];
	include_once($_cpath . "/objGlobals.php");
	$g_globals = new GlobalsObj();
	$fontFamily = "font-family: Verdana, Arial, Helvetica, sans-serif;";
	$cssBasic = "\n" . $fontFamily . "\n" .
      "		font-size: 13px;\n" .
      "		font-weight: normal;\n" .
      "		line-height: 19px;\n" .
      "		color: #000000;";
	$tableBorder = "0";
	$imageBorder = "0";
	$iconWidth = 138;
	$remainWidth = 800 - ($iconWidth * 2);
?>
/*
	H1, H2, H3 {
		<?php print($fontFamily) ?>
	}
	*/
	DL {
		<?php print($cssBasic) ?>
	}
	DT {
		font-weight: bold;
		padding-top: 7px;
	}

	BODY {
	  background-color: #CCCCCC;
	  leftmargin: 0px;
	  topmargin: 0px;
	  marginwidth: 0px;
	  marginheight: 0px;
	}
	LI {
		<?php print($cssBasic) ?>
	}
	P {
		<?php print($cssBasic) ?>
	}
	TD.portfolioTitle {
		<?php print($cssBasic) ?>
		font-size: 25px;
		line-height: 35px;
		font-weight: bold;
		text-align: center;
		padding-bottom: 7px;
	}
	TD.portfolioSubTitle {
		<?php print($cssBasic) ?>
		font-size: 15px;
		line-height: 20px;
		font-weight: bold;
		text-align: left;
		padding-bottom: 7px;
	}
	TD.portfolioText {
		<?php print($cssBasic) ?>
		font-size: 12px;
		line-height: 20px;
		text-align: left;
		padding-bottom: 7px;
	}
	TR.docDescription {
		<?php print($cssBasic) ?>
		padding: 7px 7px 7px 7px;
	}
	TD.docDescription {
		<?php print($cssBasic) ?>
		padding: 7px 7px 7px 7px;
	}
	TR.docHeader {
		<?php print($cssBasic) ?>
		padding: 7px 7px 7px 7px;
		font-size: 19px;
		line-height: 25px;
		font-weight: bold;
		text-align: center;
	}
	/*
	A:link {
		<?php print($cssBasic) ?>
		font-weight: bold;
		color: navy;
	}
	A:visited {
		<?php print($cssBasic) ?>
		font-weight: bold;
		color: navy;
	}
	A:hover {
		<?php print($cssBasic) ?>
		font-weight: bold;
		color: blue;
	}
	A.bread:link {
		<?php print($cssBasic) ?>
		font-size: 10px;
		font-weight: bold;
		color: navy;
	}
	A.bread:visited {
		<?php print($cssBasic) ?>
		font-size: 10px;
		font-weight: bold;
		color: navy;
	}
	A.bread:hover {
		<?php print($cssBasic) ?>
		font-size: 10px;
		font-weight: bold;
		color: blue;
	}
	A.doclink:link {
		<?php print($cssBasic) ?>
		font-size: 12px;
		color: navy;
	}
	A.doclink:visited {
		<?php print($cssBasic) ?>
		font-size: 12px;
		color: navy;
	}
	A.doclink:hover {
		<?php print($cssBasic) ?>
		font-size: 12px;
		color: blue;
	}
	*/
	TD.bread {
		<?php print($cssBasic) ?>
		font-size: 10px;
	}
	.docSubHead {
		<?php print($cssBasic) ?>
		font-size: 11px;
	}
	.siteTitle {
		font-weight: bold; 
		font-size: 14px;
	}
	.portfolioDisplay {
		position: relative;
		vertical-align: top;
		left: 0px;
		top: 0px;
		height: 610px;
		width: 525px;
	}
	.<?php print($g_globals->Key->ies) ?>Portfolio {
		position: absolute;
		left: 0px;
		top: 0px;
		width: 525px;
		padding-left: 13px;
		padding-top: 13px;
		height: auto;
		vertical-align: top;
	}
	.<?php print($g_globals->Key->maytag) ?>Portfolio {
		position: absolute;
		left: 0px;
		top: 0px;
		width: 525px;
		padding-left: 13px;
		padding-top: 13px;
		height: auto;
	}
	.<?php print($g_globals->Key->watts) ?>Portfolio {
		position: absolute;
		left: 0px;
		top: 0px;
		width: 525px;
		padding-left: 13px;
		padding-top: 13px;
		height: auto;
	}
	.<?php print($g_globals->Key->xb) ?>Portfolio {
		position: absolute;
		left: 0px;
		top: 0px;
		width: 525px;
		padding-left: 13px;
		padding-top: 13px;
		height: auto;
	}
	.<?php print($g_globals->Key->billwhitney) ?>Portfolio {
		position: absolute;
		left: 0px;
		top: 0px;
		width: 525px;
		padding-left: 13px;
		padding-top: 13px;
		height: auto;
	}
	.<?php print($g_globals->Key->spectrum) ?>Portfolio {
		position: absolute;
		left: 0px;
		top: 0px;
		width: 525px;
		height: auto;
		padding-left: 13px;
		padding-top: 13px;
	}
	.<?php print($g_globals->Key->abn) ?>Portfolio {
		position: absolute;
		left: 0px;
		top: 0px;
		width: 525px;
		height: auto;
		padding-left: 13px;
		padding-top: 13px;
	}
	.<?php print($g_globals->Key->amex) ?>Portfolio {
		position: absolute;
		left: 0px;
		top: 0px;
		width: 525px;
		height: auto;
		padding-left: 13px;
		padding-top: 13px;
	}
	.<?php print($g_globals->Key->usaf) ?>Portfolio {
		position: absolute;
		left: 0px;
		top: 0px;
		width: 525px;
		height: auto;
		padding-left: 13px;
		padding-top: 13px;
	}
	.<?php print($g_globals->Key->ubs) ?>Portfolio {
		position: absolute;
		left: 0px;
		top: 0px;
		width: 525px;
		height: auto;
		padding-left: 13px;
		padding-top: 13px;
	}
	.<?php print($g_globals->Key->tr) ?>Portfolio {
		position: absolute;
		left: 0px;
		top: 0px;
		width: 525px;
		height: auto;
		padding-left: 13px;
		padding-top: 13px;
	}
	.<?php print($g_globals->Key->path) ?>Portfolio {
		position: absolute;
		left: 0px;
		top: 0px;
		width: 525px;
		height: auto;
		padding-left: 13px;
		padding-top: 13px;
	}
	TD.projIconCell {
		width: <?php print($iconWidth) ?>px;
		padding-bottom: 7px;
		vertical-align: top;
		text-align: right;
	}
	TD.projLinkCell {
		width: <?php print($iconWidth) ?>px;
		vertical-align: top;
		padding: 0px 0px 17px 0px; 
	}
	TD.displayCell {
		width: <?php  print($remainWidth) ?>px;
		vertical-align: top;
	}
	.basic {
	<?php print($cssBasic) ?>
	}
	.quiet {
		font-style: italic;
		font-size: 11px;
	}
	.clientTitle {
		<?php print($cssBasic) ?>
		font-size: 15px;
		font-weight: bold;
		margin-top: 7px;
	}


