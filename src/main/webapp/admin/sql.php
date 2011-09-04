<?php 
   include("/home/stefanbirk/www/admin/db_connect.inc"); 
    
  db30033022_connect(); 

	if(isset($sql))
   mysql_query($sql); 
 
	print("<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n"); 
?> 
<!DOCTYPE html 
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
  "DTD/xhtml1-transitional.dtd"> 
 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head> 
    <title>Homepage von Stefan Birkner</title> 
    <meta name="description" content="Homepage von Stefan Birkner"/> 
    <meta name="author" content="Stefan Birkner"/> 
    <meta name="keywords" content="Stefan, Birkner, Homepage"/> 
    <meta name="generator" content="Herring"/> 
    <link rel="stylesheet" type="text/css" href="sb.css"/> 
  </head> 
 
  <body> 
    <h1>Denkansto&szlig;</h1>

		<p>
			Homepage von <b>Stefan Birkner</b>
		</p>

		<form action="$PHP_SELF">
			<input name="sql">
			<input type="submit">
		</form>
	</body>
</html>