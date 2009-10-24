<?php

include_once("localinc.php");

$page = new HTMLPageclass("test3.php");
$page->push_css_link("/phphtmllib/widgets/css/InfoTable.css");

$table = new InfoTable("Some Title Here", "30%", 1);
$td = new TDtag(array("bgcolor"=>"#FF0000") );

$table->push("Some lame crap");
$table->push("&nbsp;", "&nbsp;", "&nbsp;");
$td->push("Some more crap");
$table->push( $td );
$table->push("multiple", "crap", "here");
$table->push("&nbsp;");
$table->push("Even more", "&nbsp;");
$table->push(" ");


$page->push( $table );

print $page->render();
?>
