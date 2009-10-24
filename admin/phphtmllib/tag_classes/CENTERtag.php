<?php

//NOTE: This tag is depricated in HTML 4.0

/**
 * <CENTER> tag class.
 * this is a depricated html tag, but
 * browsers still support it.
 */
class CENTERtag extends HTMLTagClass {

    /**
     * Tag definition for class.
     * subclass defines this value.
     * ie var $tag = "<TABLE>";
     * @var  string
     * @access   private
     */
    var $_tag = "<CENTER>";

    /**
     * Flag to denote that this tag is
     * depricated by the HTML standard.
     *
     */
    var $_depricated = TRUE;

}


?>
