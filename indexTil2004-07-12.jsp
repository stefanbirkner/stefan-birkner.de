<%@ taglib uri="/dbtags" prefix="sql" %>
<%@ page session="false" %>

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
		<title>Homepage von Stefan Birkner</title> 
		<meta name="description" content="Homepage von Stefan Birkner"/> 
		<meta name="author" content="Stefan Birkner"/> 
		<meta name="keywords" content="Stefan, Birkner, Homepage"/> 
		<meta name="generator" content="Herring"/> 
		<link rel="stylesheet" type="text/css" href="sb.css"/> 
    		<style type="text/css">
			.shooter {
				padding-top: 70px;
    				vertical-align: top;
    			}
    		</style>
	</head> 
 
	<body> 
		<h1>Denkansto&szlig;</h1>

		<p>
			Homepage von <a href="myself/">Stefan Birkner</a>
		</p>
 
		<table width="100%"> 
			<tr> 
				<td class="shooter" rowspan="2"> 
					<h2>Selbstreflektion?</h2>
					<p>
						Es gibt L&auml;nder, die Massenvernichtungswaffen haben und
						entwickeln, die von Menschen regiert werden, die ihre eigenen
						Leute vergiften. Dies sind echte Bedrohungen, und wir sind es
						unseren Kindern schuldig, uns diesen Bedrohungen zu stellen.</p>
					<p>(George W. Bush)</p>
				</td> 
				<td width="250" class="raised">
					<h4>Rubriken</h4>
					<ul>
						<li>[<a href="beos/">BeOS</a>]</li>						
						<li>[<a href="links/">Links</a>]</li>
						<li>[<a href="http://www.stefan-birkner.de/elektrotechnik/komplexe_zahlen.php">Elektrotechnik</a>]</li>
						<li>[<a href="http://www.stefan-birkner.de/dsa/heldengeburtstag.php">DSA</a>]</li>
						<li>[<a href="myself/">meinereiner</a>]</li>
					</ul>
				</td> 
			</tr> 
			<tr> 
				<td> 
					<h4>Neuigkeiten</h4>
					<table>
						<sql:statement id="stmt1" conn="conn1">
							<sql:query>
								SELECT * FROM homepageUpdate ORDER BY inputDate DESC
							</sql:query>
							<sql:resultSet id="rset2">
								<sql:wasEmpty>
									<tr><td>Die Liste mit den Updates der Homepage steht im Moment nicht zur Verf&uuml;gung</td></tr>
								</sql:wasEmpty>
								<sql:wasNotEmpty>
									<tr>		
										<td><sql:getDate colName="inputDate" format="MEDIUM"/></td>
										<td><sql:getColumn colName="xhtmlText"/></td>
									</tr>
								</sql:wasNotEmpty>
							</sql:resultSet>
						</sql:statement>
					</table>

					<p>
						<a href="http://validator.w3.org/check/referer"> 
							<img src="/pictures/valid-xhtml10.png"
							     alt="Valid XHTML 1.0!" height="31" width="88"/> 
						</a>
					</p>
				</td> 
			</tr>
			<tr>
				<td> _ krieg _ zerst&ouml;rung _ stille</td>
				<td>
					Email an mich: 
					<a href="mailto:mail@stefan-birkner.de">mail@stefan-birkner.de</a>
				</td>
			</tr>
		</table> 
	</body>
</html>

<sql:closeConnection conn="conn1"/>