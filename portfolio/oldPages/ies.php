<?php
	$iconWidth = 138;
	$remainWidth = 800 - ($iconWidth * 2);
	$cssBasic = "font-family: Verdana, Arial, Helvetica, sans-serif;\n" .
      "font-size: 13px;\n" .
      "font-weight: normal;\n" .
      "line-height: 19px;\n" .
      "color: #000000;";
	$tableBorder = "0";
	$imageBorder = "0";
		session_name("18thStreet");
	session_start();
	include("./portfolioData.php");
	$g_portfolio = new Portfolio();
	$g_portfolio->loadData();
	$client = $g_portfolio->getClient('ies');
	$_SESSION["authenticated"] = true;   // bypass the defunct login process

?>
<html>
	<head>
		<title>Greg Sandell's Portfolio - <?php print($client->description) ?></title>
		<style type="text/css">
			LI {
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
			TD.bread {
				<?php print($cssBasic) ?>
				font-size: 10px;
			}

			.docSubHead {
				<?php print($cssBasic) ?>
				font-size: 11px;
			}
		</style>
		<script type="text/javascript">
			function privacy() {
				alert("PRIVACY NOTE\n\nThe form on this page requests your email address ONLY for the purpose of restricting access to certain confidential pages.  When you request access to the restricted area, your email address is being used as a passcode and nothing more.  It will not be used for unsolicited email or marketing research.\n\nThank you,\nGreg Sandell");
			}
		</script>
	</head>
	<body>
		<table width="800" border="<?php print($tableBorder) ?>" cellspacing="0" cellpadding="0">
					<tr><td class="bread" colspan="2">You are here: <a class="bread" href="/index.php">Home</a> &gt; <a class="bread" href="index.php">Old Portfolio</a> &gt; <?php print($client->linkText) ?></td></tr>
			<tr >
				<td colspan="2" class="portfolioTitle" colspan="3"><?php print($client->linkText) ?></td>
			</tr>
			<tr>
				<td><a href="/portfolio/oldPages/portfolioPopup.php?site=<?php print($client->key) ?>" TARGET=_BLANK><img src="<?php print($client->image) ?>" width="<?php print($client->width) ?>" height="<?php print($client->height) ?>" border="<?php print($imageBorder) ?>" valign="top"/></a></td>

				<td>
							<ul>
							<li><b>What:</b> <?php print($client->description) ?></li>
								<li><b>My Role:</b> <?php print($client->role) ?></li>
								<li><b>Status:</b> I am still on this project</li>
								<li><b>Technologies:</b> <?php print($client->technologies) ?></li>
								<li><b>Timeframe:</b> <?php print($client->timeframe) ?></li>
								<li><a href="/portfolio/oldPages/portfolioPopup.php?site=<?php print($client->key) ?>" TARGET=_BLANK>Visit live site</a> (popup window)</li>
							</ul>
				</td>
			</tr>
		</table>
	<?php if ($_SESSION["authenticated"] == "true") {  ?>
		<table width="800" border="<?php print($tableBorder) ?>" cellspacing="0" cellpadding="0">
			<tr class="docHeader"><td colspan="3">Miscellaneous Documents<br/><span class="docSubHead">All written solely by Greg Sandell unless specified</span></td></tr>
			<?php
			foreach ($client->documents as $document) { ?>
				<tr class="docDescription">
<td><a href="<?php print($document->getUrl()) ?>" TARGET=_BLANK><img src="<?php print($g_portfolio->getIcon($document->type)) ?>" width="32" height="32" border="0"></a></td>
					<td class="docDescription"><a href="<?php print($document->getUrl()) ?>" TARGET=_BLANK><?php print($document->title) ?></a></td>
					<td class="docDescription"><p><?php print($document->description) ?></p></td>
				</tr>  <?php
				}  ?>
		</table>
			<?php
				}
			?>
	</body>
</html>
