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
		<h3 class="raised">
			<a href="topcategories.jsp" onMouseover="showtip(this,event,'3')">Linksammlung</a>
			<sql:preparedStatement id="parents" conn="conn1">
				<sql:query>SELECT * FROM linklistCategoryWithParent WHERE category_id=?</sql:query>
				<sql:setColumn position="1"><%=request.getParameter("category_id")%></sql:setColumn>
				<sql:resultSet id="rsetParents">
					<sql:wasNotEmpty>
						<sql:getColumn colName="parent_id" to="parent_id"/>
						<sql:wasNotNull>
							/ <a href="?category_id=<%= pageContext.getAttribute("parent_id") %>" onMouseover="showtip(this,event,'3')"><sql:getColumn colName="parent_title"/></a>
						</sql:wasNotNull>
					</sql:wasNotEmpty>
				</sql:resultSet>
			</sql:preparedStatement>
			<sql:preparedStatement id="category" conn="conn1">
				<sql:query>SELECT * FROM linklistCategory WHERE category_id=?</sql:query>
				<sql:setColumn position="1"><%=request.getParameter("category_id")%></sql:setColumn>
				<sql:resultSet id="rsetCategory">	
					/ <sql:getColumn colName="title"/>
				</sql:resultSet>
			</sql:preparedStatement>
		</h3>

		<%-- Unterkategorien --%>
		<p>
			<sql:preparedStatement id="under" conn="conn1">
				<sql:query>select * from linklistCategory WHERE under=? ORDER BY title ASC</sql:query>
				<sql:setColumn position="1"><%=request.getParameter("category_id")%></sql:setColumn>
				<sql:resultSet id="rsetUnder">
					&middot; <a href="category.jsp?category_id=<sql:getColumn colName="category_id"/>"><sql:getColumn colName="title"/></a>
				</sql:resultSet>
			</sql:preparedStatement>
		</p>

		<%-- Links --%>
		<sql:preparedStatement id="link" conn="conn1">
			<sql:query>select * from linklistLink WHERE category_id=?</sql:query>
			<sql:setColumn position="1"><%=request.getParameter("category_id")%></sql:setColumn>
			<sql:resultSet id="rsetLink">
				<h4><a href="<sql:getColumn colName="link"/>"><sql:getColumn colName="title"/></a></h4>
				<p><sql:getColumn colName="message"/></p>
			</sql:resultSet>
		</sql:preparedStatement>

<%--		<div id="tooltip" class="tooltip" style="display:none">xx</div>--%>
	</body> 
</html>
<sql:closeConnection conn="conn1"/>