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
<%--		<script src="linklist.js" type="text/javascript"/>--%>
	</head> 

	<body>

		<h3 class="raised">Suchergebnis</h3>

		<%-- Links --%>
		<sql:preparedStatement id="link" conn="conn1">
			<sql:query>select * from linklistLink WHERE title like ? OR message LIKE '%?%'</sql:query>
			<sql:setColumn position="1">'%<%=request.getParameter("keywords")%>%'</sql:setColumn>
			<sql:setColumn position="2"><%=request.getParameter("keywords")%></sql:setColumn>
			<sql:resultSet id="rsetLink">
				<h4><a href="<sql:getColumn colName="link"/>"><sql:getColumn colName="title"/></a></h4>
				<p><sql:getColumn colName="message"/></p>
			</sql:resultSet>
		</sql:preparedStatement>

<%--		<div id="tooltip" class="tooltip" style="display:none">xx</div>--%>
	</body> 
</html>
<sql:closeConnection conn="conn1"/>