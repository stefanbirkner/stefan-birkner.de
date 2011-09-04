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
 		<h3>Einen Link bearbeiten</h3>

		<sql:preparedStatement id="stmtLink" conn="conn1">
			<sql:query>SELECT * FROM linklistLink WHERE link_id=?</sql:query>
			<sql:setColumn position="1"><%=request.getParameter("link_id")%></sql:setColumn>
			<sql:resultSet id="rsetLink">
				<sql:wasEmpty>
					<p>Warnung: Ein Link mit der id:&quot;<%=request.getParameter("link_id")%>&quot; existiert nicht.</td>
				</sql:wasEmpty>
				<sql:wasNotEmpty>
					<form action="link_edit_push.jsp">
						<input type="hidden" name="link_id" value="<%=request.getParameter("link_id")%>"/> 
						<table> 
							<tr> 
								<th>ID:</th> 
								<td><sql:getColumn colName="link_id"/></td> 
							</tr>
							<tr> 
								<th>&Uuml;bergeordnete Kategorie:</th> 
								<td>
									<select name="category_id">
										<sql:statement id="stmtCategory" conn="conn1">
											<sql:query>SELECT * FROM linklistCategory ORDER BY title ASC</sql:query>
											<sql:resultSet id="rsetCategory">
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
								<td><input name="message" value="<sql:getColumn colName="message"/>"/></td> 
							</tr>
							<tr> 
								<th>Aufgenommen am</th> 
								<td><input name="mod" value="<sql:getColumn colName="mod"/>"/></td> 
							</tr>
							<tr> 
								<th>Link</th> 
								<td><input name="link" value="<sql:getColumn colName="link"/>"/></td> 
							</tr>
						</table> 
						<input type="submit" value="Link &auml;ndern"/>
					</form>
				</sql:wasNotEmpty>
			</sql:resultSet>
		</sql:preparedStatement>
	</body>
</html>

<sql:closeConnection conn="conn1"/>