<?php

/**
 * <SCRIPT> tag class
 *
 */
class SCRIPTtag extends HTMLTagClass {

    /**
     * Tag definition for class.
     * subclass defines this value.
     * ie var $tag = "<TABLE>";
     * @var  string
     * @access   private
     */
    var $_tag = "<SCRIPT>";

    /**
     * the list of tag attributes that we
     * should create a clickable link for
     * when in debug mode.
     * @var  array
     * @access private
     */
    var $_debug_link_attributes = array("src");


    /**
     * The list of attributes that we want to run
     * htmlentities() on if we are in XHTML_STRICT
     * mode.  Otherwise the validator complains about
     * html characters such as &.
     * @var array.
     * @access private
     */
    var $_htmlentities_attributes = array("src");
}

?>
