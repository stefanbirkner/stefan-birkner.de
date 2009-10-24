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
  
  $Id: genrelist.inc.php,v 1.4 2001/09/18 19:33:28 thomyschneider Exp $
*/

function list_all_genres ($req_page) 
{
  global $config, $db_contents;
  global $strBackButton, $strGenrePages, $strGenrePage, $strGenreFPage, $strGenreLPage, $strGenreNPage, $strGenrePPage;
  global $strGenreSong, $strGenreGenre, $strGenreTime, $strGenreGenre, $strGenreDetail, $strGenreTracks;
  global $strGenreChanger, $strGenreSlot;

  $pages = (int) ( $db_contents["genres"]/$config["genres_per_page"]);
  $genres_on_last = (int) ( $db_contents["genres"]%$config["genres_per_page"]);
  $start = 0;
  $offset = 0;
  $i = 0;
  $conn = $config["db_conn"];

  if ( $genres_on_last > 0 ) {
    $pages++;
  }
	
  if ( $req_page > $pages ) {
    $req_page = $pages;
  }
	
  if ( $req_page == 0 ) {
    /* show all genres */
    $start  = 0;
    $offset = $db_contents["genres"];
    $pages  = 1;
  } else {
    $start = $req_page * $config["genres_per_page"] - $config["genres_per_page"];
    $offset = $config["genres_per_page"] ;
  }

  $sql = "SELECT GENRE_ID, GENRE_NAME FROM Genre ORDER BY GENRE_NAME LIMIT $start, $offset";
  $result = mysql_query($sql, $conn);
  if ($result) {
    echo "<CENTER>\n";
    echo "<TABLE BORDER=0 ALIGN=\"CENTER\" WIDTH=\"100%\" CELLSPACING=\"0\">\n";
    echo "<TR bgcolor=\"".$config["tab_head_bg"]."\">\n";
    if ( $req_page == 0 ) {
      echo "<TH align=\"center\">$strGenrePage: 1 / $pages</TH>\n";
    } else {
      echo "<TH align=\"center\">$strGenrePage: $req_page / $pages</TH>\n";
    }
    if ( $req_page == 1 || $req_page == 0 ) {
      echo "<TH align=\"center\">$strGenreFPage</TH>\n";
      echo "<TH align=\"center\">$strGenrePPage</TH>\n";
    } else {
      echo "<TH align=\"center\"><a href=\"genre.php?page=1\">$strGenreFPage</a></TH>\n";
      echo "<TH align=\"center\"><a href=\"genre.php?page=".($req_page-1)."\">$strGenrePPage</a></TH>\n";
    }
    if ( $req_page == $pages || $req_page == 0) {
      echo "<TH align=\"center\">$strGenreNPage</TH>\n";
      echo "<TH align=\"center\">$strGenreLPage</TH>\n";
    } else {
      echo "<TH align=\"center\"><a href=\"genre.php?page=".($req_page+1)."\">$strGenreNPage</a></TH>\n";
      echo "<TH align=\"center\"><a href=\"genre.php?page=".($pages)."\">$strGenreLPage</a></TH>\n";
    }
    echo "</TR>\n</TABLE></CENTER>\n<BR>\n";
    echo "<CENTER>\n";
    echo "<TABLE BORDER=0 ALIGN=\"CENTER\" WIDTH=\"100%\" CELLSPACING=\"0\">\n";
    echo "<TR bgcolor=\"".$config["tab_head_bg"]."\">\n";
    echo "<TH align=\"left\">$strGenreGenre</TH>\n";
    echo "</TR>\n";
    while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
      $i++;
      if ( $i%2 ) {
	echo " <TR bgcolor=\"".$config["tab_even_bg"]."\">\n";
      } else {
	echo " <TR bgcolor=\"".$config["tab_odd_bg"]."\">\n";
      }
      $genre_id   = $row["GENRE_ID"];
      $genre_name = ucwords($row["GENRE_NAME"]);

      echo "  <TD><A HREF=\"genre.php?genre=$genre_id\">$genre_name</A></TD>\n";
      echo "</TR>\n";
    }
    echo "</TABLE></CENTER>\n";
    
  } else {
    echo "<P> No data!</P>";
  }
}


function show_genre_details ( $genre_id, $back ) 
{
  global $config;
  global $strBackButton, $strGenrePages, $strGenrePage, $strGenreFPage, $strGenreLPage, $strGenreNPage, $strGenrePPage, $strGenreDetail;
  global $strGenreSong, $strGenreGenre, $strGenreTime, $strGenreGenre, $strGenreDetail, $strGenreTrack, $strGenreTracks, $strGenreArtist;
  global $strGenreChanger, $strGenreSlot;
  
  $conn = $config["db_conn"];
  $i = 0;
  $n = 0;
  
  $sql = "SELECT CD.CD_ID, CD_TITLE, CD_CHANGER, NR_IN_CHANGER, TRACKS, CD_LEN, ARTIST_NAME, Artist.ARTIST_ID, GENRE_NAME FROM CD, Artist, Genre WHERE CD.ARTIST_ID = Artist.ARTIST_ID AND CD.GENRE_ID = $genre_id AND Genre.GENRE_ID = $genre_id ORDER BY CD_TITLE, ARTIST_NAME";
  $result = mysql_query($sql, $conn);
  if ($result) {
    $cd_numbers = mysql_num_rows($result);
    while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
      while ($field = key($row)) {
	switch ($field) {
	case GENRE_NAME: 
	  $genre_name = ucwords($row["GENRE_NAME"]);
	  break;
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
	case TRACKS:
	  $tracks = $row["TRACKS"];
	  break;
	case CD_LEN:
	  $cdlen = sprintf("%02d:%02d",((int) ($row["CD_LEN"]/60)),((int) ($row["CD_LEN"]%60)));
	  break;
	case GENRE_NAME:
	  $genre = $row["GENRE_NAME"];
	  break;
	case CD_CHANGER:
	  $changer = $row["CD_CHANGER"];
	  break;
	case NR_IN_CHANGER:
	  $slot = $row["NR_IN_CHANGER"];
	  break;
	}
	next ($row);
      }
      if ( $i < 1 ) {
	echo "<CENTER>\n";
	echo "<TABLE BORDER=0 ALIGN=\"CENTER\" WIDTH=\"100%\" CELLSPACING=\"0\">\n";
	echo "<TR>\n";
	echo "<TH align=\"center\" width=\"20%\" BGCOLOR=\"".$config["tab_head_bg"]."\"><font size=\"+1\">$strGenreDetail</font></TH>\n";
	echo "<TH align=\"left\" width=\"70%\" BGCOLOR=\"".$config["tab_head_bg"]."\"><font size=\"+3\">$genre_name</font></TH>\n";
	echo "<TH align=\"right\" width=\"*\"><A HREF=\"$back\">$strBackButton</A></TH>\n";
	echo "</TR>\n";
	echo "</TABLE><BR>\n";
	echo "</CENTER>\n";

	echo "<CENTER>\n";
	echo "<TABLE BORDER=0 ALIGN=\"CENTER\" WIDTH=\"100%\" CELLSPACING=\"0\">\n";
	echo "<TR bgcolor=\"".$config["tab_even_bg"]."\">\n";
	echo " <TH align=\"left\" width=\"25%\">$strGenreGenre</TH>\n";
	echo " <TH align=\"left\" width=\"75%\">$genre_name</TH>\n";
	echo "</TR>\n";
	echo "<TR bgcolor=\"".$config["tab_odd_bg"]."\">\n";
	echo " <TH align=\"left\">CD's</TH>\n";
	echo " <TD align=\"left\">$cd_numbers</TD>\n";
	echo "</TR>\n";
	echo "</TABLE><BR>\n";
	echo "</CENTER>\n";

	echo "<CENTER>\n";
	echo "<TABLE BORDER=0 ALIGN=\"CENTER\" WIDTH=\"100%\" CELLSPACING=\"0\">\n";
	echo " <TR bgcolor=\"".$config["tab_head_bg"]."\">\n";
	echo "  <TH align=\"left\" width=\"34%\">CD</TH>\n";
	echo "  <TH align=\"left\" width=\"34%\">$strGenreArtist</TH>\n";
	echo "  <TH align=\"center\" width=\"8%\">$strGenreTracks</TH>\n";
	echo "  <TH align=\"center\" width=\"8%\">$strGenreTime</TH>\n";
	echo "  <TH align=\"center\" width=\"8%\">$strGenreChanger</TH>\n";
	echo "  <TH align=\"center\" width=\"8%\">$strGenreSlot</TH>\n";
	echo " </TR>\n";
      }
      $i++;
      $n++;
      if ( $n%2 ) {
	echo "<TR bgcolor=\"".$config["tab_even_bg"]."\">\n";
      } else {
	echo "<TR bgcolor=\"".$config["tab_odd_bg"]."\">\n";
      }
      echo "  <TD><a href=\"cd.php?cd=$cd_id\">$cd_name</a></TD>\n";
      echo "  <TD align=\"left\"><a href=\"artist.php?artist=$artist_id\">$artist_name</a></TD>\n";
      echo "  <TD align=\"center\">$tracks</TD>\n";
      echo "  <TD align=\"center\">$cdlen</TD>\n";
      echo "  <TD align=\"center\">$changer</TD>\n";
      echo "  <TD align=\"center\">$slot</TD>\n";
      echo " </TR>\n";
    }
    echo "</TABLE></CENTER>\n";
    
  } else {
    echo "<P> No data!</P>";
  }
  
}

?>
