<?php
  $_cpath = $_SERVER['DOCUMENT_ROOT'];
  include($_cpath . "/resume/objResume.php");
  $resumeManager = new ResumeManager();
  $resume = $resumeManager->res;
?>
<style type="text/css">
  table#resHeaderTbl td#nameAddress {
    font-weight: bold;
    font-size: 14px;
    padding-left: 0px;
    padding-bottom: 5px;
    text-align: center;
    /* vertical-align: text-top; */
  }
  table#resHeaderTbl td.certificationImg {
    margin-top: 0px;
    vertical-align: top;
  }
  table#resTbl ul#address {
    list-style-type: none;
    margin-left: 0;
    padding-left: 1em;
    text-indent: -1em;
    text-align: center;
  }
  table#resTbl ul#address li {
    font-size: 10px;
    line-height: 14px;
  }
  table#resTbl ul {
    margin-left: 0;
    padding-left: 1em;
    text-indent: -1em;
  }
  table#resTbl li {
    font-size: 11px;
  }
  table#resTbl td.sectHead {
    font-weight: bold;
    font-size: 13px;
  }
  .company {
    font-weight: bold;
    font-size: 12px;
  }
  .city {
    font-size: 11px;
  }
  .basisLabel {
    font-weight: bold;
    font-size: 11px;
  }
  .basis {
    font-size: 11px;
  }
  .timeTitle {
    font-size: 12px;
  }
  .boxme {
    border: 1px solid black;
  }
  p.summary {
    font-size: 11px; 
    font-family: Verdana,Arial,Helvetica,sans-serif;
  }
</style>
<table id="resTbl" border="0" width="500" cellspacing="0" callpadding="0">
  <tr>
    <td colspan="2">
      <table id="resHeaderTbl" border="0" width="560" cellspacing="0" callpadding="0">
        <tr>
          <td class="certificationImg">
            <img src="http://gregsandell.com/<?php print($resume->imageJava) ?>" />
          </td>
          <td id="nameAddress"> 
            <?php print($resume->nname) ?>
            <ul id="address"> <?php
              foreach ($resume->addressLines as $lline) {  ?>
                <li><?php print($lline) ?></li> <?php
              } ?>
            </ul>
          </td>
          <td class="certificationImg">
            <img style="valign: top" src="http://gregsandell.com/<?php print($resume->imageSCWCD) ?>" />
          </td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td class="sectHead" colspan="2">
      Summary of Qualifications
    </td>
  </tr>
  <tr>  
    <td colspan="2"> <?php 
      foreach ($resume->qualSummary as $qual) { ?>
        <p class="summary"><?php print($qual) ?></p> <?php
      } ?>
    </td>
  </tr>
<!--
  <tr>
    <td class="sectHead" colspan="2">
      Objectives
    </td>
  </tr>
  <tr>  
    <td colspan="2"> <?php 
      foreach ($resume->skillsetSummary as $skill) { ?>
        <p class="summary"><?php print($skill) ?></li> <?php
      } ?>
    </td>
  </tr>
-->
  <tr>
    <td class="sectHead" colspan="2">
      Employment History
    </td>
  </tr> <?php
  foreach ($resume->positionObjArray as $ppos) { ?>
    <tr>
      <td style="border: 1px solid black"> 
        <table border="0">
          <tr>
            <td width="372">
              <span class="company"><?php print($ppos->company) ?> </span>
              <span class="city">(<?php print($ppos->location) ?>)</span>
              <br/>
              <span class="basisLabel">Basis: </span>
              <span class="basis"><?php print($ppos->basis) ?></span>
            </td>
            <td class="timeTitle" width="128" >
              <?php print($ppos->dates) ?>
              <br/><?php print($ppos->ttitle) ?>
            </td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td colspan="2">
        <ul> <?php
          foreach ($ppos->listTextArray as $line) { ?>
            <li><?php print($line) ?></li> <?php
          } ?>
        </ul>
      </td>
    </tr> <?php
  }  ?>
</table>
