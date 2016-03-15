<?php
	$_cpath = $_SERVER['DOCUMENT_ROOT'];
	$g_section = "blogs";
	$linksTitle = "Other Site Links";
	$innerPhp = "";
	$mainCopy = "<div>
							<table>
							<tr>
							<td><a href='http://gregsandell.blogspot.com'><img src='/image/blogspotIcon.jpg' border='0'/></a></td>
							<td style='padding-left: 10px; ' valign='top'><p>My blog 'Elevator Music': Postings about technology, software development, music, Chicago, politics, and interesting stuff on the web.</p>
							<p><a href='http://gregsandell.blogspot.com'>Go to blog</a> (or view in <a href='http://gregsandell.blogspot.com' target='_BLANK'>separate window</a>).</p>
							</td>
							</tr>
							<tr>
							<td colspan='2' style='font-weight: bold'>Technology-related posts</td>
							</tr>
							<tr>
							<td colspan='2'>
								<ul>
								<li>Maven2 Tutorial: <a href='http://gregsandell.blogspot.com/2007/07/maven2-introduction-part-1-coordinate.html'>Part 1</a></li>
								<li><a href='http://gregsandell.blogspot.com/2006/10/s-corps-for-software-contracters.html'>S-corps for Software Contracters</a></li>
								<li><a href='http://gregsandell.blogspot.com/2007/10/sharc-timbre-dataset-v-20-xml-format.html'>The SHARC Timbre Dataset v. 2.0: XML Format</a></li>
								<li><a href='http://gregsandell.blogspot.com/2007/08/idea-with-tomcat-6-integration.html'>IDEA with Tomcat 6 Integration</a></li>
								<li><a href='http://gregsandell.blogspot.com/2007/07/vista-guinea-pig.html'>Vista Guinea Pig</a></li>
								<li><a href='http://gregsandell.blogspot.com/2007/11/zune-surprisingly-enjoyable.html'>The Zune, Surprisingly Enjoyable</a></li>
								<li><a href='http://gregsandell.blogspot.com/2007/08/syncing-handheld-with-vista.html'>Syncing a Handheld with Vista</a></li>
								</ul>
							</td>
							</tr>

							</table>
			</div>
	";
include($_cpath . "/objSidebar.php");
$g_sidebarKey = "pageBlogs";
$g_slideshowKey = "logos";

include($_cpath . "/templateMain.php");

?>
