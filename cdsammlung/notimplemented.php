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
  
  $Id: notimplemented.php,v 1.3 2001/08/27 12:43:38 thomyschneider Exp $
*/
if ( $what ) {
  $area = $what;
} else {
  $area = "HOME";
}
include("./htmlheader.inc.php");
//include("./topmenu.inc.php");

//     echo "</table></center>\n";

/*
 * left-menu
 */
echo "<TR>\n";
echo "<TD BGCOLOR=\"#000084\" VALIGN=\"TOP\">\n";

echo "<table align=center BORDER=0 CELLSPACING=0 WIDTH=\"100%\">";
echo "<tr>";
echo "<td bgcolor=\"#000084\">";
echo "&nbsp;";
echo "</td>";
echo "</TR>\n";
echo "</table>\n";

echo "</TD>\n";

/*
 * inner table comes here (data)
 */
     echo "<TD colspan=".($config["top_menu_items"]-1).">\n";

?>

<center>
 <h2>
  <div align=left>
   <b><i><font size="+3" color="red"><br>
   <?PHP
    echo $strERRNotImpl;
   ?>
   </font></i></b>
  </div>
  <img SRC="mycddb_logo.jpg" height=160 width=375 align=TOP alt="MyCD-DB">
 </h2>
</center>
<div align=right><b><font size="+1">by thomy</font></b></div>

<center>
<hr WIDTH="100%"></center>
</TD>
</TR>
</table>
</center>

</body>
</html>
