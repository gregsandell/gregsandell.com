<?php
	$_cpath = $_SERVER['DOCUMENT_ROOT'];
	$g_section = "blogs";
	$linksTitle = "Other Site Links";
	$innerPhp = "";
	$wikiIcon = "<img src='/image/wikipediaExternalPage.png' border='0' alt='External Page' />";
	$mainCopy = "<div>
							<table>
							<tr>
							<td><a href='http://gregsandell.blogspot.com' rel='ext'><img src='/image/blogspotIcon.jpg' border='0'/></a></td>
							<td style='padding-left: 10px;' valign='top'><p>My blog 'Sealed Tuna Sandwich': Postings about technology, software development, music, Chicago, politics, and interesting stuff on the web.</p>
							<p><a href='http://gregsandell.blogspot.com' rel='ext'>Go to blog&nbsp;" . $wikiIcon . "</a></p>
							</td>
							</tr>
							<tr>
							<td colspan='2' style='font-weight: bold'>Technology-related posts</td>
							</tr>
							<tr>
							<td colspan='2'>
								<ul>
								<li>Maven2 Tutorial: <a href='http://gregsandell.blogspot.com/2007/07/maven2-introduction-part-1-coordinate.html' rel='ext'>Part 1&nbsp;" . $wikiIcon . "</a></li>
								<li><a href='http://gregsandell.blogspot.com/2006/10/s-corps-for-software-contracters.html' rel='ext'>S-corps for Software Contracters&nbsp;" . $wikiIcon . "</a></li>
								<li><a href='http://gregsandell.blogspot.com/2007/10/sharc-timbre-dataset-v-20-xml-format.html' rel='ext'>The SHARC Timbre Dataset v. 2.0: XML Format&nbsp;" . $wikiIcon . "</a></li>
								<li><a href='http://gregsandell.blogspot.com/2007/08/idea-with-tomcat-6-integration.html' rel='ext'>IDEA with Tomcat 6 Integration&nbsp;" . $wikiIcon . "</a></li>
								<li><a href='http://gregsandell.blogspot.com/2007/07/vista-guinea-pig.html' rel='ext'>Vista Guinea Pig&nbsp;" . $wikiIcon . "</a></li>
								<li><a href='http://gregsandell.blogspot.com/2007/11/zune-surprisingly-enjoyable.html' rel='ext'>The Zune, Surprisingly Enjoyable&nbsp;" . $wikiIcon . "</a></li>
								<li><a href='http://gregsandell.blogspot.com/2007/08/syncing-handheld-with-vista.html' rel='ext'>Syncing a Handheld with Vista&nbsp;" . $wikiIcon . "</a></li>
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
