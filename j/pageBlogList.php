<?php
  require_once('../i/simplepie.inc');
  $blogType = $_GET['type'];

  // CHANGE THE FEED ADDRESS BELOW - THAT'S IT!
  $gregBlogId = "5850363418317194275";
  $techBlogUrl = "http://www.blogger.com/feeds/" . $gregBlogId . "/posts/default/-/_technical";
  $personalBlogUrl = "http://www.blogger.com/feeds/" . $gregBlogId . "/posts/default/-/_personal";
  $sampleBlogUrl = 'http://feeds.feedburner.com/CssTricks';
  $total_articles = 100;
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
    <h1>Blogs - Greg Sandell</h1>
  </div>
  <div data-role="content"> 
    <h1>Elevator Music</h1>
    <p>
       Elevator Music is my blog where I write on technical stuff, and other things
       that interest me.  I have the topics separated below for your convenience.
    </p>
    <?php
      $feed = new SimplePie($techBlogUrl);
      $feed->handle_content_type();
      for ($x = 0; $x < $feed->get_item_quantity($total_articles); $x++) {
        $tech_items[] = $feed->get_item($x);
      }
	  ?>
    <div data-role="collapsible" data-collapsed="true">
      <h1>Technical Blog</h1>
      <p>
        <ul data-role="listview" data-inset="true"> <?php
    			foreach ($tech_items as $item) {  ?>
						<li><a href="pageBlog.php#<?php print($item->get_link())  ?>"
							data-transition="slide" data-ajax="false"
              data-direction="forward" ><?php print($item->get_title()) ?></a></li> 
            <?php
          }
          ?>
        </ul>
      </p>
    </div>
    <?php
      $feed = new SimplePie($personalBlogUrl);
      $feed->handle_content_type();
      for ($x = 0; $x < $feed->get_item_quantity($total_articles); $x++) {
        $personal_items[] = $feed->get_item($x);
      }
	  ?>
    <div data-role="collapsible" data-collapsed="true">
      <h1>Other Blog Posts</h1>
      <p>
        <ul data-role="listview" data-inset="true"> <?php
          foreach ($personal_items as $item) {  ?>
						<li><a href="pageBlog.php#<?php print($item->get_link()) ?>"
							data-transition="slide" data-direction="forward" 
              data-ajax="false"><?php print($item->get_title()) ?></a></li> 
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
