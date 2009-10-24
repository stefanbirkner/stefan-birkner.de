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
  
  $Id: topmenu.inc.php,v 1.13 2006/10/19 23:02:57 silptur Exp $
*/
if($area == 'ADMIN') {
	$hrefAdmin = 'index.php?page=1';
	$relDir = '../';
} else {
	$hrefAdmin = 'admin/index.php?page=1';
	$relDir = '';
}

require_once($relDir.'db_info.inc.php');
require_once($relDir.'select_lang.inc.php');
require_once($relDir.'templates.inc.php');

?><div class="topBar">
			<a style="float:left" href="<?php echo $relDir; ?>index.php">
				<?php echo mycddb_small_logo(); ?></a>
			<table>
				<tr>
					<th style="width:25%;"><a href="<?php echo $relDir; ?>cds.php">
						<?php echo htmlentities(ucfirst($dict_cds)); ?></a></th>
					<th style="width:25%;"><a href="<?php echo $relDir; ?>artists.php">
						<?php echo htmlentities(ucfirst($dict_artists)); ?></a></th>
					<th style="width:25%;"><a href="<?php echo $relDir; ?>songs.php">
						<?php echo htmlentities(ucfirst($dict_songs)); ?></a></th>
					<th style="width:25%;"><a href="<?php echo $relDir; ?>genres.php">
						<?php echo htmlentities(ucfirst($dict_genres)); ?></a></th>
				</tr>
				<tr>
					<td><?php echo $num_cds; ?></td>
					<td><?php echo $num_artists; ?></td>
					<td><?php echo $num_songs; ?></td>
					<td><?php echo $num_genres; ?></td>
				</tr>
			</table>
		</div>

		<div class="loginAndSearchBar">
			<ul>
				<li><a href="<?php echo $hrefAdmin; ?>">
					<?php echo htmlentities(ucfirst($dict_admin)); ?></a></li>
				<li><a href="<?php echo $relDir; ?>search.php">
					<?php echo htmlentities(ucfirst($dict_search)); ?></a></li>
				<li><a href="<?php echo $relDir; ?>about.php">
					<?php echo htmlentities(ucfirst($dict_about)); ?></a></li>
			</ul>
		</div>
