<?php
  require_once('../i/simplepie.inc');
  $rssUrl = "http://www.google.com/reader/shared/04430893089087584672";
  $rssUrl = "http://www.google.com/reader/public/atom/user%2F04430893089087584672%2Fstate%2Fcom.google%2Fbroadcast";
  $total_articles = 25;
?>
<!DOCTYPE html> 
<html> 
  <head> 
  <title>Greg Sandell</title> 
  <link rel="stylesheet" type="text/css" href="blog.css" />
	<?php  include("inclHead.php");  ?>
</head>

<body>
<div data-role="page" id="bloglist" data-theme="a">
  <div data-role="header">
    <a href="pageLinks.php" data-icon="back" >Back</a>
    <h1>Shared Links - Greg Sandell</h1>
  </div>
  <div data-role="content"> 
    <h1>Shared Links</h1>
    <p>
       These are articles I stumbled across in RSS reader and liked.
    </p>
    <?php
/*
      $feed = new SimplePie();
      $feed->set_feed_url($rssUrl);
      $feed->init();
*/
      $feed = new SimplePie($rssUrl);
      $feed->handle_content_type();
      for ($x = 0; $x < $feed->get_item_quantity($total_articles); $x++) {
        $rss_items[] = $feed->get_item($x);
      } 
	  ?>
    <div data-role="collapsible" data-collapsed="true">
      <h1>Shared RSS Reader Items</h1>
      <p>
        <ul data-role="listview" data-inset="true"> <?php
    			foreach ($rss_items as $item) {  ?>
						<li><a href="pageRSSShared.php#<?php print($item->get_link())  ?>"
							data-transition="slide" data-ajax="false"
              data-direction="forward" ><?php print($item->get_title()) ?></a></li> 
            <?php
          }
          ?>
        </ul>
      </p>
    </div>
  </div>
  <?php include("inclFooter.php"); ?>
</div> 
</body>
</html>
