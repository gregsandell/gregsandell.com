<?php 
class Portfolio {
	var $clients = array();
	var $documentGroups;
	var $BUSINESS = "business";
	var $SCREENS = "screens";
	var $STYLEGUIDE = "styleguide";
	var $ARCHITECTURE = "architecture";
	var $FLOW = "flow";
	var $KNOWLEDGE = "knowledge";
	function Portfolio() {
		$this->documentGroups = $this->createDocumentGroups();
	}
	function createDocumentGroups() {
		$results = array();
		$results[$this->ARCHITECTURE] = new DocumentGroup($this->ARCHITECTURE, "Application Architecture Documents");
		$results[$this->SCREENS] = new DocumentGroup($this->SCREENS, "Screen Shots");
		$results[$this->STYLEGUIDE] = new DocumentGroup($this->STYLEGUIDE, "Visual Design Style Guides");
		$results[$this->BUSINESS] = new DocumentGroup($this->BUSINESS, "Business Documents");
		$results[$this->FLOW] = new DocumentGroup($this->FLOW, "Application Flowcharts &amp; Activity Diagrams");
		$results[$this->KNOWLEDGE] = new DocumentGroup($this->KNOWLEDGE, "Tutorials &amp; Knowledge Sharing");
		return($results);
	}
	function addClient($key, $client, $url, $linkText, $description, $role, $technologies, $timeframe, $image, $width, $height, $iconImage, $iWidth, $iHeight, $hostedState) {
		$this->clients[$key] = new Client($key, $client, $url, $linkText, $description, $role, $technologies, $timeframe, $image, $width, $height, $iconImage, $iWidth, $iHeight, $hostedState);
		return($this->getClient($key));
	}
	function getClient($key) {
		return($this->clients[$key]);
	}
	function getIcon($type) {
		$icon = "pdfIcon.gif";
		switch($type) {
			case "pdf":
				$icon = "pdfIcon_trans.gif";
				break;
			case "doc":
				$icon = "mswordIcon.gif";
				break;
			case "slideshow":
				$icon = "slideshow_icon_trans.gif";
				break;
		}
		return($icon);
	}
	function getAlt($type) {
		$alt = "PDF Document";
		switch($type) {
			case "pdf":
				$alt = "PDF Document";
				break;
			case "doc":
				$alt = "MS Word Document";
				break;
			case "slideshow":
				$alt = "Slideshow";
				break;
		}
		return($alt);
	}

		
	function loadData() {
		$client = $this->addClient("abnamro", "ABN-AMRO", "abnAmro",  "ABN-AMRO",
			"Workflow Application for International Letters of Credit (ABN-AMRO)",
			"Web Developer through subcontracter Spry Solutions",
			"J2EE, Servlets, Web Services, EJB",
			"Worked on this from May 05 to Jan 06",
			"abnAmro/images/abnAmroHome500x363.gif", "500", "343",
		"abnAmro/images/abnAmroThumb.gif", "130", "100", "marketing");
		$client->addDocument($this, $client, "abnAmroImport", true, "ABN-AMRO Import Letter of Credit", "slideshow", $this->SCREENS, 
			"abnAmroImport", "Shows a slideshow of screen shots for Import Letter of Credit application.  The screens show typical forms of this EJB-based webapp, with up to 50 dynamically-generated fields spread over five tabs.");
		$client->addDocument($this, $client, "abnAmroAdmin", false, "Admin Tool", "slideshow", $this->SCREENS, 
			"abnAmroAdminbnAmroImport", "Slideshow of screen shots for the site's web-based Admin Tool");
		$client = $this->addClient("ies", "IES Abroad", "ies", "IES Abroad",
			"Company website for IES Abroad (Institute for the International Education of Students)",
			"In-house lead developer and Architect, working with Marketing Group and digital artist",
			"Java Servlets, Struts, Tomcat, Apache, Oracle, mysql, JSP, JSP tags, Tiles, DHTML, CSS, XML, XSL",
			"Work began August 2003; site launched September 2004",
			"/portfolio/resources/ies/images/iesHomepage500x373.gif", "500", "373",
			"/portfolio/resources/ies/images/IESthumb.jpg", "130", "103", "live");
		$client->addDocument($this, $client, "programsOrganization", false, "Programs Organization", "pdf", $this->BUSINESS, 
			"/portfolio/resources/ies/docs/m10_programsOrganization.pdf",
			"The heart of www.IESAbroad.org is the section describing the different Study Abroad programs hosted by IES.  There are 49 <b>programs</b> across 26 centers in 19 different countries, for a total of 638 pages.  This document describes how programs are organized on the site.");
		$client->addDocument($this, $client, "iesStyleGuide", true, "IES Style Guide", "slideshow", $this->STYLEGUIDE, 
			"iesStyleGuide", "Shows a slideshow of the 40-page styleguide, which identifies the decoration schemes, layouts and graphic assets for the IES Abroad Company Website.");
		$client->addDocument($this, $client, "jiraLevels", false, "Bug Urgency Levels", "pdf", $this->BUSINESS, 
			"/portfolio/resources/ies/docs/m02_jiraLevels.pdf", "Requests for content additions, enchancements and fixes come from all levels of the company, and there are often more than we can squeeze into a given release.  Users who entered requests into our Request Tracking Software (called Jira) chose from the levels of urgency given in this document.");
		$client->addDocument($this, $client, "syllabiUpdates", false, "Syllabi Updates", "pdf", $this->BUSINESS, 
			"/portfolio/resources/ies/docs/m03_syllabiUpdates.pdf", "Each IES program has a list of courses that students can enroll in during their study abroad stay.  This data changes frequently, and the system for maintaining it is described in this document.");
		$client->addDocument($this, $client, "simpleContentUpdates", false, "Content Updates", "pdf", $this->BUSINESS, 
			"/portfolio/resources/ies/docs/m08_simpleContentUpdates.pdf", "This document describes the process for updating content on a normal page of the site, prior to the introduction of the content management tool, Sculptor.");
		$client->addDocument($this, $client, "sculptorProposal", false, "CMS Tool Proposal", "pdf", $this->BUSINESS, 
			"/portfolio/resources/ies/docs/m04_sculptorProposal.pdf", "This is the proposal describing Sculptor, the Content Management System tool.");
		$client->addDocument($this, $client, "whydahSculptor", true, "IES Website and CMS Interoperability", "pdf", $this->ARCHITECTURE, 
			"/portfolio/resources/ies/docs/v04_whydahSculptor.pdf", "Shows how the Content Management tool for the IES Abroad company website was integrated into the site's XML, templating, and visual design framework.");
		$client->addDocument($this, $client, "strutsForms", false, "Struts &#45; Best Practices", "pdf", $this->KNOWLEDGE, 
			"/portfolio/resources/ies/docs/m05_strutsForms.pdf", "These are the notes for a presentation to the IT team on 'Best Practices' for Struts programming, learned over the course of the IES Website project.");
		$client->addDocument($this, $client, "iesJira", false, "Jira (Incident Tracking Tool)", "slideshow", $this->BUSINESS, 
			"iesJira", "We used a web-based workflow app called Jira for bug and feature tracking, and for scheduling tasks into releases.  This slideshow shows a few sample screens.");
		$client->addDocument($this, $client, "whydahBuild", false, "Website Build Process", "pdf", $this->BUSINESS, 
			"/portfolio/resources/ies/docs/m06_whydahBuild.pdf", "This document describes to developers how to assemble and build the website.");
		$client->addDocument($this, $client, "whydahReleases", false, "Release History", "pdf", $this->BUSINESS, 
			"/portfolio/resources/ies/docs/p03_whydahReleases.pdf", "This document shows the history of website releases from 9/22/2004 to 4/22/05.");
		$client->addDocument($this, $client, "iesNetworkConfig", false, "Network Configuration", "pdf", $this->ARCHITECTURE, 
			"iesNetworkConfig", "This shows the details of the computing infrastructure at IES Abroad.");
		$client->addDocument($this, $client, "onlineApp", false, "Online Application Flow", "pdf", $this->FLOW, 
			"/portfolio/resources/ies/docs/v02_onlineApp.pdf", "The IES Abroad Online Application is used by students to apply to IES programs.  This is a 8-page form that follows a 'wizard' pattern of sequential steps.  This scan of a VISIO doc is a flowchart showing the relationship between pages, Struts Actions and Struts form beans over this 8-page process.");
		$client = $this->addClient("maytag", "Maytag Corp.", "maytag", "Maytag Corp.",
			"Complete site redesign of Maytag Corp. Public Website using Broadvision)",
			"Team lead and developer for several sections of the site, as employee of Giant Step. Managed 3 other developers.",
			"Broadvision, Javascript Server Pages",
			"Began and launched in 2000",
			"/portfolio/resources/maytag/images/maytagHome500x376.gif", "500", "376",
			"/portfolio/resources/maytag/images/maytagThumb.jpg", "130", "100", "live");
		$client->addDocument($this, $client, "maytagStyleGuide", false, "Style Guide", "slideshow", $this->STYLEGUIDE, 
			"maytagStyleGuide", "Here are design specs for seve<?php print($client->linkText) ?>ral sections of the site.  Documents by the design team at Giant Step.");
		$client->addDocument($this, $client, "memoVisitorManagement", true, "Maytag.com Visitor Management", "pdf", $this->ARCHITECTURE, 
			"/portfolio/resources/maytag/docs/memoVisitorManagement.pdf", "Shows the design for Visitor Management for the Broadvision-based site Maytag.com.  By using cookies, querystring-based session management and the Broadvision database, we were able to track users from temporary visitors to full members.  This helped manage visibility of permissioned areas and targeted viewing.");
		$client->addDocument($this, $client, "cookiesFlow", false, "Cookie Management", "pdf", $this->FLOW, 
			"/portfolio/resources/maytag/docs/cookiesFlow.pdf", "The site was written so user sessions could be maintained even when users had their browsers set to refuse cookies.  It began each user visit with a two-step cookie diagnostic; if cookies were disabled, it tracked session using the querystring.  This document is a scan of a VISIO doc showing the flow of the cookie diagnostic code.");
		$client->addDocument($this, $client, "memoVisitorAuthentication", false, "Visitor Authentication", "pdf", $this->FLOW, 
			"/portfolio/resources/maytag/docs/memoVisitorAuthentication.pdf", "Users who chose to take advantage of the membership features were assigned user names (their email address) and passwords.  This document shows the process of identifying a user.");
		$client->addDocument($this, $client, "myMaytagFlows", false, "'My Maytag' Flow Diagrams", "pdf", $this->FLOW, 
			"/portfolio/resources/maytag/docs/myMaytagFlows.pdf", "The section of the site where users maintain a list of their appliances is called 'My Maytag'.  This document is a scan of VISIO flows showing how this section was written");
		$client->addDocument($this, $client, "registerProductFlows", false, "'Register a Product' Flow Diagrams", "pdf", $this->FLOW, 
			"/portfolio/resources/maytag/docs/registerProductFlow<?php print($client->description) ?><?php print($client->description) ?>s.pdf", "The ability to register a Maytag product online is one of the most important business functions of Maytag.com.  This document is a scan of VISIO flows showing how the product registration process was coded.");
		$client->addDocument($this, $client, "maytagBuilds", false, "Website Release History", "pdf", $this->BUSINESS, 
			"/portfolio/resources/maytag/docs/maytagBuilds.pdf", "This document shows the history of website version releases from Oct 2000 to Jan 2001.");
		$client->addDocument($this, $client, "processUserFlow", false, "User Session Tracking", "pdf", $this->FLOW, 
			"/portfolio/resources/maytag/docs/processUserFlow.pdf", "Each page on the site runs code to check the authentication state of the user.  If the requested page is a members-only page, a redirect to a login page occurs.  This document is a scan of VISIO flows showing how this process was coded.");
		$client->addDocument($this, $client, "signinFlow", false, "Authentication Flows", "pdf", $this->FLOW, 
			"/portfolio/resources/maytag/docs/signinFlow.pdf", "This document is a scan of VISIO flows showing the process of logging in with a username and password.");
		$client->addDocument($this, $client, "giantStepWshDoc", false, "Windows Script Host", "pdf", $this->KNOWLEDGE, 
			"/portfolio/resources/maytag/docs/giantStepWshDoc.pdf", "This document is an introduction to WSH (Windows Script Host) presented to the Application Engineering Team.");
		$client = $this->addClient("watts", "Edwin Watts Golf Stores", "watts", "Edwin Watts",
			"E-commerce site for Edwin Watts golf shops",
			"Architect and developer for entire site as employee of Taproot Interactive Studio.  Managed 1 other developer",
			"ASP, IIS, MS_Access", "Began 1998, launched in 1999",
			"/portfolio/resources/watts/images/wattsHomepage500x475.gif", "500", "475",
			"/portfolio/resources/watts/images/wattsThumb.jpg", "130", "131", "live");
		$client->addDocument($this, $client, "wattsProjectOverview", false, "Project Overview", "pdf", $this->BUSINESS, 
			"/portfolio/resources/watts/docs/wattsProjectOverview.pdf", "An overview of the business and technical goals of the site");
		$client->addDocument($this, $client, "wattsDevelopmentTimeline", false, "Development Timeline", "pdf", $this->BUSINESS, 
			"/portfolio/resources/watts/docs/wattsDevelopmentTimeline.pdf", "A timeline of the full-life-cycle development process.");
		$client->addDocument($this, $client, "wattsSitemap", false, "Site Map", "pdf", $this->BUSINESS, 
			"/portfolio/resources/watts/docs/wattsSitemap.pdf", "Original site map of the Edwin Watts site.");
		$client->addDocument($this, $client, "wattsDatabaseDesign", true, "E-commerce Database Design", "pdf", $this->ARCHITECTURE, 
			"/portfolio/resources/watts/docs/wattsDatabaseDesign.pdf", "Shows the database design for the E-commerce site developed for Edwin Watts Golf Shops, including the site's content, the shopping cart, the line item orders and customer profiles.");
		$client->addDocument($this, $client, "wattsProductPageFlow", false, "Product Page Flow", "pdf", $this->FLOW, 
			"/portfolio/resources/watts/docs/wattsProductPageFlow.pdf", "This document is a scan of VISIO flows showing the process of assembling a product page.");
		$client->addDocument($this, $client, "wattsCustomerInfo", false, "Customer Information Flow", "pdf", $this->FLOW, 
			"/portfolio/resources/watts/docs/wattsCustomerInfo.pdf", "This document is a scan of VISIO flows showing the process of collecting customer information.");
		$client->addDocument($this, $client, "wattsShoppingCartFlow", false, "Shopping Cart Flows", "pdf", $this->FLOW, 
			"/portfolio/resources/watts/docs/wattsShoppingCartFlow.pdf",
			"This document is a scan of VISIO flows showing shopping cart processing.");
		$client->addDocument($this, $client, "wattsCheckout", false, "Checkout Flows", "pdf", $this->FLOW, 
			"/portfolio/resources/watts/docs/wattsCheckout.pdf",
			"This document is a scan of VISIO flows showing the checkout and payment process.");
		$client->addDocument($this, $client, "wattsShippingFlow", false, "Shipping Flows", "pdf", $this->FLOW, 
			"/portfolio/resources/watts/docs/wattsShippingFlow.pdf",
			"This document is a scan of VISIO flows showing the process of collecting user's shipping information.");
		$this->addClient("xb", "Expand Beyond", "xb", "Expand Beyond", 
			"Company website redesign for Expand Beyond, maker of wireless handheld applications",
			"In-house web developer", "PHP, mysql, Apache, MS-SQL Server", "Began &#38; launched in 2002",
			"/portfolio/resources/xb/images/xbHome500x356.gif", "500", "356",
			"/portfolio/resources/xb/images/xbThumb.jpg", "130", "98", "live");
		$this->addClient("whitney", "Bill Whitney", "whitney", "Bill Whitney",
			"Online portfolio for digital media artist Bill Whitney",
			"In-house web developer with Spellbinders",
			"DHTML, Javascript, W3C DOM",
			"Began &#38; launched in 1997",
			"/portfolio/resources/whitney/images/whitneyHome500x343.gif", "500", "343",
			"/portfolio/resources/whitney/images/whitneyThumb.jpg", "130", "98", "archived");
		$this->addClient("spectrum", "Loyola University", "spectrum", "Loyola University", 
			"Interactive demonstration of Musical Acoustics",
			"Research Associate/Programmer at Loyola University Chicago, Parmly Hearing Institute",
			"Java 1.1 Applet", "Began &#38; launched in 1996",
			"spectrum/images/spectrumHome500x294.gif", "500", "294",
			"spectrum/images/spectrumThumb.jpg", "130", "82", "archived");
		$client = $this->addClient("amex", "American Express Global Travel Technologies", "amex", "American Express", 
			"'Travelbahn' suite of web applications supporting corporate travel booking",
			"Contract Java Developer",
			"Websphere, Tomcat, JSP, Toplink", "January to July 07",
			"amex/images/amexHome500x396.png", "500", "396",
			"amex/images/amexThumb138x109.gif", "138", "109", "none");
		$client->addDocument($this, $client, "amexMyProfile", true, "AMEX 'My Profile'", "slideshow", 
			$this->SCREENS, "amexMyProfile", 
			"Shows a slideshow of screenshots from one of the 'Travelbahn' suite of web applications supporting corporate travel booking");
		$client->addDocument($this, $client, "amexItin", true, "AMEX Itinerary Remarks", "doc", 
			$this->BUSINESS, "amex/docs/PTA_EMEA_BSDR.doc", 
			"Word document showing the technical specification of alterations to functionality of the Travelbahn 'Itinerary Remarks' web application, using the company's standard BSDR format (Business System Design Re-Engineering).");
		$client->addDocument($this, $client, "amexItinUseCases", false, "Use Cases", "pdf", 
			$this->BUSINESS, "amex/docs/ItinRemarksUseCases.pdf", 
			"Testing instructions for new functionality for Travelbahn 'Itinerary Remarks' web app");
		$client = $this->addClient("usaf", "US Air Force/Lockheed Martin", "usaf", "US Air Force", 
			"Air Force Portal and Data Services",
			"Senior Consultant Developer",
			"Websphere, Tomcat, JSP, JSTL, Broadvision, Autonomy, Tivoli, Akamai", "July 06 to Jan 07",
			"usaf/images/asafHome500x290.jpg", "500", "290",
			"usaf/images/asafThumb130x75.jpg", "130", "75", "none");
		$client->addDocument($this, $client, "autonomyUpgrade", true, "USAF Autonomy Upgrade", "pdf", 
			$this->BUSINESS, "usaf/docs/PRN1523_AFP6.1.019_Autonomy_5.x_Upgrade.pdf", 
			"PDF of the Production Release Notes for defining the sequence of steps to upgrade the Autonomy Search engine upgrade from version 4 to 5 for the USAF Web Portal.  Instructions had to be in excruciating detail because of especially limited visibility of the data center to the development team.");
		$client->addDocument($this, $client, "autonomySpellcheck", false, "Autonomy Spellcheck", "pdf", 
			$this->BUSINESS, "usaf/docs/PRN1782_AFP6.1.028_SearchSpellChecker.pdf", 
			"Production Release Notes for adding spell checking to the Autonomy Search.");
		$client->addDocument($this, $client, "usafScreens", true, "Air Force Portal", "slideshow", $this->SCREENS, 
			"usafScreens", "Shows a slideshow of screen shots from the US Air Force Portal that supports a user base of 80,000.  Greg Sandell supported the integration of the Autonomy Search engine into all facets of the site's content.");
		$client->addDocument($this, $client, "ssdarArchitecture", true, "USAF SS-DAR Architecture", "doc", $this->ARCHITECTURE, 
			"usaf/docs/SSDARSoftwareArchitecture.doc", 
			"The US Air Force's Self-Service Data Access Request (SSDAR) tool was designed to schedule retrieval of data from Informatica-based Data Warehouses.  This UML-flavored Software Architecture document encompassed the contributions of the web tier, information architect and data architect teams.  Consists of Use Cases, Data Designs and Activity Diagrams.");
		$client->addDocument($this, $client, "ssdarScreens", true, "USAF SS-DAR Screens", "slideshow", $this->SCREENS, 
			"ssdarScreens", 
			"The US Air Force's Self-Service Data Access Request (SSDAR) tool was designed to schedule retrieval of data from Informatica-based Data Warehouses.  This slideshow of VISIO doc pages from the team's Information Architecture design shows the application's screens and pageflow.");
	}
}
class Client {
	var $documents = array();
	var $client;
	var $hostedState;
	var $key;
	var $url;
	var $linkText;
	var $description;
	var $role;
	var $technologies;
	var $timeframe;
	var $image;
	var $width;
	var $height;
	var $iconImage;
	var $iWidth;
	var $iHeight;
	function Client($key, $client, $url, $linkText, $description, $role, $technologies, $timeframe, $image, $width, $height, $iconImage, $iWidth, $iHeight, $hostedState) {
		$this->client = $client;
		$this->key = $key;
		$this->url = $url;
		$this->linkText = $linkText;
		$this->description = $description;
		$this->role = $role;
		$this->technologies = $technologies;
		$this->timeframe = $timeframe;
		$this->image = $image;
		$this->width = $width;
		$this->height = $height;
		$this->iconImage = $iconImage;
		$this->iwidth = $iWidth;
		$this->iheight = $iHeight;
		$this->hostedState = $hostedState;
	}
	function addDocument($portfolioObj, $clientObj, $key, $feature, $title, $type, $category, $url, $description) {
		$document = new Document($key, $clientObj, $feature, $title, $type, $category, $url, $description);
		$this->documents[$key] = $document;
		$documentGroup = $portfolioObj->documentGroups[$category];
		$documentGroup->addDocument($document);
	}
	function getDocumentsOfType($type) {
		$result = array();
		foreach ($this->documents as $document) {
			if ($document->type == $type) {
							$result[$document->key] = $document;
			}
		}
		return($result);
	}
}
class Document {
	var $key;
	var $title;
	var $type;
	var $url;
	var $category;
	var $description;
	var $clientObj;
	var $feature;
	function Document($key, $clientObj, $feature, $title, $type, $category, $url, $description) {
		$this->key = $key;
		$this->clientObj = $clientObj;
		$this->feature = $feature;
		$this->title = $title;
		$this->type = $type;
		$this->category = $category;
		$this->url = $url;
		$this->description = $description;
	}
	
	function getUrl() {
		$result = "";
		if ($this->type == 'pdf') {
			$result = "/portfolio/portfolioPopup.php?pdf=" . $this->url;
		}
		if ($this->type == 'doc') {
			$result = "/portfolio/portfolioPopup.php?doc=" . $this->url;
		}
		if ($this->type == 'slideshow') {
			$result = "/portfolio/portfolioPopup.php?slideshow=" . $this->url;
		}
		return($result);
	}
}
class DocumentGroup {
	var $key;
	var $description;
	var $documents = array();
	var $hasFeatures = false;
	function DocumentGroup($key, $description) {
		$this->key = $key;
		$this->description = $description;
	}
	function addDocument($document) {
		$this->documents[$document->key] =  $document;
		if ($document->feature) {
			$this->hasFeatures = true;
		}
	}
}

			// var g_projectNames = new Array("ies","maytag","watts","xb","whitney","spectrum","abnamro"); 
