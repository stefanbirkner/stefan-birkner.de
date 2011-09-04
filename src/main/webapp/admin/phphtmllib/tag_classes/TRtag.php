<?php

/**
 * Table Row <TR> class.
 *
 * @author      Walter A. Boring IV <waboring@buildabetterweb.com>
 * @version     1.0
 * @since       PHP 4.0.5
 * @abstract
 */
class TRtag extends HTMLTagClass {

    /**
     * Tag definition for class.
     * @var  string
     * @private
     */
    var $_tag = "<TR>";


    /**
     * Holds the default attributes for all <td>'s
     * @var array
     * @private
     */
    var $_default_td_attributes = array();

    //****************************************************************
    // TR specific routines.
    //****************************************************************

  /**
   * Sets the default attributes for <td>'s
   * that are added to the table.  If there are
   * any attributes set for the <td> it won't use
   * the defaults.
   *
   * @param array $attributes - the default attributes
   */
  function set_default_td_attributes( $attributes ) {

     $this->_default_td_attributes = $attributes;
  }


    /**
     * push content onto content stack
     * adds content to tag as a FIFO.
     * You can have n number of parameters.
     * each one will get added in succession to the content.
     *
     * we override this from the parent so we can auto detect if
     * the user is adding raw strings instead of objects.
     * If they are trying to add raw strings, then we wrap that in
     * a TDtag object, since you can't add anything other then a <TD> or
     * <TH> to a <TR>.
     * @param   mixed   $content - either string, or tag object.
     * @access  public
     */
    function push() {
        $args = func_get_args();

        foreach( $args as $content) {
            if (!is_object($content) || (@$content->_tag != "<TD>" &&
                                         @$content->_tag != "<TH>") ) {
                //$content is raw (string)
                //lets wrap it in a <td> object
                $td = new TDtag( $this->_default_td_attributes );
                $td->push( $content );
                HTMLTagClass::push( $td );
            } else {
                //looks like this is some object
                //let the user do it.
                //should we only let them push a
                //<TD> object?
                HTMLTagClass::push( $content );
            }
        }
    }

    /**
     * push content onto content stack
     * adds content to tag as a FIFO
     * You can only add 1 element at a time, and
     * it will be added as a reference.  So you can't do
     * push_reference("something");, since "something" is a
     * static.
     *
     * we override this from the parent so we can auto detect if
     * the user is adding raw strings instead of objects.
     * If they are trying to add raw strings, then we wrap that in
     * a TDtag object, since you can't add anything other then a <TD> or
     * <TH> to a <TR>.
     * @param   mixed   $content - either string, or tag object.
     *                             the tag object gets stored as a
     *                             reference to the original, so you
     *                             can push it, then modify it later.
     * @access  public
     */
    function push_reference( &$content ) {
        if (!is_object($content) || (@$content->_tag != "<TD>" &&
                                     @$content->_tag != "<TH>") ) {
            //$content is raw (string)
            //lets wrap it in a <td> object
            $td = new TDtag;
            $td->push_reference( $content );
            HTMLTagClass::push_reference( $td );
        } else {
            //looks like this is some object
            //let the user do it.
            //should we only let them push a
            //<TD> object?
            HTMLTagClass::push_reference( $content );
        }
    }
} // TRtag

?>
