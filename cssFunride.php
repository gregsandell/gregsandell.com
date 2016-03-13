<?php
	$basicWidth = 882;   // or 882
	$contentWidth = 560;   // or 560
	$imgVersion = "";
	$colorLightCharcoal = "#333333";
	$colorMediumCharcoal = "#323B51";
	$colorBrightRust = "#AA2808";
	$colorStraightRed = "#FF0000";
	$colorPaleGold = "#D4C792";
	$colorWhite = "#FFFFFF";

	$colorSiteBackground = $colorMediumCharcoal;
	$colorTabs = $colorLightCharcoal;
	$colorTabHighlightBg = $colorStraightRed;
	$colorTextSubtitle = $colorPaleGold;
	$colorMainBodyBg = $colorPaleGold;
	$colorTextSidebarHeader = $colorPaleGold;
	$colorTextGregLogo = $colorWhite;
	$colorTextSidebar = $colorWhite;
	$colorTextFooter = $colorWhite;
?>
/*
Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 2.5 License
*/
DT {
		color: <?php print($colorBrightRust) ?>;
		font-weight: bold;
		font-size: 14px;
		padding: 12px 0px 5px 0px;
}
.portlet a {
	color: <?php print($colorMediumCharcoal) ?>;
	text-decoration: none;
	font-weight: bold;
}	
.portlet a:hover {
	color: <?php print($colorMediumCharcoal) ?>;
	text-decoration: underline;
	font-weight: bold;
}	
.portlet_content ul {
	list-style-type: none;
	margin-left: 0;
	padding-left: 1em;
	text-indent: -1em;
}


* {
	margin: 0;
	padding: 0;
}

body {
	background: <?php print($colorMainBodyBg) ?> url(image/funride/img01.gif);
	font-family: Arial, Helvetica, sans-serif;
	font-size: 13px;
	color: <?php print($colorTabs) ?>;
}

h1, h2, h3 {
	color: <?php print($colorBrightRust) ?>;
}

P.headerLike {
	color: <?php print($colorBrightRust) ?>;
	font-size: 13px;
	font-weight: bold;
	padding: 0px 0px 4px 0px;
}
P.smallComment {
	font-style: italic;
	font-size: 10px;
}

h1 {
}

h2 {
}

h3 {
}

p, blockquote, ul, ol {
	margin-bottom: 10px;
	line-height: 1.6em;
}

p {
}

blockquote {
}

ul {
}

ol {
}


a {
	text-decoration: underline;
	color: <?php print($colorSiteBackground) ?>;
}

a:hover {
	text-decoration: none;
	color: <?php print($colorTabHighlightBg) ?>;
}

/* Wrapper */

#wrapper {
}

/* Header */

#header {
	width: <?php print($basicWidth) ?>px; 
	height: 96px;
	margin: 0 auto;
	background: url(image/funride/img05<?php print($imgVersion) ?>.gif) no-repeat left bottom;
}

/* Logo */

#logo {
	float: left;
	padding: 20px 0 0 15px;
}


#logo h1 {
	margin: 0;
	padding: 0px 0px 5px 0px;
	font: italic 36px "Trebuchet MS", Arial, Helvetica, sans-serif;
}
h1.logoH1 {
	margin: 0;
	padding: 0px 0px 5px 0px;
	font: italic 36px "Trebuchet MS", Arial, Helvetica, sans-serif;
}

#logo h2 {
	margin: -5px 0 0 0;
	padding: 0;
	text-transform: uppercase;
	letter-spacing: 2px;
	font-size: 10px;
	font-weight: bold;
	color: <?php print($colorTextSubtitle) ?>;
}

#logo a {
	text-decoration: none;
	color: <?php print($colorTextGregLogo) ?>;
}

/* Menu */

#menu {
	float: right;
	padding-right: 10px;
}

#menu ul {
	margin: 0;
	padding: 50px 0 0 0;
	list-style: none;
	line-height: normal;
}

#menu li {
	display: inline;
}

#menu a {
	display: block;
	float: left;
	/* width: 110px;   /* for img02 */
	width: 100px;      /* for img02_slim */
	height: 20px;
	margin: 0;
	padding: 10px 0 0 0;
	/* background: url(image/funride/img02.gif); */
	background: url(image/funride/img02_slim.gif);
	text-align: center;
	text-transform: uppercase;
	font-size: 11px;
	font-weight: bold;
	color: <?php print($colorTextSidebar) ?>;
}

#menu a:hover, #menu .active a {
	/* background-image: url(image/funride/img03.gif); */
	background-image: url(image/funride/img03_slim.gif);
	color: <?php print($colorBrightRust) ?>;
}

/* Page */

#page {
	width: <?php print($basicWidth) ?>px; 
	margin: 0 auto;
	background: <?php print($colorMainBodyBg) ?> url(image/funride/img04<?php print($imgVersion) ?>.gif) repeat-y;
}

/* Content */

#content {
	float: left;
	width: <?php print($contentWidth) ?>px; 
	padding: 30px 0 0 35px;
}

#content h1, #content h2, #content h3 {
	margin-bottom: 20px;
}

#content h1 {
	font-size: 136%;
}

#content h2 {
	font-size: 107%;
}

#content h3 {
	font-size: 92%;
}

#content ul, #content ol {
	list-style-position: inside;
}

#content .boxed {
	float: left;
	width: 46%;
	padding-right: 2%;
}

#content .boxed h2 {
	padding: 5px 0;
}

/* Welcome */

#welcome {
}

/* Sample1 */

#sample {
}

/* Sample2 */

#sample2 {
}

/* Sidebar */

#sidebar {
	float: right;
	width: 208px;
	padding: 0 35px 0 0;
}

#sidebar ul {
	margin: 0;
	padding: 0;
	list-style: none;
	line-height: normal;
}

#sidebar li {
	margin-bottom: 1px;
	padding: 20px 0;
}

#sidebar li ul {
}

#sidebar li li {
	margin: 0;
	padding: 7px 20px;
	border: none;
}

#sidebar h2 {
	padding: 5px 20px;
	border-bottom: 1px dotted <?php print($colorTextSidebar) ?>;
	font-size: 100%;
	color: <?php print($colorTextSidebarHeader) ?>;
}

#sidebar h3 {
	font-size: 77%;
	color: <?php print($colorTextSidebarHeader) ?>;
}

#sidebar p {
	margin: 0;
	line-height: normal;
	color: <?php print($colorTextSidebarHeader) ?>;
}

#sidebar a {
	border: none;
	text-decoration: none;
	color: <?php print($colorTextSidebar) ?>;
}

#sidebar a:hover {
	text-decoration: underline;
}

/* Submenu */

#submenu {
}

/* News */

#news {
}

#news a {
	font-size: 85%;
}

/* Footer */

#footer {
	width: <?php print($basicWidth) ?>px; 
	height: 50px;
	margin: 0 auto;
	padding: 40px 0 0 0;
	background: url(image/funride/img06<?php print($imgVersion) ?>.gif) no-repeat;
	color: <?php print($colorTextFooter) ?>;
}

#footer p {
	margin: 0;
	text-align: center;
	font-size: 77%;
}

#footer a {
	text-decoration: underline;
	color: <?php print($colorTextFooter) ?>;
}

#footer a:hover {
	text-decoration: none;
}
