<?php
  require_once('../i/simplepie.inc');
  $blogType = $_GET['type'];
  // CHANGE THE FEED ADDRESS BELOW - THAT'S IT!
  $gregBlogId = "5850363418317194275";
  $techBlogUrl = "http://www.blogger.com/feeds/" . $gregBlogId . "/posts/default/-/_technical";
  $personalBlogUrl = "http://www.blogger.com/feeds/" . $gregBlogId . "/posts/default/-/_personal";
  $sampleBlogUrl = 'http://feeds.feedburner.com/CssTricks';
  $total_articles = 100;
  $feed = new SimplePie($techBlogUrl);
  $feed->handle_content_type();
  for ($x = 0; $x < $feed->get_item_quantity($total_articles); $x++) {
    $tech_items[] = $feed->get_item($x);
  }
  $feed = new SimplePie($personalBlogUrl);
  $feed->handle_content_type();
  for ($x = 0; $x < $feed->get_item_quantity($total_articles); $x++) {
    $personal_items[] = $feed->get_item($x);
  }
	$all_items = array_merge($tech_items, $personal_items);
?>
<!DOCTYPE html> 
<html> 
  <head> 
  <title>Greg Sandell</title> 
  <link rel="stylesheet" type="text/css" href="../i/blog.css" />
	<?php  include("inclHead.php");  ?>
</head>
	<body> <?php
  foreach ($all_items as $item) {
	  ?>
    <div data-role="page" id="<?php print($item->get_link()) ?>" data-theme="a">
      <div data-role="header">
        <a href="/j/pageBlogList.php" data-ajax="false" data-icon="back" data-transition="slide" data-direction="reverse">Back</a>
        <h1>Elevator Music</h1>
      </div>
      <div data-role="content"> 
    		<h1><?php print($item->get_title()) ?></h1>
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
