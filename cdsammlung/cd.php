<?php
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
  
  $Id: cd.php,v 1.6 2006/10/18 21:45:44 silptur Exp $
*/
require_once('select_lang.inc.php');
require_once('set_globals.inc.php');
require_once('templates.inc.php');

//test the specified id in order to avoid sql injection attacks
if(ctype_digit($_REQUEST['id'])) {
	$id = $_REQUEST['id'];

	$result = mysql_query("SELECT ARTIST_NAME, Artist.ARTIST_ID, CD_TITLE, CD_CHANGER, NR_IN_CHANGER, TRACKS, CD_LEN, GENRE_NAME, CD.GENRE_ID FROM Artist, CD, Genre WHERE CD_ID=$id AND CD.ARTIST_ID=Artist.ARTIST_ID AND CD.GENRE_ID = Genre.GENRE_ID", $config['db_conn']);
	if($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$artist = $row['ARTIST_NAME'];
		$artist_id = $row['ARTIST_ID'];
		$cd_title = $row['CD_TITLE'];
		$changer_no = $row['CD_CHANGER'];
		$changer_slot = $row['NR_IN_CHANGER'];
		$tracks = $row['TRACKS'];
		$cd_length = $row['CD_LEN'];
		$genre_id = $row['GENRE_ID'];
		$genre = $row['GENRE_NAME'];
	}
	mysql_free_result($result);

	$query = "SELECT SONG_ID, SONG_NAME, SONG_LEN, SONG_NR FROM Song WHERE CD_ID = $id ORDER BY SONG_NR ASC";
	$result = mysql_query($query, $config['db_conn']);
}

$title = $cd_title;
echo $doctype; ?>
<html<?php echo $html_attributes; ?>>
	<?php include('htmlheader.inc.php'); ?>
	<body>
		<?php include('topmenu.inc.php');?>
		<h2><?php echo $cd_title; ?></h2>
		<?php if(!$result) { ?>
		<p>No data!</p>
		<?php } else { ?>
		<dl>
			<dt><?php echo $strCDArtist; ?></dt>
			<dd><a href="artist.php?id=<?php echo $artist_id; ?>"><?php echo $artist; ?></a></dd>
			<dt><?php echo $strCDTime; ?></dt>
			<dd><?php mycddb_format_length_of_time($cd_length); ?></dd>
			<dt><?php echo $strCDTracks; ?></dt>
			<dd><?php echo $tracks; ?></dd>
			<dt><?php echo $strCDGenre; ?></dt>
			<dd><a href="genre.php?id=<?php echo $genre_id; ?>"><?php echo $genre; ?></a></dd>
			<dt><?php echo $strCDChanger; ?></dt>
			<dd><?php echo $changer_no; ?></dd>
			<dt><?php echo $strCDSlot; ?></dt>
			<dd><?php echo $changer_slot; ?></dd>
		</dl>
		<table>
			<tr>
				<th style="text-align:center;width:10%"><?php echo $strCDTrack; ?></th>
				<th style="text-align:center;width:80%"><?php echo $strCDSong; ?></th>
				<th style="text-align:center;width:10%"><?php echo $strCDTime; ?></th>
			</tr>
			<?php $i = 0;
				while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
				$i++; ?>
			<tr<?php if($i%2) echo ' class="even"'; ?>>
				<td style="text-align:right"><?php echo $row['SONG_NR']; ?></td>
				<td style="text-align:left"><a href="song.php?id=<?php echo $row['SONG_ID']; ?>"><?php echo $row['SONG_NAME']; ?></a></td>
				<td style="text-align:center"><?php mycddb_format_length_of_time($row['SONG_LEN']); ?></td>
			</tr>
			<?php } ?>
		</table>
		<?php } ?>
		<?php mycddb_footer(); ?>
	</body>
</html>
