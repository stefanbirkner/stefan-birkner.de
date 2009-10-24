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
  
  $Id: edit_genre.php,v 1.1 2001/09/18 19:33:31 thomyschneider Exp $
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
print_left_menu("ADMIN", "EDIT_GENRE", "");

/*
 * inner table comes here (data)
 */

if ( $admin_is_valid == 0 ) {
  { ?> Not logged in! <?PHP }
} else {
  if ($sent) {
    if ($clear) {
      $form_genre_name="";
    } else {
      if ( update_genre($form_genre_name, $form_genre_id) == 1 ) {
	{ ?>
          <BR><CENTER>
	 <?PHP }
	$form_genre_name=ucwords($form_genre_name);
	echo "<A HREF=\"../genre.php?genre=$form_genre_id\">$strAdminEditGenreBack $form_genre_name</A><BR></CENTER>";
	$form_genre_name="";
	$form_genre_id  ="";
      }
    }
  } else {
    if ($genre) {
      $form_genre_id=$genre;
      $form_genre_name = get_genre_name($form_genre_id);
      if ($form_genre_name != -1) {
	$form_genre_name=ucwords($form_genre_name);
	{ ?>
        <FORM method="post" action="<?PHP echo $PHP_SELF ?>">
        <BR><CENTER><H2><?PHP } echo $strAdminEditGenreTopTitle; { ?></H2><HR width="50%"></CENTER><BR>
        <TABLE BORDER=0 ALIGN="CENTER" WIDTH="100%" CELLSPACING="0">
        <TR>
         <TH align="center" width="30%"><?PHP } echo $strAdminGenre; { ?></TH>
         <TH align="left" width="70%">
          <INPUT type=text name=form_genre_name size=50 value="<?PHP } echo $form_genre_name; { ?>">
         </TH>
        </TR>
        <TR>
         <TD ALIGN="center" COLSPAN=2>
          <TABLE BORDER=0 ALIGN="CENTER">
          <TR>
           <TD align="left" colspan=2><HR width="50%"></TD>
          </TR>
          <TR>
           <TH align="center" width="50%">
            <INPUT type=submit value="<?PHP } echo $strAdminEditSubmit; { ?>">
           </TH>
          </TR>
          </TABLE>
         </TD>
        </TR>
        </TABLE>
        <INPUT type=hidden name=sent value=1>
        <INPUT type=hidden name=form_genre_id value="<?PHP } echo $form_genre_id; { ?>">
        </FORM>
      <?PHP }
      } else {
	echo "<BR><CENTER>$strAdminEditGenreNoExist<BR></CENTER>";
      }
    } else {
      echo "<BR><CENTER><H2>$strAdminEditGenreNoGenre</H2><BR></CENTER>";
    }
  }
}
?>

</TD></TR>
</TABLE></CENTER>

</BODY>
</HTML>
