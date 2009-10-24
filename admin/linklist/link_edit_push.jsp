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
		UPDATE linklistLink
		SET category_id=?, title=?, message=?, link=?, mod=?
		WHERE link_id=?
	</sql:query>
	<sql:execute>
		<sql:setColumn position="1"><%=request.getParameter("category_id")%></sql:setColumn>
		<sql:setColumn position="2"><%=request.getParameter("title")%></sql:setColumn>
		<sql:setColumn position="3"><%=request.getParameter("message")%></sql:setColumn>
		<sql:setColumn position="4"><%=request.getParameter("link")%></sql:setColumn>
		<sql:setColumn position="5"><%=request.getParameter("mod")%></sql:setColumn>
		<sql:setColumn position="6"><%=request.getParameter("link_id")%></sql:setColumn>
	</sql:execute>
</sql:preparedStatement>

<sql:closeConnection conn="conn1"/>

<jsp:forward page="link_list.jsp"/>
