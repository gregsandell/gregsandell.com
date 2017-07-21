<?php
	$_cpath = $_SERVER['DOCUMENT_ROOT'];	
	if (!isset($g_section)) {
		die("In file 'templateSidebar.php', the global var '\$g_section' was not set by the including file.  At the very least it must be set to a blank string.");
	}
	if (!isset($g_slideshowKey)) {
		die("In file 'templateSidebar.php', the global var '\$g_slideshowKey' was not set by the including file.  At the very least it must be set to a blank string.");
	}
	if (!isset($g_slideshowMan)) {
		include_once($_cpath . "/portfolio/objSlideshow.php");
		$g_slideshowMan = new SlideshowManager();
		$g_slideshowMan->lazyLoad();
	}

	if (!isset($g_portfolio)) {
		include_once($_cpath . "/portfolio/objPortfolio.php");
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
			<li> <?php
				if ($linkObj->type == 'pdf') { ?>
					<a href="/portfolio/portfolioPopup.php?pdf=<?php print($linkObj->url) ?>" ><?php print($linkObj->text) ?></a></li>  <?php
				} elseif ($linkObj->type == 'urlpopup') { ?>
					<a href="/portfolio/portfolioPopup.php?url=<?php print($linkObj->url) ?>" ><?php print($linkObj->text) ?></a></li>  <?php
				} elseif ($linkObj->type == 'internal' || $linkObj->type == '') { ?>
					<a href="<?php print($linkObj->url) ?>"><?php print($linkObj->text) ?></a>  <?php
				}
				elseif ($linkObj->type == 'external') { ?>
					<a href="<?php print($linkObj->url) ?>">
						<?php print($linkObj->text) ?>
						<img src='/image/wikipediaExternalPageGold.png' border='0' alt="External Page" />
					</a> <?php
				} ?>
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
	print("<h2>" . $slideshow->title . "</h2><br/>"); ?>
	<div id="rotatingLogosDiv" style="text-align: center">
		<a id="slideshow-link" href="#">
		<img src="/image/logos/spacer.gif" alt="" name="slide" border="0" style="filter:blendTrans(duration=2)" width="<?php print($slideshow->width) ?>" height="<?php print($slideshow->height) ?>"/>
		</a>
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
		var slideObj;
		function loadImages() {
			numImages = 0;  <?php
			$count = 0;
			foreach ($slideshow->imgsArray as $imgObj) {  ?>
			    slideObj = {};
				slideObj.img = new Image();
				slideObj.img.src = "/image/<?php print($slideshow->imgsSubdir) ?>/<?php print($imgObj->file) ?>";
				slideObj.url = "<?php print($imgObj->url) ?>";
				imageholder[<?php print($count) ?>] = slideObj; <?php
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
			var item = imageholder[imageOrder[whichimage]];
			document.images.slide.src = item.img.src;
			var linkEl = document.getElementById('slideshow-link');
			linkEl.href = item.url;
			if (item.url == '#') {
				linkEl.onclick = function() { return false; };
				linkEl.style = "pointer-events: none; cursor: default;";
			}

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

