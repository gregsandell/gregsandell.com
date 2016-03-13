<?php
$_cpath = $_SERVER['DOCUMENT_ROOT'];
include_once($_cpath . "/objGlobals.php");
class SkillsObj {
	var $categoryObjArray;
	var $introTextArray;
	function SkillsObj() {
		//print("making ResumeObj<br/>");
		$this->categoryObjArray = array();
		$this->introTextArray = array();
	}
	
	function addCategory($key, $category, $desc) {
		$this->categoryObjArray[$key] =
			new SkillsCategoryObj($key, $category, $desc);
		return($this->categoryObjArray[$key]);
	}
	function addIntroText($key, $text) {
		$this->introTextArray[$key] = $text;
	}
	function addSkillItem($key, $text) {
		//print("adding skillset<br/>");
		$this->skillsetSummary[$key] = $text;
	//print($this->skillsetSummary[$key]);
	}
}

class SkillsCategoryObj {
	var $listTextArray = array();
	var $kkey;
	var $ctegory;
	var $desc;
	function SkillsCategoryObj($key, $category, $desc) {
		//print("making PositionObj<br/>");
		$this->kkey = $key;
		$this->category = $category;
		$this->desc = $desc;
	}
	function addListItem($key, $text) {
		//print("adding ListItem<br/>");
		$this->listTextArray[$key] = $text;
		//print($this->listTextArray[$key]);
	}
}
class SkillsManager {
	var $skills;
	function SkillsManager() {
		// print("making ResumeManager<br/>");
		$skills = new SkillsObj();
		$skills->addIntroText("1", "This is the introductory text.");
		$cat = 1;
		$skill = $skills->addCategory($cat, "Javascript etc", ""); $cat++;
		$count = 0;
		$skill->addListItem($count, "AngularJS"); $count++;
		$skill->addListItem($count, "jQuery");  $count++;
		$skill->addListItem($count, "JSON/JSONP");  $count++;
		$skill->addListItem($count, "CoffeeScript");  $count++;
		$skill->addListItem($count, "jsHint");  $count++;
		$skill->addListItem($count, "NodeJS");  $count++;
		$skill->addListItem($count, "Grunt");  $count++;
		$skill->addListItem($count, "Jasmine");  $count++;
        
		$skill = $skills->addCategory($cat, "Web", ""); $cat++;
		$count = 0;
		$skill->addListItem($count, "HTML5");  $count++;
		$skill->addListItem($count, "CSS3");  $count++;
		$skill->addListItem($count, "SASS");  $count++;
		$skill->addListItem($count, "PHP"); $count++;
		$skill->addListItem($count, "JSP/JSTL"); $count++;
		$skill->addListItem($count, "Fiddler"); $count++;
		$skill->addListItem($count, "Firebug"); $count++;
		$skill->addListItem($count, "Chrome Dev Tools"); $count++;

		$skill = $skills->addCategory($cat, "Mobile", ""); $cat++;
		$count = 0;
		$skill->addListItem($count, "jQuery Mobile");  $count++;
		$skill->addListItem($count, "Trigger.io");  $count++;
		$skill->addListItem($count, "Testflight");  $count++;
        
		$skill = $skills->addCategory($cat, "Web Services", ""); $cat++;
		$count = 0;
		$skill->addListItem($count, "Ajax");  $count++;
		$skill->addListItem($count, "REST");  $count++;
		$skill->addListItem($count, "Advanced REST Client");  $count++;


		$skill = $skills->addCategory($cat, "Other Languages", ""); $cat++;
		$count = 0;
		$skill->addListItem($count, "Java 1.4, 1.5");  $count++;
		$skill->addListItem($count, "C");  $count++;
		$skill->addListItem($count, "Bash scripting");  $count++;
		$skill->addListItem($count, "Perl");  $count++;
		$skill->addListItem($count, "Ruby on Rails");  $count++;

		$skill = $skills->addCategory($cat, "Databases &amp; Tools", ""); $cat++;
		$count = 0;
		$skill->addListItem($count, "MS SQL Server");  $count++;
		$skill->addListItem($count, "mysql");  $count++;
		$skill->addListItem($count, "Oracle");  $count++;
		$skill->addListItem($count, "JDBC"); $count++;
		$skill->addListItem($count, "MS Access");  $count++;
		$skill->addListItem($count, "PostgreSql");  $count++;
		$skill->addListItem($count, "Toad For Oracle"); $count++;
		$skill->addListItem($count, "SQL Server Manager"); $count++;
		$skill->addListItem($count, "SQuirrel SQL"); $count++;
		$skill->addListItem($count, "DBVisualizer"); $count++;

		$skill = $skills->addCategory($cat, "XML etc", ""); $cat++;
		$count = 0;
		$skill->addListItem($count, "XSLT");  $count++;
		$skill->addListItem($count, "XMLSpy"); $count++;
		$skill->addListItem($count, "XMLStarlet"); $count++;
		$skill->addListItem($count, "Cooktop"); $count++;

		$skill = $skills->addCategory($cat, "Application Servers", ""); $cat++;
		$count = 0;
		$skill->addListItem($count, "Glassfish"); $count++;
		$skill->addListItem($count, "Oracle App Server 10g"); $count++;
		$skill->addListItem($count, "Tomcat 5 &amp; 6"); $count++;
		$skill->addListItem($count, "Apache"); $count++;
		$skill->addListItem($count, "Mamp"); $count++;
		$skill->addListItem($count, "Websphere"); $count++;
		$skill->addListItem($count, "Autonomy"); $count++;
		$count = 0;
		$skill = $skills->addCategory($cat, "IDEs &amp; Editors", ""); $cat++;
		$skill->addListItem($count, "Vim"); $count++;
		$skill->addListItem($count, "Intellij IDEA 7"); $count++;
		$skill->addListItem($count, "Websphere WSAD"); $count++;
		$skill->addListItem($count, "Eclipse"); $count++;
		$skill->addListItem($count, "NetBeans"); $count++;

		$skill = $skills->addCategory($cat, "Code Management", ""); $cat++;
		$count = 0;
		$skill->addListItem($count, "Git/GitHub"); $count++;
		$skill->addListItem($count, "Maven"); $count++;
		$skill->addListItem($count, "SVN"); $count++;
		$skill->addListItem($count, "CVS"); $count++;
		$skill->addListItem($count, "Ant"); $count++;

		$skill = $skills->addCategory($cat, "Team Tools", ""); $cat++;
		$count = 0;
		$skill->addListItem($count, "Confluence"); $count++;
		$skill->addListItem($count, "Jira"); $count++;
		$skill->addListItem($count, "Pivotal Tracker"); $count++;
		$skill->addListItem($count, "Bamboo"); $count++;
		$skill->addListItem($count, "FishEye"); $count++;
		$skill->addListItem($count, "Jenkins"); $count++;
		$skill->addListItem($count, "Crucible"); $count++;
		$count = 0;
		$skill = $skills->addCategory($cat, "Unix Tools", ""); $cat++;
		$skill->addListItem($count, "Homebrew"); $count++;
		$skill->addListItem($count, "Cygwin"); $count++;
		$skill->addListItem($count, "ssh/scp"); $count++;
		$skill->addListItem($count, "Putty"); $count++;

		$skill = $skills->addCategory($cat, "Code Libraries", ""); $cat++;
		$count = 0;
		$skill->addListItem($count, "JDom"); $count++;
		$skill->addListItem($count, "jFreeChart"); $count++;
		$skill->addListItem($count, "Scriptaculous"); $count++;
		$skill->addListItem($count, "iText"); $count++;
		$skill->addListItem($count, "Poi"); $count++;
		$skill->addListItem($count, "Saxon"); $count++;
		$skill->addListItem($count, "Xerces"); $count++;
		$skill->addListItem($count, "Xalan"); $count++;
		$skill->addListItem($count, "Jakarta Commons"); $count++;
		$count = 0;
		
		$skill = $skills->addCategory($cat, "Operating Systems", ""); $cat++;
		$skill->addListItem($count, "UNIX/Linux/Solaris");		 $count++;
		$skill->addListItem($count, "OSX"); $count++;
		$skill->addListItem($count, "XP/Vista"); $count++;
		$this->skills = $skills;
		//print("resumeObj test:  " . $this->res->nname);
	}
}
?>
