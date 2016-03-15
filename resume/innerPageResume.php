<?php
  $_cpath = $_SERVER['DOCUMENT_ROOT'];
  include($_cpath . "/resume/objResume.php");
  $resumeManager = new ResumeManager();
  $resume = $resumeManager->res;
?>
<link rel="stylesheet" href="resume.css" type="text/css" />
<table id="resTbl" border="0" width="500" cellspacing="0" callpadding="0">
  <tr>
    <td colspan="2">
      <table id="resHeaderTbl" border="0" width="560" cellspacing="0" callpadding="0">
        <tr>
          <td class="certificationImg">
            <img src="<?php print($resume->imageJava) ?>" />
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
            <img style="valign: top" src="<?php print($resume->imageSCWCD) ?>" />
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
