<?php
  include("intro.inc");

  //Berechnung der Generierungspunkte, die noch für die Eigenschaften zur
  //Verfügung stehen.
  $gp4Eigenschaften = 100;
  for($i = 0; $i < count($eigenschaften); ++$i)
     $gp4Eigenschaften -= $eigenschaften[$i][2];

?>
<html>
  <head>
    <title>Myranor: Heldenerschaffung (Eigenschaften)</title>
    <link rel="stylesheet" type="text/css" href="../myranor.css"/>
  </head>

  <body>
    <p>
      Sie haben noch <?php print($gp); ?> Generierungspunkte zur
      Verf&uuml;gung. Davon k&ouml;nnen Sie <?php print($gp4Eigenschaften); ?>
      Punkte f&uuml;r die Eigenschaften verwenden.
    </p>
 
    <h2>Eigenschaften</h2>

    <p>
      <a href="rasse.php3?<?php print($queryString); ?>">Rasse ausw&auml;hlen</a>
    </p> 

    <table>
<?php
  $margin = "      ";
  for($row = 0; $row < count($eigenschaften); ++$row)
  {
     print($margin."<tr>\n");

     //Bezeichung der Eigenschaft ausgeben
     print($margin."  <th>".htmlentities($eigenschaften[$row][0]).":</th>\n");

     for($neuerWert = 8; $neuerWert <= 14; ++$neuerWert)
     {
        //Es sind nur diejenigen Eigenschaftswerte anwählbar, für die auch
        //genügend Punkte zur Verfügung stehen
        if($gp4Eigenschaften + $eigenschaften[$row][2] - $neuerWert >= 0)
        {
           //Link mit neuen Werten erzeugen
           $newGp = $gp + $eigenschaften[$row][2] - $neuerWert;
           $link = "<a href=\"".$PHP_SELF."?gp=".$newGp;
           if(isset($rasse))
              $link .= "&rasse=".$rasse;

           for($j = 0; $j < count($eigenschaften); ++$j)
           {
              $link .= "&".$eigenschaften[$j][1]."=";
              if($row == $j)
                 $link .= $neuerWert;
              else
                 $link .= $eigenschaften[$j][2];
           }
           $link .= "\">";

           if($neuerWert == $eigenschaften[$row][2])
              $class = " class=\"marked\"";
           else
              $class = "";

           print($margin."  <td".$class.">".$link.$neuerWert."</a></td>\n");
        }
        else
           //nicht anwählbaren Wert als normalen Text ausgeben
           print($margin."  <td>".$neuerWert."</td>\n");
     }
     print($margin."</tr>\n");
  }
?>
    </table>
  </body>
</html>