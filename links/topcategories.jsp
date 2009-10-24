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
		<sql:statement id="stmt1" conn="conn1">
			<sql:query>
				select * from linklistCategory WHERE under IS NULL
			</sql:query>
			<sql:resultSet id="rset2">
				<h3 class="raised"><a href="category.jsp?category_id=<sql:getColumn colName="category_id"/>"><sql:getColumn colName="title"/></a></h3>

				<%-- Unterkategorien --%>
				<p>
					<a href="category.jsp?category_id=<sql:getColumn colName="category_id"/>">Allgemein</a>
					<sql:preparedStatement id="under" conn="conn1">
						<sql:query>
							select * from linklistCategory WHERE under=? ORDER BY title ASC
						</sql:query>
						<sql:setColumn position="1"><sql:getColumn colName="category_id"/></sql:setColumn>
						<sql:resultSet id="rsetUnder">
							&middot; <a href="category.jsp?category_id=<sql:getColumn colName="category_id"/>"><sql:getColumn colName="title"/></a>
						</sql:resultSet>
					</sql:preparedStatement>
				</p>
			</sql:resultSet>
		</sql:statement>
	</body> 
</html>

<sql:closeConnection conn="conn1"/>
