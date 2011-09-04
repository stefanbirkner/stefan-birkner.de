<?php
   include("/homepages/20/d13395631/htdocs"."/admin/db_connect.inc");
   //include($HTTP_SERVER_VARS("DOCUMENT_ROOT")."/admin/db_connect.inc");

   //Publikation 1 zur Anzeige auswählen,
   //falls keine Auswahl übergeben wurde.
   if(!isset($publikation_id)) $publikation_id = 1;

   print("<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n");
?>
<!DOCTYPE html 
  PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
  "DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <title>Hallen der Weisheit</title>
    <link rel="stylesheet" type="text/css" href="../dsa.css"/>
    <script language="JavaScript">
      function showContent(selctObj)
      {  
         var selectTarget = selctObj.options[selctObj.selectedIndex].value;
         if (selectTarget != "")
         { 
            window.open("index.php3?publikation_id=" + selectTarget,'_top')
         }
      }
    </script> 
  </head>

  <body>
    <h3>Hesinde zum Gru&szlig;e geehrter Wanderer,</h3>

    <p>
      Diese Sammlung kann euch Aufschlu&szlig; &uuml;ber den Inhalt
      einzelner Ausgaben der empfehlenswerten Depesche &quot;
      Aventurischer Bote&quot; geben.<br/>
      Alle hier nicht gelisteten Boten befinden sich leider nicht in
      meinem Besitz. Um diese Auflistung zu vervollst&auml;ndigen w&uuml;rde
      ich mich daher &uuml;ber eine Zustellung von Abschriften (auch
      digitalen ;-) ) freuen.<br/>
      
      <form action="">
        So w&auml;hlet nun: <select name="publikation" ONCHANGE="showContent(this)">
          <?php
             $margin = "          ";
             db30033022_connect();

             $result = mysql_query("SELECT ID, Titel FROM Publikation");
             if($result)
             {
                while($publikation = mysql_fetch_object($result))
                {
                   print($margin."<option value=\"".$publikation->ID."\"");
                   if($publikation->ID == $publikation_id)
                      print(" selected=\"selected\"");
                   print(">");
                   print(htmlentities($publikation->Titel));
                   print("</option>\n");
                }
             }
          ?>
        </select>
      </form>
    </p>

    <table>
      <tr>
        <th>Artikel</th>
        <th>Seite</th>
      </tr>
          <?php
             $margin = "      ";
             db30033022_connect();

             $query = "SELECT * FROM Artikel WHERE Publikation_ID=".$publikation_id;
             $result = mysql_query($query);
             if($result)
             {
                while($artikel = mysql_fetch_object($result))
                {
                   print($margin."<tr>\n");
                   print($margin."  <td>".htmlentities($artikel->Ueberschrift)."</td>\n");
                   print($margin."  <td>".htmlentities($artikel->Seiten)."</td>\n");
                   print($margin."</tr>\n");
                }
             }
          ?>
    </table>
  </body>

</html>