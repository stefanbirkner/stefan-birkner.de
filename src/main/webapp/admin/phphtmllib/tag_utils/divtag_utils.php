<?php

/**
 * this file holds special DIVtag rendering functions.
 * Since the <div> is commonly used for special things
 * we automate some common used <div> content </div>
 * rendering functions.
 * @author Walter A. Boring IV.
 */

//get all the files that this file requires
require_once("$phphtmllib/tag_classes/DIVtag.php");
require_once("$phphtmllib/tag_utils/html_utils.php");


/**
 * Render a div w/ a spacer give as its content.
 *
 * @author  Walter A. Boring IV
 * @param   int $width - the width of the img
 *                       ( DEFAULT : 1)
 * @param   int $height - the height of the img
 *                       ( DEFAULT : 1)
 * @return  DIVtag object.
 */
function div_build_spacergif_tag( $width, $height) {
    $attributes = array( "style" => "font-family: times new roman; font-size: 2px;");
    $div = new DIVtag( $attributes );
    $div->push( build_spacergif_imgtag( $width, $height, "/images" ) );
    return $div;
}

/**
 * build a new div tag with default attributes of
 * "align=center"
 *
 * @author  Walter A. Boring IV
 * @return  DIVtag object.
 */
function html_div_center() {
    $attributes = array("align" => "center");
    return new DIVtag( $attributes );
}

/**
 * build a new div tag with content
 *
 * @author  Walter A. Boring IV
 * @return  DIVtag object.
 */
function html_div() {
    $args = func_get_args();
    $div = new DIVtag;
    foreach( $args as $content) {
        $div->push( $content );
    }
    return $div;
}
?>
