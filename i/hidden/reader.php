<?php  
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="yes" name="apple-mobile-web-app-capable" />
<meta content="text/html; charset=iso-8859-1" http-equiv="Content-Type" />
<meta content="minimum-scale=1.0, width=device-width, maximum-scale=0.6667, user-scalable=no" name="viewport" />
<link href="iwebkit/css/style.css" rel="stylesheet" type="text/css" />
<script src="iwebkit/javascipt/functions.js" type="text/javascript"></script>
<title>Greg Sandell</title>
</head>

<body>
<div id="topbar">
  <div id="title">Shared RSS Reader Items - Greg Sandell</div>
</div>


<div id="topbar">
  <div id="leftnav">
    <!-- <a href="<?php print($pageObj->linkBackUrl) ?>"><img  src="iwebkit/images/navleft.png" /></a> -->
    &nbsp;<a href="index.php">Home</a>
  </div>
</div>


<div id="content">
  <ul class="pageitem">
<?php   
  $sharedItemsUrl = "http://www.google.com/reader/public/atom/user/04430893089087584672/state/com.google/broadcast";
  $file = file_get_contents($sharedItemsUrl);
  $xmlDoc = new SimpleXMLElement($file); 
  foreach ($xmlDoc->entry as $entry) {  
    $url = $entry->link->attributes()->href;
    ?>
    <li class="textbox"> <?php
      print("<i>" . $entry->published . "</i><br/>\n");
      print("<b><a href='" . $url . "'>" . $entry->title . "</a></b><br/><br/>\n");   ?>
    </li> <?php
     }
  ?>
      </ul>
  </div>

</body>

</html>

