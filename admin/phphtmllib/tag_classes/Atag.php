<?php

/**
 * <A> tag class
 */
class Atag extends HTMLTagClass {

    /**
     * Tag definition for class.
     * subclass defines this value.
     * ie var $tag = "<TABLE>";
     * @var  string
     * @access   private
     */
    var $_tag = "<A>";

    /**
     * Flag to place a newline after open tag.
     * some tags are nice to have a \n after
     * to make reading of html easier.
     * ie <table>
     * @var  boolean
     * @access   public
     */
    var $newline_after_opentag = FALSE;

    /**
     * the list of tag attributes that we
     * should create a clickable link for
     * when in debug mode.
     * @var  array
     * @access private
     */
    var $_debug_link_attributes = array("href");


    /**
     * The list of attributes that we want to run
     * htmlentities() on if we are in XHTML_STRICT
     * mode.  Otherwise the validator complains about
     * html characters such as &.
     * @var array.
     * @access private
     */
    var $_htmlentities_attributes = array("href");

}

?>
