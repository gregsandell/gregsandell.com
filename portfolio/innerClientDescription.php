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
		die("File 'innerClientDescription.php' was expecting content in variable '\$g_key', and found none.");
	}
	if (!isset($g_resume)) {
		include_once($_SERVER['DOCUMENT_ROOT'] . "/resume/objResume.php");
		$resMan = new ResumeManager();
		$g_resume = $resMan->res;
	}
	if (!isset($g_client)) {
		$g_client = $g_portfolio->getClient($g_key);
	}
    if (!isset($g_engagementDetails)) {
      die("Variable \$g_engagementDetails was not defined in the file that included innerClientDescription.php");
    }
	
?>
<br/>  <?php
if (array_key_exists($g_key, $g_resume->positionObjArray)) {
	$position = $g_resume->getPosition($g_key);  ?>
	<dl style='padding: 0px'>
		<dt style='padding: 0px'>
			<p class="headerLike">Engagement Details</p>
		</dt>
		<dd>
            <?php print($g_engagementDetails) ?>
			<a href="#testContent"
				class="html5lightbox" data-width="400" data-height="300">More...</a>
		</dd>
	</dl> 
	<div id='testContent' style='display: none; padding: 5px'>
		<h1><?php print($g_client->client) ?> Engagement Details</h1>
		<ul style='padding: 7px; list-style-type: disc'>  <?php
			foreach ($position->listTextArray as $line) { ?>
				<li style='padding: 0px 0px 5px 0px; text-align: left'><?php print($line) ?></li>  <?php
			}  ?>
		</ul>
	</div>   <?php
}

?>
</div>


