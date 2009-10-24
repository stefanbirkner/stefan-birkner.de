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
  
  $Id: artist.php,v 1.6 2006/10/18 19:54:15 silptur Exp $
*/
require_once('set_globals.inc.php');
$title = $strArtistPageTitle; //used by htmlheader.inc.php

//test the specified id in order to avoid sql injection attacks
if(ctype_digit($_REQUEST['id'])) {
	$id = $_REQUEST['id'];

	$result = mysql_query("SELECT ARTIST_NAME FROM Artist WHERE ARTIST_ID=$id", $config["db_conn"]);
	if($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$artist = $row["ARTIST_NAME"];
	}
	mysql_free_result($result);

	$query = "SELECT CD_ID, CD_TITLE, CD_CHANGER, NR_IN_CHANGER, TRACKS, CD_LEN, GENRE_NAME FROM CD, Genre WHERE ARTIST_ID = $id AND CD.GENRE_ID = Genre.GENRE_ID;";
	$result = mysql_query($query, $config["db_conn"]);
}
echo $config['doctype'] ?>
<html<?php echo $config['html_attributes']; ?>>
	<?php include('htmlheader.inc.php'); ?>
	<body>
		<?php include('topmenu.inc.php');?>
		<h2><?php echo $artist; ?></h2>
		<?php if(!$result) { ?>
		<p>No data!</p>
		<?php } else { ?>
		<p>CD's: <?php echo mysql_num_rows($result); ?></p>
		<table>
			<tr>
				<th style="text-align:left;width:50%">CD</th>
				<th style="text-align:center;width:10%"><?php echo $strArtistTracks; ?></th>
				<th style="text-align:center;width:10%"><?php echo $strArtistTime; ?></th>
				<th style="text-align:center;width:10%"><?php echo $strArtistGenre; ?></th>
				<th style="text-align:center;width:10%"><?php echo $strArtistChanger; ?></th>
				<th style="text-align:center;width:10%"><?php echo $strArtistSlot; ?></th>
			</tr>
			<?php $i = 0;
				while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
				$i++; ?>
			<tr<?php if($i%2) echo ' class="even"'; ?>>
				<td><a href="cd.php?id=<?php echo $row["CD_ID"]; ?>"><?php echo $row["CD_TITLE"]; ?></a></td>
				<td style="text-align:center"><?php echo $row['TRACKS']; ?></td>
				<td style="text-align:center"><?php echo sprintf("%02d:%02d",((int) ($row['CD_LEN']/60)),((int) ($row['CD_LEN']%60))); ?></td>
				<td style="text-align:center"><?php echo $row['GENRE_NAME']; ?></td>
				<td style="text-align:center"><?php echo $row['CD_CHANGER']; ?></td>
				<td style="text-align:center"><?php echo $row['NR_IN_CHANGER']; ?></td>
			<?php } ?>
		</table>
		<?php } ?>
		<p><?php echo $strArtistOptions; ?>
			<ul>
				<li><a href="admin/edit_artist.php?id=<?php echo $id ?>"><?php echo $strArtistOptionEdit; ?></a></li>
				<li><a href="admin/delete_artist.php?id=<?php echo $id ?>"><?php echo $strArtistOptionDelete; ?></a></li>
			</ul>
		</p>
		<?php include("footer.inc.php"); ?>
	</body>
</html>
