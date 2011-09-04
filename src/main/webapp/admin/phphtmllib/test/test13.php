<?php

include_once("localinc.php");

$page = new HTMLPageClass("test.php");
$page->set_text_debug( $debug );

$page->push( html_a($PHP_SELF."?debug=1", "DEBUG ME"), html_br() );

$filedir = $phphtmllib."/test/pngs";
$urldir = "pngs";

$thumbs = new ImageThumbnailTable( 760, 5, $filedir, $urldir );
//get the link to the widget's css file.
//$page->push_css_link( $nav->get_css_file() );
$thumbs->set_thumbnail_script( "/phphtmllib/test/thumbnail.php" );

$page->push( $thumbs );


print $page->render();
?>
