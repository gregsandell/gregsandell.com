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

    // From cssFunride.php
	$colorLightCharcoal = "#333333";
	$colorMediumCharcoal = "#323B51";
	$colorBrightRust = "#AA2808";
	$colorStraightRed = "#FF0000";
	$colorPaleGold = "#D4C792";
	$colorWhite = "#FFFFFF";

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
  margin: 0;
  margin-left: 0px;
  margin-top: 0px;
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
.<?php print($g_globals->Key->crocs) ?>Portfolio {
	position: absolute;
	left: 0px;
	top: 0px;
	width: 525px;
	height: auto;
	padding-left: 13px;
	padding-top: 13px;
}
.<?php print($g_globals->Key->tenx) ?>Portfolio {
	position: absolute;
	left: 0px;
	top: 0px;
	width: 525px;
	height: auto;
	padding-left: 13px;
	padding-top: 13px;
}
/* No johndeere or cybercoders porftolio */
.<?php print($g_globals->Key->sears) ?>Portfolio {
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
.<?php print($g_globals->Key->tr) ?>Portfolio {
	position: absolute;
	left: 0px;
	top: 0px;
	width: 525px;
	height: auto;
	padding-left: 13px;
	padding-top: 13px;
}
/* no icrossing or tribune portfolio */
.<?php print($g_globals->Key->ubs) ?>Portfolio {
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
.<?php print($g_globals->Key->amex) ?>Portfolio {
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
.<?php print($g_globals->Key->xb) ?>Portfolio {
	position: absolute;
	left: 0px;
	top: 0px;
	width: 525px;
	padding-left: 13px;
	padding-top: 13px;
	height: auto;
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
.moreMusic {
	display: inline;
}
.hiddenSlides {
	display: none;
}
#dialog-confirm p {
	color: #000000;
}
#dialog-confirm {
	background-color: #FFFFFF;
}
#dialog-confirm button {
	border: 0px;
	padding: 8px 10px;
	margin: 5px 0px;
	border-radius: 1px;

	cursor: pointer;
	color: #000;
	background: <?php print($colorPaleGold) ?>;
	font-size: 15px;

	outline: none;

	-webkit-transition: 0.15s background ease;
	   -moz-transition: 0.15s background ease;
	    -ms-transition: 0.15s background ease;
	     -o-transition: 0.15s background ease;
	        transition: 0.15s background ease;
}
#dialog-confirm button:hover {
	background: <?php print($colorMediumCharcoal) ?>;
	color: <?php print($colorWhite) ?>;
}
#dialog-confirm button:active {
	color: #000;
	background: <?php print($colorPaleGold) ?>;
}
#dialog-confirm button+button {
	margin-left: 5px;
}
#dialog-confirm img {
	width: 15px;
	height: 15px;
}
.avgrund-cover {
	width: 880px;
}
.techTitle {
	color: #AA2808;
	padding-top: 0px;
	padding-bottom: 0px;
	margin-top: 0px;
	margin-bottom: 0px !important;
}


