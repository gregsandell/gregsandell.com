<!DOCTYPE html> 
<html> 
  <head> 
  <title>Greg Sandell</title> 

  <style type="text/css" media="screen, projection">
    dl {
      padding-bottom: 0px; 
      margin-bottom: 0px;
    }
    dt {
      padding-bottom: 0px; 
      margin-bottom: 0px; 
      font-size: 18px;
    }
  </style>
  <?php include("inclHead.php"); ?>
  <!-- Accordeon stuff -->
  <link href="jquery/samcroft/accordion.css" rel="stylesheet">
  <script src="jquery/samcroft/jquery.accordion.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $('dl').accordion();
    });
  </script>
</head> 
<body> 

<div data-role="page" id="home" data-theme="a">
  <div data-role="header">
    <a href="pageLinks.php" data-icon="back" >Back</a>
    <h1>SHARC - Greg Sandell</h1>
  </div>
  <div data-role="content"> 
    <a href="./popupSharcInfo.php" data-role="button" data-inline="true" data-rel="dialog" data-icon="info" data-transition="pop">What is SHARC?</a> 
    <h2>SHARC data includes:</h2>
    <dl>
      <dt><a href="#">Woodwinds</a></dt>
      <dd>
        <table border="0" cellpadding="0" cellspacing="5">
          <tr> <td>Piccolo</td> <td>Flute</td> </tr>
          <tr> <td>Alto Flute</td> <td>Bass flute</td> </tr>
          <tr> <td>Oboe</td> <td>English horn</td> </tr>
          <tr> <td>Eb clarinet</td> <td>Bb clarinet</td> </tr>
          <tr> <td>Bass clarinet</td> <td>Contrabass clarinet</td> </tr>
          <tr> <td>Bassoon</td> <td>Contrabassoon</td> </tr>
        </table>
      </dd>
      <dt><a href="#">Brass</a></dt>
      <dd>
        <table border="0" cellpadding="0" cellspacing="5">
          <tr> <td>Bach trumpet</td> <td>C trumpet</td> </tr>
          <tr> <td>C trumpet muted</td> <td>French horn</td> </tr>
          <tr> <td>French horn muted</td> <td>Alto trombone</td> </tr>
          <tr> <td>Trombone</td> <td>Trombone muted</td> </tr>
          <tr> <td>Bass trombone</td> <td>Tuba</td> </tr>
        </table>
      </dd>
      <dt><a href="#">Strings</a></dt>
      <dd>
        <table border="0" cellpadding="0" cellspacing="5">
          <tr> <td>Violin bowed vibrato</td> <td>Violin bowed martele</td> </tr>
          <tr> <td>Violin bowed muted vibrato</td> <td>Violin pizzicato</td> </tr>
          <tr> <td>Violin Ensemble</td> <td>Viola bowed vibrato</td> </tr>
          <tr> <td>Viola bowed martele</td> <td>Viola bowed muted vibrato</td> </tr>
          <tr> <td>Viola pizzicato</td> <td>Cello bowed vibrato</td> </tr>
          <tr> <td>Cello bowed martele</td> <td>Cello muted bowed vibrato</td> </tr>
          <tr> <td>Cello pizzicato</td> <td>Contrabass</td> </tr>
          <tr> <td>Contrabass bowed martele</td> <td>Contrabass bowed muted</td> </tr>
          <tr> <td colspan="2">Contrabass pizzcato</td> </tr>
        </table>
      </dd>
    </dl>
    <h2>More Information</h2>
    <ul data-role="listview" data-inset="true">
      <li><a href="/portfolio/publications/1991-10-01_library_ICMC.pdf" rel="external">Technical Whitepaper</a></li>
      <li><a href="./pageBlog.php#http://gregsandell.blogspot.com/2007/10/sharc-timbre-dataset-v-20-xml-format.html" 
        data-ajax="false" data-transition="slide" data-direction="forward">Blog Article</a></li>
      <li><a href="http://www.timbre.ws/sharc" rel="external">Official SHARC website</a></li>
      <li><a href="http://www.timbre.ws/sharc/service" rel="external">SHARC web services</a></li>
    </ul>
  </div>
  <div data-role="footer">
    <h4>Page Footer</h4>
  </div>
</div>
</body>
</html>
