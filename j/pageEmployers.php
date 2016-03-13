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
<?php
foreach ($resume->positionObjArray as $ppos) { ?>
  <div data-role="page" id="employer<?php print($ppos->kkey) ?>" data-theme="a">
    <div data-role="header">
      <h1><?php print($ppos->company) ?> - Greg Sandell</h1>
      <a href="pageEmployerList.php" data-icon="arrow-l" data-transiition="slide" data-direction="reverse">Back</a>
    </div>
    <div data-role="content"> 
      <p>
        <?php print($ppos->company) ?>
        <br/><b>Location:</b> <?php print($ppos->location) ?><br/>
        <b>Basis:</b> <?php print($ppos->basis) ?><br/>
        <b>Dates:</b> <?php print($ppos->dates) ?><br/>
        <b>Title:</b> <?php print($ppos->ttitle) ?><br/>
      </p>
      <ul> 
        <?php
        foreach ($ppos->listTextArray as $line) { ?>
          <li ><?php print($line) ?></li> 
          <?php
        } ?>
      </ul>
    </div>
    <?php include("inclFooter.php"); ?>
  </div>
  <?php
}
?>
</body>
</html>
