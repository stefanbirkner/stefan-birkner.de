<?php

//get the files needed by this class
require_once("$phphtmllib/widgets/BaseWidget.php");
require_once("$phphtmllib/tag_classes/Atag.php");
require_once("$phphtmllib/tag_classes/IMGtag.php");
require_once("$phphtmllib/tag_classes/TABLEtag.php");
require_once("$phphtmllib/tag_classes/TRtag.php");
require_once("$phphtmllib/tag_classes/TDtag.php");

/**
 * This widget creates a N by x visual table of
 * thumbnails.
 *
 */
class ImageThumbnailTable extends BaseWidget {

  /**
   * The name of the css file for this class
   *
   * @private
   */
  var $_css_file = "ImageThumbnail.css";

  /**
   * hold the path on disk to image dir
   *
   * @private
   */
  var $_filedir = NULL;

  /**
   * hold the path on disk to the thumbs
   * that we will create.
   *
   * @private
   */
  var $_thumbsdir = NULL;

  /**
   * hold the url path to the images
   *
   * @private
   */
  var $_urldir = NULL;

  /**
   * hold the list of images from disk
   *
   * @private
   */
  var $_filelist = array();


  /**
   * The number of thumbs to show per page.
   *
   * @private
   */
  var $_thumbsperpage = 10;


  /**
   * The thumbnail image width.
   *
   * @private
   */
  var $_thumb_width = 50;

  /**
   * The thumbnail image height.
   *
   * @private
   */
  var $_thumb_height = 50;


  /**
   * Constructor for this class
   * It just sets the width for the
   * widget.
   *
   * @param int $width - the width of the widget
   * @param int $cols - the number of columns of images
   *                    the default is 5.
   */
  function ImageThumbnailTable( $width = 760, $cols=5, $filedir=NULL, $urldir=NULL,
                                $offset=0 ) {
      $this->set_width( $width );
      $this->set_cols( $cols );
      $this->set_filedir( $filedir );
      $this->set_urldir( $urldir );
      $this->set_offset( $offset );
  }

  /**
   * Set the url for the thumbnail generation
   * script.
   */
  function set_thumbnail_script( $script ) {
      $this->thumbnail_script = $script;
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
   * Set the full path on disk where
   * the images live.
   */
  function set_filedir( $dir ) {
      $this->_filedir = $dir;
      $this->_thumbsdir = $this->_filedir."/thumbs";
  }

  /**
   * Set the base url path where the files
   * live on the web site.
   */
  function set_urldir( $dir ) {
      $this->_urldir = $dir;
  }

  /**
   * set how many columns the user wants
   * to display per row of thumbnails.
   */
  function set_cols( $cols ) {
      $this->columns = $cols;
  }

  /**
   * set how many thumbnails to display 
   * per page.
   */
  function set_thumbs_per_page( $num=10 ) {
      $this->_thumbsperpage = $num;
  }

  /**
   * set offset of which page of thumbs
   * to display
   */
  function set_offset( $offset ) {
      $this->_offset = $offset;
  }

  /**
   * Sets all thumnail dimensions.
   *
   * @param int $width - thumbnail width
   * @param int $height - thumbnail height
   */
  function set_thumbnail_dimensions( $width=50, $height=50 ) { 
      $this->_thumb_width = $width;
      $this->_thumb_height = $height;
  }
   


  /**
   * build the list of images
   * from a directory on disk
   */
  function build_filelist() {
      //First lets get the list
      $this->_filelist = $this->getdirlist( $this->_filedir );
  }


  function getdirlist($dir) {
      $dir=str_replace("%20"," ",$dir);
      $d=array();
      $i=0;
      if(is_dir($dir)) {
          $handle=opendir($dir);
          while ($file = readdir($handle)) {              
              if ($file != "." && $file != "..") { 
                $tmp = strtoupper($file);
                if (strstr($tmp, ".JPG")) {
                  $d[] = $file;
                } elseif (strstr($tmp, ".PNG")){
                  $d[] = $file;
                } elseif (strstr($tmp, ".GIF")) {
                  $d[] = $file;
                }
              }
          }
          closedir($handle); 
      } 
      
      //$di=implode("\n",$d);
      //xmp_var_dump( $d );
      return $d;
}

  /**
   * build the link td.
   *
   */
  function build_link_td( $file ) {
      
      $img_link = $this->thumbnail_script . "?img=";
      $img_link .= $this->_filedir . "/$file&w=50&h=50";
      $filename = "/" .$this->_urldir . "/thumbs/" . $file;
      $img =  html_img($filename, $this->_thumb_width,
                       $this->_thumb_height);
      $img->indent_flag = FALSE;
      $img->newline_after_opentag = FALSE;


      $link = $this->_urldir . "/" . $file;      
      $a = html_a($link, $img, "treenavnormal");

      $td = new TDtag( array("align" => "center"), $a);
      return $td;
  }


  /**
   * This function strips the offset
   */
  function strip_offset( $query_string ) {

     $arr = explode( '&', $query_string );
     $str = '';

     foreach( $arr as $var ) {
         if (($var != '') && (strncmp($var, 'offset', 6) != 0) ) {
           $str .= "&".$var;
         }
     } 
     return $str;
  }  


  function build_page_offset_table() {
      global $PHP_SELF, $QUERY_STRING;

      $attributes = array( "border" => 0, "width" => 200,
                           "cellpadding" => 0, "cellspacing" => 1,
                           "class" => "treenavwrapper" );
      $table = new TABLEtag( $attributes );

      $base_url = $PHP_SELF. "?" . $this->strip_offset( $QUERY_STRING );

      //we just need to render some links
      //to walk thru the pages
      $total = count( $this->_filelist );
      $num_pages = (int)($total / $this->_thumbsperpage);
      if ( (($total % $this->_thumbsperpage) == 0) || ($total == 0)) {
        $num_pages++;
      }
      $tr = new TRtag(array("align" => "right"));

      $td_attributes = array("aligh" => "right",
                             "width" => 50);

      //ok start to add the links
      if ($this->_offset == 0) {
        //we are looking at the first page.
        $tr->push( new TDtag($td_attributes, "first") );
      } else {
        //we aren't on the first page.
        $tr->push( new TDtag( $td_attributes, html_a($base_url."&offset=0", "First")) );
      }

      //render the "prev" link
      if ($this->_offset == 0) {
        //we are looking at the first page.
        $tr->push( new TDtag( $td_attributes, "prev") );
      } else {
        //we aren't on the first page.
        $page = $this->_offset - 1;
        $tr->push( new TDtag( $td_attributes, html_a($base_url."&offset=$page", "Prev")) );
      }

      //Render the "next" link
      if ($this->_offset == $num_pages) {
        //we are looking at the first page.
        $tr->push( new TDtag( $td_attributes, "Next") );
      } else {
        //we aren't on the first page.
        $page = $this->_offset + 1;
        $tr->push( new TDtag( $td_attributes, html_a($base_url."&offset=$page", "Next")) );
      }

      //Render the "Last" link
      if ($this->_offset == $num_pages) {
        //we are looking at the first page.
        $tr->push( new TDtag( $td_attributes, "Last") );
      } else {
        //we aren't on the first page.
        $page = $num_pages;
        $tr->push( new TDtag( $td_attributes, html_a($base_url."&offset=$page", "Last")) );
      }

     $table->push( $tr );

     return $table;
  }



  /**
   * function that will render the widget.
   * child class should override this.
   *
   */
  function build_thumb_table( ) {

      $attributes = array( "border" => 0, "width" => $this->width,
                           "cellpadding" => 0, "cellspacing" => 1,
                           "class" => "treenavwrapper" );
      $table = new TABLEtag( $attributes );

      $cnt = count( $this->_filelist );
      $tr = new TRtag;
      //set the index into the page
      $index = $this->_offset * $this->_thumbsperpage;
      for ($i=$index; $i <= $index + $this->_thumbsperpage; $i++) {
          $tr->push( $this->build_link_td( $this->_filelist[$i] ) );
          
          if ((($i+1) % $this->columns) == 0 && ($i != 0)) {
              $table->push( $tr );
              $tr = new TRtag;
          }
      }

      return $table;
  }


  /**
   * Render the entire widget.  this includes the
   * page offset links, as well as the thumbnails.
   *
   */
  function render( $indent_level=1, $output_debug=0 ) {

      //try and build the list of images
      $this->build_filelist();

      $this->build_thumbnails();

      $attributes = array( "border" => 0, "width" => $this->width,
                           "cellpadding" => 0, "cellspacing" => 1,
                           "class" => "treenavwrapper" );
      $table = new TABLEtag( $attributes );


      //This contains 2 tables.
      //The first table is the index links
      //The second is the thumbnails table

      $table->push_row( new TDtag(array("width" => 200,
                                        "align" => "right"),
                                  $this->build_page_offset_table()) );

      $table->push_row( $this->build_thumb_table() );

      return $table->render( $indent_level, $output_debug );
  }



  /**
   * this function builds a cache dir of thumbnails, so we
   * don't have to render thumbnails every time we hit the
   * thumbnails page.
   *
   */
  function build_thumbnails() {

      //first make sure the thumnail cache dir
      //exists.
      //Lets try and create it.
      $this->_create_thumbnail_cache_dir();

      set_time_limit(120);

      //ok lets walk through each file,
      //create the resized image, and write it
      //to disk.
      $index = $this->_offset * $this->_thumbsperpage;
      for ($i=$index; $i <= $index + $this->_thumbsperpage; $i++) {
          $this->build_thumbnail_file( $this->_filelist[$i] );
      }
  }


  /**
   * Builds a thumbnail version of a file,
   * and writes it to disk.
   *
   * @param string $filename - the filename to thumbnail
   */
  function build_thumbnail_file( $file ) {
      $filename = $this->_filedir . "/" . $file;
      $thumbname = $this->_thumbsdir . "/" . $file;

      if (!file_exists($thumbname)) {
          $type = $this->_get_file_type( $file );      

          //we currently support jpeg and png.
          // Create the image...
          switch( strtolower($type) ) {
              case 'jpg':
                $orig_img = imagecreatefromjpeg($filename);
                break;

              case 'png':
                $orig_img = @imagecreatefrompng($filename);
                break;

              default:
                echo 'Error: Unrecognized image format.';
                exit();
                break;
          }
          
          //Ok we have an Image, lets resize it.
          $o_width = imagesx ($orig_img);    // Original image width
          $o_height = imagesy ($orig_img);    // Original image height

          $img = imagecreate($this->_thumb_width, $this->_thumb_height);
          imagecopyresized($img, $orig_img, 0, 0, 0, 0, 
                           $this->_thumb_width, $this->_thumb_height,
                           $o_width, $o_height);
          imagedestroy($orig_img);

          //Now lets write the image to disk
          $this->write_thumb_to_disk( $file, $img, $type );          
      }
  }


  /**
   * discover the type of image based off of the extension
   *
   * @param string $filename - the filename
   */
  function _get_file_type( $file ) {
      $ext = explode('.', $file);
      $ext = $ext[count($ext)-1];
      switch( strtolower($ext) ) {
          case 'jpeg'  :
            $type = 'jpg';
            break;
            
          default :
            $type = $ext;
            break;
      }

      return $type;
  }


  /**
   * write the image to disk.
   * We assume we have write permissions
   * to the images dir.
   *
   */
  function write_thumb_to_disk( $file, &$img, $type ) {

      $filename = $this->_thumbsdir . "/" . $file;

      //now lets write file to disk.
      switch( strtolower($type) ) {
        case 'jpg':            
            imagejpeg($img, $filename);
            break;

        case 'png':
            imagepng($img, $filename);
            break;
      }
      imagedestroy($img);
  }

  /**
   * Try and create the thumbnail cache dir.
   *
   */
  function _create_thumbnail_cache_dir() {
      $oldmask = umask(0);
      $ret = @mkdir($this->_thumbsdir, 0755);
      @chmod($this->_thumbsdir, 0755);
      umask($oldmask);
  }
}
?>
