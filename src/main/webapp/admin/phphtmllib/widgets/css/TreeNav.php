<?php


$css =<<<EOF
TABLE.treenavwrapper {
  background: #000066;
}

TABLE.treenavinnertable {
  background: #CAD5EB;
}

TD.treenavspacer {
  background: #000066;
}

A.treenavnormal:active, A.treenavnormal:link {
  font-family: ariel, helvetica, lucida;
  font-size: 10pt;
  font-weight: bold;
  color: #000000;
  text-decoration: none;
}

A.treenavnormal:hover {
  font-family: ariel, helvetica, lucida;
  font-size: 10pt;
  font-weight: bold;
  color: #FFFFFF;
  text-decoration: underline;
}

A.treenavselected:active, A.treenavselected:link {
  font-family: ariel, helvetica, lucida;
  font-size: 10pt;
  font-weight: bold;
  color: #FFFFFF;
  text-decoration: none;
}

A.treenavselected:hover {
  font-family: ariel, helvetica, lucida;
  font-size: 10pt;
  font-weight: bold;
  color: #FFFFFF;
  text-decoration: underline;
}
EOF;

print $css;
?>
