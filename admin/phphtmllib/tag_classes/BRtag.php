<?php

/**
 * <BR> tag class
 * No close tag used.
 * No content used.
 */
class BRtag extends HTMLTagClass {

    /**
     * Tag definition for class.
     * subclass defines this value.
     * ie var $tag = "<TABLE>";
     * @var  string
     * @access   private
     */
    var $_tag = "<BR>";

    /**
     * flag to render close tag or not.
     * set to FALSE if no close tag is needed
     * ie <img src=hotchick.png>
     * @var  boolean
     * @access   private
     */
    var $_close_tag_required = FALSE;

    /**
     * Flag to render content or not.
     * set to FALSE to not render content.
     * ie <img src=hotchick.png>
     * @var  boolean
     * @access   private
     */
    var $_content_required = FALSE;
}

?>
