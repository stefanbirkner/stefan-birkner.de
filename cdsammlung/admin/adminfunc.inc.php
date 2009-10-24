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
  
  $Id: adminfunc.inc.php,v 1.5 2001/11/24 14:24:47 thomyschneider Exp $
*/

function auth2user() {
    Header("WWW-authenticate: basic realm=\"MyCD-DB Admin\"");
    Header("HTTP/1.0 401 Unauthorized");
}

function phpauth() 
{
  global $config;
  $ret = 0;

  if (! isset($GLOBALS["PHP_AUTH_USER"]) ) {
    auth2user();
  } else {
    if (($config["admin_user_name"] == $GLOBALS["PHP_AUTH_USER"]) && ($config["admin_user_pw"] == $GLOBALS["PHP_AUTH_PW"])) {
      $ret = 1;
    } else {
      auth2user();
    }
  }
  return $ret;
}

function build_artist_select($selected) {
  global $config, $strAdminArtistSelect;

  $conn = $config["db_conn"];
  $sql = "SELECT ARTIST_ID, ARTIST_NAME FROM Artist ORDER BY ARTIST_NAME ";
  $result = mysql_query($sql, $conn);
  //  echo "<OPTION value=\"-1\"> $strAdminArtistSelect </OPTION>\n";
  if ($selected == -1) {
    echo "<OPTION value=\"-1\" selected=\"selected\">&nbsp;</OPTION>\n";
  } else {
    echo "<OPTION value=\"-1\">&nbsp;</OPTION>\n";
  }
  if ($result) { 
    while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
      if ( $row["ARTIST_ID"] == $selected ) {
	echo "<OPTION value=\"".$row["ARTIST_ID"]."\" selected=\"selected\"> ".$row["ARTIST_NAME"]." </OPTION>\n";
      } else {
	echo "<OPTION value=\"".$row["ARTIST_ID"]."\"> ".$row["ARTIST_NAME"]." </OPTION>\n";
      }
    }
  }
}

/*
 * build the genre list from the database and output as select options
 */
function build_genre_list($selected) 
{
  global $config, $db_contents, $strSearchAny;
  $conn = $config["db_conn"];

  $sql = "SELECT * FROM Genre ORDER BY GENRE_NAME";
  $result = mysql_query($sql, $conn);
  echo "<OPTION value=\"-1\">$strSearchAny</OPTION>\n";
  if ($result) { 
    while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
      if ( $row["GENRE_ID"] == $selected ) {
	echo "<OPTION value=\"".$row["GENRE_ID"]."\" selected=\"selected\">".ucfirst($row["GENRE_NAME"])."</OPTION>\n";
      } else {
	echo "<OPTION value=\"".$row["GENRE_ID"]."\">".ucfirst($row["GENRE_NAME"])."</OPTION>\n";
      }
    }
  }
}

function read_drive_step1($action) {
  global $strAdminReadDriveSubmit;
  
    { ?>
    <BR>
    <FORM method="post" action="<?PHP echo $action ?>">
       <TABLE BORDER=0 ALIGN="CENTER" WIDTH="100%" CELLSPACING="0">
       <TR>
        <TH>Schritt 1: Daten vom CD-Laufwerk einlesen</TH>
       </TR>
       <TR>
        <TH>&nbsp;</TH>
       </TR>
       <TR>
       <TH align="center" width="100%">
       <INPUT type=submit value="<?PHP echo $strAdminReadDriveSubmit; ?>">
       </TH>
       </TR>
       </TABLE>
       <INPUT type=hidden name=sent value=1>
       <INPUT type=hidden name=step value=2>
   </FORM>
   <?PHP }
}
    
function read_drive($action) {

  global $strAdminArtist, $strAdminInsertCDDriveSong;
  
  $cmd= escapeshellcmd('/usr/local/bin/mcdb_discinfo');
  
  exec($cmd, $disc_data, $exit_code);

  if ( ($exit_code != 0) || (count($disc_data) != 2) ) {
    echo "FEHLER!\n";
  } else {
    $id_data = explode(" ", $disc_data[0]);
    $time_data = explode(" ", $disc_data[1]);
    $cd_time=$id_data[(count($id_data)-1)];
    $num_tracks = count ($time_data);
    
    echo $disc_data[0]."<BR>\n";
    echo $disc_data[1]."<BR>\n";
    echo $cd_time."<BR>\n";
    echo $num_tracks."<BR>\n";
    { ?>
    <FORM method="post" action="<?PHP echo $action ?>">
       <TABLE BORDER=0 ALIGN="CENTER" WIDTH="100%" CELLSPACING="0">
       <TR>
       <TH align="center" width="25%"><?PHP echo $strAdminArtist; ?></TH>
       <TH align="left" width="75%">
       <SELECT name=form_artist_name size=3>
	<?PHP }
         build_artist_select(-1);
        { ?>
       </SELECT>
       </TH>
       </TR>
       <TR>
       <TH align="center" width="25%">CD</TH>
       <TH align="left" width="75%">
       <INPUT type=text name=form_cd_name size=50 value="<?PHP echo $form_cd_name; ?>">
       </TH>
       </TR>
       <?PHP
        for ($i = 1; $i <= $num_tracks; $i++) {
	  echo "<TR><TH align=\"center\" width=\"25%\">$strAdminInsertCDDriveSong $i</TH>\n";
	  echo "<TH align=\"left\" width=\"100%\">\n";
	  echo "<INPUT type=text name=\"form_song_name[$i]\" size=50 value=\"".$form_song_name[$i]."\">&nbsp;&nbsp;&nbsp;".sec2norm($time_data[$i-1])."\n";
	  echo "</TH>";
	  echo"</TR>\n";
	}
       ?>
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
       <INPUT type=hidden name=step value=3>
       </FORM>
       <?PHP }
    

  }
  
  
}

function insert_cd_from_drive($step) {

  switch ($step) {
  case 1: read_drive_form1();
    break;
  case 2: read_drive();
    break;
  }

}

function get_artist_name($form_artist_id) {
  global $config;
  $ret = 0;
  
  $conn = $config["db_conn"];

  if ($form_artist_id) {
    /* first check if artist exist amd get the name */
    $sql = "SELECT ARTIST_NAME FROM Artist WHERE ARTIST_ID = '$form_artist_id'";
    $result = mysql_query($sql, $conn);
    if ($result) { 
      $result_numbers = mysql_num_rows($result);
      if ( $result_numbers == 0 ) {
	$ret = -1;
      } else {
	$row = mysql_fetch_array($result, MYSQL_ASSOC);
	$ret =  $row["ARTIST_NAME"];
      }
    } else {
      $ret = -1;
    }
  } else {
    $ret = -1;
  }
  
  return $ret;
}

function update_artist($form_artist_name, $form_artist_id) {
  global $config;
  global $strAdminEditArtistEditOk, $strAdminEditArtistNoExist, $strAdminEditArtistNoValue, $strAdminEditArtistNote;
  global $strAdminEditArtistBack2;
  
  $ret = 0;
  
  $conn = $config["db_conn"];
  $new_artistname = trim ($form_artist_name);
  
  if ($new_artistname) {
    /* first check if artist exist */
    $old_artistname = get_artist_name($form_artist_id);
    if ($old_artistname != -1 ) {
      /* artist is in db */
      $sql_upd = "UPDATE Artist ";
      $sql_val = "SET ARTIST_NAME='$new_artistname' ";
      $sql_where = "WHERE ARTIST_ID = '$form_artist_id'";
      $sql = $sql_upd.$sql_val.$sql_where;
      $result = mysql_query($sql, $conn);
      if ($result) { 
	echo "<BR><CENTER><H2>$strAdminEditArtistEditOk:<BR>$new_artistname</H2><BR><HR></CENTER><BR>\n";
	$ret = 1;
      } else {
	echo "<BR><CENTER><H2>".mysql_error($conn)."</H2><HR></CENTER><BR>\n";
      }
    } else {
      /* artist don't exist in db */
      echo "<BR><CENTER><H2>$strAdminInsertArtistNoExist</H2><HR></CENTER><BR>\n";
    }
  } else {
    echo "<BR><CENTER><H2>$strAdminEditArtistNoValue</H2><HR></CENTER><BR>\n";
	{ ?>
        <BR><CENTER> <?PHP }
	echo "<A HREF=\"../artist.php?artist=$form_artist_id\">$strAdminEditArtistBack2</A><BR></CENTER>";
  }
  
  return $ret;
}

function insert_artist($form_artist_name) {
  global $config;
  global $strAdminInsertArtistInsertOk, $strAdminInsertArtistExist, $strAdminInsertArtistNoValue, $strAdminInsertArtistNote;
  $ret = 0;
  
  $conn = $config["db_conn"];
  $newartist = trim ($form_artist_name);
  
  if ($newartist) {
    /* first check if artist exist */
    $sql = "SELECT * FROM Artist WHERE ARTIST_NAME = '$newartist'";
    $result = mysql_query($sql, $conn);
    if ($result) { 
      $result_numbers = mysql_num_rows($result);
      if ( $result_numbers == 0 ) {
	/* artist not in db */
	$sql_ins = "INSERT INTO Artist (ARTIST_NAME) ";
	$sql_val = "VALUES ('$newartist')";
	$sql = $sql_ins.$sql_val;
	$result = mysql_query($sql, $conn);
	if ($result) { 
	  echo "<BR><CENTER><H2>$strAdminInsertArtistInsertOk:<BR>$newartist</H2>$strAdminInsertArtistNote<BR><BR><HR></CENTER><BR>\n";
	  $ret = 1;
	} else {
	  echo "<BR><CENTER><H2>".mysql_error($conn)."</H2><HR></CENTER><BR>\n";
	}
      } else {
	/* artist exist in db */
	echo "<BR><CENTER><H2>$strAdminInsertArtistExist</H2><HR></CENTER><BR>\n";
      }
    }
  } else {
    echo "<BR><CENTER><H2>$strAdminInsertArtistNoValue</H2><HR></CENTER><BR>\n";
  }

  return $ret;
}

function insert_genre($form_genre_name) {
  global $config;
  global $strAdminInsertGenreInsertOk, $strAdminInsertGenreExist, $strAdminInsertGenreNoValue, $strAdminInsertGenreNote;
  $ret = 0;
  
  $conn = $config["db_conn"];
  $newgenre = trim ($form_genre_name);
  
  if ($newgenre) {
    /* first check if genre exist */
    $sql = "SELECT * FROM Genre WHERE GENRE_NAME = '$newgenre'";
    $result = mysql_query($sql, $conn);
    if ($result) { 
      $result_numbers = mysql_num_rows($result);
      if ( $result_numbers == 0 ) {
	/* genre not in db */
	$sql_ins = "INSERT INTO Genre (GENRE_NAME) ";
	$sql_val = "VALUES ('$newgenre')";
	$sql = $sql_ins.$sql_val;
	$result = mysql_query($sql, $conn);
	if ($result) { 
	  echo "<BR><CENTER><H2>$strAdminInsertGenreInsertOk:<BR>$newgenre</H2>$strAdminInsertGenreNote<BR><BR><HR></CENTER><BR>\n";
	  $ret = 1;
	} else {
	  echo "<BR><CENTER><H2>".mysql_error($conn)."</H2><HR></CENTER><BR>\n";
	}
      } else {
	/* artist exist in db */
	echo "<BR><CENTER><H2>$strAdminInsertGenreExist</H2><HR></CENTER><BR>\n";
      }
    }
  } else {
    echo "<BR><CENTER><H2>$strAdminInsertGenreNoValue</H2><HR></CENTER><BR>\n";
  }

  return $ret;
}

function check_artist_for_cds($artist_id) {
  global $config;
  $ret = 0;

  $conn = $config["db_conn"];

  $ret = get_artist_name($artist_id);
  if ( $ret == 0 ) {
    /* artist exist - now ceck for cds */
    $sql = "SELECT * FROM CD WHERE ARTIST_ID = '$artist_id'";
    $result = mysql_query($sql, $conn);
    if ($result) { 
      $result_numbers = mysql_num_rows($result);
      if ( $result_numbers == 0 ) {
	$ret = 0;
      } else {
        $ret = $result_numbers;
      }
    } else {
      echo "No Data!\n";
      $ret = -1;
    }
  } else {
    /* artist don't exist */
    $ret = -1;
  }
  return $ret;
}

function delete_artist($form_artist_name, $form_artist_id) {
  global $config;
  global $strAdminDeleteArtistDeleteOk, $strAdminDeleteArtistNoExist, $strAdminDeleteArtistNote;
    
  $ret = 0;
  
  $conn = $config["db_conn"];
  $artistname = trim ($form_artist_name);
  
  if ($artistname) {
    /* first check if artist exist */
    $old_artistname = get_artist_name($form_artist_id);
    if ($old_artistname != -1 ) {
      /* artist is in db */
      $sql_del = "DELETE FROM  Artist ";
      $sql_where = "WHERE ARTIST_ID = '$form_artist_id'";
      $sql = $sql_del.$sql_where;
      $result = mysql_query($sql, $conn);
      if ($result) { 
	echo "<BR><CENTER><H2>$strAdminDeleteArtistDeleteOk:<BR>$artistname</H2>$strAdminDeleteArtistNote<BR><BR><HR></CENTER><BR>\n";
	$ret = 1;
      } else {
	echo "<BR><CENTER><H2>".mysql_error($conn)."</H2><HR></CENTER><BR>\n";
	$ret = -1;
      }
    } else {
      /* artist don't exist in db */
      echo "<BR><CENTER><H2>$strAdminDeleteArtistNoExist</H2><HR></CENTER><BR>\n";
      $ret = -1;
    }
  } else {
    $ret = -1;
  }

  return $ret;
}

function get_genre_name($form_genre_id) {
  global $config;
  $ret = 0;
    
  $conn = $config["db_conn"];

  if ($form_genre_id) {
    /* first check if genre exist amd get the name */
    $sql = "SELECT GENRE_NAME FROM Genre WHERE GENRE_ID = '$form_genre_id'";
    $result = mysql_query($sql, $conn);
    if ($result) { 
      $result_numbers = mysql_num_rows($result);
      if ( $result_numbers == 0 ) {
	$ret = -1;
      } else {
	$row = mysql_fetch_array($result, MYSQL_ASSOC);
	$ret = ucfirst($row["GENRE_NAME"]);
      }
    } else {
      $ret = -1;
    }
  } else {
    $ret = -1;
  }
  
  return $ret;
}

function update_genre($form_genre_name, $form_genre_id) {
  global $config;
  global $strAdminEditGenreEditOk, $strAdminEditGenreNoExist, $strAdminEditGenreNoValue, $strAdminEditGenreNote;
  global $strAdminEditGenreBack2;
  
  $conn = $config["db_conn"];
  $new_genrename = trim(strtolower($form_genre_name));
  
  if ($new_genrename) {
    /* first check if genre exist */
    $old_genrename = get_genre_name($form_genre_id);
    if ($old_genrename != -1 ) {
      /* genre is in db */
      $sql_upd = "UPDATE Genre ";
      $sql_val = "SET GENRE_NAME='$new_genrename' ";
      $sql_where = "WHERE GENRE_ID = '$form_genre_id'";
      $sql = $sql_upd.$sql_val.$sql_where;
      $result = mysql_query($sql, $conn);
      if ($result) { 
	$new_genrename=ucwords($new_genrename);
	echo "<BR><CENTER><H2>$strAdminEditGenreEditOk:<BR>$new_genrename</H2><BR><HR></CENTER><BR>\n";
	$ret = 1;
      } else {
	echo "<BR><CENTER><H2>".mysql_error($conn)."</H2><HR></CENTER><BR>\n";
      }
    } else {
      /* genre don't exist in db */
      echo "<BR><CENTER><H2>$strAdminEditGenreNoExist</H2><HR></CENTER><BR>\n";
    }
  } else {
    echo "<BR><CENTER><H2>$strAdminEditGenreNoValue</H2><HR></CENTER><BR>\n";
	{ ?>
        <BR><CENTER> <?PHP }
	echo "<A HREF=\"../genre.php?genre=$form_genre_id\">$strAdminEditGenreBack2</A><BR></CENTER>";
  }
  
  return $ret;
}

function check_genre_for_cds($genre_id) {
  global $config;
  $ret = 0;

  $conn = $config["db_conn"];

  $ret = get_genre_name($genre_id);
  if ( $ret == 0 ) {
    /* genre exist - now ceck for cds */
    $sql = "SELECT * FROM CD WHERE GENRE_ID = '$genre_id'";
    $result = mysql_query($sql, $conn);
    if ($result) { 
      $result_numbers = mysql_num_rows($result);
      if ( $result_numbers == 0 ) {
	$ret = 0;
      } else {
        $ret = $result_numbers;
      }
    } else {
      echo "No Data!\n";
      $ret = -1;
    }
  } else {
    /* genre don't exist */
    $ret = -1;
  }
  return $ret;
}

function delete_genre($form_genre_name, $form_genre_id) {
  global $config;
  global $strAdminDeleteGenreDeleteOk, $strAdminDeleteGenreNoExist, $strAdminDeleteGenreNote;
    
  $ret = 0;
  
  $conn = $config["db_conn"];
  $genrename = trim ($form_genre_name);
  
  if ($genrename) {
    /* first check if genre exist */
    $old_genrename = get_genre_name($form_genre_id);
    if ($old_genrename != -1 ) {
      /* genre is in db */
      $sql_del = "DELETE FROM Genre ";
      $sql_where = "WHERE GENRE_ID = '$form_genre_id'";
      $sql = $sql_del.$sql_where;
      $result = mysql_query($sql, $conn);
      if ($result) { 
	echo "<BR><CENTER><H2>$strAdminDeleteGenreDeleteOk:<BR>$genrename</H2>$strAdminDeleteGenreNote<BR><BR><HR></CENTER><BR>\n";
	$ret = 1;
      } else {
	echo "<BR><CENTER><H2>".mysql_error($conn)."</H2><HR></CENTER><BR>\n";
	$ret = -1;
      }
    } else {
      /* genre don't exist in db */
      echo "<BR><CENTER><H2>$strAdminDeleteGenreNoExist</H2><HR></CENTER><BR>\n";
      $ret = -1;
    }
  } else {
    $ret = -1;
  }

  return $ret;
}


?>