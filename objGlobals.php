<?php
// print "in objGlobals.php<br/>";
class GlobalsObj {
	var $Key;
	var $allResumeItems;
	var $allPortfolioItems;
	function GlobalsObj() {
		$this->Key = new KeyObj();
		$this->allResumeItems = array(
			$this->Key->crocs,
			$this->Key->trilogyed,
			$this->Key->tenx,
			$this->Key->johndeere,
			$this->Key->cybercoders,
			$this->Key->sears,
			$this->Key->path,
			$this->Key->tr,
			$this->Key->icross,
			$this->Key->trib,
			$this->Key->ubs, $this->Key->usaf, 	$this->Key->amex, $this->Key->abn, 
			$this->Key->ies, $this->Key->ubsw, 	$this->Key->xb, $this->Key->quebecor, 
			$this->Key->giantstep, $this->Key->taproot,	$this->Key->loyola, $this->Key->sussex, $this->Key->cnmat, $this->Key->ils);
		$this->allPortfolioItems = array($this->Key->crocs, $this->Key->tenx, $this->sears,
			$this->Key->path, $this->Key->tr, $this->Key->ubs, $this->Key->usaf, 	$this->Key->amex, $this->Key->abn, 
			$this->Key->ies, $this->Key->xb,
			$this->Key->maytag, $this->Key->watts, $this->Key->billwhitney, $this->Key->spectrum);
	}
}
class KeyObj {
    var $crocs = "crocs";
    var $trilogyed = "trilogyed";
    var $tenx = "tenx";
    var $johndeere = "johndeere";
    var $cybercoders = "cybercoders";
	var $sears = "sears";
	var $path = "path";
	var $tr = "tr";
	var $icross = "icrossing";
	var $trib = "trib";
	var $ubs = "ubs";
	var $usaf = "usaf";
	var $amex = "amex";
	var $abn = "abnAmro";
	var $ies = "ies";
	var $ubsw = "ubsw";
	var $xb = "xb";
	var $quebecor = "quebecor";
	var $giantstep = "giantstep";
	var $maytag = "maytag";
	var $taproot = "taproot";
	var $watts = "watts";
	var $billwhitney = "billwhitney";
	var $loyola = "loyola";
	var $spectrum = "spectrum";
	var $sussex = "sussex";
	var $cnmat = "cnmat";
	var $ils = "ils";
	function KeyObj() {
	}
}	
?>	
	
