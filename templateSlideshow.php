<?php
	$_cpath = $_SERVER['DOCUMENT_ROOT'];	
	if (!isset($g_slideshowKey)) {
		die("In file 'templateSidebar.php', the global var '\$g_slideshowKey' was not set by the including file.  At the very least it must be set to a blank string.");
	}
	if (!isset($g_slideshowMan)) {
		include_once($_cpath . "/portfolio/objSlideshow.php");
		$g_slideshowMan = new SlideshowManager();
		$g_slideshowMan->lazyLoad();
	}

if ($g_slideshowKey != "") {
	$slideshow = $g_slideshowMan->get($g_slideshowKey);
	print("<h2>" . $slideshow->title . "</h2><br/>");  ?>
	<div id="rotatingLogosDiv" style="text-align: center">
		<img src="/image/logos/spacer.gif" alt="" name="slide" style="border: 0;filter:blendTrans(duration=2)" width="<?php print($slideshow->width) ?>" height="<?php print($slideshow->height) ?>"/>
	</div>
	<script src="numbersWithoutReplacement.js"></script>
	<script >
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
				imageholder[<?php print($count) ?>].src = "image/<?php print($slideshow->imgsSubdir) ?>/<?php print($file) ?>";  
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

