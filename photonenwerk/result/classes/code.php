<?php
include_once("/homepages/20/d13395631/htdocs/admin/db_connect.inc");
include_once ("functions.php");

$tab = "\t";
$newLine = "\n";
$varIntro = "var $";
$varOutro = ";";
$methodIntro = "function ";
$methodOutro = "";

$mySqlLink = db30033022_connect();

$qClass = @mysql_query("SELECT * FROM classClass WHERE class_id=".$class_id);
$qMember = @mysql_query("SELECT * FROM classMember WHERE class_id=".$class_id);
$qMethod = @mysql_query("SELECT * FROM classMethod WHERE class_id=".$class_id);

$class = @mysql_fetch_object($qClass);

if($class->programmingLanguage_id == 2)  //PHP
	$code = "<?php".$newLine.$newLine;
else
	$code = "";

$code .= "class ".$class->classname.$newLine;
$code .= "{".$newLine;

if(@mysql_num_rows($qMember) > 0)
	for($row = 0; $row < @mysql_num_rows($qMember); ++$row)
		if($member = @mysql_fetch_object($qMember))
		{
			$code .= $tab.$varIntro.$member->member.$varOutro.$newLine;
		}

for($row = 0; $row < @mysql_num_rows($qMethod); ++$row)
	if($method = @mysql_fetch_object($qMethod))
	{
		$code .= $newLine.$newLine;
		$code .= renderMethod($method->method_id, $tab, $tab);
	}

$code .= "}".$newLine;
if($class->programmingLanguage_id == 2)  //PHP
	$code .= $newLine."?>".$newLine;


header ("Content-type: text/plain");
print($code);
?>