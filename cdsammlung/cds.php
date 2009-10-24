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
  
  $Id: cds.php,v 1.2 2006/10/18 21:46:23 silptur Exp $
*/
require_once('set_globals.inc.php');
require_once('db_info.inc.php');
require_once('templates.inc.php');
$title = $strCDPageTitle; //used by htmlheader.inc.php

$num_pages = ceil($num_cds / $config['cds_per_page']);
if(isset($_REQUEST['page'])) {
	$page_no = min($_REQUEST['page'], $num_pages);
} else {
	$page_no = 1;
}

$query = "SELECT CD_ID, CD_TITLE, TRACKS, CD_LEN, ARTIST_NAME, CD.ARTIST_ID, GENRE_NAME, CD.GENRE_ID FROM CD, Artist, Genre WHERE CD.ARTIST_ID = Artist.ARTIST_ID AND CD.GENRE_ID = Genre.GENRE_ID ORDER BY CD_TITLE";
if($page_no > 0) {
	/* show only a specified number of cds */
	$offset = ($page_no - 1) * $config['cds_per_page'];
	$query .= ' LIMIT '.$offset.','.$config['cds_per_page'];
}
$result = mysql_query($query, $config['db_conn']);

echo $config['doctype'] ?>
<html<?php echo $config['html_attributes']; ?>>
	<?php include('htmlheader.inc.php'); ?>
	<body>
		<?php include('topmenu.inc.php'); ?>
		<h2><?php echo $strTMCDs; ?></h2>
		<?php if(!$result) { ?>
			<p>No data!</p>
		<?php } else {
			template_nav_db($page_no, $num_pages, $strCDPage, $strCDFPage,
					$strCDPPage, $strCDNPage, $strCDLPage,
					'cds.php?page=');?>
		<table>
			<tr>
				<th style="text-align:left;width:41%">CD</th>
				<th style="text-align:left;width:41%"><?php echo $strCDArtist; ?></th>
				<th style="text-align:center;width:6%"><?php echo $strCDTracks; ?></th>
				<th style="text-align:center;width:6%"><?php echo $strCDTime; ?></th>
				<th style="text-align:left;width:6%"><?php echo $strCDGenre; ?></th>
			</tr>
<?php 
	$i = 0;
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$i++;
?>			<tr<?php if($i%2) echo ' class="even"'; ?>>
				<td><a href="cd.php?id=<?php echo $row['CD_ID']; ?>"><?php echo $row['CD_TITLE']; ?></a></td>
				<td><a href="artist.php?id=<?php echo $row['ARTIST_ID']; ?>"><?php echo $row['ARTIST_NAME']; ?></a></td>
				<td style="text-align:center;"><?php echo $row['TRACKS']; ?></td>
				<td style="text-align:center;"><?php echo sprintf('%02d:%02d', floor($row[CD_LEN] / 60), $row['CD_LEN'] % 60); ?></td>
				<td><a href="genre.php?id=<?php echo $row['GENRE_ID']; ?>"><?php echo ucfirst($row['GENRE_NAME']); ?></a></td>
			<?php } ?>
		</table>
		<?php } ?>
		<?php include("footer.inc.php"); ?>
	</body>
</html>
