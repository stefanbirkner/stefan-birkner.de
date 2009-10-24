<?php
require("functions.php");



if ($delete) {
	for ($i = 0; $i < sizeof($delete); $i++) {
		command("DELE $delete[$i]") or trigger_error($l32);
	}
}



pageHeader("", true);

echo "<frameset $colsOrRows='$frameSizeHeaderList%,".(100 - $frameSizeHeaderList)."%' border='0'>\n";
echo "<frame src='headerlist.php?".SID."' name='headerList' frameborder='0'/>\n";
echo "<frame src='message.php?".SID."' name='message' frameborder='0'/>\n";
echo "</frameset></html>";

quit();
?>