<?php
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
    <h1>Links</h1>
    <p>
      Other resources and material.
    </p>
    <div data-role="collapsible" data-collapsed="true">
      <h1>My Blog</h1>
      <p>
        I have a blog called <i>Sealed Tuna Sandwich</i> where I write on both technical
        and non-technical things.
      </p>
      <a href="pageBlogList.php" data-role="button" data-inline="true" data-icon="arrow-r" data-transition="slide" data-direction="forward">Sealed Tuna Sandwich</a>
    </div>
    <div data-role="collapsible" data-collapsed="true">
      <h1>Code</h1>
      <p>
        Code samples and my personal projects hosted on GitHub.
      </p>
      <a href="pageCode.php" data-role="button" data-inline="true" data-icon="arrow-r" data-transition="slide" data-direction="forward">Code Samples</a>
    </div>
    <div data-role="collapsible" data-collapsed="true">
      <h1>Talks</h1>
      <p>
        Talks and Presentations I have given on various technology and software development topics.
      </p>
      <a href="pageTalks.php" data-role="button" data-inline="true" data-icon="arrow-r" data-transition="slide" data-direction="forward">Presentations</a>
    </div>
    <div data-role="collapsible" data-collapsed="true">
      <h1>Stuff I'm Reading</h1>
      <p>
        Recent links I liked and marked as 'Shared' in my Google RSS Reader.
      </p>
      <a href="pageRSSSharedList.php" data-role="button" data-inline="true" data-icon="arrow-r" data-transition="slide" data-direction="forward">Shared Links</a>
    </div>
    <div data-role="collapsible" data-collapsed="true">
      <h1>SHARC</h1>
      <p>
        A research project in musical acoustics.
      </p>
      <a href="pageSharc.php" data-role="button" data-inline="true" data-icon="arrow-r" data-transition="slide" data-direction="forward">SHARC Acoustics Project</a>
    </div>
    <div data-role="collapsible" data-collapsed="true">
      <h1>Publications</h1>
      <p>
        Prior to becoming a professional software developer, I was a graduate student and then academic researcher in
various disciplines relating to music and human hearing: auditory grouping, 
Digital Signal Processing for music synthesis, acoustics of musical instruments, and orchestration.  (See <a href="pageContact.php">my bio</a> for more detail.)
      </p>
      <p>The papers I wrote during that time can be viewed at the link below.  </p>
      <a href="pagePublications.php" data-role="button" data-inline="true" data-icon="arrow-r" data-transition="slide" data-direction="forward">Publications and other papers</a>
    </div>
  </div> 
  <?php include("inclFooter.php"); ?>
</div> 
</body>
</html>
