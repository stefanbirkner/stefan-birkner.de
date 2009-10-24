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
  
  $Id: genre.php,v 1.3 2001/09/18 19:33:27 thomyschneider Exp $
*/
$area="GENRE";

include("./htmlheader.inc.php");
include("./genrelist.inc.php");
include("./leftmenu.inc.php");
$back = $HTTP_REFERER;


if ( $genre ) {
  print_left_menu("GENRE","",$genre);
  show_genre_details($genre, $back);
} else {
  print_left_menu("", "", "");
  if ( $page > 0 ) {
    list_all_genres($page);
  } else {
    list_all_genres(0);
  }
}
?>

</TD>
</TR>
</TABLE></CENTER>

</BODY>
</HTML>
