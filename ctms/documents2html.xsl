<?xml version="1.0" encoding="utf-8"?>
<xsl:stylesheet version="1.0"
                xmlns:xsl="http://www.w3.org/1999/XSL/Transform">	

	<xsl:template match="/">
		<html>
			<head>
				<title>Dokumentation</title>
				<link rel="stylesheet" type="text/css" href="ctms.css"/>
			</head>

			<body>
				<xsl:apply-templates/>
			</body>
		</html>
	</xsl:template>

	<xsl:template match="documents">
		<h2 style="text-decoration:underline">Dokumentation</h2>
		<xsl:for-each select="section">
			<h3><xsl:value-of select="title"/></h3>
			<ul>
				<xsl:for-each select="document">
					<li>
						<a>
							<xsl:attribute name="href"><xsl:value-of select="@href"/></xsl:attribute>
							<xsl:value-of select="."/>
						</a>
					</li>
				</xsl:for-each>
			</ul>
		</xsl:for-each>
	</xsl:template>
</xsl:stylesheet>
