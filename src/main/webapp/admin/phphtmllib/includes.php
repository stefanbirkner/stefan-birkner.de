<?php

//the script that includes this file MUST
//set the $phphtmllib var.  Its used to determine
//the base path on the filesystem where the php html libs
//live.

$phphtmllib = "/home/stefanbirk/www/admin/phphtmllib";

//get the parent tag class
include_once("$phphtmllib/HTMLTagClass.php");

//now get all of the supported tag.
include_once("$phphtmllib/tag_classes/localinc.php");

//lets get all of the tag utility functions.
include_once("$phphtmllib/tag_utils/localinc.php");

//lets get all of the widget classes
//that are based on the tag classes and 
//tag util functions
include_once("$phphtmllib/widgets/localinc.php");

//Get the version #string and the version functions
include_once("$phphtmllib/version.php");
?>
