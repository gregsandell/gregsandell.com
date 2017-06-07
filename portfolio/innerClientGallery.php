<?php
	$_cpath = $_SERVER['DOCUMENT_ROOT'];
	if (!isset($g_portfolio)) {
		include_once($_SERVER['DOCUMENT_ROOT'] . "/portfolio/objPortfolio.php");
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

<script type="text/javascript" src="/lib/highslide/3.2.0/highslide.js"></script>

<script type="text/javascript">

	hs.registerOverlay(
    	{
    		thumbnailId: null,
    		overlayId: 'controlbar',
    		position: 'top right',
    		hideOnMouseOut: true
		}
	);
	
    hs.graphicsDir = '/lib/highslide/3.2.0/graphics/';
    hs.outlineType = 'rounded-white';
</script>

<link rel="stylesheet" href="/lib/highslide/3.2.0/highslide.css" type="text/css" />

<div>

<p class="headerLike">Samples</p> 
<?php
	$count = 0;
	foreach ($thumbdocs as $thumbdoc) { 
		$count += 1;  ?>
		<a id="thumb<?php print($count) ?>" href="<?php print($thumbdoc->image) ?>" class="highslide" onclick="return hs.expand(this, { captionId: 'caption<?php print($count) ?>' } )">
			<img src="<?php print($thumbdoc->thumbImage) ?>" alt="Highslide JS" 
				title="Click to enlarge" width="100" height="100"  /></a>

		<div class='highslide-caption' id='caption<?php print($count) ?>'>
		    <div style="color: red; font-weight: bold"><?php print($thumbdoc->description) ?></div>
		</div> <?php
	}    ?>
<p class="smallComment">(Click on a thumbnail for more detail)</p>

<div id="controlbar" class="highslide-overlay controlbar">
	<a href="#" class="previous" onclick="return hs.previous(this)" title="Previous (left arrow key)"></a>
	<a href="#" class="next" onclick="return hs.next(this)" title="Next (right arrow key)"></a>
    <a href="#" class="highslide-move" onclick="return false" title="Click and drag to move"></a>
    <a href="#" class="close" onclick="return hs.close(this)" title="Close"></a>
</div>
</div>
