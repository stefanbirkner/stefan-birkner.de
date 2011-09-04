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
    <title>Myranor - Charaktergenerator</title>
    <link rel="stylesheet" type="text/css" href="myranor.css"/>
  </head>

  <body>
    <h3>Hesinde zum Gru&szlig;e geehrter Wanderer,</h3>
  </body>

</html>