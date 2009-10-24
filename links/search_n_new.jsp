<%@ taglib uri="/dbtags" prefix="sql" %>

<sql:connection id="conn1">
	<sql:url initParameter="db1"/>
	<sql:driver initParameter="db1Driver"/>
	<sql:userId initParameter="db1User"/>
	<sql:password initParameter="db1Password"/>
</sql:connection>

<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html 
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
  "DTD/xhtml1-transitional.dtd"> 
 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta name="author" content="Stefan Birkner"/> 
		<link rel="stylesheet" type="text/css" href="../sb.css"/> 
		<link rel="stylesheet" type="text/css" href="links.css"/> 
	</head> 

	<body> 
		<div class="raised">
			<h2>Seiten suchen</h2>

			<p>
				Sie k&ouml;nnen meine Sammlung auch nach einzelnen Stichworten durchsuchen.
				(<a href="searchHelp.html" target="mainFrame">Tipps f&uuml;r die Suche</a>)
			</p>


			<form target="mainFrame" action="search.jsp">
				Stichworte:
				<input name="keywords" />
				<button type="submit">Finden!</button>
			</form>
		</div>

		<div>
			<h2>Neue Links</h2>

			<sql:statement id="stmt1" conn="conn1">
				<sql:query>select * from linklistLink ORDER BY mod DESC LIMIT 5</sql:query>
				<sql:resultSet id="rset2">
					<h4>
						<a href="<sql:getColumn position="5"/>" target="mainFrame">
							<sql:getColumn position="3"/>
						</a>
					</h4>
					<p><sql:getColumn position="4"/></p>
				</sql:resultSet>
			</sql:statement>
		</div>
	</body> 
</html>

<sql:closeConnection conn="conn1"/>
