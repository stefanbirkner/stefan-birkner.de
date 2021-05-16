function neuer_Heldengeburtstag()
{
   var Tag, Monat, Geschenke;

   /*Geburtstag auswürfeln*/
   Tag = Math.round((30 * Math.random()) + 0.5 );
   switch(Math.round((20 * Math.random()) + 0.5 ))
   {
      case 1:
      case 2:
         Monat = "Praios";
         Geschenke = "Mut +1";
         break;
      case 3:
      case 4:
         Monat = "Rondra";
         Geschenke = "Talent &quot;Schwerter&quot; +1";
         break;
      case 5:
      case 6:
         Monat = "Efferd";
         Geschenke = "Talente &quot;Schwimmen&quot; und &quot;Boote Fahren&quot; +1";
         break;
      case 7:
      case 8:
         Monat = "Travia";
         Geschenke = "Intuition +1";
         break;
      case 9:
      case 10:
         Monat = "Boron";
         Geschenke = "Talent &quot;Menschenkenntnis&quot; +1";
         break;
      case 11:
         Monat = "Hesinde";
         Geschenke = "Talent &quot;Alchimie&quot; +1";
         break;
      case 12:
         Monat = "Firun";
         Geschenke = "Talente &quot;F&auml;hrtensuchen&quot; und &quot;Schu&szlig;waffen&quot; +1";
         break;
      case 13:
         Monat = "Tsa";
         Geschenke = "Charisma +1";
         break;
      case 14:
      case 15:
      case 16:
         Monat = "Phex";
         Geschenke = "Talente &quot;Taschendiebstahl&quot; und &quot;Schleichen&quot; +1";
         break;
      case 17:
         Monat = "Peraine";
         Geschenke = "Talent &quot;Heilkunde Krankheiten und Wunden&quot; +1";
         break;
      case 18:
         Monat = "Ingerimm";
         Geschenke = "Talent &quot;Stumpfe Hiebwaffen&quot; +1";
         break;
      case 19:
      case 20:
         Monat = "Rhaja";
         Geschenke = "Talente &quot;Bet&ouml;ren&quot;, &quot;Tanzen&quot; und &quot;Musizieren&quot; +1";
         break;
   }

   /*Ausgabe*/
   if(document.all)
   {
      document.all.geburtstag.innerHTML = Tag + ". " + Monat;
      document.all.goettergeschenke.innerHTML = Geschenke;
   }
   else if(document.layers)
   {
      document.netscape_geburtstag.document.open();
      document.netscape_geburtstag.document.write(Tag + ". " + Monat);
      document.netscape_geburtstag.document.close();

      document.netscape_goettergeschenke.document.open();
      document.netscape_goettergeschenke.document.write(Geschenke);
      document.netscape_goettergeschenke.document.close();
   }
}