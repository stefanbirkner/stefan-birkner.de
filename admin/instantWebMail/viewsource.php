<?php
require("functions.php");



command("RETR $id") or trigger_error($l15);

header("Content-Type: text/plain");

while (($line = getLine()) != ".") {
	echo "$line\r\n";
}

quit();
?>