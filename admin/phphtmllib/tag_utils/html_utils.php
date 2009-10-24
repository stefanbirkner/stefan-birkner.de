<?php

/**
 * This file contains some utility functions
 * to help build some Tag objects that are
 * commonly used in html.
 * @author Walter A. Boring IV.
 */

//get all the files that this file requires
require_once("$phphtmllib/tag_classes/Atag.php");
require_once("$phphtmllib/tag_classes/Btag.php");
require_once("$phphtmllib/tag_classes/BRtag.php");
require_once("$phphtmllib/tag_classes/CENTERtag.php");
require_once("$phphtmllib/tag_classes/H1tag.php");
require_once("$phphtmllib/tag_classes/H2tag.php");
require_once("$phphtmllib/tag_classes/H3tag.php");
require_once("$phphtmllib/tag_classes/H4tag.php");
require_once("$phphtmllib/tag_classes/H5tag.php");
require_once("$phphtmllib/tag_classes/H6tag.php");
require_once("$phphtmllib/tag_classes/Itag.php");
require_once("$phphtmllib/tag_classes/IMGtag.php");
require_once("$phphtmllib/tag_classes/METAtag.php");
require_once("$phphtmllib/tag_classes/Ptag.php");
require_once("$phphtmllib/tag_classes/PREtag.php");
require_once("$phphtmllib/tag_classes/SPANtag.php");
require_once("$phphtmllib/tag_classes/STRONGtag.php");
require_once("$phphtmllib/tag_classes/XMPtag.php");


/**
 * This builds an IMG tag object that is used
 * to show a spacer image.
 * <img src="spacer.gif" width="$width" height="$height">
 *
 * @author Walter A. Boring IV
 * @param   int $width - the width of the img
 *                       ( DEFAULT : 1)
 * @param   int $height - the height of the img
 *                       ( DEFAULT : 1)
 * @param   string  $img_path - The dir that holds the spacer.gif file.
 *                              ( DEFAULT = "/images" )
 * @return  IMGtag object.
 */
function build_spacergif_imgtag( $width=1, $height=1, $img_path="/images" ) {
    $attributes = array( "src" => "$img_path/spacer.gif",
                         "width" => $width,
                         "height" => $height);
    return html_img( "$img_path/spacer.gif", $width, $height );
}


/**************************
 * HTML_* functions here
 **************************/


/**
 * build an href with content and attributes.
 *
 * @author Walt A. Boring
 * @param   string $url - the url to go to.
 * @param   string $content - the visible link text.
 * @param   string $class - the css class to use.
 * @param   string $target - the target browser 
 *                           window/frame for the url.
 * @return  a BRtag object.
 */
function html_a($url, $content, $class=NULL, $target=NULL) {

    $attributes = array("href" => $url);
    if ($class) {
        $attributes["class"] = $class;
    }
    if ($target) {
        $attributes["target"] = $target;
    }

    $a = new Atag( $attributes, $content, FALSE );

    return $a;
}

/**
 * build a bold <b> tag with content.
 *
 * @author Walt A. Boring
 * @return  a BRtag object.
 */
function html_b() {
    $args = func_get_args();
    $b = new Btag;
    foreach ($args as $content) {
        $b->push( $content );
    }

    return $b;
}

/**
 * build a <br> tag
 *
 * @author Walt A. Boring
 * @return  a BRtag object.
 */
function html_br() {

    $br = new BRtag;
    return $br;
}

/**
 * build a <center> tag with some content.
 *
 * @author Walt A. Boring
 * @param   mixed - n number of arguments
 *                  as content for the tag.
 * @return  a CENTERtag object.
 */
function html_center( ) {
    $args = func_get_args();
    $center = new CENTERtag;
    foreach ($args as $content) {
        $center->push( $content );
    }
    return $center;
}

/**
 * render an html comment string
 *
 * @param   string - the string to comment.
 * @return  string - the string wrapped in
 *                   the html comment block
 */
function html_comment( $string ) {
    return '<!-- ' . $string . ' //-->';
}


/**
 * build an H1 tag object with content.
 *
 * @author Walt A. Boring
 * @param   mixed - n number of arguments
 *                  as content for the tag.
 * @return  H1tag object.
 */
function html_h1( ) {
    $args = func_get_args();
    $h1 = new H1tag;
    foreach( $args as $content) {
        $h1->push( $content );
    }
    return $h1;
}

/**
 * build an H2 tag object with content.
 *
 * @author Walt A. Boring
 * @param   mixed - n number of arguments
 *                  as content for the tag.
 * @return  H2tag object.
 */
function html_h2( ) {
    $args = func_get_args();
    $h2 = new H2tag;
    foreach( $args as $content) {
        $h2->push( $content );
    }
    return $h2;
}


/**
 * build an H3 tag object with content.
 *
 * @author Walt A. Boring
 * @param   mixed - n number of arguments
 *                  as content for the tag.
 * @return  H3tag object.
 */
function html_h3( ) {
    $args = func_get_args();
    $h3 = new H3tag;
    foreach( $args as $content) {
        $h3->push( $content );
    }
    return $h3;
}

/**
 * build an H4 tag object with content.
 *
 * @author Walt A. Boring
 * @param   mixed - n number of arguments
 *                  as content for the tag.
 * @return  H4tag object.
 */
function html_h4( ) {
    $args = func_get_args();
    $h4 = new H4tag;
    foreach( $args as $content) {
        $h4->push( $content );
    }
    return $h4;
}

/**
 * build an H5 tag object with content.
 *
 * @author Walt A. Boring
 * @param   mixed - n number of arguments
 *                  as content for the tag.
 * @return  H5tag object.
 */
function html_h5( ) {
    $args = func_get_args();
    $h5 = new H5tag;
    foreach( $args as $content) {
        $h5->push( $content );
    }
    return $h5;
}


/**
 * build an H6 tag object with content.
 *
 * @author Walt A. Boring
 * @param   mixed - n number of arguments
 *                  as content for the tag.
 * @return  H6tag object.
 */
function html_h6( ) {
    $args = func_get_args();
    $h6 = new H6tag;
    foreach( $args as $content) {
        $h6->push( $content );
    }
    return $h6;
}


/**
 * build a <i> tag with some content.
 *
 * @author Walt A. Boring
 * @param   mixed - n number of arguments
 *                  as content for the tag.
 * @return  a Itag object.
 */
function html_i( ) {
    $args = func_get_args();
    $i = new Itag;
    foreach ($args as $content) {
        $i->push( $content );
    }
    return $i;
}


/**
 * Build an <img> tag.  
 *  If width and or height are not provided
 *  we do not set them in the tag.
 *
 * @author Walter A. Boring IV
 * @param   string - $image - image src
 * @param   int    - $width - width of the image.
 * @param   int    - $heigth - height of the image
 * @param   int    - $border - border flag.
 * @param   string - $alt - alt tag for the image
 * @param   string - $usemap - the image map name
 * @return  IMGtag object.
 */
function html_img( $image, $width='', $height='', $border=0, $alt="", $usemap=NULL ) {
    $attributes = array( "src" => $image,
                         "border" => $border,
                         "alt" => $alt);

    if ($height != '') {
        $attributes["height"] = $height;        
    }
    if ($width != '') {
        $attributes["width"] = $width;
    }

    //only add usemap entry if its not NULL
    if ($usemap) {
        $attributes["usemap"] = $usemap;        
    }

    return new IMGtag( $attributes );
}


/**
 * build an hlink for an image.
 * this automatically turns off indenting
 * and newlines, so it formats well
 * 
 * @param   string - $url - href for the <a>
 * @param   string - $image - src for the <img>
 * @param   int    - $width - width of the image 
 * @param   int    - $height - height of the image
 * @param   int    - $border - for the <img>
 * @param   string - $alt - for the <img ALT="">
 * @param   string - $usemap - the image map name
 * @param   string - $target - the <a target="blah">
 * @return  Atag object with <img> as content 
 *
 */
function html_img_href( $url, $image, $width='', $height='', $border=0, $alt="", $usemap=NULL, $target=NULL) {
    $img = html_img($image, $width, $height, $border, $alt, $usemap);
    $img->newline_after_opentag = FALSE;
    $img->indent_flag = FALSE;
    
    $a = html_a($url, $img, NULL, $target);
    return $a;
}


/**
 * build a <LI> tag with some content..
 *
 * @author Walt A. Boring
 * @param   mixed - n number of arguments
 *                  as content for the tag.
 * @return  a LItag object.
 */
function html_li( ) {
    $args = func_get_args();
    $li = new LItag;
    foreach ($args as $content) {
        $li->push( $content );
    }
    return $li;
}


/**
 * build a <nobr> tag with some content..
 *
 * @author Walt A. Boring
 * @param   mixed - n number of arguments
 *                  as content for the tag.
 * @return  a NOBRtag object.
 */
function html_nobr( ) {
    $args = func_get_args();
    $nobr = new NOBRtag;
    foreach ($args as $content) {
        $nobr->push( $content );
    }
    return $nobr;
}


/**
 * build a <p> tag.
 *
 * @author Walt A. Boring
 * @param   mixed - n number of arguments
 *                  as content for the tag.
 * @return  a Ptag object.
 */
function html_p( ) {
    $args = func_get_args();
    $p = new Ptag;
    foreach ($args as $content) {
        $p->push( $content );
    }
    return $p;
}

/**
 * build a <pre> tag with some content..
 *
 * @author Walt A. Boring
 * @param   mixed - n number of arguments
 *                  as content for the tag.
 * @return  a PREtag object.
 */
function html_pre( ) {
    $args = func_get_args();
    $pre = new PREtag;
    foreach ($args as $content) {
        $pre->push( $content );
    }
    return $pre;
}


/**
 * build a bold <span> tag with content.
 *
 * @author Walt A. Boring
 * @return  a BRtag object.
 */
function html_span() {
    $args = func_get_args();
    $span = new SPANtag;
    foreach ($args as $content) {
        $span->push( $content );
    }

    return $span;
}


/**
 * build a <strong> tag with some content..
 *
 * @author Walt A. Boring
 * @param   mixed - n number of arguments
 *                  as content for the tag.
 * @return  a STRONGtag object.
 */
function html_strong( ) {
    $args = func_get_args();
    $strong = new STRONGtag;
    foreach ($args as $content) {
        $strong->push( $content );
    }
    return $strong;
}


/**
 * build an td tag object with content.
 *
 * @author Walt A. Boring
 * @param   mixed - n number of arguments
 *                  as content for the tag.
 * @return  TDtag object.
 */
function html_td( ) {
    $args = func_get_args();
    $td = new TDtag;
    foreach( $args as $content) {
        $td->push( $content );
    }
    return $td;
}

/**
 * build a <th>$header</th> tag.
 *
 * @author Walt A. Boring
 * @param   string - $header label for the
 *                   content for the tag.
 * @return  a THtag object.
 */
function html_th( $header ) {
    $th = new THtag;
    $th->push( $header );
    return $th;
}


/**
 * build a <title> tag with some content.
 *
 * @author Walt A. Boring
 * @param   mixed - n number of arguments
 *                  as content for the tag.
 * @return  a TITLEtag object.
 */
function html_title( ) {
    $args = func_get_args();
    $title = new TITLEtag;
    foreach ($args as $content) {
        $title->push( $content );
    }
    return $title;
}


/**
 * build a <UL> tag with content 
 * wrapped in an <LI> tag.
 *
 * @author Walt A. Boring
 * @param   mixed - n number of arguments
 *                  as content for the tag.
 * @return  a ULtag object.
 */
function html_ul( ) {
    $args = func_get_args();
    $ul = new ULtag;
    foreach ($args as $content) {
        $ul->push( $content );
    }
    return $ul;
}

/**
 * build a <xmp> tag with some content..
 *
 * @author Walt A. Boring
 * @param   mixed - n number of arguments
 *                  as content for the tag.
 * @return  a XMPtag object.
 */
function html_xmp( ) {
    $args = func_get_args();
    $xmp = new XMPtag;
    foreach ($args as $content) {
        $xmp->push( $content );
    }
    return $xmp;
}

/**
 * build a mailto url link .
 *
 * @author Walt A. Boring
 * @param   string $email - the email address
 *                          for the mailto
 * @return  a CENTERtag object.
 */
function mailto($email){
    return html_a("mailto:$email", "$email");
}

?>
