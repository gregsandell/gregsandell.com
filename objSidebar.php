<?php
	$_cpath = $_SERVER['DOCUMENT_ROOT'];

class SidebarObj {
	var $linksArray = array();
	var $blogsArray = array();
	function addLink($key, $text, $url) {
		$this->linksArray[$key] = new LinkObj($key, $text, $url);
	}
	function addBlog($key, $text, $url, $date) {
		$this->blogsArray[$key] = new BlogObj($key, $text, $url, $date);
	}

}

class LinkObj {
	var $key;
	var $text;
	var $url;
	
	function LinkObj($key, $text, $url) {
		$this->key = $key;
		$this->text = $text;
		$this->url = $url;
	}
}
class BlogObj {
	var $key;
	var $text;
	var $url;
	var $date;
	function BlogObj($key, $text, $url, $date) {
		$this->key = $key;
		$this->text = $text;
		$this->url = $url;
		$this->date = $date;
	}
}
class SidebarObj2 {
	var $linksArray;
	var $blogsArray;
	var $pageKey;
	function SidebarObj2($pageKey) {
		$this->pageKey = $pageKey;
		$this->linksArray = array();
		$this->blogsArray = array();
	}
	function addLink($key, $text, $type, $url, $remote) {
		$this->linksArray[$key] = new LinkObj2($key, $text, $type, $url, $remote);
	}
	function addBlog($key, $text, $url, $date) {
		$this->blogsArray[$key] = new BlogObj2($key, $text, $url, $date);
	}
	function addLinkObj($linkObj) {
		$this->linksArray[$linkObj->key] = $linkObj;
	}
	function addBlogObj($blogObj) {
		$this->blogsArray[$blogObj->key] = $blogObj;
	}
}

class LinkObj2 {
	var $key;
	var $text;
	var $url;
	var $remote;
	
	function LinkObj2($key, $text, $type, $url, $remote) {
		$this->key = $key;
		$this->text = $text;
		$this->type = $type;
		$this->url = $url;
		$this->remote = $remote;
	}
}
class BlogObj2 {
	var $key;
	var $text;
	var $url;
	var $date;
	function BlogObj2($key, $text, $type, $url, $date) {
		$this->key = $key;
		$this->text = $text;
		$this->type = $type;
		$this->url = $url;
		$this->date = $date;
	}
}
class SidebarPageManager {
	var $pageManagers;
	var $portfolioObj;
	function SidebarPageManager($portfolioObj) {
		$this->pageManagers = array();
		$this->portfolioObj = $portfolioObj;
	}
	function addPage($pageKey) {
		$this->pageManagers[$pageKey] = new SidebarObj2($pageKey);
		return($this->getSidebar($pageKey));
	}
	function getSidebar($pageKey) {
		return($this->pageManagers[$pageKey]);
	}
	function load() {
	    // Blog objects
		$g_blogspotLinkObj = new LinkObj2("elevatorMusic", "Elevator Music (blog)", 'urlpopup', "http://gregsandell.blogspot.com", true);
		$g_mavenBlogObj = new BlogObj2("maven", "Maven 2 Tutorial", 'urlpopup',
				"http://gregsandell.blogspot.com/2007/07/maven2-introduction-part-1-coordinate.html",
				"2007.07.13");
		$g_scorpBlogObj = new BlogObj2("scorp", "S-Corps for Software Contracters", 'urlpopup',
				"http://gregsandell.blogspot.com/2006/10/s-corps-for-software-contracters.html",
				"2006.10.22");
        $g_charsetLinkObj = new BlogObj2("characters", "Solving Character Set Problems", 'urlpopup',
				"http://gregsandell.blogspot.com/2009/01/solving-character-set-problems-ascii.html",
				"2009.05.15");

		// Internal URLs
		$g_publicationsLinkObj = new LinkObj2("publications", "Publications", 'url', "/portfolio/pages/pagePublications.php", false);
		$g_samplesPageObj = new LinkObj2("samples", "Main Samples Page", 'url', "/portfolio/templatePortfolio.php", false);
		$g_billwhitneyLinkObj = new LinkObj2("billwhitney", "Archived Live Site (MSIE Only)", 'url', "/portfolio/samples/bwhitney", true);
		$g_resumeLinkObj = new LinkObj2("resume", "Resume", 'url', "/resume/pageResume.php", false);

		// PDFs
		$g_sharcICMCLinkObj = new LinkObj2('sharcPub', 'SHARC Timbre Database', 'pdf', '/portfolio/publications/1991-10-01_library_ICMC.pdf', false);
		$g_pcaLinkObj = new LinkObj2('pca', 'Timbre Analysis with PCA', 'pdf', '/portfolio/publications/1995-12-01_perceptual_JAES.pdf', false);
		$g_displayLinkObj = new LinkObj2('display', 'Auditory Displays', 'pdf', '/portfolio/publications/1996-06-01_auditory_MP.pdf', false);
		$g_macroLinkObj = new LinkObj2('macro', 'Macro Timbre', 'pdf', '/portfolio/publications/1997-06-07_perceptual_ESCOM.pdf', false);
		$g_pdfObj = new LinkObj2("pdfFormat", "PDF Format", 'pdf', "/resume/gregsandell-resume.pdf", true);

		// External Websites
		$g_linkedInObj = new LinkObj2("linkedIn", "Linked In Profile", 'urlpopup', "http://www.linkedin.com/in/gregsandell", true);
		$g_maxtradObj = new LinkObj2("maxtrad", "Official MaxTrad Website", 'urlpopup', "http://www.maxtrad.com", true);
		$g_iesLinkObj = new LinkObj2("iesLive", "Visit Live IES Site", 'urlpopup', "http://www.iesabroad.org", true);
		$g_maytagLinkObj = new LinkObj2("maytagLive", "Visit Live Maytag Site", 'urlpopup', "http://www.maytag.com", true);
		$g_usafLinkObj = new LinkObj2("usafLive", "Live Air Force Portal", 'urlpopup', "http://www.my.af.mil", true);
		$g_wattsLinkObj = new LinkObj2("wattsLive", "Visit Live Edwin Watts Site", 'urlpopup', "http://www.edwinwatts.org", true);
		$g_xbLinkObj = new LinkObj2("xbLive", "Visit Expand Beyond Site", 'urlpopup', "http://www.xb.com", true);
		$g_trLinkObj = new LinkObj2("trCompanySite", "Visit Truven Company Site", 'urlpopup', "http://www.truvenhealth.com", true);
		$g_sharcLinkObj = new LinkObj2("sharc", "SHARC Timbre Project", 'urlpopup', "http://www.timbre.ws/sharc/", true);

		// MS-Word docs
		$g_mswordObj = new LinkObj2("mswordResume", "MS Word Format", 'doc', "/resume/gregsandell-resume.doc", true);

		//
		// pageHome.php
		//
		$page = $this->addPage("pageHome");
		$page->addLinkObj($g_blogspotLinkObj);
		$page->addLinkObj($g_resumeLinkObj);
		$page->addLinkObj($g_sharcLinkObj);
		$page->addLinkObj($g_publicationsLinkObj);
		// $page->addBlogObj("maven", $g_mavenBlogObj);  
		$page->addBlogObj($g_scorpBlogObj);
		//
		// pagePublications.php
		//
		$page = $this->addPage("pagePublications");
		$page->addLinkObj($g_sharcICMCLinkObj);
		$page->addLinkObj($g_pcaLinkObj);
		$page->addLinkObj($g_sharcLinkObj);
		$page->addLinkObj($g_displayLinkObj);
		$page->addLinkObj($g_macroLinkObj);
		//
		// pageBlogs.php
		//
		$page = $this->addPage("pageBlogs");
		$page->addLinkObj($g_blogspotLinkObj);
		$page->addBlogObj($g_mavenBlogObj); 
		$page->addBlogObj($g_scorpBlogObj);
		//
		// pageResume.php
		//
		$page = $this->addPage("pageResume");
		$page->addLinkObj($g_mswordObj);
		$page->addLinkObj($g_pdfObj);
		$page->addLinkObj($g_linkedInObj);
		// $page->addBlogObj("maven", $g_mavenBlogObj); 
		$page->addBlogObj($g_scorpBlogObj);
		//
		// pageSamples.php
		//
		$page = $this->addPage("pageSamples");
		foreach ($this->portfolioObj->clients as $client) {
			$page->addLink($client->key, $client->client, 'url', $client->url, false);
		}
		// 
		// pageClient_abnAmro.php
		//
		$page = $this->addPage("pageClient_abnAmro");
		$page->addLinkObj($g_maxtradObj);
		$page->addLinkObj($g_samplesPageObj);
		$page->addLinkObj($g_charsetLinkObj);
		$page->addLinkObj($g_publicationsLinkObj);
		$page->addBlogObj($g_mavenBlogObj); 
		$page->addBlogObj($g_scorpBlogObj);
		// 
		// pageClient_amex.php
		//
		$page = $this->addPage("pageClient_amex");
		$page->addLinkObj($g_samplesPageObj);
		$page->addLinkObj($g_charsetLinkObj);
		$page->addLinkObj($g_publicationsLinkObj);
		// $page->addBlogObj("maven", $g_mavenBlogObj); 
		$page->addBlogObj($g_scorpBlogObj);
		// 
		// pageClient_billwhitney.php
		//
		$page = $this->addPage("pageClient_billwhitney");
		$page->addLinkObj($g_billwhitneyLinkObj);
		$page->addLinkObj($g_samplesPageObj);
		$page->addLinkObj($g_charsetLinkObj);
		$page->addLinkObj($g_publicationsLinkObj);
		// $page->addBlogObj("maven", $g_mavenBlogObj); 
		$page->addBlogObj($g_scorpBlogObj);
		// 
		// pageClient_ies.php
		//
		$page = $this->addPage("pageClient_ies");
		$page->addLinkObj($g_iesLinkObj);
		$page->addLinkObj($g_samplesPageObj);
		$page->addLinkObj($g_charsetLinkObj);
		$page->addLinkObj($g_publicationsLinkObj);
		// $page->addBlogObj("maven", $g_mavenBlogObj); 
		$page->addBlogObj($g_scorpBlogObj);
		// 
		// pageClient_maytag.php
		//
		$page = $this->addPage("pageClient_maytag");
		$page->addLinkObj($g_maytagLinkObj);
		$page->addLinkObj($g_samplesPageObj);
		$page->addLinkObj($g_charsetLinkObj);
		$page->addLinkObj($g_publicationsLinkObj);
		// $page->addBlogObj("maven", $g_mavenBlogObj); 
		$page->addBlogObj($g_scorpBlogObj);
		// 
		// pageClient_ubs.php
		//
		$page = $this->addPage("pageClient_ubs");
		$page->addLinkObj($g_samplesPageObj);
		$page->addLinkObj($g_charsetLinkObj);
		$page->addLinkObj($g_publicationsLinkObj);
		// $page->addBlogObj("maven", $g_mavenBlogObj); 
		$page->addBlogObj($g_scorpBlogObj);
		// 
		// pageClient_usaf.php
		//
		$page = $this->addPage("pageClient_usaf");
		$page->addLinkObj($g_usafLinkObj);
		$page->addLinkObj($g_samplesPageObj);
		$page->addLinkObj($g_charsetLinkObj);
		$page->addLinkObj($g_publicationsLinkObj);
		// $page->addBlogObj("maven", $g_mavenBlogObj); 
		$page->addBlogObj($g_scorpBlogObj);
		// 
		// pageClient_watts.php
		//
		$page = $this->addPage("pageClient_watts");
		$page->addLinkObj($g_wattsLinkObj);
		$page->addLinkObj($g_samplesPageObj);
		$page->addLinkObj($g_charsetLinkObj);
		$page->addLinkObj($g_publicationsLinkObj);
		// $page->addBlogObj("maven", $g_mavenBlogObj); 
		$page->addBlogObj($g_scorpBlogObj);
		// 
		// pageClient_xb.php
		//
		$page = $this->addPage("pageClient_xb");
		$page->addLinkObj($g_samplesPageObj);
		$page->addLinkObj($g_charsetLinkObj);
		$page->addLinkObj($g_publicationsLinkObj);
		// $page->addBlogObj("maven", $g_mavenBlogObj); 
		$page->addBlogObj($g_scorpBlogObj);
		// 
		// pageClient_tr.php
		//
		$page = $this->addPage("pageClient_tr");
		$page->addLinkObj($g_trLinkObj);
		$page->addLinkObj($g_samplesPageObj);
		$page->addLinkObj($g_charsetLinkObj);
		$page->addLinkObj($g_publicationsLinkObj);
		// $page->addBlogObj("maven", $g_mavenBlogObj); 
		$page->addBlogObj($g_scorpBlogObj);
		// 
		// pageClient_path.php
		//
		$page = $this->addPage("pageClient_path");
		$page->addLinkObj($g_samplesPageObj);
		$page->addLinkObj($g_charsetLinkObj);
		$page->addLinkObj($g_publicationsLinkObj);
		// $page->addBlogObj("maven", $g_mavenBlogObj); 
		$page->addBlogObj($g_scorpBlogObj);
		// 
		// pageClient_sears.php
		//
		$page = $this->addPage("pageClient_sears");
		$page->addLinkObj($g_samplesPageObj);
		$page->addLinkObj($g_charsetLinkObj);
		$page->addLinkObj($g_publicationsLinkObj);
		// $page->addBlogObj("maven", $g_mavenBlogObj); 
		$page->addBlogObj($g_scorpBlogObj);
	}
} 
?>
