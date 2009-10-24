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
  
  $Id: db_info.inc.php,v 1.3 2006/10/18 19:53:51 silptur Exp $
*/

/*
 * This file sets the values of the following variables:
 * + $num_artists  the number of artists stored in the database
 * + $num_cds      the number of cds stored in the database
 * + $num_genres   the number of genres stored in the database
 * + $num_songs    the number of songs stored in the database
*/
if($area == 'ADMIN') {
	require_once('../set_globals.inc.php');
} else {
	require_once('set_globals.inc.php');
}

$conn = $config["db_conn"];

//rescue the original result
if(isset($result)) {
	$result_backup = $result;
}

$result = mysql_query("SELECT COUNT(*) FROM Artist", $conn);
if ($result) {
	$num_artists = mysql_result($result,0);
} else {
	$num_artists = -1;
}

$result = mysql_query("SELECT COUNT(*) FROM CD", $conn);
if ($result) {
	$num_cds = mysql_result($result,0);
} else {
	$num_cds = -1;
}

$result = mysql_query("SELECT COUNT(*) FROM Genre", $conn);
if ($result) {
	$num_genres = mysql_result($result,0);
} else {
	$num_genres = -1;
}

$result = mysql_query("SELECT COUNT(*) FROM Song", $conn);
if ($result) {
	$num_songs = mysql_result($result,0);
} else {
	$num_songs = -1;
}

//restore the original result
if(isset($result_backup)) {
	$result = $result_backup;
}
