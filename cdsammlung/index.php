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
  
  $Id: index.php,v 1.5 2006/10/19 23:06:25 silptur Exp $
*/
require_once('config.inc.php'); //provides app_name
require_once('templates.inc.php');
require_once('select_lang.inc.php');
$title = $app_name; //used by htmlheader.inc.php
echo $doctype; ?>
<html<?php echo $html_attributes; ?>>
	<?php include('htmlheader.inc.php'); ?>
	<body>
		<?php include('topmenu.inc.php'); ?>
		<p style="text-align:center">
			<?php mycddb_logo(); ?>
		</p>
		<h1><?php echo htmlentities($greeting); ?></h1>
		<p><?php echo htmlentities($intro_text); ?></p>
		<form action="search.php" style="text-align:center">
			<input name="query" size="50"/>
			<button type="submit"><?php echo htmlentities(ucfirst($dict_search)); ?></button>
			<a href="search.php"><?php echo htmlentities($dict_extended_search); ?></a>
		</form>
		<?php mycddb_footer(); ?>
	</body>
</html>
