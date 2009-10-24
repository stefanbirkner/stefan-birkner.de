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
class TreeNav extends BaseWidget {

  /**
   * The name of the css file for this class
   *
   * @private
   */
  var $_css_file = "TreeNav.php";

  /**
   * Constructor for this class
   * It just sets the width for the
   * widget.
   *
   * @param int $width - the width of the widget
   */
  function TreeNav( $width = 760 ) {
      $this->set_width( $width );
  }


  //functions for adding/updating data

  function push($url, $text, $selected=FALSE) {
    array_push($this->data, array("type"=>"url", "url"=>$url,
                                 "text"=>$text, "selected" => $selected));
  }

  function push_blank( $num=1 ) {
    for ($x=1; $x<=$num; $x++)
       array_push($this->data, array( "type"=>"blank" ));
  }

  function push_text( $text, $selected=FALSE ) {
      array_push($this->data, array( "type"=>"text", "text"=>$text,
                                     "selected" => $selected ));
  }

  /**
   * Set this text as the selected
   * item
   *
   * @param string $text - the text item selected.
   */
  function set_selected( $text ) {
      //ok find the
  }

  /**
   * build the image seperator td
   *
   */
  function build_img_td() {

      $td = new TDtag;
      $td->newline_after_opentag = FALSE;
      $img =  html_img("/phphtmllib/widgets/images/arrow.gif", 9, 9);
      $img->set_tag_attributes( array("vspace"=>5, "hspace"=>3));
      $img->indent_flag = FALSE;
      $img->newline_after_opentag = FALSE;
      $td->push( $img );
      return $td;
  }

  /**
   * build the link td.
   *
   */
  function build_link_td( $nav ) {
      $span = html_span();
      $span->indent_flag = FALSE;
      $span->newline_after_opentag = FALSE;
      $span->newline_after_closetag = FALSE;

      $a = html_a($nav["url"], $nav["text"], "treenavnormal");

      $td = new TDtag( array("width" => "100%"), $a );

      return $td;
  }

  /**
   * build a spacer td.
   *
   */
  function build_spacer_td() {

      $attributes = array("colspan" => 3,
                          "class" => "treenavspacer");
      $td = new TDtag( $attributes );
      $td->newline_after_opentag = FALSE;
      $img =  html_img("/phphtmllib/widgets/images/spacer.gif", 1, 1);
      $img->indent_flag = FALSE;
      $img->newline_after_opentag = FALSE;
      $td->push( $img );
      return $td;
  }


  /**
   * build all of the idividual nav elements.
   *
   */
  function build_innertable() {

      $attributes = array( "width" => $this->width,
                           "cellspacing" => 0,
                           "cellpadding" => 0,
                           "border"=>0,
                           "class" => "treenavinnertable");
      $table = new TABLEtag( $attributes );

      foreach( $this->data as $nav) {
          $img_td = $this->build_img_td();
          $link_td = $this->build_link_td( $nav );

          $table->push_row( $img_td, $link_td, "&nbsp;");

          $spacer_td = $this->build_spacer_td();
          $table->push_row( $spacer_td );
      }

      return $table;
  }



  /**
   * function that will render the widget.
   * child class should override this.
   *
   */
  function render( $indent_level=1, $output_debug=0) {
      $attributes = array( "border" => 0, "width" => $this->width,
                           "cellpadding" => 0, "cellspacing" => 1,
                           "class" => "treenavwrapper" );
      $table = new TABLEtag( $attributes );
      $tr = new TRtag;

      //Ok now build the content.

      $tr->push( $this->build_innertable() );

      $table->push( $tr );

      return $table->render( $indent_level, $output_debug );
  }
}
?>
