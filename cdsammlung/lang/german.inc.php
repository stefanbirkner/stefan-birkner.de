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
  
  $Id: german.inc.php,v 1.20 2006/10/19 22:27:11 silptur Exp $
*/

/*
 * some german globals
 */
$charset = "iso-8859-1";
$left_font_family = "verdana, helvetica, arial, geneva, sans-serif";
$right_font_family = "helvetica, arial, geneva, sans-serif";
$number_thousands_separator = ".";
$number_decimal_separator = ",";
$byteUnits = array("Bytes", "KB", "MB", "GB");
$strBackButton="Zur&uuml;ck";


/*
 * database connection error messages
 */
$strDBConnErrMsg="Keine Verbindung zum MySQL-Server";
$strDBConnDbgMsg="Mit Datenbank verbunden";
$strDBSelDBErrMsg="Konnte die Datenbank nicht ausw&auml;hlen";

/*
 * some global strings (strGlobalxxx)
 */
$strGlobalHome        ="Home";
$strGlobalAdmin       ="Admin";
$strGlobalSearch      ="Suche";
$strGlobalAbout       ="&Uuml;ber";
$strGlobalArtist      ="K&uuml;nstler";
$strGlobalArtists     ="K&uuml;nstler";
$strGlobalSong        ="Lied";
$strGlobalSongs       ="Lieder";
$strGlobalGenre       ="Kategorie";
$strGlobalGenres      ="Kategorien";
$strGlobalCD          ="CD";
$strGlobalCDs         ="CD's";
$strGlobalTrack       ="Lied Nr";
$strGlobalPages       ="Seiten";
$strGlobalPage        ="Seite";
$strGlobalFPage       ="Erste Seite";
$strGlobalLPage       ="Letzte Seite";
$strGlobalNPage       ="N&auml;chste Seite";
$strGlobalPPage       ="Vorherg. Seite";
$strGlobalEdit        ="Bearbeiten";
$strGlobalInsert      ="Einf&uuml;gen";
$strGlobalDelete      ="L&ouml;schen";
$strGlobalTime        ="L&auml;nge";
$strGlobalSongDetails ="Details zum Lied: ";
$strGlobalCDDetails   ="Details zur CD: ";
$strGlobalTrackNr     ="Lied auf der CD";
$strGlobalChanger     ="CD-Wechsler";
$strGlobalSlot        ="Platz im Wechsler";

/*
 * top level menu strings (strTMxxx)
 */
$strTMHome    =$strGlobalHome;
$strTMCDs     =$strGlobalCDs;
$strTMArtists =$strGlobalArtists;
$strTMSongs   =$strGlobalSongs;
$strTMGenres  =$strGlobalGenres;
$strTMUtils   ="N&uuml;tzliches";
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
$strLMAdmInsertCDDrive  ="CD vom Laufwerk";
$strLMAdmInsertCDFile   ="CD aus Datei";
$strLMAdmInsertArtist   =$strGlobalArtist;
$strLMAdmInsertGenre    =$strGlobalGenre;
$strLMAdmDelete         =$strGlobalDelete;
$strLMAdmDeleteCD       =$strGlobalCD;
$strLMAdmDeleteArtist   =$strGlobalArtist;
$strLMAdmDeleteGenre    =$strGlobalGenre;

/*
 * error messages
 */
$strERRNotImplPageTitle="Nicht implementiert!";
$strERRNotImpl         =" Dieser Punkt ist momentan nicht<BR> implementiert!";

/*
 * home page messages
 */
$strHomePageTitle="HOME";
$strHomeWarning  ="<center>\n<b>ACHTUNG! DIESES IST ALPHA-SOFTWARE!</b>\n<br><b>BENUTZUNG AUF EIGENE GEFAHR!</b><br>\n<hr WIDTH=\"100%\"></center>";
$strHomeWelcome  ="Willkommen bei";
$strHomeDbInfo   ="MyCD-DB Datenbankinformation";
$strHomeArtist   =$strGlobalArtists;
$strHomeSong     =$strGlobalSongs;
$strHomeGenre    =$strGlobalGenres;

/*
 * song-pages messages
 */
$strSongPageTitle="Lieder-Bereich";
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
$strCDPageTitle="CD-Bereich";
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
$strArtistPageTitle="K&uuml;nstler-Bereich";
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
$strArtistOptions = "Sie k&ouml;nnen folgende Aktionen ausf&uuml;hren:";
$strArtistOptionEdit = "den Namen des K&uuml;nstlers (der Band) &auml;ndern.";
$strArtistOptionDelete = "den K&uuml;nstler (die Band) aus der Datenbank l&ouml;schen.";

/*
 * genre-pages messages
 */
$strGenrePageTitle="Kategorien-Bereich";
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
$strSearchNoResult ="Nichts gefunden!";
$strSearchQuery    ="Suchergebnisse f&uuml;r: ";
$strSearchSong     =$strGlobalSong;
$strSearchArtist   =$strGlobalArtist;
$strSearchGenre    =$strGlobalGenre;
$strSearchSum      ="Gefunden: ";
$strSearchAny      ="Beliebig ";
$strSearchLimit    ="Wieviel Ergebnisse anzeigen: ";
$strSearchNoLimit  =" Alle Ergebnisse anzeigen ";
$strSearchSubmit   ="     Suchen     ";
$strSearchClear    ="     Löschen    ";
$strSearchShow     ="davon werden angezeigt";
$strSearchNothing  ="Es wurde nichts zum Suchen eingegeben!";
$strSearchOnlyGen  ="Es wurde nichts zum Suchen eingegeben!<BR>".
                    "Nur zur Kategorieauswahl bitte <a href=\"genre.php?page=1\">Kategorie</a>".
                    " aus dem Men&uuml; benutzen!";
$strSearchNoData   ="Keine Daten gefunden!";

/*
 * admin-page-messages
 */
$strAdminPageTitle              ="Administration";
$strAdminReadDriveSubmit        ="  Einlesen  ";
$strAdminArtist                 =$strGlobalArtist;
$strAdminGenre                  =$strGlobalGenre;
$strAdminArtistSelect           ="Bitte Auswahl treffen";
$strAdminInsertSubmit           =" Einf&uuml;gen ";
$strAdminInsertClear            ="  L&ouml;schen  ";
$strAdminInsertArtistTopTitle   ="K&uuml;nstler einf&uuml;gen";
$strAdminInsertArtistInsertOk   ="K&uuml;nstler wurde erfolgreich hinzugef&uuml;gt";
$strAdminInsertArtistExist      ="K&uuml;nstler wurde nicht hinzugef&uuml;gt, da er bereits in der Datenbank ist!";
$strAdminInsertArtistNoValue    ="Es wurde kein Wert f&uuml;r K&uuml;nstler eingegeben!";
$strAdminInsertArtistNote       ="DER Z&Auml;HLER ZUR ANZEIGE DER K&Uuml;NSTLER WIRD BEIM N&Auml;CHSTEN SEITENAUFRUF AKTUALISIERT!";
$strAdminInsertGenreTopTitle    ="Kategorie einf&uuml;gen";
$strAdminInsertGenreInsertOk    ="Kategorie wurde erfolgreich hinzugef&uuml;gt";
$strAdminInsertGenreExist       ="Kategorie wurde nicht hinzugef&uuml;gt, da sie bereits in der Datenbank ist!";
$strAdminInsertGenreNoValue     ="Es wurde kein Wert f&uuml;r Kategorie eingegeben!";
$strAdminInsertGenreNote        ="DER Z&Auml;HLER ZUR ANZEIGE DER KATEGORIEN WIRD BEIM N&Auml;CHSTEN SEITENAUFRUF AKTUALISIERT!";
$strAdminEditArtistTopTitle     ="K&uuml;nstler &auml;ndern";
$strAdminEditArtistEditOk       ="K&uuml;nstler wurde erfolgreich ge&auml;ndert";
$strAdminEditArtistNoExist      ="K&uuml;nstler wurde nicht ge&auml;ndert, da er nicht mehr in der Datenbank ist!";
$strAdminEditArtistNoValue      ="Es wurde kein Wert f&uuml;r K&uuml;nstler eingegeben!<BR><BR>".
                           "Zum L&ouml;schen bitte aus der K&uuml;nstler&uuml;bersicht den Men&uuml;punkt 'L&ouml;schen' benutzen!";
$strAdminEditSubmit             =" &Auml;ndern ";
$strAdminEditArtistBack         ="Hier geht es zur&uuml;ck zur &Uuml;bersichtsseite von";
$strAdminEditArtistBack2        ="Hier geht es zur&uuml;ck zur &Uuml;bersichtsseite";
$strAdminEditArtistNoArtist     ="Es wurde kein K&uuml;nstler angegeben!";
$strAdminDeleteArtistTopTitle   ="K&uuml;nstler l&ouml;schen";
$strAdminDeleteSubmit           =" L&ouml;schen ";
$strAdminDeleteArtistText       ="Folgender K&uuml;stler wird endg&uuml;ltig gel&ouml;scht: ";
$strAdminDeleteArtistDeleteOk   ="Folgender K&uuml;stler wurde endg&uuml;ltig gel&ouml;scht";
$strAdminDeleteArtistNoExist    ="K&uuml;nstler wurde nicht gel&ouml;scht, da er nicht mehr in der Datenbank ist!";
$strAdminDeleteArtistNoExistTop ="K&uuml;nstler existiert nicht mehr in der Datenbank!";
$strAdminDeleteArtistNote       ="DER Z&Auml;HLER ZUR ANZEIGE DER K&Uuml;NSTLER WIRD BEIM N&Auml;CHSTEN SEITENAUFRUF AKTUALISIERT!";
$strAdminDeleteArtistReady      ="Der L&ouml;schvorgang wurde erfolgreich abgeschlossen";
$strAdminDeleteArtistNoReady    ="Der L&ouml;schvorgang wurde nicht erfolgreich abgeschlossen";
$strAdminDeleteArtistNoArtist   ="Es wurde kein K&uuml;nstler angegeben!";
$strAdminDeleteArtistHaveCD     ="Der K&uuml;nstler kann nicht gel&ouml;scht werden, da es f&uuml;r diesen K&uuml;nstler %s CD(s) ".
                             "in der Datenbank gibt!<BR><BR><A HREF=\"../artist.php?artist=%s\">Zur CD-&Uuml;bersicht für %s</A>";
$strAdminEditGenreBack          ="Hier geht es zur&uuml;ck zur &Uuml;bersichtsseite von";
$strAdminEditGenreTopTitle      ="Kategorie &auml;ndern";
$strAdminEditGenreNoExist       ="Kategorie wurde nicht ge&auml;ndert, da sie nicht mehr in der Datenbank ist!";
$strAdminEditGenreNoGenre       ="Es wurde keine Kategorie angegeben!";
$strAdminEditGenreEditOk        ="Kategorie wurde erfolgreich ge&auml;ndert";
$strAdminEditGenreNoValue       ="Es wurde kein Wert f&uuml;r Kategorie eingegeben!<BR><BR>".
                           "Zum L&ouml;schen bitte aus der Kategorie&uuml;bersicht den Men&uuml;punkt 'L&ouml;schen' benutzen!";
$strAdminEditGenreBack2         ="Hier geht es zur&uuml;ck zur &Uuml;bersichtsseite";
$strAdminDeleteGenreTopTitle    ="Kategorie l&ouml;schen";
$strAdminDeleteSubmit           =" L&ouml;schen ";
$strAdminDeleteGenreText        ="Folgende Kategorie wird endg&uuml;ltig gel&ouml;scht: ";
$strAdminDeleteGenreDeleteOk    ="Folgende Kategorie wurde endg&uuml;ltig gel&ouml;scht";
$strAdminDeleteGenreNoExist     ="Kategorie wurde nicht gel&ouml;scht, da sie nicht mehr in der Datenbank ist!";
$strAdminDeleteGenreNoExistTop  ="Kategorie existiert nicht mehr in der Datenbank!";
$strAdminDeleteGenreNote        ="DER Z&Auml;HLER ZUR ANZEIGE DER KATEGORIEN WIRD BEIM N&Auml;CHSTEN SEITENAUFRUF AKTUALISIERT!";
$strAdminDeleteGenreReady       ="Der L&ouml;schvorgang wurde erfolgreich abgeschlossen";
$strAdminDeleteGenreNoReady     ="Der L&ouml;schvorgang wurde nicht erfolgreich abgeschlossen";
$strAdminDeleteGenreNoGenre     ="Es wurde keine Kategorie angegeben!";
$strAdminDeleteGenreHaveCD      ="Die Kategorie kann nicht gel&ouml;scht werden, da es mit dieser Kategorie %s CD(s) ".
                             "in der Datenbank gibt!<BR><BR><A HREF=\"../genre.php?genre=%s\">Zur CD-&Uuml;bersicht für %s</A>";
$strAdminInsertCDDriveSong      =$strGlobalSong;


$logo_alternative_text = 'Logo MyCD-DB';

$greeting = 'Willkommen zu MyCD-DB!'; //erscheint als Überschrift auf der Startseite
$intro_text = ''; //Text für einen Abschnitt, der unterhalb der Überschrift erscheint

$dict_about = 'Über';
$dict_admin = 'Admin';
$dict_artist = 'Künstler';
$dict_artists = 'Künstler';
$dict_cd = 'CD';
$dict_cds = 'CDs';
$dict_genre = 'Genre';
$dict_genres = 'Genres';
$dict_extended_search = 'erweiterte Suche';
$dict_search = 'Suche';
$dict_song = 'Lied';
$dict_songs = 'Lieder';
$dict_version = 'Version';
?>
