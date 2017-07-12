<?php
class Music {
	var $photoAlbum;
	var $imgPath = "/music/resources/images/playingMusic/";

	function loadData() {
		$this->photoAlbum = new PhotoAlbum($this->imgPath);
		$this->photoAlbum->addPhoto("01a_daMuseum.png",
		    "Gig for a museum opening night", 800, 537);
		$this->photoAlbum->addPhoto("01b_flourocarbons4.JPG",
		    "Taking a solo on a Mini-Moog", 800, 557);
		$this->photoAlbum->addPhoto("01c_july4EvanstonAccordion.JPG",
		    "Playing Irish music", 586, 800);
		$this->photoAlbum->addPhoto("01d_gregTonyFireplaceJan1970.jpg",
		    "My first bass guitar, a starburst Harmony H-22.  I should have held onto it, it's totally hipster and worth big bucks now.", 800, 734);
		$this->photoAlbum->addPhoto("02_tonyGregComposite.PNG",
		    "My brother and I still play music together today", 800, 734);
		$this->photoAlbum->addPhoto("03_dulcimerLaguna.JPG",
		    "Playing dulcimer at a Laguna Beach arts festival", 800, 794);
		$this->photoAlbum->addPhoto("04_gregBedroomDec1974.jpg",
		    "Playing along with a recording of a Bach Brandenburg Concerto", 800, 727);
		$this->photoAlbum->addPhoto("04a_laVerneLive.jpg",
		    "Playing a college cafe gig", 800, 590);
		$this->photoAlbum->addPhoto("05_wavesGarage868.JPG",
		    "Rehearsing with jazz fusion ensemble Waves", 775, 800);
		$this->photoAlbum->addPhoto("06_waveGarage868_2.JPG",
		    "Yes, I can say I played in a garage band", 800, 800);
		$this->photoAlbum->addPhoto("07_wavesAmnesty1.jpg",
		    "Taking bows after a benefit for Amnesty International", 800, 795);
		$this->photoAlbum->addPhoto("08_wavesGregDblBass.jpg",
		    "Playing a concert with jazz fusion ensemble Waves", 520, 800);
		$this->photoAlbum->addPhoto("09_wavesGregDion1.jpg",
		    "Playing a concert with jazz fusion ensemble Waves", 800, 596);
		$this->photoAlbum->addPhoto("10_wavesGriswolds.JPG",
		    "Playing a concert with 11-piece jazz fusion ensemble Waves", 800, 796);
		$this->photoAlbum->addPhoto("10a_sfConservatory.JPG",
		    "At the San Francisco Conservatory of Music", 800, 620);
		$this->photoAlbum->addPhoto("11_concerto5.JPG",
		    "Playing Beethoven's Emperor Concerto with a symphony orchestra", 525, 800);
		$this->photoAlbum->addPhoto("12_concerto5.JPG",
		    "Taking bows after Beethoven's Emperor Concerto", 793, 800);
		$this->photoAlbum->addPhoto("12a_Angwin.JPG",
		    "Keeping time with a metronome", 620, 800);
		$this->photoAlbum->addPhoto("13_flourocarbons2.JPG",
		    "Playing a concert with jazz fusion ensemble Appollonicon", 800, 556);
		$this->photoAlbum->addPhoto("15_cornell.JPG",
		    "Jamming on some Irish music", 800, 549);
		$this->photoAlbum->addPhoto("16_overland3.JPG",
		    "Promotional photo for folk music band Overland", 800, 549);
		$this->photoAlbum->addPhoto("16_overland3.JPG",
		    "Folk music band Overland playing at a summer camp", 800, 550);
		$this->photoAlbum->addPhoto("17_overland4.JPG",
		    "Promotional photo for folk music band Overland", 800, 595);
		$this->photoAlbum->addPhoto("19_gregLaurieDec1997_11.jpg",
		    "Promotional photo for CD Danse ce Soir, with obscure photobomb", 532, 800);
		$this->photoAlbum->addPhoto("19a_zosie1999recital1.jpg",
		    "Just before accompanying a violin recital", 800, 557);
		$this->photoAlbum->addPhoto("20_andrewGregPiano5.png",
		    "Having fun playing piano four hands", 800, 538);
		$this->photoAlbum->addPhoto("21_madisonApr2000_06.jpg",
		    "Playing a dance in Madison, Wisconsin", 800, 688);
		$this->photoAlbum->addPhoto("22_madisonApr2000_16.jpg",
		    "Playing a dance in Madison, Wisconsin", 553, 800);
		$this->photoAlbum->addPhoto("23_danseCD_GregLaurie2.jpg",
		    "Recording CD Danse ce Soir", 800, 488);
		$this->photoAlbum->addPhoto("24_danseCD_mixingBoard.jpg",
		    "Mixing CD Danse ce Soir", 800, 511);
		$this->photoAlbum->addPhoto("24_danseCD_mixingBoard.jpg",
		    "Playing a dance with band Woodchoppers Unreal", 800, 540);
		$this->photoAlbum->addPhoto("26_withZosie.png",
		    "Playing a gig with my daughter Zosie", 800, 531);
		$this->photoAlbum->addPhoto("28_wineWalk2017_7.JPG",
		    "Playing a gig with band Junction 605", 800, 600);
	}
}

class PhotoAlbum {
	var $photos = array();
	var $imgPath;

	public function PhotoAlbum($_imgPath) {
		$this->imgPath = $_imgPath;
	}

	function addPhoto($image, $description, $width, $height) {

		$photo = new Photo($this->imgPath . $image, $description, $width, $height);
		array_push($this->photos, $photo);
	}
}
class Photo {
	var $image;
	var $description;
	var $width;
	var $height;
	function Photo($image, $description, $width, $height) {
		$this->image = $image;
		$this->description = $description;
		$this->width = $width;
		$this->height = $height;
	}
}
?>
