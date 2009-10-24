<%@ taglib uri="/dbtags" prefix="sql" %>

<sql:connection id="conn1">
	<sql:url>jdbc:postgresql://217.110.253.190/stefanbirkdb</sql:url>
	<sql:driver>org.postgresql.Driver</sql:driver>
	<sql:userId>stefanbirk</sql:userId>
	<sql:password>stbk199asq</sql:password>
</sql:connection>

<%-- open a database query --%>


<%-- close a database connection --%>

<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html 
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
  "DTD/xhtml1-transitional.dtd"> 
 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head> 
		<title>Tabellen der PostgreSQL-Datenbank stefanbirkdb</title> 
		<meta name="author" content="Stefan Birkner"/> 
		<link rel="stylesheet" type="text/css" href="../sb.css"/> 
	</head> 
	<body> 
		<h2>Tabellen der PostgreSQL-Datenbank stefanbirkdb</h2>
		<table>
			<sql:statement id="stmt1" conn="conn1">
				<sql:query>
					select relname from pg_class
				</sql:query>
				<sql:resultSet id="rset2">
					<tr>
						<td><sql:getColumn position="1"/></td>
					</tr>
				</sql:resultSet>
			</sql:statement>
		</table>
	</body>
</html>
<sql:closeConnection conn="conn1"/>
