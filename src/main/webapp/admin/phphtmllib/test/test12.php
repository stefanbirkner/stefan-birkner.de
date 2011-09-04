<?php

include_once("localinc.php");

$page = new HTMLPageClass("test.php");

$nav = new TreeNav( 300 );

//get the link to the widget's css file.
$page->push_css_link( $nav->get_css_file() );

$nav->push("http://www.cnn.com", "Home");
$nav->push("http://www.cnn.com", "Mailing List");
$nav->push("http://www.cnn.com", "News Headlines");
$nav->push("http://www.cnn.com", "Top Fifty", TRUE);
$nav->push("http://www.cnn.com", "The Fifty Monthly");
$nav->push("http://www.cnn.com", "The Essentials");
$nav->push("http://www.cnn.com", "Gear's Choice");
$nav->push("http://www.cnn.com", "Contact Us");

$page->push( $nav, html_br() );


print $page->render();
?>
