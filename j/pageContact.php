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
    <table border="0"><tr><th>Phone:</th><td><a style="color: #fff; text-decoration: none" href="tel:2134790790">213-479-0790</td></tr>
    <tr><th>Email:</th><td>greg &lt;dot&gt; sandell @ gmail.com</td></tr>
    <tr><th>Current Engagement:</th><td>Ten-X</td></tr>
    </table>

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
      <a href="http://jquerymobile.com" rel="external"><img src="../image/aboutLogos/jqueryMobile.jpg" border="0"></a>
      <a href="http://simplepie.org" rel="external"><img src="../image/aboutLogos/logo_simplepie_horizontal.png" border="0"></a>
      <a href="http://www.php.net" rel="external"><img src="../image/aboutLogos/php.gif" border="0"></a>
      <a href="http://httpd.apache.org" rel="external"><img src="../image/aboutLogos/apache.png" border="0"></a>
      <a href="http://docs.google.com" rel="external"><img src="../image/aboutLogos/googleDocs.jpeg" border="0"></a>
    </p>

  </div>
  <?php include("inclFooter.php"); ?>
</div>
</body>
</html>
