<?php
/*
  Copyright (C) 2006  Stefan Birkner, mail@stefan-birkner.de
 
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
  
  $Id: artists.php,v 1.2 2006/10/18 19:55:09 silptur Exp $
*/
require_once('set_globals.inc.php');
require_once('db_info.inc.php');
require_once('templates.inc.php');
$title = $strArtistPageTitle; //used by htmlheader.inc.php

$num_pages = ceil($num_artists / $config["artists_per_page"]);
if(isset($_REQUEST['page'])) {
	$page_no = min($_REQUEST['page'], $num_pages);
} else {
	$page_no = 1;
}

$query = "SELECT ARTIST_ID, ARTIST_NAME FROM Artist ORDER BY ARTIST_NAME ".$query_suffix;
if($page_no > 0) {
	/* show only a specified number of cds */
	$offset = ($page_no - 1) * $config["artists_per_page"];
	$query .= 'LIMIT '.$offset.','.$config["artists_per_page"];
}
$result = mysql_query($query, $config["db_conn"]);

echo $config["doctype"] ?>
<html<?php echo $config["html_attributes"]; ?>>
	<?php include("htmlheader.inc.php"); ?>
	<body>
		<?php include("topmenu.inc.php"); ?>
		<h2><?php echo $strTMArtists; ?></h2>
		<?php if(!$result) { ?>
			<p>No data!</p>
		<?php } else { 
			template_nav_db($page_no, $num_pages, $strArtistPage, $strArtistFPage,
					$strArtistPPage, $strArtistNPage, $strArtistLPage,
					'artists.php?page=');?>
		<table>
			<tr>
				<th style="text-align:left;"><?php echo $strArtistArtist; ?></th>
			</tr>
			<?php $i = 0;
				while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
				$i++; ?>
			<tr<?php if($i%2) echo ' class="even"'; ?>>
				<td><a href="artist.php?id=<?php echo $row["ARTIST_ID"]; ?>"><?php echo $row["ARTIST_NAME"]; ?></a></td>
			<?php } ?>
		</table>
		<?php } ?>
		<?php include("footer.inc.php"); ?>
	</body>
</html>
