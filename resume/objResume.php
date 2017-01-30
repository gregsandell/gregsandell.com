<?php
// die "objResume.php";
$_cpath = $_SERVER['DOCUMENT_ROOT'];
include_once($_cpath . "/objGlobals.php");
class ResumeObj {
	var $positionObjArray;
	var $skillsetSummary;
	var $qualSummary;
	var $nname;
	var $addressLines;
	var $imageJava;
	var $imageSCWCD;
	var $training;
	var $education;
	function ResumeObj() {
		//print("making ResumeObj<br/>");
		$this->positionObjArray = array();
		$this->skillsetSummary = array();
		$this->qualSummary = array();
		$this->training = array();
		$this->education = array();
		$this->nname = "Greg Sandell";
		$this->addressLines = array();
		$this->addressLines["1"] = "Los Angeles";
		$this->addressLines["2"] = "213.479.0790";

		$this->addressLines["4"] = "greg.sandell &lt;at&gt; gmail.com";
		$this->addressLines["5"] = "More detail: http://www.gregsandell.com";
		$this->imageJava = "/image/resume/javaProgrammerCert.jpg";
		$this->imageSCWCD = "/image/resume/scwcdCert.jpg";
	}
	function addPosition($key, $company, $location, $dates, $basis, $title) {
		$this->positionObjArray[$key] =
			new PositionObj($key, $company, $location, $dates, $basis, $title);
		return($this->positionObjArray[$key]);
	}
	function getPosition($key) {
		return($this->positionObjArray[$key]);
	}
	function addSkillItem($key, $text) {
		$this->skillsetSummary[$key] = $text;
	}
	function addQualItem($key, $text) {
		$this->qualSummary[$key] = $text;
	}
	function addTraining($key, $dates, $description) {
		$this->training[$key] = new TrainingObj($key, $dates, $description);
	}
	function addEducation($key, $description) {
		$this->education[$key] = new EducationObj($key, $description);
	}
		

}

class PositionObj {
	var $listTextArray = array();
	var $kkey;
	var $dates;
	var $company;
	var $ttitle;
	var $basis;
	var $location;
	function PositionObj($key, $company, $location, $dates, $basis, $title) {
		//print("making PositionObj<br/>");
		$this->kkey = $key;
		$this->dates = $dates;
		$this->company = $company;
		$this->ttitle = $title;
		$this->basis = $basis;
		$this->location = $location;
	}
	function addListItem($key, $text) {
		$this->listTextArray[$key] = $text;
	}
}
class TrainingObj {
	var $kkey;
	var $dates;
	var $description;
	function TrainingObj($key, $dates, $description) {
		$this->kkey = $key;
		$this->dates = $dates;
		$this->description = $description;
	}
}
class EducationObj {
	var $kkey;
	var $description;
	function EducationObj($key, $description) {
		$this->kkey = $key;
		$this->description = $description;
	}
}
class ResumeManager {
	var $res;
	function ResumeManager() {
		//print("making ResumeManager<br/>");
		$globals = new GlobalsObj();
		$resume = new ResumeObj();
		$resume->addQualItem("1", "I have 18 years experience in Front End Development of web-based applications, playing a delivery role in medium to large enterprise projects in Java/Linux/Open Source environments.  I focus on the Front End programming logic for transactional web pages, and can deploy designs in HTML5 and CSS3 as well.  I have 13 years experience with Agile methodology, tooling, TDD and test coverage.");
		$resume->addQualItem("2", "Technology stack (ordered roughly by recency and strength):  AngularJS 1.4, Javascript, Git, Mocha/Sinon/Chai, Advanced Rest Client, WebStorm 11.0.3, Rally, Jenkins, LESS, nodeJS, API Blueprint, Nexus, Bootstrap, ExtJS 4.0.7, Jasmine 2.3, Fisheye/Crucible, Eclipse 4.4/Luna, jMeter 2.13, Oracle, jQuery, jQuery Mobile, Maven 4, HTML5, CSS3, Tomcat 6, GlassFish 3.1.2, JEE 6, JSP, Artifactory, mysql, SQL Server.");
 
		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// TEN-X
		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		$pos = $resume->addPosition($globals->Key->tenx, "Ten-X/auction.com", "Irvine, CA", "Apr 2017 - present",
					"Contract", "Front End Developer Consultant");
		$pos->addListItem("1", "Developer for hosted web application auction.com, an online tool for Real Estate auctions");
		$pos->addListItem("2", "Wrote presentation layer and application logic in AngularJS/React/ES6 Javascript & Python");
		$pos->addListItem("3", "Built apps in using tools:  nodeJS, Webpack, npm, nvm");
		$pos->addListItem("4", "Virtualization of Windows & Linux on OSX with Vagrant, VirtualBox, and Docker");
		$pos->addListItem("5", "Wrote selenium tests for AngularJS and React component using Nightwatch library");
		$pos->addListItem("6", "Added Omniture tracking to applications");
		$pos->addListItem("7", "Collaborated with Back End team on design and troubleshooting of REST/JSON-based services");
		$pos->addListItem("8", "Tooling & Collaboration:  eslint, Git, SourceTree, Jenkins, WebStorm, Slack, Jira, Confluence");
		$pos->addListItem("9", "Frequent travel to Belmont, CA office");

		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// JOHN DEERE
		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		$pos = $resume->addPosition($globals->Key->johndeere, "John Deere", "Los Angeles, CA", "Oct 2015 - Mar 2016",
					"Contract", "Front End Developer Consultant");
		$pos->addListItem("1", "Developer for hosted web application 'Sales Center', a 'build-a-Deere' tool for sales reps.");
		$pos->addListItem("2", "Wrote presentation layer and application logic in AngularJS/Javascript");
		$pos->addListItem("3", "Wrote tests for AngularJS controllers, views, directives and services in Mocha Sinon Chai");
		$pos->addListItem("4", "Collaborated with Back End team on design and troubleshooting of REST/JSON-based services");
		$pos->addListItem("5", "API Blueprint to mock REST services for local development");
		$pos->addListItem("6", "AngularJS libs:  angular-ui-router, angular-translate, angular-bootstrap, ng-infinite-scroll");
		$pos->addListItem("7", "Tooling & Collaboration:  eslint, Git, SourceTree, Jenkins, WebStorm, Hangouts, Lync, Flowdock");
		$pos->addListItem("8", "100% remote work (HQ in Moline, IL), some travel");

		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// CYBERCODERS
		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		$pos = $resume->addPosition($globals->Key->cybercoders, "CyberCoders", "Irvine, CA", "Nov 2014 - Aug 2015",
					"Direct Hire", "Front End Java Developer");
		$pos->addListItem("1", "Developer for hosted web application 'Compass', a CRM platform for Recruiters.");
        $pos->addListItem("2", "Wrote application logic in Javascript, ExtJS, Ajax/JSON programming.");
        $pos->addListItem("3", "Created forms, panels, grids and other UI widgets from ExtJS components");
        $pos->addListItem("4", "Stress-tested app with jMeter, 5-250 concurrent users.");
        $pos->addListItem("5", "Wrote Jasmine unit tests for project’s custom ExtJS components");
       
		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// GIFTS.COM
		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		/*
		$pos = $resume->addPosition($globals->Key->gifts, "Gifts.com", "Chicago, IL", "Aug 2014 - Sep 2014",
					"Contract", "Sr Software Engineer, Front End");  
		$pos->addListItem("1", "Responsive design (converting old HTML)");
		$pos->addListItem("2", "Translate Photoshop PSDs to responsive CSS/HTML");
		$pos->addListItem("3", "Javascript programming for filtering search results");
		*/

		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// SEARS HOLDING CORPORATION
		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		$pos = $resume->addPosition($globals->Key->sears, "Sears Holding Corporation", "Chicago, IL", "Nov 2013 - June 2014",
					"Contract through Apex Systems", "Developer");  
$pos->addListItem("1", "Member of Core Mobile team supporting mobile version of sears.com eCommerce site");
$pos->addListItem("2", "Wrote AngularJS controllers, views, and services for new website features");
$pos->addListItem("3", "Ajax calls to REST web services");
$pos->addListItem("4", "Overhauled site so mobile users with Private Browsing enabled get access to all features");
$pos->addListItem("5", "Integrated features of the Shop Your Way loyalty card into the mobile experience");
$pos->addListItem("6", "Implemented Shop You Way Max (Sears' version of Amazon Prime)");
$pos->addListItem("7", "Used git for version control, Jira and Mingle for project management");

		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// PATHFINDER SOFTWARE
		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		$pos = $resume->addPosition($globals->Key->path, "Pathfinder Software", "Chicago, IL", "Aug 2012 - Aug 2013",
					"Direct Hire", "Sr. Software Developer");  
$pos->addListItem("1", "30-person consultancy specializing in mobile medical solutions");
$pos->addListItem("2", "Integrated jQuery apps with numerous plugins incuding jsViews, headJs, panzoom, fullproof, wysiwyg, moment, showbizPro, bootstrap, colorbox, cookie, easing, dynatree and transit");
$pos->addListItem("3", "Used cloud-based storage providers Parse and Apigee");
$pos->addListItem("4", "Practiced Agile principles including scrum, 1-week iterations, Continuous Integration, using Confluence &amp; Pivotal Tracker Git, Github, Jasmine, and Karma");
$pos->addListItem("5", "Wrote SPA (Single Page Web Applications) using RESTFUL web services plus Ajax and AngularJS");
$pos->addListItem("6", "Delivered a high quality UI for MetroPulse Chicago for exploring a large repository of Chicago civic data; demo video at http://www.youtube.com/watch?v=FfeH4n7k5pA");
$pos->addListItem("7", "Wrote hybrid iOS/web appstore application for the Amer. Assn. for Critical Care Nurses using jQuery Mobile, JSON, AngularJS, Trigger.io, and TestFlight");


		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// THOMSON-REUTERS	
		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // 26 months as of june 2012
		$pos = $resume->addPosition($globals->Key->tr, "Truven Health Analytics", "Chicago, IL", "Apr 2010 - Aug 2012",
					"Converted to FT/Perm after contract", "Sr. Software Developer");  
$pos->addListItem("1", "Formerly Thomson-Reuters Healthcare.  Sold in June 2012 for $1.25 bil.");
$pos->addListItem("2", "Create rich, intuitive, high-touch Ajax user interfaces and reusable widgets for CareDiscovery, a  Business Intelligence tool for the Healthcare Industry.");
$pos->addListItem("3", "Create servlet- and portal-based enterprise web applications for IBM Websphere Portal 5, Tomcat 6 & Glassfish in mixed JEE 6 and J2EE 1.4 environment.");
$pos->addListItem("4", "Practice Agile principles including scrum, 3-week iterations, TDD, Continuous Integration");
$pos->addListItem("5", "Develop SaaS components in Java and Ajax communicating over a JSON-based service bus");
$pos->addListItem("6", "Write User Interfaces and Ajax in Javascript & jQuery, promoting reusable patterns, functional programming, and closures");
$pos->addListItem("7", "Develop jQuery plugins for reusable UI widgets");
$pos->addListItem("8", "Integrate Cognos reports into application using Cognos Javascript API and iFrames");
$pos->addListItem("9", "Author PL/SQL queries in Toad that work against a 4 TB Oracle OLAP (Data Warehouse) database, for deployment in Web Services");
$pos->addListItem("10", "Collaborate with the ETL/ Informatica team to determine the necessary data models and UI designs to support Cognos reports.");
$pos->addListItem("11", "Develop Maven plugins and perl scripts to streamline build process");
$pos->addListItem("12", "Work within HIPAA regulations to secure applications and databases using RSA,  TAM, and Oracle Proxy Authentication.");
$pos->addListItem("13", "Break down business requirements into tightly defined software module specifications/estimates &amp; document them on Wiki.");
$pos->addListItem("14", "Write functional prototypes of web interfaces using JSON to simulate Server layer");
$pos->addListItem("15", "Develop portal applications for IBM Websphere Portal Server and deploy with WPS Admin");
$pos->addListItem("16", "Helped transition team from waterfall to agile approach by introducing Maven2, Artifactory Repository Server, Hudson Continuous Integration, Mercurial source control and TDD practices.");
$pos->addListItem("17", "Other technologies not mentioned above: Eclipse, CVS, Rally, JSP, JSTL, Ant, Firebug, Spring MVC/IOC/JDBC, GWT, Struts 1.2, Tiles");
		

		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// 	ICROSSING
		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // 17 months
		$pos = $resume->addPosition($globals->Key->icross, "iCrossing", "Chicago", "Oct 08 - Mar 2010",
					"W2/Direct Placement", "Sr. Software Engineer");  
		$pos->addListItem("1", "Developed proprietary online application 'Merchantize' used by iCrossing clients.  The application provides a unified interface for managing clients' Paid Search campaigns with major search and shopping engines (Google, Yahoo, MSN, NexTag, PriceGrabber).");
		$pos->addListItem("2", "Utilized Struts2/Webwork to build Business Intelligence tools for reporting, analysis and dashboards against an in-house Data Warehouse on Mysql 5.1 containing click and purchase information from clients' E-commerce sites.");
		$pos->addListItem("3", "Performed regular support of application database including resolving data integrity issues, synchronizing with remote search engine data, bulk keyword deletes and cost-per-click changes.");
		$pos->addListItem("4", "Programmed a 3-tier daily product feed lifecycle with Perl, Bash, Java, XML and Unix cron.  Large product datasets would be sent from clients by ftp, be transformed to a unified data format, and sent out to Google, Yahoo, MSN, etc., through each Search Engine's proprietary API.");
		$pos->addListItem("5", "Collaborated with account managers to address the reporting needs for clients Sears, The Gap, Hilton, Lands End, LEGO, Williams Sonoma.  Custom reports were created on the Merchantize UI or in Excel using Apache POI.");
		$pos->addListItem("6", "Provided expertise for resolving UTF-8, Latin1 and WinLatin1 character conversion problems in feeds.");
		$pos->addListItem("7", "On regular rotation for bi-weekly release of product across 10 different Linux servers.");
		$pos->addListItem("8", "Created JUnit tests for Test Driven Development.");
			$pos->addListItem("9", "Collaborated using a Scrum based agile methodology, using tools Bamboo (continuous integration), Crucible (code reviews), Fisheye and Greenhopper.");

/* 
 * Old version of iCrossing...

		$pos->addListItem("1", "Core Java and JEE Developer for Merchantize, a Business Intelligence tool and front end to third party APIs to manage and report on client's Paid Search campaigns for Google, Yahoo, Ask &amp; MSN ");
		$pos->addListItem("2", "Client list of Merchantize users included Hilton, Sears, Gap, Land's End, Lego, Wms Sonoma");
		$pos->addListItem("3", "Developed code in Java 1.5 on J2EE platform including Tomcat 5, Mysql, Spring, Struts2/Webwork, JSP, OGNL, Perl, and Quartz. ");
		$pos->addListItem("4", "Wrote Java modules in Apache POI to generate dynamic Excel documents for custom reports as request by internal or external clients ");
		$pos->addListItem("5", "Perl scripting an XML processing for daily incoming and outgoing feeds; troubleshooting 3-tier daily feed lifecycle for client Sears");
		$pos->addListItem("6", "Was local expert for resolving character conversion problems (UTF-8, Latin1 and WinLatin1) ");
		$pos->addListItem("7", "On regular rotation for bi-weekly release of product across 10 different Linux servers");
		$pos->addListItem("8", "Developed GUI-based reports in Java, SQL and in-house XML DSL against an 80 gb Data Warehouse; added drills, tabs, formulas, filters");
		$pos->addListItem("9", "Maintenance of Paid Search backend data:  repairing syncs with Google Adwords, cleaning duplicate entries, bulk keyword deletes, bulk cost-per-click changes");
		$pos->addListItem("10", "Mysql administration:  exporting &amp; importing DB snapshots, resolving data integrity issues");
		$pos->addListItem("11", "Agile-based development team, daily scrums, TDD, 2-week iterations and continuous integration. Use tools Intellij, Eclipse, svn, Jira, Confluence, Fisheye, Greenhopper, Campfire, Crucible and Bamboo");
 */

		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// 	TRIBUNE
		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // 9 months
		$pos = $resume->addPosition($globals->Key->trib, "Tribune Interactive", "Chicago", "Feb 08 - Oct 08",
					"W2/Direct Placement", "Sr. Internet Software Developer");  
		$pos->addListItem("1", "Supported central web software and content management behind all of Tribune Corp's newspaper, radio and television websites, including Chicago Tribune, LA Times, Red Eye");
		$pos->addListItem("2", "Developed code in Java 1.5  on J2EE platform including Oracle Application Server 10g, Oracle DB 10g, FAST search server, Sun Webserver (iPlanet) and TopLink 9.0. Development tools included Intellij 6.0, svn, Borland Starteam, Toad, SQuirrel SQL Client, Cruise Control, Enterprise Architect 7");
		$pos->addListItem("3", "Created scheduled jobs for sweeping expired database content");
		$pos->addListItem("4", "Worked with SEO Manager to optimize sites for favorable Google positioning, created daily, weekly and 30-day sitemaps");
		$pos->addListItem("5", "Supported web services for user registration and Mobile feeds");
		$pos->addListItem("6", "Created JMeter test plans and reporting tools to compare performance before and after software changes");
		$pos->addListItem("7", "Wrote Product Development specs, deployment and QA test plans");
		$pos->addListItem("8", "Actively deployed apps in server farm environments with separate environments for dev, qa, design, test and prod");

		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// 	UBS
		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // 12 months
		$pos = $resume->addPosition($globals->Key->ubs, "UBS Investment Bank, Equities", "Chicago", "Mar 07 - Feb 08",
					"W2 through Harmer Associates", "Developer/Analyst");  
		$pos->addListItem("1", "Developer for web tier of Pinpoint, UBS's Level-2 Direct Market Access Electonic Trading platform.  25-member team spread across Chicago, Stamford and London offices");     
		$pos->addListItem("2", "Develop code in Java 1.5, JSP, JSTL, SQL and Ajax on platform including Tomcat, MS SQL Server, Oracle.  Development tools include Intellij, Maven 2, svn, Fiddler, Firebug, Jira and Confluence.");     
		$pos->addListItem("3", "Develop reports on daily trading activity using dynamic creation of (1) PDFs with iText, (2) plots with jFreeChart and (3) MS Office docs with Poi.");
		$pos->addListItem("4", "Maintain and enhance admin pages for job scheduling, web service monitoring, exchanges, destinations and permissions. Use Prototype and Scriptaculous javascript libraries to provide high-touch Ajax functionality. Develop specifications for stored procedures (SQL Server) and write DAOs to interface them with Java code.");
		$pos->addListItem("5", "Maintain Maven-2 based build environment and provide expertise to other teams using Maven.  Also write custom Maven plug-ins in java (mojos) to customize build cycle (e.g. added javascript crunching).");
		$pos->addListItem("6", "Jira installation/maintenance including custom Jira plugin programming in java.");

		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// 	USAF
		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // 7 months
		$pos = $resume->addPosition($globals->Key->usaf, "Lockheed Martin/US Air Force", "Chicago", "Jul 06 - Jan 07",
					"W2 through Roundarch, Inc", "Sr. Consultant Developer");  
		$pos->addListItem("1", "Java Developer on projects for Lockheed's GCSS contract (Global Combat Support Systems) with the US Air Force, supporting Data Services and the Air Force Portal.");     
		$pos->addListItem("2", "Supported various 3rd party components, including Broadvision portal and content management, Tivoli Webseals, and Autonomy Search Engine for all enhancements and bug fixes for AF Portal");     
		$pos->addListItem("3", "System designer and lead web developer for Self Service Data Access Request project, a front-end tool for accessing a variety of Air Force Data Warehouses.   Wrote code in Java, JSF, Struts, jFreeChart, SQL, CSS &amp; Ajax for platform including Tomcat, Websphere, Oracle, mysql, Powercenter and Informatica.  Used Intellij, Eclipse, Oracle client, Mantis and CVS development tools.");
		$pos->addListItem("4", "Led major Autonomy version upgrade (v.4 to v.5), implementing spellchecking and integrating content deletion across Broadvision and Autonomy.");
		$pos->addListItem("5", "Prepared technical docs for step-by-step guidance of installs and upgrades performed by staff at remote server locations.");
    //
		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// 	AMEX
		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // 7 months
		$pos = $resume->addPosition($globals->Key->amex, "American Express Global Travel Technologies", "Phoenix, AZ", "Jan 06 - Jul 06",
					"corp-to-corp through 18th Street Consulting", "Sr. Java Developer");  
		$pos->addListItem("1", "Developer for the Travelbahn software group, handling programming for web-based apps for Corporate Travel management.  Systems supported:  Traveler Profile, Pre-Trip Authorization and Web ID Client tool.");     
		$pos->addListItem("2", "Performed System Analysis and planning for a migration of all web application from in-house MVC framework to Struts.  Prepared business &amp; tech docs for enhancements &amp; releases.");     
		$pos->addListItem("3", "Wrote code in Java, JSP, JSTL, Stored Procedures and Ajax for platform including Tomcat, Oracle, TopLink, Amadeus, Apollo, Galileo, Sabre, and Worldspan.");     
		$pos->addListItem("4", "Telecommuted from home and coordinated with team through VPN/chat/conference calls.");     

		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// 	ABN-AMRO
		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // 9 months
		$pos = $resume->addPosition($globals->Key->abn, "ABN AMRO", "Chicago", "May 05 - Jan 06",
					"W2 through IT vendor Spry Solutions", "Sr. Java Developer");  
		$pos->addListItem("1", "Java developer for MaxTrad, a web-based software suite with single point access to initiating import letters of credit, purchase order management, supply chain management, and preparation of export documents.  See www.maxtrad.com.");     
		$pos->addListItem("2", "Developed presentation-layer for the Import Letter of Credit workflow, including multi-tabbed forms with over 50 dynamically-generated input fields.  Wrote code in Java, JSP, JSTL, Struts and Ajax on platform including EJB, Websphere, Oracle and SQL Server.  Development tools included WSAD, CVS and Harvest.");     
		$pos->addListItem("3", "Worked onsite at client ABN-AMRO (NYSE:ABN, $670 bil total assets).");     

		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// 	IES
		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // 22 months
		$pos = $resume->addPosition($globals->Key->ies, "IES Abroad", "Chicago", "July 03  - May 05",
					"W2/direct hire", "Web Software Engineer");  
		$pos->addListItem("1", "Architected company website (www.IESAbroad.org) replacing an older and increasingly brittle ASP/IIS system.  Developed XML-based content management system and a flexible, extensible page templating system around 40 different study abroad programs in 26 centers in 19 countries");     
		$pos->addListItem("2", "Wrote code in Java, JSP, Struts, Tiles, XML, XSL and Ajax on platforms involving Tomcat, Apache, Oracle, mysql and Empower.  Development tools included Intellij, CVS, svn, jira, bugzilla");     
		$pos->addListItem("3", "Developed Online Application and Catalog Request, two high-volume, multi-step webapps critical for company revenue.");     
		$pos->addListItem("4", "Managed technical requirements using Bugzilla and Jira to coordinate between technical and marketing teams.");     
		$pos->addListItem("5", "Developed company's web branding Style Guide in collaboration with Design &amp; Marketing");     
		$pos->addListItem("6", "Managed builds and promotions to preview and production web servers using svn, bash and scp");     
		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// 	UBSW
		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // 2 months
		$pos = $resume->addPosition($globals->Key->ubsw, "UBS Warburg", "Chicago", "Feb - Mar 03",
					"W2 through IT vendor Adecco", "Java Developer");  
		$pos->addListItem("1", "Developed Get It!, a web-based software procurement workflow application now in wide use across the organization.  Wrote code in Java, JSP &amp; Ajax on a Tomcat, Oracle 9i and Documentum platform.  Development tools included NetBeans, Clearcase");     

		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// 	XB
		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // 8 months
		$pos = $resume->addPosition($globals->Key->xb, "Expand Beyond Corp.", "Chicago", "Jun 02 - Jan 03",
					"W2/direct hire", "Web Developer");  
		$pos->addListItem("1", "Worked on flagship software product PocketDBA with 7-member Agile-based Java team.  Practiced test-based coding, pair-programming, daily stand-ups, and bi-weekly releases.");     
		$pos->addListItem("2", "Responsible for web-based tools for configuring product and provisioning licenses, and company website.  Coded in Java, JSP, PHP, Stored Procedures, DTS Packages and Ajax on platform including Tomcat, Apache, Oracle, SQL Server and mysql.  Development tools included Intellij, NetBeans, Bugzilla and Clearcase.");     
		$pos->addListItem("3", "Created pre-launch Quality Control plans by developing use cases and acceptance tests, working with QA manager.");

		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// 	QUEBECOR
		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // 7 months
		$pos = $resume->addPosition($globals->Key->quebecor, "Quebecor World", "Itasca, IL", "Dec 01 - Jun 02",
					"W2, recruiter placement", "Web Developer");  
		$pos->addListItem("1", "Wrote and supported web-based Human Resources self-service applications (employee 401k self-management, personal data)");     
		$pos->addListItem("2", "Wrote code in PHP, Lawson client-server and Ajax on platform including Apache, Lawson and Oracle.  Development tools included CVS, PVCS, Visual Source Safe.");     
		$pos->addListItem("3", "Developed an RSA Encryption layer for integration between Lawson ERP and outsourced web layer for management of Putnam 401k financials.");     
		$pos->addListItem("4", "40,000-employee print industry giant with $1.6 bil revenues.  NYSE:IQW.");     
    
		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// 	MAYTAG
		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		$pos = $resume->addPosition($globals->Key->maytag, "Maytag Corp", "Chicago", "Aug 00 - Aug 01",
					"W2 through Giant Step", "Sr. Web Application Engineer");  
		$pos->addListItem("1", "Team lead (13 developers) for major design and technology overhaul of Maytag Corp's website and online product catalogue.");     
		$pos->addListItem("2", "Architected and developed the approaches for authentication, membership architecture, session management, cookie-management, URL-rewriting, auto-signin and sticky routing on Broadvision platform.");     
		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// 	GIANT STEP
		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // Giant Step altogether 32 months
		$pos = $resume->addPosition($globals->Key->giantstep, "Giant Step Productions LLC", "Chicago", "Apr 99 - Aug 00",
					"W2/direct hire", "Sr. Web Application Engineer");  
		$pos->addListItem("1", "Leo Burnett/Publicis-owned full-service web integration company (200-employees), now under name Arc Worldwide");     
		$pos->addListItem("2", "Consulted for Allstate.com to transition their dynamically-generated agent homepages (20,000 agents) from MS-Access backend to DB2 and manage content with ePrise system.");
		$pos->addListItem("3", "Developed numerous lead-generation and sweepstakes sites for clients Purina, Oldsmobile, Procter & Gamble, Vidal Sassoon, written in ASP, Javascript and Stored Procedures on IIS and MS SQL Server platform.  Development tools included Visual Studio, Source Safe and in-house bug tracking tool");     
		$pos->addListItem("4", "Coordinated with teams encompassing the full spectrum of web business (Design, Hosting, QA, User Experience, etc.).  Developed coding standards and a month-long mentoring process for new employees.");     
    
		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// 	TAPROOT
		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // 8 months
		$pos = $resume->addPosition($globals->Key->watts, "Edwin Watts Golf Stores", "Chicago", "Sep 98 - Apr 99",
					"W2 through Taproot Interactive Studio", "Lead Programmer");  
		$pos->addListItem("1", "Developed ASP-based E-commerce website for golf retailer Edwin Watts (www.EdwinWatts.com) and supported Perl-based E-commerce sites for Successories and Pace Communications.  One site produced $268k in sales in first three months.");
		$pos->addListItem("2", "Designed MS-Access database to store products, customer data and purchases and ASP/IIS programming for online catalog, shopping cart, product features and third-party online payment software.");     

		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// 	LOYOLA
		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		$pos = $resume->addPosition($globals->Key->loyola, "Loyola University, Parmly Hearing Institute", "Chicago", "Apr 95 - Sep 98",
					"W2, direct hire", "Research Associate");  
		$pos->addListItem("1", "C, Java, X-11 Motif programming for experiments in hearing research");

		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// 	SUSSEX
		/////////////////////////////////////////////////////
		$pos = $resume->addPosition($globals->Key->sussex, "Sussex University, Experimental Psychology", "Brighton, England", "Apr 93 - Apr 95",
					"W2, direct hire", "Research Associate");  
		$pos->addListItem("1", "C, X-11 Motif, and Macintosh programming for experiments in hearing research");
		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// 	CNMAT
		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		$pos = $resume->addPosition($globals->Key->cnmat, "University of California, Center for New Music &amp; Audio Technologies", "Berkeley, CA", "Jan 92 - Apr 93",
					"Prize-funded", "Research Fellow");  
		$pos->addListItem("1", "Position funded by winning Hunt Fellowship from the Acoustical Society of America");     
		$pos->addListItem("2", "Research & Development of music synthesizer technology.");     
		$pos->addListItem("3", "C programming on Sparc and NeXT computers.");
		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// 	ILS
		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		$pos = $resume->addPosition($globals->Key->ils, "Northwestern University", "Evanston, IL", "Sep 89 - Dec 91",
					"W2, Direct Hire", "Programmer");  
		$pos->addListItem("1", "LISP, X-11 and Macintosh Think-C programming for multimedia educational apps.");     
		$pos->addListItem("2", "Wrote Digital Signal Processing code for interactive voice recording and analysis for client Ameritech.");
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// 	BILL WHITNEY
		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		$pos = $resume->addPosition($globals->Key->billwhitney, "Bill Whitney Studios", "Chicago, IL", "Sep 97",
					"W2 through Spellbinders", "Programmer");  
		$pos->addListItem("1", "Created online portfiolio for digital artist Bill Whitney");     
		$pos->addListItem("2", "Written in DHTML and Javascript");		             
               ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// 	END OF POSITIONS
		//  
		//  NEXT:  TRAINING
		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		$resume->addTraining("fluff", "No Fluff, Just Stuff Conference, Itasca, IL", "Nov 06, Nov 07, Nov 11");
		$resume->addTraining("autonomy", "Autonomy Search Engine Developer Training (1 week, San Francisco)", "Aug 06");
		$resume->addTraining("scwcd", "Sun Certified Web Component Developer for J2EE 1.4  (SCWCD)", "March 05");
		$resume->addTraining("sjp", "Sun Certified Programmer for the Java 2 Platform 1.4  (SCJP)", "April 04");
		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// 	EDUCATION
		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		$resume->addEducation("nwu", "PhD in Music Theory, Northwestern University - Evanston, IL");
		$resume->addEducation("esm", "MA in Music Theory, Eastman School of Music - Rochester, NY");
		$resume->addEducation("csula", "Bachelor of Music, Piano Performance, California State University - Los Angeles, CA");

		$this->res = $resume;
	}
}
?>
