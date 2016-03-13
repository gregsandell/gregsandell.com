<?php
	$_cpath = $_SERVER['DOCUMENT_ROOT'];
	if (!isset($g_portfolio)) {
		include_once($_SERVER['DOCUMENT_ROOT'] . "/objPortfolio.php");
		if (!isset($g_globals)) {
			include_once($_SERVER['DOCUMENT_ROOT'] . "/objGlobals.php");
			$g_globals = new GlobalsObj();
		}
		$g_portfolio = new Portfolio($g_globals);
		$g_portfolio->loadData();
	}
	if (!isset($g_key)) {
		die("File 'innerClientGallery.php' was expecting variable '\$key' to be defined.");
	}
	if (!isset($g_client)) {
		$g_client = $g_portfolio->getClient($g_key);
	}
	$thumbdocs = $g_client->thumbdocs;
	
?>
<!-- 
    1 ) Reference to the file containing the javascript. 
    This file must be located on your server. 
-->

<script type="text/javascript" src="highslide/highslide.js"></script>



<!-- 
    2) Optionally override the settings defined at the top
    of the highslide.js file. The parameter hs.graphicsDir is important!
-->

<script type="text/javascript">

	// remove the registerOverlay call to disable the controlbar
	hs.registerOverlay(
    	{
    		thumbnailId: null,
    		overlayId: 'controlbar',
    		position: 'top right',
    		hideOnMouseOut: true
		}
	);
	
    hs.graphicsDir = 'highslide/graphics/';
    hs.outlineType = 'rounded-white';
</script>


<!-- 
    3) These CSS-styles are necessary for the script to work. You may also put
    them in an external CSS-file. See the webpage for documentation.
-->

<style type="text/css">
@import 'innerClientGallery.css';
</style>

<div>
<!-- 
    4) This is how you mark up the thumbnail image with an anchor tag around it.
    The anchor's href attribute defines the URL of the full-size image.
-->

<p class="headerLike">Samples</p> 
<?php
	$count = 0;
	foreach ($thumbdocs as $thumbdoc) { 
		$count += 1;  ?>
		<a id="thumb<?php print($count) ?>" href="<?php print($thumbdoc->image) ?>" class="highslide" onclick="return hs.expand(this, { captionId: 'caption<?php print($count) ?>' } )">
			<img src="<?php print($thumbdoc->thumbImage) ?>" alt="Highslide JS" 
				title="Click to enlarge" width="100" height="100"  /></a>

		<div class='highslide-caption' id='caption<?php print($count) ?>'>
		    <?php print($thumbdoc->description) ?>
		</div> <?php
	}    ?>
<p class="smallComment">(Click on a thumbnail for more detail)</p>
<!-- 
	6 (optional). This is the markup for the controlbar. The conrolbar is tied to the expander
	in the script tag at the top of the file.
-->
<div id="controlbar" class="highslide-overlay controlbar">
	<a href="#" class="previous" onclick="return hs.previous(this)" title="Previous (left arrow key)"></a>
	<a href="#" class="next" onclick="return hs.next(this)" title="Next (right arrow key)"></a>
    <a href="#" class="highslide-move" onclick="return false" title="Click and drag to move"></a>
    <a href="#" class="close" onclick="return hs.close(this)" title="Close"></a>
</div>
</div>
