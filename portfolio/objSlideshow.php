<?php
class SlideshowManager {
	var $slideshowsArray;
	function SlideshowManager() {
		$this->slideshowsArray = array();
	}
	function add($key, $slideshowObj) {
		$this->slideshowsArray[$key] = $slideshowObj;
		return($this->get($key));
	}
	function get($key) {
		return($this->slideshowsArray[$key]);
	}
	function lazyLoad() {
		if (sizeof($this->slideshowsArray) == 0) {
			$this->load();
		}
	}

	function load() {
		$slideshow = $this->add("logos", new SlideshowObj("logos", 190, 150, "logos", "Supported Technologies",2000));
		$techUrl =  "/technologies/list.php";
		$slideshow->add("advancedRestClient.png", array("category" => "Networking", "url" => $techUrl));
		$slideshow->add("ajax.png", array("category" => "Networking", "url" => $techUrl));
		$slideshow->add("ampps.png", array("category" => "Server", "url" => $techUrl));
		$slideshow->add("angularJS.jpg", array("category" => "Front End Framework", "url" => $techUrl));
		$slideshow->add("apache2.jpg", array("category" => "Server", "url" => $techUrl));
		$slideshow->add("apacheAnt2.jpg", array("category" => "Build", "url" => $techUrl));
		$slideshow->add("artifactory.png", array("category" => "Build", "url" => $techUrl));
		$slideshow->add("babel.png", array("category" => "Javascript", "url" => $techUrl));
		$slideshow->add("bash.png", array("category" => "Language", "url" => $techUrl));
		$slideshow->add("bamboo.jpg", array("category" => "Deployment", "url" => $techUrl));
		$slideshow->add("bitbucket.png", array("category" => "Code Versioning", "url" => $techUrl));
		$slideshow->add("bootstrap.png", array("category" => "Presentation", "url" => $techUrl));
		$slideshow->add("chai.png", array("category" => "Code Quality", "url" => $techUrl));
		$slideshow->add("cognos.png", array("category" => "Library", "url" => $techUrl));
		$slideshow->add("confluence.jpg", array("category" => "Collaboration", "url" => $techUrl));
		$slideshow->add("chromeDevTools.png", array("category" => "Code Quality", "url" => $techUrl));
		$slideshow->add("codepen.png", array("category" => "Code Authoring", "url" => $techUrl));
		$slideshow->add("crucible.jpg", array("category" => "Code Quality", "url" => $techUrl));
		$slideshow->add("css3.jpg", array("category" => "Presentation", "url" => $techUrl));
		$slideshow->add("curl.png", array("category" => "Networking", "url" => $techUrl));
		$slideshow->add("docker.png", array("category" => "Deployment", "url" => $techUrl));
		$slideshow->add("eclipse.png", array("category" => "Code Authoring", "url" => $techUrl));
		$slideshow->add("es6.png", array("category" => "Javascript", "url" => $techUrl));
		$slideshow->add("eslint.png", array("category" => "Code Quality", "url" => $techUrl));
		$slideshow->add("express.png", array("category" => "Server", "url" => $techUrl));
		$slideshow->add("extjs.png", array("category" => "Front End Framework", "url" => $techUrl));
		$slideshow->add("fisheye.png", array("category" => "Code Quality", "url" => $techUrl));
		$slideshow->add("flexbox.png", array("category" => "Presentation", "url" => $techUrl));
		$slideshow->add("gimp2.png", array("category" => "Presentation", "url" => $techUrl));
		$slideshow->add("git.png", array("category" => "Code Quality", "url" => $techUrl));
		$slideshow->add("github.jpg", array("category" => "Code Quality", "url" => $techUrl));
		$slideshow->add("glassfish.png", array("category" => "Server", "url" => $techUrl));
		$slideshow->add("googlehangouts.png", array("category" => "Collaboration", "url" => $techUrl));
		$slideshow->add("gotomeeting.png", array("category" => "Collaboration", "url" => $techUrl));
		$slideshow->add("highcharts.png", array("category" => "Presentation", "url" => $techUrl));
		$slideshow->add("homebrew.png", array("category" => "Build", "url" => $techUrl));
		$slideshow->add("html5.jpg", array("category" => "Presentation", "url" => $techUrl));
		$slideshow->add("html5box.png", array("category" => "Presentation", "url" => $techUrl));
		$slideshow->add("itext.png", array("category" => "Presentation", "url" => $techUrl));
		$slideshow->add("intellijidea.png", array("category" => "Code Authoring", "url" => $techUrl));
		$slideshow->add("jasmine.jpg", array("category" => "Code Quality", "url" => $techUrl));
		$slideshow->add("java2.jpg", array("category" => "Language", "url" => $techUrl));
		$slideshow->add("javascript.jpg", array("category" => "Language", "url" => $techUrl));
		$slideshow->add("jenkins.png", array("category" => "Deployment", "url" => $techUrl));
		$slideshow->add("jfreechart.png", array("category" => "Presentation", "url" => $techUrl));
		$slideshow->add("jira.png", array("category" => "Collaboration", "url" => $techUrl));
		$slideshow->add("jmeter.png", array("category" => "Code Quality", "url" => $techUrl));
		$slideshow->add("joinme.png", array("category" => "Collaboration", "url" => $techUrl));
		$slideshow->add("jquery.png", array("category" => "Front End Framework", "url" => $techUrl));
		$slideshow->add("jqueryMobile.jpg", array("category" => "Front End Framework", "url" => $techUrl));
		$slideshow->add("jsfiddle.png", array("category" => "Code Authoring", "url" => $techUrl));
		$slideshow->add("jshint.jpg", array("category" => "Code Quality", "url" => $techUrl));
		$slideshow->add("json.jpg", array("category" => "Markup", "url" => $techUrl));
		$slideshow->add("jsp3.jpg", array("category" => "Templating", "url" => $techUrl));
		$slideshow->add("launchdarkly.png", array("category" => "Deployment", "url" => $techUrl));
		$slideshow->add("linux.jpg", array("category" => "Operating System", "url" => $techUrl));
		$slideshow->add("lodash.png", array("category" => "Javascript", "url" => $techUrl));
		$slideshow->add("lync.png", array("category" => "Collaboration", "url" => $techUrl));
		$slideshow->add("mamp.jpg", array("category" => "Server", "url" => $techUrl));
		$slideshow->add("macos.png", array("category" => "Operating System", "url" => $techUrl));
		$slideshow->add("markdown.png", array("category" => "Markup", "url" => $techUrl));
		$slideshow->add("maven2.jpg", array("category" => "Build", "url" => $techUrl));
		$slideshow->add("mercurial.png", array("category" => "Code Versioning", "url" => $techUrl));
		$slideshow->add("mocha.png", array("category" => "Code Quality", "url" => $techUrl));
		$slideshow->add("moment.png", array("category" => "Javascript", "url" => $techUrl));
		$slideshow->add("mysql2.jpg", array("category" => "Database", "url" => $techUrl));
		$slideshow->add("netbeans.png", array("category" => "Code Authoring", "url" => $techUrl));
		$slideshow->add("nexus.png", array("category" => "Build", "url" => $techUrl));
		$slideshow->add("nightwatch.png", array("category" => "Code Quality", "url" => $techUrl));
		$slideshow->add("npm.png", array("category" => "Build", "url" => $techUrl));
		$slideshow->add("oracle2.png", array("category" => "Database", "url" => $techUrl));
		$slideshow->add("perl.png", array("category" => "Language", "url" => $techUrl));
		$slideshow->add("php.png", array("category" => "Templating", "url" => $techUrl));
		$slideshow->add("phpldapadmin.png", array("category" => "Networking", "url" => $techUrl));
		$slideshow->add("pivotalTracker.jpg", array("category" => "Collaboration", "url" => $techUrl));
		$slideshow->add("plnkr.png", array("category" => "Code Authoring", "url" => $techUrl));
		$slideshow->add("poi.png", array("category" => "Presentation", "url" => $techUrl));
		$slideshow->add("postman.png", array("category" => "Networking", "url" => $techUrl));
		$slideshow->add("rally.png", array("category" => "Collaboration", "url" => $techUrl));
		$slideshow->add("react.png", array("category" => "Front End Framework", "url" => $techUrl));
		$slideshow->add("redux.png", array("category" => "Front End Framework", "url" => $techUrl));
		$slideshow->add("rest.png", array("category" => "Networking", "url" => $techUrl));
		$slideshow->add("ruby.png", array("category" => "Language", "url" => $techUrl));
		$slideshow->add("sass.png", array("category" => "Presentation", "url" => $techUrl));
		$slideshow->add("selenium.png", array("category" => "Code Quality", "url" => $techUrl));
		$slideshow->add("skype.png", array("category" => "Collaboration", "url" => $techUrl));
		$slideshow->add("slack.png", array("category" => "Collaboration", "url" => $techUrl));
		$slideshow->add("sqlserver.png", array("category" => "Database", "url" => $techUrl));
		$slideshow->add("sourcetree.png", array("category" => "Code Versioning", "url" => $techUrl));
		$slideshow->add("subversion.png", array("category" => "Code Versioning", "url" => $techUrl));
		$slideshow->add("toad.jpg", array("category" => "Database", "url" => $techUrl));
		$slideshow->add("tomcat2.jpg", array("category" => "Server", "url" => $techUrl));
		$slideshow->add("travis.png", array("category" => "Build", "url" => $techUrl));
		$slideshow->add("vagrant.png", array("category" => "Operating System", "url" => $techUrl));
		$slideshow->add("vim.png", array("category" => "Code Authoring", "url" => $techUrl));
		$slideshow->add("virtualbox.png", array("category" => "Operating System", "url" => $techUrl));
		$slideshow->add("webex.png", array("category" => "Collaboration", "url" => $techUrl));
		$slideshow->add("webpack.jpg", array("category" => "Build", "url" => $techUrl));
		$slideshow->add("websphere.png", array("category" => "Server", "url" => $techUrl));
		$slideshow->add("webstorm.png", array("category" => "Code Authoring", "url" => $techUrl));
		$slideshow->add("xmlTypewriter.jpg", array("category" => "Markup", "url" => $techUrl));
		$slideshow->add("xslt.jpg", array("category" => "Tem[lating", "url" => $techUrl));
		$slideshow->add("yarn.png", array("category" => "Build", "url" => $techUrl));
		$slideshow->add("zoom.png", array("category" => "Collaboration", "url" => $techUrl));

		$slideshow = $this->add("projects", new SlideshowObj("projects", 150, 120, "projThumbs", "Other Clients", 2000));
		$slideshow->add("tenxThumb.png", array("url" => "/portfolio/pages/pageClient_tenx.php"));
		$slideshow->add("searsThumb.png", array("url" => "/portfolio/pages/pageClient_sears.php"));
		$slideshow->add("pathThumb.png", array("url" => "/portfolio/pages/pageClient_path.php"));
		$slideshow->add("trThumb.png", array("url" => "/portfolio/pages/pageClient_tr.php"));
		$slideshow->add("ubsThumb.gif", array("url" => "/portfolio/pages/pageClient_ubs.php"));
		$slideshow->add("usafThumb.jpg", array("url" => "/portfolio/pages/pageClient_usaf.php"));
		$slideshow->add("abnThumb.gif", array("url" => "/portfolio/pages/pageClient_abnAmro.php"));
		$slideshow->add("iesThumb.jpg", array("url" => "/portfolio/pages/pageClient_ies.php"));
		$slideshow->add("xbThumb.jpg", array("url" => "/portfolio/pages/pageClient_xb.php"));
		$slideshow->add("maytagThumb.jpg", array("url" => "/portfolio/pages/pageClient_maytag.php"));
		$slideshow->add("billwhitneyThumb.jpg", array("url" => "/portfolio/pages/pageClient_billwhitney.php"));
		$slideshow->add("wattsThumb.jpg", array("url" => "/portfolio/pages/pageClient_watts.php"));
		$slideshow->add("spectrumThumb.gif", array("url" => "/portfolio/pages/pageClient_spectrum.php"));
	}
}

class SlideshowObj {
	var $imgsArray;
	var $count;
	var $key;
	var $width;
	var $height;
	var $imgsSubdir;
	var $title;
	var $dur;

	function SlideshowObj($key, $width, $height, $imgsSubdir, $title, $dur) {
		$this->imgsArray = array();
		$this->count = 0;
		$this->key = $key;
		$this->width = $width;
		$this->title = $title;
		$this->height = $height;
		$this->imgsSubdir = $imgsSubdir;
		$this->dur = $dur;
	}
	function add($file, $data = array("url" => "#", "category" => "")) {
		$this->imgsArray[$this->count] = new ImageObj($file, $data);
		$this->count += 1;
	}
	function isLoaded() {
		return(sizeof($this->imgsArray) > 0);
	}
	function lazyLoad() {
		if (!$this->isLoaded()) {
			$this->load();
		}
	}
}

class ImageObj {
	var $file;
	var $data;
	function ImageObj($file, $data) {
		$this->file = $file;
		$this->data = $data;
	}
}

$g_slideshowManager = new SlideshowManager();
?>

