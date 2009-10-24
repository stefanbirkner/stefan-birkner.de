<?php

//get the files needed by this class
require_once("$phphtmllib/widgets/BaseWidget.php");
require_once("$phphtmllib/tag_classes/Atag.php");
require_once("$phphtmllib/tag_classes/DIVtag.php");
require_once("$phphtmllib/tag_classes/TABLEtag.php");
require_once("$phphtmllib/tag_classes/Ptag.php");
require_once("$phphtmllib/tag_classes/TDtag.php");



/**
 * Use this class to render footer navigation that
 * is displayed at the bottom of a page.
 *
 * @author  Walter A. Boring IV
 */
class FooterNav extends BaseWidget {

    /**
     * The name of the css file for this class
     *
     * @private
     */
    var $_css_file = "FooterNav.css";

    /**
     * the company name for the copyright
     * statement.
     *
     * @private
     */
    var $_company_name = "";

    /**
     * The date string for the copyright
     * statement. In form of
     * "2001-1997", or "2001"
     *
     * @private
     */
    var $_date_string = "";

    /**
     * flag to tell us to render the
     * copyright string or not.
     * defaults to TRUE (or on)
     *
     * @private
     */
    var $_render_copyright = TRUE;

    /**
     * url for the Legal statement.
     * if this is non-null, we will
     * render the "Legal Notice" link
     * in the copyright header.
     *
     * @private
     */
    var $_legalnotice_url = NULL;

    /**
     * url for the privacy policy.
     * If this is non-null, we will
     * render the "Privacy Policy" link
     * in the copyright header.
     *
     * @private
     */
    var $_privacypolicy_url = NULL;

    /**
     * email address to contact web site 
     * maintainer.
     *
     * @private
     */
    var $_webmaster_email = NULL;

    /**
     * Constructore for this class.
     *
     * @param   string $company_name - used in the
     *                               - copyright
     * @param   string $date_str - a date string to be used
     *                             for the copyright.
     */
    function FooterNav( $company_name="", $date_str=NULL ) {
        $this->set_company_name( $company_name );
        if ($date_str==NULL) {
            $year = date("Y");
            $this->set_date_string($year);
        }
    }



    /**
     * set the company name for the copyright
     * statement.
     *
     * @param   string - $name
     */
    function set_company_name( $name ) {
        $this->_company_name = $name;
    }

    /**
     * set the date string for the copyright.
     * in the form of "2001-1997", or
     * "2001".
     *
     * @param string - $date_str
     */
    function set_date_string( $date_str ) {
        $this->_date_string = $date_str;
    }

    /**
     * set/unset the flag to tell us to
     * render the copyright string
     *
     * @param boolean - $flag
     */
    function set_copyright_flag( $flag ) {
        $this->_render_copyright = $flag;
    }

    /**
     * set the legal notice url.
     * if this is set we show the
     * legal notice link that points to $url.
     *
     * @param   string - $url
     */
    function set_legalnotice_url( $url ) {
        $this->_legalnotice_url = $url;
    }

    /**
     * sets the Privacy policy url.
     * if this is set we show the
     * privacy policy link that points to $url
     *
     * @param   string - $url
     */
    function set_privacypolicy_url( $url ) {
        $this->_privacypolicy_url = $url;
    }

    /**
     * sets the Webmaster email address
     * if this is set we show the
     * mailto for this email
     *
     * @param   string - $email
     */
    function set_webmaster_email( $email ) {
        $this->_webmaster_email = $email;
    }


    /**
     * add an entry to the footer nav
     *
     * @param   string - $url - url to go to
     * @param   text   - $text - url text to click on.
     */
    function push( $url, $text ) {
        $this->data[] = array( "type" => "url", "url" => $url,
                               "text" => $text );
    }



    //******************************************
    //*   rendering area
    //******************************************


    /**
     * render the code for this widget.
     *
     */
    function render( $indent_level=1, $output_debug=0) {

        //build the wrapper table first.
        $table = $this->build_wrapper_table();
        //$td = new TDtag( array("align" => "center" ));
        $div = new DIVtag( array("style" => "margin: 15 0 0 0") );
        $p = new Ptag(array("class" => "footer"));

        $count = count($this->data);
        $x=0;
        //now walk thru each item and render it.
        foreach( $this->data as $item ) {
            $a = html_a($item['url'], $item['text'], 'foot');
            $x++;
            if ($x == $count) {
                $p->push($a, "&nbsp;&nbsp;&nbsp;");
            } else {
                $p->push( $a, " | ");
            }
        }
        $div->push( $p );
        //$td->push( $div );
        $table->push_row( $div );
        if ($this->_render_copyright) {
            $table->push_row( $this->build_copyright_header() );

        }

        //add the Webmaster email link if Any
        if ($this->_webmaster_email) {
            $span = new SPANtag(array("class" => "trademark"), 
                                mailto($this->_webmaster_email));
            $table->push_row( $span );
            //$table->push_row( mailto($this->_webmaster_email),"&nbsp;&nbsp;" );
        }

        return $table->render( $indent_level, $output_debug );
    }

    /**
     * render the copyright string
     *
     * @return SPANtag object that
     *                 contains the copyright
     *                 header.
     */
    function build_copyright_header() {

        $span = new SPANtag(array("class" => "trademark") );
        $string  = "Copyright @";
        $string .= $this->_date_string . ", ";
        $string .= $this->_company_name. ".  All Rights Reserved.&nbsp;&nbsp;";
        $span->push( $string );

        //add the Legal notice if any
        if ($this->_legalnotice_url) {
            $span->push( html_a($this->_legalnotice_url, "Legal Notice", "notice"),
                         "&nbsp;&nbsp;" );
        }

        //add the Privacy notice if any
        if ($this->_privacypolicy_url) {
            $span->push( html_a($this->_privacypolicy_url, "Privacy Policy", "notice"),
                         "&nbsp;&nbsp;" );
        }

        return $span;
    }


    /**
     * builds the wrapper table
     *
     * @return  TABLEtag object.
     */
    function build_wrapper_table() {

        $attributes = array("width" => $this->width,
                            "border" => 0,
                            "cellpadding" => 0,
                            "cellspacing" => 2);
        $table = new TABLEtag( $attributes );
        $table->set_default_col_attributes( array("align" => "center") );
        return $table;
    }

}
