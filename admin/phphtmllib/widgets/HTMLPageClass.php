<?php

//Get all the required files for this class
require_once("$phphtmllib/HTMLTagClass.php");

require_once("$phphtmllib/tag_classes/BODYtag.php");
require_once("$phphtmllib/tag_classes/DOCTYPEtag.php");
require_once("$phphtmllib/tag_classes/HEADtag.php");
require_once("$phphtmllib/tag_classes/HTMLtag.php");
require_once("$phphtmllib/tag_classes/LINKtag.php");
require_once("$phphtmllib/tag_classes/METAtag.php");
require_once("$phphtmllib/tag_classes/SCRIPTtag.php");
require_once("$phphtmllib/tag_classes/STYLEtag.php");
require_once("$phphtmllib/tag_classes/TITLEtag.php");

/**
 * Some global defines, used by the
 * classes and widgets
 */
define("XHTML_TRANSITIONAL", "xhtml_transitional");
define("XHTML", "xhtml_transitional");
define("XHTML_STRICT", "xhtml_strict");
define("XHTML_FRAMESET", "xhtml_frameset");
define("HTML", "html");



/**
 * HTMLPageClass - class the constructs and renders an html document.
 *
 * @author      Walter A. Boring IV <waboring@buildabetterweb.com>
 * @version     1.0
 * @since       PHP 4.0.5
 * @abstract
 */
class HTMLPageClass {

    /**
     * HEADtag object that holds all content
     * for the head.
     * @var  object
     * @access   private
     */
    var $_head = NULL;

    /**
     * TITLEtag object that holds the title
     * of the page.
     * @var  object
     * @access   private
     */
    var $_title = NULL;

    /**
     * SCRIPTtag object that holds javascript
     * code for the head tag.
     * @var  object
     * @access   private
     */
    var $_head_js = NULL;

    /**
     * STYLEtag object that holds css code
     * for the head.
     * @var  object
     * @access   private
     */
    var $_head_style = NULL;

    /**
     * holds an array of LINKtag objects
     * in the head tag that reference an
     * external stylesheet file.
     * @var  array.
     * @access   private
     */
    var $_head_css_link_arr = array();

    /**
     * holds an array of SCRIPTtag objects
     * in the head tag that reference an
     * an extern javascript file.
     * @var  array
     * @access   private
     */
    var $_head_js_link_arr = array();

    /**
     * character set to be used in this
     * page.  This gets automatically
     * placed in the Content-Type
     * META tag.
     * @var  string
     * @access   private
     */
    var $_charset = "iso-8859-1";

    /**
     * BODYtag object that holds all content
     * for the body tag.
     * @var  object
     * @access   private
     */
    var $_body = NULL;

    /**
     * DOCTYPEag object that sets the document
     * type.  This gets rendered prior to <html>
     * @var  object
     * @access   private
     */
    var $_doctype = NULL;

    /**
     * flag to tell the class to try and
     * change the http headers to output
     * document of type text, instead of
     * html.  This is helpfull for debugging.
     * @var boolean
     * @access private
     */
    var $_text_debug = FALSE;


    /**
     * Class Constructor
     * @param   mixed  - $title Title string or TITLEtag object for the page.
     * @param   string - one of 3 types of html to render.  Setting this will
     *                   make the object declare the gobal define which tells
     *                   all of the tag objects what type of html tags to render.
     *                   some tags support special features.  such as the <IMG>
     *                   tag.  If xhtml is selected, the the IMGtag object and all
     *                   utility functions will not render "border=0" as a default
     *                   attribute, since this is not proper xhtml.
     *                   "html" - HTML 4.0 (default)
     *                   "xhtml_transitional" - render xhtml instead of html
     *                                        - doctype is XHTML transitional.
     *                   "xhtml_strict" - render xhtml instead of html 4.0.
     *                                  - doctype is XHTML strict.
     *                   
     * @access   public
     */
    function HTMLPageClass($title=NULL, $html_type=HTML) {

        switch ($html_type) {
            case HTML:
                $attributes = array("html", "PUBLIC",
                                    "\"-//W3C//DTD HTML 4.01 Transitional//EN\"");
                define("HTML_RENDER_TYPE", HTML);
                break;

            case XHTML_STRICT:
                $attributes = array("html", "PUBLIC",
                                    "\"-//W3C//DTD XHTML 1.0 Strict//EN\"",
                                    "\"DTD/xhtml1-strict.dtd\"");
                define("HTML_RENDER_TYPE", XHTML_STRICT);
                break;
            
            case XHTML:
            case XHTML_TRANSITIONAL:
                $attributes = array("html", "PUBLIC",
                                    "\"-//W3C//DTD XHTML 1.0 Transitional//EN\"",
                                    "\"DTD/xhtml1-transitional.dtd\"");
                define("HTML_RENDER_TYPE", XHTML);
                break;

            //What else needs to be done to properly support
            //XHTML frameset?  TODO LIST for 1.1
            case XHTML_FRAMESET:
                $attributes = array("html", "PUBLIC",
                                    "\"-//W3C//DTD XHTML 1.0 Frameset//EN\"",
                                    "\"DTD/xhtml1-frameset.dtd\"");
                define("HTML_RENDER_TYPE", XHTML_FRAMESET);
                break;
        }

        $this->_doctype = new DOCTYPEtag( $attributes );
        $this->_head = new HEADtag;
        $this->_head_js = new SCRIPTtag(array("language" => "JavaScript"));
        $this->_head_style = new STYLEtag;
        $this->_body = new BODYtag;
        $this->_body->push( "\n" );
        if ($title != NULL) {
            $this->set_title( $title );
        }
    }

    //**************************************************
    //* HEAD tag related functions
    //**************************************************

    /**
     * adds content to the head tag.
     * @param   mixed   $content the content to add
     */
    function push_head_content( $content ) {
        $this->_head->push( $content );
    }

    /**
     * adds raw javascript to the head which
     * will automatically get wrapped in a
     * <script language="JavaScript"> tag.
     * @param mixed $content - raw javascript code to add to the head
     */
    function push_head_js( $content ) {
        $this->_head_js->push( $content );
    }

    /**
     *  set the title of the page output.
     *  @param  mixed  $title - the title of the html page
     *                          can be TITLEtag object.
     *
     */
    function set_title( $title ) {
        if (is_object($title)) {
            if ($title->_tag == "<TITLE>") {
                $this->_title = $title;
            } else {
                //they did something funky here.
                return -1;
            }
        } else {
            $titletag = new TITLEtag;
            $titletag->push( $title );
            $this->_title = $titletag;
        }
    }

    /**
     * pushes a css external reference to the head area
     * @param mixed   $link - link tag object or $url for a css.
     */
    function push_css_link( $link ) {
        if (is_object($link)) {
            $css = $link;
        } else {
            $attributes = array( "rel"=>"stylesheet",
                                 "type"=>"text/css",
                                 "href"=>$link);
            $css = new LINKtag( $attributes );
        }
        $this->_head_css_link_arr[] = $css;
    }

    /**
     *  pushes an link to an externally referenced javascript
     *  file, which will get rendered in the head.
     *  @param  mixed $link - script tag object or $url of .js file.
     *
     */
    function push_js_link( $link ) {
        if (is_object($link)) {
            $js = $link;
        } else {
            $attributes = array("language" => "JavaScript",
                                "src" => $link );
            $js = new SCRIPTtag( $attributes );
        }
        $this->_head_js_link_arr[] = $js;
    }

    /**
     * Automatically set a page meta tag refresh
     * @param int     $time - time in seconds to refresh
     * @param string  $url - the url to go to.
     */
    function set_refresh( $time, $url=NULL ) {
      if ($url) {
        $time .= ";url=$url";
      }
      $attributes = array( "http-equiv" => "refresh",
                           "content" => $time );
      $meta = new METAtag( $attributes );
      $this->push_head_content( $meta );
    }

    /**
     * set the character set
     * @param string  $charset - the charset for the meta tag
     *
     */
    function set_charset( $charset ) {
      $this->_charset = $charset;
    }

    /**
     * this builds the content type meta tag.
     *
     */
    function _build_content_type_tag() {
        $content_type = "text/html; charset=" . $this->_charset;

        $attributes = array("http-equiv" => "Content-Type",
                            "content" => $content_type);
        $meta = new METAtag( $attributes );
        return $meta;
    }

    //**************************************************
    //* BODY tag related functions
    //**************************************************

    /**
     * pushes content to the <body>
     * @param   mixed $content the content to add
     *
     */
    function push( ) {
        $args = func_get_args();
        foreach( $args as $content) {
            $this->_body->push( $content );
        }
    }

    /**
     * pushes content via reference
     * @param   mixed   $content - content to add
     */
    function push_reference( &$content ) {
        $this->_body->push_reference( $content );
    }

    /**
     * set attributes of body tag
     * @param array $attributes the name=>value pairs
     *
     */
    function set_body_attributes( $attributes ) {
        $this->_body->set_tag_attributes( $attributes );
    }

    //**************************************************
    //* General functions
    //**************************************************

    /**
     * set the $_text_debug flag
     * @param   $flag - boolean.
     */
    function set_text_debug( $flag ) {
        $this->_text_debug = $flag;
    }


    //**************************************************
    //* RENDERING of content related functions
    //**************************************************

    /**
     *  builds the head object and its content.
     *
     */
    function _build_head() {

        $this->_head->push( $this->_build_content_type_tag() );

        $this->_head->push( $this->_title );
        if ( $this->_head_style->count_content() ) {
          $this->_head->push( $this->_head_style );
        }
        if ( $this->_head_js->count_content() ) {
          $this->_head->push( $this->_head_js );
        }

        if (count($this->_head_css_link_arr)) {
          foreach( $this->_head_css_link_arr as $css) {
            $this->_head->push( $css );
          }
        }

        if (count($this->_head_js_link_arr)) {
          foreach( $this->_head_js_link_arr as $js) {
            $this->_head->push( $js );
          }
        }
    }

    /**
     * render the page.
     *
     */
    function render() {

        //lets use ourself to render the debug page!
        if ($this->_text_debug) {            
            $page = new HTMLPageClass;
            $page->push_css_link("/phphtmllib/widgets/css/HTMLPageClass.css");            
        }

        $newline = "\n";
        $attributes = array();
        if (HTML_RENDER_TYPE == XHTML ||
            HTML_RENDER_TYPE == XHTML_STRICT) {
            $attributes = array( "xmlns" => "http://www.w3.org/1999/xhtml",
                                 "xml:lang" => "en",
                                 "lang" => "en");
        }
        $html = new HTMLtag( $attributes );
        $html-> push( $newline );
        $this->_build_head();
        $html->push( $this->_head );

        $html->push( $newline );
        $this->_body->push( $newline );
        $html->push( $this->_body );

        $html-> push( $newline );

        if ($this->_text_debug) {
            if (HTML_RENDER_TYPE == XHTML_STRICT) {
                $xml = new XMLtag(array("version" => "1.0",
                                        "encoding"=>"UTF-8", "?"));
                $page->push( $xml->render(0,1) );
            }
            $page->push( $this->_doctype->render(0,1) );
            $page->push( $html->render(0,1) );
            return $page->render();
        } else {
            if (HTML_RENDER_TYPE == XHTML_STRICT) {
                $xml = new XMLtag(array("version" => "1.0",
                                        "encoding"=>"UTF-8", "?"));
                $output = $xml->render();
            }
            $output .= $this->_doctype->render();
            $output .= $html->render();
            return $output;
        }
    }
}


?>
