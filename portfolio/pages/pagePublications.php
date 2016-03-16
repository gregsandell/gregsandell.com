<?php
	$_cpath = $_SERVER['DOCUMENT_ROOT'];
	$g_section = '';   /* don't highlight any tab */
	$linksTitle = 'Highlighted Articles';
	$g_sidebarKey = "pagePublications";
    $g_slideshowKey = "";
	$innerPhp = "";
	$mainCopy = "
				<h1>Publications</h1>
<p><p>Prior to becoming a professional software developer, I was a graduate student and then 
academic researcher in
various disciplines relating to music and human hearing: auditory grouping, 
Digital Signal Processing for music synthesis, acoustics of musical instruments, and orchestration.
</p>
<p>Want to see my
<a href='/portfolio/portfolioPopup.php?url=http://classic-web.archive.org/web/19990909140857re_/sparky.parmly.luc.edu/sandell' TARGET=_BLANK>1995 Home Page</a>
from those days?  (Courtesy of the <a href='/portfolio/portfolioPopup.php?url=http://wayback.archive.org/web/' TARGET=_BLANK>Internet Archive Wayback Machine</a>)
</p>
<dl>
<dt>Links to Peer Review Articles</dt>
<dd><b>Music Perception</b>: 
<a href='/portfolio/portfolioPopup.php?url=/portfolio/publications/1995-01-01_roles_MP.pdf' TARGET=_BLANK>1995</a>,
<a href='/portfolio/portfolioPopup.php?url=/portfolio/publications/1987-01-01_perception_MP.pdf' TARGET=_BLANK>1987</a><br/>
<b>Journal of the Audio Engineering Society</b>: 
<a  href='/portfolio/portfolioPopup.php?url=/portfolio/publications/1995-12-01_perceptual_JAES.pdf' TARGET=_BLANK>1995</a><br/>
<b>Journal of the Acoustical Society America</b>:  
<a href='/portfolio/portfolioPopup.php?url=/portfolio/publications/1995-05-01_absence_JASA.pdf' TARGET=_BLANK>1995</a>,
<a href='/portfolio/portfolioPopup.php?url=/portfolio/publications/1994-05-01_effect_JASA.pdf' TARGET=_BLANK>1994</a>
</dd>
<dt>Dissertation</dt>
<dd>Title:  
'Concurrent Timbres in Orchestration: a Perceptual Study of Factors Determining 'blend'<br/>
PhD Dissertation, Northwestern University, 1991.  Online abstract 
<a href='/portfolio/portfolioPopup.php?url=http://adsabs.harvard.edu/abs/1991PhDT.......313S' TARGET=_BLANK>here</a>.
PDF <a href='/portfolio/portfolioPopup.php?url=/portfolio/publications/1991-12-01_concurrent_diss.pdf' TARGET=_BLANK>here</a>.</dd>
<dt>Links to Articles in Conference Proceedings</dt>

<dd><b>Acoustical Society of America</b>:  
<a href='/portfolio/portfolioPopup.php?url=/portfolio/publications/1998-06-20_macrotimbre_ASA.pdf' TARGET=_BLANK>1998</a>,
<a href='/portfolio/portfolioPopup.php?url=/portfolio/publications/1996-12-04_recognition_ASA.pdf' TARGET=_BLANK>1996a</a>,
<a href='/portfolio/portfolioPopup.php?url=/portfolio/publications/1996-12-05_identifying_ASA.pdf' TARGET=_BLANK>1996b</a>,
<a href='/portfolio/portfolioPopup.php?url=/portfolio/publications/1994-06-09_effect_ASA.pdf' TARGET=_BLANK>1994a</a>,
<a href='/portfolio/portfolioPopup.php?url=/portfolio/publications/1994-06-09_analysis_ASA.pdf' TARGET=_BLANK>1994b</a>,
<a href='/portfolio/portfolioPopup.php?url=/portfolio/publications/1989-11-29_effect_ASA.pdf' TARGET=_BLANK>1989</a>
<br/>
<b>International Computer Music Conference</b>: 
<a href='/portfolio/portfolioPopup.php?url=/portfolio/publications/1992-10-14_prototyping_ICMC.pdf' TARGET=_BLANK>1992</a>,
<a href='/portfolio/portfolioPopup.php?url=/portfolio/publications/1991-10-01_library_ICMC.pdf' TARGET=_BLANK>1991</a>,
<a href='/portfolio/portfolioPopup.php?url=/portfolio/publications/1989-01-01_perception_ICMC.pdf' TARGET=_BLANK>1989</a><br/>
<b>Society for Music Perception &amp; Cognition</b>:  
<a href='/portfolio/portfolioPopup.php?url=/portfolio/publications/1997-06-07_perceptual_ESCOM.pdf' TARGET=_BLANK>1997a</a>,
<a  href='/portfolio/portfolioPopup.php?url=/portfolio/publications/1997-07-31_perceptual_SMPC.pdf' TARGET=_BLANK>1997b</a>,
<a href='/portfolio/portfolioPopup.php?url=/portfolio/publications/1996-08-11_sharc_ICMPC.pdf' TARGET=_BLANK>1996</a>,
<a href='/portfolio/portfolioPopup.php?url=/portfolio/publications/1995-06-22_grouping_SMPC.pdf' TARGET=_BLANK>1995a</a>,
<a href='/portfolio/portfolioPopup.php?url=/portfolio/publications/1995-06-22_perceptual_SMPC.pdf' TARGET=_BLANK>1995b</a>,
<a href='/portfolio/portfolioPopup.php?url=/portfolio/publications/1992-02-22_factors_ICMPC.pdf' TARGET=_BLANK>1992</a>
<br/>
<b>Society for Music Theory</b>:  
<a href='/portfolio/portfolioPopup.php?url=/portfolio/publications/1989-10-26_timbre_SMT.pdf' TARGET=_BLANK>1989</a></dd>
<dt>Links to Book Reviews</dt>
<dd><b>Music Perception</b>:  
<a href='/portfolio/portfolioPopup.php?url=/portfolio/publications/1996-06-01_auditory_MP.pdf' TARGET=_BLANK>1996</a><br/>
<b>Music Theory Spectrum</b>:  
<a href='/portfolio/portfolioPopup.php?url=/portfolio/publications/1990-09-01_soundColor_MTS.pdf' TARGET=_BLANK>1990</a></dd>
</dl>


	";

include($_cpath . '/templateMain.php');

?>
