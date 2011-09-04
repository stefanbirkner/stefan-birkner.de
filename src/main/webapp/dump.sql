\connect - stefanbirk
CREATE SEQUENCE "homepageupdat_homepageupdat_seq" start 7 increment 1 maxvalue 2147483647 minvalue 1  cache 1 ;
SELECT nextval ('"homepageupdat_homepageupdat_seq"');
CREATE SEQUENCE "linklistcategor_category_id_seq" start 30 increment 1 maxvalue 2147483647 minvalue 1  cache 1 ;
SELECT nextval ('"linklistcategor_category_id_seq"');
CREATE SEQUENCE "linklistlink_link_id_seq" start 143 increment 1 maxvalue 2147483647 minvalue 1  cache 1 ;
SELECT nextval ('"linklistlink_link_id_seq"');
CREATE TABLE "homepageupdate" (
	"homepageupdate_id" int4 DEFAULT nextval('homepageupdat_homepageupdat_seq'::text) NOT NULL,
	"inputdate" date,
	"xhtmltext" text NOT NULL,
	PRIMARY KEY ("homepageupdate_id")
);
CREATE TABLE "linklistcategory" (
	"category_id" int4 DEFAULT nextval('linklistcategor_category_id_seq'::text) NOT NULL,
	"under" int8,
	"title" text,
	"info" text,
	PRIMARY KEY ("category_id")
);
CREATE TABLE "linklistlink" (
	"link_id" int4 DEFAULT nextval('linklistlink_link_id_seq'::text) NOT NULL,
	"category_id" int8 NOT NULL,
	"title" text,
	"message" text,
	"link" text,
	"mod" date,
	PRIMARY KEY ("link_id")
);
CREATE TABLE "linklistcategorywithparent" (
	"category_id" int4,
	"under" int8,
	"title" text,
	"info" text,
	"parent_id" int4,
	"parent_title" text,
	"parent_under" int8
);
INSERT INTO "homepageupdate" VALUES (2,'2000-05-24','Das <a href="dsa/heldengeburtstag.php">Tool Heldengeburtstag</a> funktioniert nun auch mit Netscape');
INSERT INTO "homepageupdate" VALUES (4,'2000-05-24','Neu: <a href="elektrotechnik/komplexe_zahlen.php">Komplexe Zahlen</a> umrechnen');
INSERT INTO "homepageupdate" VALUES (5,'2000-05-24','<a href="myself/">Adressenseite</a> neu gestaltet');
INSERT INTO "homepageupdate" VALUES (6,'2001-07-17','<a href="links/">Seite mit Links</a> erneuert');
INSERT INTO "homepageupdate" VALUES (7,'2000-10-12','<a href="links/">Seite mit Links</a> angelegt');
INSERT INTO "linklistcategory" VALUES (1,'7','Linux',NULL);
INSERT INTO "linklistcategory" VALUES (3,'1','Desktops',NULL);
INSERT INTO "linklistcategory" VALUES (5,'7','BeOS','Verschiedenes zum Betriebssystem BeOS');
INSERT INTO "linklistcategory" VALUES (6,NULL,'Musik',NULL);
INSERT INTO "linklistcategory" VALUES (7,NULL,'Computer',NULL);
INSERT INTO "linklistcategory" VALUES (10,NULL,'Sammelsurium',NULL);
INSERT INTO "linklistcategory" VALUES (11,NULL,'Spiele','. . . aus fast allen Genres *g*');
INSERT INTO "linklistcategory" VALUES (12,'15','DirectX-Programmierung',NULL);
INSERT INTO "linklistcategory" VALUES (13,'6','Clubs, Veranstaltung, etc.',NULL);
INSERT INTO "linklistcategory" VALUES (14,NULL,'Zeitgeschehen',NULL);
INSERT INTO "linklistcategory" VALUES (17,'14','Geschichte',NULL);
INSERT INTO "linklistcategory" VALUES (18,'1','Paketmanager RPM','Tools und Dokumentation.');
INSERT INTO "linklistcategory" VALUES (16,'7','Hardware-Projekte','Seiten mit interessanten elektronischen Ger?ten.');
INSERT INTO "linklistcategory" VALUES (15,'7','Software- und Webentwicklung','');
INSERT INTO "linklistcategory" VALUES (20,'15','PHP','Bei PHP handelt es sich um eine Skriptsprache zum erstellen dynamischer Webseiten.');
INSERT INTO "linklistcategory" VALUES (9,'6','Bands und Labels','. . . nur solche die mir gefallen nat?rlich.');
INSERT INTO "linklistcategory" VALUES (21,'15','JavaServer','');
INSERT INTO "linklistcategory" VALUES (22,'15','Java','');
INSERT INTO "linklistcategory" VALUES (19,'22','Bibliotheken und Klassen','');
INSERT INTO "linklistcategory" VALUES (4,'15','XML','');
INSERT INTO "linklistcategory" VALUES (2,'7','Cool Apps','Applikationen die mich faszinieren, rundum gelungen sind und/oder mir das Leben erleichtern.');
INSERT INTO "linklistcategory" VALUES (23,'15','DBMS (Datenbanken)','');
INSERT INTO "linklistcategory" VALUES (8,'23','MS-Access','Da ich fr?her auch mal mit diesem Tool *g* gearbeitet habe, gibt es hier ein paar Seiten dazu.');
INSERT INTO "linklistcategory" VALUES (24,'10','Augenschmaus','');
INSERT INTO "linklistcategory" VALUES (25,'15','Bibliotheken','');
INSERT INTO "linklistcategory" VALUES (26,'11','Das Schwarze Auge','');
INSERT INTO "linklistcategory" VALUES (27,'7','Benchmarking','');
INSERT INTO "linklistcategory" VALUES (28,'2','Interessante Programme','');
INSERT INTO "linklistcategory" VALUES (29,'1','Distributionen','Hier befinden sich Links zu interessanten Linux-Distributionen und zu Artikeln, die sich darauf beziehen.');
INSERT INTO "linklistcategory" VALUES (30,'7','C64','Is this love?');
INSERT INTO "linklistlink" VALUES (1,'1','linuxtoday.com','A cool linux news site','http://www.linuxtoday.com','2001-07-15');
INSERT INTO "linklistlink" VALUES (2,'1','linuxapps.com','A cool linux news site','http://www.linuxapps.com','2001-07-15');
INSERT INTO "linklistlink" VALUES (3,'1','freshmeat','Das Softwareverzeichnis fr Linux.','http://www.freshmeat.net','2001-07-15');
INSERT INTO "linklistlink" VALUES (5,'1','32bitsonline.com','A cool linux news site','http://www.32bitsonline.com','2001-07-15');
INSERT INTO "linklistlink" VALUES (6,'1','linuxnewbie.org','A cool linux site','http://linuxnewbie.org','2001-07-15');
INSERT INTO "linklistlink" VALUES (7,'1','linuxpower.org','A cool linux site','http://linuxpower.org','2001-07-15');
INSERT INTO "linklistlink" VALUES (8,'1','linuxpowered.com','A cool linux site','http://linuxpowered.com','2001-07-15');
INSERT INTO "linklistlink" VALUES (9,'1','gimp.org','A cool linux site','http://gimp.org','2001-07-15');
INSERT INTO "linklistlink" VALUES (11,'1','icewalkers.com','A cool linux site','http://icewalkers.com','2001-07-15');
INSERT INTO "linklistlink" VALUES (12,'1','linuxgrrls.org','A cool linux site','http://linuxgrrls.org','2001-07-15');
INSERT INTO "linklistlink" VALUES (13,'1','linuxchix.org','A cool linux site','http://linuxchix.org','2001-07-15');
INSERT INTO "linklistlink" VALUES (14,'1','Joshie.com','A cool linux site','http://www.joshie.com','2001-07-15');
INSERT INTO "linklistlink" VALUES (15,'5','BeNews','Hier gibt es alle Neuigkeiten rund um das Betriebssystem BeOS.','http://www.benews.com','2001-07-15');
INSERT INTO "linklistlink" VALUES (17,'8','donkarl: Homepage von Karl Donaubauer','Zustzlich zu den FAQs der deutschen Access-Newsgroup gibt es hier auch einen kurzen berblick der Unterschiede zwischen Access97 und Access2000.\015\012','http://www.donkarl.com','2001-07-16');
INSERT INTO "linklistlink" VALUES (19,'7','tecchannel.de','Ein Online-Magazin mit guten Tests und vielen interessanten Artikeln fr alle, die sich f??r Computer interessieren.\015\012','http://www.tecchannel.de','2001-07-16');
INSERT INTO "linklistlink" VALUES (20,'7','Computerclub','Der WDR-Computerclub: Wie guter Wein - alt, aber mit dem gewissen Etwas.\015\012Leider ist die Benutzerfhrung etwas krude.','http://www.wdrcc.de','2001-07-16');
INSERT INTO "linklistlink" VALUES (21,'6','Klangwald','Eine gut gemachte Seite mit Rezis, MP3-Samples, Musik- und allgemeinen Texten.\015\012Hinweis: Nicht unbedingt Mainstream - trotzdem mal ansehen.','http://www.klangwald.de/start.htm','2001-07-16');
INSERT INTO "linklistlink" VALUES (22,'6','youwant.com','Fr alle die auch bers Internet Musik hren. Diese Seite bietet gut zusammengestellte Programme (zumindest im Indie-Bereich) und einen schn gestalteten Flash-Player.','http://www.youwant.com','2001-07-16');
INSERT INTO "linklistlink" VALUES (23,'13','La Nuit Obscure','Eine Seite rund um die &#146;La Nuit Obscure&#146; und das Top Act in Zapfendorf.','http://www.lanuitobscure.de','2001-07-16');
INSERT INTO "linklistlink" VALUES (24,'7','Golem News','Eine Seite mit aktuellen Neuigkeiten aus der IT-Branche','http://www.golem.de','2001-07-17');
INSERT INTO "linklistlink" VALUES (25,'7','Alternate','Ein Versandhaus fr Komponenten, Computer, Software und und ...','http://www.alternate.de','2001-07-18');
INSERT INTO "linklistlink" VALUES (26,'9','Nightwish (Offizielle Homepage)','Eine der besten Bands. Wunderschne Stimme, einzigartig gute Lieder, einfach alles! Bis jetzt konnte ich auch noch fast jeden davon berzeugen, wie gut sie sind.','http://www.nightwish.com','2001-07-18');
INSERT INTO "linklistlink" VALUES (28,'9','Goethes Erben','','http://www.goetheserben.de','2001-07-26');
INSERT INTO "linklistlink" VALUES (29,'9','Wolfsheim','','http://www.wolfsheim.de','2001-07-26');
INSERT INTO "linklistlink" VALUES (30,'9','Erblast','','http://www.erblast.de','2001-07-29');
INSERT INTO "linklistlink" VALUES (31,'10','Cinecitta','Mulitplex in N??rnberg','http://www.cinecitta.de','2001-08-02');
INSERT INTO "linklistlink" VALUES (33,'10','brand eins','Wirtschaftsmagazin','http://www.brandeins.net','2001-08-05');
INSERT INTO "linklistlink" VALUES (34,'11','Andreas Kahn''s Giana Mulitplayer World','Hier gibts eine neue Version von Giana Sisters mit Leveleditor.Und fr alle, die nicht mehr auf Anhieb die 33 Level schaffen, gilt: ben!','http://www.stud.uni-hamburg.de/users/a_kahn/','2001-08-05');
INSERT INTO "linklistlink" VALUES (35,'11','Die Siedler von Catan','Ein Brettspiel das uns seit Jahren begeistert. Kleiner Tipp: 10 und 11 sind die hufigsten Zahlen!','http://www.die-siedler.com','2001-08-07');
INSERT INTO "linklistlink" VALUES (36,'11','Review zu Great Giana Sisters','Fr alle die das Spiel nicht kennen (Asche auf euer Haupt), gibts hier die passende Rezi.\015\012Und fr alle Fans ein Scan des Spielecovers.','http://www.lemon64.com/reviews/giana_sisters.html','2001-08-05');
INSERT INTO "linklistlink" VALUES (38,'9','Lacrimosa','','http://www.lacrimosa.com','2001-08-12');
INSERT INTO "linklistlink" VALUES (39,'7','MISTs Homepage','Die Ausgabe 7 des Diskmag, eine Seite zu Turrican und Bilder diverser alter CPUs.','http://home4u.de/mist/','2001-08-13');
INSERT INTO "linklistlink" VALUES (40,'10','Wetterregeln.de','Hier finden sich viele Bauernregeln. Aber das Wetter macht sowieso, was es will.','http://www.bauernregeln.de/','2001-08-13');
INSERT INTO "linklistlink" VALUES (41,'7','VCD Help','Diese Seite bietet Hilfe beim Erstellen von VideoCDs, SVCDs und DVDs.','http://www.vcdhelp.com','2001-09-06');
INSERT INTO "linklistlink" VALUES (42,'9','Rosenstolz','','http://www.rosenstolz.de','2001-09-06');
INSERT INTO "linklistlink" VALUES (43,'9','Umbra et Imago','','http://www.umbraetimago.de','2001-09-08');
INSERT INTO "linklistlink" VALUES (44,'9','Veljanov','','http://www.veljanov.de','2001-09-08');
INSERT INTO "linklistlink" VALUES (45,'11','Freeciv','Eine Freeware-Version (GPL) von Civilisation. Fhren Sie eine Nation von der Steinzeit in die Zukunft. (Aufbaustrategie, God-Game)','http://www.freeciv.org','2001-10-09');
INSERT INTO "linklistlink" VALUES (46,'9','Letzte Instanz','','http://www.letzte-instanz.de','2001-10-12');
INSERT INTO "linklistlink" VALUES (48,'7','OSNews.com','Sie kennen Linux, Windows und BeOS. Hinter dem Horizont geht''s weiter. Eine Seite mit Informationen zu allen mglichen Betriebssystemen.','http://www.osnews.com','2001-10-26');
INSERT INTO "linklistlink" VALUES (51,'10','Interview mit Gott','Eine gut gemachte, interessante Animation (Flash).','http://www.reata.org/interviewgerman.html','2001-11-03');
INSERT INTO "linklistlink" VALUES (52,'9','Immaculata','','http://www.immaculata.net','2001-12-10');
INSERT INTO "linklistlink" VALUES (53,'9','L''Ame Immortelle','','http://www.lameimmortelle.com','2001-12-10');
INSERT INTO "linklistlink" VALUES (55,'11','BurgerSpace Home Page','Ein Klon von Burgertime. Ziel ist es, gegen den Widerstand von Wrsten und Spiegeleiern (Mehlscken) fertige Burger zu erstellen. (Plattform-Spiel)','http://www3.sympatico.ca/sarrazip/dev/burgerspace.html','2001-12-14');
INSERT INTO "linklistlink" VALUES (57,'13','gunzencity.de','Termine von Veranstaltungen in Gunzendorf und Umgebung (Nordbayern).','http://www.gunzencity.de','2001-12-14');
INSERT INTO "linklistlink" VALUES (58,'13','Loop','','http://www.b-w-promotion.de/loop.html','2002-01-07');
INSERT INTO "linklistlink" VALUES (59,'15','Hello, World Page!','Das Programm "Hello World" in ber 200 Programmiersprachen.','http://www.latech.edu/~acm/HelloWorld.shtml','2002-01-09');
INSERT INTO "linklistlink" VALUES (60,'16','Video Disc Recorder','Ein Videorecorder auf Basis eines Computers, der viele Mglichkeiten bietet und einfach zu bedienen ist.','http://www.cadsoft.de/people/kls/vdr/','2002-01-17');
INSERT INTO "linklistlink" VALUES (61,'17','Reichstagsbrand','Eine Dokumentation des Deutschen Historischen Museums (Berlin).','http://www.dhm.de/lemo/html/nazi/innenpolitik/reichstagsbrand/index.html','2002-01-21');
INSERT INTO "linklistlink" VALUES (63,'16','fli4l - the on(e)-disk-router','fli4l ist ein Linux-basierender ISDN-, DSL- und Ethernet-Router, der lediglich 1 Diskette zum Arbeiten bentigt. Ein 486er mit 16MB RAM ist daf??r vollkommen ausreichend.','http://www.fli4l.de','2002-01-24');
INSERT INTO "linklistlink" VALUES (64,'1','Deutsches Linux HOWTO Projekt','Dieses Projekt hat es sich zum Ziel gesetzt, dem deutschsprachigen Linux-Anwender eine Dokumentation in seiner Muttersprache zur Verfgung zu stellen.','http://www.tu-harburg.de/~semb2204/dlhp/','2002-01-29');
INSERT INTO "linklistlink" VALUES (65,'3','GNOME','','http://www.gnome.org','2002-01-30');
INSERT INTO "linklistlink" VALUES (66,'3','KDE','','http://www.kde.org','2002-01-30');
INSERT INTO "linklistlink" VALUES (67,'18','Linux RPM HOWTO','(deutsch)','http://www.tu-harburg.de/dlhp/HOWTO-test/DE-RPM-HOWTO.html','2002-01-31');
INSERT INTO "linklistlink" VALUES (68,'18','Das RPM Buch',NULL,'http://www.tu-chemnitz.de/linux/Dokumentation/RPM/','2002-01-31');
INSERT INTO "linklistlink" VALUES (70,'5','BeOS-Entwickler','Kleine Tutorials zur BeOS-Programmierung','http://www.beos-entwickler.de.vu/','2002-05-06');
INSERT INTO "linklistlink" VALUES (72,'9','Persephone','Eine sch?ne Seite, aber ohne Flash geht nichts.','http://www.persephone-home.de','2002-05-07');
INSERT INTO "linklistlink" VALUES (73,'7','Heise Newsticker','','http://www.heise.de','2002-05-10');
INSERT INTO "linklistlink" VALUES (74,'13','Wave-Gotik-Treffen','Die offizielle Homepage des j&auml;hrlichen Pfingstereignisses.','http://www.wave-gotik-treffen.de','2002-05-10');
INSERT INTO "linklistlink" VALUES (71,'11','Battletech.info - The official Resource','riding the red line','http://www.battletech.info','2002-05-07');
INSERT INTO "linklistlink" VALUES (37,'15','SelfHTML','Die beste Seite um HTML zu lernen und gelegentlich auch nachzuschlagen. Erspart jedes Buch zu HTML.','http://www.teamone.de/selfhtml','2001-08-07');
INSERT INTO "linklistlink" VALUES (49,'5','OpenBeOS Project','Eine Freeware-Portierung (MIT-Lizenz) von BeOS basierend auf dem NewOS-Kernel.','http://www.openbeos.org','2001-11-01');
INSERT INTO "linklistlink" VALUES (32,'14','Telepolis','Das Magazin f?r Netzkultur. Jeden Tag aktuelle Berichte f?r die Informationsgesellschaft.','http://www.telepolis.de','2001-08-05');
INSERT INTO "linklistlink" VALUES (76,'17','Lebendiges virtuelles Museum Online','Die deutsche Geschichte von 1900 bis zur Gegenwart','http://www.dhm.de/lemo','2002-05-15');
INSERT INTO "linklistlink" VALUES (27,'20','PHPWelt','Eine Skriptsammlung zu PHP','http://www.phpwelt.de','2001-07-18');
INSERT INTO "linklistlink" VALUES (77,'20','phpHtmlLib','Eine Sammlung von Klassen und Bibliotheksfunktion zum Erstellen und Debuggen von (X)Html-Seiten. ','http://phphtmllib.sourceforge.net','2002-05-15');
INSERT INTO "linklistlink" VALUES (78,'20','PHP: Hypertext Preprocessor','Die Homepage des PHP-Projekts.','http://www.php.net','2002-05-16');
INSERT INTO "linklistlink" VALUES (50,'5','BlueEyedOS','Eine Portierung von BeOS basierend auf einem Linux-Kernel.','http://www.blueeyedos.com','2001-11-01');
INSERT INTO "linklistlink" VALUES (80,'21','Using Tomcat 4 Security Realms','Ein Tutorial ?ber den Zugriffsschutz von Java-Webservern.','http://www.onjava.com/pub/a/onjava/2001/07/24/tomcat.html','2002-05-23');
INSERT INTO "linklistlink" VALUES (79,'18','Packaging Software with RPM','Ein empfehlenswerter, dreiteiliger Kurs rund um die RPM-Paketerstellung.','http://www-106.ibm.com/developerworks/library/l-rpm1/index.html','2002-05-23');
INSERT INTO "linklistlink" VALUES (83,'9','The Retrosic','','http://www.retrosic.com','2002-05-28');
INSERT INTO "linklistlink" VALUES (82,'10','KartOO','Eine Suchmaschine die das Ergebnis als Karte repr?sentiert','http://www.kartoo.com','2002-05-28');
INSERT INTO "linklistlink" VALUES (84,'10','Mathtools.net','Ein Verzeichnis mit vielen Tools f?r Techniker und Wissenschaftler.','http://www.mathtools.net','2002-05-29');
INSERT INTO "linklistlink" VALUES (18,'8','AccessWare','Die Seite bietet einige n?tzliche Tools und Tipps.','http://www.accessware.de','2001-07-16');
INSERT INTO "linklistlink" VALUES (69,'24','Gothicart','Fotografien von Sputnik','http://www.gothicart.de','2002-05-05');
INSERT INTO "linklistlink" VALUES (86,'22','JDBC - Database Access','Datenbankzugriffe unter Java.','http://java.sun.com/docs/books/tutorial/jdbc/','2002-06-06');
INSERT INTO "linklistlink" VALUES (87,'10','Planearium','Auf dieser Seite kann man sich South-Park-M?nnchen zusammenbasteln.','http://southpark.gamesweb.com/flash/sp-studio.html','2002-06-08');
INSERT INTO "linklistlink" VALUES (47,'9','UTOPIA - Die offizielle SAMSAS TRAUM Homepage','','http://www.utopia-ist-ueberall.de','2001-10-21');
INSERT INTO "linklistlink" VALUES (88,'22','List of Java libraries to read and write image files','','http://www.geocities.com/marcoschmidt.geo/java-image-coding.html','2002-06-16');
INSERT INTO "linklistlink" VALUES (89,'10','ZYN!','das einzige deutsche Satire Magazin','http://www.zyn.de','2002-06-17');
INSERT INTO "linklistlink" VALUES (85,'21','JavaServer Page V1.2 Syntax Reference','','http://java.sun.com/products/jsp/tags/12/syntaxref12.html','2002-06-05');
INSERT INTO "linklistlink" VALUES (75,'21','Custom Tags in JSP Pages','Das entsprechende Kapitel aus dem Web Services Tutorial von Sun','http://java.sun.com/webservices/docs/ea1/tutorial/doc/JSPTags.html','2002-05-15');
INSERT INTO "linklistlink" VALUES (81,'21','&lt;taglib: tutorial&gt;','Dieses Tutorial f&uuml;hrt in die Programmierung von Taglibs ein.','http://www.orionserver.com/taglibtut/','2002-05-24');
INSERT INTO "linklistlink" VALUES (90,'19','Java2HTML Tool ','Wandelt einen Java-Quellcode in eine HTML-Seite mit Syntax-Highlightning','http://www.vaegar.f9.co.uk/java2html.html','2002-06-19');
INSERT INTO "linklistlink" VALUES (91,'21','Improved Performance with a Connection Pool ','Dieser Artikel behandelt zwei Klassen um einen Connection-Pool zu implementieren. Damit k&ouml;nnen Datenbankanwendungen auf JavaServern z. T. erheblich beschleunigt werden.','http://www.webdevelopersjournal.com/columns/connection_pool.html','2002-06-21');
INSERT INTO "linklistlink" VALUES (16,'5','BeBits','Ein reichhaltiges Softwareangebot f&uuml;r BeOS findet man in dieser Sammlung.','http://www.bebits.com','2001-07-16');
INSERT INTO "linklistlink" VALUES (94,'7','Projekt 64''er','Hier wird das ehrgeizige Ziel verfolgt alle Ausgaben des C64er-Magazins online zu stellen.','http://www.zock.com/64er/','2002-06-27');
INSERT INTO "linklistlink" VALUES (95,'10','dejure','Gesetze und Rechtsprechung zum europ&auml;ischen, deutschen und baden-w&uuml;rttembergischen Recht','http://www.dejure.org','2002-07-09');
INSERT INTO "linklistlink" VALUES (96,'5','winBe','winBe ist eine C++Bibliothek mit der man BeOS-Programme unter Windows kompilieren kann.','http://members.lycos.co.uk/thanuk/','2002-07-11');
INSERT INTO "linklistlink" VALUES (98,'16',' Data Acquisition System for the 16bit ISA Bus','','http://www.mip.sdu.dk/~fonseca/bachelor_project/html_sections/index.html','2002-07-14');
INSERT INTO "linklistlink" VALUES (99,'16','Get Wired!','Eine Auflistung von vielen Steckerbelegungen','http://wired.hard.ru/english/index.html','2002-07-22');
INSERT INTO "linklistlink" VALUES (100,'16','GameSX - Video Game Tech','','http://www.gamesx.com','2002-07-22');
INSERT INTO "linklistlink" VALUES (101,'4','XML-Halbkurs: XSL Formatting Objects','Eine kurze Einf?hrung in XSL:FO','http://www.informatik.hu-berlin.de/~obecker/Lehre/XML/08a-xslfo.html','2002-07-29');
INSERT INTO "linklistlink" VALUES (102,'2','Snow Path Formation Simulation','Dieses Programm simuliert, wie Spuren im Schnee entstehen. (OS: Linux, BSD)','http://snowpath.sourceforge.net','2002-07-31');
INSERT INTO "linklistlink" VALUES (103,'23','PostgreSQL','Diese Datenbank ist f?r sehr viele Anwendungen als Oracle-Ersatz geeignet. Damit steht einem ein kostenloses DBMS zur Verf?gung, das hohen Anspr?chen gen?gt. (Lizenz: BSD)','http://www.postgresql.org','2002-08-02');
INSERT INTO "linklistlink" VALUES (105,'4','zvon.org','The Guide to the XML Galaxy','http://www.zvon.org','2002-08-02');
INSERT INTO "linklistlink" VALUES (106,'11','Java Bomberman','','http://www.hockauf.net/robert/bomberman.php','2002-08-03');
INSERT INTO "linklistlink" VALUES (107,'15','MinGW: Minimalist GNU for Windows','','http://www.mingw.org','2002-08-04');
INSERT INTO "linklistlink" VALUES (108,'10','Doctor Snuggles Shrine','Viele bunte Sachen zum Doktor Snuggles.','http://members.tritod.com/Dr_Snuggles/','2002-08-04');
INSERT INTO "linklistlink" VALUES (109,'10','Norman Spinrad - Bibliografie','','http://homepages.compuserve.de/Mostral/spinrad/spinrad.htm','2002-08-04');
INSERT INTO "linklistlink" VALUES (110,'5','BeEmulated','Die Emulatoren-Sammlung f?r BeOS','http://www.beemulated.net','2002-08-04');
INSERT INTO "linklistlink" VALUES (112,'24','Galerie von Linda Bergkvist','','http://www.epilogue.net/cgi/database/art/list.pl?gallery=142','2002-08-04');
INSERT INTO "linklistlink" VALUES (62,'24','The Internet Ray Tracing Competition','Bilder und Animationen des regelmig stattfindenden Wettbewerbs.','http://www.irtc.org','2002-01-24');
INSERT INTO "linklistlink" VALUES (92,'24','World of Clipart','','http://www.world-of-clipart.de','2002-06-27');
INSERT INTO "linklistlink" VALUES (93,'24','Really Slick Screensavers','','http://www.reallyslick.com','2002-06-28');
INSERT INTO "linklistlink" VALUES (111,'24','deviantART','Eine riesige Galerie mit Bilder, Skins, Themes und ?hnlichem','http://www.deviantart.com','2002-08-04');
INSERT INTO "linklistlink" VALUES (113,'4','Cocoon','Die XML-Publishing-L?sung des Apache-Projekts.','http://xml.apache.org/cocoon','2002-08-06');
INSERT INTO "linklistlink" VALUES (114,'25','ImLib3D','ImLib?D ist eine Open-Source-3D-Bibliothek  zur 3D-Bildverarbeitung','http://imlib3d.sourceforge.net/','2002-08-06');
INSERT INTO "linklistlink" VALUES (115,'9','Jane Sibbery','','http://www.sheeba.ca/','2002-08-06');
INSERT INTO "linklistlink" VALUES (10,'1','Free Software Directory','','http://www.gnu.org/directory/','2002-08-15');
INSERT INTO "linklistlink" VALUES (116,'22','JPedal','Eine Bibliothek um Daten aus PDF-Datein zu extrahieren','http://www.jpedal.org','2002-08-22');
INSERT INTO "linklistlink" VALUES (117,'26','DSA Tools V4','Dieses Programm dient dazu die rechenintensive Erstellung und Pflege eines Charakters zu vereinfachen.','http://dsatools.sourceforge.net','2002-08-22');
INSERT INTO "linklistlink" VALUES (118,'4','Xerlin','Ein durch Plugins erweiterbarer XML-Editor (Java)','http://www.xerlin.org','2002-08-27');
INSERT INTO "linklistlink" VALUES (119,'2','nexTView  - EPG Dekoder Software','Dieses Programm erm?glicht die Nutzung von nexTView, einer kostenlosen elektronischen Programmzeitschrift die zusammen mit dem Teletext (Videotext) im analogen TV-Signal ?bertragen wird.','http://nxtvepg.tripod.com/index-de.html','2002-08-27');
INSERT INTO "linklistlink" VALUES (120,'2','The Network Clipboard','Eine Zwischenablage, die innerhalb eines Netzwerks funktioniert. Damit ist Drag''n''Drop zwischen verschiedenen Rechnern m?glich (Linux, Windows, GPL).','http://netclipboard.sourceforge.net/','2002-08-27');
INSERT INTO "linklistlink" VALUES (121,'21','&lt;jsptags.com&gt;','Informationen zu Custom Tag Libraries','http://jsptags.com','2002-08-28');
INSERT INTO "linklistlink" VALUES (56,'13','Schwarzromantische Tanzabende in N?rnberg u. U.','Ein kleiner Wegweiser, wenn es dunkel wird.','http://www.nefkom.net/SOS','2001-12-14');
INSERT INTO "linklistlink" VALUES (122,'22','Eclipse','Eine Entwicklungsumgebung f?r Java.','http://www.eclipse.org','2002-09-03');
INSERT INTO "linklistlink" VALUES (123,'1','JPackage','Java RPM-Pakete f?r Linux','http://www.jpackage.org','2002-09-03');
INSERT INTO "linklistlink" VALUES (124,'27','Bonnie++','Ein Benchmark insbesondere f?r Festplatten und CD-Laufwerke (Linux)','http://www.coker.com.au/bonnie++/','2002-09-03');
INSERT INTO "linklistlink" VALUES (125,'9','Sophie Ellis Bextor','','http://www.sophieellisbextor.net/','2002-09-04');
INSERT INTO "linklistlink" VALUES (126,'1','Doppelkopf','Zwei Monitore an einem Rechner betreiben.','http://www.linux-user.de/ausgabe/2001/12/044-dual/dual.html','2002-09-04');
INSERT INTO "linklistlink" VALUES (127,'21','MultipartRequest','Eine Bibliothek zum Zugriff auf Multipart-Request , wie sie z.B. beim Datei-Upload enstehen.','http://www.geocities.com/jasonpell/programs.html','2002-09-04');
INSERT INTO "linklistlink" VALUES (128,'28','jGnash','Eine Finanzsoftware f?r Privatleute.','http://jgnash.sourceforge.net/','2002-09-11');
INSERT INTO "linklistlink" VALUES (129,'11','Mantigua','Ein einfach gehaltenes Strategispiel, in dem man Inseln erobert (Linux, GPL).','http://mantigua.sourceforge.net/','2002-09-11');
INSERT INTO "linklistlink" VALUES (4,'7','slashdot.org','A cool linux news site','http://www.slashdot.org','2001-07-15');
INSERT INTO "linklistlink" VALUES (130,'2','3d-Desktop','Dieses Programm animiert das Umschalten zwischen verschiedenen virtuellen Bildschirmen (Linux, GPL)','http://desk3d.sourceforge.net/index.php','2002-09-12');
INSERT INTO "linklistlink" VALUES (131,'1','Brave GNU World','Eine regelm??ig erscheinende Kolumne, die Linux-Software vorstellt.','http://www.gnu.org/brave-gnu-world/','2002-09-16');
INSERT INTO "linklistlink" VALUES (132,'1','SelfLinux','Eine deutschsprachige, leicht verst?ndliche Linux-Dokumentation,.','http://www.selflinux.de','2002-09-17');
INSERT INTO "linklistlink" VALUES (133,'10','machinima.com','','http://www.machinima.com/','2002-09-17');
INSERT INTO "linklistlink" VALUES (135,'14','UNO-Resolutionen','Eine Datenbank mit allen Resolutionen des UN-Sicherheitsrats.','http://www.un.org/documents/scres.htm','2002-09-18');
INSERT INTO "linklistlink" VALUES (134,'14','Adlon-Rede von Roman Herzog','','http://www.deuropa.de/d/herzog/berlin.htm','2002-09-18');
INSERT INTO "linklistlink" VALUES (54,'9','18 Summers','','http://www.18summers.de','2001-12-10');
INSERT INTO "linklistlink" VALUES (136,'2','Simbrain','Eine Simulation eines neuronalen Netzwerks (Java, GPL)','http://simbrain.sourceforge.net','2002-09-30');
INSERT INTO "linklistlink" VALUES (137,'15','Seminar Objektorientierter Entwurf','','http://www.fh-wedel.de/~si/seminare/ws97/Ausarbeitung/index.html','2002-10-09');
INSERT INTO "linklistlink" VALUES (138,'29','Gentoo Linux','Diese Distribution nutze ich aktuell. Insbesondere das Package-System zum Installieren und Updaten von Programmen ist hier sehr gut gel?st.','http://www.gentoo.org','2002-10-11');
INSERT INTO "linklistlink" VALUES (97,'16','Linux for Playstation 2 Community','','http://playstation2-linux.com','2002-07-13');
INSERT INTO "linklistlink" VALUES (104,'16','Xbox Linux Project','','http://xbox-linux.sourceforge.net/','2002-08-02');
INSERT INTO "linklistlink" VALUES (139,'13','morph club','','http://www.morphclub.org','2002-10-25');
INSERT INTO "linklistlink" VALUES (140,'30','Free-6502','Der Free-6502-Kern ist ein 6502 kompatibler CPU-Kern.','http://www.free-ip.com/6502/index.html','2002-11-07');
INSERT INTO "linklistlink" VALUES (141,'30','6502.org','','http://www.6502.org','2002-11-07');
INSERT INTO "linklistlink" VALUES (142,'2','ZoltanPlayer','Ein Daemon zum Abspielen von Musik. Er wird mittels des intergrierten HTTP-Servers gesteuert.','http://www.triptico.com/software/zoltan.html','2002-11-10');
INSERT INTO "linklistlink" VALUES (143,'16','Der l?fterlose PC','Die Beschreibung eines selbstgebauten PCs auf Basis der VIA-Eden-Platform','http://www.michael-dieckmann.de/projekt_luefterlose_pc.htm','2002-12-01');
CREATE CONSTRAINT TRIGGER "<unnamed>" AFTER DELETE ON "linklistcategory"  NOT DEFERRABLE INITIALLY IMMEDIATE FOR EACH ROW EXECUTE PROCEDURE "RI_FKey_noaction_del" ('<unnamed>', 'linklistlink', 'linklistcategory', 'UNSPECIFIED', 'category_id', 'category_id');
CREATE CONSTRAINT TRIGGER "<unnamed>" AFTER UPDATE ON "linklistcategory"  NOT DEFERRABLE INITIALLY IMMEDIATE FOR EACH ROW EXECUTE PROCEDURE "RI_FKey_noaction_upd" ('<unnamed>', 'linklistlink', 'linklistcategory', 'UNSPECIFIED', 'category_id', 'category_id');
CREATE CONSTRAINT TRIGGER "<unnamed>" AFTER INSERT OR UPDATE ON "linklistlink"  NOT DEFERRABLE INITIALLY IMMEDIATE FOR EACH ROW EXECUTE PROCEDURE "RI_FKey_check_ins" ('<unnamed>', 'linklistlink', 'linklistcategory', 'UNSPECIFIED', 'category_id', 'category_id');
CREATE RULE "_RETlinklistcategorywithparent" AS ON SELECT TO linklistcategorywithparent DO INSTEAD SELECT cat.category_id, cat.under, cat.title, cat.info, parent.category_id AS parent_id, parent.title AS parent_title, parent.under AS parent_under FROM linklistcategory cat, linklistcategory parent WHERE (cat.under = parent.category_id);
