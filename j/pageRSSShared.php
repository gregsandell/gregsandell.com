<?php
  require_once('../i/simplepie.inc');
  $rssUrl = "http://www.google.com/reader/public/atom/user%2F04430893089087584672%2Fstate%2Fcom.google%2Fbroadcast";
  $total_articles = 25;
  $feed = new SimplePie($rssUrl);
  $feed->handle_content_type();
  for ($x = 0; $x < $feed->get_item_quantity($total_articles); $x++) {
    $rss_items[] = $feed->get_item($x);
  }
?>
<!DOCTYPE html> 
<html> 
  <head> 
  <title>Greg Sandell</title> 
  <link rel="stylesheet" type="text/css" href="../i/blog.css" />
	<?php  include("inclHead.php");  ?>
  <script>
    $("#titleLink").click(function() { alert(this.href); });
  </script>
    
</head>
	<body> <?php
  foreach ($rss_items as $item) {
	  ?>
    <div data-role="page" id="<?php print($item->get_link()) ?>" data-theme="a">
      <div data-role="header">
        <a href="http://gregsandell.com/j/pageRSSSharedList.php" data-ajax="false" data-icon="back" data-transition="slide" data-direction="reverse">Back</a>
        <h1>RSS Shared Items</h1>
      </div>
      <div data-role="content"> 
    		<h1><a href="<?php print($item->get_link()) ?>" ><?php print($item->get_title()) ?></a></h1>
    		<a id="titleLink" href="<?php print($item->get_link()) ?>" rel="external" ><?php print($item->get_title()) ?></a>
    		<p><?php print($item->get_date("j M Y")) ?></p>
        <p>
    			<?php print($item->get_content()) ?>
        </p>
      </div>
      <?php include("inclFooterQualified.php"); ?>
    </div>
    <?php
  }
?>
</body>
</html>
