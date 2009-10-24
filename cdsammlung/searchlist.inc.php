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
  
  $Id: searchlist.inc.php,v 1.1 2001/09/03 17:03:35 thomyschneider Exp $
*/

/*
 * takes a database field and a query string and returns a WHERE clause
 * original from: David Fox at px,sklar.com - see:
 * http://px.sklar.com/section.html?section_id=4
 * - my changes are: = default now AND between words
 *                   = set result in ( ) - better if you have more as
 *                     on condition (esp. OR'ed conditions)
 */
function b_parse($str, $field) {  
  if($str) {  
    $quoted = explode( "\\\"", $str); 
    
    for($i = 0; $i < count($quoted); $i++) { 
      if($i == 0 && !$quoted[$i]) { 
	$begin = True; 
	$i++; 
      } 
      if($begin) { 
	$words[] = $quoted[$i]; 
      } else { 
	$phrase = explode( " ", $quoted[$i]); 
	for($n = 0; $n < count($phrase); $n++) { 
	  if($phrase[$n]) { $words[] = $phrase[$n]; } 
	} 
      } 
      $begin = !$begin; 
    }             
    
    for($i = 0; $i < count($words); $i++) { 
      if($words[$i]) { 
	if($words[$i] == "and" || $words[$i] == "or" || $words[$i] ==  "not" || $words[$i] == "AND" || $words[$i] == "OR" || $words[$i] ==  "NOT") { 
	  if($words[$i] ==  "not" || $words[$i] ==  "NOT") { 
	    $i++; 
	    if($sql_out) { $sql_out .=  " AND "; } 
	    $sql_out .= $field .  " NOT LIKE '%" .
	       $words[$i] .  "%'"; 
	  } elseif($i > 0) { 
	    $sql_out .= " " . strtoupper($words[$i]) . " "; 
	    $boolean = True; 
	  } 
	} else { 
	  if($sql_out && !$boolean) { 
	    $sql_out .=  " AND "; 
	  } 
	  $sql_out .= $field . " LIKE '%" . $words[$i] . "%'"; 
	  $boolean = FALSE; 
	} 
      } 
    } 
  } 
  $sql_out="(".$sql_out.")";
  
  return $sql_out; 
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

/*
 * build the result limit list and output as select options
 */
function build_limit_list($selected) 
{
  global $config, $strSearchNoLimit;

  if ( $config["results_p_page_l1"] == $selected ) {
    echo "<OPTION value=\"".$config["results_p_page_l1"]."\" selected=\"selected\">".$config["results_p_page_l1"]."</OPTION>\n";
  } else {
    echo "<OPTION value=\"".$config["results_p_page_l1"]."\">".$config["results_p_page_l1"]."</OPTION>\n";
  }
  if ( $config["results_p_page_l2"] == $selected ) {
    echo "<OPTION value=\"".$config["results_p_page_l2"]."\" selected=\"selected\">".$config["results_p_page_l2"]."</OPTION>\n";
  } else {
    echo "<OPTION value=\"".$config["results_p_page_l2"]."\">".$config["results_p_page_l2"]."</OPTION>\n";
  }
  if ( 0 == $selected ) {
    echo "<OPTION value=\"0\" selected=\"selected\">".$strSearchNoLimit."</OPTION>\n";
  } else {
    echo "<OPTION value=\"0\" >".$strSearchNoLimit."</OPTION>\n";
  }
}

/*
 * query the db and show the result table
 */
function search_in_db ($form_artist_name, $form_cd_name, $form_song_name, $form_genre_id, $limit) 
{
  global $config, $db_contents;
  global $strBackButton, $strSearchNoResult, $strSearchQuery;
  global $strSearchSong, $strSearchArtist, $strSearchGenre;
  global $strSearchSum, $strSearchShow, $strSearchNothing, $strSearchOnlyGen, $strSearchNoData;
  $conn = $config["db_conn"];
  $search_cond=0;
  $i=0;
  
  $s_artist_name=trim($form_artist_name);
  $s_cd_name=trim($form_cd_name);
  $s_song_name=trim($form_song_name);

  if ($s_artist_name) {
    $q_artist_name=b_parse($s_artist_name, "ARTIST_NAME");
    $where_str=$q_artist_name;
    $search_cond += 1;
  }
  if ($s_cd_name) {
    $q_cd_name=b_parse($s_cd_name, "CD.CD_TITLE");
    $search_cond += 2;
    if ($where_str) {
      $where_str=$where_str." AND ".$q_cd_name;
    } else {
      $where_str=$q_cd_name;
    }
  }
  if ($s_song_name) {
    $search_cond += 4;
    $q_song_name=b_parse($s_song_name, "SONG_NAME");
    if ($where_str) {
      $where_str=$where_str." AND ".$q_song_name;
    } else {
      $where_str=$q_song_name;
    }
  }

  if ($where_str) {
    /* simple search only in genre are not allowed */
    if ($form_genre_id > -1) {
      $search_cond += 8;
      if ($where_str) {
	$where_str=" Genre.GENRE_ID = ".$form_genre_id." AND ".$where_str;
      }
    }
    switch ($search_cond) {
    case 1:
      /* only artists
         - show only artists
	 - order by artists
      */
      $sql = "SELECT ARTIST_NAME, ARTIST_ID FROM Artist WHERE ".$where_str." ORDER BY ARTIST_NAME";
      break;
    case 2:
      /* only cds
	 - show artists and cds and genre
	 - order by cds
      */
      $sql_str   = "SELECT CD_TITLE, CD_ID, CD.ARTIST_ID, ARTIST_NAME, Genre.GENRE_ID, GENRE_NAME FROM CD, Artist, Genre";
      $where_str = $where_str." AND CD.ARTIST_ID = Artist.ARTIST_ID AND CD.GENRE_ID = Genre.GENRE_ID";
      $order_str = "CD_TITLE";
      $sql       = $sql_str." WHERE ".$where_str." ORDER BY ".$order_str;
      break;
    case 3:
      /* artists and cds
	 - show artists and cds and genre
	 - order by artists
      */
      $sql_str   = "SELECT CD_TITLE, CD_ID, CD.ARTIST_ID, ARTIST_NAME, Genre.GENRE_ID, GENRE_NAME FROM CD, Artist, Genre";
      $where_str = $where_str." AND CD.ARTIST_ID = Artist.ARTIST_ID AND CD.GENRE_ID = Genre.GENRE_ID";
      $order_str = "ARTIST_NAME";
      $sql       = $sql_str." WHERE ".$where_str." ORDER BY ".$order_str;
      break;
    case 4:
      /* only songs
	 - show artists and cds and genre and song
	 - order by songs, cds, artists
      */
    case 5:
      /* songs and artists
	 - show artists and cds and genre and song
	 - order by songs, cds, artists
      */
    case 6:
      /* songs and cds
	 - show artists and cds and genre and song
	 - order by songs, cds, artists
      */
    case 7:
      /* songs and cds and artists
	 - show artists and cds and genre and song
	 - order by songs, cds, artists
      */
      $sql_str   = "SELECT CD.CD_ID, CD_TITLE, ARTIST_NAME, CD.ARTIST_ID, CD.GENRE_ID, GENRE_NAME, SONG_NAME, SONG_ID FROM Song, CD, Artist, Genre";
      $where_str = " CD.ARTIST_ID = Artist.ARTIST_ID AND CD.GENRE_ID = Genre.GENRE_ID AND Song.CD_ID = CD.CD_ID AND ".$where_str;
      $order_str = "SONG_NAME, CD_TITLE, ARTIST_NAME";
      $sql       = $sql_str." WHERE ".$where_str." ORDER BY ".$order_str;
      break;
    case 9:
      /* artists and genre
	 - show artists and cds and genre
	 - order by artists, cds
      */
      $sql_str   = "SELECT CD.CD_ID, CD_TITLE, CD:ARTIST_ID, ARTIST_NAME, CD.GENRE_ID, GENRE_NAME FROM CD, Artist, Genre";
      $where_str = " CD.ARTIST_ID = Artist.ARTIST_ID AND CD.GENRE_ID = Genre.GENRE_ID AND ".$where_str;
      $order_str = "ARTIST_NAME, CD_TITLE";
      $sql       = $sql_str." WHERE ".$where_str." ORDER BY ".$order_str;
      break;
    case 10:
      /* cds and genre
	 - show artists and cds and genre
	 - order by cds, artists
      */
      $sql_str   = "SELECT CD.CD_ID, CD_TITLE, CD.ARTIST_ID, ARTIST_NAME, CD.GENRE_ID, GENRE_NAME FROM CD, Artist, Genre";
      $where_str = " CD.ARTIST_ID = Artist.ARTIST_ID AND CD.GENRE_ID = Genre.GENRE_ID AND ".$where_str;
      $order_str = "CD_TITLE, ARTIST_NAME";
      $sql       = $sql_str." WHERE ".$where_str." ORDER BY ".$order_str;
      break;
    case 11:
      /* artists and cds and genre
	 - show artists and cds and genre
	 - order by artists, cds
      */
      $sql_str   = "SELECT CD.CD_ID, CD_TITLE, CD.ARTIST_ID, ARTIST_NAME, CD.GENRE_ID, GENRE_NAME FROM CD, Artist, Genre";
      $where_str = " CD.ARTIST_ID = Artist.ARTIST_ID AND CD.GENRE_ID = Genre.GENRE_ID AND ".$where_str;
      $order_str = "ARTIST_NAME, CD_TITLE";
      $sql       = $sql_str." WHERE ".$where_str." ORDER BY ".$order_str;
      break;
    case 12:
      /* songs and genre
	 - show artists and cds and genre and song
	 - order by songs, cds, artists
      */
      $sql_str   = "SELECT CD.CD_ID, CD_TITLE, CD.ARTIST_ID, ARTIST_NAME, CD.GENRE_ID, GENRE_NAME, SONG_NAME, SONG_ID FROM Song, CD, Artist, Genre";
      $where_str = " CD.ARTIST_ID = Artist.ARTIST_ID AND CD.GENRE_ID = Genre.GENRE_ID AND Song.CD_ID = CD.CD_ID AND ".$where_str;
      $order_str = "SONG_NAME, CD_TITLE, ARTIST_NAME";
      $sql       = $sql_str." WHERE ".$where_str." ORDER BY ".$order_str;
      break;
    case 13:
      /* artist and songs and genre
	 - show artists and cds and genre and song
	 - order by artists, songs, cds
      */
      $sql_str   = "SELECT CD.CD_ID, CD_TITLE, CD.ARTIST_ID, ARTIST_NAME, CD.GENRE_ID, GENRE_NAME, SONG_NAME, SONG_ID FROM Song, CD, Artist, Genre";
      $where_str = " CD.ARTIST_ID = Artist.ARTIST_ID AND CD.GENRE_ID = Genre.GENRE_ID AND Song.CD_ID = CD.CD_ID AND ".$where_str;
      $order_str = "ARTIST_NAME, SONG_NAME, CD_TITLE";
      $sql       = $sql_str." WHERE ".$where_str." ORDER BY ".$order_str;
      break;
    case 14:
      /* cds and songs and genre
	 - show artists and cds and genre and song
	 - order by cds, songs, artists
      */
      $sql_str   = "SELECT CD.CD_ID, CD_TITLE, CD.ARTIST_ID, ARTIST_NAME, CD.GENRE_ID, GENRE_NAME, SONG_NAME, SONG_ID FROM Song, CD, Artist, Genre";
      $where_str = " CD.ARTIST_ID = Artist.ARTIST_ID AND CD.GENRE_ID = Genre.GENRE_ID AND Song.CD_ID = CD.CD_ID AND ".$where_str;
      $order_str = "SONG_NAME, CD_TITLE, ARTIST_NAME";
      $sql       = $sql_str." WHERE ".$where_str." ORDER BY ".$order_str;
      break;
    case 15:
      /* artists and cds and songs and genre
	 - show artists and cds and genre and song
	 - order by artists, cds, songs
      */
      $sql_str   = "SELECT CD.CD_ID, CD_TITLE, CD.ARTIST_ID, ARTIST_NAME, CD.GENRE_ID, GENRE_NAME, SONG_NAME, SONG_ID FROM Song, CD, Artist, Genre";
      $where_str = " CD.ARTIST_ID = Artist.ARTIST_ID AND CD.GENRE_ID = Genre.GENRE_ID AND Song.CD_ID = CD.CD_ID AND ".$where_str;
      $order_str = "ARTIST_NAME, CD_TITLE, SONG_NAME";
      $sql       = $sql_str." WHERE ".$where_str." ORDER BY ".$order_str;
      break;
    default:
      $where_str = " CD.ARTIST_ID = Artist.ARTIST_ID AND CD.GENRE_ID = Genre.GENRE_ID AND Song.CD_ID = CD.CD_ID AND ".$where_str;
      $sql = "SELECT DISTINCT CD.CD_ID, CD_TITLE, ARTIST_NAME, GENRE_NAME, SONG_NAME FROM Song, CD, Artist, Genre WHERE ".$where_str;
      break;
    }

    // echo "$search_cond<BR>$where_str <BR>\n";
    // echo "<BR>$sql<BR>";
    
    $result = mysql_query($sql, $conn);
    if ($result) {
      $result_numbers = mysql_num_rows($result);
      if ( $result_numbers == 0 ) {
	echo "<CENTER><B>$strSearchNoResult</B><BR><HR></CENTER>\n";
      } else {
	if ( $limit == 0 || $limit > $result_numbers) {
	  $last_result = $result_numbers;
	} elseif ( $limit < $result_numbers ) {
	  $last_result = $limit;
	} 
	for ($j=0; $j < $last_result; $j++) {
	  $row = mysql_fetch_array($result, MYSQL_ASSOC);
	  if ($i == 0 ) {
	    if ($s_artist_name) {
	      $query_info = "$strSearchArtist = $s_artist_name ";
	    }
	    if ($s_cd_name) {
	      if ($s_artist_name) {
		$query_info = $query_info." AND CD = $s_cd_name ";
	      } else {
		$query_info = "CD = $s_cd_name ";
	      }
	    }
	    if ($s_song_name) {
	      if ( $s_artist_name || $s_cd_name) {
		$query_info = $query_info." AND $strSearchSong = $s_song_name ";	    
	      } else {
		$query_info =  "$strSearchSong = $s_song_name ";
	      }
	    }
	    if ($form_genre_id > -1) {
	      if ( $s_artist_name || $s_cd_name || $s_song_name) {
		$query_info = $query_info." AND $strSearchGenre = ".ucfirst($row["GENRE_NAME"]);
	      }
	    }
	    echo "<CENTER>\n";
	    echo "<TABLE BORDER=0 ALIGN=\"CENTER\" WIDTH=\"100%\" CELLSPACING=\"0\">\n";
	    echo "<TR>\n";
	    echo "<TH align=\"center\" width=\"20%\" BGCOLOR=\"".$config["tab_head_bg"]."\"><font size=\"+1\">$strSearchQuery</font></TH>\n";
	    echo "<TH align=\"left\" width=\"80%\" BGCOLOR=\"".$config["tab_head_bg"]."\"><font size=\"+3\">$query_info</font></TH>\n";
	    echo "</TR>\n";
	    echo "<TR>\n";
	    echo "<TH align=\"center\" width=\"25%\" BGCOLOR=\"".$config["tab_even_bg"]."\">$strSearchSum</TH>\n";
	    echo "<TH align=\"left\" width=\"25%\" BGCOLOR=\"".$config["tab_even_bg"]."\">$result_numbers / $last_result $strSearchShow</TH>\n";
	    echo "</TR>\n";
	    echo "</TABLE><BR>\n";
	    echo "</CENTER>\n";
	    echo "<CENTER>\n";
	    echo "<TABLE BORDER=0 ALIGN=\"CENTER\" WIDTH=\"100%\" CELLSPACING=\"0\">\n";
	    echo "<TR bgcolor=\"".$config["tab_head_bg"]."\">\n";
	    switch ($search_cond) {
	    case 1:
	      echo "<TH align=\"left\" width=\"100%\">$strSearchArtist</TH>\n";
	      break;
	    case 2:
	    case 3:
	    case 9:
	    case 10:
	    case 11:
	      echo "<TH align=\"left\" width=\"45%\">CD</TH>\n";
	      echo "<TH align=\"left\" width=\"45%\">$strSearchArtist</TH>\n";
	      echo "<TH align=\"left\" width=\"10%\">$strSearchGenre</TH>\n";
	      break;
	    default:
	      echo "<TH align=\"left\" width=\"30%\">CD</TH>\n";
	      echo "<TH align=\"left\" width=\"30%\">$strSearchArtist</TH>\n";
	      echo "<TH align=\"left\" width=\"30%\">$strSearchSong</TH>\n";
	      echo "<TH align=\"left\" width=\"10%\">$strSearchGenre</TH>\n";
	    }
	    echo "</TR>\n";
	  }
	  while ($field = key($row)) {
	    switch ($field) {
	    case CD_ID: 
	      $cd_id = $row["CD_ID"];
	    break;
	    case CD_TITLE: 
	      $cd_name = $row["CD_TITLE"];
	    break;
	    case ARTIST_NAME:
	      $artist_name = $row["ARTIST_NAME"];
	    break;
	    case ARTIST_ID:
	      $artist_id = $row["ARTIST_ID"];
	    break;
	    case SONG_NAME:
	      $song_name = $row["SONG_NAME"];
	    break;
	    case SONG_ID:
	      $song_id = $row["SONG_ID"];
	    break;
	    case GENRE_NAME:
	      $genre_name = ucfirst($row["GENRE_NAME"]);
	    break;
	    case GENRE_ID:
	      $genre_id = $row["GENRE_ID"];
	    break;
	    }
	    next ($row);
	  }
	  $i++;
	  if ( $i%2 ) {
	    echo "<TR bgcolor=\"".$config["tab_even_bg"]."\">\n";
	  } else {
	    echo "<TR bgcolor=\"".$config["tab_odd_bg"]."\">\n";
	  }
	  switch ($search_cond) {
	  case 1:
	    echo "<TD><A HREF=\"artist.php?artist=$artist_id\">$artist_name</A></TD>\n";
	    break;
	  case 2:
	  case 3:
	  case 9:
	  case 10:
	  case 11:
	    echo "<TD><A HREF=\"cd.php?cd=$cd_id\">$cd_name</A></TD>\n";
	    echo "<TD><A HREF=\"artist.php?artist=$artist_id\">$artist_name</A></TD>\n";
	    echo "<TD><A HREF=\"genre.php?genre=$genre_id\">$genre_name</A></TD>\n";
	    break;
	  default:
	    echo "<TD><A HREF=\"cd.php?cd=$cd_id\">$cd_name</A></TD>\n";
	    echo "<TD><A HREF=\"artist.php?artist=$artist_id\">$artist_name</A></TD>\n";
	    echo "<TD><A HREF=\"song.php?song=$song_id\">$song_name</A></TD>\n";
	    echo "<TD><A HREF=\"genre.php?genre=$genre_id\">$genre_name</A></TD>\n";
	  }
	  echo "</TR>\n";
	} /* end of fetch array */
	echo "</TABLE></CENTER><BR>\n";
      }
    } else {
      echo "<CENTER><B>$strSearchNoData</B><BR><HR></CENTER>\n";
    }
  } else {
    if ($form_genre_id > -1) {
      echo "<CENTER><B>$strSearchOnlyGen</B><BR><HR></CENTER>\n";
    } else {
      echo "<CENTER><B>$strSearchNothing</B><BR><HR></CENTER>\n";
    }
  }
}

?>
