<?php
include_once("/homepages/20/d13395631/htdocs/admin/db_connect.inc"); 
include_once("/homepages/20/d13395631/htdocs/admin/phphtmllib/includes.php");

 
$mySqlLink = db30033022_connect();

$page = new HTMLPageClass("Liste der Klassen");
$page->push_css_link("../../photonenwerk.css");
$page->push_css_link("../../uml.css");

$page->push(new H4tag(NULL, "Wählen Sie eine Klasse, die angezeigt werden soll:"));

$qProgrammingLanguage = @mysql_query("SELECT * FROM classProgammingLanguage ORDER BY programmingLanguage ASC");
if($qProgrammingLanguage)
	for($row = 0; $row < mysql_num_rows($qProgrammingLanguage); ++$row)
		if($programmingLanguage = @mysql_fetch_object($qProgrammingLanguage))
		{
			$page->push(new H5tag(NULL, "Klassen für ".$programmingLanguage->programmingLanguage));

			$qClass
			 = @mysql_query(
			     "SELECT * FROM classClass
			      WHERE programmingLanguage_id=".$programmingLanguage->programmingLanguage_id
			   ." ORDER BY classname ASC");
			if($qClass)
				for($rowClass = 0; $rowClass < mysql_num_rows($qClass); ++$rowClass)
					if($class = @mysql_fetch_object($qClass))
					{
						$page->push(new H6tag(NULL,
						                      new Atag(
						                            array("href" => "index.php?class_id=".$class->class_id,
						                                  "target" => "_parent"),
						                            $class->classname)));
					}
		}


print($page->render());
?>