<?php
/* Translators:
 [sea] Sven-Erik Andersen <sven-erik.andersen@pkf107.no>

Changes:
 20-08-2001: First version [sea]
 28-08-2001: Minor corrections [sea]
 25-09-2001: Translated strings $l93-$l102 [sea]
 05-10-2001: Translated strings $l103-$l104, changed $l102 [sea]
*/

$l1 = "En feil oppstod";
$l2 = "&lt;&lt;&lt; Tilbake";
$l3 = "Programmet kunne ikke koble seg til POP-serveren. Her er feilmeldingen:";
$l4 = "Programmet kunne ikke logge seg inn på POP-serveren. Det skyldes sansynligvis et feil brukernavn eller passord.";
$l5 = "OK";
$l6 = "Logg inn";
$l7 = "Passord:";
$l8 = "Brukernavn:";
$l9 = "POP serverens port:";
$l10 = "POP serverens verts navn:";
$l11 = "Det er ingen brev i postkassa.";
$l12 = "Programmet kunne ikke kjøre TOP-komandoen.";
$l13 = "[Intet emne]";
$l15 = "Programmet kunne ikke hente brev nr. $id.";
$l16 = "Avsender:";
$l17 = "Mottaker:";
$l18 = "Dato:";
$l19 = "Organisasjon:";
$l20 = "Mail klient:";
$l21 = "Svar adresse:";
$l22 = "Meldingshode";
$l23 = "Kopi til:";
$l24 = "Besvare";
$l25 = "Videresend";
$l26 = "Slett";
$l27 = "Besvar alle";
$l28 = "Utskrift";
$l29 = "Vis kilden";
$l30 = "Språk:";
$l31 = "Er du sikker på at du vil slette valgte brev?";
$l32 = "Brev nr. $id kunne ikke bli slettet.";
$l33 = "Nytt brev";
$l34 = "Oppdater";
$l35 = "[Ukjent filnavn]";
$l36 = "Emne:";
$l37 = "Fra:";
$l38 = "Til:";
$l39 = "Kopi til:";
$l40 = "Blind kopi til:";
$l41 = "Vedlagt fil:";
$l42 = "Send som HTML";
$l43 = "Send";
$l44 = "Er du sikker på at du ønsker å sende brevet nå?";
$l45 = "Den [date], skrev [sender]:";
$l46 = "Videresendt brev";
$l47 = "du";
$l48 = "Ikke glem å skrive en gyldig avsenderadresse.";
$l49 = "Ikke glem å skrive en gyldig mottakeradresse.";
$l50 = "ISO-8859-1";
$l51 = "Programmet kunne ikke lese en av de vedlagte filene. Dette skyldes muligens at rettighetene til opplastingsmappen er feil. Vennligst kontakt din system administrator.";
$l52 = "Logg ut";
$l53 = "Lisensen: <a href='license.txt' target='_blank'>GNU General Public License</a>";
$l54 = "Om";
$l55 = "Forhåndsinnstilt POP server:";
$l56 = "Forhåndsinnstilt POP server port:";
$l57 = "Forhåndsinnstilt POP brukernavn:";
$l58 = "Oppdeling av rammene";
$l59 = "Vertikalt";
$l60 = "Horisontalt";
$l61 = "Innstillinger";
$l62 = "Lagre instillingene";
$l63 = "Prosentvis størelse av brev-oversikts rammen:";
$l64 = "Prosentvis størelse av brev-visnings rammen:";
$l65 = "Sidefot (alle sider):";
$l66 = "Logg-inn side hode:";
$l67 = "Logg-inn side fot:";
$l68 = "Tittel vist i browserens tittelramme:";
$l69 = "Dette programmet har ikke tillatelse til å skrive til settingssaved.php. Denne filen skal være chmod 666.";
$l70 = "Instillingene har blitt lagret.";
$l71 = "Behold det gamle passordet";
$l72 = "Nytt passord:";
$l73 = "Administratsjonsside passord:";
$l74 = "Administratsjonsside brukernavn:";
$l75 = "Adgang nektet.";
$l76 = "Sett automatisk sjekk %s";
$l77 = "på";
$l78 = "av";
$l79 = "Antall minutter mellom hver sjekk:";
$l80 = "Er du sikker på at du vil logge ut?";
$l81 = "Tema:";
$l82 = "<a href='readme.html' target='_blank'>Les readme-fila</a>";
$l83 = "Formatert meldingstekst:";
$l84 = "Ja";
$l85 = "Nei";
$l86 = "Be om kvittering";
$l87 = "Prioritet:";
$l88 = "Høy";
$l89 = "Normal";
$l90 = "Lav";
$l91 = "Høyeste";
$l92 = "Laveste";
$l93 = "Hvis du sier \"Ja\" her, blir alle brevene i ren tekst formatert slik at *fet* blir til <b>fet</b>, /kursiv/ blir til <i>kursiv</i> og _understreket_ blir til <u>understreket</u>.";
$l94 = "Hjelp";
$l95 = "Lukk";
$l96 = "Hvis brukeren av programmet kun skal kunne logge inn på en bestemt POP-server (eller ev. noen få, begrensede POP-servere), så kan du skrive navnet på serveren her. Er det flere enn en, så adskill navnene med komma og mellomrom, Eks.: <i>post1.eksempel.no, post2.eksempel.no, post3.eksempel.no</i>.";
$l97 = "Skriv ett eller flere portnumre adskilt med komma og mellomrom, f.eks. <i>110, 111</i>.";
$l98 = "Skriv ett eller flere brukernavn til POP-serveren adskilt av komma og mellomrom, f.eks. <i>bruker1, bruker2</i>.";
$l99 = "Epostadresse:";
$l100 = "Du har ikke krysset av noen brev som skal slettes.";
$l101 = "Er du sikker på at du vil slette de avkryssede brevene?";
$l102 = "(Fra)velg alle";
$l103 = "Gjenta passordet:";
$l104 = "De inntastede passord er ikke like.";



function l14($timeStamp) {
	return date("d-m-Y h:i a", $timeStamp);
}
?>