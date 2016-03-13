<?php
ini_set('display_errors',1);
error_reporting(E_ALL|E_STRICT);

  $_cpath = $_SERVER['DOCUMENT_ROOT'];
  include($_cpath . "/resume/objResume.php");
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
    <h1>Technology Expertise</h1>
    <p>
       I specialize in Mobile Web, Javascript, AngularJS, jQuery, Ajax/JSON, web services, Unix, Agile and Open Source.  
    </p>
    <div data-role="collapsible" data-collapsed="true">
      <h1>Full Capabilities List</h1>
      <p>
        <ul data-role="listview" data-inset="true"> 
          <?php
          foreach ($skills->categoryObjArray as $skillCategory) { ?>
            <li><a href="pageSkills.php#skill<?php print($skillCategory->kkey) ?>" 
              data-transition="slide" data-direction="forward" data-ajax="false"><?php print($skillCategory->category) ?></a></li> 
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
