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
  
  $Id: search.php,v 1.1 2001/09/03 17:03:35 thomyschneider Exp $
*/

$area="SEARCH";
include("./htmlheader.inc.php");
include("./searchlist.inc.php");
$back = $HTTP_REFERER;

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
/*
if (is_array ($HTTP_POST_VARS)) {
  while (list($key, $val) = each($HTTP_POST_VARS)) {
    echo "<B>$key</B>: $val<BR>\n";
  }
} else {
  echo "NEIN!\n";
}
*/

if ($sent) {
  if ($clear) {
    $form_artist_name="";
    $form_cd_name="";
    $form_song_name="";
    $form_genre_id=-1;
    $form_limit=$config["results_p_page_l1"];
  } else {
    search_in_db($form_artist_name, $form_cd_name, $form_song_name, $form_genre_id, $form_limit);
  }
} else {
  $form_genre_id=-1;
  $form_limit=$config["results_p_page_l1"];
}

?>
<FORM method="post" action="<?PHP echo $PHP_SELF ?>">
 <TABLE BORDER=0 ALIGN="CENTER" WIDTH="100%" CELLSPACING="0">
  <TR>
   <TH align="left" width="25%"><?PHP echo $strSearchArtist; ?></TH>
   <TH align="left" width="75%">
    <INPUT type=text name=form_artist_name size=50 value="<?PHP echo $form_artist_name; ?>">
    </TH>
  </TR>
  <TR>
   <TH align="left" width="25%">CD</TH>
   <TH align="left" width="75%">
    <INPUT type=text name=form_cd_name size=50 value="<?PHP echo $form_cd_name; ?>">
    </TH>
  </TR>
  <TR>
   <TH align="left" width="25%"><?PHP echo $strSearchSong; ?></TH>
   <TH align="left" width="75%">
    <INPUT type=text name=form_song_name size=50 value="<?PHP echo $form_song_name; ?>">
    </TH>
  </TR>
  <TR>
   <TH align="left" width="25%"><?PHP echo $strSearchGenre; ?></TH>
   <TH align="left" width="75%">
    <select name=form_genre_id size="1">
     <?PHP
      build_genre_list($form_genre_id);
      ?> 
    </select>
    </TH>
  </TR>
  <TR>
   <TD align="center" colspan=2><HR width="50%"></TD>
  </TR>
  <TR>
    <TH align="left"><?PHP echo $strSearchLimit; ?></TH>
    <TH align="left">
     <select name=form_limit size="1">
      <?PHP
       build_limit_list($form_limit);
       ?>
     </select>
    </TH>
  </TR>
  <TR>
   <TD align="center" colspan=2><HR width="50%"></TD>
  </TR>
  <TR>
   <TH align="center" width="50%">
    <INPUT type=submit value="<?PHP echo $strSearchSubmit; ?>">
    </TH>
   <TH align="left" width="50%">
    <INPUT type=submit name=clear value="<?PHP echo $strSearchClear; ?>">
    </TH>
  </TR>
 </TABLE>
 <INPUT type=hidden name=sent value=1>
</FORM> 

  </TD>
 </TR>
</table></center>
     
</body>
</html>
