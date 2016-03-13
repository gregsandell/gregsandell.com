<?php
 error_reporting(E_ALL);
  ini_set("display_errors", 1);

$_cpath = $_SERVER['DOCUMENT_ROOT'];
class TheWire {
	var $dictionaryArray;
	function ResumeObj() {
		$this->dicionaryArray = array();
	}
	function addTerm($phraseAlphabetical, $phrase, $meaning, $example, $translation) {
		$key = $phraseAlphabetical;
		$this->dictionaryArray[$key] =
			new TermObj($key, $phrase, $meaning, $example, $translation);
		return($this->dictionaryArray[$key]);
	}
	function addTerm2($phrase, $meaning, $example, $translation) {
		$key = $phrase;
		return $this->addTerm($key, $key, $meaning, $example, $translation);
	}
	function doSort() {
		usort($this->dictionaryArray, 'cmp');
	}
}
	function cmp($tterm1, $tterm2) {
		$term1 = strtoupper($tterm1->phraseAlphabetical);
		$term2 = strtoupper($tterm2->phraseAlphabetical);
	  if($term1 ==  $term2) { return 0 ; } 
	  return ($term1 < $term2) ? -1 : 1;
	} 

class termObj {
	var $letter;
	var $phrase;
	var $phraseAlphabetical;
	var $meaning;
	var $example;
	var $translation;
	function termObj($phraseAlphabetical, $phrase, $meaning, $example, $translation) {
		$this->letter = strtoupper(substr($phraseAlphabetical, 0, 1));
		$this->phrase = $phrase;
		$this->phraseAlphabetical = $phraseAlphabetical;
		$this->meaning = $meaning;
		$this->example = $example;
		$this->translation = $translation;
	}
}
class TheWireManager {
	var $dictionary;
	var $theWire;
	function ThewireManager() {
		// print("making ResumeManager<br/>");
		$theWire = new TheWire();
		$theWire->addTerm2("fronts", "Appearances.", "Those meetings are <u>just for fronts</u>.", "Just to convince people we're legit." );
		$theWire->addTerm2("on me", "My responsibility.", "That shit <u>ain't on you or me</u>.", "Neither on of us is to blame.");
		$theWire->addTerm2("hearin'", "Empathizing with.", "<u>I'm hearin' you</u>.", "I connect with what you're saying.");
		$theWire->addTerm2("up in here", "In this place.", "<u>We up in here</u> with a Mac-ten.", "We're in here");
		$theWire->addTerm2("punkin'", "Intimidating.", "What you expect?  <u>Punkin' the man out like that</u>.", "Talking to the pan like he's a punk.");
		$theWire->addTerm2("feel", "Understand, sympathetic to your problem.", "Look, I feel you.", "I understand what you're going through.");
		$theWire->addTerm2("we free", "It's free.", "<br/>Gangsta 1: How much you askin'?<br/>Gangsta 2: We free.", "&nbsp;");
		$theWire->addTerm2("hit me", "Phone me (or page, etc.).", "Why you hit me?", "Why'd you message me?");
		$theWire->addTerm2("right", "Good.", "(Eating some chicken nuggets: Man these shits is right, yo.", "These nuggets are deliciious.");
		$theWire->addTerm2("sad ass", "Loser.", "&nbsp;", "&nbsp;");
		$theWire->addTerm2("clowny ass", "Idiot.", "&nbsp;", "&nbsp;");
		$theWire->addTerm2("believe", "Trust me.", "&nbsp;", "&nbsp;");
		$theWire->addTerm2("get behind", "Get over something.", "After stepping on a nail: I'm gonna need tetanus to get behind this bullshit.", "I'm gonna need a tetanus shot for this stupid nail.");
		$theWire->addTerm2("behind this(1)", "As a consequence of.", "Why'd you punk Sterling like you did?  I mean, he did get shot behind this shit.", "He's already taken a bullet from the situation you're hassling him for.");
		$theWire->addTerm2("behind this(2)", "As a consequence of.", "Yeah, but you be gettin' dizzy behind that shit.", "Those drugs are screwing up your judgment.");
		$theWire->addTerm2("behind", "Due to.", "Man, <u>all this shit behind this motherfucker</u>, who the fuck was he?",  "all those problems he caused");
		$theWire->addTerm2("fiendin'", "Indulging in drugs.", "He fiendin' on it.", "He's deep into drugs." );
		$theWire->addTerm2("step on", "Weaken a product by cutting it with another substance (usually in reference to heroin).", "They sellin' that stepped-on shit.<br/>OR</br>Step on that motherfucker.", "&nbsp;");
		$theWire->addTerm2("play(1)", "Work out.  Often used in the negative.", "That ain't gonna play.", "&nbsp;");
		$theWire->addTerm2("play(2)", "Job.", "That play was a bit raggedy in there though.", "&nbsp;");
		$theWire->addTerm2("play(3)", "Address the situation.", "I don't wanna play it that way.", "&nbsp;");
		$theWire->addTerm2("play(4)", "Fuck around, not be serious.  Often used in the negative", "These motherfuckers don't play, do they?", "&nbsp;");
		$theWire->addTerm2("play(5)", "Engage in battle.", "Look man, I do what I can to help y'all, but the game is out there.  And it's either play or get played.", "&nbsp;");
		$theWire->addTerm2("bleeds", "Cuts.", "Dope fiend advising cop on how to look like a user:  You need some bleeds on your hands.", "&nbsp;");
		$theWire->addTerm2("let go", "Inadvertantly reveal.", "I fucked up letting go your name.", "&nbsp;");
		$theWire->addTerm2("close", "In communication.", "Keep it close.", "&nbsp;");
		$theWire->addTerm2("feel(1)", "Understand, appreciates", "You feel me?", "&nbsp;");
		$theWire->addTerm2("feel(2)", "Understand, appreciates", "He feel for that.", "&nbsp;");
		$theWire->addTerm2("all that", "Slick, hot stuff.", "If they're all that, why are they still using pagers?", "&nbsp;");
		$theWire->addTerm2("got", "Agree to do something.", "Got you.", "&nbsp;");
		$theWire->addTerm2("get with", "Talk to, find out what's going on.", "You gotta get with Ziggy, man.", "&nbsp;");
		$theWire->addTerm2("past", "Beyond.", "It seem like we goin' past careful.", "&nbsp;");
		$theWire->addTerm2("boom", "Powerful weapon.", "Here come Omar.  He got that boom.", "&nbsp;");
		$theWire->addTerm2("dead up", "By surprise.", "Them stickup boys, they caught us dead up.", "&nbsp;");
		$theWire->addTerm2("on that", "On top of things.", "You gotta be on that.", "&nbsp;");
		$theWire->addTerm2("on it", "Know what to do.", "I'm on it.", "&nbsp;");
		$theWire->addTerm2("steady rollin'", "Living comfortably.", "That nigger that's steady rollin', that's the nigger I wanna hear about.", "&nbsp;");
		$theWire->addTerm2("I bet", "I can tell, or it was obvious.", "I bet.", "&nbsp;");
		$theWire->addTerm2("true", "Got it right.", "Stinkum true on this one.", "&nbsp;");
		$theWire->addTerm2("truth", "For sure.", "&nbsp;", "&nbsp;");
		$theWire->addTerm("the game", "game, the", "The business.", "You ain't gotta worry about him.  He's gone, <u>he's out the game</u>.", "He's not selling drugs any more");
		$theWire->addTerm2("got game", "Active &amp; successful at what they do.", "If there are some cats who got game, you put them on our team.", "&nbsp;");
		$theWire->addTerm2("falling down", "Weak, incompetent.", "Why you in here with all these falling down motherfuckers?", "&nbsp;");
		$theWire->addTerm2("gettin' like that", "Working out well.", "You ain't gettin' like that?", "Things aren't working out well for you?");
		$theWire->addTerm2("in the wind", "Missing, in hiding, AWOL.", "Omar's in the wind.", "&nbsp;");
		$theWire->addTerm2("shit", "Situation.", "The shit ain't right.", "&nbsp;");
		$theWire->addTerm2("get in this", "Not pass up.", "Better get in this.", "&nbsp;");
		$theWire->addTerm2("stay in my shit", "Be in my business, make my life hell.", "He fixin' to stay in my shit.", "&nbsp;");
		$theWire->addTerm2("parley", "(par-LAY): Have a sit down, meet for a truce.", "&nbsp;", "&nbsp;");
		$theWire->addTerm2("no doubt", "That's for sure, you can say that again.", "<br/>Guy: I can't use this shirt.  I'm XL.<br/>Girl: No doubt.", "&nbsp;");
		$theWire->addTerm2("touch", "Get in touch with.", "Ott's brother-in-law works there.  You might want to touch him.", "&nbsp;");
		$theWire->addTerm2("fucks me up", "Really bothers me.", "It fucks me up!", "&nbsp;");
		$theWire->addTerm2("be got", "Taken, stolen.", "Got to be got, homes.", "&nbsp;");
		$theWire->addTerm2("wildin'", "Thrashing, beating up.", "If you ask questions before you start wildin' on niggers, you might save some trouble.", "&nbsp;");
		$theWire->addTerm2("come back", "Retaliate.", "Gotta come back at the motherfucker for that, you know?", "&nbsp;");
		$theWire->addTerm2("carry(1)", "Carry a burden.", "That's how a man like you likes to carry.", "&nbsp;");
		$theWire->addTerm2("carry(2)", "Cover, as in to provide an excuse for, or lie for.", "I been tellin' him you sick, but you know he ain't gonna let me carry that too much longer.", "&nbsp;");
		$theWire->addTerm2("carry(3)", "Cover, as in to provide an excuse for, or lie for.", "I'll carry it.", "&nbsp;");
		$theWire->addTerm2("straight", "In an honest manner.", "What I do, I do, straight like that.", "&nbsp;");
		$theWire->addTerm2("you heard", "As a question:  did you hear?", "You heard?", "&nbsp;");
		$theWire->addTerm2("chest out", "Being a bully, authority figure.", "He wouldn't be all chest-out if we had some people up in this bitch.", "&nbsp;");
		$theWire->addTerm2("up in this bitch", "In this place.", "He wouldn't be all chest-out if we had some people up in this bitch.", "&nbsp;");
		$theWire->addTerm2("get up in", "Use, consume, take advantage of.", "You need to <u>get up in these eggrolls</u> or something.", "You need to eat your eggrolls");
		$theWire->addTerm2("profile", "Visibility, exposure to being spotted as surveillance.", "I'm gonna move the van now cuz it's got too much profile.", "&nbsp;");
		$theWire->addTerm2("pimp", "Bribe.", "Motherfucker thinks he can pimp me over a candy bar.", "&nbsp;");
		$theWire->addTerm2("shove off", "Get high.", "Yo, we shoved off this morning.", "&nbsp;");
		$theWire->addTerm2("move", "Job, scam.", "I got a little move we might could do.", "&nbsp;");
		$theWire->addTerm2("chrome", "Guns.", "Call that nigger Shamrock and <u>drive all that chrome over to the harbor</u>.", "dump all those guns in the water");
		$theWire->addTerm2("shove off", "Get high.", "Yo, we shoved off this morning.", "&nbsp;");
		$theWire->addTerm2("fuck you up", "Murder or seriously thrash you.", "Count be wrong, they fuck you up.", "&nbsp;");
		$theWire->addTerm2("buggin'", "Being weird and not with the program.", "Wallace man, he buggin'.", "&nbsp;");
		$theWire->addTerm2("up there", "Going to a place.", "You up there, Dee?  You up?", "Dee, you going to the party?");
		$theWire->addTerm2("up to me", "My responsibility.", "Hey look man, it ain't all up to me, right?", "&nbsp;");
		$theWire->addTerm2("on me", "My responsibility.", "&nbsp;", "&nbsp;");
		$theWire->addTerm2("game(1)", "Business competition or battle.", "Look man, I do what I can to help y'all, but the game is out there.  And it's either play or get played.", "&nbsp;");
		$theWire->addTerm("game(2)", "the game", "The job and everything it involves.", "All in the game, yo.", "&nbsp;");
		$theWire->addTerm2("raise up", "Pick up the phone (or beeper, etc.).", "Dee man, raise up and roll in quick.", "&nbsp;");
		$theWire->addTerm2("grind", "Sell aggressively.", "We're gonna show y'all motherfuckers how to grind out here, all right?", "&nbsp;");
		$theWire->addTerm2("most def", "I agree.", "&nbsp;", "&nbsp;");
		$theWire->addTerm2("jects", "Rejects.", "&nbsp;", "&nbsp;");
		$theWire->addTerm2("courtside", "In jail.", "&nbsp;", "&nbsp;");
		$theWire->addTerm2("get at you", "Get back to you.", "&nbsp;", "&nbsp;");
		$theWire->addTerm2("keep on that", "Keep saying that", "Why you keep on that?", "&nbsp;");
		$theWire->addTerm2("off-brand", "Inferior", "Off-brand niggers", "People not good enough to be in our crew");
		$theWire->addTerm2("weight(1)", "Responsibility.", "Take all the weight", "Take all the reponsibility");
		$theWire->addTerm2("weight(2)", "Responsibility.", "Who gonna take the weight for all that shit in the trunk of that car?", "Who's going to take the arrest and conviction for the drugs that were in the trunk?");
		$theWire->addTerm2("weight(3)", "Influence, someone's interest.", "You got money, you can buy a little weight.", "If you've got some cash, then maybe I'll take you a little more seriously.");
		$theWire->addTerm2("peoples", "Family.", "Your peoples", "&nbsp;");
		$theWire->addTerm2("low-bottom", "Low down on the company totem pole", "Low-bottom bitches", "&nbsp;");
		$theWire->addTerm2("ain't about shit", "Of a person:  Not useful, valuable", "You all ain't about shit.", "&nbsp;");
		$theWire->addTerm2("serve", "Do the job.", "&nbsp;", "&nbsp;");
		$theWire->addTerm2("beefin'", "Arguing, fighting over issues.", "Everbody beefin'.", "&nbsp;");
		$theWire->addTerm2("deep in there", "Getting along.", "I'm deep in there.", "&nbsp;");
		$theWire->addTerm2("word?", "Really?", "Word?", "&nbsp;");
		$theWire->addTerm2("how that go", "how that is", "You know how that go.", "&nbsp;");
		$theWire->addTerm2("shit", "the job", "Shit went good.",  "The job went well.");
		$theWire->addTerm2("popped off", "Of a gun:  fired", "Didn't even see her <u>till the shit popped off</u>.",  "until we started firing guns");
		$theWire->addTerm2("past that", "Aftermath", "I wanna see how it go with this Savino bullshit, <u>see how they go past that</u>.",  "see what they do in response");
		$theWire->addTerm("the shit don't hold", "shit don't hold", "The story won't stand up.", "But if the <u>shit don't hold</u>, or this motherfuckin' cop wake up and start talkin' shit, then you gotta go sky up.",  "If the story won't stand up");
		$theWire->addTerm2("talkin' shit", "Spill the beans", "But if the shit don't hold, or this motherfuckin' cop wake up and <u>start talkin' shit</u>, then you gotta go sky up.",  "Starts telling what she saw");
		$theWire->addTerm2("go sky up", "Disappear", "But if the shit don't hold, or this motherfuckin' cop wake up and start talkin' shit, then you gotta <u>go sky up</u>.",  "Get out of town, go into hiding");
		$theWire->addTerm2("catch any", "Strike", "If she's got a shred of luck, that shot she took to the neck didn't <u>catch any spine</u>.",  "hit her spinal column.");
		$theWire->addTerm2("change up", "modify a pattern or behavior", "If you see a bitch in the car, <u>change it up</u>.",  "Change your plan.");
		$theWire->addTerm2("jet", "Leave, disappear", "Tell Wee-bey to clean up the mess before he jet.",  "Take care of things before he disappears.");
		$theWire->addTerm2("nose closed", "Look the other way", "If you want me to <u>keep my nose closed to your shit</u>, you have to throw me something when I need it.",  "Keep me from busting your illegal activities.");
		$theWire->addTerm2("clean up shit", "Bust the operation.", "Somebody could get to cleanin' up shit around here.",  "Cops could come and bust our operation.");
		$theWire->addTerm2("5-0", "('Five-oh')Police.", "You can't just go around, <u>droppin' 5-0</u> like that, yo.",  "Killing cops.");
		$theWire->addTerm2("drop(1)", "Kill, murder.", "You can't just go around, <u>droppin' 5-0</u> like that, yo.",  "Killing cops.");
		$theWire->addTerm2("drop(2)", "Kill, murder.", "Looks like a couple more niggers gonna get dropped.",  "Looks like some of us are going to have to pay the price and get wiped out");
		$theWire->addTerm2("get to", "Start.", "You know how your uncle is when people <u>get to fuckin' up</u>.  He start taking that personal, man.",  "Start fucking up.");
		$theWire->addTerm2("take it personal", "Take it personally.", "You know how your uncle is when people <u>get to fuckin' up</u>  He start taking that personal, man.",  "Start fucking up.");
		$theWire->addTerm2("ain't post", "Didn't show.", "Little Man <u>ain't post for work</u>.",  "Didn't show up for work.");
		$theWire->addTerm2("come down to", "End result.", "Now it come down to this crazy shit.",  "The end result is this mess we have to deal with now.");
		$theWire->addTerm2("raggedy", "Sloppy.", "That play was a bit raggedy in there, though.",  "We made some mistakes on that job.");
		$theWire->addTerm2("cop", "Use or take.", "He was gettin' high.  <u>I seen him cop</u>.",  "I've seen him use drugs.");
		$theWire->addTerm2("correct", "In the role.", "<br/>McNulty:  He was in there changing his fucking clothes.  Can you belive that?<br/>Daniels:  <u>Boy had to get himself correct</u>.",  "He had to dress straight so cops wouldn't suspect him.");
		$theWire->addTerm2("popped", "Caught, arrested.", "You're popped with a kilo of uncut.",  "We busted you holding a kilo of uncut heroin.");
		$theWire->addTerm2("come down to it", "Everything coming together, concluding.", "You need to remind him of that, so <u>when it come down to it</u> he can stand tall.",  "When they send him to prison.");
		$theWire->addTerm2("pull your coat", "Share a secret or hot tip with you.", "You got a chance man, let me pull your coat to somethin'.",  "&nbsp;");
		$theWire->addTerm2("goin' on", "Performing at peak.", "And them Carrolton boys <u>had it goin' on</u>.",  "They were selling good heroin and making lots of money.");
		$theWire->addTerm2("out this bitch", "Over this problem.", "Man, you better go on before I lose my composure out this bitch.",  "&nbsp;");

		$theWire->doSort();
		$this->dictionary = $theWire->dictionaryArray;
	}
	function printIt() { 
		$html = "
			<html>
				<head></head>
				<body>
					<table border='1'>
						<tr>
							<th>letter</th><th>phraseAlphabetical</th><th>phrase</th><th>meaning</th><th>example</th>
						</tr>
		";
		foreach ($this->dictionary as $key => $value) {
			$html .= "
						<tr>
							<td>" . $this->dictionary[$key]->letter . "</td> 
							<td>" . $this->dictionary[$key]->phraseAlphabetical . "</td> 
							<td>" . $this->dictionary[$key]->phrase . "</td> 
							<td>" . $this->dictionary[$key]->meaning . "</td> 
							<td>" . $this->dictionary[$key]->example . "</td> 
						</tr>
			";
		}
		$html .= "
					</table>
				</body>
			</html>
		";
		print($html);
	}
	function ourCss() {
		$css = "
			<style type='text/css'>
				body {
					font-size:62.5%;
          font-family: Georgia;
				}
        p.toplink {
          float: right;
          font-size: 2em;
          font-style; italic;
        }

        h1.ourTitle {
          font-size: 5em;
        }
				p.letter {
					font-size: 4em;
				}
				p.phrase {
					font-size: 3em;
          margin-bottom: 0px;
          padding-bottom: 0px;
				}
				p.meaning {
					font-size: 2em;
          margin-left: 20px;
          margin-top: 5px;
          padding-top: 0px;
				}
				p.sampleContainer {
          font-size: 2em;
          margin-left: 20px;
          margin-top: 10px;
          padding-top: 0px;
          margin-bottom: 0px;
          padding-bottom: 0px;
        }
				.sample {
					font-size: 1em;
					font-style: italic;
				}
				p.translation {
					font-size: 1.5em;
          margin-top: 0px;
          padding-top: 0px;
          margin-left: 100px;
				}
				.letterAnchor {
					font-size: 2em;
					margin-right: .5em;
				}
			</style>
		";
		return($css);
	}

	function printIt2() { 
		$lastLetter = "A";
		$alphabet = str_split("ABCDEFGHIJKLMNOPQRSTUVWXYZ");
		$html = "
			<html>
				<head>
				" . $this->ourCss() . "
				</head>
				<body>
          <a name='top'><h1 class='ourTitle'>Street Talk from 'The Wire'</h1></a>
		";
		foreach ($alphabet as $char) {
			$html .= "<span class='letterAnchor'><a href='#" . $char . "'>" . $char . "</a></span>
			";
		}
		$html .= "	
					<p class='letter'>A</p>
		";
		foreach ($this->dictionary as $key => $value) {
			$thisLetter = $this->dictionary[$key]->letter;
			if ($thisLetter != $lastLetter) {
				$html .= 
          "<p class='toplink'><a href='#top'>Back to top</p></a>
           <hr/>
					<a name='" . $thisLetter . "'><p class='letter'>" . $thisLetter . "</p></a>
				";
				$lastLetter = $thisLetter;
			}
			$html .= "
					<p class='phrase'>" . $this->dictionary[$key]->phrase . "</p>
					<p class='meaning'>" . $this->dictionary[$key]->meaning . "</p> 
			";
			$example = $this->dictionary[$key]->example;
      if (!$this->isEmpty($example)) {
			  $html .= "
					<p class='sampleContainer'>Example: <span class='sample'>" . $example . "</span></p> 
        ";
      }
			$trans = $this->dictionary[$key]->translation;
      if (!$this->isEmpty($trans)) {
			  $html .= "
					<p class='translation'>[" . $trans . "]</p> 
        ";
      }
		}
		$html .= "
				</body>
			</html>
		";
		print($html);
	}
  function isEmpty($s) {
    return (!$s || trim($s) == "" || trim($s) == "&nbsp;");
  }
}
$wireManager = new TheWireManager();
$wireManager->printIt2();
?>
