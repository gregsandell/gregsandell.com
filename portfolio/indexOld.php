<?php 
	$iconWidth = 138;
	$remainWidth = 800 - ($iconWidth * 2);
	$numIcons = 8;
	$mainViewRowspan = $numIcons;
	include("portfolioData.php");
	$g_portfolio = new Portfolio();
	$g_portfolio->loadData();
	$cssBasic = "font-family: Verdana, Arial, Helvetica, sans-serif;\n" .
      "font-size: 13px;\n" .
      "tfont-weight: normal;\n" .
      "line-height: 19px;\n" .
      "color: #000000;";
	$tableBorder = "0";
	$imageBorder = "0";
?>
<html>
	<head>
		<title>Greg Sandell - Clients</title>
		<?php include("portfolioCss.php"); ?>
		<script type="text/javascript">
			var g_projectNames = new Array("ies","maytag","watts","xb","whitney","spectrum","abnamro", "amex", "usaf"); 
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
		<table width="800" border="<?php  print($tableBorder) ?>" cellspacing="0" cellpadding="0">
			<tr>
				<td class="bread" colspan="3">
					<span class="siteTitle">gregsandell.com</span><br/>
					You are here: <a class="bread" href="../index.php">Home</a> &gt; Clients
				</td>
			</tr>
			<tr>
				<td class="portfolioTitle" colspan="3">Greg Sandell's Clients</td>
			</tr>
			<tr>
				<td class="projLinkCell">  <?php
						$i = 0;
						$halfway = sizeof($g_portfolio->clients)/2;
						$resumePoint = $halfway + 1;
						foreach ($g_portfolio->clients as $client) {
							$i++;
							if ($i > $halfway) {
									break;
							}
							$key = $client->key;  ?>
							<a href="portfolioPage.php?key=<?php print($key) ?>" onMouseOver="featureMe('<?php print($key) ?>')" >
								<?php print($client->linkText) ?>
							</a>
							<br/>
							<a href="portfolioPage.php?key=<?php print($key) ?>" onMouseOver="featureMe('<?php print($key) ?>')" >
								<img src="<?php print($client->iconImage) ?>" http://gregsandell.com/portfolio/index.phpwidth="<?php print($client->iwidth) ?>" height="<?php print($client->iheight) ?>" border="<?php  print($imageBorder) ?>"/></a>  
									<br/> <?php
						} ?>
				</td>
				<td class="displayCell" rowspan="<?php print($mainViewRowspan) ?>" width="<?php  print($remainWidth) ?>">
					<div class="portfolioDisplay">   
					<?php
						$visible = "visible";
						foreach ($g_portfolio->clients as $client) { 
							$key = $client->key; ?>
							<div id="<?php print($key) ?>Portfolio" class="<?php print($key) ?>Portfolio" style="visibility:<?php print($visible) ?>">
								<a href="portfolioPage.php?key=<?php print($key) ?>">
									<img src="<?php print($client->image) ?>" width="<?php print($client->width) ?>" height="<?php print($client->height) ?>" border="<?php  print($imageBorder) ?>" valign="top"/>
								</a>
							<br/><span class="clientTitle">Client: <?php print($client->client) ?></span>
								<ul style="margin-top: 7px;">
									<li><?php print($client->description) ?></li>
									<li><a href="portfolioPage.php?key=<?php print($key) ?>">Read more about this project</a></li> <?php
									if ($client->hostedState != 'none') { ?>
										<li><a href="portfolioPopup.php?site=<?php print($key) ?>" TARGET=_BLANK >Visit <?php print($client->hostedState) ?> site</a></li>  <?php
									}  ?>
								</ul>
							</div> <?php
							$visible = "hidden";
						} ?>
					</div>
				</td>
				<td class="projLinkCell">  <?php
						$i = 0;
						foreach ($g_portfolio->clients as $client) {
							$i++;
							if ($i < $resumePoint) {
									continue;
							}
							$key = $client->key;  ?>
							<a href="portfolioPage.php?key=<?php print($key) ?>" onMouseOver="featureMe('<?php print($key) ?>')" ><?php print($client->linkText) ?></a><br/>
							<a href="portfolioPage.php?key=<?php print($key) ?>" onMouseOver="featureMe('<?php print($key) ?>')" ><img src="<?php print($client->iconImage) ?>" width="<?php print($client->iwidth) ?>" height="<?php print($client->iheight) ?>" border="<?php  print($imageBorder) ?>"/></a><br/>  <?php
						} ?>
				</td>
			</tr>
		</table>
	</body>
</html>
