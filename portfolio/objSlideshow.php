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
		$slideshow->add("advancedRestClient.png");
		$slideshow->add("ajax.png");
		$slideshow->add("ampps.png");
		$slideshow->add("angularJS.jpg");
		$slideshow->add("apache2.jpg");
		$slideshow->add("apacheAnt2.jpg");
		$slideshow->add("artifactory.png");
		// $slideshow->add("autonomy.jpg");
		$slideshow->add("babel.png");
		$slideshow->add("bash.png");
		$slideshow->add("bamboo.jpg");
		$slideshow->add("bitbucket.png");
		$slideshow->add("bootstrap.png");
		$slideshow->add("chai.png");
		// $slideshow->add("coffeescript.jpg");
		$slideshow->add("cognos.jpg");
		$slideshow->add("confluence.jpg");
		$slideshow->add("chromeDevTools.jpg");
		$slideshow->add("crucible.jpg");
		$slideshow->add("css3.jpg");
		$slideshow->add("curl.png");
		$slideshow->add("docker.png");
		$slideshow->add("eclipse.png");
		// $slideshow->add("filezilla.jpg");
		$slideshow->add("es6.png");
		$slideshow->add("eslint.png");
		$slideshow->add("express.png");
		$slideshow->add("extjs.png");
		$slideshow->add("fisheye.png");
		$slideshow->add("flexbox.png");
		$slideshow->add("gimp2.png");
		$slideshow->add("git.png");
		$slideshow->add("github.jpg");
		$slideshow->add("glassfish.png");
		$slideshow->add("googlehangouts.png");
		$slideshow->add("gotomeeting.png");
		// $slideshow->add("grunt.jpg");
		$slideshow->add("highcharts.png");
		$slideshow->add("homebrew.png");
		$slideshow->add("html5.jpg");
		$slideshow->add("html5box.png");
		$slideshow->add("itext.png");
		$slideshow->add("intellijidea.png");
		// $slideshow->add("jakartaCommons.jpg");
		$slideshow->add("jasmine.jpg");
		$slideshow->add("java2.jpg");
		$slideshow->add("javascript.jpg");
//		$slideshow->add("jdom.png");
		$slideshow->add("jenkins.png");
		$slideshow->add("jfreechart.png");
		$slideshow->add("jira.png");
		$slideshow->add("jmeter.png");
		$slideshow->add("joinme.png");
		$slideshow->add("jquery.png");
		$slideshow->add("jqueryMobile.jpg");
		$slideshow->add("jsfiddle.png");
		$slideshow->add("jshint.jpg");
		$slideshow->add("json.jpg");
		$slideshow->add("jsp3.jpg");
		$slideshow->add("launchdarkly.png");
		$slideshow->add("linux.jpg");
		$slideshow->add("lodash.png");
		$slideshow->add("lync.png");
		$slideshow->add("mamp.jpg");
		$slideshow->add("markdown.png");
		$slideshow->add("maven2.jpg");
		$slideshow->add("mercurial.png");
		$slideshow->add("mocha.png");
		$slideshow->add("moment.png");
		$slideshow->add("mysql2.jpg");
		$slideshow->add("netbeans.png");
		$slideshow->add("nexus.png");
		$slideshow->add("nexus.png");
		$slideshow->add("nightwatch.png");
		$slideshow->add("npm.png");
		$slideshow->add("oracle2.png");
		// $slideshow->add("parse.jpg");
		$slideshow->add("perl.png");
		$slideshow->add("php.png");
		$slideshow->add("phpldapadmin.png");
		$slideshow->add("pivotalTracker.jpg");
		$slideshow->add("poi.jpg");
		$slideshow->add("postman.png");
		// $slideshow->add("rails.jpeg");
		$slideshow->add("rally.png");
		$slideshow->add("react.png");
		$slideshow->add("redux.png");
		$slideshow->add("rest.png");
		$slideshow->add("ruby.png");
		$slideshow->add("sass.png");
		$slideshow->add("selenium.png");
		$slideshow->add("skype.png");
		$slideshow->add("slack.png");
		$slideshow->add("sqlserver.png");
		$slideshow->add("sourcetree.png");
		$slideshow->add("subversion.png");
		// $slideshow->add("testflight.jpg");
		$slideshow->add("toad.jpg");
		$slideshow->add("tomcat2.jpg");
		$slideshow->add("travis.png");
		// $slideshow->add("triggerIO.jpg");
		$slideshow->add("vagrant.png");
		$slideshow->add("vim.png");
		$slideshow->add("virtualbox.png");
		$slideshow->add("webex.png");
		$slideshow->add("webpack.jpg");
		$slideshow->add("websphere.png");
		$slideshow->add("webstorm.png");
		$slideshow->add("xmlTypewriter.jpg");
		$slideshow->add("xslt.jpg");
		$slideshow->add("yarn.png");
		$slideshow->add("zoom.png");

		$slideshow = $this->add("projects", new SlideshowObj("projects", 150, 120, "projThumbs", "Other Clients", 2000));
		$slideshow->add("tenxThumb.png", "/portfolio/pages/pageClient_tenx.php");
		$slideshow->add("abnThumb.gif", "/portfolio/pages/pageClient_abnAmro.php");
		$slideshow->add("billwhitneyThumb.jpg", "/portfolio/pages/pageClient_billwhitney.php");
		$slideshow->add("iesThumb.jpg", "/portfolio/pages/pageClient_ies.php");
		$slideshow->add("maytagThumb.jpg", "/portfolio/pages/pageClient_maytag.php");
		$slideshow->add("spectrumThumb.gif", "/portfolio/pages/pageClient_spectrum.php");
		$slideshow->add("ubsThumb.gif", "/portfolio/pages/pageClient_ubs.php");
		$slideshow->add("usafThumb.jpg", "/portfolio/pages/pageClient_usaf.php");
		$slideshow->add("wattsThumb.jpg", "/portfolio/pages/pageClient_watts.php");
		$slideshow->add("xbThumb.jpg", "/portfolio/pages/pageClient_xb.php");
		$slideshow->add("trThumb.png", "/portfolio/pages/pageClient_tr.php");
		$slideshow->add("pathThumb.png", "/portfolio/pages/pageClient_path.php");
		$slideshow->add("searsThumb.png", "/portfolio/pages/pageClient_sears.php");
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
	function add($file, $url = "#") {
		$this->imgsArray[$this->count] = new ImageObj($file, $url);
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
	var $url;
	function ImageObj($file, $url) {
		$this->file = $file;
		$this->url = $url;
	}
}

$g_slideshowManager = new SlideshowManager();
?>

