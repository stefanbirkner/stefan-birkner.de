<?php
$l1 = "Ein Fehler ist aufgetreten";
$l2 = "&lt;&lt;&lt; Zurück";
$l3 = "Das Programm kann keine Verbindung zum POP Server aufbauen. Hier die Fehlermeldung:";
$l4 = "Das Programm kann sich nicht in den POP Server einloggen. Überprüfen sie bitte Ihren Benutzername und das Password";
$l5 = "OK";
$l6 = "Anmelden";
$l7 = "POP Server Passwort:";
$l8 = "POP Server Benutzername:";
$l9 = "POP Server Port:";
$l10 = "POP Server Rechnername:";
$l11 = "Es sind keine Mails vorhanden.";
$l12 = "Das Programm kann das TOP Kommando nicht ausführen.";
$l13 = "[Kein Betreff]";
$l15 = "Das Program kann die Email #$id nicht empfangen.";
$l16 = "Gesendet von:";
$l17 = "Empfänger:";
$l18 = "Datum:";
$l19 = "Organisation:";
$l20 = "Mail Programm:";
$l21 = "Antwort an:";
$l22 = "Headers";
$l23 = "Kopie an:";
$l24 = "Anworten";
$l25 = "Weiterleiten";
$l26 = "Löschen";
$l27 = "Allen Antworten";
$l28 = "Drucken";
$l29 = "Quelltext anzeigen";
$l30 = "Sprache:";
$l31 = "Sind Sie sicher die ausgewählte Nachricht zu löschen?";
$l32 = "Die Nachricht #$id kann nicht gelöscht werden.";
$l33 = "Neue Mail";
$l34 = "Neu Laden";
$l35 = "[Unbekannter Dateiname]";
$l36 = "Betreff:";
$l37 = "Von:";
$l38 = "An:";
$l39 = "Kopie an:";
$l40 = "Unsichtbare Kopie an:";
$l41 = "Datei anhängen:";
$l42 = "Verschicke als HTML";
$l43 = "Senden";
$l44 = "Sind Sie sicher die Mail jetzt zu verschicken ?";
# Do not translate [date] and [sender]. Think of them as variables. The
# string will be transformed into e.g. "On 08-08-2001 12:42, John Doe
# <doe@example.com> wrote":
$l45 = "Am [date], [sender] schrieb:";
$l46 = "Weitergeleitete Nachricht";
$l47 = "Sie/Du";
$l48 = "Vergessen Sie bitte nicht eine gültige Absenderadresse einzutragen.";
$l49 = "Vergessen Sie bitte nicht eine gültige Empfängeradresse einzutragen.";
# The character set corresponding to your language:
$l50 = "ISO-8859-1";
$l51 = "Das Programm ist nicht in der Lage eines der angeängten Dateien zu lesen, wahrscheinlich stimmen die Rechte nicht, bitte melden Sie sich bei Ihren Provider.";
$l52 = "Abmelden";
$l53 = "Lizenz: <a href='license.txt' target='_blank'>GNU General Public License</a>";
$l54 = "Über";
$l55 = "Voreinstellung POP Server:";
$l56 = "Voreinstellung POP Server Port:";
$l57 = "Voreinstellung POP Benutzername:";
$l58 = "Geteilte Frames";
$l59 = "Vertikal";
$l60 = "Horizontal";
$l61 = "Einstellungen";
$l62 = "Sichern der Einstellungen";
$l63 = "Header Frame Prozent:";
$l64 = "Message Frame Prozent:";
$l65 = "Footer (alle Seiten):";
$l66 = "Log-in Seite Header:";
$l67 = "Log-in Seite Footer:";
$l68 = "Der Text der Titelleiste:";
$l69 = "Das Programm hat keine Rechte settingssaved.php zu speichen, Rechte müssen auf 666 stehen.";
$l70 = "Die Einstellungen wurden gesichert.";
$l71 = "Altes Passwort";
$l72 = "Neues Passwort:";
$l73 = "Administration Seite Passwort:";
$l74 = "Administration Seite Benutzername:";
$l75 = "Zugriff verweigert.";
$l76 = "%s der automatischen Überprüfung";
$l77 = "Einschalten";
$l78 = "Ausschalten";
$l79 = "Anzahl der Sekunden ziwschen den Überprüfungen:";
$l80 = "Sind Sie sicher das Sie sich abmelden wollen ?";
$l81 = "Design:";
$l82 = "<a href='readme.html' target='_blank'>ReadMe Datei ansehen</a>";
$l83 = "Formatierter Nachrichtentext:";
$l84 = "Ja";
$l85 = "Nein";
$l86 = "Empfangsbestätigung erbitten";
$l87 = "Priorität:";
$l88 = "High";
$l89 = "Normal";
$l90 = "Niedrig";
$l91 = "Höchste";
$l92 = "Niedrigste";
$l93 = "Diese Einstellung schaltet formatierten Text an/aus. Wenn Sie die Funktion aktivieren, werden Formatierungen als HTML-TAGS dargestellt wie z.B.: *bold* wird zu <b>bold</b>, /italic/ wird zu <i>italic</i>, und _underlined_ wird zu <u>underlined</u>.";
$l94 = "Hilfe";
$l95 = "Schließen";
$l96 = "Wenn Sie die Zugriffe der Anwender auf einen POP Server oder eine definierte Gruppe von Servern beschrenken wollen, schreiben Sie eine Liste dieser Server mit einem Komma und Space getrennt: <i>mail1.example.com, mail2.example.com, mail3.example.com</i>";
$l97 = "Geben Sie eine oder mehrere Portnummern an, die mit einem Komma und einem Space getrennt werden, z.B.: <i>110, 111</i>.";
$l98 = "Geben Sie eine oder mehrere POP Usernamen an, die mit einem Komma und einem Space getrennt werden, z.B.: <i>user1, user2</i>.";
$l99 = "Ihre eMail Adresse:";
$l100 = "Sie haben keine Einträge zum löschen ausgewählt!";
$l101 = "Wollen Sie wirklich die ausgewählten Einträge löschen?";
$l102 = "Alle auswählen/Auswahl umkehren";
$l103 = "Passwort wiederholen";
$l104 = "Die beiden eingegebenen Passwörter stimmen nicht überein!";



function l14($timeStamp) {
	return date("d-m-Y h:i a", $timeStamp);
}
?>