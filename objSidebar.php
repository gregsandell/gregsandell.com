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
	function addLink($key, $text, $type, $url) {
		$this->linksArray[$key] = new LinkObj2($key, $text, $type, $url);
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

	function LinkObj2($key, $text, $type, $url) {
		$this->key = $key;
		$this->text = $text;
		$this->type = $type;
		$this->url = $url;
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
	var $techList;
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
		$g_blogspotLinkObj = new LinkObj2("elevatorMusic", "Sealed Tuna Sandwich", 'external', "http://gregsandell.blogspot.com");
		$g_mavenBlogObj = new BlogObj2("maven", "Maven 2 Tutorial", 'external',
				"http://gregsandell.blogspot.com/2007/07/maven2-introduction-part-1-coordinate.html",
				"2007.07.13");
		$g_scorpBlogObj = new BlogObj2("scorp", "S-Corps for Software Contracters", 'external',
				"http://gregsandell.blogspot.com/2006/10/s-corps-for-software-contracters.html",
				"2006.10.22");
		$g_roxyBlogObj = new BlogObj2("roxy", "New Roxy & Elsewhere Vid", 'external',
				"http://gregsandell.blogspot.com/2017/06/new-roxy-elsewhere-video.html",
				"2017.06.29");
		$g_twinpeaksBlogObj = new BlogObj2("roxy", "Twin Peaks Season 3", 'external',
				"http://gregsandell.blogspot.com/2017/06/dont-die-twin-peaks-s03e06-spoiler.html",
				"2017.06.26");
		$g_charsetLinkObj = new BlogObj2("characters", "Solving Character Set Problems", 'external',
				"http://gregsandell.blogspot.com/2009/01/solving-character-set-problems-ascii.html",
				"2009.05.15");
		$g_washingmachineBlogObj = new BlogObj2("washingMachine", "The Washing Machine", 'external',
				"http://gregsandell.blogspot.com/2017/02/the-washing-machine.html",
				"2017.02.23");

		// Internal URLs
		$g_publicationsLinkObj = new LinkObj2("publications", "Publications", 'internal', "/portfolio/pages/pagePublications.php");
		$g_portfolioPageObj = new LinkObj2("samples", "Main Portfolio Page", 'internal', "/portfolio/templatePortfolio.php");
		$g_billwhitneyLinkObj = new LinkObj2("billwhitney", "Archived Live Site (MSIE Only)", 'internal', "/portfolio/samples/bwhitney");
		$g_resumeLinkObj = new LinkObj2("resume", "Resume", 'internal', "/resume/pageResume.php");
		$g_talksLinkObj = new LinkObj2("talks", "Talks", 'internal', "/talks/pageTalks.php");

		// PDFs
		$g_dissertationLinkObj = new LinkObj2('dissertation', 'PhD Dissertation', 'external', 'https://www.dropbox.com/s/cs6c1qslhjd5ww2/gregSandell1991DissertationEntire.pdf?dl=0');
		$g_mastersThesisLinkObj = new LinkObj2('mastersThesis', 'Masters Thesis', 'internal', 'portfolio/publications/mastersThesis/Sandell_MastersThesis.pdf');
		$g_pcaLinkObj = new LinkObj2('pca', 'Timbre with PCA', 'external', '/portfolio/publications/1995-12-01_perceptual_JAES.pdf');
		$g_displayLinkObj = new LinkObj2('display', 'Auditory Displays', 'external', '/portfolio/publications/1996-06-01_auditory_MP.pdf');
		$g_macroLinkObj = new LinkObj2('macro', 'Macro Timbre', 'external', '/portfolio/publications/1997-06-07_perceptual_ESCOM.pdf');
		$g_pdfObj = new LinkObj2("pdfFormat", "PDF Format", 'external', "/resume/gregsandell-resume.pdf");

		// External Websites
		$g_linkedInObj = new LinkObj2("linkedIn", "Linked In Profile", 'external', "https://www.linkedin.com/in/gregsandell");
		$g_maxtradObj = new LinkObj2("maxtrad", "Official MaxTrad Site", 'external', "http://www.maxtrad.com");
		$g_iesLinkObj = new LinkObj2("iesLive", "Visit Live IES Site", 'external', "http://www.iesabroad.org");
		$g_maytagLinkObj = new LinkObj2("maytagLive", "Visit Live Maytag Site", 'external', "http://www.maytag.com");
		$g_usafLinkObj = new LinkObj2("usafLive", "Visit Live AF Portal", 'external', "http://www.my.af.mil");
		$g_wattsLinkObj = new LinkObj2("wattsLive", "Visit Live Watts Site", 'external', "http://www.edwinwatts.org");
		$g_trLinkObj = new LinkObj2("trCompanySite", "Visit Live Truven Site", 'external', "http://www.truvenhealth.com");
		$g_searsLinkObj = new LinkObj2("searsCompanySite", "Visit Live sears.com", 'external', "http://www.sears.com");
		$g_tenxLinkObj = new LinkObj2("tenxCompanySite", "Visit Live auction.com", 'external', "http://www.auction.com");

		// MS-Word docs
		$g_mswordObj = new LinkObj2("mswordResume", "MS Word Format", 'external', "/resume/gregsandell-resume.doc");

		// technology pages (for SEO)
		$this->techList = array();
		$g_tech_javascript = new LinkObj2("techJavascript", "Javascript/ES6", 'internal', "/technologies/javascript.php");
		array_push($this->techList, $g_tech_javascript);
		$g_tech_react = new LinkObj2("techReact", "React", 'internal', "/technologies/react.php");
		array_push($this->techList, $g_tech_react);
		$g_tech_node = new LinkObj2("techNode", "Node.js", 'internal', "/technologies/node.php");
		array_push($this->techList, $g_tech_node);
		$g_tech_redux = new LinkObj2("redux", "Redux", 'internal', "/technologies/redux.php");
		array_push($this->techList, $g_tech_redux);
		$g_tech_webpack = new LinkObj2("webpack", "WebPack", 'internal', "/technologies/webpack.php");
		array_push($this->techList, $g_tech_webpack);
		$g_tech_list = new LinkObj2("list", "More...", 'internal', "/technologies/list.php");
		$g_tech_css = new LinkObj2("css", "CSS", 'internal', "/technologies/css.php");
		array_push($this->techList, $g_tech_css);
		$g_tech_html = new LinkObj2("html", "HTML", 'internal', "/technologies/html.php");
		array_push($this->techList, $g_tech_html);
		$g_tech_angular = new LinkObj2("angular", "Angular", 'internal', "/technologies/angular.php");
		array_push($this->techList, $g_tech_angular);
		$g_tech_javascript_hoisting = new LinkObj2("javascript-hoisting", "Javascript Hoisting", 'internal', "/technologies/javascriptHoisting.php");
		array_push($this->techList, $g_tech_javascript_hoisting);
		$g_tech_responsive_design = new LinkObj2("responsive-design", "Responsive Design", 'internal', "/technologies/responsiveDesign.php");
		array_push($this->techList, $g_tech_responsive_design);
		$g_tech_browser_compatability = new LinkObj2("browser-compatability", "Browser Compatability", 'internal', "/technologies/browserCompatability.php");
		array_push($this->techList, $g_tech_browser_compatability);
		$g_tech_sql = new LinkObj2("sql", "SQL", 'internal', "/technologies/sql.php");
		array_push($this->techList, $g_tech_sql);

		//
		// pageHome.php
		//
		$page = $this->addPage("pageHome");
		$page->addLinkObj($g_tech_javascript);
		$page->addLinkObj($g_tech_react);
		$page->addLinkObj($g_tech_angular);
		$page->addLinkObj($g_tech_node);
		$page->addLinkObj($g_tech_redux);
		$page->addLinkObj($g_tech_list);
		//
		// pagePublications.php
		//
		$page = $this->addPage("pagePublications");
		$page->addLinkObj($g_mastersDegreeLinkObj);
		$page->addLinkObj($g_pcaLinkObj);
		$page->addLinkObj($g_displayLinkObj);
		$page->addLinkObj($g_macroLinkObj);
		//
		// pagePublications.php
		//
		$page = $this->addPage("pagePublications2");
		$page->addLinkObj($g_dissertationLinkObj);
		$page->addLinkObj($g_pcaLinkObj);
		$page->addLinkObj($g_displayLinkObj);
		$page->addLinkObj($g_macroLinkObj);
		//
		// pageBlogs.php
		//
		$page = $this->addPage("pageBlogs");
		$page->addLinkObj($g_blogspotLinkObj);
		$page->addBlogObj($g_twinpeaksBlogObj);
		$page->addBlogObj($g_roxyBlogObj);
		//
		// pageResume.php
		//
		$page = $this->addPage("pageResume");
		$page->addLinkObj($g_mswordObj);
		$page->addLinkObj($g_pdfObj);
		$page->addLinkObj($g_linkedInObj);
		// $page->addBlogObj("maven", $g_mavenBlogObj); 
		$page->addBlogObj($g_scorpBlogObj);
		$page->addBlogObj($g_washingmachineBlogObj);

		//
		// pageCode.php
		//
		$page = $this->addPage("pageCode");
		$page->addLinkObj($g_talksLinkObj);

		//
		// pageMusic.php
		//
		$page = $this->addPage("pageMusic");
		$page->addLinkObj($g_publicationsLinkObj);
		$page->addBlogObj($g_roxyBlogObj);

		// potpourri
		$page = $this->addPage("potpourri");
		$page->addLinkObj($g_publicationsLinkObj);
		$page->addLinkObj($g_talksLinkObj);
		$page->addLinkObj($g_blogspotLinkObj);

		//
		// pageClient_tenx.php
		//
		$page = $this->addPage("pageClient_tenx");
		$page->addLinkObj($g_tenxLinkObj);
		$page->addLinkObj($g_portfolioPageObj);
		$page->addLinkObj($g_charsetLinkObj);
		$page->addLinkObj($g_publicationsLinkObj);
		$page->addBlogObj($g_scorpBlogObj);

		//
		// pageClient_sears.php
		//
		$page = $this->addPage("pageClient_sears");
		$page->addLinkObj($g_searsLinkObj);
		$page->addLinkObj($g_portfolioPageObj);
		$page->addLinkObj($g_charsetLinkObj);
		$page->addLinkObj($g_publicationsLinkObj);
		// $page->addBlogObj("maven", $g_mavenBlogObj);
		$page->addBlogObj($g_scorpBlogObj);

		//
		// pageClient_path.php
		//
		$page = $this->addPage("pageClient_path");
		$page->addLinkObj($g_portfolioPageObj);
		$page->addLinkObj($g_charsetLinkObj);
		$page->addLinkObj($g_publicationsLinkObj);
		// $page->addBlogObj("maven", $g_mavenBlogObj);
		$page->addBlogObj($g_scorpBlogObj);

		//
		// pageClient_tr.php
		//
		$page = $this->addPage("pageClient_tr");
		$page->addLinkObj($g_trLinkObj);
		$page->addLinkObj($g_portfolioPageObj);
		$page->addLinkObj($g_charsetLinkObj);
		$page->addLinkObj($g_publicationsLinkObj);
		// $page->addBlogObj("maven", $g_mavenBlogObj);
		$page->addBlogObj($g_scorpBlogObj);

		//
		// pageClient_abnAmro.php
		//
		$page = $this->addPage("pageClient_abnAmro");
		$page->addLinkObj($g_maxtradObj);
		$page->addLinkObj($g_portfolioPageObj);
		$page->addLinkObj($g_charsetLinkObj);
		$page->addLinkObj($g_publicationsLinkObj);
		$page->addBlogObj($g_mavenBlogObj); 
		$page->addBlogObj($g_scorpBlogObj);
		// 
		// pageClient_amex.php
		//
		$page = $this->addPage("pageClient_amex");
		$page->addLinkObj($g_portfolioPageObj);
		$page->addLinkObj($g_charsetLinkObj);
		$page->addLinkObj($g_publicationsLinkObj);
		// $page->addBlogObj("maven", $g_mavenBlogObj); 
		$page->addBlogObj($g_scorpBlogObj);
		// 
		// pageClient_billwhitney.php
		//
		$page = $this->addPage("pageClient_billwhitney");
		$page->addLinkObj($g_billwhitneyLinkObj);
		$page->addLinkObj($g_portfolioPageObj);
		$page->addLinkObj($g_charsetLinkObj);
		$page->addLinkObj($g_publicationsLinkObj);
		// $page->addBlogObj("maven", $g_mavenBlogObj); 
		$page->addBlogObj($g_scorpBlogObj);
		// 
		// pageClient_ies.php
		//
		$page = $this->addPage("pageClient_ies");
		$page->addLinkObj($g_iesLinkObj);
		$page->addLinkObj($g_portfolioPageObj);
		$page->addLinkObj($g_charsetLinkObj);
		$page->addLinkObj($g_publicationsLinkObj);
		// $page->addBlogObj("maven", $g_mavenBlogObj); 
		$page->addBlogObj($g_scorpBlogObj);
		// 
		// pageClient_maytag.php
		//
		$page = $this->addPage("pageClient_maytag");
		$page->addLinkObj($g_maytagLinkObj);
		$page->addLinkObj($g_portfolioPageObj);
		$page->addLinkObj($g_charsetLinkObj);
		$page->addLinkObj($g_publicationsLinkObj);
		// $page->addBlogObj("maven", $g_mavenBlogObj); 
		$page->addBlogObj($g_scorpBlogObj);
		// 
		// pageClient_ubs.php
		//
		$page = $this->addPage("pageClient_ubs");
		$page->addLinkObj($g_portfolioPageObj);
		$page->addLinkObj($g_charsetLinkObj);
		$page->addLinkObj($g_publicationsLinkObj);
		// $page->addBlogObj("maven", $g_mavenBlogObj); 
		$page->addBlogObj($g_scorpBlogObj);
		// 
		// pageClient_usaf.php
		//
		$page = $this->addPage("pageClient_usaf");
		$page->addLinkObj($g_usafLinkObj);
		$page->addLinkObj($g_portfolioPageObj);
		$page->addLinkObj($g_charsetLinkObj);
		$page->addLinkObj($g_publicationsLinkObj);
		// $page->addBlogObj("maven", $g_mavenBlogObj); 
		$page->addBlogObj($g_scorpBlogObj);
		// 
		// pageClient_watts.php
		//
		$page = $this->addPage("pageClient_watts");
		$page->addLinkObj($g_wattsLinkObj);
		$page->addLinkObj($g_portfolioPageObj);
		$page->addLinkObj($g_charsetLinkObj);
		$page->addLinkObj($g_publicationsLinkObj);
		// $page->addBlogObj("maven", $g_mavenBlogObj); 
		$page->addBlogObj($g_scorpBlogObj);
		// 
		// pageClient_xb.php
		//
		$page = $this->addPage("pageClient_xb");
		$page->addLinkObj($g_portfolioPageObj);
		$page->addLinkObj($g_charsetLinkObj);
		$page->addLinkObj($g_publicationsLinkObj);
		// $page->addBlogObj("maven", $g_mavenBlogObj); 
		$page->addBlogObj($g_scorpBlogObj);
	}
} 
?>
