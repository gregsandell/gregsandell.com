<?php
class DateObj {
	var $_stamp;
	var $_TCD;
	var $_sepchar = "/";
	//var $_e;
	function DateObj() {
		$this->_setNow();
		//$this->_e = new dErr();
	}
	function set($iMDY) {
		//$this->_e->clear();
		if (!$this->isDate($iMDY)) {
			$this->_stamp = 0;
			$this->_TCD = "--/--/----";
			//$this->_e_>set("set", "Invalid MDY date");
			return(FALSE);
		}
		$this->_stamp = $this->_MDYtoStamp($iMDY);
		$this->_setTCD();
		return(TRUE);
	}
	function toString() {
		return($this->_TCD);
	}
	function setSepChar($sepChar) {
		$this->_sepchar = $sepChar;
	}
	function getStamp() {
		return($this->_stamp);
	}
	function isDateAfter($date1, $date2) {
		if (!$this->isDate($date1) || !$this->isDate($date2)) {
			return(FALSE);
		}
		return($this->_MDYtoStamp($date1) > $this->_MDYtoStamp($date2));
	}
	function isAfterToday($date1) {
		if (!$this->isDate($date1)) {
			return(FALSE);	
		}
		return($this->_MDYtoStamp($date1) > time());
	}
	function dayDiff($date1, $date2) {
		if (!$this->isDate($date1) || !$this->isDate($date2)) {
			return(FALSE);
		}
		$dayInSecs = 86400;
		$o1 = new DateObj();
		$o2 = new DateObj();
		$o1->set($date1);
		$o2->set($date2);
		$stampdiff = $o2->getStamp() - $o1->getStamp();
		return(intval($stampdiff/$dayInSecs));
	}
	function daysAgo($date) {
		$o = new DateObj();
		return($this->daysDiff($date, $o->toString()));
	}
	function formatDate($iMDY) {
		if (!$this->isDate($iMDY)) {
			return("");
		}
		return($this->_stampToTCD($this->_MDYtoStamp($iMDY)));
	}
	function formatToMysqlDate($iMDY) {
		if (!$this->isDate($iMDY)) {
			return("");
		}
		$tArr = $this->_explodeDate($iMDY);
		return($tarr[2] . $this->_sepchar . $tarr[0] .
						$this->_sepchar . $tarr[1]);
	}
	function isDate($iMDY) {
		if (ereg("^([0-9]{1,2})" . $this->_sepchar . "([0-9]{1,2})" .
					$this->_sepchar . "([0-9]{2,4})$",
					$iMDY, $c) == FALSE) {
			return(FALSE);
		}
		if (strlen($c[3]) == 3) {
			return(FALSE);
		}
		$daynum = intval($c[2]);
		$monthnum = intval($c[1]);
		$yearnum = intval($this->_formatYear($c[3]));
		if (strlen($c[3]) > 3) {
			if (($yearnum < 1902) || ($yearnum > 2037)) {
				return(FALSE);
			}
		}
		if (!checkdate($monthnum, $daynum, $yearnum)) {
			return(FALSE);
		}
		return(TRUE);
	}
	function addDays($iMDY, $iOffset) {
		if (!$this->isDate($iMDY)) {
			return(FALSE);
		}
		$tArr = $this->_explodeDateInt($this->formatDate($iMDY));
		$sstamp = mktime(0,0,0,$tArr[0], ($tArr[1] + $iOffset), $tArr[2]);
		return($this->_stampToTCD($sstamp));
	}
	function addYears($iMDY, $iOffset) {
		if (!$this->isDate($iMDY)) {
			return(FALSE);
		}
		$tArr = $this->_explodeDateInt($this->formatDate($iMDY));
		$sstamp = mktime(0,0,0,$tArr[0], intval($tArr[1]), $tArr[2] + $iOffset);
		return($this->_stampToTCD($sstamp));
	}
	function addMonths($iMDY, $iOffset) {
		if (!$this->isDate($iMDY)) {
			return(FALSE);
		}
		$tArr = $this->_explodeDateInt($this->formatDate($iMDY));
		$sstamp = mktime(0,0,0,$tArr[0] + $iOffset, intval($tArr[1]), $tArr[2]);
		return($this->_stampToTCD($sstamp));
	}
	function _setTCD() {
		$this->_TCD = $this->_stampToTCD($this->_stamp);
	}
	function _explodeDate($iMDY) {
		return(explode($this->_sepchar, $iMDY));
	}
	function _explodeDateInt($iMDY) {
		$sArr = $this->_explodeDate($iMDY);
		$tArr[0] = intval($sArr[0]);
		$tArr[1] = intval($sArr[1]);
		$tArr[2] = intval($sArr[2]);
		return($tArr);
	}
	function _stampToTCD($sstamp) {
		return(date("m" . $this->_sepchar . "d" . $this->_sepchar . "Y", $sstamp));
	}
	function _setNow() {
		$this->_stamp = time();
		$this->_setTCD();
	}
	function _MDYtoStamp($iMDY) {
		$tArr = $this->_explodeDateInt($iMDY);
		$intMonth = $tArr[0];
		$intDay = $tArr[1];
		$intYear = intval($this->_formatYear((string)$tArr[2]));
		return(mktime(0,0,0, $intMonth, $intDay, $intYear));
	}
	/*
		YMD is the format that mysql uses
	*/
	function _YMDtoStamp($iYMD) {
		$tArr = $this->_explodeDateInt($iYMD);
		$intMonth = $tArr[1];
		$intDay = $tArr[2];
		$intYear = intval($this->_formatYear((string)$tArr[0]));
		return(mktime(0,0,0, $intMonth, $intDay, $intYear));
	}
	function _formatYear($yearString) {
		$intYear = intval($yearString);
		if ($intYear < 100) {
			if ($inYear < 39) {
					$intYear = $intYear + 2000;
			}
				else {
					$intYear = $intYear + 1900;
				}
		}
		return((string)$intYear);
	}
}
?>




