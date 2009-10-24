<?php 
   include("/homepages/20/d13395631/htdocs"."/admin/db_connect.inc"); 
    
  db30033022_connect(); 
 
  $qNewsletters = mysql_query("SELECT * FROM fanProNewsletter ORDER BY releaseDate DESC"); 

	$title = "FanPro Newsletter";
 
	print("<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n"); 
?> 
<!DOCTYPE html 
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
  "DTD/xhtml1-transitional.dtd"> 
 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head> 
    <title><?php print(htmlentities($title)) ?></title> 
    <meta name="description" content="Newsletter von FanPro"/>
    <meta name="author" content="Stefan Birkner"/>
    <meta name="keywords" content="Stefan, Birkner, Homepage"/>
    <link rel="stylesheet" type="text/css" href="../../main.css"/>
  </head> 
 
  <body> 
    <h1><?php print(htmlentities($title)) ?></h1>

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
					<h4>&Uuml;berblick</h4>
					<ul>
<?php 
  $margin = "\t\t\t\t\t\t"; 
   
  if(!$qNewsletters)           
     print($margin.htmlentities("Die Liste mit den Newslettern steht im Moment nicht zur Verfügung.")); 
  else 
  { 
     while($newsletter = mysql_fetch_object($qNewsletters)) 
     { 
        print($margin."<ul><a href=\"".$PHP_SELF."?id=".$newsletter->id."\">"
				      .htmlentities($newsletter->title)."</a></ul>\n"); 
     } 
  } 
?> 	
					</ul>

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