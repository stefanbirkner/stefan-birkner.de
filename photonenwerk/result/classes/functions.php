<?php
include_once ("/homepages/20/d13395631/htdocs/admin/db_connect.inc");

$textNoDbConnect
 = "Es kann im Moment keine Verbindung zu Datenbank hergestellt werden.";
 
$mySqlLink = db30033022_connect ();


function renderMethod ($method_id, $margin="", $tab="  ")
{
	$newLine = "\n";
	$varIntro = "var $";
	$varOutro = ";";
	$methodIntro = "function ";
	$methodOutro = "";

	$textIfNoCode = "/* There's still no code for this method. */";


	$qMethod
	 = @mysql_query (
	     "SELECT * 
	      FROM classMethod INNER JOIN classClass USING (class_id)
	      WHERE method_id=".$method_id);
	$method = @mysql_fetch_object ($qMethod);


	$code = $margin.$methodIntro.$method->method." (";

	$qAttribute
	 = @mysql_query(
	     "SELECT * FROM classAttribute WHERE method_id=".$method->method_id);
	for($row = 0; $row < @mysql_num_rows($qAttribute); ++$row)
		if($attribute = @mysql_fetch_object($qAttribute))
		{
			if($row != 0)
				$code .= ", ";

			$code .= "$".$attribute->attribute;
			if(!is_null($attribute->default))
				$code .= "=".$attribute->default;
		}
	$code .= ")".$methodOutro.$newLine;

	$code .= $margin."{".$newLine;
	if(is_null($method->code))
		$code .= $margin.$tab.$textIfNoCode.$newLine;
	else
	{
		$singleLines = explode("\n", $method->code);

		for($row = 0; $row < count($singleLines); ++$row)
			$code .= $margin.$tab.$singleLines[$row].$newLine;
	}
	$code .= $margin."}".$newLine;

	return ($code);
}


?>