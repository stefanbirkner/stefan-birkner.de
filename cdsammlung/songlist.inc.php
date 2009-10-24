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
  
  $Id: songlist.inc.php,v 1.2 2001/09/06 08:41:00 thomyschneider Exp $
*/

function list_all_songs ($req_page) 
{
	global $config, $db_contents;

	global $strSongPages, $strSongPage, $strSongFPage, $strSongLPage, $strSongNPage, $strSongPPage;
	global $strSongSong, $strSongArtist, $strSongTime, $strSongGenre ;

	$conn  = $config["db_conn"];
	$pages = (int) ( $db_contents["songs"]/$config["songs_per_page"]);
	$songs_on_last = (int) ( $db_contents["songs"]%$config["songs_per_page"]);
	$start = 0;
	$offset = 0;
	$i = 0;

	if ( $songs_on_last > 0 ) {
	  $pages++;
	}
	
	if ( $req_page > $pages ) {
	  $req_page = $pages;
	}
	
	if ( $req_page == 0 ) {
	  /* show all songs */
	  $start  = 0;
	  $offset = $db_contents["songs"];
	  $pages  = 1;
	} else {
	  $start = $req_page * $config["songs_per_page"] - $config["songs_per_page"];
	  $offset = $config["songs_per_page"] ;
	}

	$sql = "SELECT Song.*, CD_TITLE, ARTIST_NAME, CD.ARTIST_ID, GENRE_NAME, CD.GENRE_ID FROM Song, CD, Artist, Genre WHERE CD.CD_ID = Song.CD_ID AND CD.ARTIST_ID = Artist.ARTIST_ID AND CD.GENRE_ID = Genre.GENRE_ID ORDER BY SONG_NAME, ARTIST_NAME LIMIT $start, $offset";
	$result = mysql_query($sql, $conn);
	if ($result) {
		echo "<CENTER>\n";
		echo "<TABLE BORDER=0 ALIGN=\"CENTER\" WIDTH=\"100%\" CELLSPACING=\"0\">\n";
		echo "<TR BGCOLOR=\"".$config["tab_head_bg"]."\">\n";
		if ( $req_page == 0 ) {
		  echo "<TH align=\"center\">$strSongPage: 1 / $pages</TH>\n";
		} else {
		  echo "<TH align=\"center\">$strSongPage: $req_page / $pages</TH>\n";
		}
		if ( $req_page == 1 || $req_page == 0 ) {
		  echo "<TH align=\"center\">$strSongFPage</TH>\n";
		  echo "<TH align=\"center\">$strSongPPage</TH>\n";
		} else {
		  echo "<TH align=\"center\"><a href=\"song.php?page=1\">$strSongFPage</a></TH>\n";
		  echo "<TH align=\"center\"><a href=\"song.php?page=".($req_page-1)."\">$strSongPPage</a></TH>\n";
		}
		if ( $req_page == $pages || $req_page == 0) {
		  echo "<TH align=\"center\">$strSongNPage</TH>\n";
		  echo "<TH align=\"center\">$strSongLPage</TH>\n";
		} else {
		  echo "<TH align=\"center\"><a href=\"song.php?page=".($req_page+1)."\">$strSongNPage</a></TH>\n";
		  echo "<TH align=\"center\"><a href=\"song.php?page=".($pages)."\">$strSongLPage</a></TH>\n";
		}
		echo "</TR>\n</TABLE>\n<BR>\n";
		echo "<TABLE BORDER=0 ALIGN=\"CENTER\" WIDTH=\"100%\" CELLSPACING=\"0\" CELLPADDING=\"2\">\n";
		echo "<TR bgcolor=\"".$config["tab_head_bg"]."\">\n";
		echo "<TH align=\"left\" width=\"30%\">$strSongSong</TH>\n";
		echo "<TH align=\"center\" width=\"10%\">$strSongTime</TH>\n";
		echo "<TH align=\"left\" width=\"20%\">$strSongArtist</TH>\n";
		echo "<TH align=\"left\" width=\"30%\">CD</TH>\n";
		echo "<TH align=\"left\" width=\"10%\">$strSongGenre</TH>\n";
		echo "</TR>\n";
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		        $i++;
		        if ( $i%2 ) {
			  echo "<TR bgcolor=\"".$config["tab_even_bg"]."\">\n";
			} else {
			  echo "<TR bgcolor=\"".$config["tab_odd_bg"]."\">\n";
			}
			while ($field = key($row)) {
				switch ($field) {
				case SONG_ID: 
					$song_id = $row["SONG_ID"];
					break;
				case SONG_NAME: 
					$song = $row["SONG_NAME"];
					break;
				case ARTIST_NAME:
					$artist = $row["ARTIST_NAME"];
					break;
				case ARTIST_ID:
					$artist_id = $row["ARTIST_ID"];
					break;
				case CD_ID: 
					$cd_id = $row["CD_ID"];
					break;
				case CD_TITLE:
					$cd_title = $row["CD_TITLE"];
					break;
				case SONG_LEN:
					$songlen = sprintf("%02d:%02d",((int) ($row["SONG_LEN"]/60)),((int) ($row["SONG_LEN"]%60)));
					break;
				case GENRE_NAME:
					$genre = ucfirst($row["GENRE_NAME"]);
					break;
				case GENRE_ID:
					$genre_id = $row["GENRE_ID"];
					break;
				}
				next ($row);
			}
			echo "<TD><A HREF=\"song.php?song=$song_id\">$song</A></TD>\n";
			echo "<TD align=\"center\">$songlen</TD>\n";
			echo "<TD><A HREF=\"artist.php?artist=$artist_id\">$artist</A></TD>\n";
			echo "<TD><A HREF=\"cd.php?cd=$cd_id\">$cd_title</A></TD>\n";
			echo "<TD><A HREF=\"genre.php?genre=$genre_id\">$genre</A></TD>\n";
			echo "</TR>\n";
		}
		echo "</TABLE></CENTER>\n";
		
	} else {
		echo "<P> No data!</P>";
	}
}


function show_song_details ( $song_id, $back ) 
{
  global $config;
  global $strBackButton, $strSongSong, $strSongArtist, $strSongTime, $strSongGenre ;
  global $strSongDetail, $strSongTrack, $strSongChanger, $strSongSlot;
  
  $conn = $config["db_conn"];
  $i = 0;
  

  $sql = "SELECT Song.*, CD_TITLE, CD_CHANGER, NR_IN_CHANGER, ARTIST_NAME, CD.ARTIST_ID, GENRE_NAME, CD.GENRE_ID FROM Song, CD, Artist, Genre WHERE CD.CD_ID = Song.CD_ID AND CD.ARTIST_ID = Artist.ARTIST_ID AND CD.GENRE_ID = Genre.GENRE_ID AND Song.SONG_ID = $song_id";
  $result = mysql_query($sql, $conn);
  if ($result) {
    $row = mysql_fetch_array($result, MYSQL_ASSOC);
    $song_name = $row["SONG_NAME"];
    $cd_id = $row["CD_ID"];
    $cd_title = $row["CD_TITLE"];
    $changer = $row["CD_CHANGER"];
    $slot = $row["NR_IN_CHANGER"];
    $artist = $row["ARTIST_NAME"];
    $artist_id = $row["ARTIST_ID"];
    $track = $row["SONG_NR"];
    $songlen = sprintf("%02d:%02d",((int) ($row["SONG_LEN"]/60)),((int) ($row["SONG_LEN"]%60)));
    $genre = ucfirst($row["GENRE_NAME"]);
    $genre_id = $row["GENRE_ID"];
    
    echo "<CENTER>\n";
    echo "<TABLE BORDER=0 ALIGN=\"CENTER\" WIDTH=\"100%\" CELLSPACING=\"0\">\n";
    echo "<TR>\n";
    echo "<TH align=\"center\" width=\"20%\" BGCOLOR=\"".$config["tab_head_bg"]."\"><font size=\"+1\">$strSongDetail</font></TH>\n";
    echo "<TH align=\"left\" width=\"70%\" BGCOLOR=\"".$config["tab_head_bg"]."\"><font size=\"+3\">$song_name</font></TH>\n";
    echo "<TH align=\"right\" width=\"*\"><A HREF=\"$back\">$strBackButton</A></TH>\n";
    echo "</TR>\n";
    echo "</TABLE><BR>\n";
    
    echo "<TABLE BORDER=0 ALIGN=\"LEFT\" WIDTH=\"100%\" CELLSPACING=\"0\">\n";
    echo "<TR bgcolor=\"".$config["tab_even_bg"]."\">\n";
    echo " <TH align=\"left\" width=\"25%\">$strSongSong</TH>\n";
    echo " <TH align=\"left\" width=\"75%\">$song_name</TH>\n";
    echo "</TR>\n";
    echo "<TR bgcolor=\"".$config["tab_odd_bg"]."\">\n";
    echo " <TH align=\"left\">$strSongTime</TH>\n";
    echo " <TD align=\"left\">$songlen</TD>\n";
    echo "</TR>\n";
    echo "<TR bgcolor=\"".$config["tab_even_bg"]."\">\n";
    echo " <TH align=\"left\">$strSongTrack</TH>\n";
    echo " <TD align=\"left\">$track</TD>\n";
    echo "</TR>\n";
    echo "<TR bgcolor=\"".$config["tab_odd_bg"]."\">\n";
    echo " <TH align=\"left\">CD</TH>\n";
    echo " <TD><A HREF=\"cd.php?cd=$cd_id\">$cd_title</A></TD>\n";
    echo "</TR>\n";
    echo "<TR bgcolor=\"".$config["tab_even_bg"]."\">\n";
    echo " <TH align=\"left\">$strSongArtist</TH>\n";
    echo " <TD><A HREF=\"artist.php?artist=$artist_id\">$artist</A></TD>\n";
    echo "</TR>\n";
    echo "<TR bgcolor=\"".$config["tab_odd_bg"]."\">\n";
    echo " <TH align=\"left\">$strSongGenre</TH>\n";
    echo " <TD><A HREF=\"genre.php?genre=$genre_id\">$genre</A></TD>\n";
    echo "</TR>\n";
    echo "<TR bgcolor=\"".$config["tab_even_bg"]."\">\n";
    echo " <TH align=\"left\">$strSongChanger</TH>\n";
    echo " <TD align=\"left\">$changer</TD>\n";
    echo "</TR>\n";
    echo "<TR bgcolor=\"".$config["tab_odd_bg"]."\">\n";
    echo " <TH align=\"left\">$strSongSlot</TH>\n";
    echo " <TD align=\"left\">$slot</TD>\n";
    echo "</TR>\n";
          
    echo "</TABLE></CENTER>\n";
  
  } else {
    echo "<P> No data!</P>";
  }
	
}

?>
