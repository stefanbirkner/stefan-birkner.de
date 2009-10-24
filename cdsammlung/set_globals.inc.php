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
  
  $Id: set_globals.inc.php,v 1.3 2001/09/12 12:07:17 thomyschneider Exp $
*/

/*
 * 
 */
if ( $area == "ADMIN") {
  require("../config.inc.php");          /* some globals */
  require("../select_lang.inc.php");     /* set language */
  require("../opendb.inc.php");          /* open db      */
} else {
  require("./config.inc.php");
  require("./select_lang.inc.php");
  require("./opendb.inc.php");
}


/*
 * thats all in the moment
 */
?>
