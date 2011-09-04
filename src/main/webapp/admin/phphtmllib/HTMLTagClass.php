<?php

/**
 * Base class for all HTML Tag classes.
 *  Tag class renders an html tag, its
 *  attributes, the content (if any),
 *  and close tag (if needed).
 * 
 *  Base Class for phpHtmlLib
 *  http://phphtmllib.sourceforge.net
 *
 * @author      Walter A. Boring IV <waboring@buildabetterweb.com>
 * @version     1.0.1
 * @since       PHP 4.0.5
 * @abstract
 */

class HTMLTagClass {

    /**
     * Tag definition for class.
     * subclass defines this value.
     * ie var $tag = "<TABLE>";
     * @var  string
     * @access   private
     */
    var $_tag = "";

    /**
     * Tag attributes as an array
     * of name value pairs.
     * ie $attributes["cellspacing"]=2;
     * @var  array
     * @access   private
     */
    var $_attributes = array();

    /**
     * Tag content as a stack
     * ie <TABLE> content here </TABLE>
     * @var  array
     * @access   private
     */
    var $_content = array();

    /**
     * flag to render close tag or not.
     * set to FALSE if no close tag is needed
     * ie <img src=hotchick.png>
     * @var  boolean
     * @access   private
     */
    var $_close_tag_required = TRUE;

    /**
     * Flag to render content or not.
     * set to FALSE to not render content.
     * ie <img src=hotchick.png>
     * @var  boolean
     * @access   private
     */
    var $_content_required = TRUE;

    /**
     * Flag to place a newline after open tag.
     * some tags are nice to have a \n after
     * to make reading of html easier.
     * ie <table>
     * @var  boolean
     * @access   public
     */
    var $newline_after_opentag = TRUE;

    /**
     * Flag to place a newline after close tag.
     * usefull for maintaining nice output inside
     * a table
     * @var  boolean
     * @access   public
     */
    var $newline_after_closetag = TRUE;

    /**
     * Flag to tell the renderer to NEVER
     * to render the tag name in lower case
     * no matter what
     * @var boolean
     * @access private
     */
    var $_always_upper_case = FALSE;

    /**
     * Flag to tell the renderer not to
     * place the /> if we are in xhtml
     * compliant mode.
     */
    var $_no_finish_slash_xhtml = FALSE;

    /**
     * The indent level for open tag.
     * used for pretty formatting of output
     * ie <table>
     *     <tr>
     *      <td><\td>
     *     </tr>
     *    </table>
     * @var  int
     * @access   private
     */
    var $_indent_level = 0;

    /**
     * Flag for pretty (indented) output
     * @var  boolean
     * @access   public
     */
    var $indent_flag = TRUE;

    /**
     * String to use as indent string.
     * can be any char.  defaulted to 1 space
     * @var  string
     * @access   private
     */
    var $_indent_str = "  ";

    /**
     * list of generally accepted attributes for
     * a tag.  Child class should override this.
     * to provide the list.
     * This is only used for informational
     * purposes to help w/ browser compatibility.
     * @var  array.
     * @access   private
     */
    var $_supported_attributes = array();

    /**
     * Flag to let us know to render XHTML 1.0
     * compliant output. defaulted to FALSE
     * @var boolean
     * @access private
     */
    var $_xhtml_compliant = FALSE;

    /**
     * Flag to denote that this tag is
     * depricated by the HTML standard.
     *
     */
    var $_depricated = FALSE;

    /**
     * the list of tag attributes that we
     * should create a clickable link for
     * when in debug mode.
     * @var  array
     * @access private
     */
    var $_debug_link_attributes = array("background");

    /**
     * The list of attributes not to render
     * if HTML_RENDER_TYPE is "XHTML STRICT"
     *
     */
    var $_xhtml_strict_attributes = array();


    /**
     * The list of attributes that we want to run
     * htmlentities() on if we are in XHTML_STRICT
     * mode.  Otherwise the validator complains about
     * html characters such as &.
     * @var array.
     * @access private
     */
    var $_htmlentities_attributes = array();


    /**
     * Class Constructor
     * @param   array   $attributes Associative array of name="value" pairs of
     *                              tag atributes.
     *                              ie array("border"=>"0", "class"=>"hover");
     * @param   mixed   $content - 1 entry of content to be automatically
     *                             added to the tag.
     * @param   boolean $newline_after_opentag - set this to TRUE or FALSE to alter
     *                                           the default setting for a tag.
     *                                           This will default to -1, which will
     *                                           keep the defined tag default setting.
     * @access   public
     */
    function HTMLTagClass( $attributes=NULL, $content=NULL, $newline_after_opentag=-1 ) {
        if ($attributes) {
            $this->set_tag_attributes( $attributes );
        }
        if ($content) {
            $this->push($content);
        }

        //what version of html is this tag going to
        //be rendered as?
        if (HTML_RENDER_TYPE == XHTML ||
            HTML_RENDER_TYPE == XHTML_STRICT) {
            $this->_xhtml_compliant = TRUE;
            
        }
        
        if ($newline_after_opentag != -1) {
           $this->newline_after_opentag = $newline_after_opentag;
        }
        
        if ($this->_depricated) {
            trigger_error(htmlspecialchars($this->_tag) . " has been depricated in HTML 4.0", E_USER_NOTICE);
        }
    }

    //****************************************************************
    // Tag rendering routines.
    //****************************************************************

    /**
     * renders the open tag. is <TABLE>
     * @param   int    $indent_level    the indentation level for this tag.
     * @return  string
     * @access  private
     */
    function _render_tag($indent_level, $output_debug=0) {

        if ($output_debug) {
            //lets call the special render tag debug
            //function
            return $this->_render_tag_debug( $indent_level );            
        } else {
            $indent = $this->_render_indent( $indent_level );
            $str = $indent.str_replace('>','',$this->_tag);
            
            if ($this->_xhtml_compliant && !$this->_always_upper_case) {
                //we have to have the tag name be lower case.
                $str = strtolower( $str );
            }
            
            reset ($this->_attributes);
            while ( list($name, $value) = each($this->_attributes) ) {
                $str .= $this->_build_attribute_string($name, $value);
            }
        }

      //if we want to output xhtml compliant code, we have to
      //render a special tag closing.
      if ($this->_xhtml_compliant) {
          //we have to render a special close for the
          //open tag, if the tag doesn't require a close
          //tag or content.
          if (!$this->_close_tag_required && !$this->_no_finish_slash_xhtml) {
              $html = $str . " />";
          } else {
              $html = $str . ">";
          }
      } else {
          $html = $str.">";
      }
      if ($this->newline_after_opentag) {
          $html .= "\n";
      }
      return $html;
    }

    /**
     * This renders that open tag in debug mode.
     * We do this as a seperate function,
     * so we can override this by the child
     * tag, so it can add a link on content or
     * one of the attributes.  
     */
    function _render_tag_debug($indent_level) {

        $indent = $this->_render_indent($indent_level, TRUE);

        $str = $indent . "<nobr>&lt;" . "<span class=\"purple\">";
        $tag_tmp = str_replace('<', '', $this->_tag);
        $str .= str_replace( '>', '', $tag_tmp) . "</span>";
        
        if ($this->_xhtml_compliant && !$this->_always_upper_case) {
            //we have to have the tag name be lower case.
            $str = strtolower( $str );
        }
        
        reset ($this->_attributes);
        while ( list($name, $value) = each($this->_attributes) ) {
            $str .= $this->_build_attribute_string($name, $value, TRUE);
        }

      //if we want to output xhtml compliant code, we have to
      //render a special tag closing.
      if ($this->_xhtml_compliant) {
          //we have to render a special close for the
          //open tag, if the tag doesn't require a close
          //tag or content.
          if (!$this->_close_tag_required && !$this->_no_finish_slash_xhtml) {
              $html = $str . "&nbsp;/&gt;";
          } else {
              $html = $str . "&gt;";
          }
      } else {
          $html = $str."&gt;";
      }

      if (!$this->_close_tag_required) {
          $html .= "</nobr>";          
      }

      if ($this->newline_after_opentag) {
          $html .= "<br>\n";
      }

      return $html;
    }



    /**
     * Renders all of the content.
     * Content can be raw strings, or tag objects.
     * @param   int    $indent_level    the indentation level for this tag.
     * @return  string
     * @access  private
     */
    function _render_content($indent_level, $output_debug=0) {

        if ($output_debug) {
            return $this->_render_content_debug( $indent_level );            
        } else {
            //walk through the content
            foreach ($this->_content as $item) {
                if (is_object($item)) {
                    $html .= $item->render($indent_level+1, FALSE);
                } else {
                    if ($this->newline_after_opentag) {
                        $indent = $this->_render_indent($indent_level + 1, FALSE);
                        $item = str_replace("\n", "\n" . $indent, $item);
                        $html .= $indent . htmlentities($item) . "\n";
                    } else {
                        $item = str_replace("\n", "\n" . $indent, $item);
                        $html .= htmlentities($item);
                    }
                }
            }
            return $html;
        }
    }

    /**
     * This renders the content in debug mode.
     * lets us wrap the content w/ a <nobr></nobr>
     * so it acts like view source.
     *
     * Content can be raw strings, or tag objects.
     * @param   int    $indent_level    the indentation level for this tag.
     * @return  string
     * @access  private
     */
    function _render_content_debug($indent_level) {

        //walk through the content
        foreach ($this->_content as $item) {
          if (is_object($item)) {
            $html .= $item->render($indent_level+1, TRUE);
          } else {
              if ($this->newline_after_opentag) {
                  $indent = $this->_render_indent($indent_level + 1, TRUE);
                  $item = htmlspecialchars($item);
                  $item = str_replace("\n", "<br>\n" . $indent, $item);
                  $html .= $indent . "<nobr>" .htmlentities($item) . "</nobr><br>\n";
              } else {
                  $item = htmlspecialchars($item);
                  $item = str_replace("\n", "<br>\n" . $indent, $item);
                  $html .= htmlentities($item);
              }
          }
        }
        return $html;
    }




    /**
     * Renders the close tag (if needed)
     * @param   int    $indent_level    the indentation level for this tag.
     * @return  string
     * @access  private
     */
    function _render_close_tag($indent_level, $output_debug=0) {

        if ($output_debug) {
            return $this->_render_close_tag_debug( $indent_level );            
        } else {
            $indent ="";
            if ($this->indent_flag && $this->newline_after_opentag) {
                $indent = $this->_render_indent($indent_level, $output_debug);
            }
            $str = $indent . str_replace('<', "</", $this->_tag);
            
            if ($this->_xhtml_compliant) {
                $str = strtolower( $str );
            }
            if ($this->newline_after_closetag) {
                $str .= "\n";
            }
            return $str;
        }
    }

    /**
     * this renders the close tag in debugging mode.
     * @param   int    $indent_level    the indentation level for this tag.
     * @return  string
     * @access  private
     */
    function _render_close_tag_debug( $indent_level ) {

      $indent ="";
      if ($this->indent_flag && $this->newline_after_opentag) {
        $indent = $this->_render_indent($indent_level, TRUE);
      }
      $str = $indent . "&lt;/" . "<span class=\"purple\">";
      $tag_tmp = str_replace('<', '', $this->_tag);
      $str .= str_replace( '>', '&gt;', $tag_tmp) . "</span>";

      if ($this->_xhtml_compliant) {
          $str = strtolower( $str );
      }

      if ($this->newline_after_closetag) {
          $str .= "</nobr><br>\n";
      }

      return $str;

    }



    /**
     * Renders the tag, attributes, content and close tag.
     * @param   int    $indent_level    the indentation level for this tag.
     * @return  string
     * @access  public
     */
    function render($indent_level=NULL, $output_debug=0) {

      if ($indent_level==NULL) {
        $indent_level = $this->_indent_level;
      }

      $html  = $this->_render_tag($indent_level, $output_debug);

      if ($this->_content_required) {
        $html .= $this->_render_content($indent_level, $output_debug);
      }
      if ($this->_close_tag_required) {
        $html .= $this->_render_close_tag($indent_level, $output_debug);
      }

      return $html;
    }


    //****************************************************************
    // Utility functions for attributes.
    //****************************************************************

    /**
     * add a single attribute (name="value")
     * @param   string  $name   attribute name
     * @param   mixed   $value  the value.
     * @access  public
     */
    function set_tag_attribute( $name, $value=NULL ) {
        $this->_attributes[$name] = $value;
    }

    /**
     * add multiple attributes (name="value")
     * @param   array   $attributes Associative array of name="value" pairs of
     *                              tag atributes.
     *                              ie array("border"=>"0", "class"=>"hover");
     * @access  public
     */
    function set_tag_attributes( $attributes=array() ) {
        $this->_attributes = array_merge($this->_attributes, $attributes);
    }

    /**
     * clear all attributes and start with new attributes
     * @param   array   $attributes Associative array of name="value" pairs of
     *                              tag atributes.
     *                              ie array("border"=>"0", "class"=>"hover");
     * @access  public
     */
    function reset_attributes( $attributes=array() ) {
        $this->_attributes = array();
        $this->set_tag_attributes( $attributes );
    }

    /**
     * lists the supported attributes for tag.
     * used for development purposes.
     * @return  array
     * @access  public
     */
    function list_supported_attributes() {
        return $this->_supported_attributes;
    }

    /**
     * this builds an attribute for a tag.
     * It also filters out any attributes
     * that shouldn't be rendered if they 
     * are in the $this->_xhtml_strict_attributes
     * array and HTML_RENDER_TYPE = XHTML STRICT
     *
     * @param   string - $name attribute name
     * @param   mixed - $value attribute value
     * @return  the tag attribute name=value pair.
     *          to be added to the tag.
     */
    function _build_attribute_string($name, $value, $debug=0) {

        if ($debug) {
            //hack to make non name-value pair work.
            //ie <option name=foo value=bar CHECKED>
            if ( is_int($name) ) {
                $returnval = " <span class=\"black\">$value</span>";
            } elseif ( $value === NULL ) {
                $returnval = " <span class=\"black\">$name</span>";
            } else {
                if (in_array($name, $this->_debug_link_attributes)) {
                    //lets create a clickable link for the value
                    //of this attribute
                    $value = "<a href=\"$value\">$value</a>";
                    $returnval = " <span class=\"black\">$name=</span><span class=\"blue\">\"$value\"</span>";
                } else {
                    $returnval = " <span class=\"black\">$name=</span><span class=\"blue\">\"$value\"</span>";
                }
            }
            
            if (HTML_RENDER_TYPE == XHTML_STRICT && 
                in_array($name, $this->_xhtml_strict_attributes)) {
                    $returnval = NULL;
            }
        } else {
            //hack to make non name-value pair work.
            //ie <option name=foo value=bar CHECKED>
            if (HTML_RENDER_TYPE == XHTML_STRICT) {
                //We do this because XHTML STRICT complains about
                //html characters such as &.  So we mask them.
                $value = htmlentities($value);
            }

            if ( is_int($name) ) {
                $returnval = " $value";
            } elseif ( $value === NULL ) {
                $returnval = " $name";
            } else {
                $returnval= " $name=\"$value\"";
            }
            
            if (HTML_RENDER_TYPE == XHTML_STRICT && 
                in_array($name, $this->_xhtml_strict_attributes)) {
                    $returnval = NULL;
            }
        }
        return $returnval;
    }


    //****************************************************************
    // Content functions
    //****************************************************************

    /**
     * push content onto content stack
     * adds content to tag as a FIFO.
     * You can have n number of parameters.
     * each one will get added in succession to the content.
     * @param   mixed   $content - either string, or tag object.
     * @access  public
     */
    function push(  ) {
        $args = func_get_args();
        foreach ($args as $content) {
            array_push($this->_content, $content);
        }
    }

    /**
     * push content onto content stack
     * adds content to tag as a FIFO
     * You can only add 1 element at a time, and
     * it will be added as a reference.  So you can't do
     * push_reference("something");, since "something" is a
     * static.
     * @param   mixed   $content - either string, or tag object.
     *                             the tag object gets stored as a
     *                             reference to the original, so you
     *                             can push it, then modify it later.
     * @access  public
     */
    function push_reference( &$content ) {
        array_push($this->_content, &$content);
    }

    /**
     * destroy existing content and start with new content.
     * @param   mixed   $content    can be tag object, or raw (string).
     * @access  public
     */
    function reset_content( ) {
        $this->_content = array();
    }

    /**
     * counts the number of content objects
     * @return  int
     * @access  public
     */
    function count_content( ) {
        return count($this->_content);
    }

    /**
     * returns leading indent for tag
     * @param   int    $indent_level    the indentation level for this tag.
     * @param   boolean $debug_flag - render &nbsp; instead of white spaces.
     *                                this is used to output pretty print
     *                                html source.
     * @return  string
     * @access  private
     */
    function _render_indent($indent_level, $debug_flag=0) {
      $indent = "";
      if ($this->indent_flag) {
          if ($debug_flag) {
              $indent_level *=2;
          }
          $indent = str_repeat($this->_indent_str, $indent_level);
          if ($debug_flag) {
              $indent = str_replace($this->_indent_str, "&nbsp;", $indent);
          }
      }
      return $indent;
    }

    /**
     * get the nth element from content array
     * @param   int   $cell   the cell to get
     * @return  mixed
     */
    function _get_element( $cell ) {
        return $this->_content[$cell];
    }

    //****************************************************************
    // Misc functions
    //****************************************************************

    /**
     * function to set the indent flag
     * @param   boolean     $flag  TRUE or FALSE
     */
    function set_indent_flag( $flag ) {
        $this->indent_flag = $flag;
    }

    /**
     * set the newline_after_opentag flag
     * @param   boolean     $flag  TRUE or FALSE
     */
    function set_newline_after_opentag( $flag ) {
        $this->newline_after_opentag = $flag;
    }

    /**
     * set the newline_after_content flag
     * @param   boolean     $flag   TRUE or FALSE
     */
    function set_newline_after_closetag( $flag ) {
        $this->newline_after_closetag = $flag;
    }
}
?>
