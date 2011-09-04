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
		<h2>Liste der Homepage-Updates verwalten</h2>

		
		<p>Was willst du tun?</p>
 
		<ul> 
			<li><a href="newLink.jsp">Einen neuen Link aufnehmen.</a></li>
			<li><a href="newCategory.jsp">Eine neue Kategorie anlegen.</a></li>
			<li><a href="getSQL.jsp">Die Sicherungsdatei anzeigen.</a></li>
			<li><a href="category_list.jsp">Kategorien anzeigen/verwalten.</a></li>
			<li><a href="link_list.jsp">Links anzeigen/verwalten.</a></li>
		</ul>
	</body>
</html>