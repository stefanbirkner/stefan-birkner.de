<?php

//get the files needed by this class
require_once("$phphtmllib/widgets/BaseWidget.php");
require_once("$phphtmllib/tag_classes/Atag.php");
require_once("$phphtmllib/tag_classes/IMGtag.php");
require_once("$phphtmllib/tag_classes/TABLEtag.php");
require_once("$phphtmllib/tag_classes/TRtag.php");
require_once("$phphtmllib/tag_classes/TDtag.php");

/**
 * this is the base widget class, that all widgets
 * are based off of.  It provides some basic
 * members and methods
 */
class TextNav extends BaseWidget {

  /**
   * The name of the css file for this class
   *
   * @private
   */
  var $_css_file = "TextNav.php";

  /**
   *  Array to hold the css customizable 
   *  colors for themeing.
   *  Each widget will have its own set of
   *  customizable css colors with defaults.
   *  the user can programatically modify the
   *  colors by setting them in this array.
   */
  var $_css_colors = array("background"=> "#FFCC00",
                           "font" => "#000000",
                           "fonthover" => "#FF0000");

  /**
   * Constructor for this class
   * It just sets the width for the
   * widget.
   * 
   * @param int $width - the width of the widget
   */
  function TextNav( $width = 760 ) {
      $this->set_width( $width );
  }


  /**
   * Sets the background color of the widget.
   * This defaults to #ffcc00.  If you change
   * the bg color, you should prolly change the
   * font color as well.
   */
  function set_bg_color( $color ) {
      $this->bg_color = $color;
  }

  /**
   * Sets the font color.
   * 
   */
  function set_font_color( $color ) {
      $this->font_color = $color;
  }


  //functions for adding/updating data

  function push($url, $text, $width = 100) {
	array_push($this->data, array("type"=>"url", "url"=>$url, 
                                 "text"=>$text, "width" => $width));
  }

  function push_blank( $num=1 ) {
    for ($x=1; $x<=$num; $x++)
       array_push($this->data, array( "type"=>"blank" ));
  }

  function push_text( $text ) {
      array_push($this->data, array( "type"=>"text", "text"=>$text ));
  }


  /**
   * build a td for the link.
   *
   */
  function build_nav_td( $nav ) {
      $attributes = array("class" => "textnavtd", "width" => $nav['width'],
                          "align" => "center");
      $td = new TDtag( $attributes );
      $td->newline_after_opentag = FALSE;

      switch ($nav['type']) {
          case 'url':
              $text = str_replace(' ', "&nbsp;", $nav['text'] );
              $content = html_a( $nav['url'], '&nbsp;' . $text . '&nbsp;',
                                 "textnavlist");
              $content->indent_flag = FALSE;
              $content->newline_after_closetag = FALSE;
              break;
          case 'blank':
              $content = "&nbsp;";
      }
      $td->push( $content );
      return $td;
  }

  /**
   * build the image seperator td
   *
   */
  function build_img_td() {

      $attributes = array("width" => 1,
                          "class" =>
                          "textnavdivider");
      $td = new TDtag( $attributes );
      $td->newline_after_opentag = FALSE;
      $img =  html_img("/phphtmllib/widgets/images/dot_clear.gif", 1, 1, 0);
      $img->indent_flag = FALSE;
      $img->newline_after_opentag = FALSE;
      $td->push( $img );
      return $td;
  }



  /**
   * function that will render the widget.
   * child class should override this.
   *
   */
  function render( $indent_level=1, $output_debug=0) {
      $attributes = array( "border" => 0, "width" => $this->width,
                           "cellpadding" => 0, "cellspacing" => 0 );
      $table = new TABLEtag( $attributes );
      $tr = new TRtag;

      foreach( $this->data as $nav) {
          $nav_td = $this->build_nav_td( $nav );
          $img_td = $this->build_img_td();
          $tr->push( $nav_td, $img_td );
      }
      $table->push( $tr );

      return $table->render( $indent_level, $output_debug );
  }
}
?>
