<?php
	$_cpath = $_SERVER['DOCUMENT_ROOT'];
	$titleCss = "color:#000000; font-size:13px; font-family:Verdana, Arial, Helvetica, sans-serif; overflow:hidden; text-align:left;font-weight: normal;line-height: 19px;";
	include($_cpath . "/music/objMusic.php");
	$g_music = new Music();
	$g_music->loadData();

?>
<h1>Music</h1>
<p>
  I've been playing music since I was 12.  Here's a sampling of some things I've done over the years.
<p/>
<dl>
	<dt>Original Compositions</dt>
	<dd>
		<a href="https://www.youtube.com/watch?v=eRdt_8D0CoM" data-thumbnail="/music/resources/images/compositions/easterThursdayThumb.png"
			class="html5lightbox" data-group="set1" data-width="600"
			data-showplaybutton="false" data-shownavigation="false"
			data-titlecss="<?php print($titleCss) ?>" data-titleprefix="Greg Sandell - "
			data-thumbwidth="150" data-thumbheight="150"
			data-height="400" title="Variations on 'Easter Thursday' for Piano">
			<img src="/music/resources/images/compositions/easterThursdayThumb.png" style="margin-right: 10px"/></a>
		<a href="https://www.youtube.com/watch?v=jS6V7Cp28xM" data-thumbnail="/music/resources/images/compositions/studyInFifthsthumb.png"
			class="html5lightbox" data-group="set1" title="Study in Fifths for Piano"
			data-showplaybutton="false" data-shownavigation="false">
			<img src="/music/resources/images/compositions/studyInFifthsThumb.png" style="margin-right: 10px"/></a>
		<a href="https://www.youtube.com/watch?v=lQDWg72tmRc" data-thumbnail="/music/resources/images/compositions/jessesPigThumb.png"
			class="html5lightbox" data-group="set1" title="Jesse's Pig for Jazz Ensemble "
			data-showplaybutton="false" data-shownavigation="false">
			<img src="/music/resources/images/compositions/jessesPigThumb.png" style="margin-right: 10px"/></a>
		<div class="moreMusic">
			<a href="https://www.youtube.com/watch?v=j4PQu98ZkA0"
			class="html5lightbox" data-group="set1" title="Cayman Island Dream"
			data-showplaybutton="false" data-shownavigation="false">More...</a>
		</div>
		<div class="hiddenSlides">
			<a href="https://youtu.be/DyK3oSXxnSQ"
				class="html5lightbox" data-group="set1"
				title="Quartet for Violin, Clarinet, Cello and Piano"></a>
		</div>
	</dd>
	<dt>Danse ce Soir - Book and CD</dt>
	<dd>
		<a href="http://www.melbay.com/Products/98118/danse-ce-soir--fiddle-and-accordion-music-of-quebec.aspx" data-thumbnail="/music/resources/images/danseCeSoir/bookThumb.png"
			class="html5lightbox" data-group="set2" data-width="600"
			data-showplaybutton="false" data-shownavigation="false"
			data-titlecss="<?php print($titleCss) ?>" data-titleprefix="Danse ce Soir - "
			data-thumbwidth="150" data-thumbheight="150"
			data-height="400" title="Mel Bay publication of Danse ce Soir">
			<img src="/music/resources/images/danseCeSoir/bookThumb.png" style="margin-right: 10px"/></a>
		<a href="https://www.youtube.com/watch?v=4RZhzRSFPdw" data-thumbnail="/music/resources/images/danseCeSoir/danseLaurieGregThumb.png"
			class="html5lightbox" data-group="set2" title="Clog à Ti-Jules"
			data-showplaybutton="false" data-shownavigation="false">
			<img src="/music/resources/images/danseCeSoir/danseLaurieGregThumb.png" style="margin-right: 10px"/></a>
		<a href="https://www.youtube.com/watch?v=nmO8cnnQ4UI" data-thumbnail="/music/resources/images/danseCeSoir/mixingBoardThumb.jpg"
			class="html5lightbox" data-group="set2" title="Fisher's Hornpipe"
			data-showplaybutton="false" data-shownavigation="false">
			<img src="/music/resources/images/danseCeSoir/mixingBoardThumb.jpg" style="margin-right: 10px"/></a>
		<div class="moreMusic">
			<a href="https://www.youtube.com/watch?v=PGHktw6G_-g"
				class="html5lightbox" data-group="set2" title="Valse du mois d'novembre"
			data-showplaybutton="false" data-shownavigation="false">
				More...</a>
		</div>
		<div class="hiddenSlides">
			<a href="https://www.youtube.com/watch?v=zl2CONkYDl0"
				class="html5lightbox" data-group="set2"
				title="Gigue du père Mathias/Reel St-Jean/Reel Joseph"></a>
			<a href="https://www.youtube.com/watch?v=eKVAGmSOJww"
				class="html5lightbox" data-group="set2" title="6/8 en sol/Valcartier Set"></a>
			<a href="https://www.youtube.com/watch?v=w12csU0vr68"
				class="html5lightbox" data-group="set2" title="Reel des poilus/Reel du pendu"></a>
			<a href="https://www.youtube.com/watch?v=87Uyo2tSMR8"
				class="html5lightbox" data-group="set2" title="Marche au camp/Reel en la"></a>
			<a href="https://www.youtube.com/watch?v=KtBJfAs7yX4"
				class="html5lightbox" data-group="set2"
				title="Première partie du lancier/Saut du lapin/Air du Saguenay"></a>
			<a href="https://www.youtube.com/watch?v=vGA_Ki0EK54"
				class="html5lightbox" title="Le violon confesseur"></a>
			<a href="https://www.youtube.com/watch?v=MIXYs91NGH8"
				class="html5lightbox" data-group="set2"
				title="Danse du barbier/Cotillon de Baie-Ste-Catherine/La marmotteuse"></a>
			<a href="https://www.youtube.com/watch?v=vUzLc1A20h4"
				class="html5lightbox" data-group="set2" title="Valse-clog Guilmette/Valse-clog Lacroix"></a>
			<a href="https://www.youtube.com/watch?v=ch7Q_7Fs9Ew"
				class="html5lightbox" data-group="set2" title="Galope à Denis/La ronde des voyageurs"></a>
			<a href="https://www.youtube.com/watch?v=p4SaiZjKixI"
				class="html5lightbox" data-group="set2" title="6/8 en ré/Gigue des capouchons"></a>
			<a href="https://www.youtube.com/watch?v=zdXvxYsghyQ"
				class="html5lightbox" data-group="set2"
				title="Galope de la Malbaie/Eugène/Mackilmoyle's Reel"></a>
			<a href="https://www.youtube.com/watch?v=0gc8vOENWT4"
				class="html5lightbox" data-group="set2" title="La veuve du pendu"></a>
			<a href="https://www.youtube.com/watch?v=p_BMjFVsokg"
				class="html5lightbox" data-group="set2" title="Valse du vieux moulin"></a>
			<a href="https://www.youtube.com/watch?v=zYRzW_bcdKA"
				class="html5lightbox" data-group="set2" title="La grande gigue simple"></a>
		</div>
	<dd>
	<dt>Transcriptions</dt>
	<dd>
		<a href="https://youtu.be/cMLs7Aemmpk" data-thumbnail="/music/resources/images/transcriptions/zappaSofaThumbThumb.png"
			class="html5lightbox" data-group="set3" data-width="600"
			data-showplaybutton="false" data-shownavigation="false"
			data-titlecss="<?php print($titleCss) ?>"
			data-thumbwidth="150" data-thumbheight="150"
			data-height="400" title="Sofa by Frank Zappa, arranged for Piano">
			<img src="/music/resources/images/transcriptions/zappaSofaThumb.png" style="margin-right: 10px"/></a>
		<a href="https://www.youtube.com/watch?v=ykTRZgApGuc" data-thumbnail="/music/resources/images/transcriptions/mclaughlinNoReturnThumb.png"
			class="html5lightbox" data-group="set3" title="No Return by John McLaughlin"
			data-showplaybutton="false" data-shownavigation="false">
			<img src="/music/resources/images/transcriptions/mclaughlinNoReturnThumb.png" style="margin-right: 10px"/></a>
		<a href="https://www.youtube.com/watch?v=9Brpi0JvnwY" data-thumbnail="/music/resources/images/transcriptions/lizStoryBradleysDreamThumb.png"
			class="html5lightbox" data-group="set3" title="Bradley's Dream by Liz Story (transcribed by Greg Sandell)"
			data-showplaybutton="false" data-shownavigation="false">
			<img src="/music/resources/images/transcriptions/lizStoryBradleysDreamThumb.png" style="margin-right: 10px"/></a>
		<div class="moreMusic">
			<a href="https://youtu.be/54qjtWOXd4I"
			class="html5lightbox" data-group="set3" title="Yet to Be by Oregon (transcribed by Greg Sandell"
			data-showplaybutton="false" data-shownavigation="false">More...</a>
		</div>
		<div class="hiddenSlides">
			<a href="https://youtu.be/yfLd0Jyj6vI"
				class="html5lightbox" data-group="set3"
				title="U Kruševo Ogin Gori (Macedonia, trad), transcribed by Greg Sandell"></a>
			<a href="https://youtu.be/kYjJp5ys3lI"
				class="html5lightbox" data-group="set3"
				title="Uncle Remus piano intro, transcribed by Greg Sandell"></a>\
			<a href="https://youtu.be/sPyhMHonEIU"
				class="html5lightbox" data-group="set3"
				title="It Must Be a Camel by Frank Zappa, transcribed by Greg Sandell"></a>
		</div>
	</dd>
	<dt>Photos</dt> 
	<dd>
		<a href="<?php print($g_music->photoAlbum->photos[0]->image) ?>"
			data-thumbnail="/music/resources/images/playingMusic/daMuseumThumb.png" 
			class="html5lightbox" data-group="set4" 
			data-width="<?php print($g_music->photoAlbum->photos[0]->width) ?>"
			data-height="<?php print($g_music->photoAlbum->photos[0]->height) ?>" 
			data-titlecss="<?php print($titleCss) ?>"
			data-thumbwidth="150" data-thumbheight="150"
			data-showplaybutton="false" data-shownavigation="false"
			title="<?php print($g_music->photoAlbum->photos[0]->description) ?>"> 
			<img src="/music/resources/images/playingMusic/daMuseumThumb.png" style="margin-right: 10px"/></a> 
		<a href="<?php print($g_music->photoAlbum->photos[1]->image) ?>"
			data-thumbnail="/music/resources/images/playingMusic/flourocarbonsMoogThumb.png" 
			class="html5lightbox" data-group="set4" 
			data-showplaybutton="false" data-shownavigation="false"
			data-width="<?php print($g_music->photoAlbum->photos[1]->width) ?>"
			data-height="<?php print($g_music->photoAlbum->photos[1]->height) ?>" 
			title="<?php print($g_music->photoAlbum->photos[1]->description) ?>"> 
			<img src="/music/resources/images/playingMusic/flourocarbonsMoogThumb.png" style="margin-right: 10px"/></a> 
		<a href="<?php print($g_music->photoAlbum->photos[2]->image) ?>"
			data-thumbnail="/music/resources/images/playingMusic/gregAccordionThumb.png" 
			class="html5lightbox" data-group="set4" 
			data-showplaybutton="false" data-shownavigation="false"
			data-width="<?php print($g_music->photoAlbum->photos[2]->width) ?>"
			data-height="<?php print($g_music->photoAlbum->photos[2]->height) ?>" 
			title="<?php print($g_music->photoAlbum->photos[2]->description) ?>"> 
			<img src="/music/resources/images/playingMusic/gregAccordionThumb.png" style="margin-right: 10px"/></a> 
		<div class="moreMusic">
			<a href="<?php print($g_music->photoAlbum->photos[3]->image) ?>"
				data-width="<?php print($g_music->photoAlbum->photos[3]->width) ?>"
				data-height="<?php print($g_music->photoAlbum->photos[3]->height) ?>" 
				data-showplaybutton="false" data-shownavigation="false"
				class="html5lightbox" data-group="set4" title="<?php print($g_music->photoAlbum->photos[3]->description) ?>">More...</a>
		</div>
		<div class="hiddenSlides">
			<a href="<?php print($g_music->photoAlbum->photos[4]->image) ?>"
				data-width="<?php print($g_music->photoAlbum->photos[4]->width) ?>"
				data-height="<?php print($g_music->photoAlbum->photos[4]->height) ?>" 
				data-showplaybutton="false" data-shownavigation="false"
				class="html5lightbox" data-group="set4" title="<?php print($g_music->photoAlbum->photos[4]->description) ?>">More...</a> <?php
			for($i = 5; $i < sizeof($g_music->photoAlbum->photos); ++$i) {
               $photo = $g_music->photoAlbum->photos[$i]; ?>
				<a href="<?php print($photo->image) ?>"
					data-width="<?php print($photo->width) ?>"
					data-height="<?php print($photo->height) ?>" 
					data-showplaybutton="false" data-shownavigation="false"
					class="html5lightbox" data-group="set4" title="<?php print($photo->description) ?>"></a> <?php

            } ?>
		</div>
	</dd> 
</dl>


