<?php
	$cssBasic = "font-family: Verdana, Arial, Helvetica, sans-serif;\n" .
      "font-size: 13px;\n" .
      "tfont-weight: normal;\n" .
      "line-height: 19px;\n" .
      "color: #000000;";
	$color = $_REQUEST["c"];
	$foreColor = "black";
	$backColor = "white";
	$linkColor = "navy";
	$hoverColor = "blue";
	if ($color == "black") {
		$foreColor = "white";
		$backColor = "black";
		$linkColor = "#FF9966";
		$hoverColor = "#FF6600";
	}
?>
<html>
	<head>
		<style type="text/css">
			P {
				<?php print($cssBasic) ?>
				color: <?php print($foreColor)?>;
				font-size: 12px;
				text-align: center;
				font-weight: normal;
				font-style: italic;
			}
			BODY {
				background-color: <?php print($backColor) ?>;
			}
			A:link {
				<?php print($cssBasic) ?>
				font-size: 12px;
				font-weight: bold;
				color: <?php print($linkColor) ?>;
			}
			A:visited {
				<?php print($cssBasic) ?>
				font-size: 12px;
				font-weight: bold;
				color: <?php print($linkColor) ?>;
			}
			A:hover {
				<?php print($cssBasic) ?>
				font-size: 12px;
				font-weight: bold;
				color: <?php print($hoverColor) ?>;
			}
		</style>
	<body>
		<p>This is a popup window.  To close this window and return to Greg Sandell's portfolio, <a href="javascript:parent.close()">click here</a>.</p>
	</body>
</html>
