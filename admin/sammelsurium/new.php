<?php
  include_once("authentication.inc");

  //preferences
  $table = "cd";

  //insert new row
  $result = pg_Exec($feuer->link, "INSERT INTO \"".$table."\"(\"objektnummer\")
                                   VALUES(\"nextObjektnummer\"())");
  if($result)
  {
     //retrieve id
     $oid = pg_GetLastOid($result);
     $result = pg_Exec($feuer->link, "SELECT *
                                      FROM \"".$table."\"
                                      WHERE oid=".$oid);
     if($result)
       if($object = pg_Fetch_Object($result, 0))
       {
          $objektnummer = $object->objektnummer;
          $nextLocation = "edit.php?id=".$objektnummer;
          header("Location:   ".$nextLocation);
       }

  }

?>
<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html
     PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
     "DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <link rel="stylesheet" type="text/css" href="/css/standard-db.css">
  </head>

  <body>
    <h3>Fehler beim Anlegen einer neuen Objektnummer!</h3>

    <p>
      <a href="index.php">&gt;&gt; Zur&uuml;ck</a>
    </p>
  </body>
</html>