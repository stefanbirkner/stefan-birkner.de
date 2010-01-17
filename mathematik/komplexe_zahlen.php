<?php 
	//Variablen gegebenenfalls mit Übergabe- oder Default-Wert initialisieren
	if(isset($_GET['realteil']))  {
		$realteil = $_GET['realteil'];
	} else {
		$realteil = 0;
	}
	if(isset($_GET['imaginaerteil']))  {
		$imaginaerteil = $_GET['imaginaerteil'];
	} else {
		$imaginaerteil = 0;
	}
	if(isset($_GET['betrag']))  {
		$betrag = $_GET['betrag'];
	} else {
		$betrag = 0;
	}
	if(isset($_GET['winkel']))  {
		$winkel = $_GET['winkel'];
	} else {
		$winkel = 0;
	}

	if(isset($_GET['whatToDo']))  {
		$whatToDo = $_GET['whatToDo'];
	} else {
		$whatToDo = "";
	}
 
   print("<?xml version=\"1.0\" encoding=\"utf-8\"?>\n"); 
?><!DOCTYPE html 
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
  "DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"> 
  <head>
    <title>Komplexe Zahlen</title> 
    <meta name="author" content="Stefan Birkner"/> 
    <meta name="keywords" 
          content="komplex, Zahl, Polarform, Arithmetische Form, Exponentialform, Umwandlung"/> 
    <link rel="stylesheet" type="text/css" href="../sb.css"/> 
    <link rel="stylesheet" type="text/css" href="mathematics.css"/> 
  </head> 
 
  <body>
	<p class="breadcrumb">
		<a href="/">Stefan Friedrich Birkner</a> &gt;
		<a href="/mathematik/">Mathematik</a> &gt;
		Umrechnung komplexer Zahlen
	</p>

    <h2>Umrechnung komplexer Zahlen</h2> 

    <p>
		Es kommt ja des &Ouml;fteren vor, dass man komplexe Zahlen zwischen arithmetischer und
		Polarform umrechnen muss. Diese Seite f&uuml;hrt diese Umrechnung f&uuml;r einen aus: man
		gibt die Werte der Zahl z in die einzelnen Felder ein, und startet dann die Berechnung mit
		dem entsprechenden Button. 
    </p> 
 
    <form name="aripol" action="<?php print($_SERVER['PHP_SELF']); ?>"> 
      <input type="hidden" name="betrag" value="<?php print($betrag); ?>"/> 
      <input type="hidden" name="winkel" value="<?php print($winkel); ?>"/> 
      <h5>Arithmetische Form &rarr; Polarform</h5> 
      <p> 
        z = <input type="text" name="realteil" 
                   value="<?php print($realteil); ?>" size="7" maxlength="20"/> 
        + j <input type="text" name="imaginaerteil" 
                   value="<?php print($imaginaerteil); ?>" size="7" maxlength="20"/> 
        &nbsp;&nbsp;&nbsp; 
        <input type="submit" value="Polarform berechnen"/> 
      </p> 
      <p> 
        <?php 
           if($realteil != 0) 
           { 
              $compBetrag = sqrt(pow($realteil, 2) + pow($imaginaerteil, 2)); 
              $compWinkel = atan($imaginaerteil/$realteil) * 180 / M_PI; 
           } 
           else 
           { 
              $compBetrag = $imaginaerteil; 
              if($imaginaerteil > 0) 
                 $compWinkel = 90; 
              else 
                 $compWinkel = 270; 
           } 
 
           $compBetrag = round($compBetrag * 100) / 100; 
           $compWinkel = round($compWinkel * 10) / 10; 
 
           print("|z| = ".$compBetrag." &nbsp;&nbsp;&nbsp; &phi; = ".$compWinkel."&deg;"); 
        ?> 
      </p> 
    </form> 
 
    <form name="polari" action="<?php print($_SERVER['PHP_SELF']); ?>"> 
      <input type="hidden" name="realteil" value="<?php print($realteil); ?>"/> 
      <input type="hidden" name="imaginaerteil" value="<?php print($imaginaerteil); ?>"/> 
      <h5>Polarform &rarr; Arithmetische Form</h5> 
      <p> 
        |z| = <input type="text" name="betrag" 
                     value="<?php print($betrag); ?>" size="7" maxlength="20"/> 
        &nbsp;&nbsp;&nbsp; 
        &phi; = <input type="text" name="winkel" 
                       value="<?php print($winkel); ?>" size="5" maxlength="20"/>&deg; 
        &nbsp;&nbsp;&nbsp; 
        <input type="submit" value="Arithmetische Form berechnen"/> 
      </p> 
      <p> 
        <?php 
           $compRealteil = $betrag * cos(M_PI * $winkel / 180); 
           $compImaginaerteil = $betrag * sin(M_PI * $winkel / 180); 
 
           $compRealteil = round($compRealteil * 100) / 100; 
           $compImaginaerteil = round($compImaginaerteil * 100) / 100; 
 
           print("z = ".$compRealteil." + ".$compImaginaerteil."j"); 
        ?> 
      </p> 
    </form>
  </body> 
</html>
