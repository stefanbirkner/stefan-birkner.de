<?php

  $doc_root = $DOCUMENT_ROOT;

  $phphtmllib = $doc_root . "/phphtmllib";
  include_once($phphtmllib . "/includes.php");

  $babw_classes = $doc_root . "/babw_classes";
  include_once($babw_classes . "/includes.php");

  $thehtml=join("", file("demo.html"));
	
  $ctags=new phpHTMLparse();
  $ctagshtml=$ctags->parse($thehtml);
  xmp_var_dump( $ctagshtml );
	
?>
