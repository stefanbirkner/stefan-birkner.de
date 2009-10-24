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
  
  $Id: french.inc.php,v 1.4 2006/10/19 22:27:11 silptur Exp $
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
$strBackButton="Retour";

/*
 * database connection error messages
 */
$strDBConnErrMsg="Connexion à MySQL impossible";
$strDBConnDbgMsg="Base ouverte";
$strDBSelDBErrMsg="Base de donnée introuvable";

/*
 * some global strings (strGlobalxxx)
 */
$strGlobalHome        ="Accueil";
$strGlobalAdmin       ="Admin";
$strGlobalSearch      ="Recherche";
$strGlobalAbout       ="A Propos";
$strGlobalArtist      ="Artiste";
$strGlobalArtists     ="Artistes";
$strGlobalSong        ="Titre";
$strGlobalSongs       ="Morceaux";
$strGlobalGenre       ="Genre";
$strGlobalGenres      ="Genres";
$strGlobalCD          ="CD";
$strGlobalCDs         ="CD's";
$strGlobalTrack       ="Numéro de piste";
$strGlobalPages       ="Pages";
$strGlobalPage        ="Page";
$strGlobalFPage       ="Début";
$strGlobalLPage       ="Fin";
$strGlobalNPage       ="Page Suivante";
$strGlobalPPage       ="Page Précédente";
$strGlobalEdit        ="Edit";
$strGlobalInsert      ="Insert";
$strGlobalDelete      ="Delete";
$strGlobalTime        ="Durée";
$strGlobalSongDetails ="Details du titre: ";
$strGlobalCDDetails   ="Details du CD: ";
$strGlobalTrackNr     ="Numéro de piste";
$strGlobalChanger     ="CD-Changer";
$strGlobalSlot        ="CD-Changer-Slot";

/*
 * top level menu strings (strTMxxx)
 */
$strTMHome="Accueil";
$strTMCDs="CD's";
$strTMArtists="Artistes";
$strTMSongs="Titres";
$strTMGenres="Genres";
$strTMUtils="Utilitaires";
$strTMSearch="Recherche";
$strTMAbout="A Propos";
/* new values follow */
$strTMHome    =$strGlobalHome;
$strTMCDs     =$strGlobalCDs;
$strTMArtists =$strGlobalArtists;
$strTMSongs   =$strGlobalSongs;
$strTMGenres  =$strGlobalGenres;
$strTMUtils   ="Utilitaires";
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
$strERRNotImplPageTitle="Non terminé !";
$strERRNotImpl         ="Désolé - Pas encore terminé !";

/*
 * home page messages
 */
$strHomePageTitle="ACCUEIL";
$strHomeWarning  ="<center>\n<b>ATTENTION! CODE ALPHA !</b>\n<br><b>USE OF YOUR OWN RISK!</b><br>\n<hr WIDTH=\"100%\"></center>";
$strHomeWelcome  ="Bienvenue à";
$strHomeDbInfo   ="Base de données Globale";
$strHomeArtist   ="Artistes";
$strHomeSong     ="Titres";
$strHomeGenre    ="Genres";
/* only the next 3 changed - other untouched */
$strHomeArtist   =$strGlobalArtists;
$strHomeSong     =$strGlobalSongs;
$strHomeGenre    =$strGlobalGenres;

/*
 * song-pages messages
 */
$strSongPageTitle="Zone-Titres";
$strSongPages    ="Pages";
$strSongPage     ="Page";
$strSongFPage    ="Début";
$strSongLPage    ="Fin";
$strSongNPage    ="Page Suivante";
$strSongPPage    ="Prev. Page";
$strSongSong     ="Titre";
$strSongArtist   ="Artiste";
$strSongTime     ="Durée";
$strSongGenre    ="Genre";
$strSongDetail   ="Details du titre : ";
$strSongTrack    ="Numéro de piste";
$strSongChanger  ="CD-Changer";
$strSongSlot     ="CD-Changer-Slot";
/* only the title is untouched */
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
$strCDPageTitle="Zone-CD";
$strCDPages    ="Pages";
$strCDPage     ="Page";
$strCDFPage    ="Début";
$strCDLPage    ="Fin";
$strCDNPage    ="Page Suivante";
$strCDPPage    ="Page Précédente";
$strCDSong     ="Titre";
$strCDArtist   ="Artiste";
$strCDTime     ="Durée";
$strCDGenre    ="Genre";
$strCDDetail   ="Details du CD: ";
$strCDTrack    ="Piste";
$strCDTracks   ="Morceaux";
$strCDChanger  ="CD-Changer";
$strCDSlot     ="CD-Changer-Slot";
/* same as songs */
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
$strArtistPageTitle="Zone-Artistes";
$strArtistPages    ="Pages";
$strArtistPage     ="Page";
$strArtistFPage    ="Début";
$strArtistLPage    ="Fin";
$strArtistNPage    ="Page Suivante";
$strArtistPPage    ="Page Précédente";
$strArtistSong     ="Titre";
$strArtistArtist   ="Artiste";
$strArtistTime     ="Durée";
$strArtistGenre    ="Genre";
$strArtistDetail   ="Détails pour CD: ";
$strArtistTrack    ="Pistes";
$strArtistTracks   ="Morceaux";
$strArtistChanger  ="CD-Changer";
$strArtistSlot     ="CD-Changer-Slot";
/* also the same */
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
$strArtistOptions = "TRANSLATE You can execute the following actions:";
$strArtistOptionEdit = "TRANSLATE modify the artist's (the band's) name.";
$strArtistOptionDelete = "TRANSLATE delete the artist (the Band) from the database.";

/*
 * genre-pages messages
 */
$strGenrePageTitle="Zone-Genre";
$strGenrePages    ="Pages";
$strGenrePage     ="Page";
$strGenreFPage    ="Début";
$strGenreLPage    ="Fin";
$strGenreNPage    ="Page Suivante";
$strGenrePPage    ="Page Précédente";
$strGenreSong     ="Titre";
$strGenreArtist   ="Artiste";
$strGenreTime     ="Durée";
$strGenreGenre    ="Genre";
$strGenreDetail   ="Details du CD: ";
$strGenreTrack    ="Piste";
$strGenreTracks   ="Morceaux";
$strGenreChanger  ="CD-Changer";
$strGenreSlot     ="CD-Changer-Slot";
/* the same ... */
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
$strSearchPageTitle="Recherche";
$strSearchNoResult ="Aucune donnée!";
$strSearchQuery    ="Réponse pour : ";
$strSearchSong     ="Titre";
$strSearchArtist   ="Artiste";
$strSearchGenre    ="Genre";
/* from here ... */
$strSearchPageTitle=$strGlobalSearch;
$strSearchNoResult ="Aucune donnée!";
$strSearchQuery    ="Réponse pour : ";
$strSearchSong     =$strGlobalSong;
$strSearchArtist   =$strGlobalArtist;
$strSearchGenre    =$strGlobalGenre;
/* ... to here only changed */
$strSearchSum      ="Trouvé : ";
$strSearchAny      =" Any ";
$strSearchLimit    ="Nombre de réponses par page : ";
$strSearchNoLimit  =" Montrer toutes les réponses ";
$strSearchSubmit   ="    Rechercher    ";
$strSearchClear    ="       Effacer       ";
$strSearchShow     ="réponses affichées";
$strSearchNothing  ="Pas de critère de recherche !";
$strSearchOnlyGen  ="Pas de critère de recherche !<BR>".
                    "Pour une liste des genres, allez au lien <a href=\"genre.php?page=1\">Genre</a>".
                    " du menu!";
$strSearchNoData   ="Pas de données!";

/* next is complete new */
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

$dict_about = 'a propos';
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
