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
  
  $Id: config.inc.php.example,v 1.10 2006/10/19 21:46:37 silptur Exp $
*/
$mysql_server = '84.244.3.34';
$mysql_user   = 'mycddbuser';
$mysql_pass   = 'b4jkegj5';
$mysql_db     = 'mycddb';

$config['admin_auth_intern'] = 1;   /* if set this to 0 admin need external auth method -
					            in mycd-db when admin is in every case authentificated */
$config['admin_user_name']   = 'stefan';
$config['admin_user_pw']     = '4simone';

$config['db_conn'] = 0;

$config['songs_per_page']    = 15;
$config['cds_per_page']      = 15;
$config['artists_per_page']  = 15;
$config['genres_per_page']   = 15;
$config['results_p_page_l1'] = 15;
$config['results_p_page_l2'] = 30;

$app_name = 'MyCD-DB';
$version = '0.2.beta';

$doctype = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">';
$html_attributes = ' xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"';

$css_filename = 'mycd-db.css';

$logo_filename = 'mycddb_logo.jpg';
$logo_width = 375;
$logo_height = 160;
$logo_small_filename = 'mycddb_logo_small.jpg';
$logo_small_width = 100;
$logo_small_height = 38;
?>
