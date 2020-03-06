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
		$resume->addQualItem("1", "I have over ten years experience providing web technology expertise to major corporations and enterprises for the building of web applications of high quality and reliability.  Recent accomplishments include providing clients with solutions using Javascript/Node.js/React Front End Development, Selenium-based Automated UI Testing, Salesforce Commerce Cloud eCommerce, load testing, SQL database design, asynchronous/multi-threaded processing, secure authentication, messaging, and integrating third party software.");
		$resume->addQualItem("2", "I excel at team code development, project lifecycle, cross-functional teamwork, identifying business needs and using collaboration tools.  I have applied technology and software development across diverse and eclectic problem spaces including scientific research in human hearing, cognitive psychology and Digital Signal Processing.  I am also an accomplished classical pianist, electric bass player, and composer.");

		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// CROCS
		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		$pos = $resume->addPosition($globals->Key->crocs, "Crocs, Inc.", "Remote", "Oct 2017 - Present",
					"Full Time/Perm", "Senior Front End Engineer");
		$pos->addListItem("1", "Javascript/web programmer in Salesforce Commerce Cloud (a.k.a. SFCC/DemandWare) for company eCommerce site with $1.2 bil in 2019 sales.");
        $pos->addListItem("2", "Integrate SFCC with third party eCommerce services: PayPal, Givex giftcards, Adyen, CardConnect, Signal Tag Manager, Kount Fraud Manager, Olapic, Narvar, and Adobe Audience Manager analytics");
        $pos->addListItem("3", "Develop custom multi-tiered web applications including SQL, REST services, Ajax, token based authentication, pub/sub messaging, Bash shell scripts, AWS, and BrowserStack cloud components.  Stack includes:  Node.js, React/Redux, Express, Sqlite, WebSockets, Bootstrap, Material-UI.");
        $pos->addListItem("4", "Develop reusable tools for UI automation and load testing; solve latency, asynchrony, and race condition issues; write CSS queries that work reliably across major mobile and desktop web browsers navigators.");
        $pos->addListItem("5", "Provide Automated UI Test coverage for the eCommerce site including all phases of the purchase lifecycle, shopping cart interaction, product returns, payment processing, user profile and fraud detection.  Tech stack:  internJS, leadfoot, eureQa, BrowserStack cloud.");
        $pos->addListItem("6", "Provide training & mentoring to junior develpers on Javascript, Node.js and SFCC; give presentations to to developers and cross-functional teams on React and Automated UI Testing.");
        $pos->addListItem("7", "Work with new fulfillment/distribution centers coming online by creating bulk test orders in the SAP Supply chain.");

		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// TRILOGYED
		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		$pos = $resume->addPosition($globals->Key->trilogyed, "UC Irvine / TrilogyEd", "Irvine, CA", "Aug 2017 - Nov 2017",
					"Direct Hire", "Course Instructor");
		$pos->addListItem("1", "Instructor for “Fullstack Developer” bootcamp, teaching HTML, CSS, Git, Bootstrap, Javascript, jQuery, Ajax, Firebase, Node.js");

		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// TEN-X
		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		$pos = $resume->addPosition($globals->Key->tenx, "Ten-X/auction.com", "Irvine, CA", "Apr 2016 - May 2017",
					"Direct Hire", "Sr. Software Engineer");
		$pos->addListItem("1", "Developed presentation layer and application logic for hosted web application <i>auction.com</i>, a Real Estate auction transaction platform");
		$pos->addListItem("2", "Responsible for features Search & Discovery, Event Details, Calendar, User prefs and personalization, and Home page written in AngularJS 1.4, React/Redux, ES6, ArcGIS, and Python");
    	$pos->addListItem("3", "Wrote QA Automation tests using Selenium and Nightwatch (demo: <a href='http://bit.ly/2wUjFcS' alt='Auction.com Authomated Tests Youtube video'>http://bit.ly/2wUjFcS</a>)");
    	$pos->addListItem("4", "Design and troubleshooting of REST and JSON-based backend, services, Omniture tracking to and LaunchDarkly feature flags");

		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// JOHN DEERE
		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		$pos = $resume->addPosition($globals->Key->johndeere, "John Deere", "Los Angeles, CA", "Oct 2015 - Mar 2016",
					"Contract", "Front End Developer Consultant");
		$pos->addListItem("1", "Developed AngularJS controllers, views, directives and services for  hosted web application <i>Sales Center</i>, a 'build-a-Deere' tool for sales reps");
		$pos->addListItem("2", "Wrote test coverage in Mocha, Sinon and Chai");
		$pos->addListItem("3", "Collaborated with Back End team on design and troubleshooting of REST/JSON-based services");

		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// CYBERCODERS
		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		$pos = $resume->addPosition($globals->Key->cybercoders, "CyberCoders", "Irvine, CA", "Nov 2014 - Aug 2015",
					"Direct Hire", "Front End Java Developer");
		$pos->addListItem("1", "Developer for hosted web application <i>Compass</i>, a CRM platform for Recruiters.");
        $pos->addListItem("2", "Created UI widgets and application logic for workflow tools in Sencha ExtJS 4.0.7 Javascript");
        $pos->addListItem("3", "Wrote backend Ajax/JSON components, test coverage in Jasmine, stress testing with jMeter");

		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// SEARS HOLDING CORPORATION
		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		$pos = $resume->addPosition($globals->Key->sears, "Sears Holding Corporation", "Chicago, IL", "Nov 2013 - June 2014",
					"Contract through Apex Systems", "Developer");  
		$pos->addListItem("1", "Member of Core Mobile team supporting mobile version of <i>sears.com</i> E-Commerce site");
		$pos->addListItem("2", "Wrote AngularJS controllers, views, and services, UIs in HTML5/CSS3 from Photoshop PSDs, REST web services in coordination.");
		$pos->addListItem("3", "Launched mobile version of new fatures Shop Your Way (loyalty card) and Shop Your Way Max (Sears version of Amazon Prime).");

		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// PATHFINDER SOFTWARE
		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		$pos = $resume->addPosition($globals->Key->path, "Pathfinder Software", "Chicago, IL", "Aug 2012 - Aug 2013",
					"Direct Hire", "Sr. Software Developer");  
		$pos->addListItem("1", "Wrote mobile apps (iPhone, iPad) for medical clients Kimberly-Clark, Haemonetics, and Amer. Assn. of Critical Care Nurses in hybrid web/iOS AngularJS and jQuery Mobile, Trigger.io, TestFlight, and Rails/Heroku");
		$pos->addListItem("2", "Lead developer on iPhone app that was deployed in Apple AppStore (AACN Bedside)");
		$pos->addListItem("3", "Lead developer for web-based census and demographic data-mining tool (MetroPulse Chicago:  demo: <a href='http://bit.ly/2wU5Yun' alt='MetroPulse Chicago Youtube video'>http://bit.ly/2wU5Yun</a>)");
		$pos->addListItem("4", "Lead developer on an iPad ‘concierge’ app to connect heart patients, their nurses and caregivers (ContinuCare) and  a blood drive simulation sales tool for the iPad (Automated Whole Blood Collector)");

		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// THOMSON-REUTERS	
		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // 26 months as of june 2012
		$pos = $resume->addPosition($globals->Key->tr, "Truven Health Analytics", "Chicago, IL", "Apr 2010 - Aug 2012",
					"Converted to FT/Perm after contract", "Sr. Software Developer");  
		$pos->addListItem("1", "Developed hosted web applications CareDiscovery and IntegrationDiscovery, Business Intelligence and data mining tools for a 4 TB Oracle OLAP Data Warehouse of Hospital Billing data");
		$pos->addListItem("2", "Created servlet- and portal-based J2EE web applications for IBM Websphere Portal 5, Tomcat 6 & Glassfish in Java 1.4 & 6 Servlets, JSP, jQuery Javascript,  PL/SQL stored procedures");

		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// 	ICROSSING
		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // 17 months
		$pos = $resume->addPosition($globals->Key->icross, "iCrossing", "Chicago", "Oct 08 - Mar 2010",
					"W2/Direct Placement", "Sr. Software Engineer");  
		$pos->addListItem("1", "Front End Developer for hosted web application Merchantize, an Ad Technology tool for managing clients' Paid Search campaigns, keyword purchases and cost-per-click advertising with major search and shopping engines (Google, Yahoo, MSN, NexTag, PriceGrabber)");
		$pos->addListItem("2", "Consumed streaming XML-based product feeds for clients Sears, The Gap, Hilton, Lands End, LEGO, and Williams Sonoma with cron-based processes written in Perl, Bash, SMTP & Java.");
		$pos->addListItem("3", "Wrote PDF reports in Apache POI Java, cleaned product feeds and resolved Mysql data integrity issues");

		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// 	TRIBUNE
		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // 9 months
		$pos = $resume->addPosition($globals->Key->trib, "Tribune Interactive", "Chicago", "Feb 08 - Oct 08",
					"W2/Direct Placement", "Sr. Internet Software Developer");  
		$pos->addListItem("1", "Developed web software and content management behind all of Tribune Corp's newspaper, radio and television websites, including Chicago Tribune, LA Times, Red Eye.");
		$pos->addListItem("2", "Developed code in Java 1.5 on J2EE platform including Oracle Application Server 10g, Oracle DB 10g, FAST search server, Sun Webserver (iPlanet) and TopLink 9.0 for web services.");
		$pos->addListItem("3", "Created scheduled jobs for sweeping expired database content and JMeter test plans to simulate heavy load on high-profile chicagotribune.com website.");

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
		$resume->addEducation("nwu", "PhD in Music Theory, Northwestern University - Evanston, IL (Dissertation: <a href='http://bit.ly/2wUbFZq'>http://bit.ly/2wUbFZq</a>)");
		$resume->addEducation("esm", "MA in Music Theory, Eastman School of Music - Rochester, NY");
		$resume->addEducation("csula", "Bachelor of Music, Piano Performance, California State University - Los Angeles, CA");

		$this->res = $resume;
	}
}
?>
