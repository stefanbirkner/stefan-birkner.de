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

CREATE TABLE linklistCategory (
	category_id SERIAL PRIMARY KEY,
	under int8,
	title text,
	info text
);

<sql:connection id="conn1">
	<sql:url initParameter="db1"/>
	<sql:driver initParameter="db1Driver"/>
	<sql:userId initParameter="db1User"/>
	<sql:password initParameter="db1Password"/>
</sql:connection>

<sql:statement id="stmt1" conn="conn1">
	<sql:query>
			SELECT * FROM linklistCategory ORDER BY category_id ASC
	</sql:query>
	<sql:resultSet id="rset1">
		<sql:wasEmpty>
			# Es wurden keine Kategorien gefunden.
		</sql:wasEmpty>
	<sql:wasNotEmpty>
INSERT INTO linklistCategory (category_id, under, title, info) VALUES (<sql:getColumn colName="category_id"/>, <sql:getColumn colName="under"/>, '<sql:getColumn colName="title"/>', '<sql:getColumn colName="info"/>');
	</sql:wasNotEmpty>
	</sql:resultSet>
</sql:statement>


CREATE TABLE linklistLink (
	link_id SERIAL PRIMARY KEY,
	category_id int8 NOT NULL REFERENCEs linklistCategory,
	title text,
	message text,
	link text,
	mod date
);

<sql:statement id="stmt1" conn="conn1">
	<sql:query>
			SELECT * FROM linklistLink
	</sql:query>
	<sql:resultSet id="rset1">
		<sql:wasEmpty>
			# Es wurden keine Links gefunden.
		</sql:wasEmpty>
	<sql:wasNotEmpty>
INSERT INTO linklistLink (category_id, title, message, link, mod) VALUES (<sql:getColumn colName="category_id"/>, '<sql:getColumn colName="title"/>', '<sql:getColumn colName="message"/>', '<sql:getColumn colName="link"/>', '<sql:getColumn colName="mod"/>');
	</sql:wasNotEmpty>
	</sql:resultSet>
</sql:statement>