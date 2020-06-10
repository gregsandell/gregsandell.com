<?php
	$_cpath = $_SERVER['DOCUMENT_ROOT'];
	$userAgent = strtolower($_SERVER['HTTP_USER_AGENT']);
	$isIE = strpos($userAgent, 'msie') || strpos($userAgent, 'trident/7');
	if (!isset($g_section)) {
		die("In file 'templateMain.php', the global var 'g_section' was not set by the including file.  At the very least it must be set to a blank string.");
	}
	if (!isset($g_title)) {
		$g_title = 'Greg Sandell';
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title><?php print($g_title) ?></title>
	<LINK REL="SHORTCUT ICON" HREF="/image/icons/favicon.ico?v=2" type="image/x-icon" />
	<link href="/image/icons/apple-touch-icon.png" rel="apple-touch-icon" />
	<link href="/image/icons/apple-touch-icon-152x152.png" rel="apple-touch-icon" sizes="152x152" />
	<link href="/image/icons/apple-touch-icon-167x167.png" rel="apple-touch-icon" sizes="167x167" />
	<link href="/image/icons/apple-touch-icon-180x180.png" rel="apple-touch-icon" sizes="180x180" />
	<link href="/image/icons/icon-hires.png" rel="icon" sizes="192x192" />
	<link href="/image/icons/icon-normal.png" rel="icon" sizes="128x128" />
	<meta name="keywords" content="software development,software developer,software development,software programmer,software programming,software engineer,software engineering,web software development,web software developer,web software engineering,web software engineer,web software programming,web software programmer,web application development,web application developer,web application engineering,web application engineer,web application programming,web application programmer,javascript development,javascript developer,javascript engineering,javascript engineer,javascript programming,javascript programmer,react development,react developer,react engineering,react engineer,react programming,react programmer,node.js development,node.js developer,node.js engineering,node.js engineer,node.js programming,node.js programmer,salesforce development,salesforce developer,salesforce engineering,salesforce engineer,salesforce programming,salesforce programmer,salesforce commerce cloud development,salesforce commerce cloud developer,salesforce commerce cloud engineering,salesforce commerce cloud engineer,salesforce commerce cloud programming,salesforce commerce cloud programmer" />
	<meta name="description" content="Greg Sandell provides client Web Application solutions of high quality and reliability using Javascript/Node.js/React Front End Development, Selenium-based Automated UI Testing, Salesforce Commerce Cloud eCommerce, load testing, SQL database design, asynchronous/multi-threaded processing, secure authentication, messaging, and integrating third party software.  Greg Sandell has worked for enterprise clients in retail eCommerce, Real Estate, Executive Search, Healthcare, AdTech, Publishing, Finance, Defense, and Travel. Greg Sandell is also an accomplished classical pianist, electric bass player, and composer." />

	<link rel="stylesheet" href="/lib/avgrund/0.1/avgrund.css" >
	<style>
	    <?php include("{$_cpath}/lib/funride/cssFunride.php") ?>
	    <?php include("{$_cpath}/css/cssGlobal.php") ?>
	</style>
	<link rel="stylesheet" href="/lib/avgrund/0.1/avgrund.css" >
</head>
<body>
<div id="wrapper">
	<header id="header">
		<div id="logo">
			<h1><a href="/">Greg Sandell</a></h1>
			<h2>Front End Web Developer</h2>
		</div>
		<!-- end div#logo -->
		<nav id="menu">
			<ul>
				<li class="<?php print($g_section == 'home' ? 'active' : '') ?>"><a href="/home/pageHome.php">Home</a></li>
				<li class="<?php print($g_section == 'resume' ? 'active' : '') ?>"><a href="/resume/pageResume.php">Resume</a></li>
				<li class="<?php print($g_section == 'portfolio' ? 'active' : '') ?>"><a href="/portfolio/templatePortfolio.php">Portfolio</a></li>
				<li class="<?php print($g_section == 'code' ? 'active' : '') ?>"><a href="/code/pageCode.php">Code</a></li>
				<li class="<?php print($g_section == 'music' ? 'active' : '') ?>"><a href="/music/pageMusic.php">Music</a></li>
				<li class="<?php print($g_section == 'blogs' ? 'active' : '') ?>"><a href="/blog/pageBlogs.php">Blog</a></li>
			</ul>
		</nav>
		<!-- end div#menu -->
	</header>
	<!-- end div#header -->
	<main id="page">
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
		<aside id="sidebar">
			<?php	include("{$_cpath}/templateSidebar.php"); ?>
		</aside>
		<!-- end div#sidebar -->
		<div style="clear: both; height: 1px"></div>
	</main>
	<!-- end div#page -->
	<?php if (!$isIE) { ?>
        <footer id="footer">
            <p id="legal">Copyright &copy; 2007 Greg Sandell. All Rights Reserved.
        </footer>
    <?php }
    ?>
	<!-- end div#footer -->
</div>
<div id="dialog-confirm" class="avgrund-popup">
	<h2 style="color: #AA2808">Tip</h2>
	<br/>
	<p>Links marked with arrow icons
	(<img src="/image/wikipediaExternalPage.png" alt="External Page"> or <img src="/image/wikipediaExternalPageGold.png" alt="External Page">)
	will open in a new tab.</p>
	<p>You will see this message only once.</p>
	<button onclick="closeDialog();">OK</button>
	<button onclick="cancelDialog();">Cancel</button>
</div>
<div class="avgrund-cover"></div>


<!-- end div#wrapper -->
<script src="/lib/jquery/3.2.1/jquery-3.2.1.min.js"></script>
<script src="/lib/html5lightbox/7.0/html5lightbox.js"></script>
<script src="/lib/js-cookie/2.1.4/js.cookie.js"></script>
<script src="/lib/avgrund/0.1/avgrund.js"></script>
</body>
</html>
