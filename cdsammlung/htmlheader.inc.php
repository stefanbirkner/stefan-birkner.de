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
  
  $Id: htmlheader.inc.php,v 1.10 2006/10/18 12:46:16 silptur Exp $
*/
if(!isset($title)) {
	switch ($area) 
	{
	 case "HOME":
	   $title = $strHomePageTitle;
	   break;
	 case "CDS":
	   $title = $strCDPageTitle;
	   break;
	 case "SONGS":
	   $title = $strSongPageTitle;
	   break;
	 case "ARTISTS":
	   $title = $strArtistPageTitle;
	   break;
	 case "GENRE":
	   $title = $strGenrePageTitle;
	   break;
	 case "SEARCH":
	   $title = $strSearchPageTitle;
	   break;
	 case "ADMIN":
	   $title = $strAdminPageTitle;
	   break;
	 default:
	   $title = $strERRNotImplPageTitle;
	   break;
	}
}
?>	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<meta http-equiv="expires" content="0" />
		<meta http-equiv="Pragma" content="no-cache" />
		<meta http-equiv="pragma" content="no-cache" />
		<meta http-equiv="Expires" content="0" />
		<meta http-equiv="expires" content="0" />
		<link rel="stylesheet" type="text/css" href="<?php if($area == "ADMIN") echo '../'; ?>mycd-db.css" />
		<title>MyCD-DB: <?php echo $title; ?></title>
	</head>
