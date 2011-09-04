<?php
  $gifts = array(
              "Praios"   => "Mut +1",
              "Rondra"   => "Talent \"Schwerter\" +1",
              "Efferd"   => "Talente \"Schwimmen\" und \"Boote Fahren\" +1",
              "Travia"   => "Intuition +1",
              "Boron"    => "Talent \"Menschenkenntnis\" +1",
              "Hesinde"  => "Talent \"Alchimie\" +1",
              "Firun"    => "Talente \"Fährtensuchen\" und \"Schusswaffen\" +1",
              "Tsa"      => "Charisma +1",
              "Phex"     => "Talente \"Taschendiebstahl\" und \"Schleichen\" +1",
              "Peraine"  => "Talent \"Heilkunde Krankheiten und Wunden\" +1",
              "Ingerimm" => "Talent \"Stumpfe Hiebwaffen\" +1",
              "Rhaja"    => "Talente \"Betören\", \"Tanzen\" und \"Musizieren\" +1"
           );
           
   $month2DieNumber = array(
                          "1" => "Praios",    "2" => "Praios",
                          "3" => "Rondra",    "4" => "Rondra",
                          "5" => "Efferd",    "6" => "Efferd",
                          "7" => "Travia",    "8" => "Travia",
                          "9" => "Boron",    "10" => "Boron",
                         "11" => "Hesinde",
                         "12" => "Firun",
                         "13" => "Tsa",
                         "14" => "Phex",     "15" => "Phex",    "16" => "Phex",
                         "17" => "Peraine",
                         "18" => "Ingerimm",
                         "19" => "Rhaja",    "20" => "Rhaja"
                      );

  // seed with microseconds
  list($usec, $sec) = explode(' ', microtime());
  srand((float) $sec + ((float) $usec * 100000));

  $day = rand(1, 30);
  $monthDie = rand(1,20);

  $month = $month2DieNumber[(string) $monthDie];
  $gift = $gifts[$month];                   
  
  $text2Print = htmlentities($day.". ".$month." (".$gift.")");
   
   print("<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n");
?>
<!DOCTYPE html 
  PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
  "DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <title>Heldengeburtstag</title>
    <meta name="author" content="Stefan Birkner"/>
    <meta name="keywords" content="Spiele, DSA, Heldengeburtstag, Heldenerschaffung, Geburtstag, Erschaffung"/>
    <link rel="stylesheet" type="text/css" href="dsa.css"/>
  </head>

  <body>
    <h2>Geboren am ...</h2>
    <h4>Ausw&uuml;rfeln von Heldengeburtstag und G&ouml;ttergeschenken</h4>
    
	<div class="note">
	    <form action="<?php $_SERVER['PHP_SELF'] ?>">
	      <p>
	        Ein neuer Held entsteht. Doch auf Dere kommen dieselbigen nicht 
	        aus dem Nichts, sondern werden irgendwann einmal geboren. Und je
	        nachdem in welchem Monat sie unter Praios' Anlitz treten,
	        haben sie einige Vorteile. Damit man sich das Ausw&uuml;rfeln 
	        des Geburtstags ersparen kann, &uuml;bernimmt das diese Seite.
	        Praktischerweise werden die G&ouml;ttergeschenke gleich mit
	        angezeigt. Dazu musst du nur den folgenden Knopf dr&uuml;cken:
	      </p>
      
	      <p style="text-align:center">
	        <?php print($text2Print); ?>
	        <input type="submit" value="Neuer Geburtstag"/>
	      </p>
	    </form>

	    <p>
	      F&uuml;r deine eigene Bibliothek kannst du dieses Tool auch 
	      <a href="heldengeburtstag.zip">herunterladen</a>.
	      Das <a href="heldengeburtstag.zip">Zip-Archiv</a> enth&auml;lt eine
	      Datei: heldenerschaffung_offline.html. Wenn du diese &ouml;ffnest,
	      kann es auf deiner Magischen Kiste daheim los gehen.<br/>
	      <a href="heldengeburtstag.zip">Heldenerschaffung.zip</a>
	    </p>

	    <p><a href="/">Zur&uuml;ck zur Homepage</a></p>
	</div>
  </body>
</html>
