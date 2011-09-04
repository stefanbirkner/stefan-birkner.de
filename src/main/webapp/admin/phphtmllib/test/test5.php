<?php

include_once("localinc.php");

$page = new HTMLPageClass("test #5");

$style = new STYLEtag();
$style->push("
TD.head  {
  font-family:arial,helvetica,lucida;
  font-size:11pt;
  font-weight:bold;
  background:#6b6b6b;
  color:#ffffff;
}
TABLE.frame {
  background:#000000;
 font-size:10pt;
}
TD.head3 {
  font-family:arial,helvetica,lucida;
  font-size:10pt;
  font-weight:bold;
  background:#6b6b6b;
  color:#eeeeee
}
TR.cell1 {
  background:#ef1ff;
  font-size:10pt;
}\n");

$page->push_head_content( $style );


$attributes = array("width"=>"300",
                    "border"=>1,
                    "cellspacing"=>0,
                    "cellpadding"=>1);
$table = new TABLEtag( $attributes );
$tr = new TRtag();
$td = new TDtag( array("class"=>"head", "valign"=>"top", "align"=>"center") );

//build the content tr
$td->push("Some lame crap",html_br(), html_br(),"some more crap\n",
                       html_br(), html_br(),"even more");

$table->push_row( $td );
$table->push_row( "this is a test", "and another test" );
$table->push_row( "this is a test2", "and another test2" );
$td = new TDtag( array("class" => "head3") );
$td->push( "help me dude" );
$table->push_row( $td,  "and another test3" );
$table->set_cell_attributes( 1, 0, array("width" => "10") );

$page->push( $table );

print $page->render()
?>
