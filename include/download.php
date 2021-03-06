<?php
$version= "2.3";
$filesize = "45";   //MB
if( !isset($downloadTitle) )        $downloadTitle        = "Download LanguageTool";
if( !isset($downloadLabel) )        $downloadLabel        = "for LibreOffice/OpenOffice";
if( !isset($downloadVersionLabel) ) $downloadVersionLabel = "Version";
if( !isset($downloadLabelMB) )      $downloadLabelMB      = "MB";
if( !isset($onclick) )              $onclick              = "";
?>

<div class="downloadButton">
  <a <?php print $onclick ?> class='piwik_download' href="/download/LanguageTool-<?php print $version ?>.oxt">
    <img class="downloadButtonLogo" src="<?php print $rootUrl ?>/images/LanguageToolBig.png" alt="LT logo"/>
    <span class="languagetool"><?php print $downloadTitle ?></span><br/>
    <span class="download"><?php print $downloadLabel ?></span><br/>
    <span class="version"><?php print $downloadVersionLabel ?> <?php print $version ?> (<?php print $filesize ?>&nbsp;<?php print $downloadLabelMB ?>)</span>
  </a>
</div>
