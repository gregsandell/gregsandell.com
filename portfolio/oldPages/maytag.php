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
		<title>Greg Sandell's Portfolio - IES Abroad Company Site</title>
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
			<tr><td class="bread" colspan="2">You are here: <a class="bread" href="/index.php">Home</a> &gt; <a class="bread" href="index.php">Old Portfolio</a> &gt; Maytag Home Solutions</td></tr>

			<tr >
				<td colspan="2" class="portfolioTitle" colspan="3">Maytag Home Solutions</td>
			</tr>
			<tr>
				<td><a href="../portfolioPopup.php?site=maytag" TARGET=_BLANK ><img src="/portfolio/resources/maytag/images/maytagHome500x376.gif" width="500" height="376" border="<?php print($imageBorder) ?>" valign="top"/></a></td>

				<td>
							<ul>
								<li><b>What:</b> Complete site redesign of Maytag Corp. Public Website using Broadvision </li>
								<li><b>My Role:</b> Team lead and developer for several sections of the site, as employee of Giant Step. Managed 3 other developers.
								<li><b>Status:</b> Site is still live, maintained by another agency.</li>
								<li><b>Technologies:</b> Broadvision, Javascript Server Pages</li>
								<li><b>Timeframe:</b> Began and launched in 2000</li>
								<li><a href="/portfolio/portfolioPopup.php?site=maytag" TARGET=_BLANK >Visit live site</a></li>
							</ul>
				</td>
			</tr>
		</table>
		<br/>  <?php
		if ($_SESSION["email"] != "Joe.Germuska@JGSullivan.com") { ?>
			<table width="800" border="<?php print($tableBorder) ?>" cellspacing="0" cellpadding="0">
				<tr class="docHeader"><td colspan="3">Miscellaneous Documents<br/><span class="docSubHead">All written solely by Greg Sandell except where otherwise specified.</span></td></tr>
	<?php
				if ($_SESSION["authenticated"] == "true") {  ?>
						<tr class="docDescription">
							<td><a href="/portfolio/portfolioPopup.php?slideshow=maytagStyleGuide" TARGET=_BLANK><img src="../slideshow_icon.gif" width="32" height="32" border="0"></a></td>
							<td><a href="/portfolio/portfolioPopup.php?slideshow=maytagStyleGuide" TARGET=_BLANK>Style Guide</a></td>
							<td><p>Here are design specs for several sections of the site.  Documents by the design team at Giant Step.</p>
							</td>
						</tr>
						<tr class="docDescription">
							<td><a href="/portfolio/portfolioPopup.php?pdf=/portfolio/resources/maytag/docs/memoVisitorManagement.pdf" TARGET=_BLANK><img src="../pdfIcon.gif" width="32" height="32" border="0"></a></td>
							<td><a href="/portfolio/portfolioPopup.php?pdf=/portfolio/resources/maytag/docs/memoVisitorManagement.pdf" TARGET=_BLANK>Visitor Management</a></td>
							<td><p>Maytag.com is a member-oriented website.  Users can keep a profile of their owned appliances, making it easy for them
										to locate manuals, warranty information and service plans.  The site also implements <i>targeted viewing</i>, where the
										choice of banner ads and features is affected by where they have been surfing.  This document describes how Broadvision's 
									 API for visitor management was used to keep track of visitors.	</p>
							</td>
						</tr>
						<tr class="docDescription">
							<td><a href="/portfolio/portfolioPopup.php?pdf=/portfolio/resources/maytag/docs/cookiesFlow.pdf" TARGET=_BLANK><img src="../pdfIcon.gif" width="32" height="32" border="0"></a></td>
							<td><a href="/portfolio/portfolioPopup.php?pdf=/portfolio/resources/maytag/docs/cookiesFlow.pdf" TARGET=_BLANK>Cookie Management</a></td>
							<td><p>The site was written so user sessions could be maintained even when users had their browsers set to refuse cookies.  It began
							each user visit with a two-step cookie diagnostic; if cookies were disabled, it tracked session using the querystring.  This document is 
							a scan of a VISIO doc showing the flow of the cookie diagnostic code.</p>
							</td>
						</tr>
						<tr class="docDescription">
							<td><a href="/portfolio/portfolioPopup.php?pdf=/portfolio/resources/maytag/docs/memoVisitorAuthentication.pdf" TARGET=_BLANK><img src="../pdfIcon.gif" width="32" height="32" border="0"></a></td>
							<td><a href="/portfolio/portfolioPopup.php?pdf=/portfolio/resources/maytag/docs/memoVisitorAuthentication.pdf" TARGET=_BLANK>Visitor Authentication</a></td>
							<td><p>Users who chose to take advantage of the membership features were assigned user names (their email address) and passwords.  
							This document shows the process of identifying a user.</p>
							</td>
						</tr>
						<tr class="docDescription">
							<td><a href="/portfolio/portfolioPopup.php?pdf=/portfolio/resources/maytag/docs/myMaytagFlows.pdf" TARGET=_BLANK><img src="../pdfIcon.gif" width="32" height="32" border="0"></a></td>
							<td><a href="/portfolio/portfolioPopup.php?pdf=/portfolio/resources/maytag/docs/myMaytagFlows.pdf" TARGET=_BLANK>"My Maytag" Flow Diagrams</a></td>
							<td><p>The section of the site where users maintain a list of their appliances is called "My Maytag".  This document is a scan
							of VISIO flows showing how this section was written.</p>
							</td>
						</tr>
						<tr class="docDescription">
							<td><a href="/portfolio/portfolioPopup.php?pdf=/portfolio/resources/maytag/docs/registerProductFlows.pdf" TARGET=_BLANK><img src="../pdfIcon.gif" width="32" height="32" border="0"></a></td>
							<td><a href="/portfolio/portfolioPopup.php?pdf=/portfolio/resources/maytag/docs/registerProductFlows.pdf" TARGET=_BLANK>"Register a Product" Flow Diagrams</a></td>
							<td><p>The ability to register a Maytag product online is one of the most important business functions of Maytag.com.  This document
							is a scan of VISIO flows showing how the product registration process was coded.</p>
							</td>
						</tr>
						<tr class="docDescription">
							<td><a href="/portfolio/portfolioPopup.php?pdf=/portfolio/resources/maytag/docs/maytagBuilds.pdf" TARGET=_BLANK><img src="../pdfIcon.gif" width="32" height="32" border="0"></a></td>
							<td><a href="/portfolio/portfolioPopup.php?pdf=/portfolio/resources/maytag/docs/maytagBuilds.pdf" TARGET=_BLANK>Website Release History</a></td>
							<td><p>This document shows the history of website version releases from Oct 2000 to Jan 2001.  </p>
							</td>
						</tr>
						<tr class="docDescription">
							<td><a href="/portfolio/portfolioPopup.php?pdf=/portfolio/resources/maytag/docs/processUserFlow.pdf" TARGET=_BLANK><img src="../pdfIcon.gif" width="32" height="32" border="0"></a></td>
							<td><a href="/portfolio/portfolioPopup.php?pdf=/portfolio/resources/maytag/docs/processUserFlow.pdf" TARGET=_BLANK>User Session Tracking</a></td>
							<td><p>Each page on the site runs code to check the authentication state of the user.  If the requested page is a members-only page, a
							redirect to a login page occurs.  This document is a scan of VISIO flows showing how this process was coded.</p>
							</td>
						</tr>
						
						<tr class="docDescription">
							<td><a href="/portfolio/portfolioPopup.php?pdf=/portfolio/resources/maytag/docs/signinFlow.pdf" TARGET=_BLANK><img src="../pdfIcon.gif" width="32" height="32" border="0"></a></td>
							<td><a href="/portfolio/portfolioPopup.php?pdf=/portfolio/resources/maytag/docs/signinFlow.pdf" TARGET=_BLANK>Authentication Flows</a></td>
							<td><p>This document is a scan of VISIO flows showing the process of logging in with a username and password.</p>
							</td>
						</tr>  
						<tr class="docDescription">
							<td><a href="/portfolio/portfolioPopup.php?pdf=/portfolio/resources/maytag/docs/giantStepWshDoc.pdf" TARGET=_BLANK><img src="../pdfIcon.gif" width="32" height="32" border="0"></a></td>
							<td><a href="/portfolio/portfolioPopup.php?pdf=/portfolio/resources/maytag/docs/giantStepWshDoc.pdf" TARGET=_BLANK>Windows Script Host</a></td>
							<td><p>This document is an introduction to WSH (Windows Script Host) presented to the Application Engineering Team.</p>
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
									<input type="hidden" name="route" value="maytag"/>
								Email Address: <input type="text" name="email" />&nbsp;&nbsp;<input type="submit"/></form>
							</td>
						</tr> <?php
		}  ?>
			</table>  <?php
	}  ?>
	</body>
</html>
