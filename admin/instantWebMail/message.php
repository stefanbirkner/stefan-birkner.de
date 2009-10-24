<?php
require("functions.php");



function showBody($body) {
	global $formatText;

	$body = nl2br(htmlspecialchars($body));
	$body = str_replace("  ", "&nbsp;&nbsp;", $body);
	$body = str_replace("\t", "&nbsp;&nbsp;&nbsp;&nbsp;", $body);

	if ($formatText) {
		# Making bold text out of *text*:
		$body = eregi_replace(" \*([a-z0-9]+[^*]*[a-z0-9]+)\*", " <b>\\1</b>", $body);
		# Making italic text out of /text/:
		$body = eregi_replace(" /([a-z0-9]+[^/]*[a-z0-9]+)/", " <i>\\1</i>", $body);
		# Making underlined text out of _text_:
		$body = eregi_replace(" _([a-z0-9]+[^_]*[a-z0-9]+)_", " <u>\\1</u>", $body);
	}

	# Yes, the top level domain can indeed be up to 6 characters
	# long (".museum").
	$body = eregi_replace("([a-z0-9._-]+@[a-z0-9.-]+\.[a-z]{2,6})", "<a href='javascript:openWindow(\"write.php?action=writeTo&amp;recipient=\\1&amp;".SID."\")'>\\1</a>", $body);

	$body = eregi_replace("((f|ht)tps?://[^ \r]*[^ \r,.:!?)])", "<a href='\\1' target='_blank'>\\1</a>", $body);

	return $body;
}



pageHeader();

if (!$id) {
	quit();
	pageFooter();
	exit;
}
?>



<script type='text/javascript'>
<!--
showNext = "all"

function showHeaders() {
	if (showNext == "important") {
		document.getElementById("allHeaders").style.display = "none"
		document.getElementById("importantHeaders").style.display = "block"

		showNext = "all"
	}
	else {
		document.getElementById("importantHeaders").style.display = "none"
		document.getElementById("allHeaders").style.display = "block"

		showNext = "important"
	}
}



function deleteMessage() {
	if (confirm("<?php echo $l31; ?>")) parent.location = "index.php?delete[]=<?php echo $id."&".$SID; ?>"
}



function submitAttachmentForm(attachmentId, inLine) {
	theForm = document.getElementById("attachmentForm")

	theForm.attachmentNumber.value = attachmentId
	if (inLine) theForm.target = "_blank"

	theForm.submit()
}
// -->
</script>



<?php
command("RETR $id") or trigger_error($l15);



#######################################################################
# The headers
#######################################################################

while (($headerArray[] = getLine()) != "")

$headers = getHeaders($headerArray);

$subject = htmlspecialchars(mimeHeaderDecode($headers["subject"]));

$date = l14(strtotime($headers["date"]));

$sender = getSender($headers["from"]);
$sender = (isset($sender["email"])) ? $sender["name"]." ".$sender["email"] : $sender["name"];
$sender = htmlspecialchars(mimeHeaderDecode($sender));

$recipient = getSender($headers["to"]);
$recipient = (isset($recipient["email"])) ? $recipient["name"]." ".$recipient["email"] : $recipient["name"];
$recipient = htmlspecialchars(mimeHeaderDecode($recipient));

if (isset($headers["user-agent"])) $userAgent = $headers["user-agent"];
if (isset($headers["x-mailer"])) $userAgent = $headers["x-mailer"];
if (isset($headers["x-newsreader"])) $userAgent = $headers["x-newsreader"];

$menu  = "<tr>\n";
$menu .= "<td colspan='2'>\n";
$menu .= "<a href='javascript:openWindow(\"write.php?action=reply&amp;".SID."\")'>$l24</a> |\n";
$menu .= (isset($headers["cc"])) ? "<a href='javascript:openWindow(\"write.php?action=replyToAll&amp;".SID."\")'>$l27</a> |\n" : "$l27 |\n";
$menu .= "<a href='javascript:openWindow(\"write.php?action=forward&amp;".SID."\")'>$l25</a> |\n";
$menu .= "<a href='javascript:deleteMessage()'>$l26</a> |\n";
$menu .= "<a href='javascript:showHeaders()'>$l22</a> |\n";
$menu .= "<a href='javascript:openWindow(\"viewsource.php?id=$id&amp;".SID."\")'>$l29</a> |\n";
$menu .= "<a href='javascript:self.print()'>$l28</a>\n";
$menu .= "</td>\n";
$menu .= "</tr>\n";

$subjectLine  = "<tr>\n";
$subjectLine .= "<th colspan='2'>$subject</th>\n";
$subjectLine .= "</tr>\n";



echo "<div id='importantHeaders'>\n";
echo "<table $tableAttributes>\n";

echo $menu;

echo $subjectLine;

echo "<tr>\n";
echo "<td>$l18</td>\n";
echo "<td>$date</td>\n";
echo "</tr>\n";

echo "<tr>\n";
echo "<td>$l16</td>\n";
echo "<td>$sender</td>\n";
echo "</tr>\n";

if (isset($headers["reply-to"])) {
	$replyTo = htmlspecialchars(mimeHeaderDecode($headers["reply-to"]));

	echo "<tr>\n";
	echo "<td>$l21</td>\n";
	echo "<td>$replyTo</td>\n";
	echo "</tr>\n";
}

echo "<tr>\n";
echo "<td>$l17</td>\n";
echo "<td>$recipient</td>\n";
echo "</tr>\n";

if (isset($headers["cc"])) {
	$cc = htmlspecialchars(mimeHeaderDecode($headers["cc"]));

	echo "<tr>\n";
	echo "<td>$l23</td>\n";
	echo "<td>$cc</td>\n";
	echo "</tr>\n";
}

if (isset($headers["organization"])) {
	echo "<tr>\n";
	echo "<td>$l19</td>\n";
	echo "<td>".htmlspecialchars(mimeHeaderDecode($headers["organization"]))."</td>\n";
	echo "</tr>\n";
}

if (isset($userAgent)) {
	echo "<tr>\n";
	echo "<td>$l20</td>\n";
	echo "<td>".htmlspecialchars(mimeHeaderDecode($userAgent))."</td>\n";
	echo "</tr>\n";
}

echo "</table>\n";
echo "</div>\n";



echo "<div id='allHeaders'>\n";
echo "<table $tableAttributes>\n";

echo $menu;

echo $subjectLine;

for ($i = 0; $i < sizeof($headerArray); $i++) {
	if (!$headerArray[$i]) continue;

	unset($name);
	$value = $headerArray[$i];

	if ($colonPos = strpos($headerArray[$i], ": ")) {
		$name = substr($headerArray[$i], 0, $colonPos + 1);
		$value = substr($headerArray[$i], $colonPos + 2);
	}

	echo "<tr>\n";
	echo "<td>".htmlspecialchars($name)."</td>\n";
	echo "<td>".htmlspecialchars($value)."</td>\n";
	echo "</tr>\n";
}

echo "</table>\n";
echo "</div>\n";



#######################################################################
# The body
#######################################################################

$partInfo[1]["headers"] = headerInfo(implode("\r\n", $headerArray));
while (($line = getLine()) != ".") $partInfo[1]["body"] .= "$line\r\n";

if (isset($partInfo[1]["headers"]["boundary"])) {
	echo "<form action='viewattachment.php' id='attachmentForm' method='post'>\n";
	echo "<input type='hidden' name='attachmentNumber'/>\n";

	$parts = explode("--".$partInfo[1]["headers"]["boundary"], $partInfo[1]["body"]);
	$loopUpTo = sizeof($parts) - 1;
	for ($i = 1; $i < $loopUpTo; $i++) {
		$pos = strpos($parts[$i], "\r\n\r\n");
		$partInfo[$i]["headers"] = headerInfo(substr($parts[$i], 2, $pos - 2));
		$partInfo[$i]["body"] = substr($parts[$i], $pos + 4);

		if ($i > 1) {
			$inLine = (showInLine($partInfo[$i]["headers"]["contentType"])) ? "true" : "false";

			if (isset($partInfo[$i]["headers"]["fileName"])) $partInfo[$i]["attachmentName"] = $partInfo[$i]["headers"]["fileName"];
			if (isset($partInfo[$i]["headers"]["name"])) $partInfo[$i]["attachmentName"] = $partInfo[$i]["headers"]["name"];
			else $partInfo[$i]["attachmentName"] = $l35;

			echo "<input type='hidden' name='contentType[$i]' value='".$partInfo[$i]["headers"]["contentType"]."'/>\n";
			echo "<input type='hidden' name='charSet[$i]' value='".$partInfo[$i]["headers"]["charSet"]."'/>\n";
			echo "<input type='hidden' name='name[$i]' value='".$partInfo[$i]["headers"]["name"]."'/>\n";
			echo "<input type='hidden' name='contentTransferEncoding[$i]' value='".$partInfo[$i]["headers"]["contentTransferEncoding"]."'/>\n";
			echo "<input type='hidden' name='fileName[$i]' value='".$partInfo[$i]["headers"]["fileName"]."'/>\n";
			echo "<input type='hidden' name='inLine[$i]' value='$inLine'/>\n";
			echo "<input type='hidden' name='content[$i]' value=\"".htmlspecialchars($partInfo[$i]["body"])."\"/>\n";
			echo "<img src='images/package.gif' height='11' width='11' alt=''/> <a href='javascript:submitAttachmentForm($i, $inLine)'>".$partInfo[$i]["attachmentName"]."</a><br/>\n";
		}
	}

	echo "</form>\n";
}
else $loopUpTo = 2;

for ($i = 1; $i < $loopUpTo; $i++) {
	if ($i == 1 || showInLine($partInfo[$i]["headers"]["contentType"], false)) {
		if ($partInfo[$i]["headers"]["contentTransferEncoding"] == "quoted-printable") $partInfo[$i]["body"] = quoted_printable_decode($partInfo[$i]["body"]);
		if ($partInfo[$i]["headers"]["contentTransferEncoding"] == "base64") $partInfo[$i]["body"] = base64_decode($partInfo[$i]["body"]);

		# Assigning $partInfo[$i]["body"] to a different
		# variable. We cannot run showBody() directly on
		# $partInfo[$i]["body"], because the contents of that
		# variable is also used in the compose window.
		$body = $partInfo[$i]["body"];
		if ($partInfo[$i]["headers"]["contentType"] != "text/html") $body = showBody($body);

		if ($i > 1) {
			echo "<table $tableAttributes>\n";

			echo "<tr>\n";
			echo "<td>".$partInfo[$i]["attachmentName"]."</td>\n";
			echo "</tr>\n";

			echo "</table>\n";
		}

		echo "<p>$body</p>\n";
	}
}



echo "<form action='' id='replyForm'>\n";
echo "<input type='hidden' name='date' value='$date'/>\n";
echo "<input type='hidden' name='from' value=\"$sender\"/>\n";
printf("<input type='hidden' name='replyTo' value=\"%s\"/>\n", (isset($replyTo)) ? $replyTo : $sender);
echo "<input type='hidden' name='to' value=\"$recipient\"/>\n";
if ($cc) echo "<input type='hidden' name='cc' value=\"$cc\"/>\n";
echo "<input type='hidden' name='subject' value=\"$subject\"/>\n";
echo "<input type='hidden' name='body' value=\"".htmlspecialchars($partInfo[1]["body"])."\"/>\n";
echo "</form>\n";

quit();
pageFooter();
?>