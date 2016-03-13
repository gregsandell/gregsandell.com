<?php 
	$iconWidth = 138;
	$remainWidth = 800 - ($iconWidth * 2);
	$numIcons = 8;
	$mainViewRowspan = $numIcons;
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
		<title>Greg Sandell's Portfolio</title>
		<style type="text/css">
		</style>
	</head>
	<body>
		<table width="800" border="<?php  print($tableBorder) ?>" cellspacing="0" cellpadding="0">
			<tr><td class="bread" colspan="2">You are here: <a class="bread" href="../index.php">Home</a> &gt; Portfolio</td></tr>
			<tr>
				<td class="portfolioTitle" colspan="2">Greg Sandell -- Portfolio of Client Projects</td>
			</tr>
			<tr>
				<td>Browse By Client</td>
				<td>Browse By Document Type</td>
			</tr>
			<tr>
				<td>
					<dl>
						<dt><a href="abnAmro/">ABN-AMRO</a></dt>
						<dd>Workflow Application for International Letters of Credit (ABN-AMRO)</dd>
						<dt><a href="ies/">IES Abroad</a></dt>
						<dd>Company website for IES Abroad (Institute for the International Education of Students)</dd>
						<dt><a href="maytag/">Maytag Home Solution</a></dt>
						<dd>Complete site redesign of Maytag Corp. Public Website using Broadvision </dd>
						<dt><a href="watts/">Edwin Watts Golf Shops</a></dt>
						<dd>E-commerce site in ASP/IIS/MS Access</dd>
						<dt><a href="xb/">Expand Beyond Corp.</a></dt>
						<dd>Company website redesign for Expand Beyond, maker of wireless handheld applications</dd>
						<dt><a href="whitney/">Bill Whitney</a></dt>
						<dd>Online portfolio for digital media artist Bill Whitney</dd>
						<!--
								<li>Interactive demonstration of Musical Acoustics</li>
						<dt><a href="spectrum/">Read more about this project</a></li>
						-->
					</dl>
				</td>
				<td>&nbsp;</td>
			</tr>
		</table>
	</body>
</html>
