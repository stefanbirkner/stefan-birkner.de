<?php

/**
 * <XML> tag class
 */
class XMLtag extends HTMLTagClass {

    /**
     * Tag definition for class.
     * subclass defines this value.
     * ie var $tag = "<TABLE>";
     * @var  string
     * @access   private
     */
    var $_tag = "<?XML>";

    /**
     * flag to render close tag or not.
     * set to FALSE if no close tag is needed
     * ie <img src=hotchick.png>
     * @@var  boolean
     * @@access   private
     */
    var $_close_tag_required = FALSE;
 
    /**
     * Flag to render content or not.
     * set to FALSE to not render content.
     * ie <img src=hotchick.png>
     * @@var  boolean
     * @@access   private
     */
    var $_content_required = FALSE;

    /**
     * Flag to tell the renderer not to
     * place the /> if we are in xhtml
     * compliant mode.
     */
    var $_no_finish_slash_xhtml = TRUE;
}

?>
