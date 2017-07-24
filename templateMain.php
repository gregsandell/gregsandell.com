<?php
	$_cpath = $_SERVER['DOCUMENT_ROOT'];
	if (!isset($g_section)) {
		die("In file 'templateMain.php', the global var 'g_section' was not set by the including file.  At the very least it must be set to a blank string.");
	}
	if (!isset($g_title)) {
		$g_title = 'Greg Sandell';
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title><?php print($g_title) ?></title>
	<LINK REL="SHORTCUT ICON" HREF="/image/favicon.ico" />
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta http-equiv="Content-Style-Type" content="text/css" />
	<meta http-equiv="Content-Script-Type" content="text/javascript" />

	<link rel="stylesheet" href="/lib/avgrund/0.1/avgrund.css" >
	<style type="text/css">
	    <?php include("{$_cpath}/lib/funride/cssFunride.php") ?>
	    <?php include("{$_cpath}/css/cssPortfolio.php") ?>
	</style>
	<link rel="stylesheet" href="/lib/avgrund/0.1/demo.css" >
	<link rel="stylesheet" href="/lib/avgrund/0.1/avgrund.css" >
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
				<li class="<?php print($g_section == 'samples' ? 'active' : '') ?>"><a href="/portfolio/templatePortfolio.php">Portfolio</a></li>
				<li class="<?php print($g_section == 'code' ? 'active' : '') ?>"><a href="/code/pageCode.php">Code</a></li>
				<li class="<?php print($g_section == 'music' ? 'active' : '') ?>"><a href="/music/pageMusic.php">Music</a></li>
				<li class="<?php print($g_section == 'blogs' ? 'active' : '') ?>"><a href="/blog/pageBlogs.php">Blog</a></li>
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
	</div>
	<!-- end div#footer -->
</div>
<div id="dialog-confirm" class="avgrund-popup">
	<h2 style="color: #AA2808">Tip</h2>
	<br/>
	<p>Links marked with arrow icons
	(<img src="/image/wikipediaExternalPage.png"> or <img src="/image/wikipediaExternalPageGold.png">)
	will open in a new tab.</p>
	<p>You will see this message only once.</p>
	<button onclick="closeDialog();">OK</button>
	<button onclick="cancelDialog();">Cancel</button>
</div>
<div class="avgrund-cover"></div>


<!-- end div#wrapper -->
<script type="text/javascript" src="/lib/jquery/3.2.1/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="/lib/html5lightbox/7.0/html5lightbox.js"></script>
<script type="text/javascript" src="/lib/js-cookie/2.1.4/js.cookie.js"></script>
<script type="text/javascript" src="/lib/avgrund/0.1/avgrund.js"></script>
<script type="text/javascript" src="/js/warnExternalLinks.js"></script>
</body>
</html>
