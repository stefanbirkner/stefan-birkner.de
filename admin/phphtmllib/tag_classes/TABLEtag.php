<?php
//
// +----------------------------------------------------------------------+
// | PHP version 4.0                                                      |
// +----------------------------------------------------------------------+
// | Copyright (c) 1997-2001 The PHP Group                                |
// +----------------------------------------------------------------------+
// | This source file is subject to version 2.0 of the PHP license,       |
// | that is bundled with this package in the file LICENSE, and is        |
// | available at through the world-wide-web at                           |
// | http://www.php.net/license/2_02.txt.                                 |
// | If you did not receive a copy of the PHP license and are unable to   |
// | obtain it through the world-wide-web, please send a note to          |
// | license@php.net so we can mail you a copy immediately.               |
// +----------------------------------------------------------------------+
// | Authors: Walter A. Boring IV (waboring@buildabetterweb.com)          |
// +----------------------------------------------------------------------+
//
//
//

//get all the files that this file requires
require_once("$phphtmllib/tag_classes/TRtag.php");

/**
 * Table Class, based off of HTML Tag class.
 *  This renders an html table tag and its
 *  content.
 *
 * @author      Walter A. Boring IV <waboring@buildabetterweb.com>
 * @version     1.0
 * @since       PHP 4.0.5
 * @abstract
 */
class TABLEtag extends HTMLTagClass {

    /**
     * Tag definition for class.
     * @var  string
     * @private
     */
    var $_tag = "<TABLE>";


    /**
     * Holds the default attributes for all <tr>'s
     * @var array
     * @private
     */
    var $_default_row_attributes = array();

    /**
     * Holds the default attributes for all <td>'s
     * @var array
     * @private
     */
    var $_default_col_attributes = array();



  //****************************************************************
  // Table specific routines.
  //****************************************************************

    /**
     * push 1 row (tr) of content.
     * Content can be raw strings, or tag objects.
     * Can push 1 item, or multiple items in call.  Each item
     * will be its own td.  should call push() to push a
     * <TR> object, but we detect it here anyway.
     * This function does not save the content by reference.
     * It copies the content and pushes it into the table.
     * If you want to save a reference use push() instead.
     * @param   mixed    $args    The <td>'s to push for next row
     * @return  string
     * @public
     */
  function push_row( ) {
      $args = func_get_args();
      $tr = new TRtag( $this->_default_row_attributes );
      $tr->set_default_td_attributes( $this->_default_col_attributes );

      for ($x=0; $x <= func_num_args()-1; $x++) {
          if (is_object($args[$x])) {
              if ($content->_tag == "<TD>") {
                   $tr->push( $args[$x] );
               } elseif ($args[$x]->_tag == "<TR>") {
                   //the user is trying to use this
                   //to push a TR object.
                   if ($tr->count_content() >= 1) {
                       //there is already content in
                       //the current tr.  This is an
                       //error, since it doesn't make
                       //sense to push data and a row
                       //inside a row.
                       return -1;
                   } else {
                       //user is using this to add
                       //a row. We'll only add it then
                       //bail.
                       $tr = $args[$x];
                       break;
                   }
               } else {
                   //we need to wrap this in its own td.
                   $tr->push( $args[$x] );
               }
           } else {
               //user is pushing raw string.
               //lets wrap it in a <tr><td>content</td></tr>
               $tr->push( $args[$x] );
           }

      }
      $this->push( $tr );
  }

  /**
   * Sets the default attributes for <tr>'s
   * that are added to the table.  If there are
   * any attributes set for the <tr> it won't use
   * the defaults.
   *
   * @param array $attributes - the default attributes
   */
  function set_default_row_attributes( $attributes ) {

     $this->_default_row_attributes = $attributes;
  }

  /**
   * Sets the default attributes for <td>'s
   * that are added to the table.  If there are
   * any attributes set for the <td> it won't use
   * the defaults.
   *
   * @param array $attributes - the default attributes
   */
  function set_default_col_attributes( $attributes ) {

     $this->_default_col_attributes = $attributes;
  }



  /**
   * update the attributes of a particular element or td.
   *
   * @param int $row    row # of the table to edit
   * @param int $col    column # of the table to edit
   * @param array   $attributes array of name=>value pairs
   * @public
   *
   */
  function set_cell_attributes( $row, $col, $attributes=array() ) {

      if (is_object($this->_content[$row])) {
          if (is_object($this->_content[$row]->_content[$col])) {
              $this->_content[$row]->_content[$col]->set_tag_attributes( $attributes);
          }
      }
  }

  /**
   * update the attributes of a particular row or tr.
   *
   * @param int $row    row # of the table to edit
   * @param int $col    column # of the table to edit
   * @param array   $attributes array of name=>value pairs
   * @public
   *
   */
  function set_row_attributes( $row, $attributes ) {
      if ($this->_content[$row]) {
          $this->_content[$row]->set_tag_attributes( $attributes );
      } else {
          return -1;
      }
  }

  function set_cell_content( $row, $col, $content) {

      $item = &$this->_get_element($row);
      if ( is_object($item) ) {
          $item = &$item->_get_element($col);
          if (is_object($item)) {
              $item->reset_content( $content );
          } else {
              return -1;
          }
      } else {
          return -1;
      }
  }

}

?>
