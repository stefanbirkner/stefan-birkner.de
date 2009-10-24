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
  
  $Id: index.php,v 1.2 2001/09/16 11:46:41 thomyschneider Exp $
*/

$area="ADMIN";
include("../config.inc.php");
include("./adminfunc.inc.php");
if ( $config["admin_auth_intern"] ) {
  $admin_is_valid = phpauth();
} else {
  $admin_is_valid = 1;
}
include("./../htmlheader.inc.php");
include("./../leftmenu.inc.php");

/*
 * inner table comes here (data)
 */

if ( $admin_is_valid == 0 ) {
  { ?> Not logged in! <?PHP }
} else {
  if ( isset($func)) {
    switch ($func) {
    case "cdfromdrive": 
      print_left_menu("ADMIN", "INSERT_CD_FROM_DRIVE", "");
      if ( ! isset($step)) {
	$step=1;
      }
      insert_cd_from_drive($step);
      break;
    default:
      print_left_menu("ADMIN", "EDIT_CD", "");
    }
  } else {
    print_left_menu("ADMIN", "", "");
    { ?> Logged in! <?PHP }
  }
}


?>

</TD></TR>
</table></center>

</body>
</html>
