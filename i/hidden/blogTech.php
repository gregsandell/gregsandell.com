<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
  require_once('simplepie.inc');
  $blogType = $_GET['type'];

  // CHANGE THE FEED ADDRESS BELOW - THAT'S IT!
  $gregBlogId = "5850363418317194275";
  $techBlogUrl = "http://www.blogger.com/feeds/" . $gregBlogId . "/posts/default/-/" . $blogType;
  $sampleBlogUrl = 'http://feeds.feedburner.com/CssTricks';
  $feed = new SimplePie($techBlogUrl);

  $feed->handle_content_type();

  $total_articles = 10;

  for ($x = 0; $x < $feed->get_item_quantity($total_articles); $x++)
  {
    $first_items[] = $feed->get_item($x);
  }
?>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=320; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />

  <title>Greg Sandell Blog - Technical</title>

  <link rel="stylesheet" type="text/css" href="blog.css" />
  <script type="text/javascript" src="jquery-1.3.1.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
  
    $('.headline:eq(0)').click(function() {
      $("#mask").animate({
        left: "-320px"
      });
    });
    
    $('.headline:eq(1)').click(function() {
      $("#mask").animate({
        left: "-640px"
      });
    });
    
    $('.headline:eq(2)').click(function() {
      $("#mask").animate({
        left: "-960px"
      });
    });
    $('.headline:eq(3)').click(function() {
      $("#mask").animate({
        left: "-1280px"
      });
    });
    $('.headline:eq(4)').click(function() {
      $("#mask").animate({
        left: "-1600px"
      });
    });
    $('.headline:eq(5)').click(function() {
      $("#mask").animate({
        left: "-1920px"
      });
    });
    $('.headline:eq(6)').click(function() {
      $("#mask").animate({
        left: "-2240px"
      });
    });
    $('.headline:eq(7)').click(function() {
      $("#mask").animate({
        left: "-2560px"
      });
    });
    
     
$('.back').click(function() {
  $("#mask").animate({
    left: "0px"
  });
  $('html, body').animate({scrollTop:0}, 'slow'); 
});

$('#home').click(function() {
  $("#mask").animate({
    left: "0px"
  });
  $('html, body').animate({scrollTop:0}, 'slow'); 
});
  
  });

</script>
</head>

<body>

  <div id="page-wrap">
    <a href="index.php">Greg Sandell</a>
          <h1 id="home"><?php echo $feed->get_title(); ?></h1>          

    <div id="slider">

      <div id="mask">

        <div id="mainMenu">
          <?php
            foreach ($first_items as $item)
            {
              echo "<div class='headline'>\n";
              echo "  <h2>" . $item->get_title() . "</h2>";
              echo "  <p style='margin: 0;'>" . $item->get_date("j M Y") . "</p>\n";
              echo "</div>\n";
              echo "<img src='images/bottom.png' alt='' style='margin: 0 0 10px 5px;' />\n";
            }
          ?>
        </div>

        <?php
          foreach ($first_items as $item)
          {
            echo "<div class='article-text'>\n";
            echo "  <a class='back'>\n";
            echo "    <img src='images/backbutton.png' alt='Back' />\n";
            echo "  </a>\n";
            echo "  <h1><a href='" . $item->get_permalink() ."'>" . $item->get_title() . "</a></h1>\n";
            echo "  <p>" . $item->get_date("j M Y") . "</p>\n";
            echo "  <p>\n";
            echo "    " . $item->get_content() . "\n";
            echo "  </p>\n";
            echo "  <a class='back'><img src='images/backbutton.png' alt='Back' /></a>\n";
            echo "</div>";

          }
        ?>
        
      </div>

    </div>

  </div>



</body>

</html>
