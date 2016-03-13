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
<?php
foreach ($skills->categoryObjArray as $skillCategory) { ?>
  <div data-role="page" id="skill<?php print($skillCategory->kkey) ?>" data-theme="a">
    <div data-role="header">
      <h1><?php print($skillCategory->category) ?> - Greg Sandell</h1>
      <a href="pageSkillsList.php" data-icon="arrow-l" data-transition="slide" data-direction="reverse">Back</a>
    </div>
    <div data-role="content"> 
      <ul> 
        <?php
        foreach ($skillCategory->listTextArray as $skillItem) { ?>
          <li ><?php print($skillItem) ?></li> 
          <?php
        } ?>
      </ul>
    </div>
    <?php include("inclFooterQualified.php"); ?>
  </div> 
  <?php
}
?>

</body>
</html>
