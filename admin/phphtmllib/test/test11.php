<?php

  $doc_root = $DOCUMENT_ROOT;

  $phphtmllib = $doc_root . "/phphtmllib";
  include_once($phphtmllib . "/includes.php");

  $babw_classes = $doc_root . "/babw_classes";
  include_once($babw_classes . "/includes.php");

  $page = new HTMLPageClass("Test 11 page", XHTML);
  $page->set_text_debug( $debug );


  function get_dom_attributes( $dom ) {
      //try and get all the attributes for this
      //dom tag.

      if ($dom->attributes) {
          foreach ($dom->attributes as $attr) {
              $name = $attr->name;
              $value = $attr->children[0]->content;
              $attributes[$name] = $value;
          }
          return $attributes;
      } else {
          return NULL;
      }

  }

  function build_tags( $dom ) {

      //xmp_var_dump( $dom );

      //walk through the tree and build
      //HTMLTag objects
      if ($dom->type == XML_ELEMENT_NODE) {
          $tagstr= strtoupper($dom->name) . "tag";
          $attributes = get_dom_attributes( $dom );
          $tag = new $tagstr($attributes);
          if ($dom->children) {
              foreach( $dom->children as $child) {
                  $tag->push( build_tags( $child ) );
              }
          }
      } elseif ($dom->type == XML_TEXT_NODE) {
          if (ord($dom->content) != 10) {
              return $dom->content;
          } else {
              return NULL;
          }
          
      }

      return $tag;
  }
  

  $thehtml=join("", file("rick.html"));

  $tree = xmltree( $thehtml );

  $obj = build_tags( $tree->root );
  //$page->push( $obj );
  print $obj->render( 0, TRUE );




    //print $page->render();
?>
