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
?>
<html>
	<head>
		<title>Greg Sandell's Portfolio - Spectrum Analysis Applet</title>
		</script>
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
	</head>
	<body>
		<table width="800" border="<?php print($tableBorder) ?>" cellspacing="0" cellpadding="0">
			<tr><td class="bread" colspan="2">You are here: <a class="bread" href="/index.php">Home</a> &gt; <a class="bread" href="index.php">Old Portfolio</a> &gt; Spectrum Analysis Applet</td></tr>
			<tr >
				<td colspan="2" class="portfolioTitle" colspan="3">Spectrum Analysis Applet</td>
			</tr>
			<tr>
				<td><a href="/portfolio/portfolioPopup.php?site=spectrum" TARGET=_BLANK><img src="/portfolio/resources/spectrum/images/spectrumHome500x294.gif" width="500" height="294" border="<?php print($imageBorder) ?>" valign="top"/></a></td>
				<td>
							<ul>
								<li><b>What:</b> Interactive Demonstration of Musical Acoustics</li>
								<li><b>My Role:</b> Research Associate/Programmer at Loyola University Chicago, Parmly Hearing Institute</li>
								<li><b>Technologies:</b> Java 1.1 Applet</li>
								<li><b>Timeframe:</b> Began &#38; launched in 1996</li>
								<li><a href="/portfolio/portfolioPopup.php?site=spectrum" TARGET=_BLANK>Visit site</a> (archived)</li>
							</ul>
				</td>
			</tr>
		</table>
	</body>
</html>
