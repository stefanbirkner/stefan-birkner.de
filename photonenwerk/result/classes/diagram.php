<?php
include_once ("/homepages/20/d13395631/htdocs/admin/db_connect.inc"); 
include_once ("/homepages/20/d13395631/htdocs/admin/phphtmllib/includes.php");
include_once ("functions.php");

$textNoDbConnect
 = "Es kann im Moment keine Verbindung zu Datenbank hergestellt werden.";
$tab = "  ";
 
$mySqlLink = db30033022_connect();

$qClass = @mysql_query("SELECT * FROM classClass WHERE class_id=".$class_id);
$class = @mysql_fetch_object($qClass);

$qMember = @mysql_query("SELECT * FROM classMember WHERE class_id=".$class_id);
if(@mysql_num_rows($qMember) > 0)
{
	$members = new Ptag();
	$members->set_tag_attribute("class", "members");

	for($row = 0; $row < @mysql_num_rows($qMember); ++$row)
		if($member = @mysql_fetch_object($qMember))
		{
			$memberText = $member->member;
			if(!is_null($member->type))
				$memberText .= ":".$member->type;

			$members->push($memberText);
			$members->push(new BRtag());
		}
}

$qMethod = @mysql_query("SELECT * FROM classMethod WHERE class_id=".$class_id);
if(@mysql_num_rows($qMethod) > 0)
{
	$methods = new Ptag();
	$methods->set_tag_attribute("class", "methods");

	for($row = 0; $row < @mysql_num_rows($qMethod); ++$row)
		if($method = @mysql_fetch_object($qMethod))
		{
			$methodText = $method->method." (";

			$qAttribute
			 = @mysql_query(
			     "SELECT * FROM classAttribute WHERE method_id=".$method->method_id);
			for($row2 = 0; $row2 < @mysql_num_rows($qAttribute); ++$row2)
				if($attribute = @mysql_fetch_object($qAttribute))
				{
					if($row2 != 0)
						$methodText .= ", ";

					$methodText .= $attribute->attribute;
					if(!is_null($attribute->type))
						$methodText .= ":".$attribute->type;
				}

			$methodText .= ")";
			$methodText = new NOBRtag(NULL, $methodText);
			$methods->push(new Atag(
			                     array("href" => $PHP_SELF."?class_id=".$class_id."&method_id=".$method->method_id),
			                     $methodText));
			$methods->push(new BRtag());
		}
}


$page = new HTMLPageClass("Klasse ".$class->classname);
$page->push_css_link("../../photonenwerk.css");
$page->push_css_link("../../uml.css");
$page->push_css_link("links.css");

$page->push(new H3tag(
                  array("class" => "classname"),
                  new Atag(
			                  array("href" => $PHP_SELF."?class_id=".$class_id),
                        $class->classname)));
if(isset($members))
	$page->push($members);
if(isset($methods))
	$page->push($methods);
if(isset($method_id))
	$page->push(new PREtag(NULL, renderMethod($method_id, "", $tab)));
else
{
	$page->push(new Ptag(NULL, $class->description_en));
	$page->push(new Ptag(
	                  NULL,
	                  new Atag(
	                        array("href" => "code.php?class_id=".$class_id),
	                        "Der komplette Code der Klasse.")));
}



print($page->render());
?>