<?PHP
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
  
  $Id: util.inc.php,v 1.1 2001/11/24 14:32:11 thomyschneider Exp $
*/

if (!defined('__UTIL_INC__')) {
  define('__UTIL_INC__', 1);

  /*
   * compute the time in mm:ss from time in ss
   */
  function sec2norm($sectime) 
    {
      $ret = sprintf("%02d:%02d",((int) ($sectime/60)),((int) ($sectime%60)));

      return $ret;
    }
  
  
} /* end of if defined __UTIL_INC__ */

?>
