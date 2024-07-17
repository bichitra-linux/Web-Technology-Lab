<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:template match="/">
        <html>
            <body>
                <h2>Bookstore</h2>
                <table border="1">
                    <tr bgcolor="#9acd32">
                        <th>Category</th>
                        <th>Title</th>
                        <th>Language</th>
                        <th>Author</th>
                        <th>Year</th>
                        <th>Price</th>
                    </tr>
                    <xsl:for-each select="note/bookstore/book">
                        <tr>
                            <td><xsl:value-of select="@category"/></td>
                            <td><xsl:value-of select="title"/></td>
                            <td><xsl:value-of select="title/@lang"/></td>
                            <td><xsl:value-of select="author"/></td>
                            <td><xsl:value-of select="year"/></td>
                            <td><xsl:value-of select="price"/></td>
                        </tr>
                    </xsl:for-each>
                </table>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>
