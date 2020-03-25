<?php
	$_cpath = $_SERVER['DOCUMENT_ROOT'];
	$iconWidth = 138;
	$remainWidth = 800 - ($iconWidth * 2);
	$numIcons = 8;
	$mainViewRowspan = $numIcons;
	$g_section = "portfolio";
	include_once($_cpath . "/portfolio/objPortfolio.php");
	include_once($_cpath . "/objGlobals.php");
	$g_globals = new GlobalsObj();
	$g_portfolio = new Portfolio($g_globals);
	$g_portfolio->loadData();
	$cssBasic = "font-family: Verdana, Arial, Helvetica, sans-serif;\n" .
      "font-size: 13px;\n" .
      "tfont-weight: normal;\n" .
      "line-height: 19px;\n" .
      "color: #000000;";
	$tableBorder = "0";
	$imageBorder = "0";
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>Greg Sandell - Portfolio</title>
		<LINK REL="SHORTCUT ICON" HREF="/image/icons/favicon.ico" type="image/x-icon" />
		<link href="/image/icons/apple-touch-icon.png" rel="apple-touch-icon" />
		<link href="/image/icons/apple-touch-icon-152x152.png" rel="apple-touch-icon" sizes="152x152" />
		<link href="/image/icons/apple-touch-icon-167x167.png" rel="apple-touch-icon" sizes="167x167" />
		<link href="/image/icons/apple-touch-icon-180x180.png" rel="apple-touch-icon" sizes="180x180" />
		<link href="/image/icons/icon-hires.png" rel="icon" sizes="192x192" />
		<link href="/image/icons/icon-normal.png" rel="icon" sizes="128x128" />
		<meta name="keywords" content="" />
		<meta name="description" content="" />
		<style>
			<?php include($_cpath . "/lib/funride/cssFunride.php") ?>
			<?php include($_cpath . "/css/cssGlobal.php") ?>
		</style>
		<base url="<?php print($_cpath) ?>" />
		<script >
			var g_projectNames = new Array(
				"<?php print($g_globals->Key->tenx) ?>",
				"<?php print($g_globals->Key->sears) ?>",
				"<?php print($g_globals->Key->path) ?>",
				"<?php print($g_globals->Key->tr) ?>",
				"<?php print($g_globals->Key->ubs) ?>",
				"<?php print($g_globals->Key->usaf) ?>",
				"<?php print($g_globals->Key->abn) ?>",
				"<?php print($g_globals->Key->ies) ?>",
				"<?php print($g_globals->Key->xb) ?>",
				"<?php print($g_globals->Key->maytag) ?>",
				"<?php print($g_globals->Key->watts) ?>",
				"<?php print($g_globals->Key->billwhitney) ?>",
				"<?php print($g_globals->Key->spectrum) ?>");
			function hideObj(elementName) {
				document.getElementById(elementName).style.visibility = 'hidden'
			}
			function showObj(elementName) {
				document.getElementById(elementName).style.visibility = 'visible'
			}
			function featureMe(proj) {
				id = proj + "Portfolio";
				for (i = 0; i < g_projectNames.length; i++) {
					if (proj == g_projectNames[i]) {
							eval("showObj('" + id + "')");
					}
						else {
							id2 = g_projectNames[i] + "Portfolio";
							eval("hideObj('" + id2 + "')");
						}
				}
			}
			function unFeatureMe(proj) {
				eval("hideObj('" + proj + "Portfolio')");
			}
		</script>
	</head>
<body>
<div id="wrapper">
	<header id="header">
		<div id="logo">
			<h1 class="logoH1"><a href="/">Greg Sandell</a></h1>
			<h2>Samples and Portfolio</h2>
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
			<div id="welcome">
				<div class="portfolioDisplay">   
				<?php
					$visible = "visible";
					foreach ($g_portfolio->clients as $client) { 
						$key = $client->key; ?>
						<div id="<?php print($key) ?>Portfolio" class="<?php print($key) ?>Portfolio" style="visibility:<?php print($visible) ?>">
							<table width="500" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td align="left">
										<h1>Client: <?php print($client->client) ?></h1>
									</td>
								</tr>
							</table>
							<p style="text-align: center; font-style: italic">(Click on image for more detail)</p>
							<a href="/portfolio/pages/pageClient_<?php print($key) ?>.php">
								<img src="<?php print($client->image) ?>" width="<?php print($client->width) ?>" height="<?php print($client->height) ?>" border="<?php  print($imageBorder) ?>" valign="top"/>
							</a>
						</div>
						<?php
						$visible = "hidden";
					} ?>
				</div>
			</div>
		</div>
		<!-- end div#content -->
		<aside id="sidebar">
			<ul>
				<li id="submenu">
					<h2>Clients</h2>
					<ul>  <?php
					foreach ($g_portfolio->clients as $client) {   ?>
						<li><a href="/portfolio/pages/pageClient_<?php print($client->url) ?>.php"  onMouseOver="featureMe('<?php print($client->key) ?>')" ><?php print($client->linkText) ?></a></li>  <?php
					}  ?>
					</ul>
				</li>
			</ul>
		</aside>
		<!-- end div#sidebar -->
		<div style="clear: both; height: 1px"></div>
	</main>
	<!-- end main#page -->
	<footer id="footer">
		<p id="legal">Copyright &copy; 2007 Greg Sandell. All Rights Reserved. 
	</footer>
	<!-- end div#footer -->
</div>
<!-- end div#wrapper -->
</body>
</html>
