<?php
	include("SessionObj.php");
	$g_session = new Session();
	$user = $g_session->getUser();
	$site = isset($_REQUEST["site"]) ? $_REQUEST["site"] : "";
	$pdf = isset($_REQUEST["pdf"]) ? $_REQUEST["pdf"] : "";
	$doc = isset($_REQUEST["doc"]) ? $_REQUEST["doc"] : "";
	$slideshow = isset($_REQUEST["slideshow"]) ? $_REQUEST["slideshow"] : "";
	if ($site == "" && ($pdf != "" || $slideshow != "" || $doc != "")) {
		if ($g_session->notAuthenticated()) {
			exit("You have attempted to reach an item in Greg Sandell's private portfolio without logging in.  To request access, please email <a href='mailto:greg.sandell@gmail.com'>Greg Sandell</a>. </br/><br/>Click <a href='http://www.gregsandell.com'>here</a> to go to Greg Sandell's website.");
		}
	}
	$url = "http://www.gregsandell.com"; /* Just in case nothing matches */
	$color = "white";  // default background color
	if ($site != "") {
		$key = "site '" . $site . "'";
	}
	switch($site) {
		case "ies":
			$url = "http://www.IESAbroad.org";
			break;
		case "maytag":
			$url = "http://www.Maytag.com";
			break;
		case "watts":
			$url = "http://www.EdwinWatts.com";
			break;
		case "xb":
			$url = "http://www.xb.com";
			break;
		case "whitney":
			$url = "http://www.gregsandell.com/portfolio/samples/bwhitney";
			break;
		case "spectrum":
			$url = "http://www.gregsandell.com/portfolio/samples/javahearing/spectrum.html";
			break;
		case "abnamro":
			$url = "http://www.maxtrad.com";
			break;
	}
	if ($pdf != "") {
		$url = "http://www.gregsandell.com/portfolio/" . $pdf;
		$key = "pdf '" . $pdf . "'";
	}
	if ($doc != "") {
		$url = "http://www.gregsandell.com/portfolio/" . $doc;
		$key = "document '" . $doc . "'";
	}
	if ($slideshow != "") {
		$key = "slideshow '" . $slideshow . "'";
	}
	switch ($slideshow) {
		case "iesStyleGuide":
			$url = "http://www.gregsandell.com/portfolio/slideshow.php?sn=1&ms=40&fm=gif&dr=/portfolio/ies/images/styleGuide/iesStyleGuide";
			$color = "black";
			break;
		case "maytagStyleGuide":
			$url = "http://www.gregsandell.com/portfolio/slideshow.php?sn=1&ms=23&fm=gif&dr=/portfolio/maytag/images/maytagStyleGuide/maytagStyleGuide";
			$color = "black";
			break;
		case "iesJira":
			$url = "http://www.gregsandell.com/portfolio/slideshow.php?sn=1&ms=5&fm=jpg&dr=/portfolio/ies/images/jira/jira";
			$color = "black";
			break;
		case "iesNetworkConfig":
			$url = "http://www.gregsandell.com/portfolio/slideshow.php?sn=1&ms=4&fm=gif&dr=/portfolio/ies/images/networkConfig/networkConfig";
			$color = "black";
			break;
		case "abnAmroAdmin":
			$url = "http://www.gregsandell.com/portfolio/slideshow.php?sn=1&ms=7&fm=gif&dr=/portfolio/abnAmro/images/abnAmroAdmin/abnAmroAdmin";
			$color = "black";
			break;
		case "abnAmroImport":
			$url = "http://www.gregsandell.com/portfolio/slideshow.php?sn=1&ms=11&fm=gif&dr=/portfolio/abnAmro/images/abnAmroImport/abnAmroImport";
			$color = "black";
			break;
		case "amexMyProfile":
			$url = "http://www.gregsandell.com/portfolio/slideshow.php?sn=1&ms=74&fm=png&dr=/portfolio/amex/images/mypSlideshow/myp";
			$color = "black";
			break;
		case "usafScreens":
			$url = "http://www.gregsandell.com/portfolio/slideshow.php?sn=1&ms=4&fm=gif&dr=/portfolio/usaf/images/AFportal/AFPortal";
			$color = "black";
			break;
		case "ssdarScreens":
			$url = "http://www.gregsandell.com/portfolio/slideshow.php?sn=1&ms=23&fm=gif&dr=/portfolio/usaf/images/SSDARscreens/SSDAR";
			$color = "black";
			break;
	}
	$g_session->sendPageviewEmail($key);

?>
<frameset rows="35,*" frameborder="no" border="0" >
	<frame src="closePopup.php?c=<?php print($color) ?>" scrolling="no" frameborder="no" noresize />	
	<frame src="<?php print($url) ?>" frameborder="no" noresize />	
</frameset>
