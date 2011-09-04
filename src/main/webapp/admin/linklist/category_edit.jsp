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
 		<h3>Kategorie bearbeiten</h3>

		<sql:preparedStatement id="stmtCategory" conn="conn1">
			<sql:query>SELECT * FROM linklistCategory WHERE category_id=?</sql:query>
			<sql:setColumn position="1"><%=request.getParameter("category_id")%></sql:setColumn>
			<sql:resultSet id="rsetCategory">
				<sql:wasEmpty>
					<p>Warnung: Eine Kategorie mit der id:&quot;<%=request.getParameter("category_id")%>&quot; existiert nicht.</td>
				</sql:wasEmpty>
				<sql:wasNotEmpty>
					<form action="category_edit_push.jsp">
						<input type="hidden" name="category_id" value="<%=request.getParameter("category_id")%>"/> 
						<table> 
							<tr> 
								<th>ID:</th> 
								<td><sql:getColumn colName="category_id"/></td> 
							</tr>
							<tr> 
								<th>&Uuml;bergeordnete Kategorie:</th> 
								<td>
									<select name="under">
										<option value="NULL">- neue Hauptkategorie -</option>
										<sql:statement id="stmtUnder" conn="conn1">
											<sql:query>SELECT * FROM linklistCategory ORDER BY title ASC</sql:query>
											<sql:resultSet id="rsetUnder">
												<sql:wasEmpty>
													<option value="">Es wurden keine Kategorien gefunden.</option>
												</sql:wasEmpty>
												<sql:wasNotEmpty>
													<option value="<sql:getColumn colName="category_id"/>"><sql:getColumn colName="title"/></option>
												</sql:wasNotEmpty>
											</sql:resultSet>
										</sql:statement>
									</select>
								</td> 
							</tr>
							<tr> 
								<th>Titel</th> 
								<td><input name="title" value="<sql:getColumn colName="title"/>"/></td> 
							</tr>
							<tr> 
								<th>Beschreibung</th> 
								<td><input name="info" value="<sql:getColumn colName="info"/>"/></td> 
							</tr>
						</table> 
						<input type="submit" value="Kategorie erzeugen"/>
					</form>
				</sql:wasNotEmpty>
			</sql:resultSet>
		</sql:preparedStatement>
	</body>
</html>

<sql:closeConnection conn="conn1"/>