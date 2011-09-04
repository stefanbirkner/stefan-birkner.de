<?php


$css = <<<EOF

.navtablehead  {
  background: #003196;
}
 
.navtablesubhead {
  background: #ffffff;
}
 
.navtablesubtitle {
  font-family: ariel, helvetica, sans serif;
  font-size: 8pt;
  color: $subtitlefont;
  background: $subtitle;
  font-weight: bold;
  text-align: center;  
}
.navtabletitlehead {
  font-family: sans serif, helvetica, arial;
  font-size: 10pt;
  background: $title;
  color: $titlefont;
  font-weight: bold;
  text-align: center;
 
}
 
.navtablebarleft  {
  background-image: url('/phphtmllib/widgets/images/top-left-corner.gif');
  background-repeat: no-repeat;
  background-color: $title;
}
.navtablebarright {
  background-image: url('/phphtmllib/widgets/images/top-right-corner.gif');
  background-repeat: no-repeat;
  background-color: $title;
}
.navtablediv {
  line-height: 11px;
  font-family: Arial, helvetica, sans serif;
  font-size: 10pt;
}
.navtableheight {
  font-size:4pt;
  line-height:3px;
}
EOF;

print $css;

?>
