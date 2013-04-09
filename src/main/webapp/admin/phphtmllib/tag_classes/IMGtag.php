<?php

/**
 * <IMG> tag class
 */
class IMGtag extends HTMLTagClass {

    /**
     * Tag definition for class.
     * subclass defines this value.
     * ie var $tag = "<TABLE>";
     * @var  string
     * @access   private
     */
    var $_tag = "<IMG>";

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


    /**
     * the list of tag attributes that we
     * should create a clickable link for
     * when in debug mode.
     * @var  array
     * @access private
     */
    var $_debug_link_attributes = array("src");


    /**
     * The list of attributes not to render
     * if HTML_RENDER_TYPE is "XHTML STRICT"
     *
     */
    var $_xhtml_strict_attributes = array("border");


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