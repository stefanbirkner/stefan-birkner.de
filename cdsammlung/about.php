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
  
  $Id: about.php,v 1.2 2006/10/18 12:41:23 silptur Exp $
*/
require_once('set_globals.inc.php');
$title = $strAboutPageTitle; //used by htmlheader.inc.php
echo $config["doctype"] ?>
<html<?php echo $config["html_attributes"]; ?>>
	<?php include("htmlheader.inc.php"); ?>
	<body>
		<?php include("topmenu.inc.php"); ?>
		<p style="text-align:center">
			<img src="mycddb_logo.jpg" height="160" width="375" alt="MyCD-DB-Logo" />
		</p>
		<?php if($lang == "de") { ?>
			<h2>Herzlichen Dank, dass sie MyCD-DB verwenden!</h2>
			<p>Sie verwenden die Version <?php echo $config["version"]; ?> von MyCD-DB.</p>
			<p>MyCD-DB unterliegt dem Copyright von Thomas Schneider und wurde unter den
				Bedingungen der GPL (GNU General Public License) ver&ouml;ffentlicht.</p>
			<p>Alle Informationen, neue Releases und Downloads finden Sie unter
				<a href="http://mycd-db.sourceforge.net/">http://mycd-db.sourceforge.net</a>
				bei <a href="http://sourceforge.net/">sourceforge.net</a>.</p>
		<?php } else { ?>
			<h2>Thank you for using MyCD-DB!</h2>
			<p>You are using version <?php echo $config["version"]; ?> of MyCD-DB.</p>
			<p>MyCD-DB is copyright by Thomas Schneider and released under the terms of
				the GPL (GNU General Public License).</p>
			<p>All informations, new releases and downloads are available at
				<a href="http://mycd-db.sourceforge.net/">http://mycd-db.sourceforge.net</a>
				at <a href="http://sourceforge.net/">sourceforge.net</a>.</p>
		<?php } ?>
		<?php include("footer.inc.php"); ?>
	</body>
</html>
