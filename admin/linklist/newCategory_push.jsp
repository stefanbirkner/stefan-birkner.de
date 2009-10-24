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

<sql:preparedStatement id="stmt1" conn="conn1">
	<sql:query>
		INSERT INTO linklistCategory (under, title, info)
		VALUES (?, ?, ?)
	</sql:query>
	<sql:execute>
		<sql:setColumn position="1"><%=request.getParameter("under")%></sql:setColumn>
		<sql:setColumn position="2">'<%=request.getParameter("title")%>'</sql:setColumn>
		<sql:setColumn position="3">'<%=request.getParameter("info")%>'</sql:setColumn>
	</sql:execute>
</sql:preparedStatement>

<sql:closeConnection conn="conn1"/>

<jsp:forward page="index.jsp"/>
