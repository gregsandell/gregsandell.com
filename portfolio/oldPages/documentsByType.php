<?php
	include("./SessionObj.php");
	$g_session = new Session();
	include("./portfolioData.php");

	/* turn off authentication */
	$g_session->setAuthenticated(true);
	$portfolioPhp = $g_session->isAuthenticated() ? "documentsByType.php" :"index.php";
	$portfolioPhp = "index.php";
	$g_portfolio = new Portfolio();
	$g_portfolio->loadData();
	$documentGroups = $g_portfolio->documentGroups;
	$tableBorder = "0";
	$cssBasic = "font-family: Verdana, Arial, Helvetica, sans-serif;\n" .
      "font-size: 13px;\n" .
      "font-weight: normal;\n" .
      "line-height: 19px;\n" .
      "color: #000000;";

?>
<html>
	<head>
		<title>Greg Sandell - Project Documents</title>
		<?php include("./portfolioCss.php"); ?>
		<script type="text/javascript"> <?php
		if ($g_session->notAuthenticated()) { ?>
				location.href = "http://www.gregsandell.com";
		<?php
		} ?>
		</script>
	</head>
	<body>
		<table width="800" border="<?php print($tableBorder) ?>" cellspacing="0" cellpadding="0">
			<tr>
				<td class="bread" colspan="3">
					<span class="siteTitle">gregsandell.com</span><br/>
					You are here: <a class="bread" href="/index.php">Home</a> &gt; <a class="bread" href="../index.php">Portfolio</a> &gt; <a class="bread" href="index.php">Old Pages</a> -&gt; Documents by Type
				</td>
			</tr>
			<tr >
			<td colspan="3" class="portfolioTitle"><a name="top"></a>Browse Project Documents</td>
			</tr>
			<tr>
				<td class="portfolioText" colspan="3">
					Various artifacts of client projects on which Greg Sandell has worked are shown below.  
					Documents include application screenshots, flowcharts and architecture/design plans;  business requirements, 
					architecture plans, database diagrams, and visual design style guides.
				</td>
			</tr>
			<tr>
				<td colspan="3" align="center">
					<table width="75%">
						<tr>
							<td colspan="3" style="text-align: left" class="portfolioSubTitle">Document Types</td>
						</tr>
						<tr>
							<td  valign="top">
								<?php
									foreach ($documentGroups as $documentGroup) {
										print("<a class='doclink' href='#" . $documentGroup->key . "'>" . $documentGroup->description . "</a><br/>");
									}
								?>
							</td>
						</tr>
					</table>
				</td>
			</tr>

			<?php
				foreach ($documentGroups as $documentGroup) {
					print("<tr><td class='portfolioSubTitle' colspan='3'><a name='" . $documentGroup->key . "'></a><hr/>" . $documentGroup->description . "<br/></td></tr>");
					foreach ($documentGroup->documents as $document) {
						$client = $document->clientObj;  ?>
						<tr class="docDescription">
							<td valign="top"><a href="<?php print($document->getUrl()) ?>" TARGET=_BLANK><img src="<?php print($g_portfolio->getIcon($document->type)) ?>" width="32" height="32" border="0" title="<?php print($g_portfolio->getAlt($document->type)) ?>"></a></td>
							<td valign="top" class="docDescription"><a href="<?php print($document->getUrl()) ?>" TARGET=_BLANK><?php print($document->title) ?></a></td>
							<td valign="top" class="docDescription"><p><b>Client:  <a href="../portfolioPage.php?key=<?php print($client->key) ?>"><?php print($client->client) ?></a></b>. <?php print($document->description) ?><br/><a class="bread" href="#top">Back to top</a></p></td>
						</tr>  <?php
					}  
				} ?>
		</table>
	</body>
</html>
