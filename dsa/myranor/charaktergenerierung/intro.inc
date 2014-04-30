<?php
  include("/homepages/20/d13395631/htdocs"."/admin/db_connect.inc");
  db30033022_connect();

  if(!isset($gp))
     $gp = 110;

  if(!isset($mu))
  {
     $mu = 8;
     $gp -= 8;
  }

  if(!isset($kl))
  {
     $kl = 8;
     $gp -= 8;
  }

  if(!isset($in))
  {
     $in = 8;
     $gp -= 8;
  }

  if(!isset($ch))
  {
     $ch = 8;
     $gp -= 8;
  }

  if(!isset($ff))
  {
     $ff = 8;
     $gp -= 8;
  }

  if(!isset($ge))
  {
     $ge = 8;
     $gp -= 8;
  }

  if(!isset($ko))
  {
     $ko = 8;
     $gp -= 8;
  }

  if(!isset($kk))
  {
     $kk = 8;
     $gp -= 8;
  }

  $eigenschaften = array(
                      array("Mut",              "mu", $mu),
                      array("Klugheit",         "kl", $kl),
                      array("Intuition",        "in", $in),
                      array("Charisma",         "ch", $ch),
                      array("Fingerfertigkeit", "ff", $ff),
                      array("Gewandheit",       "ge", $ge),
                      array("Konstitution",     "ko", $ko),
                      array("Körperkraft",      "kk", $kk)
                   );

  //Query fpr Links zu den anderen Teilen der Charaktererschaffung
  $queryString = "gp=".$gp; 
  for($i = 0; $i < count($eigenschaften); ++$i)
     $queryString .= "&".$eigenschaften[$i][1]."=".$eigenschaften[$i][2];
  if(isset($rasse))
     $queryString .= "&rasse=".$rasse;
?>

