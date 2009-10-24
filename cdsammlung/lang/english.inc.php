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
  
  $Id: english.inc.php,v 1.19 2006/10/19 22:27:11 silptur Exp $
*/

/*
 * some english globals
 */
$charset = "iso-8859-1";
$left_font_family = "verdana, helvetica, arial, geneva, sans-serif";
$right_font_family = "helvetica, arial, geneva, sans-serif";
$number_thousands_separator = ";";
$number_decimal_separator = ".";
$byteUnits = array("Bytes", "KB", "MB", "GB");
$strBackButton="Back";

/*
 * database connection error messages
 */
$strDBConnErrMsg="Can't connect to MySQL-Server";
$strDBConnDbgMsg="DB open";
$strDBSelDBErrMsg="Can't select the Database";

/*
 * some global strings (strGlobalxxx)
 */
$strGlobalHome        ="Home";
$strGlobalAdmin       ="Admin";
$strGlobalSearch      ="Search";
$strGlobalAbout       ="About";
$strGlobalArtist      ="Artist";
$strGlobalArtists     ="Artists";
$strGlobalSong        ="Song";
$strGlobalSongs       ="Songs";
$strGlobalGenre       ="Genre";
$strGlobalGenres      ="Genres";
$strGlobalCD          ="CD";
$strGlobalCDs         ="CD's";
$strGlobalTrack       ="Track";
$strGlobalPages       ="Pages";
$strGlobalPage        ="Page";
$strGlobalFPage       ="First Page";
$strGlobalLPage       ="Last Page";
$strGlobalNPage       ="Next Page";
$strGlobalPPage       ="Prev. Page";
$strGlobalEdit        ="Edit";
$strGlobalInsert      ="Insert";
$strGlobalDelete      ="Delete";
$strGlobalTime        ="Time";
$strGlobalSongDetails ="Details for Song: ";
$strGlobalCDDetails   ="Details for CD: ";
$strGlobalTrackNr     ="Tracknumber";
$strGlobalChanger     ="CD-Changer";
$strGlobalSlot        ="CD-Changer-Slot";

/*
 * top level menu strings (strTMxxx)
 */
$strTMHome    =$strGlobalHome;
$strTMCDs     =$strGlobalCDs;
$strTMArtists =$strGlobalArtists;
$strTMSongs   =$strGlobalSongs;
$strTMGenres  =$strGlobalGenres;
$strTMUtils   ="Utilities";
$strTMAdmin   =$strGlobalAdmin;
$strTMSearch  =$strGlobalSearch;
$strTMAbout   =$strGlobalAbout;

/*
 * left menu strings
 */
$strLMAdmAdm            =$StrGlobalAdmin;
$strLMAdmEdit           =$strGlobalEdit;
$strLMAdmEditCD         =$strGlobalCD;
$strLMAdmEditArtist     =$strGlobalArtist;
$strLMAdmEditGenre      =$strGlobalGenre;
$strLMAdmInsert         =$strGlobalInsert;
$strLMAdmInsertCDDrive  ="CD from Drive";
$strLMAdmInsertCDFile   ="CD from File";
$strLMAdmInsertArtist   =$strGlobalArtist;
$strLMAdmInsertGenre    =$strGlobalGenre;
$strLMAdmDelete         =$strGlobalDelete;
$strLMAdmDeleteCD       =$strGlobalCD;
$strLMAdmDeleteArtist   =$strGlobalArtist;
$strLMAdmDeleteGenre    =$strGlobalGenre;

/*
 * error messages
 */
$strERRNotImplPageTitle="Not implemented!";
$strERRNotImpl         ="Sorry - this is not implemented yet!";

/*
 * home page messages
 */
$strHomePageTitle="HOME";
$strHomeWarning  ="<center>\n<b>ATTENTION! THIS IS ALPHA-SOFTWARE!</b>\n<br><b>USE OF YOUR OWN RISK!</b><br>\n<hr WIDTH=\"100%\"></center>";
$strHomeWelcome  ="Welcome by";
$strHomeDbInfo   ="Global Database Information";
$strHomeArtist   =$strGlobalArtists;
$strHomeSong     =$strGlobalSongs;
$strHomeGenre    =$strGlobalGenres;

/*
 * song-pages messages
 */
$strSongPageTitle="Song-Area";
$strSongPages    =$strGlobalPages;
$strSongPage     =$strGlobalPage;
$strSongFPage    =$strGlobalFPage;
$strSongLPage    =$strGlobalLPage;
$strSongNPage    =$strGlobalNPage;
$strSongPPage    =$strGlobalPPage;
$strSongSong     =$strGlobalSong;
$strSongArtist   =$strGlobalArtist;
$strSongTime     =$strGlobalTime;
$strSongGenre    =$strGlobalGenre;
$strSongDetail   =$strGlobalSongDetails;
$strSongTrack    =$strGlobalTrackNr;
$strSongChanger  =$strGlobalChanger;
$strSongSlot     =$strGlobalSlot;

/*
 * cd-pages messages
 */
$strCDPageTitle="CD-Area";
$strCDPages    =$strGlobalPages;
$strCDPage     =$strGlobalPage;
$strCDFPage    =$strGlobalFPage;
$strCDLPage    =$strGlobalLPage;
$strCDNPage    =$strGlobalNPage;
$strCDPPage    =$strGlobalPPage;
$strCDSong     =$strGlobalSong;
$strCDArtist   =$strGlobalArtist;
$strCDTime     =$strGlobalTime;
$strCDGenre    =$strGlobalGenre;
$strCDDetail   =$strGlobalCDDetails;
$strCDTrack    =$strGlobalTrack;
$strCDTracks   =$strGlobalSongs;
$strCDChanger  =$strGlobalChanger;
$strCDSlot     =$strGlobalSlot;

/*
 * artist-pages messages
 */
$strArtistPageTitle="Artist-Area";
$strArtistPages    =$strGlobalPages;
$strArtistPage     =$strGlobalPage;
$strArtistFPage    =$strGlobalFPage;
$strArtistLPage    =$strGlobalLPage;
$strArtistNPage    =$strGlobalNPage;
$strArtistPPage    =$strGlobalPPage;
$strArtistSong     =$strGlobalSong;
$strArtistArtist   =$strGlobalArtist;
$strArtistTime     =$strGlobalTime;
$strArtistGenre    =$strGlobalGenre;
$strArtistDetail   =$strGlobalCDDetails;
$strArtistTrack    =$strGlobalTrack;
$strArtistTracks   =$strGlobalSongs;
$strArtistChanger  =$strGlobalChanger;
$strArtistSlot     =$strGlobalSlot;
$strArtistOptions = "You can execute the following actions:";
$strArtistOptionEdit = "modify the artist's (the band's) name.";
$strArtistOptionDelete = "delete the artist (the Band) from the database.";

/*
 * genre-pages messages
 */
$strGenrePageTitle="Genre-Area";
$strGenrePages    =$strGlobalPages;
$strGenrePage     =$strGlobalPage;
$strGenreFPage    =$strGlobalFPage;
$strGenreLPage    =$strGlobalLPage;
$strGenreNPage    =$strGlobalNPage;
$strGenrePPage    =$strGlobalPPage;
$strGenreSong     =$strGlobalSong;
$strGenreArtist   =$strGlobalArtist;
$strGenreTime     =$strGlobalTime;
$strGenreGenre    =$strGlobalGenre;
$strGenreDetail   =$strGlobalCDDetails;
$strGenreTrack    =$strGlobalTrack;
$strGenreTracks   =$strGlobalSongs;
$strGenreChanger  =$strGlobalChanger;
$strGenreSlot     =$strGlobalSlot;

/*
 * search-page-messages
 */
$strSearchPageTitle=$strGlobalSearch;
$strSearchNoResult ="Nothing found!";
$strSearchQuery    ="Search results for: ";
$strSearchSong     =$strGlobalSong;
$strSearchArtist   =$strGlobalArtist;
$strSearchGenre    =$strGlobalGenre;
$strSearchSum      ="Found: ";
$strSearchAny      =" Any ";
$strSearchLimit    ="How much results show: ";
$strSearchNoLimit  =" Show all results ";
$strSearchSubmit   ="     Search     ";
$strSearchClear    ="     Clear      ";
$strSearchShow     ="results displayed";
$strSearchNothing  ="No input for search!";
$strSearchOnlyGen  ="No input for search!<BR>".
                    "If you want only listings for genres, please look at <a href=\"genre.php?page=1\">Genre</a>".
                    " from the menu!";
$strSearchNoData   ="No Data found!";

/*
 * admin-page-messages
 */
$strAdminPageTitle              ="Administration";
$strAdminReadDriveSubmit        ="  Read  ";
$strAdminArtist                 =$strGlobalArtist;
$strAdminGenre                  =$strGlobalGenre;
$strAdminArtistSelect           ="Take a choice";
$strAdminInsertSubmit           ="  Insert ";
$strAdminInsertClear            ="  Clear  ";
$strAdminInsertArtistTopTitle   ="Insert Artist";
$strAdminInsertArtistInsertOk   ="Artist is now in Database";
$strAdminInsertArtistExist      ="Artist not inserted, because Artist exist in Database!";
$strAdminInsertArtistNoValue    ="No Value for Artist!";
$strAdminInsertArtistNote       ="THE ARTISTCOUNTER WILL UPDATE ON THE NEXT PAGE!";
$strAdminInsertGenreTopTitle    ="Insert Genre";
$strAdminInsertGenreInsertOk    ="Genre is now in Database";
$strAdminInsertGenreExist       ="Genre not inserted, because Genre exist in Database!";
$strAdminInsertGenreNoValue     ="No Value for Genre!";
$strAdminInsertGenreNote        ="THE GENRECOUNTER WILL UPDATE ON THE NEXT PAGE!";
$strAdminEditArtistTopTitle     ="Edit Artist";
$strAdminEditArtistEditOk       ="Artist successful updated";
$strAdminEditArtistNoExist      ="Artist don't updated, because Artist isn't in Database!";
$strAdminEditArtistNoValue      ="No value for Artist!<BR><BR>To delete this Artist select Delete from left menu in Artistoverview!";
$strAdminEditSubmit             =" Update ";
$strAdminEditArtistBack         ="Back to Overview for";
$strAdminEditArtistBack2        ="Back to Overviewpage";
$strAdminEditArtistNoArtist     ="No Artist is set!";
$strAdminDeleteArtistTopTitle   ="Artist delete";
$strAdminDeleteSubmit           =" Delete ";
$strAdminDeleteArtistText       ="Artist to delete: ";
$strAdminDeleteArtistDeleteOk   ="Artist successful deleted";
$strAdminDeleteArtistNoExist    ="Artist don't deleted, because isn't in Database!";
$strAdminDeleteArtistNoExistTop ="Artist don't exist in Database!";
$strAdminDeleteArtistNote       ="THE ARTISTCOUNTER WILL UPDATE ON THE NEXT PAGE!";
$strAdminDeleteArtistReady      ="Successful deleted";
$strAdminDeleteArtistNoReady    ="Delete unseccessful";
$strAdminDeleteArtistNoArtist   ="No Artist is set!";
$strAdminDeleteArtistHaveCD     ="The Artist don't will delete, because the artist have %s CD(s) ".
                             "in the database!<BR><BR><A HREF=\"../artist.php?artist=%s\">CD-Overview for %s</A>";
$strAdminEditGenreBack          ="Back to overview for";
$strAdminEditGenreTopTitle      ="Edit Genre";
$strAdminEditGenreNoExist       ="Genre don't deleted, because isn't in Database!";
$strAdminEditGenreNoGenre       ="No Genre is set!";
$strAdminEditGenreEditOk        ="Genre successful updated";
$strAdminEditGenreNoValue       ="No value for Genre!<BR><BR>To delete this Genre select Delete from left menu in Genreoverview!";
$strAdminEditGenreBack2         ="Back to Overviewpage";
$strAdminDeleteGenreTopTitle    ="Genre delete";
$strAdminDeleteSubmit           =" Delete ";
$strAdminDeleteGenreText        ="Genre to delete: ";
$strAdminDeleteGenreDeleteOk    ="Genre successful deleted";
$strAdminDeleteGenreNoExist     ="Genre don't deleted, because isn't in Database!";
$strAdminDeleteGenreNoExistTop  ="Genre don't exist in Database!";
$strAdminDeleteGenreNote        ="THE GENRECOUNTER WILL UPDATE ON THE NEXT PAGE!";
$strAdminDeleteGenreReady       ="Successful deleted";
$strAdminDeleteGenreNoReady     ="Delete unsuccessful";
$strAdminDeleteGenreNoGenre     ="No Genre is set!";
$strAdminDeleteGenreHaveCD      ="The Genre don't will delete, because the genre have %s CD(s) ".
                             "in the database!<BR><BR><A HREF=\"../genre.php?genre=%s\">Genre-Overview for %s</A>";
$strAdminInsertCDDriveSong      =$strGlobalSong;


$logo_alternative_text = 'Logo MyCD-DB';

$greeting = 'Welcome to MyCD-DB!'; //appear as headline on the home page
$intro_text = ''; //text of a paragraph that appears after the headline on the home page

$dict_about = 'about';
$dict_admin = 'admin';
$dict_artist = 'artist';
$dict_artists = 'artists';
$dict_cd = 'CD';
$dict_cds = 'CDs';
$dict_genre = 'genre';
$dict_genres = 'genres';
$dict_extended_search = 'extended search';
$dict_search = 'search';
$dict_song = 'song';
$dict_songs = 'songs';
$dict_version = 'version';
?>
