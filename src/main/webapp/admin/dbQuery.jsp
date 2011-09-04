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
<%@ page import="java.sql.*" %>
<%
	if (request.getParameter ("query_sql") != null)
	{
		Class.forName ("org.postgresql.Driver");
		Connection theConnection = DriverManager.getConnection ("jdbc:postgresql://217.110.253.190/stefanbirkdb?user=stefanbirk&password=stbk199asq");
		Statement theStatement= theConnection.createStatement ();
		ResultSet theResult = theStatement.executeQuery (request.getParameter("query_sql"));
	}
%>
<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html 
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
  "DTD/xhtml1-transitional.dtd"> 
 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head> 
		<title>Homepage von Stefan Birkner</title> 
		<meta name="author" content="Stefan Birkner"/> 
		<link rel="stylesheet" type="text/css" href="../sb.css"/> 
	</head> 
 
	<body> 
		<h2>Datenbankanfrage</h2>
		<h3>1. <%= application.getInitParameter("username") %></h3>
		<h3>2. <%= authentication[0] %></h3>
		<h3>3. <%= application.getInitParameter("password") %></h3>
		<h3>4. <%= authentication[1] %></h3>
		
		<form action="dbQuery.jsp">
			<textarea name="query_sql" cols="50" rows="20"></textarea>
			<input type="submit"/>
		</form>
	</body>
</html>