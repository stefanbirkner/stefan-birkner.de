<!DOCTYPE html 
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
  "DTD/xhtml1-transitional.dtd"> 
 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head> 
		<title>Homepage von Stefan Birkner</title> 
		<meta name="description" content="Homepage von Stefan Birkner"/> 
		<meta name="author" content="Stefan Birkner"/> 
		<meta name="keywords" content="Stefan, Birkner, Homepage"/> 
		<link rel="stylesheet" type="text/css" href="sb.css"/> 
    		<style type="text/css">
			.shooter {
				padding-top: 70px;
    				vertical-align: top;
    			}
body {
	background-color : #ffffff; 
	margin:0px; 
	margin-bottom:10px; 
	padding:20px;
	padding-top:5px; }
 
p,h1,h2,h3,h4,ul,ol,li,div,td,th,i,form {
	color:#303030; 
	font-family: Helvetica,Arial,sans-serif;
	font-size:10pt;
	font-weight:normal; }

h1,h2,h3,h4,h5,h6,a {
	color:#000000; }

p,h1,h2,h3,h4,h5,h6,form {
	padding-top: 2pt;
	padding-bottom: 2pt;
	margin: 0px; }

p, form {
	text-align:justify;
	padding-right: 5pt;
	padding-left: 5pt; }

h1,h2,h3,h4,h5,h6 {
	margin-top: 3pt;
	padding-right: 2pt;
	padding-left: 2pt; }
 
h1 {
	font-size:24pt;
	font-weight:bold; 
	border-bottom-style:solid;
	border-bottom-color:#000000;
	border-bottom-width:medium;
	margin-bottom: 5pt; 
	padding-top:5px; }
 
h2 {
	font-size:18pt;
	text-decoration: underline;
}

h3 { font-size:16pt; } 
h4 { font-size:14pt; } 
h5 { font-size:12pt; } 
h6 { font-size:10pt; } 

td, th {
	vertical-align: top;
}

td.history { color:#32e632; 
             font-size:8pt; } 
 
td.background { background-color:#c89632; 
                color:#000000;  }

ul {
	margin-top:0px; }

img { border:0; } 

a { text-decoration:none;
    font-weight:bold; }
  
a:hover { background-color:#ff9090; }

.raised {
	background-color: #eeeeee;
	border-color:#dddddd; 
	border-style:solid; 
	border-width:1px;
	margin: 5pt;
	margin-bottom:12pt; 
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
					<h2>Bist du gl&uuml;cklich?</h2>
					<p>Vielleicht die wichtigste Frage . . .</p>
				</td> 
				<td width="250" class="raised">
					<h4>Rubriken</h4>
					<ul>
						<li>[<a href="beos/">BeOS</a>]</li>						
						<li>[<a href="links/">Links</a>]</li>
						<li>[<a href="elektrotechnik/komplexe_zahlen.php">Elektrotechnik</a>]</li>
						<li>[<a href="dsa/heldengeburtstag.php">DSA</a>]</li>
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
