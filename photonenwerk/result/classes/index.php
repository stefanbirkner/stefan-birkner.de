<?php
	if(isset($class_id))
	{
		$frameShow = "diagram.php?class_id=".$class_id;
	}
	else
	{
		$frameShow = "list.php";
	}

	print("<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n");
?>
<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN"
  "DTD/xhtml1-frameset.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
    <title>Klassenbibliothek des Photonenwerkes</title>
  </head>

	<frameset rows="100,*" border="0" frameborder="0" framespacing="0">
		<frame src="title.php" name="frameTop"/>
		<frameset cols="100,*" border="0" frameborder="0" framespacing="0">
			<frame src="../../blank.php" name="frameMenu"/>
			<frame src="<?php print($frameShow); ?>" name="frameShow"/>
		</frameset>
	</frameset>

  <body>
		<p>
			Zum Betrachten dieser Seiten ben&ouml;tigen sie einen Browser der XHTML
			mit Frames beherrscht.
		</p>
  </body>
</html>