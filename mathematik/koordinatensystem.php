<?php
	$print = false;
	//Variablen gegebenenfalls mit Übergabe- oder Default-Wert initialisieren
	if(isset($_GET['xy_ratio']) && (strcmp("", trim($_GET['xy_ratio'])) != 0))  {
		$xy_ratio = $_GET['xy_ratio'];
		$print = true;
	} else {
		$xy_ratio = '1:1';
	}

	//computations
	if($print == true) {
		$ratio = strtok($xy_ratio, ':') / strtok(':');

		$num_units_height = $_GET['y_max'] - $_GET['y_min'];
		$height = $_GET['height'];
		$height_unit = $height / $num_units_height;

		$num_units_width = $_GET['x_max'] - $_GET['x_min'];
		$width_unit = $height_unit * $ratio;
		$width = $width_unit * $num_units_width;

		$origin_x = max(0, (-1) * $_GET['x_min'] * $width_unit);
		$origin_y = max(0, $_GET['y_max'] * $height_unit);
	}

  function printGet ($param) {
    if (isset($_GET[$param])) {
      echo $_GET[$param];
    }
  }

   print("<?xml version=\"1.0\" encoding=\"utf-8\"?>\n"); 
?><!DOCTYPE html 
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
  "DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"> 
	<head>
		<title>Koordinatensystem</title> 
		<meta name="author" content="Stefan Birkner"/>
		<link rel="stylesheet" type="text/css" href="../sb.css"/> 
		<link rel="stylesheet" type="text/css" href="mathematics.css"/> 
	</head> 
 
	<body> 
		<h2>Koordinatensystem erstellen</h2> 

		<p>Hier k&ouml;nnen sie sich ein Koordinatensystem als SVG-Grafik
		erzeugen lassen. Die generierte Datei ist &uuml;bersichtlich gestaltet,
		sodass sie sich problemlos weiterverarbeiten l&auml;sst.</p>
 
		<form action="<?php print($_SERVER['PHP_SELF']); ?>">
			Geben sie die folgenden Kenngr&ouml;&szlig;en des von ihnen
			gew&uuml;nschten Koordinatensystems an:

			<table>
				<tr>
					<th>Kleinster Wert auf der x-Achse:</th>
					<td><input name="x_min" value="<?php printGet('x_min'); ?>" size="5"/></td>
				</tr>
				<tr>
					<th>Gr&ouml&szlig;ter Wert auf der x-Achse:</th>
					<td><input name="x_max" value="<?php printGet('x_max'); ?>" size="5"/></td>
				</tr>
				<tr>
					<th>Kleinster Wert auf der y-Achse:</th>
					<td><input name="y_min" value="<?php printGet('y_min'); ?>" size="5"/></td>
				</tr>
				<tr>
					<th>Gr&ouml&szlig;ter Wert auf der y-Achse:</th>
					<td><input name="y_max" value="<?php printGet('y_max'); ?>" size="5"/></td>
				</tr>
				<tr>
					<th>Verh&auml;ltnis x:y</th>
					<td><input name="xy_ratio" value="<?php echo $xy_ratio; ?>" size="5"/></td>
				</tr>
				<tr>
					<th>H&ouml;he des Koordinatensystems:</th>
					<td><input name="height" value="<?php printGet('height'); ?>" size="5"/>
						(Attribut height des svg-Elements)</td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" value="Koordinatensystem erstellen"/> </td>
				</tr>
			</table>
		</form>

		<?php if($print == true) { ?><pre>
&lt;?xml version="1.0" encoding="UTF-8" standalone="no"?&gt;
&lt;svg xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg"
<?php print(htmlentities("    width=\"$width\" height=\"$height\">")."\n");
			$indent = "\t";
			print($indent.htmlentities("<g id=\"coordinate_system\"")."\n");
			print($indent.htmlentities("   style=\"stroke:rgb(0,0,0);stroke-width:5;\"")."\n");
			print($indent.htmlentities("   transform=\"translate($origin_x,$origin_y)\">")."\n");
			$indent .= "\t";
			//x-axis
			print($indent.htmlentities("<line x1=\""));
			print(htmlentities($_GET['x_min'] * $width_unit));
			print(htmlentities("\" y1=\"0\" x2=\""));
			print(htmlentities($_GET['x_max'] * $width_unit));
			print(htmlentities("\" y2=\"0\"/>")."\n");
			//y-axis
			print($indent.htmlentities("<line x1=\"0\" y1=\""));
			print(htmlentities((-1) * $_GET['y_max'] * $height_unit));
			print(htmlentities("\" x2=\"0\" y2=\""));
			print(htmlentities((-1) * $_GET['y_min'] * $height_unit));
			print(htmlentities("\"/>"));?>	
	&lt;/g&gt;
&lt;/svg&gt;
		</pre><?php } ?>

		<p><a href=".">zur Hauptseite Mathematik</a></p> 
	</body> 
</html>
