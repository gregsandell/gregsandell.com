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
  /* $page = $_GET['page']; */
  $page = "toc";
/*
  $positionkey = $_GET['positionkey'];
  if (isset($positionkey) && !empty($positionkey) && $positionkey != "") {
    $ppos = $resume->positionObjArray[$positionkey];  
  }
  $skillkey = $_GET['skillkey'];
  if (isset($skillkey) && !empty($skillkey) && $skillkey != "") {
    $categoryObj = $skills->categoryObjArray[$skillkey]; 
  }
*/
  class PageObj {
    var $key;
    var $title;
    var $linkBackText;
    var $linkBackUrl;
    function PageObj($kkey, $title, $linkBackText, $linkBackUrl) {
      $this->key = $kkey;
      $this->title = $title;
      $this->linkBackText = $linkBackText;
      $this->linkBackUrl = $linkBackUrl;
    }
    function makeResumeLi() {  ?>
      <li><a href='#<?php print($this->key) ?>' ><?php print($this->title) ?></a></li> 
      <?php
    }
    function underConstruction() {  ?>
      <div id="content">
        <span class="graytitle"><?php print($this->title) ?> - Greg Sandell</span>
        <p>This page is under construction. </p>
      </div> <?php
    }
  }
  $pageObjs = array(
    'toc' => new PageObj("toc","Resume", "Home", "index.php"),
    'qualSummary' => new PageObj("qualSummary","Summary of Qualifications", "Resume Table of Contents", "resume.php?page=toc"),
      'contact' => new PageObj("contact", "Contact/About Greg Sandell", "Home", "index.php"),


    'skillsToc' => new PageObj("skillsToc", "Technology Portfolio", "Resume", "resume.php?page=toc"),
    'employmentHistory' => new PageObj("employmentHistory","Employment History", "Resume", "resume.php?page=toc"),
    'downloads' => new PageObj("downloads", "Resume Downloads", "Resumes", "resume.php?page=toc"),
    'vitals' => new PageObj("vitals", "Vital Statistics", "Resume", "resume.php?page=toc"),
    'training' => new PageObj("training","Training &amp; Certifications", "Vital Statistics", "resume.php?page=vitals"),
    'education' => new PageObj("education","Education", "Vital Statistics", "resume.php?page=vitals"),
    'msword' => new PageObj("msword","MS-Word Resume", "Resume Downloads", "resume.php?page=downloads"),
    'pdf' => new PageObj("pdf","PDF Resume", "Resume Downloads", "resume.php?page=downloads"),
    'sharc' => new PageObj("sharc","Sharc Timbre Database", "Home", "index.php"),
    'pubs' => new PageObj("pubs","Publications", "Home", "index.php"),
    'rssShared' => new PageObj("rssShared","Shared RSS Feed Items", "Home", "index.php"),
    'lastfm' => new PageObj("twitter","last.fm Listening List", "Home", "index.php")
    );
foreach ($resume->positionObjArray as $ppos) { 
  $pageObjs[$ppos->kkey] = new PageObj($ppos->kkey,$ppos->company, "Employment History", "resume.php?page=employmentHistory");
}
foreach ($skills->categoryObjArray as $skillCategory) { 
  $pageObjs[$skillCategory->kkey] = new PageObj($skillCategory->kkey,$skillCategory->category, "Technology Portfolio", "resume.php?page=skillsToc");
}
/*
  if ($page == "employer") {
      $positionkey = $_GET['positionkey'];
      $pageObj = $pageObjs[$positionkey];
  } else {
      $pageObj = $pageObjs[$page];
  }
  if ($page == "skill") {
      $skillkey = $_GET['skillkey'];
      $pageObj = $pageObjs[$skillkey];
  } else {
      $pageObj = $pageObjs[$page];
  }
*/
?>
<!DOCTYPE html> 
<html>
<head>
  <title>GregSandell.com Mobile</title> 
  <?php include("inclHead.php"); ?>
</head>
<body>

<div data-role="page" id="toc" data-theme="a">
  <div data-role="header">
    <a href="index.php" data-icon="back" >Back</a>
    <h1>Resume - Greg Sandell</h1>
  </div>
  <div data-role="content"> 
    <ul data-role="listview" data-inset="true"> 
<?php 
      $pageObjs["vitals"]->makeResumeLi();
      $pageObjs["skillsToc"]->makeResumeLi();
      $pageObjs["employmentHistory"]->makeResumeLi();
      $pageObjs["downloads"]->makeResumeLi();  ?>
    </ul>
  </div>
  <div data-role="footer">
    <h4>Page Footer</h4>
  </div>
</div>
<div data-role="page" id="vitals" data-theme="a">
  <div data-role="header">
    <h1>Vital Statistics - Greg Sandell</h1>
  </div>
  <div data-role="content"> 
    <p>Explore these links to learn about where I went to school, my certifications, and technology training I have attended.</p>
    <ul data-role="listview" data-inset="true">  
      <?php
      $pageObjs["training"]->makeResumeLi();
      $pageObjs["education"]->makeResumeLi(); 
      ?>
    </ul>
  </div>
  <div data-role="footer" class="ui-bar">
    <a href="index.php" data-role="button" data-icon="home">Home</a>
  </div>
</div>


</div> 
  <?php
/*
if ($page == "msword" || $page == "pdf" || $page == "training" || $page == "education" || $page == 'sharc' || $page == 'pubs' || $page == 'rssShared' || $page == 'lastfm') {   
  print($pageObjs[$page]->underConstruction());
} 
*/
?>
<div data-role="page" id="downloads" data-theme="a">
  <div data-role="header">
    <h1>Resume Downloads - Greg Sandell</h1>
  </div>
  <div data-role="content"> 
    <ul data-role="listview" data-inset="true">  
      <?php
      $pageObjs["msword"]->makeResumeLi();
      $pageObjs["pdf"]->makeResumeLi(); 
      ?>
    </ul>
  </div> 
  <div data-role="footer">
    <h4>Page Footer</h4>
  </div> 
</div> 
<div data-role="page" id="skillsSummary" data-theme="a">
  <div data-role="header">
    <h1>Skills Summary - Greg Sandell</h1>
  </div>
  <div data-role="content"> 
    <ul data-role="listview" data-inset="true">
      <li> 
        <?php 
        foreach ($resume->skillsetSummary as $skill) { ?>
          <p><?php print($skill) ?></p> 
          <?php
        } ?>
      </li>
    </ul>
  </div>
  <div data-role="footer">
    <h4>Page Footer</h4>
  </div> 
</div> 
<div data-role="page" id="employmentHistory" data-theme="a">
  <div data-role="header">
    <h1>Employment History - Greg Sandell</h1>
  </div>
  <div data-role="content"> 
    <p>These links list each of my employers and clients for whom I have worked, in chronological order (most recent first).</p>
    <ul data-role="listview" data-inset="true"> 
      <?php
      foreach ($resume->positionObjArray as $ppos) { ?>
        <li><a href="#employer<?php print($ppos->kkey) ?>"><?php print($ppos->company) ?></a></li> 
        <?php
      } ?>
    </ul>
  </div> 
  <div data-role="footer">
    <h4>Page Footer</h4>
  </div> 
</div> 
<?php
foreach ($resume->positionObjArray as $ppos) { ?>
  <div data-role="page" id="employer<?php print($ppos->kkey) ?>" data-theme="a">
    <div data-role="header">
      <h1><?php print($ppos->company) ?> - Greg Sandell</h1>
    </div>
    <div data-role="content"> 
      <p>
        <?php print($ppos->company) ?>
        <br/>Location: <?php print($ppos->location) ?><br/>
        Basis: <?php print($ppos->basis) ?><br/>
        Dates: <?php print($ppos->dates) ?><br/>
        Title:  <?php print($ppos->ttitle) ?><br/>
      </p>
      <ul> 
        <?php
        foreach ($ppos->listTextArray as $line) { ?>
          <li ><?php print($line) ?></li> 
          <?php
        } ?>
      </ul>
    </div>
    <div data-role="footer" class="ui-bar">
      <a href="index.php" data-role="button" data-icon="home">Home</a>
      <a href="#toc" data-role="button" data-icon="arrow-l">Resume</a>
    </div>
  </div>
<?php
} ?>
<div data-role="page" id="skillsToc" data-theme="a">
  <div data-role="header">
    <h1>Technology Portfolio - Greg Sandell</h1>
  </div>
  <div data-role="content"> 
    <p>These links list languages, software and tools in which I have extensive expertise.  I've broken them down into several categories:</p>
    <ul data-role="listview" data-inset="true"> 
      <?php
      foreach ($skills->categoryObjArray as $skillCategory) { ?>
        <li><a href="#skill<?php print($skillCategory->kkey) ?>"><?php print($skillCategory->category) ?></a></li> 
        <?php
      } ?>
    </ul>
  </div> 
  <div data-role="footer">
    <h4>Page Footer</h4>
  </div> 
</div> 
<?php
foreach ($skills->categoryObjArray as $skillCategory) { ?>
  <div data-role="page" id="skill<?php print($skillCategory->kkey) ?>" data-theme="a">
    <div data-role="header">
      <h1><?php print($skillCategory->category) ?> - Greg Sandell</h1>
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
    <div data-role="footer" class="ui-bar">
      <a href="index.php" data-role="button" data-icon="home">Home</a>
      <a href="#toc" data-role="button" data-icon="arrow-l">Resume</a>
    </div>
  </div> 
  <?php
}
?>

<?php

if ($page == "foo") { ?>
  <tr>
    <td class="sectHead" colspan="2">
      Employment History
    </td>
  </tr> <?php
  foreach ($resume->positionObjArray as $ppos) { ?>
    <tr>
      <td style="border: 1px solid black"> 
        <table border="0">
          <tr>
            <td width="372">
              <span class="company"><?php print($ppos->company) ?> </span>
              <span class="city">(<?php print($ppos->location) ?>)</span>
              <br/>
              <span class="basisLabel">Basis: </span>
              <span class="basis"><?php print($ppos->basis) ?></span>
            </td>
            <td class="timeTitle" width="128" >
              <?php print($ppos->dates) ?>
              <br/><?php print($ppos->ttitle) ?>
            </td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td colspan="2">
        <ul> 
          <?php
          foreach ($ppos->listTextArray as $line) { ?>
            <li><?php print($line) ?></li> 
            <?php
          } ?>
        </ul>
      </td>
    </tr> <?php
  }  ?>
</table>  <?php
}
?>
</body>
</html>
