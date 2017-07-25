<?php
    $_cpath = $_SERVER['DOCUMENT_ROOT'];
	include($_cpath . "/code/objGitRepos.php");
	$code = new Code();
	$code->loadData();

?>
<!DOCTYPE html> 
<html> 
  <head> 
  <title>Greg Sandell</title> 
  <link rel="stylesheet" type="text/css" href="../css/blog.css" />
	<?php  include("inclHead.php");  ?>
</head>

<body>
<div data-role="page" id="code" data-theme="a">
  <div data-role="header">
    <a href="pageLinks.php" data-icon="back" >Back</a>
    <h1>Code - Greg Sandell</h1>
  </div>
  <div data-role="content"> 
    <h1>Code</h1>
<dl>
<?php
    foreach ($code->repos as $repo) { ?>
        <dt>
            <a style="color: lightblue" href="<?php print($code->gitUrlFront) ?>/<?php print($repo->repoName) ?>" rel="ext"><?php print($repo->title) ?></a>
        </dt>
        <dd><?php print($repo->desc) ?></dd>
        <br> <?php
    }
?>
</dl>

  <?php include("inclFooter.php"); ?>
</div> 
</body>
</html>
