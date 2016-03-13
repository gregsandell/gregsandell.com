<?php
ini_set('display_errors',1);
error_reporting(E_ALL|E_STRICT);
?>

<!DOCTYPE html> 
<html> 
  <head> 
  <title>Greg Sandell</title> 
  <?php include("inclHead.php"); ?>
</head> 
<body> 

<div data-role="page" id="home" data-theme="a">
  <div data-role="header">
    <h1>Greg Sandell</h1>
    <a href="index.php" data-ajax="false" data-role="button" data-icon="arrow-l" data-transition="slide" data-direction="reverse">Home</a>
  </div>
  <div data-role="content"> 
    <ul data-role="listview" data-inset="true"> 
      <li data-role="list-divider">Site Map</li>
      <li><a href="pageEmployerList.php">Clients</a></li>
      <li><a href="pageSkillsList.php">Technology</a></li>
      <li><a href="pageResume.php">Full Resume</a></li>
      <li><a href="pageLinks.php">Links</a></li>
      <li><a href="pageContact.php">About</a></li>
    </ul>
  </div> 
  <div data-role="footer" class="ui-bar">
    <a href="index.php" data-ajax="false" data-role="button" data-icon="home"
       data-transition="flip">Home</a>
  </div>
</div> 
</body>
</html>
