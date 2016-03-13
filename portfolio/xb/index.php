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
		<title>Greg Sandell's Portfolio - Expand Beyond Company Site</title>
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
			<tr><td class="bread" colspan="2">You are here: <a class="bread" href="../index.php">Home</a> &gt; <a class="bread" href="../index.php">Portfolio</a> &gt; Expand Beyond Company Site</td></tr>
			<tr >
				<td colspan="2" class="portfolioTitle" colspan="3">Expand Beyond Company Site</td>
			</tr>
			<tr>
				<td><a href="../portfolioPopup.php?site=xb" TARGET=_BLANK><img src="images/xbHome500x617.gif" width="500" height="617" border="<?php print($imageBorder) ?>" valign="top"/></a></td>
				<td>
							<ul>
								<li><b>What:</b> Company website redesign for Expand Beyond, maker of wireless handheld applications</li>
								<li><b>My Role:</b> In-house web developer.</li>
								<li><b>Status:</b> Site is still live.  </li>
								<li><b>Technologies:</b> PHP, mysql, Apache, MS-SQL Server</li>
								<li><b>Timeframe:</b> Began &#38; launched in 2002</li>
								<li><a href="http://www.gregsandell.com/portfolio/portfolioPopup.php?site=xb" TARGET=_BLANK>Visit live site</a></li>
							</ul>
				</td>
			</tr>
		</table>
	</body>
</html>
