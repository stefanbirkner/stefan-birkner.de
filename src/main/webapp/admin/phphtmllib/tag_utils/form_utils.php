<?php


//get all the files that this file requires
require_once("$phphtmllib/tag_classes/FORMtag.php");
require_once("$phphtmllib/tag_classes/INPUTtag.php");
require_once("$phphtmllib/tag_classes/OPTIONtag.php");
require_once("$phphtmllib/tag_classes/SELECTtag.php");
require_once("$phphtmllib/tag_classes/TEXTAREAtag.php");



/**
 * render an form open tag only.
 * This is usefull for forms that are inside a table.
 * you would render the form tag first, then the table
 * with the form fields.
 * @param   string  $name - name attribute of the form tag.
 * @param   string  $action - the form action.
 * @param   string  $method - form method
 * @param   string  $attributes - any extra name='value' attributes for
 *                                the form tag.
 * @return  string  returns the raw form tag.
 */
function form_open( $name, $action, $method="GET", $attributes=array(), $indent_level=0 ) {

    $attribs = array("name" => $name, "action" => $action,
                     "method" => $method);
    $attributes = array_merge( $attribs, $attributes);

    $form = new FORMtag( $attributes );
    return $form->_render_tag( $indent_level );
}


/**
 * render a form close tag
 *
 * @return  string - the </form> tag.
 */
function form_close( $indent_level=0 ) {
  $form = new FORMtag;

  //just render the close tag.
  return $form->_render_close_tag( $indent_level );
}



/**
 * build/render an input tag of type text
 *
 * @param   string  $name - the name of the input tag.
 * @param   string  $value - the value of the tag
 * @param   int     $size - the size in characters of the text tag
 * @param   int     $maxlength - the maximum @ of characters for the field
 * @param   array   $attributes - any extra name='value' pair attributes
 * @param   boolean $render_flag - render an object (FALSE) or raw html (TRUE);
 * @return  mixed   either returns an input object (default) or raw html.
 */
function form_text($name, $value=NULL, $size=NULL, $maxlength=NULL,
                   $attributes = array(), $render_flag=FALSE) {
    $attrib = array(
        "name" => $name,
        "type" => "text");

    $attributes = array_merge($attrib, $attributes);

    if ($value != NULL) {
        $attributes["value"] = $value;
    }
    if ($size != NULL) {
        $attributes["size"] = $size;
    }
    if ($maxlength != NULL) {
        $attributes["maxlength"] = $maxlength;
    }

    $input = new INPUTtag( $attributes );
    if ($render_flag) {
      return $input->render();
    } else {
      //user wants the object
      return $input;
    }
}


/**
 * build/render an input tag of type password
 *
 * @param   string  $name - the name of the input tag.
 * @param   string  $value - the value of the tag
 * @param   int     $size - the size in characters of the text tag
 * @param   int     $maxlength - the maximum @ of characters for the field
 * @param   array   $attributes - any extra name='value' pair attributes
 * @param   boolean $render_flag - render an object (FALSE) or raw html (TRUE);
 * @return  mixed   either returns an input object (default) or raw html.
 */
function form_password($name, $value=NULL, $size=NULL, $maxlength=NULL,
                       $attributes = array(), $render_flag=FALSE) {
    $attrib = array(
        "name" => $name,
        "type" => "password");

    $attributes = array_merge($attrib, $attributes);

    if ($value != NULL) {
        $attributes["value"] = $value;
    }
    if ($size != NULL) {
        $attributes["size"] = $size;
    }
    if ($maxlength != NULL) {
        $attributes["maxlength"] = $maxlength;
    }

    $input = new INPUTtag( $attributes );
    if ($render_flag) {
      return $input->render();
    } else {
      //user wants the object
      return $input;
    }
 }

/**
 * build/render an input tag of type button
 *
 * @param   string  $name - the name of the input tag.
 * @param   string  $value - the value of the tag
 * @param   array   $attributes - any extra name='value' pair attributes
 * @param   boolean $render_flag - render an object (FALSE) or raw html (TRUE);
 * @return  mixed   either returns an input object (default) or raw html.
 */
function form_button($name, $value=NULL, $attributes=array(), $render_flag=FALSE ) {

    $attrib = array(
        "name" => $name,
        "type" => "button");

    $attributes = array_merge($attrib, $attributes);

    if ($value != NULL) {
        $attributes["value"] = $value;
    }

    $input = new INPUTtag( $attributes );
    if ($render_flag) {
      return $input->render();
    } else {
      return $input;
    }

}

/**
 * build/render an input tag of type submit
 *
 * @param   string  $name - the name of the input tag.
 * @param   string  $value - the value of the tag
 * @param   array   $attributes - any extra name='value' pair attributes
 * @param   boolean $render_flag - render an object (FALSE) or raw html (TRUE);
 * @return  mixed   either returns an input object (default) or raw html.
 */
function form_submit($name, $value=NULL, $attributes=array(), $render_flag=FALSE ){
    $attrib = array(
        "name" => $name,
        "type" => "submit");

    $attributes = array_merge($attrib, $attributes);

    if ($value != NULL) {
        $attributes["value"] = $value;
    }

    $input = new INPUTtag( $attributes );
    if ($render_flag) {
      return $input->render();
    } else {
      return $input;
    }
}

/**
 * build/render an input tag of type image
 *
 * @param   string  $name - the name of the input tag.
 * @param   string  $value - the value of the tag
 * @param   array   $attributes - any extra name='value' pair attributes
 * @param   boolean $render_flag - render an object (FALSE) or raw html (TRUE);
 * @return  mixed   either returns an input object (default) or raw html.
 */
function form_image($name, $value=NULL, $attributes=array(), $render_flag=FALSE ){
    $attrib = array(
        "name" => $name,
        "type" => "image");

    $attributes = array_merge($attrib, $attributes);

    if ($value != NULL) {
        $attributes["value"] = $value;
    }

    $input = new INPUTtag( $attributes );
    if ($render_flag) {
      return $input->render();
    } else {
      return $input;
    }
}


/**
 * build/render an input tag of type radio
 *
 * @param   string  $name - the name of the input tag.
 * @param   string  $value - the value of the tag
 * @param   array   $attributes - any extra name='value' pair attributes
 * @param   boolean $render_flag - render an object (FALSE) or raw html (TRUE);
 * @return  mixed   either returns an input object (default) or raw html.
 */
function form_radio($name, $value=NULL, $attributes=array(), $render_flag=FALSE ){
    $attrib = array(
        "name" => $name,
        "type" => "radio");

    $attributes = array_merge($attrib, $attributes);

    if ($value != NULL) {
        $attributes["value"] = $value;
    }

    $input = new INPUTtag( $attributes );
    if ($render_flag) {
      return $input->render();
    } else {
      return $input;
    }
}


/**
 * build/render an input tag of type hidden
 *
 * @param   string  $name - the name of the input tag.
 * @param   string  $value - the value of the tag
 * @param   array   $attributes - any extra name='value' pair attributes
 * @param   boolean $render_flag - render an object (FALSE) or raw html (TRUE);
 * @return  mixed   either returns an input object (default) or raw html.
 */
function form_hidden($name, $value=NULL, $attributes=array(), $render_flag=FALSE ){
    $attrib = array(
        "name" => $name,
        "type" => "hidden");

    $attributes = array_merge($attrib, $attributes);

    if ($value != NULL) {
        $attributes["value"] = $value;
    }

    $input = new INPUTtag( $attributes );
    if ($render_flag) {
      return $input->render();
    } else {
      return $input;
    }
}

/**
 * build/render an input tag of type CHECKBOX
 *
 * @param   string  $name - the name of the input tag.
 * @param   string  $value - the value of the tag
 * @param   array   $attributes - any extra name='value' pair attributes
 * @param   boolean $render_flag - render an object (FALSE) or raw html (TRUE);
 * @return  mixed   either returns an input object (default) or raw html.
 */
function form_checkbox($name, $value=NULL, $attributes=array(), $render_flag=FALSE ){
    $attrib = array(
        "name" => $name,
        "type" => "checkbox");

    $attributes = array_merge($attrib, $attributes);

    if ($value != NULL) {
        $attributes["value"] = $value;
    }

    $input = new INPUTtag( $attributes );
    if ($render_flag) {
      return $input->render();
    } else {
      return $input;
    }
}


/**
 * build/render an html tag of file
 *
 * @param   string  $name - the name of the input tag.
 * @param   string  $value - the value of the tag
 * @param   array   $attributes - any extra name='value' pair attributes
 * @param   boolean $render_flag - render an object (FALSE) or raw html (TRUE);
 * @return  mixed   either returns an input object (default) or raw html.
 */
function form_file($name, $value=NULL, $attributes=array(), $render_flag=FALSE ){
    $attrib = array(
        "name" => $name,
        "type" => "file");

    $attributes = array_merge($attrib, $attributes);

    if ($value != NULL) {
        $attributes["value"] = $value;
    }

    $input = new INPUTtag( $attributes );
    if ($render_flag) {
      return $input->render();
    } else {
      return $input;
    }
}


//odd html tags here.
//tags that are normally only used inside a form,
//so they live in the form_utils.php

/**
 * build a textarea tag with name and attributes.
 *
 * @author Walt A. Boring
 * @param   string  $name - the name of the textarea tag.
 * @param   string  $value - data to display in the textarea.
 * @param   array   $attributes - any extra name='value' pair attributes
 * @param   boolean $render_flag - render an object (FALSE) or raw html (TRUE);
 * @return  a TEXTAREAtag object.
 */
function form_textarea($name, $value=NULL, $attributes=array(), $render_flag=FALSE) {

    $attrib = array("name" => $name );
    $attributes = array_merge( $attrib, $attributes );

    $textarea = new TEXTAREAtag( $attributes );

    $textarea->newline_after_opentag = FALSE;
    $textarea->push( $value );

    return $textarea;
}

/**
 * Build a select tag with all of its option tags
 *
 * @author Walt A. Boring IV
 * @param   string  $name - name of the select.
 * @param   array   $options - an array of name value pairs for
 *                             the options.  the format is
 *                             array( "LABEL" => VALUE );
 *                             each <option value="VALUE"> LABEL </option>
 *                             ie
 *                             array( "test" => "foo")  would give an option
 *                             of <option value="foo"> test </option>
 * @param   string  $selected - the selected option in
 *                              <option value="foo" SELECTED>foo</option>
 * @return a SELECTtag object.
 */
function form_select($name, $options=array(), $selected="") {

    $select = new SELECTtag( array("name" => $name) );

    while( list($label, $value) = each($options) ) {
        $selected_value = "";
        if ($label == $selected) {
            $selected_value = "SELECTED";
        }
        $attributes = array( "value" => $value, $selected_value );
        $option = new OPTIONtag( $attributes );
        $option->push( $label );
        $select->push( $option );
    }
    return $select;
}


?>
