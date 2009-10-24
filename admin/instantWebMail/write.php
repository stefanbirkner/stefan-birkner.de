<?php
# It might seem weird that this page connects to the POP server even
# though it does not need any information from the POP server. There is
# a reason, though: If anyone could access this file, spammers could
# easily use this page for their purposes. However, the POP login
# process serves as a kind of authentification that ensures that only
# those who have access to the POP server may use the SMTP server for
# sending.
require("functions.php");



pageHeader();

if ($submit) {
	$from = removeLineBreaks($from);
	$to = removeLineBreaks($to);
	$cc = removeLineBreaks($cc);
	$bcc = removeLineBreaks($bcc);
	$subject = removeLineBreaks($subject);
	$priority = removeLineBreaks($priority);

	$br = (stristr(PHP_OS, "win")) ? "\r\n" : "\n";

	$mainBodyContentType = ($html == "true") ? "text/html" : "text/plain";

	$boundary = "----------".uniqid("");

	$headers = "From: $from".$br."User-Agent: Instant Web Mail $version$br";
	if ($receipt) $headers .= "Disposition-Notification-To: $from$br";
	if ($priority != 3) $headers .= "X-Priority: $priority$br";
	if ($cc) $headers .= "Cc: $cc$br";
	if ($bcc) $headers .= "Bcc: $bcc$br";

	$body = wordwrap($body, 72, "$br");

	$attachedFiles = false;
	for ($i = 0; $i < sizeof($files); $i++) {
		if (is_uploaded_file($files[$i])) {
			$attachedFiles = true;

			$filePointer = fopen($files[$i], "r") or trigger_error($l51);
			$content = fread($filePointer, filesize($files[$i]));
			fclose($filePointer);

			$contentType = ($files_type[$i]) ? $files_type[$i] : "application/octet-stream";
			if (!showInLine($contentType, false)) {
				$contentTransferEncoding = "base64";
				$content = chunk_split(base64_encode($content), 72);
			}
			else $contentTransferEncoding = "8bit";
			$contentDisposition = (showInLine($contentType)) ? "inline" : "attachment";

			$extraBody .= "--$boundary".$br."Content-Type: $contentType;$br\tname=\"$files_name[$i]\"".$br."Content-Transfer-Encoding: $contentTransferEncoding".$br."Content-Disposition: $contentDisposition;$br\tfilename=\"$files_name[$i]\"$br$br$content$br$br";
		}
	}

	if ($attachedFiles) {
		$headers .= "Content-Type: multipart/mixed;$br\tboundary=\"$boundary\"$br";
		$body = "--$boundary".$br."Content-Type: $mainBodyContentType;$br\tcharset=\"$l50\"".$br."Content-Transfer-Encoding: 8bit$br$br$body$br$br$extraBody--$boundary--$br";
	}
	else $headers .= "Content-Type: $mainBodyContentType;$br\tcharset=\"$l50\"$br";

	$headers = rtrim($headers);

	mail($to, $subject, $body, $headers);


	
	echo "<script type='text/javascript'>\n";
	echo "<!--\n";
	echo "window.close()\n";
	echo "// -->\n";
	echo "</script>\n";

	quit();
	pageFooter();
	exit;
}



echo "<form action='$SCRIPT_NAME' enctype='multipart/form-data' id='sendForm' method='post' onsubmit='return pleaseConfirm()'>\n";
echo "<input type='hidden' name='".session_name()."' value='".session_id()."'/>\n";
echo "<table $tableAttributes>\n";

echo "<tr>\n";
echo "<td>$l37</td>\n";
echo "<td><input type='text' name='from' value=\"".htmlspecialchars($emailAddress)."\"/></td>\n";
echo "</tr>\n";

echo "<tr>\n";
echo "<td>$l38</td>\n";
echo "<td><input type='text' name='to'/></td>\n";
echo "</tr>\n";

echo "<tr>\n";
echo "<td>$l39</td>\n";
echo "<td><input type='text' name='cc'/></td>\n";
echo "</tr>\n";

echo "<tr>\n";
echo "<td>$l40</td>\n";
echo "<td><input type='text' name='bcc'/></td>\n";
echo "</tr>\n";

echo "<tr>\n";
echo "<th>$l36</th>\n";
echo "<th><input type='text' name='subject'/></th>\n";
echo "</tr>\n";

echo "<tr>\n";
echo "<td colspan='2'>\n";
echo "<textarea name='body' cols='72' rows='10' id='textareaWrite'></textarea><br/>\n";
echo "<input type='checkbox' name='html' class='button' value='true'/> $l42<br/>\n";
echo "<input type='checkbox' name='receipt' class='button' value='true'/> $l86\n";
echo "</td>\n";
echo "</tr>\n";

echo "<tr>\n";
echo "<td>$l87</td>\n";
echo "<td>\n";
echo "<select name='priority'>\n";
echo "<option value='1'>$l91</option>\n";
echo "<option value='2'>$l88</option>\n";
echo "<option value='3' selected='selected'>$l89</option>\n";
echo "<option value='4'>$l90</option>\n";
echo "<option value='5'>$l92</option>\n";
echo "</select>\n";
echo "</td>\n";
echo "</tr>\n";

echo "<tr>\n";
echo "<td>$l41</td>\n";
echo "<td><input type='file' name='files[]'/></td>\n";
echo "</tr>\n";

echo "<tr>\n";
echo "<td>$l41</td>\n";
echo "<td><input type='file' name='files[]'/></td>\n";
echo "</tr>\n";

echo "<tr>\n";
echo "<td>$l41</td>\n";
echo "<td><input type='file' name='files[]'/></td>\n";
echo "</tr>\n";

echo "<tr>\n";
echo "<td></td>\n";
echo "<td><input type='submit' name='submit' class='button' value='$l43'/></td>\n";
echo "</tr>\n";

echo "</table>\n";
echo "</form>\n";
?>



<script type='text/javascript'>
<!--
mailForm = document.getElementById("sendForm")



function pleaseConfirm() {
	validEmail = /[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}/
	if (mailForm.from.value.search(validEmail) == -1) {
		alert("<?php echo $l48; ?>")
		mailForm.from.focus()
		return false
	}
	if (mailForm.to.value.search(validEmail) == -1) {
		alert("<?php echo $l49; ?>")
		mailForm.to.focus()
		return false
	}

	return (confirm("<?php echo $l44; ?>")) ? true : false
}



action = location.search.substring(8, location.search.indexOf("&"))

if (action == "reply" || action == "replyToAll" || action == "forward") {
	openerForm = window.opener.document.getElementById("replyForm")
	subject = openerForm.subject.value
	body = openerForm.body.value

	if (action == "forward") {
		subjectPrefix = "Fwd: "

		// The "\x2d" is a hyphen. We can't write the hyphens
		// directly because the HTML validator regards two or
		// more hyphens in a row as the ending of a comment,
		// causing the whole page to be invalid HTML.
		bodyPrefix  = "\r\n\r\n"
		bodyPrefix += "\x2d\x2d\x2d\x2d\x2d\x2d\x2d\x2d\x2d\x2d <?php echo $l46; ?> \x2d\x2d\x2d\x2d\x2d\x2d\x2d\x2d\x2d\x2d\r\n"
		bodyPrefix += "<?php echo $l36; ?> "+subject+"\r\n"
		bodyPrefix += "<?php echo $l18; ?> "+openerForm.date.value+"\r\n"
		bodyPrefix += "<?php echo $l16; ?> "+openerForm.from.value+"\r\n"
		bodyPrefix += "<?php echo $l17; ?> "+openerForm.to.value
	}
	else {
		if (action == "replyToAll") {
			mailForm.cc.value = openerForm.cc.value
			whoWrote = openerForm.from.value
		}
		else whoWrote = "<?php echo $l47; ?>"

		mailForm.to.value = openerForm.replyTo.value

		subjectPrefix = (subject.substr(0, 4).toLowerCase() != "re: ") ? "Re: " : ""

		bodyPrefix = "<?php echo $l45; ?>"
		bodyPrefix = bodyPrefix.replace("[date]", openerForm.date.value)
		bodyPrefix = bodyPrefix.replace("[sender]", whoWrote)

		body = "> "+body
		body = body.replace(/\n/g, "\n> ")
	}

	mailForm.subject.value = subjectPrefix+subject
	mailForm.body.value = bodyPrefix+"\r\n\r\n"+body
}
else if (action == "writeTo") {
	recipient = location.search.substr(26)
	mailForm.to.value = recipient.substring(0, recipient.indexOf("&"))
}
// -->
</script>



<?php

quit();
pageFooter();
?>