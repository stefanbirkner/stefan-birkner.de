<?php
/*
  Copyright (C) 2001  Thomas Schneider, thomyschneider@users.sourceforge.net
 
  This file is part of the MyCD-DB package! For more information
  about MyCD-DB please look at:
  http://mycd-db.sourceforge.net/

  This program is free software; you can redistribute it and/or
  modify it under the terms of the GNU General Public License
  as published by the Free Software Foundation; either version 2
  of the License, or (at your option) any later version.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
  
  $Id: select_lang.inc.php,v 1.4 2001/11/28 08:43:34 thomyschneider Exp $

  This file is original from phpMyAdmin "stolen". Last version was:
  select_lang.inc.php,v 1.6 2001/07/11 22:11:06 loic1 Exp $
*/
/**
 * phpMyAdmin Language Loading File - lolo@phpheaven.net 01may2001
 */



/**
 * Define the path to the translations directory and get some variables
 * from system arrays if 'register_globals' is set to 'off'
 */
$lang_path = 'lang/';


/**
 * All the suported languages have to be listed in the array below.
 * 1. The key key must be the "official" ISO language code and, if required,
 *    the dialect code. It can also contains some informations about the
 *    charset (see the Russian case).
 *    These code are displayed at the starting page of phpMyAdmin.
 * 2. The first of the values associated to the key is used in a regular
 *    expression to find some keywords corresponding to the language inside two
 *    environment variables.
 *    These values contains:
 *    - the "official" ISO language code and, if required, the dialect code
 *      also ('bu' for Bulgarian, 'fr([-_][[:alpha:]]{2})?' for all French
 *      dialects, 'zh[-_]tw' for Chinese traditional...);
 *    - the '|' character (it means 'OR');
 *    - the full language name.
 * 3. The second values associated to the key is the name of the file to load
 *    without the 'inc.php' extension. 
 *
 * Beware that the sorting order (first values associated to keys by
 * alphabetical reverse order in the array) is important: 'zh-tw' (chinese
 * traditional) must be detected before 'zh' (chinese simplified) for
 * example.
 */
$available_languages = array(
//  'bg'         => array('bg|bulgarian', 'bulgarian-win1251'),
//  'ca'         => array('ca|catalan', 'catala'),
//  'cs-iso'     => array('cs|czech', 'czech-iso'),
//  'cs-win1250' => array('cs|czech', 'czech-win1250'),
//  'da'         => array('da|danish', 'danish'),
  'de'         => array('de([-_][[:alpha:]]{2})?|german', 'german'),
  'en'         => array('en([-_][[:alpha:]]{2})?|english',  'english'),
//  'es'         => array('es([-_][[:alpha:]]{2})?|spanish', 'spanish'),
  'fr'         => array('fr([-_][[:alpha:]]{2})?|french', 'french'),
//  'it'         => array('it|italian', 'italian'),
//  'ja'         => array('ja|japanese', 'japanese'),
//  'ko'         => array('ko|korean', 'korean'),
//  'nl'         => array('nl([-_][[:alpha:]]{2})?|dutch', 'dutch'),
//  'no'         => array('no|norwegian', 'norwegian'),
//  'pl'         => array('pl|polish', 'polish'),
//  'pt-br'      => array('pt[-_]br|brazilian portuguese', 'brazilian_portuguese'),
//  'pt'         => array('pt([-_][[:alpha:]]{2})?|portuguese', 'portuguese'),
//  'ru-koi8r'   => array('ru|russian', 'russian-koi8'),
//  'ru-win1251' => array('ru|russian', 'russian-win1251'),
//  'se'         => array('se|swedish', 'swedish'),
//  'th'         => array('th|thai', 'thai'),
//  'zh-tw'      => array('zh[-_]tw|chinese traditional', 'chinese_big5'),
//  'zh'         => array('zh|chinese simplified', 'chinese_gb')
);


if (!defined('__PMA_LANG_DETECT__')) {
    define('__PMA_LANG_DETECT__', 1);

    /**
     * Analyzes some PHP environment variables to find the most probable language
     * that should be used
     *
     * @param   string   string to analyze
     * @param   integer  type of the PHP environment variable which value is $str
     *
     * @global  array    the list of available translations
     * @global  string   the retained translation keyword
     *
     * @access  private
     */
    function pmaLangDetect($str = '', $envType = '')
    {
        global $available_languages;
        global $lang;

        reset($available_languages);
        while (list($key, $value) = each($available_languages)) {
            // $envType =  1 for the 'HTTP_ACCEPT_LANGUAGE' environment variable,
            //             2 for the 'HTTP_USER_AGENT' one
            if (($envType == 1 && eregi('^(' . $value[0] . ')(;q=[0-9]\\.[0-9])?$', $str))
                || ($envType == 2 && eregi('(\(|\[|;[[:space:]])(' . $value[0] . ')(;|\]|\))', $str))) {
                $lang     = $key;
                break;
            }
        }
    } // end of the 'pmcLangDetect()' function

} // end if


/**
 * Get some global variables if 'register_globals' is set to 'off'
 */
if (!empty($HTTP_SERVER_VARS['HTTP_ACCEPT_LANGUAGE']))
    $HTTP_ACCEPT_LANGUAGE = $HTTP_SERVER_VARS['HTTP_ACCEPT_LANGUAGE'];
if (!empty($HTTP_SERVER_VARS['HTTP_USER_AGENT']))
    $HTTP_USER_AGENT = $HTTP_SERVER_VARS['HTTP_USER_AGENT'];
if (!isset($lang)) {
    if (isset($HTTP_GET_VARS) && !empty($HTTP_GET_VARS['lang'])) {
        $lang = $HTTP_GET_VARS['lang'];
    }
    if (isset($HTTP_POST_VARS) && !empty($HTTP_POST_VARS['lang'])) {
        $lang = $HTTP_POST_VARS['lang'];
    }
}


/**
 * Do the work!
 */
// Lang forced
if (!empty($cfgLang)) { 
    $lang = $cfgLang;
}

// If '$lang' is defined, ensure this is a valid translation
if (!empty($lang) && empty($available_languages[$lang])) {
    $lang = '';
}

// Language is not defined yet :
// 1. try to findout users language by checking it's HTTP_ACCEPT_LANGUAGE
//    variable
if (empty($lang) && !empty($HTTP_ACCEPT_LANGUAGE)) {
    $accepted    = explode(',', $HTTP_ACCEPT_LANGUAGE);
    $acceptedCnt = count($accepted);
    reset($accepted);
    for ($i = 0; $i < $acceptedCnt && empty($lang); $i++) { 
      pmaLangDetect($accepted[$i], 1);
    }
}
// 2. try to findout users language by checking it's HTTP_USER_AGENT variable
if (empty($lang) && !empty($HTTP_USER_AGENT)) {
    pmaLangDetect($HTTP_USER_AGENT, 2);
}

// 3. Didn't catch any valid lang : we use the default settings
if (empty($lang)) {
    $lang = $cfgDefaultLang;
}

// Define the associated filename and load the translation
$lang_file = $lang_path . $available_languages[$lang][1] . '.inc.php';
if ( $area == "ADMIN") {
  require('../' . $lang_file);
} else {
  require('./' . $lang_file);
}
?>