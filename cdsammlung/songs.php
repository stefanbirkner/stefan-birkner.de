<?php
/*
  Copyright (C) 2006  Stefan Friedrich Birkner (mail@stefan-birkner.de)
 
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
  
  $Id: songs.php,v 1.1 2006/10/30 20:29:20 silptur Exp $
*/
require_once('set_globals.inc.php');
require_once('db_info.inc.php');
require_once('templates.inc.php');

$num_pages = ceil($num_songs / $config['songs_per_page']);
if(isset($_REQUEST['page'])) {
	$page_no = min($_REQUEST['page'], $num_pages);
} else {
	$page_no = 1;
}

$query = "SELECT Song.*, CD_TITLE, ARTIST_NAME, CD.ARTIST_ID, GENRE_NAME, CD.GENRE_ID FROM Song, CD, Artist, Genre WHERE CD.CD_ID = Song.CD_ID AND CD.ARTIST_ID = Artist.ARTIST_ID AND CD.GENRE_ID = Genre.GENRE_ID ORDER BY SONG_NAME, ARTIST_NAME";
if($page_no > 0) {
	/* show only a specified number of cds */
	$offset = ($page_no - 1) * $config['cds_per_page'];
	$query .= ' LIMIT '.$offset.','.$config['cds_per_page'];
}
$result = mysql_query($query, $config['db_conn']);

$title = $strSongPageTitle; //used by htmlheader.inc.php
echo $doctype; ?>
<html<?php echo $html_attributes; ?>>
	<?php include('htmlheader.inc.php'); ?>
	<body>
		<?php include('topmenu.inc.php'); ?>
		<h2><?php echo $strTMSongs; ?></h2>
		<?php if(!$result) { ?>
			<p>No data!</p>
		<?php } else {
			template_nav_db($page_no, $num_pages, $strSongPage, $strSongFPage,
					$strSongPPage, $strSongNPage, $strSongLPage,
					'songs.php?page=');?>
		<table>
			<tr>
				<th style="width:30%"><?php echo $strSongSong; ?></th>
				<th style="width:20%"><?php echo $strSongArtist; ?></th>
				<th style="width:10%"><?php echo $strSongTime; ?></th>
				<th style="width:30%">CD</th>
				<th style="width:10%"><?php echo $strSongGenre; ?></th>
			</tr>
<?php 
	$i = 0;
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$i++;
?>			<tr<?php if($i%2) echo ' class="even"'; ?>>
				<td><a href="song.php?id=<?php echo $row['SONG_ID']; ?>"><?php echo $row['SONG_NAME']; ?></a></td>
				<td><a href="artist.php?id=<?php echo $row['ARTIST_ID']; ?>"><?php echo $row['ARTIST_NAME']; ?></a></td>
				<td style="text-align:center;"><?php mycddb_format_length_of_time($row['SONG_LEN']); ?></td>
				<td><a href="cd.php?id=<?php echo $row['CD_ID']; ?>"><?php echo $row['CD_TITLE']; ?></a></td>
				<td><a href="genre.php?id=<?php echo $row['GENRE_ID']; ?>"><?php echo ucfirst($row['GENRE_NAME']); ?></a></td>
			<?php } ?>
		</table>
		<?php } ?>
		<?php mycddb_footer(); ?>
	</body>
</html>
