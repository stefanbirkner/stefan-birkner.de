<?php
	print("<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n");
?>
<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
    <title>Photonenwerk</title>
    <meta name="description" content="Homepage von Photonenwerk"/>
    <meta name="author" content="Stefan Birkner"/>
    <meta name="keywords" content="Photonenwerk, Stefan, Birkner, Homepage"/>
    <meta http-equiv="Content-Style-Type" content="text/css"/>
    <link rel="stylesheet" type="text/css" href="photonenwerk.css"/>
  </head>

  <body>
<?php
	if(isset($text))
		print("\t\t<p>".htmlentities($text)."</p>\n");
?>
  </body>
</html>