<?php
  include("intro.inc");
?>
<html>
  <head>
    <title>Myranor: Heldenerschaffung (Vor- und Nachteil)</title>
    <link rel="stylesheet" type="text/css" href="../myranor.css"/>
  </head>

  <body>
    <p>
      Sie haben noch <?php print($gp); ?> Generierungspunkte zur
      Verf&uuml;gung.
    </p>

    <h2>Auswahl von Vor- und Nachteilen</h2>
    
    <table>
      <tr>
        <th>Vorteile</th>
        <th>Nachteile</th>
      </tr>
<?php
  $margin = "      ";
  
  for($row = 0; $row < max(count($vorteile), count($nachteile); ++$row)
  {
     print($margin."<tr>\n");  


     print($margin."</tr>\n");  
  }
?>
      
    </table>

    <p>
      <a href="eigenschaften.php3?<?php print($queryString); ?>">Eigenschaften</a>
    </p> 

    <h3>Welcher Rasse soll Ihr Charakter angeh&ouml;ren?</h3>

    <ul>
<?php
  $margin = "      ";

  //Erstmal ermitteln wieviel GP zur Verfügung stehen ohne die für die Rasse
  //vergebenen zu beachten.
  if(isset($rasse))
  {
     $result = mysql_query("SELECT * FROM myranorRasse WHERE id=".$rasse);
     if($result)
        if($dbRasse = mysql_fetch_object($result))
           $gpOhneRasse = $gp + $dbRasse->gp;       
  }
  else
     $gpOhneRasse = $gp;

  $result = mysql_query("SELECT * FROM myranorRasse ORDER BY spezie, rasse, geschlecht");
  if($result)
  {
     while($dbRasse = mysql_fetch_object($result))
     {
        $newGp = $gpOhneRasse - $dbRasse->gp;
        $link = "<a href=\"".$PHP_SELF."?gp=".$newGp;
        for($i = 0; $i < count($eigenschaften); ++$i)
           $link .= "&".$eigenschaften[$i][1]."=".$eigenschaften[$i][2];
        $link .= "&rasse=".$dbRasse->id."\">";

        $linkEnd = " (".$dbRasse->gp." GP)</a>";
        if(isset($rasse))
        {
           if($rasse == $dbRasse->id)
              $class = " class=\"marked\"";
           else
              $class = "";
        }
        else
           $class = "";

        if($dbRasse->spezie != $lastSpezie)
        {
           if($ul3)
           {
              print(")</li>\n");
              $ul3 = FALSE;
           }
           
           if($ul2)
           {
              print($margin."  </ul>\n");
              $ul2 = FALSE;
           }

           if(($dbRasse->rasse == "") && ($dbRasse->geschlecht == ""))
              print($margin."<li".$class.">".$link.$dbRasse->spezie.$linkEnd."</li>\n");
           else
           {
              print($margin."<li>".$dbRasse->spezie."\n");
              print($margin."  <ul>\n");
              $ul2 = TRUE;
              if($dbRasse->geschlecht == "")
                 print($margin."  <li".$class.">".$link.$dbRasse->rasse.$linkEnd."</li>\n");
              else
                 print($margin."<li>".$dbRasse->rasse."</li>\n");
           }
        }
        else
        {
           if($dbRasse->rasse != $lastRasse)
           {
              if($ul3)
              {
                 print(")</li>\n");
                 $ul3 = FALSE;
              }

              if($dbRasse->geschlecht == "")
                 print($margin."  <li".$class.">".$link.$dbRasse->rasse.$linkEnd."</li>\n");
              else
              {
                 $ul3 = TRUE;
                 print($margin."  <li>".htmlentities($dbRasse->rasse)
                       ." (".$link.htmlentities($dbRasse->geschlecht).$linkEnd);
              }
           }
           else
              print(" / ".$link.htmlentities($dbRasse->geschlecht).$linkEnd);
        }

        $lastSpezie = $dbRasse->spezie;
        $lastRasse = $dbRasse->rasse;
     }
  }
?>
    </ul>

  </body>
</html>