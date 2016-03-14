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
		<title>Greg Sandell's Portfolio - ABN-AMRO Company Site</title>
		<style type="text/css">
			LI {
				<?php  print($cssBasic) ?>
			}
			TD.portfolioTitle {
				<?php  print($cssBasic) ?>
				font-size: 25px;
				line-height: 35px;
				font-weight: bold;
				text-align: center;
				padding-bottom: 7px;
			}
			TR.docDescription {
				<?php  print($cssBasic) ?>
				padding: 7px 7px 7px 7px;
			}
			TR.docHeader {
				<?php  print($cssBasic) ?>
				padding: 7px 7px 7px 7px;
				font-size: 19px;
				line-height: 25px;
				font-weight: bold;
				text-align: center;
			}
			A:link {
				<?php  print($cssBasic) ?>
				font-weight: bold;
				color: navy;
			}
			A:visited {
				<?php  print($cssBasic) ?>
				font-weight: bold;
				color: navy;
			}
			A:hover {
				<?php  print($cssBasic) ?>
				font-weight: bold;
				color: blue;
			}
			A.bread:link {
				<?php  print($cssBasic) ?>
				font-size: 10px;
				font-weight: bold;
				color: navy;
			}
			A.bread:visited {
				<?php  print($cssBasic) ?>
				font-size: 10px;
				font-weight: bold;
				color: navy;
			}
			A.bread:hover {
				<?php  print($cssBasic) ?>
				font-size: 10px;
				font-weight: bold;
				color: blue;
			}
			TD.bread {
				<?php  print($cssBasic) ?>
				font-size: 10px;
			}

			.docSubHead {
				<?php  print($cssBasic) ?>
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
		<table width="800" border="<?php  print($tableBorder) ?>" cellspacing="0" cellpadding="0">
			<tr><td class="bread" colspan="2">You are here: <a class="bread" href="/index.php">Home</a> &gt; <a class="bread" href="index.php">Old Portfolio</a> &gt; ABN-AMRO</td></tr>

			<tr >
				<td colspan="2" class="portfolioTitle" colspan="3">ABN-AMRO MaxTrad</td>
			</tr>
			<tr>
				<td><a href="../portfolioPopup.php?site=abnamro" TARGET=_BLANK ><img src="/portfolio/resources/abnAmro/images/abnAmroHome500x363.gif" width="500" height="363" border="<?php  print($imageBorder) ?>" valign="top"/></a></td>

				<td>
							<ul>
								<li><b>What:</b> Workflow application for generating International Letters of Credit </li>
								<li><b>My Role:</b> Web Developer through subcontracter Spry Solutions.
								<li><b>Technologies:</b>J2EE, Servlets, Web Services, EJB</li>
								<li><b>Timeframe:</b>Worked on this from May 05 to Jan 06</li>
							</ul>
				</td>
			</tr>
		</table>
		<br/>
		<table width="800" border="<?php  print($tableBorder) ?>" cellspacing="0" cellpadding="0">
			<tr class="docHeader"><td colspan="3">Miscellaneous Documents<br/></td></tr>
<?php 
			if ($_SESSION["authenticated"] == "true") {  ?>
					<tr class="docDescription">
						<td><a href="../portfolioPopup.php?slideshow=abnAmroImport" TARGET=_BLANK><img src="../slideshow_icon.gif" width="32" height="32" border="0"></a></td>
						<td><a href="../portfolioPopup.php?slideshow=abnAmroImport" TARGET=_BLANK>Import Letter of Credit</a></td>
						<td><p>Slideshow of screen shots for Import Letter of Credit application</p>
						</td>
					</tr>
					<tr class="docDescription">
						<td><a href="../portfolioPopup.php?slideshow=abnAmroAdmin" TARGET=_BLANK><img src="../slideshow_icon.gif" width="32" height="32" border="0"></a></td>
						<td><a href="../portfolioPopup.php?slideshow=abnAmroAdmin" TARGET=_BLANK>Admin Tool</a></td>
						<td><p>Slideshow of screen shots for the site's web-based Admin Tool</p>
						</td>
					</tr>
					<?php 
			}
				else  {  ?>
					<tr class="docDescription">
						<td colspan="3">
							Restricted area.  If you would like to request access, <a href="mailto:greg.sandell@gmail.com">click here</a>.  If you have been given
							access already, login by entering your email address. (<a href="javascript: void privacy()"><font size="-2">privacy note</font></a>)
							<br/><form action="../portfolioLogin.php" method="POST">
								<input type="hidden" name="route" value="abnAmro"/>
							Email Address: <input type="text" name="email" />&nbsp;&nbsp;<input type="submit"/></form>
						</td>
					</tr> <?php 
	}  ?>
		</table>
	</body>
</html>
