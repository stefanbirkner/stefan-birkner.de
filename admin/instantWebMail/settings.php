<?php
require("functions.php");



function auth() {
	global $l61, $l75;

	header("WWW-Authenticate: Basic realm=\"$l61\"");
	header("HTTP/1.0 401 Unauthorized");

	echo $l75;
	exit;
}

if ($PHP_AUTH_USER != $adminUsername || $PHP_AUTH_PW != $adminPassword) auth();



$handle = opendir("themes");
while ($file = readdir($handle)) {
	if ($file == "." || $file == "..") continue;

	$themes[] = $file;
}
sort($themes);



pageHeader();

if (!is_writable("settingssaved.php")) trigger_error($l69);



if ($submit) {
	if ($adminPasswordNew != $adminPasswordNew2) trigger_error($l104);

	foreach ($presetNew as $key => $value) if ($value) $presetNew[$key] = "\"".ereg_replace(", *", "\", \"", addslashes($value))."\"";

	$content  = "<?php\n";
	$content .= "\$language = \"$languageNew\";\n";
	$content .= "\$adminUsername = \"".addslashes($adminUsernameNew)."\";\n";
	$content .= "\$adminPassword = \"".addslashes($adminPasswordNew)."\";\n";
	$content .= "\$preset[\"host\"] = array(".$presetNew["host"].");\n";
	$content .= "\$preset[\"port\"] = array(".$presetNew["port"].");\n";
	$content .= "\$preset[\"username\"] = array(".$presetNew["username"].");\n";
	$content .= "\$colsOrRows = \"$colsOrRowsNew\";\n";
	$content .= "\$frameSizeHeaderList = \"".addslashes($frameSizeHeaderListNew)."\";\n";
	$content .= "\$formatText = $formatTextNew;\n";
	$content .= "\$theme = \"$themeNew\";\n";
	$content .= "\$title = \"".addslashes($titleNew)."\";\n";
	$content .= "\$footer = \"".addslashes($footerNew)."\";\n";
	$content .= "\$logInHeader = \"".addslashes($logInHeaderNew)."\";\n";
	$content .= "\$logInFooter = \"".addslashes($logInFooterNew)."\";\n";
	$content .= "?>";

	$filePointer = fopen("settingssaved.php", "w");
	fwrite($filePointer, $content);
	fclose($filePointer);

	echo "$l70<br/><br/><a href='settings.php'>$l2</a>\n";

	pageFooter();
	exit;
}



echo "<form action='settings.php' method='post'>\n";
echo "<table $tableAttributes class='tableAutoWidth'>\n";

echo "<tr>\n";
echo "<th colspan='2'>$l61</th>\n";
echo "</tr>\n";

echo "<tr>\n";
echo "<td>$l30</td>\n";
echo "<td>\n";
echo "<select name='languageNew'>\n";
listTranslations($language);
echo "</select>\n";
echo "</td>\n";
echo "</tr>\n";

echo "<tr>\n";
echo "<td>$l74</td>\n";
echo "<td><input type='text' name='adminUsernameNew' value=\"".htmlspecialchars($adminUsername)."\"/></td>\n";
echo "</tr>\n";

echo "<tr>\n";
echo "<td>$l73</td>\n";
echo "<td><input type='password' name='adminPasswordNew' value='".htmlspecialchars($adminPassword)."'/></td>\n";
echo "</tr>\n";

echo "<tr>\n";
echo "<td>$l103</td>\n";
echo "<td><input type='password' name='adminPasswordNew2' value='".htmlspecialchars($adminPassword)."'/></td>\n";
echo "</tr>\n";

echo "<tr>\n";
echo "<td><a href='javascript:openWindow(\"help.php?text=l96\")'>$l55</a></td>\n";
echo "<td><input type='text' name='presetNew[host]' value=\"".htmlspecialchars(implode(", ", $preset["host"]))."\"/></td>\n";
echo "</tr>\n";

echo "<tr>\n";
echo "<td><a href='javascript:openWindow(\"help.php?text=l97\")'>$l56</a></td>\n";
echo "<td><input type='text' name='presetNew[port]' value=\"".htmlspecialchars(implode(", ", $preset["port"]))."\"/></td>\n";
echo "</tr>\n";

echo "<tr>\n";
echo "<td><a href='javascript:openWindow(\"help.php?text=l98\")'>$l57</a></td>\n";
echo "<td><input type='text' name='presetNew[username]' value=\"".htmlspecialchars(implode(", ", $preset["username"]))."\"/></td>\n";
echo "</tr>\n";

echo "<tr>\n";
echo "<td>$l58</td>\n";
echo "<td>\n";
printf("<input type='radio' name='colsOrRowsNew' value='cols' class='button'%s/> $l59<br/>\n", ($colsOrRows == "cols") ? " checked='checked'" : "");
printf("<input type='radio' name='colsOrRowsNew' value='rows' class='button'%s/> $l60\n", ($colsOrRows == "rows") ? " checked='checked'" : "");
echo "</td>\n";
echo "</tr>\n";

echo "<tr>\n";
echo "<td>$l63</td>\n";
echo "<td>\n";
echo "<input type='text' name='frameSizeHeaderListNew' value=\"".htmlspecialchars($frameSizeHeaderList)."\" id='inputFrameSize' onblur='calculateFrameSize'/>%\n";
echo "<input type='button' value='&lt;' class='button' onclick='changeInput(-1); calculateFrameSize()'/>\n";
echo "<input type='button' value='&gt;' class='button' onclick='changeInput(1); calculateFrameSize()'/></td>\n";
echo "</tr>\n";

echo "<tr>\n";
echo "<td>$l64</td>\n";
echo "<td><div id='divFrameSize'>".(100 - $frameSizeHeaderList)."%</div></td>\n";
echo "</tr>\n";

echo "<tr>\n";
echo "<td><a href='javascript:openWindow(\"help.php?text=l93\")'>$l83</a></td>\n";
echo "<td>\n";
printf("<input type='radio' name='formatTextNew' value='true' class='button'%s/> $l84<br/>\n", ($formatText) ? " checked='checked'" : "");
printf("<input type='radio' name='formatTextNew' value='false' class='button'%s/> $l85\n", ($formatText) ? "" : " checked='checked'");
echo "</td>\n";
echo "</tr>\n";

echo "<tr>\n";
echo "<td>$l81</td>\n";
echo "<td>\n";
echo "<select name='themeNew'>\n";
for ($i = 0; $i < sizeof($themes); $i++){
	printf("<option%s>$themes[$i]</option>\n", ($themes[$i] == $theme) ? " selected='selected'" : "");
}
echo "</select>\n";
echo "</td>\n";
echo "</tr>\n";

echo "<tr>\n";
echo "<td>$l68</td>\n";
echo "<td><input type='text' name='titleNew' value=\"".htmlspecialchars(stripslashes($title))."\"/></td>\n";
echo "</tr>\n";

echo "<tr>\n";
echo "<td>$l65</td>\n";
echo "<td><textarea name='footerNew' cols='20' rows='5'>".htmlspecialchars(stripslashes($footer))."</textarea></td>\n";
echo "</tr>\n";

echo "<tr>\n";
echo "<td>$l66</td>\n";
echo "<td><textarea name='logInHeaderNew' cols='20' rows='5'>".htmlspecialchars(stripslashes($logInHeader))."</textarea></td>\n";
echo "</tr>\n";

echo "<tr>\n";
echo "<td>$l67</td>\n";
echo "<td><textarea name='logInFooterNew' cols='20' rows='5'>".htmlspecialchars(stripslashes($logInFooter))."</textarea></td>\n";
echo "</tr>\n";

echo "<tr>\n";
echo "<td></td>\n";
echo "<td><input type='submit' name='submit' value='$l62' class='button'/></td>\n";
echo "</tr>\n";

echo "</table>\n";
echo "</form>\n";
?>



<script type='text/javascript'>
<!--
inputFrameSize = document.getElementById("inputFrameSize")



function calculateFrameSize() {
	headerListFrame = parseInt(inputFrameSize.value)
	messageFrame = 100 - headerListFrame

	document.getElementById("divFrameSize").innerHTML = messageFrame+"%"
}



function changeInput(i) {
	inputFrameSize.value = parseInt(inputFrameSize.value) + i
}
// -->
</script>



<?php
pageFooter();
?>