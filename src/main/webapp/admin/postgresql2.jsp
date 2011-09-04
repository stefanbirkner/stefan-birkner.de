<%@ page import="java.sql.*" %>
<% Class.forName("org.postgresql.Driver");
   Connection theConnection = DriverManager.getConnection("jdbc:postgresql://217.110.253.190/stefanbirkdb?user=stefanbirk&password=stbk199asq");
   Statement theStatement= theConnection.createStatement();
   ResultSet theResult = theStatement.executeQuery("SELECT * FROM pg_class ORDER BY relname"); %>

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
<%
	while(theResult.next())
	{
%>

			<tr>
				<td><%=theResult.getString(1) %></td>
				<td><%=theResult.getString(2) %></td>
				<td><%=theResult.getString(3) %></td>
				<td><%=theResult.getString(4) %></td>
			</tr>
<%
	}
%>
		</table>
	</body>
</html>
<% theConnection.close(); %>
