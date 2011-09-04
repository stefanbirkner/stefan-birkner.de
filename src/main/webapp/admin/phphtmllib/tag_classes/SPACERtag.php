<?php

/**
 * <SPACER> tag class
 */
class SPACERtag extends HTMLTagClass {

    /**
     * Tag definition for class.
     * subclass defines this value.
     * ie var $tag = "<TABLE>";
     * @var  string
     * @access   private
     */
    var $_tag = "<SPACER>";

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
     * ie <spacer type="block" width="1" height="25">
     * @var  boolean
     * @access   private
     */
    var $_content_required = FALSE;


   
}

?>
