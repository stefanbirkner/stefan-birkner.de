<?php

/**
 * <H6> tag class
 */
class H6tag extends HTMLTagClass {

    /**
     * Tag definition for class.
     * subclass defines this value.
     * ie var $tag = "<TABLE>";
     * @var  string
     * @access   private
     */
    var $_tag = "<H6>";

    /**
     * Flag to place a newline after open tag.
     * some tags are nice to have a \n after
     * to make reading of html easier.
     * ie <table>
     * @var  boolean
     * @access   public
     */
    var $newline_after_opentag = FALSE;
}

?>