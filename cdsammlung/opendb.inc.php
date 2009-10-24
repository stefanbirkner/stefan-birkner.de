<?PHP
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
  
  $Id: opendb.inc.php,v 1.2 2001/08/27 12:43:38 thomyschneider Exp $
*/

function connect_db($mysql_server, $mysql_db, $mysql_user, $mysql_pass)
{
	global $strDBConnErrMsg, $strDBConnDbgMsg, $strDBselDBErrMsg;
	$db_debug = 0;
	$conn = @mysql_pconnect($mysql_server, $mysql_user, $mysql_pass);
	
	if ( ! $conn ) {
		$err = mysql_error();
		die ("<B>$strDBConnErrMsg ($mysql_server)!$err</B>");
	} else {
		if ( $db_debug > 0 ) {
			echo "<B>$strDBConnDbgMsg</B>";
		}
		if ( ! mysql_select_db($mysql_db, $conn) ) {
			die ("<B>$strDBSelDBErrMsg!</B>");
		}
	}
	return $conn;
}

if ( ! $config["db_conn"] ) 
{
	$config["db_conn"] = connect_db($mysql_server, $mysql_db, $mysql_user, $mysql_pass);
}

?>
