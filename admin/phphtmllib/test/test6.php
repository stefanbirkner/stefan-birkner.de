<?php

include_once("localinc.php");

$page = new HTMLPageClass("test.php");
$page->set_body_attributes(array("bgcolor"=> "#ffffff"));

$nav_table = new NavTable("Test title", "test subtitle", "30%");

//get the link to the widget's css file.
$page->push_css_link( $nav_table->get_css_file() );

$nav_table->push("http://www.cnn.com", "Go to CNN");
$nav_table->push_blank();
$nav_table->push("http://www.yahoo.com", "Go to Yahoo dude");
$nav_table->push_blank();
$nav_table->push_text("Some lame text here");


$page->push( $nav_table );

print $page->render();
?>
