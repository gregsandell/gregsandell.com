<?php
?>
<!DOCTYPE html> 
<html> 
  <head> 
  <title>Greg Sandell</title> 
  <link rel="stylesheet" type="text/css" href="blog.css" />
	<?php  include("inclHead.php");  ?>
</head>

<body>
<div data-role="page" id="code" data-theme="a">
  <div data-role="header">
    <a href="pageSitemap.php" data-icon="back" >Back</a>
    <h1>Resume - Greg Sandell</h1>
  </div>
  <div data-role="content"> 
    <?php include("../innerPageResume.php"); ?>
  </div>
  <?php include("inclFooter.php"); ?>
</div> 
</body>
</html>
