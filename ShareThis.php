<?php

# Alert the user that this is not a valid entry point to MediaWiki if they try to access the special pages file directly.
if (!defined('MEDIAWIKI')) {
  die();
 }


$wgExtensionCredits['specialpage'][] = array(
	     'name' => 'ShareThis',
	     'author' =>'Wesley Ellis', 
	     'url' => 'http://appropedia.org/User:Tahnok', 
	     'description' => 'This will share shit',
	     'descriptionmsg' => 'myextension-desc',
	     'version' => 0
	     );
$dir = dirname(__FILE__) . '/';
 
$wgAutoloadClasses['SpecialShareThis'] = $dir . 'SpecialShareThis.php'; # Location of the SpecialMyExtension class (Tell MediaWiki to load this file)
$wgExtensionMessagesFiles['ShareThis'] = $dir . 'ShareThis.i18n.php'; # Location of a messages file (Tell MediaWiki to load this file)
$wgSpecialPages['ShareThis'] = 'SpecialShareThis'; # Tell MediaWiki about the new special page and its class name

$wgHooks['SkinTemplateBuildNavUrlsNav_urlsAfterPermalink'][] = 'workDamnIt';
$wgHooks['SkinTemplateToolboxEnd'][] = 'Test2';

function Test2( &$monobook ) {
#Uncomment this when we have multi-lang support
#  wfLoadExtensionMessages('ShareThis'); 
    ?><li id="Test"><a href="<?php echo htmlspecialchars($monobook->data['nav_urls']['ShareThis']['href'])?>" target="_blank">Tweet Page</a></li>
  <?php
  return true;
}

function workDamnIt( &$skintemplate, &$nav_urls, &$oldid, &$revid ) {
#uncomment this when we have multi-lang support
#  wfLoadExtensionMessages( 'ShareThis' );
  global $wgTwitterUserName;

  $title = Title::newFromText(wfUrlEncode("{$skintemplate->thispage}"));
  $url = $title->getFullURL();
  $pagename = urlencode($title->getFullText());
  $href = "http://twitter.com/share?text=" . $pagename . "&url=" . $url;
  if(isset($wgTwitterUserName)){
    $href = $href . "&via=" . $wgTwitterUserName;
  }
  
  $nav_urls['ShareThis'] = array(
				 'text' => "Tweet this!",
				 'href' => $href
				 );
  return true;
} 


?>