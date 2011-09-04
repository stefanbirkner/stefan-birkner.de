<%@ taglib uri="/dbtags" prefix="sql" %>
<%@ taglib uri="/authtag" prefix="auth" %>

<auth:ifNotAuthorized >
	<auth:setAuth realm="Homepage von Stefan Birkner" />
</auth:ifNotAuthorized> 

<auth:getAuth id="authentication" />
<%

	if (   !(application.getInitParameter("username").equals(authentication[0]))
	    || !(application.getInitParameter("password").equals(authentication[1])))
	{
%>
<jsp:forward page="/index.jsp"/>
<%
	}
%>


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
		<title>Linksammlung bearbeiten</title>
		<meta name="author" content="Stefan Birkner"/>
		<link rel="stylesheet" type="text/css" href="../../sb.css"/> 
	</head> 
 
	<body>
 		<h2>Linksammlung bearbeiten</h2>
 		<h3>Kategorien</h3>

		<table> 
			<tr> 
				<th>Titel</th> 
				<th>ID</th>
				<th>&uuml;bergeordnet</th> 
				<th>Info</th> 
			</tr>
			<sql:statement id="stmt1" conn="conn1">
				<sql:query>SELECT * FROM linklistCategory ORDER BY title ASC</sql:query>
				<sql:resultSet id="rset1">
					<sql:wasEmpty>
						<tr><td colspan="4">Es wurden keine Kategorien gefunden.</td></th>
					</sql:wasEmpty>
					<sql:wasNotEmpty>
						<tr> 
							<td><a href="category_edit.jsp?category_id=<sql:getColumn colName="category_id"/>"><sql:getColumn colName="title"/></a></td> 
							<td><sql:getColumn colName="category_id"/></td>
							<td><sql:getColumn colName="under"/></th> 
							<td><sql:getColumn colName="info"/></td> 
						</tr>
					</sql:wasNotEmpty>
				</sql:resultSet>
			</sql:statement>
		</table> 
	</body>
</html>

<sql:closeConnection conn="conn1"/>