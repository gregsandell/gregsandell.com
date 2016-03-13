<?php
ini_set('display_errors',1);
error_reporting(E_ALL|E_STRICT);

  $_cpath = $_SERVER['DOCUMENT_ROOT'];
  include($_cpath . "/objResume.php");
  include($_cpath . "/objSkills.php");
  include_once($_cpath . "/objGlobals.php");
  $resumeManager = new ResumeManager();
  $skillsManager = new SkillsManager();
  $globals = new GlobalsObj();
  $resume = $resumeManager->res;
  $skills = $skillsManager->skills;
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
    <a href="pageSitemap.php" data-icon="arrow-l" data-transition="slide" data-direction="reverse">Back</a>
  </div>
  <div data-role="content"> 
    <h1>Clients and Employers</h1>
    <p>
       I have provided solutions for clients such as Reuters, Chicago Tribune, UBS, Amex, and Lockheed-Martin, in vertical markets including media, travel, finance, defense, healthcare, eCommerce and education. 
    </p>
    <div data-role="collapsible" data-collapsed="true">
      <h1>Full Client and Employer List</h1>
      <p>
        <ul data-role="listview" data-inset="true">
          <?php
          foreach ($resume->positionObjArray as $ppos) { ?>
            <li><a href="pageEmployers.php#employer<?php print($ppos->kkey) ?>" 
                       data-ajax="false" data-transition="slide" data-direction="forward"><?php print($ppos->company) ?></a></li> 
            <?php
          } ?>
        </ul>
      </p>
    </div>
  </div> 
  <?php include("inclFooter.php"); ?>
</div> 
</body>
</html>
