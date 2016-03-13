<?php
	include("SessionObj.php");
	$g_session = new Session();
	$key = isset($_REQUEST['key']) ? $_REQUEST['key'] : "foo";
	$portfolioPhp = $g_session->isAuthenticated() ? "documentsByType.php" :"index.php";
	$portfolioPhp = "index.php";
	if ($g_session->isAuthenticated()) {
		// $g_session->sendPortfolioPageviewEmail($key);
	}
		
	$iconWidth = 138;
	$remainWidth = 800 - ($iconWidth * 2);
	$cssBasic = "font-family: Verdana, Arial, Helvetica, sans-serif;\n" .
      "font-size: 13px;\n" .
      "font-weight: normal;\n" .
      "line-height: 19px;\n" .
      "color: #000000;";
	$tableBorder = "0";
	$imageBorder = "0";
	include("portfolioData.php");
	$g_portfolio = new Portfolio();
	$g_portfolio->loadData();
	$client = $g_portfolio->getClient($key);

?>
<html>
	<head>
		<title>Greg Sandell's Portfolio - <?php print($client->description) ?></title>
		<?php include("portfolioCss.php"); ?>
		<script type="text/javascript">
			function privacy() {
				alert("PRIVACY NOTE\n\nThe form on this page requests your email address ONLY for the purpose of restricting access to certain confidential pages.  When you request access to the restricted area, your email address is being used as a passcode and nothing more.  It will not be used for unsolicited email or marketing research.\n\nThank you,\nGreg Sandell");
			}
		</script>
	</head>
	<body>
		<table width="800" border="<?php print($tableBorder) ?>" cellspacing="0" cellpadding="0">
			<tr>
				<td class="bread" colspan="2">
				<span class="siteTitle">gregsandell.com</span><br/>
			You are here: <a class="bread" href="../index.php">Home</a> &gt; <a class="bread" href="<?php print($portfolioPhp) ?>">Clients</a> &gt; <?php print($client->linkText) ?>
				</td>
			</tr>
			<tr >
				<td colspan="2" class="portfolioTitle" colspan="3"><?php print($client->client) ?></td>
			</tr>
			<tr>
				<td> <?php
					if ($client->hostedState == 'none') { ?>
							<img src="<?php print($client->image) ?>" width="<?php print($client->width) ?>" height="<?php print($client->height) ?>" border="<?php print($imageBorder) ?>" valign="top"/> <?php
					}
						else { ?>
							<a href="portfolioPopup.php?site=<?php print($client->key) ?>" TARGET=_BLANK><img src="<?php print($client->image) ?>" width="<?php print($client->width) ?>" height="<?php print($client->height) ?>" border="<?php print($imageBorder) ?>" valign="top"/></a> <?php
						} ?>
				</td>
				<td>
							<ul>
							<li><b>What:</b> <?php print($client->description) ?></li>
								<li><b>My Role:</b> <?php print($client->role) ?></li>
									<!-- <li><b>Status:</b> I am still on this project</li>  -->
								<li><b>Technologies:</b> <?php print($client->technologies) ?></li>
								<li><b>Timeframe:</b> <?php print($client->timeframe) ?></li>  <?php
								if ($client->hostedState != 'none') { ?>
									<li><a href="portfolioPopup.php?site=<?php print($client->key) ?>" TARGET=_BLANK>Visit <?php print($client->hostedState) ?> site</a> (popup window)</li>  <?php
								} ?>
							</ul>
				</td>
			</tr>
		</table>
	<?php if ($g_session->isAuthenticated()  && sizeof($client->documents) > 0) {  ?>
		<table width="800" border="<?php print($tableBorder) ?>" cellspacing="0" cellpadding="0">
			<tr class="docHeader">
				<td colspan="3">
					<br/>Project Documents<br/>
					<span class="docSubHead">
						Below are various documents relating to the <?php print($client->linkText) ?> project.<br/> 
					</span>
				</td>
			</tr>
			<?php
			foreach ($client->documents as $document) { ?>
				<tr class="docDescription">
<td><a href="<?php print($document->getUrl()) ?>" TARGET=_BLANK><img src="<?php print($g_portfolio->getIcon($document->type)) ?>" width="32" height="32" border="0"></a></td>
					<td class="docDescription"><a href="<?php print($document->getUrl()) ?>" TARGET=_BLANK><?php print($document->title) ?></a></td>
					<td class="docDescription"><p><?php print($document->description) ?></p></td>
				</tr>  <?php
				}  ?>
		</table> <?php
		} ?>
	</body>
</html>
