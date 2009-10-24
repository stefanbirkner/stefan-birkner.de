<?php
/*
  Copyright (C) 2006  Stefan Friedrich Birkner (mail@stefan-birkner.de)
 
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
  
  $Id: templates.inc.php,v 1.3 2006/10/30 20:28:53 silptur Exp $
*/

if($area == 'ADMIN') {
	$relDir = '../';
} else {
	$relDir = '';
}

require_once($relDir.'config.inc.php');
require_once($relDir.'select_lang.inc.php');


/**
 * This template prints the footer of each html page.
 */
function mycddb_footer() {
	global $relDir, $app_name, $dict_version, $version;
	echo("<div class=\"footer\">\n");
	echo("\t\t\t<a href=\"".$relDir."about.php\">".$app_name." "
		.htmlentities($dict_version)." ".$version."</a>\n");
	echo("\t\t</div>\n");
}


/**
 * Formats a specified length ot time in seconds to the format mm:ss
 */
function mycddb_format_length_of_time($len) {
	echo sprintf('%02d:%02d', floor($len / 60), $len % 60);
}


/**
 * This template prints the big version of the logo.
 */
function mycddb_logo() {
	global $relDir, $logo_filename, $logo_width, $logo_height, $logo_alternative_text;
	echo('<img src="'.$relDir.$logo_filename.'" width="'.$logo_width.'" height="'
		.$logo_height.'" alt="'.$logo_alternative_text.'" />');
}


/**
 * This template prints the small version of the logo.
 */
function mycddb_small_logo() {
	global $relDir, $logo_small_filename, $logo_small_width;
	global $logo_small_height, $logo_alternative_text;
	echo('<img src="'.$relDir.$logo_small_filename.'" width="'.$logo_small_width
		.'" height="'.$logo_small_height.'" alt="'.$logo_alternative_text.'" />');
}


/**
 * This template prints the navigation for a table of datasets.
 */
function template_nav_db($page_no, $num_pages, $strPage, $strFirst,
		$strPrevious, $strNext, $strLast, $href) {
	echo("<table>\n");
	echo("\t\t\t<tr>\n");
	echo("\t\t\t\t<th style=\"width:20%;\">".$strPage.": ");
	if($page_no > 0) {
		echo $page_no;
	} else {
		echo "1";
	}
	echo(" / ".$num_pages."</th>\n");
	echo("\t\t\t\t<th style=\"width:20%;\"><a href=\"".$href."1\">".$strFirst."</a></th>\n");
	echo("\t\t\t\t<th style=\"width:20%;\">");
	if($page_no > 1) {
		echo "<a href=\"".$href.($page_no - 1)."\">".$strPrevious."</a>";
	} else {
		echo $strPrevious;
	}
	echo("</th>\n");
	echo("\t\t\t\t<th style=\"width:20%;\">");
	if(($page_no < $num_pages) and ($page_no > 0)) {
		echo "<a href=\"".$href.($page_no + 1)."\">".$strNext."</a>";
	} else {
		echo $strNext;
	}
	echo("</th>\n");
	echo("\t\t\t\t<th style=\"width:20%;\"><a href=\"".$href.$num_pages."\">".$strLast."</a></th>\n");
	echo("\t\t\t</tr>\n");
	echo("\t\t</table>\n");
}
?>
