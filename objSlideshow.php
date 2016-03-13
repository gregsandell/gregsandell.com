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
		$slideshow = $this->add("logos", new SlideshowObj("logos", 150, 90, "logos", "Supported Technologies",2000));
		$slideshow->add("apache2.jpg");
		$slideshow->add("apacheAnt2.jpg");
		$slideshow->add("autonomy.jpg");
		$slideshow->add("coffeescript.jpg");
		$slideshow->add("cognos.jpg");
		$slideshow->add("confluence.jpg");
		$slideshow->add("eclipse2.jpg");
		$slideshow->add("gimp2.jpg");
		$slideshow->add("glassfish.jpg");
		$slideshow->add("iText.gif");
		$slideshow->add("intellijIdea.jpg");
		$slideshow->add("jakartaCommons.jpg");
		$slideshow->add("java2.jpg");
		$slideshow->add("javascript.jpg");
		$slideshow->add("jdom.jpg");
		$slideshow->add("jenkins.jpg");
		$slideshow->add("jfreechart.png");
		$slideshow->add("jira.png");
		$slideshow->add("jquery2.jpg");
		$slideshow->add("jqueryMobile.jpg");
		$slideshow->add("jshint.jpg");
		$slideshow->add("json.jpg");
		$slideshow->add("jsp3.jpg");
		$slideshow->add("maven2.jpg");
		$slideshow->add("mercurial.jpg");
		$slideshow->add("netbeans.jpg");
		$slideshow->add("oracle2.jpg");
		$slideshow->add("parse.jpg");
		$slideshow->add("php.jpg");
		$slideshow->add("pivotalTracker.jpg");
		$slideshow->add("poi.jpg");
		$slideshow->add("mysql2.jpg");
		$slideshow->add("rails.jpeg");
		$slideshow->add("sass.jpg");
		$slideshow->add("subversion.jpg");
		$slideshow->add("tomcat2.jpg");
		$slideshow->add("triggerIO.jpg");
		$slideshow->add("vim.jpg");
		$slideshow->add("websphere.gif");
		$slideshow->add("xmlTypewriter.jpg");
		$slideshow->add("filezilla.jpg");
		$slideshow->add("ruby.png");
		$slideshow->add("chromeDevTools.jpg");
		$slideshow->add("angularJS.jpg");
		$slideshow->add("highcharts.jpg");
		$slideshow->add("mamp.jpg");
		$slideshow->add("git.jpg");
		$slideshow->add("github.jpg");
		$slideshow->add("homebrew.jpg");
		$slideshow->add("twitterBootstrap.png");
		$slideshow->add("jasmine.jpg");
		$slideshow->add("grunt.jpg");
		$slideshow->add("nodeJS.jpg");
		$slideshow->add("sqlServer2.jpg");
		$slideshow->add("css3.jpg");
		$slideshow->add("html5.jpg");
		$slideshow->add("xslt.jpg");
		$slideshow->add("testflight.jpg");
		
		$slideshow = $this->add("books", new SlideshowObj("books", 180, 240, "books", "Books I'm Reading",3000));
		$slideshow->add("designingInterfaces.jpg");
		$slideshow->add("hibernateInAction.jpg");
		$slideshow->add("ajaxHacks.gif");
		$slideshow->add("hardcoreJava.gif");
		$slideshow->add("java-io.gif");
		$slideshow->add("beatlesGear.jpg");
		$slideshow->add("domScripting.jpg");
		$slideshow->add("encyclopediaChicago.jpg");
		$slideshow->add("geoffEmerick.jpg");
		$slideshow->add("itextInAction.jpg");
		$slideshow->add("powerFaithFantasy.jpg");
		$slideshow->add("springInAction.jpg");
		$slideshow->add("suDokuExtraHot.jpg");
		$slideshow->add("thisIsYourBrainOnMusic.jpg");
                $slideshow->add("prototypeScriptaculous.jpg");
	        $slideshow->add("donaldHall.jpg");
                $slideshow->add("childrenOfOdin.jpg");
                $slideshow->add("managingHumans.jpg");
	
		$slideshow = $this->add("projects", new SlideshowObj("projects", 150, 120, "projThumbs", "Other Clients", 2000));
		$slideshow->add("abnThumb.gif");
		$slideshow->add("billwhitneyThumb.jpg");
		$slideshow->add("iesThumb.jpg");
		$slideshow->add("maytagThumb.jpg");
		$slideshow->add("spectrumThumb.gif");
		$slideshow->add("ubsThumb.gif");
		$slideshow->add("usafThumb.jpg");
		$slideshow->add("wattsThumb.jpg");
		$slideshow->add("xbThumb.jpg");
		$slideshow->add("trThumb.png");
		$slideshow->add("pathThumb.png");
		$slideshow->add("searsThumb.png");
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
	function add($img) {
		$this->imgsArray[$this->count] = $img;
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
$g_slideshowManager = new SlideshowManager();
?>

