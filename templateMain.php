<?php
	$_cpath = $_SERVER['DOCUMENT_ROOT'];
	if (!isset($g_section)) {
		die("In file 'templateMain.php', the global var 'g_section' was not set by the including file.  At the very least it must be set to a blank string.");
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Greg Sandell</title>
	<LINK REL="SHORTCUT ICON" HREF="/image/favicon.ico" />
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta http-equiv="Content-Style-Type" content="text/css" />
	<meta http-equiv="Content-Script-Type" content="text/javascript" />
	<script type="text/javascript" src="/prototype.js"></script>
	<script type="text/javascript" src="/scriptaculous.js"></script>
	<script type="text/javascript" src="/modalbox/modalbox.js"></script>
	<style type="text/css">
	    <?php include("{$_cpath}/cssFunride.php") ?>
	    <?php include("{$_cpath}/cssPortfolio.php") ?>
	</style>
        <link rel="stylesheet" href="/modalbox/modalbox.css" type="text/css" />
</head>
<body>
<div id="wrapper">
	<div id="header">
		<div id="logo">
			<h1><a href="/">Greg Sandell</a></h1>
			<h2>Front End Web Developer</h2>
		</div>
		<!-- end div#logo -->
		<div id="menu">
			<ul>
				<li class="<?php print($g_section == 'home' ? 'active' : '') ?>"><a href="/home/pageHome.php">Home</a></li>
				<li class="<?php print($g_section == 'resume' ? 'active' : '') ?>"><a href="/resume/pageResume.php">Resume</a></li>
				<li class="<?php print($g_section == 'samples' ? 'active' : '') ?>"><a href="/templatePortfolio.php">Portfolio</a></li>
				<li class="<?php print($g_section == 'code' ? 'active' : '') ?>"><a href="/pageCode.php">Code</a></li>
				<li class="<?php print($g_section == 'talks' ? 'active' : '') ?>"><a href="/pageTalks.php">Talks</a></li>
				<li class="<?php print($g_section == 'blogs' ? 'active' : '') ?>"><a href="/pageBlogs.php">Blog</a></li>
			</ul>
		</div>
		<!-- end div#menu -->
	</div>
	<!-- end div#header -->
	<div id="page">
		<div id="content">
			<div id="welcome"> <?php
				/*
				*   INCLUDE TEXT OR FILES HERE
				*/
				if (isset($mainCopy) && !empty($mainCopy) && $mainCopy != "") {
					print($mainCopy);
				}
				if (isset($inlinePhp) && !empty($inlinePhp) && $inlinePhp != "") {
					include($inlinePhp);
				} 
				if (isset($mainCopy2) && !empty($mainCopy2) && $mainCopy2 != "") {
					print($mainCopy2);
				}
				if (isset($inlinePhp2) && !empty($inlinePhp2) && $inlinePhp2 != "") {
					include($inlinePhp2);
				} ?>
			</div>
		</div>
		<!-- end div#content -->
		<div id="sidebar">
			<?php	include("{$_cpath}/templateSidebar.php"); ?>
		</div>
		<!-- end div#sidebar -->
		<div style="clear: both; height: 1px"></div>
	</div>
	<!-- end div#page -->
	<div id="footer">
		<p id="legal">Copyright &copy; 2007 Greg Sandell. All Rights Reserved. 
		<br/>Page Design by <a href="http://www.freecsstemplates.org/">Free CSS Templates</a>.</p>
	</div>
	<!-- end div#footer -->
</div>
<!-- end div#wrapper -->
</body>
</html>
