<?php
require("functions.php");



pageHeader();

# Making sure the value of $text is actually a language variable. We
# wouldn't want malicious users to trick the script into showing the
# value of the username/password variables.
if (!ereg("^l[0-9]+$", $text)) {
	pageFooter();
	exit;
}



echo "<table $tableAttributes>\n";

echo "<tr>\n";
echo "<th>$l94</th>\n";
echo "</tr>\n";

echo "<tr>\n";
echo "<td>".$$text."</td>\n";
echo "</tr>\n";

echo "<tr>\n";
echo "<td><input type='button' value='$l95' class='button' onclick='self.close()'/></td>\n";
echo "</tr>\n";

echo "</table>\n";

pageFooter();
?>