<?php

/**
 * INPUTtag     <INPUT> tag
 *
 * @author      Walter A. Boring IV <waboring@buildabetterweb.com>
 * @version     1.0
 * @since       PHP 4.0.5
 * @abstract
 */
class INPUTtag extends HTMLTagClass {

    /**
     * Tag definition for class.
     * @var  string
     * @access   private
     */
    var $_tag = "<INPUT>";

    /**
     * flag to render close tag or not.
     * set to FALSE if no close tag is needed
     * ie <img src=hotchick.png>
     * @var  boolean
     * @access   private
     */
    var $_close_tag_required = FALSE;
}

?>
