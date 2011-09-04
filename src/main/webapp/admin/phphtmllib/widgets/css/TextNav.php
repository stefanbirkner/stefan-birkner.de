<?php


$css =<<<EOF
A.textnavlist:hover {
	color: $fonthover;
}

A.textnavlist {
	font-family : Arial, Helvetica, sans-serif;
	font-size : 8pt;
	font-weight : bold;
	color : $font;
	text-decoration : none;	
}

TD.textnavdivider {
        background-image: url('/phphtmllib/widgets/images/dot_div_vert.gif');
}

TD.textnavtd {
        background: $background;
}


EOF;

print $css;
?>
