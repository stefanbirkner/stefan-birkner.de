<?php 
   include("/homepages/20/d13395631/htdocs"."/admin/db_connect.inc"); 
    
  db30033022_connect(); 
 
  $qUpdates = mysql_query("SELECT * FROM homepageUpdate ORDER BY date DESC"); 
 
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
    <link rel="stylesheet" type="text/css" href="/main.css"/> 
  </head> 
 
  <body> 
    <h1>Denkansto&szlig;</h1>

		<p>
			Homepage von <b>Stefan Birkner</b>
		</p>
 
    <table> 
      <tr> 
        <td width="66%"> 
					<h2>Reichstagsbrand</h2>
					<p>27. Februar 1933</p>
					<h2>Pearl Harbor</h2>
					<p>7. Dezember 1941</p>
					<h2>World Trade Center</h2>
					<p>11. September 2001</p>
        </td> 
        <td>
					<h4>Rubriken</h4>
					<ul>
						<li>[<a href="links/">Links</a>]</li>
						<li>[<a href="elektrotechnik/komplexe_zahlen.php">Elektrotechnik</a>]</li>
						<li>[<a href="dsa/heldengeburtstag.php">DSA</a>]</li>
						<li>[<a href="myself/">Meine Adressen</a>]</li>
					</ul>

          <h4>Neuigkeiten</h4>
					<p>
<?php 
  $margin = "          "; 
   
  if(!$qUpdates)           
     print($margin.htmlentities("Die Liste mit den Änderungen der Homepage steht im Moment nicht zur Verfügung.")); 
  else 
  { 
     while($update = mysql_fetch_object($qUpdates)) 
     { 
        $date = substr($update->date, 8, 2).".".substr($update->date, 5, 2) 
                .".".substr($update->date, 0, 4); 
        print($margin.$date." ".$update->xhtmlText."<br/>\n"); 
     } 
  } 
?>           
					</p>

					<p>
						<a href="http://validator.w3.org/check/referer"> 
							<img src="/pictures/valid-xhtml10.png"
							     alt="Valid XHTML 1.0!" height="31" width="88"/> 
						</a>
					</p>
				</td> 
      </tr>
			<tr>
				<td> _ krieg _ zerst&ouml;rung _ stille</td>
				<td>
					Email an mich: 
					<a href="mailto:mail@stefan-birkner.de">mail@stefan-birkner.de</a>
				</td>
			</tr>
    </table> 
  </body> 
</html>