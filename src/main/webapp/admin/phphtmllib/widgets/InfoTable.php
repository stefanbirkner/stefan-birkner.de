<?php


//get the files needed by this class
require_once("$phphtmllib/widgets/BaseWidget.php");
require_once("$phphtmllib/tag_classes/TABLEtag.php");
require_once("$phphtmllib/tag_classes/TRtag.php");
require_once("$phphtmllib/tag_classes/TDtag.php");

class InfoTable extends BaseWidget {

  //alternating row colors flag.
  var $alternating_row_colors=0;

  //rows of table data to display.
  var $rows = array();

  //number of columns for colspan
  var $num_cols=0;

  /**
   * The name of the css file for this class
   * 
   * @private
   */
  var $_css_file = "InfoTable.css";


  //constructor
  function InfoTable( $title, $width="100%", $alternating_row_colors=0) {

    $this->set_title( $title );
    $this->set_width( $width );
    $this->set_alternating_row_colors( $alternating_row_colors );
  }


  function set_alternating_row_colors( $flag ) {
    $this->alternating_row_colors = $flag;
  }

  //functions for adding/updating data

  function push_row( $row, $num ) {
    array_push($this->rows, $row);
    if ($num > $this->num_cols) {
       $this->num_cols = $num;
    }
  }

  function push() {
      $args = func_get_args();
      $num_args = func_num_args();
      $this->push_row( $args, $num_args );
  }


  /**
   * render the table that holds the title of
   * the InfoTable.
   * @return a TABLEtag
   */
  function build_title_table( ) {
      $attributes = array("width" => "100%",
                          "border" => 0,
                          "cellspacing" => 0,
                          "cellpadding" => 2,
                          "class" => "infotableframe");
      $table = new TABLEtag( $attributes );

      $td = new TDtag( array("class" => "infotabletd") );
      $td->push( $this->title );
      $table->push_row( $td );

      return $table;
  }


  //render the entire table.
  function render( $indent_level, $output_debug=0 ) {

    $attributes = array("width"=>$this->width, "border"=>0,
                        "cellspacing"=>0, "cellpadding"=>1);
    $table = new TABLEtag( $attributes );
    $title_td = new TDtag( array("valign" => "top",
                                 "class" => "infotabletitle") );
    $title_td->push( $this->build_title_table() );
    $table->push_row( $title_td );

    $content_td = new TDtag( array("class" => "infotabletd") );

    $content_table = new TABLEtag( array("width" => "100%",
                                         "border" => 0,
                                         "cellspacing" => 1,
                                         "cellpadding" => 0) );

    //generate the data area
    $tr_rows = $this->render_data_area();
    foreach ($tr_rows as $row) {
      $content_table->push( $row );
    }

    $content_td->push( $content_table );

    $table->push_row( $content_td );

    $html = $table->render( $indent_level, $output_debug );
    return $html;
  }


  //Render the table data
  function render_data_area() {
    $attributes = array("class"=>"infotablecell1");
    $alt_attributes = array("class"=>"infotablecell2");

    //now walk through all of the rows
    //and dump them out.
    $row=0;
    foreach ($this->rows as $item) {
      if ($this->alternating_row_colors && ($row % 2 == 0) ) {
        $tr = new TRtag( $alt_attributes );
      } else {
        $tr = new TRtag( $attributes );
      }
      $row++;

      $x=0;
      $cnt = count ($item);
      foreach( $item as $data ) {
        $x++;
        $td = new TDtag();        

        if (is_object($data)) {
            if ($data->_tag != "<TD>") {
                $td->push( $data, "&nbsp; " );
            } else {
                $td = $data;
                $td->push("&nbsp;");
            }
            if ($x == $cnt && $x < $this->num_cols) {
                $td->set_tag_attribute("colspan", ($this->num_cols - $x) + 1);
            }
            $tr->push( $td );
        } else {
          $td->push( $data, "&nbsp; " );
          if ($x == $cnt && $x < $this->num_cols) {
            $td->set_tag_attribute("colspan", ($this->num_cols - $x) + 1);
          }
          $tr->push( $td );
        }
      }
      $trs[] = $tr;
    }
    return $trs;

  }
}

?>
