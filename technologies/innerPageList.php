<h1 class="">Programming Technologies</h1>
<ul>
<?php
	foreach ($g_sidebarManager->techList as $linkObj) {  ?>
	    <li><a href="<?php print($linkObj->url) ?>"><?php print($linkObj->text) ?></a></li>  <?php
	}
?>
</ul>
