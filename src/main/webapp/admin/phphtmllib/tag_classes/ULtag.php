<?php

/**
 * <UL> tag class
 */
class ULtag extends HTMLTagClass {

    /**
     * Tag definition for class.
     * subclass defines this value.
     * ie var $tag = "<TABLE>";
     * @var  string
     * @access   private
     */
    var $_tag = "<UL>";

    /**
     * push content onto content stack
     * adds content to tag as a FIFO.
     * You can have n number of parameters.
     * each one will get added in succession to the content.
     *
     * we override this from the parent so we can auto detect if
     * the user is adding raw strings instead of objects.
     * If they are trying to add raw strings, then we wrap that in
     * an LItag object, since you can't add anything other then an <LI>
     * @param   mixed   $content - either string, or tag object.
     * @access  public
     */
    function push() {
        $args = func_get_args();

        foreach( $args as $content) {
            if (!is_object($content) || (@$content->_tag != "<LI>") ) {
                //$content is raw (string)
                //lets wrap it in a <LI> object
                $li = new LItag;
                $li->push( $content );
                HTMLTagClass::push( $li );
            } else {
                //looks like this is some object
                //let the user do it.
                //should we only let them push a
                //<LI> object?
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
     * an LItag object, since you can't add anything other then an <LI>
     * @param   mixed   $content - either string, or tag object.
     *                             the tag object gets stored as a
     *                             reference to the original, so you
     *                             can push it, then modify it later.
     * @access  public
     */
    function push_reference( &$content ) {
        if (!is_object($content) || (@$content->_tag != "<LI>") ) {
            //$content is raw (string)
            //lets wrap it in a <LI> object
            $li = new LItag;
            $li->push_reference( $content );
            HTMLTagClass::push_reference( $li );
        } else {
            //looks like this is some object
            //let the user do it.
            //should we only let them push a
            //<LI> object?
            HTMLTagClass::push_reference( $content );
        }
    }

} //ULtag
?>
