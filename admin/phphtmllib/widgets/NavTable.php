<?php

//get the files needed by this class
require_once("$phphtmllib/widgets/BaseWidget.php");
require_once("$phphtmllib/tag_classes/Atag.php");
require_once("$phphtmllib/tag_classes/IMGtag.php");
require_once("$phphtmllib/tag_classes/TABLEtag.php");
require_once("$phphtmllib/tag_classes/TRtag.php");
require_once("$phphtmllib/tag_classes/TDtag.php");

/**
 * This builds a navigational table
 * widget that has a title, any #
 * of subtitles and then navigational
 * links.
 * @author Walt A. Boring IV
 */
class NavTable extends BaseWidget {


  /**
   * The name of the css file for this class
   * 
   * @private
   */
  var $_css_file = "NavTable.php";

  /**
   *  Array to hold the css customizable 
   *  colors for themeing.
   *  Each widget will have its own set of
   *  customizable css colors with defaults.
   *  the user can programatically modify the
   *  colors by setting them in this array.
   */
  var $_css_colors = array("title"=> "#666699",
                           "titlefont" => "#FFFFFF",
                           "subtitle" => "#9999CC",
                           "subtitlefont" => "#0000CC");


  /**
   * the constructor for this class.
   * @param string  $title - the title for the widget.
   * @param string  $subtitle - the subtitle if any.
   * @param mixed   $width - the width of the widget.
   *                         can be a % or an int.
   * @public.
   */
  function NavTable( $title, $subtitle=NULL, $width="100%") {

    $this->set_title( $title );
    $this->set_subtitle( $subtitle );
    $this->set_width( $width );
  }


  function set_subtitle( $subtitle ) {
      $this->subtitle = $subtitle;
  }

  //functions for adding/updating data

  function push($url, $text) {
	array_push($this->data, array("type"=>"url", "url"=>$url, "text"=>$text));
  }

  function push_blank( $num=1 ) {
    for ($x=1; $x<=$num; $x++)
       array_push($this->data, array( "type"=>"blank" ));
  }

  function push_text( $text ) {
      array_push($this->data, array( "type"=>"text", "text"=>$text ));
  }

  function push_heading( $title ) {
    array_push($this->data, array( "type" => "heading", "title" => $title ));
  }


  //******************************************
  //*   rendering area
  //******************************************


  /**
   * renders a title table for the widget.
   * @private
   */
  function render_title_table() {
      $attributes = array("width" => $this->width,
                          "border" => 0,
                          "cellpadding" => 0,
                          "cellspacing" => 0);
      $table = new TABLEtag( $attributes );

      //ok lets render the title table.
      $img_attributes = array("src" => $this->_image_dir."/spacer.gif",
                              "width" => 10,
                              "height" => 15,
                              "alt" => "",
                              "border" => 0);
      $img = new IMGtag( $img_attributes );

      $td = new TDtag( array( "width" => "1%",
                              "class" => "navtablebarleft") );
      $td->push( $img );

      $td2 = new TDtag( array( "width" => "98%",
                               "class" => "navtabletitlehead") );
      $td2->push( $this->title );

      $td3 = new TDtag( array( "width" => "1%",
                               "class" => "navtablebarright") );
      $td3->push( $img );

      $table->push_row( $td, $td2, $td3 );
      return $table;
  }

  /**
   * build a table that holds a subtitle.
   * @param     string  $subtitle - the subtitle
   * @return    TABLEtag object.
   */
  function render_subtitle_table( $subtitle ) {
      $attributes = array( "class" => "navtablesubhead",
                           "width" => "100%",
                           "border" => 0,
                           "cellpadding" => 0,
                           "cellspacing" => 0);
      $table = new TABLEtag( $attributes );

      //we have to set the height, the text bleads out
      //of the area in NS 4.x
      $td_attrs = array( "class" => "navtablesubtitle", 
                         "height" => "18" );
      $td = new TDtag( $td_attrs );
      $td->push( "&nbsp;$subtitle" );

      $table->push_row( $td );

      return $table;
  }

  /**
   * this creates the wrapper table that
   * the content gets stuffed into
   * @private
   */
  function _create_wrapper_table( $class, $table_width=NULL, $cellpadding=0) {

      $width = $this->width;
      if ($table_width) {
          $width = $table_width;
      }

      $attrs = array( "class" => $class,
                      "width" => $width,
                      "border" => 0,
                      "cellpadding" => $cellpadding,
                      "cellspacing" => 0);

      $table = new TABLEtag( $attrs );

      return $table;
  }

  /**
   * render a blank tr
   * @private
   */
  function _render_blank_tr() {
      $tr = new TRtag;
      $space = "&nbsp;&nbsp;";
      $td = new TDtag( array( "width" => "1%", "class" => "navtablediv") );

      $td->push( $space );
      $tr->push( $td );

      $td2 = new TDtag( array( "width" => "99%", "class" => "navtablediv") );
      $td2->push( $space );
      $tr->push( $td2 );

      return $tr;
  }

  /**
   * render a url row.
   * @param array() - the item to render.
   */
  function _render_url( $val ) {
      $tr = new TRtag;
      $bullet = "&#149;&nbsp;&nbsp;";
      $td = new TDtag( array("width" => "1%", "class" => "navtablediv") );
      $td->push( $bullet );
      $tr->push( $td );

      $url_td = new TDtag( array("width" => "99%", "class" => "navtablediv") );
      $url = new Atag( array("href" => $val["url"]) );
      $url->push( $val["text"] );
      $url_td->push( $url );
      $tr->push( $url_td );

      return $tr;
  }

  /**
   * render a text row.
   * @param array() - the item to render.
   */
  function _render_text( $val ) {
      $tr = new TRtag;
      $bullet = "&#149;&nbsp;&nbsp;";
      $td = new TDtag( array("width" => "1%", "class" => "navtablediv") );
      $td->push( $bullet );
      $tr->push( $td );

      $url_td = new TDtag( array("width" => "99%", "class" => "navtablediv") );
      $url_td->push( $val["text"] );
      $url_td->push( $url );
      $tr->push( $url_td );

      return $tr;
  }


  /**
   * Render the Navtable and its content.
   * @public
   * @return    raw html string.
   */
  function render( $indent_level=1, $output_debug=0 ) {
      $html = "";

      //render the title area first.
      $title = $this->render_title_table();
      $html .= $title->render( $indent_level, $output_debug );

      //create the table that wraps all the content.
      //this is so we get a nice thin border around
      //the widget.
      $wrapper_table = $this->_create_wrapper_table("navtablehead", NULL,1);

      //create the content table that holds all of
      //the real content.
      $content_table = $this->_create_wrapper_table("navtablesubhead", "100%");

      //where all the real content goes.
      $inner_table = $this->_create_wrapper_table("navtablesubhead", "100%", 3);

      //add the content table to the wrapper table.
      //we will add the content to the content table
      //later.  we can do this because push() is done
      //via reference.
      $content_tr = new TRtag;
      $content_td = new TDtag;
      $content_tr->push_reference( $content_td );

      $content_td->push_reference( $content_table );
      $content_td->push_reference( $inner_table );
      $wrapper_table->push_row( $content_tr );
                  
      $td = new TDtag;

      if ($this->subtitle) {
          $td->push( $this->render_subtitle_table( $this->subtitle ) );
          $content_table->push_row( $td );
      }
     
      //ok now walk thru all the content rows and render them.
      foreach ($this->data as $key=>$val) {
          switch ($val["type"]) {
              case "blank":
                  $inner_table->push_row( $this->_render_blank_tr() );
                  break;

              case "url":
                  $inner_table->push_row( $this->_render_url( $val ) );
                  break;

              case "text":
                  $inner_table->push_row( $this->_render_text( $val ) );
                  break;

              case "heading":
                  //dunno if we can do this.
                  break;
          }
      }

      

      $html .= $wrapper_table->render( $indent_level, $output_debug );
      return $html;
  }
}

?>
