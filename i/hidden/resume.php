<?php
  $_cpath = $_SERVER['DOCUMENT_ROOT'];
  include($_cpath . "/objResume.php");
  include($_cpath . "/objSkills.php");
  include_once($_cpath . "/objGlobals.php");
  $resumeManager = new ResumeManager();
  $skillsManager = new SkillsManager();
  $globals = new GlobalsObj();
  $resume = $resumeManager->res;
  $skills = $skillsManager->skills;
  $page = $_GET['page'];
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
      <li class="menu">
        <a href="resume.php?page=<?php print($this->key) ?>">
          <span class="name"><?php print($this->title) ?></span>
          <span class="arrow"></span>
        </a>
      </li> <?php
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

  if ($page == "employer" || $page == "skill") {
      $kkey = $_GET['key'];
      $pageObj = $pageObjs[$kkey];
  }      else {
      $pageObj = $pageObjs[$page];
    }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="yes" name="apple-mobile-web-app-capable" />
<meta content="text/html; charset=iso-8859-1" http-equiv="Content-Type" />
<meta content="minimum-scale=1.0, width=device-width, maximum-scale=0.6667, user-scalable=no" name="viewport" />
<link href="iwebkit/css/style.css" rel="stylesheet" type="text/css" />
<script src="iwebkit/javascipt/functions.js" type="text/javascript"></script>
<title><?php print($pageObj->title) ?> - Greg Sandell</title>

</head>
<body>
<div id="topbar">
  <div id="leftnav">
    <!-- <a href="<?php print($pageObj->linkBackUrl) ?>"><img  src="iwebkit/images/navleft.png" /></a> -->
    &nbsp;<a href="<?php print($pageObj->linkBackUrl) ?>"><?php print($pageObj->linkBackText) ?></a>
  </div>
</div>
<?php
if ($page == "toc") { ?>
<div id="content">
  <span class="graytitle">Resume - Greg Sandell</span>
  <ul class="pageitem">  <?php 
    $pageObjs["vitals"]->makeResumeLi();
    $pageObjs["skillsToc"]->makeResumeLi();
    $pageObjs["employmentHistory"]->makeResumeLi();
    $pageObjs["downloads"]->makeResumeLi();  ?>
  </ul>
</div>
  <?php
}
if ($page == "msword" || $page == "pdf" || $page == "training" || $page == "education" || $page == 'sharc' || $page == 'pubs' || $page == 'rssShared' || $page == 'lastfm') {   
  print($pageObjs[$page]->underConstruction());
}
if ($page == "contact") { ?>
<div id="content">
  <span class="graytitle">Contact/About - Greg Sandell</span>
  <ul class="pageitem">
    <li class="textbox">
      I am a software developer in Chicago specializing in Java-based enterprise web development. 
      I am a strong believer in standards-based programming and Open Source software. 
      I have worked across a variety of vertical markets including publishing, finance, travel, advertising, music, education, scientific research, defense and insurance.
    </li>
    <li class="textbox">
      Currently I am a fulltime employee at iCrossing in Chicago, but I do freelance work as well.
    </li>
    <li class="textbox">
      <table border="0"><tr><th>Phone:</th><td>773-548-5547</td></tr>
      <tr><th>Email:</th><td>greg &lt;dot&gt; sandell @ gmail.com</td></tr></table>
    </li>
  </ul>  <?php
}
if ($page == "vitals") { ?>
<div id="content">
  <span class="graytitle">Vital Statistics - Greg Sandell</span>
  <ul class="pageitem">
    <li class="textbox">
    <p>Explore these links to learn about where I went to school, my certifications, and technology training I have attended.</p>
    </li>
  </ul>
  <ul class="pageitem"> <?php 
    $pageObjs["training"]->makeResumeLi();
    $pageObjs["education"]->makeResumeLi(); ?>
  </ul>
</div>  <?php
}
if ($page == "downloads") { ?>
<div id="content">
  <span class="graytitle">Resume Downloads - Greg Sandell</span>
  <ul class="pageitem">
    <li class="menu"> <?php 
    $pageObjs["msword"]->makeResumeLi();
    $pageObjs["pdf"]->makeResumeLi(); ?>
  </ul>
</dev> <?php
}

if ($page == "skillSummary") { ?>
<div id="content">
  <div class="graytitle">Skillset Summary - Greg Sandell</div>
  <ul class="pageitem">
    <li class="textbox"> <?php 
        foreach ($resume->skillsetSummary as $skill) { ?>
          <p><?php print($skill) ?></p> <?php
        } ?>
    </li>
  </ul>
</div> <?php
}
if ($page == "employmentHistory") { ?>
<div id="content">
  <span class="graytitle">Employment History - Greg Sandell</span>
  <ul class="pageitem">
    <li class="textbox">
    <p>These links list each of my employers and clients for whom I have worked, in chronological order (most recent first).</p>
    </li>
  </ul>
  <ul class="pageitem"> <?php
    foreach ($resume->positionObjArray as $ppos) { ?>
      <li class="menu">
        <a href="resume.php?page=employer&key=<?php print($ppos->kkey) ?>">
        <span class="name"><?php print($ppos->company) ?></span>
        <span class="arrow"></span>
        </a>
      </li> <?php
    } ?>
  </ul>
</div> <?php
}
if ($page == "employer") { 
  $kkey = $_GET['key'];
  $ppos = $resume->positionObjArray[$kkey];  ?>
<div id="content">
  <span class="graytitle"><?php print($ppos->company) ?></span>
              <br/>Location: <?php print($ppos->location) ?><br/>
              Basis: <?php print($ppos->basis) ?><br/>
              Dates: <?php print($ppos->dates) ?><br/>
              Title:  <?php print($ppos->ttitle) ?><br/>
  <ul class="pageitem" > <?php
    foreach ($ppos->listTextArray as $line) { ?>
      <li >* <?php print($line) ?></li> <?php
    } ?>
  </ul>
</div>  <?php
}
if ($page == "skillsToc") { ?>
<div id="content">
  <span class="graytitle">Technology Portfolio - Greg Sandell</span>
  <ul class="pageitem">
    <li class="textbox">
    <p>These links list languages, software and tools in which I have extensive expertise.  I've broken them down into several categories:</p>
    </li>
  </ul>
  <ul class="pageitem"> <?php
    foreach ($skills->categoryObjArray as $skillCategory) { ?>
      <li class="menu">
        <a href="resume.php?page=skill&key=<?php print($skillCategory->kkey) ?>">
        <span class="name"><?php print($skillCategory->category) ?></span>
        <span class="arrow"></span>
        </a>
      </li> <?php
    } ?>
  </ul>
</div> <?php  
}
if ($page == "skill") { 
  $kkey = $_GET['key'];
  $categoryObj = $skills->categoryObjArray[$kkey];  ?>
<div id="content">
  <span class="graytitle"><?php print($categoryObj->category) ?></span>
  <ul class="pageitem"> <?php
    foreach ($categoryObj->listTextArray as $skillItem) { ?>
      <li><?php print($skillItem) ?></li> <?php
    } ?>
  </ul>
</div> <?php  
}
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
        <ul> <?php
          foreach ($ppos->listTextArray as $line) { ?>
            <li><?php print($line) ?></li> <?php
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
