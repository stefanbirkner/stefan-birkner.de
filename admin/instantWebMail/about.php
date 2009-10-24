<?php
require("functions.php");



pageHeader();

echo "<table $tableAttributes>\n";

echo "<tr>\n";
echo "<th>Instant Web Mail $version</th>\n";
echo "</tr>\n";

echo "<tr>\n";
echo "<td>\n";
# Ah, so you're in here because you want to change the copyright
# message to "© 2001 Your Name/Company"? I urge you to think twice
# before doing so. First of all, it's a clear violation of the GNU
# General Public License as well as the copyright laws in most
# countries. Secondly, did you even stop to consider that you're
# getting this program for free? That the only reward I get for
# programming Instant Web Mail is my name on this page? If you think
# I'm going to tolerate copyright violations, you're wrong. Just a
# warning.
# (To curious readers: Yes, it has indeed happened a number of times
# that people put their own name on the copyright message on this
# page).
echo "&copy; 2001, 2002 <a href='http://understroem.dk' target='_blank'>Jonas Koch Bentzen</a> and <a href='readme.html#contributors' target='_blank'>the contributors</a><br/><br/>\n";
echo "$l53<br/>\n";
echo "$l82\n";
echo "</td>\n";
echo "</tr>\n";

echo "</table>\n";

pageFooter();
?>