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

<div>

<p class="headerLike">Samples</p> 
<?php
	$count = 0;
	foreach ($thumbdocs as $thumbdoc) {  ?>
		<a href="<?php print($thumbdoc->image) ?>" data-thumbnail="<?php print($thumbdoc->thumbImage) ?>"
        	class="html5lightbox" data-group="set1" data-width="<?php print($thumbdoc->width) ?>"
        	data-thumbwidth="150" data-thumbheight="150" data-shownavigation="false"
        	data-height="<?php print($thumbdoc->height) ?>" title="<?php print($thumbdoc->description) ?>">
        	<img src="<?php print($thumbdoc->thumbImage) ?>" style="margin-right: 10px"/></a> <?php
	}    ?>

<p class="smallComment">(Click on a thumbnail for more detail)</p>

</div>
