<?php

/**
 * this is the base widget class, that all widgets
 * are based off of.  It provides some basic 
 * members and methods
 */
class BaseWidget {

  /**
   * the indent level
   * @private
   */
  var $_indent_level=1;

  /**
   * The title of the table.
   * @public
   */
  var $title='';

  /**
   * the width of the widget
   * @public
   */
  var $width="100%";

  /**
   * hold the data for this
   * widget.  can be anything,
   * depends on the child class.
   * defaults to an array.
   * @private
   */
  var $data = array();

  /**
   * the root page to the images
   * dir.  This is used for any
   * refrences to images used
   * by this class.
   * namely spacer.gif.
   * @private
   */
  var $_image_dir = "/phphtmllib/widgets/images";

  /**
   * The path to the location of the css
   * needed to properly render this class
   * these are based off of the widget dir
   * from which the libs live in.
   * @private
   */
  var $_css_dir = "/phphtmllib/widgets/css/";


  /**
   *  Array to hold the css customizable 
   *  colors for themeing.
   *  Each widget will have its own set of
   *  customizable css colors with defaults.
   *  the user can programatically modify the
   *  colors by setting them in this array.
   */
  var $_css_colors = array();


  /**
   * Constructor for the base widget.
   *
   */
  function BaseWidget() {
  }

  
  /**
   * get the widget's required css file.
   * 
   * @return string - path to css file.
   */
  function get_css_file() {
      
      if ($this->_css_file) {
          $str = $this->_css_dir . $this->_css_file;
          $str .= $this->build_css_query_string();
          return $str;
      } else {
          return NULL;
      }      
  }

  //Utility functions for setting class members.
  function set_title( $title ) {
    $this->title = $title;
  }

  function set_width( $width ) {
    $this->width = $width;
  }

  /**
   * set the image directory root
   * where the images that this class
   * uses lives.
   * @param string  $dir - the path
   *
   */
  function set_image_dir( $dir ) {
      $this->_image_dir = $dir;
  }

  /**
   * function to set a specific 
   * themeable color for a css.
   *
   * @param string $name - the name of
   *                       the customizable
   *                       item.
   * @param string $color - the 6 digit hex
   *                        code for the color.
   */
  function set_css_item_color( $name, $color ) {
      $this->_css_colors[$name] = $color;
  }


  /**
   * function get the current color value of
   * a particular entry in the _css_colors array.
   *
   * @param string $name - the name of
   *                       the customizable
   *                       item.
   * @return string the color value if any.
   */
  function get_css_item_color( $name ) {
      if ($this->_css_colors[$name]) {
          return $this->_css_colors[$name];          
      } else {
          return NULL;
      }
  }


  /**
   * function to build the query string
   * for the css link to theme the css 
   * colors.
   */
  function build_css_query_string() {
      if (count ($this->_css_colors)) {
          $str = "?";
          foreach ($this->_css_colors as $name => $color) {
              $str .= "&".$name."=".urlencode($color);
          }
          return $str;          
      } else {
          return NULL;
      }
      

  }


  /**
   * function for adding content.
   * child class should override this.
   *
   */
  function push() {
      return NULL;
  }

  /**
   * function that will render the widget.
   * child class should override this.
   *
   */
  function render() {
      return NULL;
  }

    
}
?>
