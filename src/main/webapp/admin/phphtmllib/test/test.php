<?php

include_once("localinc.php");

$page = new HTMLPageClass("First example script", XHTML_STRICT);
$page->set_text_debug( $debug );


$attributes = array("width"=>"600",
                    "border"=>1,
                    "cellspacing"=>0,
                    "cellpadding"=>0);
$table = new TABLEtag( $attributes );
$td = new TDtag( array("bgcolor"=>"#FFFFFF",
                       "colspan" => 4) );

$td->push( "Hello World" );

$table->push_row( $td );
$table->push_row( "test", "1", "2", "3");
$page->push( $table, html_br(),
             build_spacergif_imgtag(1,1));

print $page->render();
?>
