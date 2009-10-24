<?php
set_error_handler("error");

$version = "0.60";
$cookieExpires = time() + 15552000; # Expires in six months.

session_start();

if ($setEmailAddress) {
	setcookie("emailAddress", $setEmailAddress, $cookieExpires);
	$emailAddress = $setEmailAddress;
}
if ($setUserLanguage) {
	setCookie("selectedLanguage", $setUserLanguage, $cookieExpires);
	$userLanguage = $setUserLanguage;
}

require("settingssaved.php");
require("themes/$theme/variables.php");

if (!$userLanguage) $userLanguage = $language;

# Ensuring that the user doesn't attempt to require a file he/she is
# not allowed to see:
if (strstr($userLanguage, "/")) exit;

require("languagefiles/$userLanguage.php");



function pageHeader($extra = "", $frameSet = false) {
	global $title, $l50, $theme;

	if ($frameSet) {
		$docType = "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Frameset//EN\" \"DTD/xhtml1-frameset.dtd\">\n";
	}
	else {
		$docType = "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"DTD/xhtml1-transitional.dtd\">\n";
		$body = "<body>\n";
	}

	echo $docType;
	echo "<html><head><title>".htmlspecialchars(stripslashes($title))."</title>\n";
	echo $extra;
	echo "<meta http-equiv='Content-Type' content='text/html; charset=$l50'/>\n";
	echo "<link rel='stylesheet' href='themes/$theme/style.css'/>\n";
	echo "<script type='text/javascript'>\n";
	echo "<!--\n";
	echo "function openWindow(fileName) {\n";
	echo "	uniqueId = String(Math.random()).substr(2)\n";
	echo "\n";
	echo "	window.open(fileName, uniqueId, \"height=560,width=550,menubar=yes,toolbar=no,locationbar=no,personalbar=no,scrollbars=yes,statusbar=no\")\n";
	echo "}\n";
	echo "// -->\n";
	echo "</script>\n";
	echo "</head>\n\n\n\n";

	echo $body;

	$GLOBALS["pageHeaderSent"] = TRUE;
}



function pageFooter() {
	echo stripslashes($GLOBALS["footer"])."\n";

	echo "</body></html>";
}



function error($type, $message) {
	global $pageHeaderSent, $l1, $l2;

	if ($type == E_NOTICE) return;

	if (!$pageHeaderSent) pageHeader();

	echo "<b>$l1</b><br/><br/>\n";
	echo "$message<br/><br/>\n";
	echo "<form action=''><input type='button' value='$l2' class='button' onclick='history.back()'/></form>\n";

	pageFooter();
	exit;
}



function getLine() {
	global $fp;

	# We could use rtrim() here to remove the trailing "\r\n" -
	# however, that would also remove spaces at the end of lines
	# such as "-- ".
	return substr(fgets($fp, 1024), 0, -2);
}



function command($command) {
	global $fp;

	fwrite($fp, removeLineBreaks($command)."\r\n");
	if (substr($line = getLine(), 0, 1) != "+") return false;

	return $line;
}



function headerInfo($string) {
	$lookingFor = array("contentType" => "Content-Type: ", "boundary" => "boundary=", "charSet" => "charset=", "name" => "name=", "contentTransferEncoding" => "Content-Transfer-Encoding: ", "contentDisposition" => "Content-Disposition: ", "fileName" => "filename=");
	$getValue = "[\"']?([^\"';\r]+)";

	reset($lookingFor);
	while (list($key, $value) = each($lookingFor)) {
		ereg("$value$getValue", $string, $matches);
		$info[$key] = $matches[1];

		unset($matches);
	}

	return $info;
}



function showInLine($contentType, $showImagesInLine = true) {
	$returnValue = false;

	$category = substr($contentType, 0, strpos($contentType, "/"));
	if ($category == "text" || $category == "message") $returnValue = true;

	if ($showImagesInLine) {
		$inLineImages = array("image/png", "image/jpeg", "image/gif");
		if (in_array($contentType, $inLineImages)) $returnValue = true;
	}

	return $returnValue;
}



function getHeaders($headerArray) {
	for ($i = 0; $i < sizeof($headerArray); $i++) {
		$parts = explode(": ", $headerArray[$i], 2);
		$headers[strtolower($parts[0])] = $parts[1];
	}

	return $headers;
}



function mimeHeaderDecode($string) {
	if (strstr($string, "=?")) {
		$explode = explode("=?", $string);
		$newString = $explode[0];
		for ($i = 1; $i < sizeof($explode); $i++) {
			$explode2 = explode("?", $explode[$i]);

			$newString .= (strtolower($explode2[1]) == "q") ? quoted_printable_decode($explode2[2]) : base64_decode($explode2[2]);
			$newString .= substr($explode2[3], 1);
		}
	}
	else return $string;

	return $newString;
}



# Parses an address string such as "John Doe <doe@example.com>" and
# returns the name as well as the email address. I opted not to use
# regular expressions here because it would slow things down.
function getSender($sender) {
	$senderParts["name"] = $sender;

	if (($pos = strrpos($sender, "<")) && substr($sender, -1) == ">") {
		$senderParts["name"] = substr($sender, 0, $pos - 1);
		$senderParts["email"] = substr($sender, $pos);
	}

	$firstChar = substr($senderParts["name"], 0, 1);
	$lastChar = substr($senderParts["name"], -1);
	if ($firstChar == "\"" || $firstChar == "'") $senderParts["name"] = substr($senderParts["name"], 1);
	if ($lastChar == "\"" || $lastChar == "'") $senderParts["name"] = substr($senderParts["name"], 0, -1);

	return $senderParts;
}



function quit() {
	global $fp;

	command("QUIT");

	fclose($fp);
}



function removeLineBreaks($string) {
	return strtr($string, "\r\n", "  ");
}



function listTranslations($selected) {
	$handle = opendir("languagefiles");
	while ($file = readdir($handle)) {
		if (substr($file, -4) == ".php") $languageFiles[] = substr($file, 0, -4);
	}
	sort($languageFiles);

	for ($i = 0; $i < count($languageFiles); $i++) {
		printf("<option%s>$languageFiles[$i]</option>\n", ($selected == $languageFiles[$i]) ? " selected='selected'" : "");
	}
}



if ($logOut) {
	session_unset();
	session_destroy();
}



# List of files that do *not* need a connection to the POP server:
$noConnectionNeeded = array("about.php", "help.php", "settings.php", "viewattachment.php");

if (!in_array(basename($SCRIPT_NAME), $noConnectionNeeded)) {
	foreach ($preset as $key => $value) {
		$arraySize = sizeof($value);

		if (!$arraySize) {
			$valueInput = ($key == "port") ? " value='110'" : "";
			${$key."Input"} = "<input type='text' name='$key' id='".$key."Field'$valueInput/>";
		}
		else if ($arraySize == 1) ${$key."Input"} = $$key = $value[0];
		else ${$key."Input"} = "\n<select name='$key'>\n<option>".implode("</option>\n<option>", $value)."</option>\n</select>\n";
	}

	if ($host && $port && $username && $password) {
		$fp = fsockopen($host, $port, $errorNumber, $errorMessage, 25) or trigger_error("$l3 <i>$errorNumber $errorMessage</i>");

		getLine();
		command("USER $username");
		command("PASS $password") or trigger_error($l4);

		session_register("host");
		session_register("port");
		session_register("username");
		session_register("password");
		session_register("userLanguage");
	}
	else {
		pageHeader();

		echo stripslashes($logInHeader)."\n";

		echo "<form action='$SCRIPT_NAME' method='post'>\n";
		echo "<input type='hidden' name='".session_name()."' value='".session_id()."'/>\n";
		echo "<table $tableAttributes class='tableAutoWidth'>\n";

		echo "<tr>\n";
		echo "<th colspan='2'>$l6</th>\n";
		echo "</tr>\n";

		echo "<tr>\n";
		echo "<td>$l99</td>\n";
		echo "<td><input type='text' name='setEmailAddress' id='emailField' onblur='preFillFields()' value=\"".htmlspecialchars($emailAddress)."\"/></td>\n";
		echo "</tr>\n";

		echo "<tr>\n";
		echo "<td>$l10</td>\n";
		echo "<td>$hostInput</td>\n";
		echo "</tr>\n";

		echo "<tr>\n";
		echo "<td>$l9</td>\n";
		echo "<td>$portInput</td>\n";
		echo "</tr>\n";

		echo "<tr>\n";
		echo "<td>$l8</td>\n";
		echo "<td>$usernameInput</td>\n";
		echo "</tr>\n";

		echo "<tr>\n";
		echo "<td>$l7</td>\n";
		echo "<td><input type='password' name='password'/></td>\n";
		echo "</tr>\n";

		echo "<tr>\n";
		echo "<td>$l30</td>\n";
		echo "<td>\n";
		echo "<select name='setUserLanguage'>\n";
		listTranslations(($selectedLanguage) ? $selectedLanguage : $userLanguage);
		echo "</select>\n";
		echo "</td>\n";
		echo "</tr>\n";

		echo "<tr>\n";
		echo "<td></td>\n";
		echo "<td><input type='submit' value='$l5' class='button'/></td>\n";
		echo "</tr>\n";

		echo "</table>\n";
		echo "</form>\n";

		echo "<script type='text/javascript'>\n";
		echo "<!--\n";
		echo "document.getElementById(\"emailField\").focus()\n\n\n\n";

		echo "function preFillFields() {\n";
		echo "	emailValue = document.getElementById(\"emailField\").value\n\n";

		echo "	if (emailValue != \"\") {\n";
		# We're using a regular expression to get the email
		# address since the user might write something like
		# "Someone <someone@example.com>":
		echo "		findEmail = String(emailValue.match(/[a-z0-9._-]+@[a-z0-9.-]+\.[a-z]{2,6}/i))\n";
		echo "		findEmailHost = findEmail.substring(findEmail.indexOf(\"@\") + 1)\n\n";
		
		echo "		if (document.getElementById(\"hostField\")) document.getElementById(\"hostField\").value = findEmailHost\n";
		echo "	}\n";
		echo "}\n";
		echo "// -->\n";
		echo "</script>\n";

		echo stripslashes($logInFooter)."\n";

		pageFooter();
		exit;
	}
}
?>