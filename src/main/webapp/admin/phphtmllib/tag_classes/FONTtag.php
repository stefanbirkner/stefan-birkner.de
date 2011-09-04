<?php

//NOTE: This tag is depricated in HTML 4.0

/**
 * <FONT> tag class
 */
class FONTtag extends HTMLTagClass {

    /**
     * Tag definition for class.
     * subclass defines this value.
     * ie var $tag = "<TABLE>";
     * @var  string
     * @access   private
     */
    var $_tag = "<FONT>";

    /**
     * Flag to denote that this tag is
     * depricated by the HTML standard.
     *
     */
    var $_depricated = TRUE;
}

?>
