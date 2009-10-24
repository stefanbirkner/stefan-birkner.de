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
  
  $Id: song.php,v 1.4 2001/08/27 12:43:38 thomyschneider Exp $
*/
     $area="SONGS";
     include("./htmlheader.inc.php");
//     include("./topmenu.inc.php");
     include("./songlist.inc.php");
     $back = $HTTP_REFERER;

//     print_menu("SONGS");

     echo "<TR>\n";
     echo "<TD BGCOLOR=\"#000084\" VALIGN=\"TOP\">\n";
	echo "<table align=center BORDER=0 CELLSPACING=0 WIDTH=\"100%\">";
	echo "<tr>";
	echo "<td bgcolor=\"#000084\">";
	     echo "&nbsp;";
	echo "</td>";
	echo "</TR>\n";
	echo "</table>\n";
     /*
      * inner table comes here (data)
      */
     echo "</TD>\n";
     echo "<TD colspan=".($config["top_menu_items"]-1).">\n";

     if ( $song ) {
	     show_song_details($song, $back);
     } else {
	     if ( $page > 0 ) {
	       list_all_songs($page);
	     } else {
	       list_all_songs(0);
	     }
     }

     echo "</TD>\n";
     echo "</TR>\n";
     echo "</table></center>\n";
?>

</body>
</html>
