<?php
require("functions.php");
	
if ($colsOrRows == "cols") {
	$cellStartMenu = "<td colspan='2'>";
	$cellEndMenu = "</td>";
	$cellStart = "<th colspan='2'>";
	$cellEnd = "</th>";
	$newRow = "</tr>\n<tr>\n";
}
else {
	$cellStartMenu = "<th colspan='3'>";
	$cellEndMenu = "</th>";
	$cellStart = "<td>";
	$cellEnd = "</td>";
}

if ($refresh) $metaRefresh = "<meta http-equiv='refresh' content='$refresh; http://$HTTP_HOST$SCRIPT_NAME?refresh=$refresh&amp;".SID."'/>\n";



pageHeader($metaRefresh);
?>



<script type='text/javascript'>
<!--
checkAll = true



function automaticChecking(trueOrFalse) {
	newLocation = "headerlist.php?"

	if (trueOrFalse) {
		if ((refresh = prompt("<?php echo $l79; ?>", 3))) newLocation += "refresh="+(refresh * 60)+"&"
	}

	location = newLocation+"<?php echo SID; ?>"
}



function selectAll() {
	theForm = document.getElementById("deleteForm")

	for (i = 1; i < theForm.elements.length; i++) {
		theForm.elements[i].checked = checkAll
	}

	checkAll = (checkAll) ? false : true
}



function deleteMultiple() {
	theForm = document.getElementById("deleteForm")

	someChecked = false
	for (i = 1; i < theForm.elements.length; i++) {
		if (theForm.elements[i].checked) {
			someChecked = true

			break
		}
	}

	if (someChecked) {
		if (confirm("<?php echo $l101; ?>")) theForm.submit()
	}
	else alert("<?php echo $l100; ?>")
}



function confirmLogOut() {
	if (confirm("<?php echo $l80; ?>")) parent.location = "index.php?logOut=true"
}
// -->
</script>



<?php
echo "<form action='index.php' method='post' target='_parent' id='deleteForm'>\n";
echo "<input type='hidden' name='".session_name()."' value='".session_id()."'/>\n";
echo "<table $tableAttributes>\n";

echo "<tr>\n";
echo "$cellStartMenu\n";
echo "<a href='$SCRIPT_NAME?".SID."'>$l34</a> |\n";
# Note: The second "%s" is inside the variable $l76:
printf("<a href='javascript:automaticChecking(%s)'>$l76</a> |\n", ($refresh) ? "false" : "true", ($refresh) ? $l78 : $l77);
echo "<a href='javascript:openWindow(\"write.php?action=write&amp;".SID."\")'>$l33</a> |\n";
echo "<a href='javascript:selectAll()'>$l102</a> |\n";
echo "<a href='javascript:deleteMultiple()'>$l26</a> |\n";
echo "<a href='javascript:confirmLogOut()'>$l52</a> |\n";
echo "<a href='javascript:openWindow(\"about.php\")'>$l54</a>\n";
echo "$cellEndMenu\n";
echo "</tr>\n";

$numMessages = command("STAT");
$numMessages = explode(" ", $numMessages);
$numMessages = $numMessages[1];

if ($numMessages == 0) {
	echo "<tr>\n";
	echo "$cellStart$l11$cellEnd\n";
	echo "</tr>\n";
}

for ($i = $numMessages; $i >= 1; $i--) {
	command("TOP $i 0") or trigger_error($l12);

	while (($headerArray[] = getLine()) != ".")

	$headers = getHeaders($headerArray);

	$subject = (!empty($headers["subject"])) ? htmlspecialchars(mimeHeaderDecode($headers["subject"])) : $l13;

	$sender = getSender($headers["from"]);
	$sender = $sender["name"];

	echo "<tr>\n";
	echo "$cellStart<input type='checkbox' name='delete[]' value='$i' class='lowCheckBox'/> <a href='message.php?id=$i&amp;".SID."' target='message'>$subject</a>$cellEnd\n";
	echo $newRow;
	echo "<td>".htmlspecialchars(mimeHeaderDecode($sender))."</td>\n";
	echo "<td>".l14(strtotime($headers["date"]))."</td>\n";
	echo "</tr>\n";

	unset($headerArray);
}

echo "</table>\n";
echo "</form>\n";

quit();
pageFooter();
?>