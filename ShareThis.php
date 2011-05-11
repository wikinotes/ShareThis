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

#$wgHooks['SkinTemplateBuildNavUrlsNav_urlsAfterPermalink'][] = 'Test';
$wgHooks['SkinTemplateToolboxEnd'][] = 'Test2';

function Test( &$skintemplate, &$nav_urls, &$oldid, &$revid ) {
  $nav_urls['test'] = array(
			    'test' => "ZOMG HI",
			    'href' => "http://zomglasercatspewpewpew.com"
			    );
  return true;
}

function Test2( &$monobook ) {
  ?><li id="Test"><a href="http://twitter.com/share?text=pewpewpew&url=http%3A%2F%2Fappropedia.org&via=appropedia">Tweet Page</a></li>
  <?php
  return true;
}

?>