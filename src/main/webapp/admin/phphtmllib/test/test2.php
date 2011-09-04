<?php

include_once("localinc.php");

$page = new HTMLPageClass("Test script #2");

$style = new STYLEtag();
$style->push( "
TABLE.frame {
    background:#000000;
    font-size:10pt;
}
TD.head  {
    font-family:arial,helvetica,lucida;
    font-size:11pt;
    font-weight:bold;
    background:#6b6b6b;
    color:#ffffff
}
TD.head2 {
    font-family:arial,helvetica,lucida;
    font-size:10pt;
    font-weight:bold;
    background:#6b6b6b;
    color:#000000;
}
TR.cell1 {
    background:#eff1ff;
    font-size:10pt;
}\n");

//Add the raw style tag and content
//to the <head> of the page.
$page->push_head_content( $style );



$attributes = array("width"=>"300",
                    "border"=>0,
                    "cellspacing"=>0,
                    "cellpadding"=>1);
$table = new TABLEtag( $attributes );

$tr = new TRtag();
$tr2 = new TRtag();
$td = new TDtag( array("class"=>"head") );
$td2 = new TDtag;

$title_table = new TABLEtag( array("width"=>"100%",
                                "border"=>0,
                                "cellspacing"=>0,
                                "cellpadding"=>2,
                                "class"=>"frame") );
$td->push( "Some Title Here" );
$title_table->push_row( $td );


$td2->set_tag_attributes( array("valign"=>"top", "class"=>"head") );
$td2->push( $title_table );
$table->push_row( $td2 );

$content_table = new TABLEtag;
$content_table->set_tag_attributes( array("width"=>"100%", "border"=>0,
                                 "cellspacing"=>1, "cellpadding">=1) );

$tr->set_tag_attributes( array("class" => "cell1") );

//set all of the td's that get created in 
//tr's push function to have attributes of
//allign=center
$tr->set_default_td_attributes(array("align"=>"center"));

$center = new Ptag();

$str = "some example string";
$center->push( $str, html_br(), html_br() );
$center->push( $str, html_br(), html_br() );
$center->push( $str );
$tr->push( $center );

$tr->push( html_p( "Some lame stuff", html_br(), html_br(),
                        "some more stuff", html_br(), html_br(),
                        "and even more") );

$content_table->push_row( $tr );

$td2 = new TDtag( array( "class" => "head2") );

$td2->push( $content_table );

$table->push_row( $td2 );

$page->push( $table );

print $page->render();
?>
