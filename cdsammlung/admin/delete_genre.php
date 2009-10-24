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
  
  $Id: delete_genre.php,v 1.1 2001/09/18 19:33:31 thomyschneider Exp $
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
print_left_menu("ADMIN", "DELETE_GENRE", "");

/*
 * inner table comes here (data)
 */

if ( $admin_is_valid == 0 ) {
  { ?> Not logged in! <?PHP }
} else {
  if ($genre) {
    /* check if cds in db for genre */
    $form_genre_name = get_genre_name($genre);
    $form_genre_id = $genre;
    if ( $form_genre_name != -1 ) {
      $form_genre_name=ucwords($form_genre_name);
      $ret = check_genre_for_cds($genre);
      switch ($ret) {
      case -1: /* genre don't exist in db */
	break;
      case 0:  /* no cds for genre and genre exist in db */
	if ($sent) {
	  if ( delete_genre($form_genre_name, $form_genre_id) == 1 ) {
	    echo "<BR><CENTER>$strAdminDeleteGenreReady</CENTER>\n";
	  } else {
	    echo "<BR><CENTER>$strAdminDeleteGenreReady</CENTER>\n";
	  }
	} else {
	  /* not send - print form */
          { ?>
          <FORM method="post" action="<?PHP echo $PHP_SELF ?>">
          <BR><CENTER><H2><?PHP } echo $strAdminDeleteGenreTopTitle; { ?></H2><HR width="50%"></CENTER><BR>
          <TABLE BORDER=0 ALIGN="CENTER" WIDTH="100%" CELLSPACING="0">
          <TR>
          <TH align="left" width="30%"><?PHP } echo $strAdminDeleteGenreText; { ?></TH>
          <TH align="left" width="70%" bgcolor="red">
          <FONT COLOR="WHITE" SIZE="+1"><?PHP } echo $form_genre_name; { ?></FONT>
          </TH>
          </TR>
          <TR>
          <TD ALIGN="center" COLSPAN=2>
          <TABLE BORDER=0 ALIGN="CENTER">
          <TR>
          <TD align="left" colspan=2><HR width="50%"></TD>
          </TR>
          <TR>
          <TH align="center" width="50%" COLSPAN="2">
          <INPUT type=submit value="<?PHP } echo $strAdminDeleteSubmit; { ?>">
          </TH>
          </TR>
          </TABLE>
          </TD>
          </TR>
          </TABLE>
          <INPUT type=hidden name=genre value=<?PHP } echo $form_genre_id; { ?> >
          <INPUT type=hidden name=sent value=1>
          </FORM>
	  <?PHP }
	}
       break;
      default: /* genre exist but have cds in db */
	echo "<BR><CENTER><H3>";
	printf ($strAdminDeleteGenreHaveCD, $ret, $genre, $form_genre_name);
	echo "</H3></CENTER>\n";
	break;
      } /* end of switch */
    } else {
      /* genre don't exist */
      echo "<BR><CENTER>$strAdminDeleteGenreNoExistTop</CENTER>\n";
    }
  } else {
    /* no genre is set */
    echo "<BR><CENTER>$strAdminDeleteGenreNoGenre</CENTER>\n";
  }
}
?>

</TD></TR>
</TABLE></CENTER>

</BODY>
</HTML>
