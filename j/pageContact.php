<?php
ini_set('display_errors',1);
error_reporting(E_ALL|E_STRICT);

  $_cpath = $_SERVER['DOCUMENT_ROOT'];
?>
<!DOCTYPE html> 
<html>
<head>
  <title>GregSandell.com Mobile</title> 
  <?php include("inclHead.php"); ?>
</head>
<body>
<div data-role="page" id="contact" data-theme="a">
  <div data-role="header">
    <h1>About - Greg Sandell</h1>
  </div>
  <div data-role="content"> 
    <table border="0"><tr><th>Phone:</th><td>773-548-5547</td></tr>
    <tr><th>Email:</th><td>greg &lt;dot&gt; sandell @ gmail.com</td></tr>
    <tr><th>Current Engagement:</th><td>Contracting at Sears Holding Corporation</td></tr>
    </table>
    <div data-role="collapsible" data-collapsed="true">
      <h1>Elevator Speech</h1>
      <p>
        Clients value me for my ability to provide full-life-cycle Java solutions as well the ability to write well-engineered User Interfaces.  
        To meet the demand for web sites with a more high-touch, Web 2.0 user experience, many companies are adding Ajax and shifting more
  of the data management on the browser in the form of "thick clients."  
  By writing both server, database and front-end components, I am able to help companies with their transition.
      </p>
      <p>
        I also add value to teams with my depth in Unix, Configuration Management, Agile, Open Source software, and presentation skills.  
  Recently I added Mobile development to my portfolio as well.
      </p>
    </div>
    <div data-role="collapsible" data-collapsed="true">
      <h1>Bio</h1>
      <p>
        Software development is a 2nd career for me.  
  After studying piano during college in my home state of California, I moved to the east coast for graduate studies in music.
  A lucky opportunity led to me taking a computer programming course, which shifted my interests from musical performance to 
  music research, audio technology and hearing science.
  This led eventually to a PhD, and then a series of post-doctoral fellow positions in Berkely, England and Chicago.
  Being in university environments gave me exposure to many different technologies and the opportunity to takes classes in
  assembler, operating systems, AI programming, machine learning and Digital Signal Processing.  
      </p>
      <p>
  During this time the World Wide Web came about, matured, and became big business. 
  After finding publishing papers and taking a junior professor position not the kind of future I wanted, I decided
  to jump ship and entered into programming as a full time profession in Chicago in 1999.  
  At first I did "web boutique" programming, and by adding databases and Java to my technology portfolio, I was able
  to take on more demanding roles.
      </p>
    </div>
    <div data-role="collapsible" data-collapsed="true">
      <h1>About this Mobile Site</h1>
      <p>
        This site is written in <a href="http://jquerymobile.com" data-ajax="false">jQuery Mobile</a> 
        and <a href="http://www.php.net" rel="external">PHP</a> running on <a href="http://httpd.apache.org" rel="external">Apache HTTPD</a>.  All the programming is by me, of course.
      </p>
      <p>
        I have a common API between this site and the <a href="/d" data-ajax="false">desktop (non-Mobile) version</a> of the site.  For example, the <a href="http://gregsandell.com/pageResume.php" data-ajax="false">Resume section</a> of the desktop site and the <a href="pageEmployerList.php">Clients</a> and <a href="pageSkillsList.php">Technology</a> sections of the Mobile site draw from a single PHP data structure.
      </p>
      <p>Public APIs used include <a href="http://simplepie.org" rel="external">SimplePie</a> for RSS feed parsing and blog retrieval.</p>
      <p>
        <a href="http://jquerymobile.com" rel="external"><img src="images/jqueryMobile.jpg" border="0"></a>
        <a href="http://simplepie.org" rel="external"><img src="images/logo_simplepie_horizontal.png" border="0"></a>
        <a href="http://www.php.net" rel="external"><img src="images/php.gif" border="0"></a>
        <a href="http://httpd.apache.org" rel="external"><img src="images/apache.png" border="0"></a>
        <a href="http://docs.google.com" rel="external"><img src="images/googleDocs.jpeg" border="0"></a>
      </p>
    </div>
  </div>
  <?php include("inclFooter.php"); ?>
</div>
</body>
</html>
