<?php
	$_cpath = $_SERVER['DOCUMENT_ROOT'];	
	if (!isset($g_section)) {
		die("In file 'templateSidebar.php', the global var '\$g_section' was not set by the including file.  At the very least it must be set to a blank string.");
	}
	if (!isset($g_slideshowKey)) {
		die("In file 'templateSidebar.php', the global var '\$g_slideshowKey' was not set by the including file.  At the very least it must be set to a blank string.");
	}
	if (!isset($g_slideshowMan)) {
		include_once($_cpath . "/objSlideshow.php");
		$g_slideshowMan = new SlideshowManager();
		$g_slideshowMan->lazyLoad();
	}

	if (!isset($g_portfolio)) {
		include_once($_cpath . "/objPortfolio.php");
		if (!isset($g_globals)) {
			include_once($_cpath . "/objGlobals.php");
			$g_globals = new GlobalsObj();
		}
		$g_portfolio = new Portfolio($g_globals);
		$g_portfolio->loadData();
	}
	if (!isset($g_sidebarManager)) {
		include_once($_cpath . "/objSidebar.php");
		$g_sidebarManager = new SidebarPageManager($g_portfolio);
		$g_sidebarManager->load();
	}
	if (!isset($g_sidebarKey)) {
		die("In file 'templateSidebar.php', the global var '\$g_sidebarKey' was not set by the including file.");
	}
	$sidebarPage = $g_sidebarManager->getSidebar($g_sidebarKey);
	$g_sidebarObj = $sidebarPage;



?>
<ul> <?php
if (sizeof($g_sidebarObj->linksArray) > 0) { ?>
	<li id="submenu">
		<h2><?php print($linksTitle) ?></h2>
		<ul>  <?php
		foreach ($g_sidebarObj->linksArray as $linkObj) {  ?>
			<li>
				<a href="<?php print($linkObj->url) ?>">
					<?php print($linkObj->text) ?> <?php
					if ($linkObj->remote) { ?>
						<img src='/image/wikipediaExternalPageGold.png' border='0' alt="External Page" /> <?php
					} ?>
				</a>
			</li>  <?php
		}  ?>
		</ul>
	</li> <?php
}
if (sizeof($g_sidebarObj->blogsArray) > 0) { ?>
	<li id="news">
		<h2>Most Recent Blogs</h2>
		<ul> <?php		
		foreach ($g_sidebarObj->blogsArray as $blogObj) {  ?>
			<li>
				<h3><?php print($blogObj->date) ?></h3>
				<p><a href="<?php print($blogObj->url) ?>"><?php print($blogObj->text) ?>&nbsp;<img src="/image/wikipediaExternalPageGold.png" border="0" alt="External Page" /></a></p>
			</li> <?php
		}  ?>
		</ul>
	</li> <?php
} ?>
</ul> <?php
if ($g_slideshowKey != "") {
	$slideshow = $g_slideshowMan->get($g_slideshowKey);
	print("<h2>" . $slideshow->title . "</h2><br/>");  ?>
	<div id="rotatingLogosDiv" style="text-align: center">
		<img src="/image/logos/spacer.gif" alt="" name="slide" border="0" style="filter:blendTrans(duration=2)" width="<?php print($slideshow->width) ?>" height="<?php print($slideshow->height) ?>"/>
						</div>
	<script type="text/javascript" src="/numbersWithoutReplacement.js"></script>
	<script type="text/javascript">
		//specify interval between slide (in mili seconds)
		var slidespeed = <?php print($slideshow->dur) ?>;
		var numImages = 0;


		//specify corresponding links
		var slidelinks = new Array("#","#","#");

		var newwindow = 1; // open links in new window? 1=yes, 0=no

		var imageholder = new Array();
		var ie = document.all;
		var whichlink = 0;
		var whichimage = 0;
		var imageOrder = new Array();
		function loadImages() {
			numImages = 0;  <?php
			$count = 0;
			foreach ($slideshow->imgsArray as $file) {  ?>
				imageholder[<?php print($count) ?>] = new Image();
				imageholder[<?php print($count) ?>].src = "/image/<?php print($slideshow->imgsSubdir) ?>/<?php print($file) ?>";
				<?php
				$count += 1;  
			} ?>
			numImages = <?php print($count) ?>;
			imageOrder = randomArray(numImages);

		}
		function slideit() {
			if (!document.images) {
				return;
			}
			if (ie) {
				document.images.slide.filters[0].apply();
			}
			document.images.slide.src = imageholder[imageOrder[whichimage]].src;
			if (ie) {
				document.images.slide.filters[0].play();
			}
			whichlink = whichimage;

			whichimage = (whichimage + 1) % numImages;
			setTimeout("slideit()", slidespeed + blenddelay);
		}
		var blenddelay = ie ? document.images.slide.filters[0].duration * 1000 : 0;
		loadImages();
		slideit();
</script>  <?php
} ?>

