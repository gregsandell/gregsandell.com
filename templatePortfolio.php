<?php
	$_cpath = $_SERVER['DOCUMENT_ROOT'];
	$iconWidth = 138;
	$remainWidth = 800 - ($iconWidth * 2);
	$numIcons = 8;
	$mainViewRowspan = $numIcons;
	$g_section = "samples";
	include_once($_cpath . "/objPortfolio.php");
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>Greg Sandell</title>
		<meta name="keywords" content="" />
		<meta name="description" content="" />
		<style type="text/css">
			<?php include($_cpath . "/cssFunride.php") ?>
			<?php include($_cpath . "/cssPortfolio.php") ?>
		</style>
		<base url="<?php print($_cpath) ?>" />
		<script type="text/javascript">
			var g_projectNames = new Array(
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
	<div id="header">
		<div id="logo">
			<h1 class="logoH1"><a href="http://www.gregsandell.com">Greg Sandell</a></h1>
			<h2>Samples and Portfolio</h2>
		</div>
		<!-- end div#logo -->
		<div id="menu">
			<ul>
				<li class="<?php print($g_section == 'home' ? 'active' : '') ?>"><a href="noMobileHome.php">Home</a></li>
				<li class="<?php print($g_section == 'resume' ? 'active' : '') ?>"><a href="/resume/pageResume.php">Resume</a></li>
				<li class="<?php print($g_section == 'samples' ? 'active' : '') ?>"><a href="templatePortfolio.php">Portfolio</a></li> 
				<li class="<?php print($g_section == 'code' ? 'active' : '') ?>"><a href="/code/pageCode.php">Code</a></li>
				<li class="<?php print($g_section == 'talks' ? 'active' : '') ?>"><a href="/talks/pageTalks.php">Talks</a></li>
				<li class="<?php print($g_section == 'blogs' ? 'active' : '') ?>"><a href="/blog/pageBlogs.php">Blog</a></li>
			</ul>
		</div>
		<!-- end div#menu -->
	</div>
	<!-- end div#header -->
	<div id="page">
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
									<td align="right">
										<!-- <a href="pageClient_<?php print($key) ?>.php"><img src="image/readMore.png" border="0" /></a> -->
									</td>

								</tr>
							</table>
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
		<div id="sidebar">
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
