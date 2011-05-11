<?php
class SpecialShareThis extends SpecialPage {

  function __construct() {
    parent::__construct( 'ShareThis' );
    wfLoadExtensionMessages('ShareThis');
  }
 
  function execute( $par ) {
    global $wgRequest, $wgOut;
    $wgOut->setPagetitle("Share This!");
    $this->setHeaders();
    $output="Hello world!";
    $wgOut->addWikiText( $output );
  }
}