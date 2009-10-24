<?php

include_once("localinc.php");

function xmp_var_dump($var) {
    echo "<xmp>";
    var_dump( $var );
    echo "</xmp>";
}

$page = new HTMLPageClass("test #4");

$form_attributes = array( "name" => "myform",
                          "method" => "GET",
                          "action" => $PHP_SELF);

$form = new FORMtag( $form_attributes );

$form->push( form_text("test", "testing",15,10) );
$form->push( form_button("test", "testing" ) );
$form->push( form_submit("test", "testing" ) );

$page->push( $form );


print $page->render();
?>
