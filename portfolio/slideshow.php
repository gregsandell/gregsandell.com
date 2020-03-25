<?php 
	$slideNum = intval($_REQUEST["sn"]);
	$maxSlides = intval($_REQUEST["ms"]);
	$format = $_REQUEST["fm"];
	$dir = $_REQUEST["dr"];
	if ($slideNum < 1 || $slideNum > $maxSlides) {
		$slideNum = 1;
	}
	$slideNumString = ($slideNum < 10) ? ("0" . $slideNum) : $slideNum;
	$maxSlidesString = ($maxSlides < 10) ? ("0" . $maxSlides) : $maxSlides;
	$prevUrl = "slideshow.php?sn=" . ($slideNum - 1) . "&ms=" . $maxSlides . "&fm=" . $format . "&dr=" . $dir;
	$nextUrl = "slideshow.php?sn=" . ($slideNum + 1) . "&ms=" . $maxSlides . "&fm=" . $format . "&dr=" . $dir;
	$startUrl = "slideshow.php?sn=1&ms=" . $maxSlides . "&fm=" . $format . "&dr=" . $dir;
	$endUrl = "slideshow.php?sn=" . $maxSlides . "&ms=" . $maxSlides . "&fm=" . $format . "&dr=" . $dir;
	$startHtml = "<a href='" . $startUrl . "'>&lt;&lt;First</a>";
	$endHtml = "<a href='" . $endUrl . "'>Last&gt;&gt;</a>";
	$prevHtml = "&nbsp;<a href='" . $prevUrl . "'>&lt;prev slide</a>";
	$nextHtml = "<a href='" . $nextUrl . "'>next slide&gt;</a>&nbsp;";
	$greyPrevHtml = "<span class='deadLink'>&lt;prev slide</span>";
	$greyNextHtml = "<span class='deadLink'>next slide&gt;</span>";
	$thisImg = $dir . $slideNumString . "of" . $maxSlidesString . "." . $format;
	if ($slideNum == 1) {
		$prevHtml = $greyPrevHtml;
	}
	if ($slideNum == $maxSlides) {
		$nextHtml = $greyNextHtml;
	}
	$countHtml = $startHtml . "&nbsp;&nbsp;Slide " . $slideNum . " of " . $maxSlides . "&nbsp;&nbsp;" . $endHtml;
	$cssBasic = "font-family: Verdana, Arial, Helvetica, sans-serif;\n" .
      "font-size: 13px;\n" .
      "font-weight: normal;\n" .
      "line-height: 19px;\n" .
      "color: #000000;";
?>
<html>
	<head>
		<title>Greg Sandell's Portfolio - Slideshow</title>
		<style>
			TR {
				<?php print($cssBasic) ?>
				padding: 7px 7px 7px 7px;
				color: #FF9966;
			}
			.deadLink {
				<?php print($cssBasic) ?>
				font-weight: bold;
				color: #AAAAAA;
			}
			A:link {
				<?php print($cssBasic) ?>
				font-weight: bold;
				color: #FF9966;
			}
			A:visited {
				<?php print($cssBasic) ?>
				font-weight: bold;
				color: #FF9966;
			}
			A:hover {
				<?php print($cssBasic) ?>
				font-weight: bold;
				color: #FF6600;
			}
		</style>

	</head>
	<body bgcolor="#000000">
		<table border="0" width="100%" cellpadding="5" cellspacing="0">
			<tr>
				<td align="right" width="50%"><?php print($prevHtml) ?></td><td align="left" width="50%"><?php print($nextHtml) ?></td>
			</tr>
			<tr><td colspan="2" align="center"><?php print($countHtml) ?></td></tr>
			<tr>
				<td colspan="2" align="center">
					<img src="<?php print($thisImg)?>"/>
				</td>
			</tr>
		</table>
	</body>
</html>

