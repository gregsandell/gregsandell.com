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
	include("../portfolioData.php");
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
				<td><a href="../portfolioPopup.php?site=<?php print($client->key) ?>" TARGET=_BLANK><img src="<?php print($client->image) ?>" width="<?php print($client->width) ?>" height="<?php print($client->height) ?>" border="<?php print($imageBorder) ?>" valign="top"/></a></td>

				<td>
							<ul>
							<li><b>What:</b> <?php print($client->description) ?></li>
								<li><b>My Role:</b> <?php print($client->role) ?></li>
								<li><b>Status:</b> I am still on this project</li>
								<li><b>Technologies:</b> <?php print($client->technologies) ?></li>
								<li><b>Timeframe:</b> <?php print($client->timeframe) ?></li>
								<li><a href="/portfolio/portfolioPopup.php?site=<?php print($client->key) ?>" TARGET=_BLANK>Visit live site</a> (popup window)</li>
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
<td><a href="<?php print($document->getUrl()) ?>" TARGET=_BLANK><img src="../<?php print($g_portfolio->getIcon($document->type)) ?>" width="32" height="32" border="0"></a></td>
					<td class="docDescription"><a href="<?php print($document->getUrl()) ?>" TARGET=_BLANK><?php print($document->title) ?></a></td>
					<td class="docDescription"><p><?php print($document->description) ?></p></td>
				</tr>  <?php
				}  ?>
			<!--
			<tr class="docDescription">
				<td><a href="/portfolio/portfolioPopup.php?slideshow=iesStyleGuide" TARGET=_BLANK><img src="/portfolio/slideshow_icon.gif" width="32" height="32" border="0"></a></td>
				<td><a href="/portfolio/portfolioPopup.php?slideshow=iesStyleGuide" TARGET=_BLANK>Style Guide</a></td>
				<td><p>This is the 40-page styleguide, developed by the entire team, which identifies the site's decoration schemes, layouts and graphic assets.</p>
				</td>
			</tr>
			<tr class="docDescription">
				<td><a href="/portfolio/portfolioPopup.php?pdf=ies/docs/m02_jiraLevels.pdf" TARGET=_BLANK><img src="../pdfIcon.gif" width="32" height="32" border="0"></a></td>
				<td><a href="/portfolio/portfolioPopup.php?pdf=ies/docs/m02_jiraLevels.pdf" TARGET=_BLANK>Bug Urgency Levels</a></td>
				<td><p>Requests for content additions, enchancements and fixes come from all levels of the company, and there are often more than 
				we can squeeze into a given release.  Users who entered requests into our Request Tracking Software (called Jira) chose from the levels 
				of urgency given in this document.</p>
				</td>
			</tr>
			<tr class="docDescription">
				<td><a href="/portfolio/portfolioPopup.php?pdf=ies/docs/m03_syllabiUpdates.pdf" TARGET=_BLANK><img src="../pdfIcon.gif" width="32" height="32" border="0"></a></td>
				<td><a href="/portfolio/portfolioPopup.php?pdf=ies/docs/m03_syllabiUpdates.pdf" TARGET=_BLANK>Syllabi Updates</a></td>
				<td>
					<p>
						Each IES program has a list of courses that students can enroll in during their study abroad stay.  (For example, see the
						<a href="http://www.IESAbroad.org/viennaCourses.do">list of courses in the Vienna Program</a>).  This data changes frequently, and the
						system for maintaining it is described in this document.  
					</p>.  
				</td>
			</tr>
			<tr class="docDescription">
				<td><a href="/portfolio/portfolioPopup.php?pdf=ies/docs/m08_simpleContentUpdates.pdf" TARGET=_BLANK><img src="../pdfIcon.gif" width="32" height="32" border="0"></a></td>
				<td><a href="/portfolio/portfolioPopup.php?pdf=ies/docs/m08_simpleContentUpdates.pdf" TARGET=_BLANK>Content Updates</a></td>
				<td>
					<p>
						This document describes the process for updating content on a normal page of the site, prior to the introduction of our content management tool,
						Sculptor.	
					</p>.  
				</td>
			</tr>
			<tr class="docDescription">
				<td><a href="/portfolio/portfolioPopup.php?pdf=ies/docs/m04_sculptorProposal.pdf" TARGET=_BLANK><img src="../pdfIcon.gif" width="32" height="32" border="0"></a></td>
				<td><a href="/portfolio/portfolioPopup.php?pdf=ies/docs/m04_sculptorProposal.pdf" TARGET=_BLANK>CMS Tool Proposal</a></td>
				<td>
					<p>
						This is the proposal describing Sculptor, our Content Management System tool.	
					</p>.  
				</td>
			</tr>
			<tr class="docDescription">
				<td><a href="/portfolio/portfolioPopup.php?pdf=ies/docs/v04_whydahSculptor.pdf" TARGET=_BLANK><img src="../pdfIcon.gif" width="32" height="32" border="0"></a></td>
				<td><a href="/portfolio/portfolioPopup.php?pdf=ies/docs/v04_whydahSculptor.pdf" TARGET=_BLANK>Website and CMS Interoperability</a></td>
				<td>
					<p>
						This document is a scan of a VISIO file showing how the website internals are exposed as an API for the Content Management System
						to manipulate.
					</p>.  
				</td>
			</tr>
			<tr class="docDescription">
				<td><a href="/portfolio/portfolioPopup.php?pdf=ies/docs/m05_strutsForms.pdf" TARGET=_BLANK><img src="../pdfIcon.gif" width="32" height="32" border="0"></a></td>
				<td><a href="/portfolio/portfolioPopup.php?pdf=ies/docs/m05_strutsForms.pdf" TARGET=_BLANK>Struts &#45; Best Practices</a></td>
				<td>
					<p>
						These are the notes for a presentation to the IT team on "Best Practices" for Struts programming, learned over the course of the 
					IES Website project.	
					</p>.  
				</td>
			</tr>
			<tr class="docDescription">
				<td><a href="/portfolio/portfolioPopup.php?slideshow=iesJira" TARGET=_BLANK><img src="../slideshow_icon.gif" width="32" height="32" border="0"></a></td>
				<td><a href="/portfolio/portfolioPopup.php?slideshow=iesJira" TARGET=_BLANK>Jira (Incident Tracking Tool)</a></td>
				<td><p>We used a web-based workflow app called Jira for bug and feature tracking, and for scheduling tasks into releases.  This slideshow shows a few sample screens.</p>
				</td>
			</tr>
			<tr class="docDescription">
				<td><a href="/portfolio/portfolioPopup.php?pdf=ies/docs/m06_whydahBuild.pdf" TARGET=_BLANK><img src="../pdfIcon.gif" width="32" height="32" border="0"></a></td>
				<td><a href="/portfolio/portfolioPopup.php?pdf=ies/docs/m06_whydahBuild.pdf" TARGET=_BLANK>Website Build Process</a></td>
				<td>
					<p>
						This document describes to developers how to assemble and build the website.	
					</p>.  
				</td>
			</tr>
			<tr class="docDescription">
				<td><a href="/portfolio/portfolioPopup.php?pdf=ies/docs/launchHistory.vsd" TARGET=_BLANK><img src="../visioIcon.gif" width="32" height="32" border="0"></a></td>
				<td><a href="/portfolio/portfolioPopup.php?pdf=ies/docs/launchHistory.vsd" TARGET=_BLANK>Release History</a></td>
				<td>
					<p>
						This VISIO file shows the history of website releases from 9/22/2004 to 4/22/05.  (Your browser needs to be MSIE or you need to have VISIO installed on your machine to be able to view this file.)
			</tr>
			<tr class="docDescription">
				<td><a href="/portfolio/portfolioPopup.php?pdf=ies/docs/p03_whydahReleases.pdf" TARGET=_BLANK><img src="../pdfIcon.gif" width="26" height="32" border="0"></a></td>
				<td><a href="/portfolio/portfolioPopup.php?pdf=ies/docs/p03_whydahReleases.pdf" TARGET=_BLANK>Release History (alt)</a></td>
				<td>
					<p>
						This is a scan of the above VISIO file, for users without VISIO.
					</p>.  
				</td>
			</tr>
			<tr class="docDescription">
				<td><a href="/portfolio/portfolioPopup.php?slideshow=iesNetworkConfig" TARGET=_BLANK><img src="../slideshow_icon.gif" width="32" height="32" border="0"></a></td>
				<td><a href="/portfolio/portfolioPopup.php?slideshow=iesNetworkConfig" TARGET=_BLANK>Network Configuration</a></td>
				<td><p>This shows the details of the computing infrastructure at IES Abroad.</p>
				</td>
			</tr>
			<tr class="docDescription">
				<td><a href="/portfolio/portfolioPopup.php?pdf=ies/docs/v02_onlineApp.pdf" TARGET=_BLANK><img src="../pdfIcon.gif" width="32" height="32" border="0"></a></td>
				<td><a href="/portfolio/portfolioPopup.php?pdf=ies/docs/v02_onlineApp.pdf" TARGET=_BLANK>Online Application Flow</a></td>
				<td>
					<p>
						The IES Abroad Online Application is used by students to apply to IES programs.  This is a 8-page form that follows a 
						"wizard" pattern of sequential steps.  This scan of a VISIO doc is a flowchart showing the relationship between pages, Struts Actions
						and Struts form beans over this 8-page process.
					</p>.  
				</td>
			</tr>  
			-->
		</table>
			<?php
				}
			?>
	</body>
</html>