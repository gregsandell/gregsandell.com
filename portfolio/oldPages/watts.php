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
	$_SESSION["authenticated"] = true;   // bypass the defunct login process

?>
<html>
	<head>
		<title>Greg Sandell's Portfolio - Edwin Watts Golf Store</title>
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
			<tr><td class="bread" colspan="2">You are here: <a class="bread" href="/index.php">Home</a> &gt; <a class="bread" href="index.php">Old Portfolio</a> &gt; Edwin Watts Golf Stores E-Commerce Site</td></tr>
			<tr >
				<td colspan="2" class="portfolioTitle" colspan="3">Edwin Watts Golf Stores E-Commerce Site</td>
			</tr>
			<tr>
				<td><a href="../portfolioPopup.php?site=watts" TARGET=_BLANK ><img src="/portfolio/resources/watts/images/wattsHomepage500x475.gif" width="500" height="475" border="<?php print($imageBorder) ?>" valign="top"/></a></td>
				<td>
							<ul>
								<li><b>What:</b> E-commerce site for Edwin Watts golf shops</li>
								<li><b>My Role:</b> Architect and developer for entire site as employee of Taproot Interactive Studio.  Managed 1 other developer.
								<li><b>Status:</b> Site is still live.  Client re-wrote site in Cold Fusion but appearance and functionality of site is practically indistinguishable from original.</li>
								<li><b>Technologies:</b> ASP, IIS, MS_Access</li>
								<li><b>Timeframe:</b> Began 1998, launched in 1999</li>
								<li><a href="/portfolio/portfolioPopup.php?site=watts" TARGET=_BLANK >Visit live site</a></li>
							</ul>
				</td>
			</tr>
		</table>
		<br/>
		<table width="800" border="<?php print($tableBorder) ?>" cellspacing="0" cellpadding="0">
			<tr class="docHeader"><td colspan="3">Miscellaneous Documents<br/><span class="docSubHead">All written solely by Greg Sandell</span></td></tr>
<?php
			if ($_SESSION["authenticated"] == "true") {  ?>
			<tr class="docDescription">
				<td><a href="/portfolio/portfolioPopup.php?pdf=/portfolio/resources/watts/docs/wattsProjectOverview.pdf" TARGET=_BLANK><img src="/image/portfolio/pdfIcon.gif" width="32" height="32" border="0"></a></td>
				<td><a href="/portfolio/portfolioPopup.php?pdf=/portfolio/resources/watts/docs/wattsProjectOverview.pdf" TARGET=_BLANK>Project Overview</a></td>
				<td><p>An overview of the business and technical goals of the site.</p>
				</td>
			</tr>
			<tr class="docDescription">
				<td><a href="/portfolio/portfolioPopup.php?pdf=/portfolio/resources/watts/docs/wattsDevelopmentTimeline.pdf" TARGET=_BLANK><img src="/image/portfolio/pdfIcon.gif" width="32" height="32" border="0"></a></td>
				<td><a href="/portfolio/portfolioPopup.php?pdf=/portfolio/resources/watts/docs/wattsDevelopmentTimeline.pdf" TARGET=_BLANK>Development Timeline</a></td>
				<td><p>A timeline of the full-life-cycle development process.</p>
				</td>
			</tr>
			<tr class="docDescription">
				<td><a href="/portfolio/portfolioPopup.php?pdf=/portfolio/resources/watts/docs/wattsSitemap.pdf" TARGET=_BLANK><img src="/image/portfolio/pdfIcon.gif" width="32" height="32" border="0"></a></td>
				<td><a href="/portfolio/portfolioPopup.php?pdf=/portfolio/resources/watts/docs/wattsSitemap.pdf" TARGET=_BLANK>Site Map</a></td>
				<td><p>Original site map of the Edwin Watts site.</p>
				</td>
			</tr>
			<tr class="docDescription">
				<td><a href="/portfolio/portfolioPopup.php?pdf=/portfolio/resources/watts/docs/wattsDatabaseDesign.pdf" TARGET=_BLANK><img src="/image/portfolio/pdfIcon.gif" width="32" height="32" border="0"></a></td>
				<td><a href="/portfolio/portfolioPopup.php?pdf=/portfolio/resources/watts/docs/wattsDatabaseDesign.pdf" TARGET=_BLANK>Database Design</a></td>
				<td>
					<p>The site's content, the shopping cart, the line item orders and customer profiles were all represented in this MS-Access database design.</p>
				</td>
			</tr>
			<tr class="docDescription">
				<td><a href="/portfolio/portfolioPopup.php?pdf=/portfolio/resources/watts/docs/wattsProductPageFlow.pdf" TARGET=_BLANK><img src="/image/portfolio/pdfIcon.gif" width="32" height="32" border="0"></a></td>
				<td><a href="/portfolio/portfolioPopup.php?pdf=/portfolio/resources/watts/docs/wattsProductPageFlow.pdf" TARGET=_BLANK>Product Page Flow</a></td>
				<td><p>This document is a scan of VISIO flows showing the process of assembling a product page.</p>
				</td>
			</tr>
			<tr class="docDescription">
				<td><a href="/portfolio/portfolioPopup.php?pdf=/portfolio/resources/watts/docs/wattsCustomerInfo.pdf" TARGET=_BLANK><img src="/image/portfolio/pdfIcon.gif" width="32" height="32" border="0"></a></td>
				<td><a href="/portfolio/portfolioPopup.php?pdf=/portfolio/resources/watts/docs/wattsCustomerInfo.pdf" TARGET=_BLANK>Customer Information Flow</a></td>
				<td><p>This document is a scan of VISIO flows showing the process of collecting customer information.</p>
				</td>
			</tr>
			<tr class="docDescription">
				<td><a href="/portfolio/portfolioPopup.php?pdf=/portfolio/resources/watts/docs/wattsShoppingCartFlow.pdf" TARGET=_BLANK><img src="/image/portfolio/pdfIcon.gif" width="32" height="32" border="0"></a></td>
				<td><a href="/portfolio/portfolioPopup.php?pdf=/portfolio/resources/watts/docs/wattsShoppingCartFlow.pdf" TARGET=_BLANK>Shopping Cart Flows</a></td>
				<td><p>This document is a scan of VISIO flows showing shopping cart processing.</p>
				</td>
			</tr>
			<tr class="docDescription">
				<td><a href="/portfolio/portfolioPopup.php?pdf=/portfolio/resources/watts/docs/wattsCheckout.pdf" TARGET=_BLANK><img src="/image/portfolio/pdfIcon.gif" width="32" height="32" border="0"></a></td>
				<td><a href="/portfolio/portfolioPopup.php?pdf=/portfolio/resources/watts/docs/wattsCheckout.pdf" TARGET=_BLANK>Checkout Flows</a></td>
				<td><p>This document is a scan of VISIO flows showing the checkout and payment process.</p> </td>
			</tr>
			<tr class="docDescription">
				<td><a href="/portfolio/portfolioPopup.php?pdf=/portfolio/resources/watts/docs/wattsShippingFlow.pdf" TARGET=_BLANK><img src="/image/portfolio/pdfIcon.gif" width="32" height="32" border="0"></a></td>
				<td><a href="/portfolio/portfolioPopup.php?pdf=/portfolio/resources/watts/docs/wattsShippingFlow.pdf" TARGET=_BLANK>Shipping Flows</a></td>
				<td><p>This document is a scan of VISIO flows showing the process of collecting user's shipping information.</p>
				</td>
			</tr>  <?php
			}
				else {  ?>
					<tr class="docDescription">
						<td colspan="3">
							Restricted area.  If you would like to request access, <a href="mailto:greg.sandell@gmail.com">click here</a>.  If you have been given
							access already, login by entering your email address.  (<a href="javascript: void privacy()"><font size="-2">privacy note</font></a>)
							<br/><form action="../portfolioLogin.php" method="POST">
								<input type="hidden" name="route" value="watts"/>
							Email Address: <input type="text" name="email" />&nbsp;&nbsp;<input type="submit"/></form>
						</td>
					</tr> <?php
	}  ?>

		</table>
	</body>
</html>
