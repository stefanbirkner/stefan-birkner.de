<?php

include_once("localinc.php");

$page = new HTMLPageClass("test.php");

$nav = new TextNav( 760 );

//get the link to the widget's css file.
$page->push_css_link( $nav->get_css_file() );

$nav->push("http://www.cnn.com", "Home", 80);
$nav->push("http://www.cnn.com", "Mailing List", 94);
$nav->push("http://www.cnn.com", "News Headlines", 120);
$nav->push("http://www.cnn.com", "Top Fifty", 98);
$nav->push("http://www.cnn.com", "The Fifty Monthly", 100);
$nav->push("http://www.cnn.com", "The Essentials", 94);
$nav->push("http://www.cnn.com", "Gear's Choice", 94);
$nav->push("http://www.cnn.com", "Contact Us", 94);

$page->push( $nav, html_br() );

$nav = new TextNav( 200 );

$nav->push("http://www.slashdot.org", "Slashdot", 100);
$nav->push("http://www.freshmeat.net", "Freshmeat", 100);

$page->push( $nav, html_br() );


print $page->render();
?>
