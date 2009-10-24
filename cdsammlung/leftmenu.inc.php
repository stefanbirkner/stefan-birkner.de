<?PHP

function artist_menu($subcat, $data) {
  global $config;
  global $strLMAdmAdm, $strLMAdmEdit, $strLMAdmEditArtist;
  global $strLMAdmDelete, $strLMAdmDeleteArtist;
  
  $fg_n_color=$config["menu_norm_fg"];
  $bg_n_color=$config["menu_norm_bg"];
  $fg_a_color=$config["menu_act_fg"];
  $bg_a_color=$config["menu_act_bg"];
  
  { ?> 
   <TR>
      <TD BGCOLOR="<?PHP } echo $bg_n_color; { ?>" VALIGN="TOP">
      <TABLE ALIGN=CENTER BORDER=0 CELLSPACING=0 WIDTH="100%">
       <TR>
       <TH BGCOLOR="<?PHP } echo $bg_n_color; { ?>" ALIGN="LEFT">
        <FONT COLOR="<?PHP } echo $config["left_menu_topic_color"]."\">\n";
         echo $strLMAdmAdm;
        { ?>
        </FONT>
       </TH>
      </TR>
      <TR>
      <TH BGCOLOR="<?PHP } echo $bg_n_color; { ?>" ALIGN="LEFT">
       <FONT COLOR="<?PHP } echo $fg_n_color."\">\n";
        echo "&nbsp;&nbsp;".$strLMAdmEdit;
        { ?>
        </FONT>
       </TH>
      </TR>
      <TR>
      <TD <?PHP } echo "BGCOLOR=\"".$bg_n_color."\" "; { ?> ALIGN="LEFT">
      <?PHP }
      echo "&nbsp;&nbsp;&nbsp;<A HREF=\"admin/edit_artist.php?artist=$data\"><FONT COLOR=\"".$fg_n_color."\">";
      echo $strLMAdmEditArtist; { ?></FONT></A>
      </TD>
      </TR>
      <TR>
      <TH BGCOLOR="<?PHP } echo $bg_n_color; { ?>" ALIGN="LEFT">
      <FONT COLOR="<?PHP } echo $fg_n_color."\">";
        echo "&nbsp;&nbsp;".$strLMAdmDelete; { ?>
        </FONT>
       </TH>
      </TR>
      <TR>
      <TD <?PHP } echo "BGCOLOR=\"".$bg_n_color."\" "; { ?> ALIGN="LEFT">
      <?PHP }
      echo "&nbsp;&nbsp;&nbsp;<A HREF=\"admin/delete_artist.php?artist=$data\"><FONT COLOR=\"".$fg_n_color."\">";
      echo $strLMAdmDeleteArtist; { ?></FONT></A>
       </TD>
      </TR>
    </TABLE>
    </TD>
   <?PHP }

}

function genre_menu($subcat, $data) {
  global $config;
  global $strLMAdmAdm, $strLMAdmEdit, $strLMAdmEditGenre;
  global $strLMAdmDelete, $strLMAdmDeleteGenre;
  
  $fg_n_color=$config["menu_norm_fg"];
  $bg_n_color=$config["menu_norm_bg"];
  $fg_a_color=$config["menu_act_fg"];
  $bg_a_color=$config["menu_act_bg"];
  
  { ?> 
   <TR>
      <TD BGCOLOR="<?PHP } echo $bg_n_color; { ?>" VALIGN="TOP">
      <TABLE ALIGN=CENTER BORDER=0 CELLSPACING=0 WIDTH="100%">
       <TR>
       <TH BGCOLOR="<?PHP } echo $bg_n_color; { ?>" ALIGN="LEFT">
        <FONT COLOR="<?PHP } echo $config["left_menu_topic_color"]."\">\n";
         echo $strLMAdmAdm;
        { ?>
        </FONT>
       </TH>
      </TR>
      <TR>
      <TH BGCOLOR="<?PHP } echo $bg_n_color; { ?>" ALIGN="LEFT">
       <FONT COLOR="<?PHP } echo $fg_n_color."\">\n";
        echo "&nbsp;&nbsp;".$strLMAdmEdit;
        { ?>
        </FONT>
       </TH>
      </TR>
      <TR>
      <TD <?PHP } echo "BGCOLOR=\"".$bg_n_color."\" "; { ?> ALIGN="LEFT">
      <?PHP }
      echo "&nbsp;&nbsp;&nbsp;<A HREF=\"admin/edit_genre.php?genre=$data\"><FONT COLOR=\"".$fg_n_color."\">";
      echo $strLMAdmEditGenre; { ?></FONT></A>
      </TD>
      </TR>
      <TR>
      <TH BGCOLOR="<?PHP } echo $bg_n_color; { ?>" ALIGN="LEFT">
      <FONT COLOR="<?PHP } echo $fg_n_color."\">";
        echo "&nbsp;&nbsp;".$strLMAdmDelete; { ?>
        </FONT>
       </TH>
      </TR>
      <TR>
      <TD <?PHP } echo "BGCOLOR=\"".$bg_n_color."\" "; { ?> ALIGN="LEFT">
      <?PHP }
      echo "&nbsp;&nbsp;&nbsp;<A HREF=\"admin/delete_genre.php?genre=$data\"><FONT COLOR=\"".$fg_n_color."\">";
      echo $strLMAdmDeleteGenre; { ?></FONT></A>
       </TD>
      </TR>
    </TABLE>
    </TD>
   <?PHP }

}

function admin_menu($subcat) {
  global $config;
  global $strLMAdmAdm, $strLMAdmEdit, $strLMAdmEditCD, $strLMAdmEditArtist, $strLMAdmEditGenre;
  global $strLMAdmInsert, $strLMAdmInsertCDDrive, $strLMAdmInsertCDFile, $strLMAdmInsertArtist, $strLMAdmInsertGenre;
  global $strLMAdmDelete, $strLMAdmDeleteCD, $strLMAdmDeleteArtist, $strLMAdmDeleteGenre;
  
  $fg_n_color=$config["menu_norm_fg"];
  $bg_n_color=$config["menu_norm_bg"];
  $fg_a_color=$config["menu_act_fg"];
  $bg_a_color=$config["menu_act_bg"];
  
  { ?> 
   <TR>
      <TD BGCOLOR="<?PHP } echo $bg_n_color; { ?>" VALIGN="TOP">
      <TABLE ALIGN=CENTER BORDER=0 CELLSPACING=0 WIDTH="100%">
       <TR>
       <TH BGCOLOR="<?PHP } echo $bg_n_color; { ?>" ALIGN="LEFT">
        <FONT COLOR="<?PHP } echo $config["left_menu_topic_color"]."\">\n";
         echo $strLMAdmAdm;
        { ?>
        </FONT>
       </TH>
      </TR>
      <TR>
      <TH BGCOLOR="<?PHP } echo $bg_n_color; { ?>" ALIGN="LEFT">
       <FONT COLOR="<?PHP } echo $fg_n_color."\">\n";
        echo "&nbsp;&nbsp;".$strLMAdmEdit;
        { ?>
        </FONT>
       </TH>
      </TR>
      <TR>
      <TD 
      <?PHP }
	if ($subcat == "EDIT_CD") {
	  echo "BGCOLOR=\"".$bg_a_color."\" "; 
        } else {
	  echo "BGCOLOR=\"".$bg_n_color."\" ";
        }
      { ?> ALIGN="LEFT">
      <?PHP }
	if ($subcat == "EDIT_CD") {
	  echo "<FONT COLOR=\"".$fg_a_color."\">\n"; 
        } else {
	  echo "<FONT COLOR=\"".$fg_n_color."\">\n";
        }
        echo "&nbsp;&nbsp;&nbsp;".$strLMAdmEditCD;
        { ?>
        </FONT>
       </TD>
      </TR>
      <TR>
      <TD 
      <?PHP }
	if ($subcat == "EDIT_ARTIST") {
	  echo "BGCOLOR=\"".$bg_a_color."\" "; 
        } else {
	  echo "BGCOLOR=\"".$bg_n_color."\" ";
        }
      { ?> ALIGN="LEFT">
      <?PHP }
	if ($subcat == "EDIT_ARTIST") {
	  echo "<FONT COLOR=\"".$fg_a_color."\">\n"; 
        } else {
	  echo "<FONT COLOR=\"".$fg_n_color."\">\n";
        }
        echo "&nbsp;&nbsp;&nbsp;".$strLMAdmEditArtist;
        { ?>
        </FONT>
       </TD>
      </TR>
      <TR>
      <TD 
      <?PHP }
	if ($subcat == "EDIT_GENRE") {
	  echo "BGCOLOR=\"".$bg_a_color."\" "; 
        } else {
	  echo "BGCOLOR=\"".$bg_n_color."\" ";
        }
      { ?> ALIGN="LEFT">
      <?PHP }
	if ($subcat == "EDIT_GENRE") {
	  echo "<FONT COLOR=\"".$fg_a_color."\">\n"; 
        } else {
	  echo "<FONT COLOR=\"".$fg_n_color."\">\n";
        }
        echo "&nbsp;&nbsp;&nbsp;".$strLMAdmEditGenre;
        { ?>
        </FONT>
       </TD>
      </TR>
      
      <TR>
      <TH BGCOLOR="<?PHP } echo $bg_n_color; { ?>" ALIGN="LEFT">
       <FONT COLOR="<?PHP } echo $fg_n_color."\">\n";
        echo "&nbsp;&nbsp;".$strLMAdmInsert;
        { ?>
        </FONT>
       </TH>
      </TR>
      <TR>
      <TD 
      <?PHP }
	if ($subcat == "INSERT_CD_FROM_DRIVE") {
	  echo "BGCOLOR=\"".$bg_a_color."\" "; 
        } else {
	  echo "BGCOLOR=\"".$bg_n_color."\" ";
        }
      { ?> ALIGN="LEFT">
      <?PHP }
	if ($subcat == "INSERT_CD_FROM_DRIVE") {
	  echo "&nbsp;&nbsp;&nbsp;<A HREF=\"index.php?func=cdfromdrive\"><FONT COLOR=\"".$fg_a_color."\">"; 
        } else {
	  echo "&nbsp;&nbsp;&nbsp;<A HREF=\"index.php?func=cdfromdrive\"><FONT COLOR=\"".$fg_n_color."\">";
        }
        echo "$strLMAdmInsertCDDrive";{ ?></FONT></A>
       </TD>
      </TR>
      <TR>
      <TD 
      <?PHP }
	if ($subcat == "INSERT_ARTIST") {
	  echo "BGCOLOR=\"".$bg_a_color."\" "; 
        } else {
	  echo "BGCOLOR=\"".$bg_n_color."\" ";
        }
      { ?> ALIGN="LEFT">
      <?PHP }
	if ($subcat == "INSERT_ARTIST") {
	  echo "&nbsp;&nbsp;&nbsp;<A HREF=\"insert_artist.php\"><FONT COLOR=\"".$fg_a_color."\">"; 
        } else {
	  echo "&nbsp;&nbsp;&nbsp;<A HREF=\"insert_artist.php\"><FONT COLOR=\"".$fg_n_color."\">";
        }
        echo "$strLMAdmInsertArtist";{ ?></FONT></A>
       </TD>
      </TR>
      <TR>
      <TD 
      <?PHP }
	if ($subcat == "INSERT_GENRE") {
	  echo "BGCOLOR=\"".$bg_a_color."\" "; 
        } else {
	  echo "BGCOLOR=\"".$bg_n_color."\" ";
        }
      { ?> ALIGN="LEFT">
      <?PHP }
	if ($subcat == "INSERT_GENRE") {
	  echo "&nbsp;&nbsp;&nbsp;<A HREF=\"insert_genre.php\"><FONT COLOR=\"".$fg_a_color."\">"; 
        } else {
	  echo "&nbsp;&nbsp;&nbsp;<A HREF=\"insert_genre.php\"><FONT COLOR=\"".$fg_n_color."\">";
        }
        echo "$strLMAdmInsertGenre";{ ?></FONT></A>
       </TD>
      </TR>

      <TR>
      <TH BGCOLOR="<?PHP } echo $bg_n_color; { ?>" ALIGN="LEFT">
       <FONT COLOR="<?PHP } echo $fg_n_color."\">\n";
        echo "&nbsp;&nbsp;".$strLMAdmDelete;
        { ?>
        </FONT>
       </TH>
      </TR>
      <TR>
      <TD 
      <?PHP }
	if ($subcat == "DELETE_CD") {
	  echo "BGCOLOR=\"".$bg_a_color."\" "; 
        } else {
	  echo "BGCOLOR=\"".$bg_n_color."\" ";
        }
      { ?> ALIGN="LEFT">
      <?PHP }
	if ($subcat == "DELETE_CD") {
	  echo "<FONT COLOR=\"".$fg_a_color."\">\n"; 
        } else {
	  echo "<FONT COLOR=\"".$fg_n_color."\">\n";
        }
        echo "&nbsp;&nbsp;&nbsp;".$strLMAdmDeleteCD;
        { ?>
        </FONT>
       </TD>
      </TR>
      <TR>
      <TD 
      <?PHP }
	if ($subcat == "DELETE_ARTIST") {
	  echo "BGCOLOR=\"".$bg_a_color."\" "; 
        } else {
	  echo "BGCOLOR=\"".$bg_n_color."\" ";
        }
      { ?> ALIGN="LEFT">
      <?PHP }
	if ($subcat == "DELETE_ARTIST") {
	  echo "<FONT COLOR=\"".$fg_a_color."\">\n"; 
        } else {
	  echo "<FONT COLOR=\"".$fg_n_color."\">\n";
        }
        echo "&nbsp;&nbsp;&nbsp;".$strLMAdmDeleteArtist;
        { ?>
        </FONT>
       </TD>
      </TR>
      <TR>
      <TD 
      <?PHP }
	if ($subcat == "DELETE_GENRE") {
	  echo "BGCOLOR=\"".$bg_a_color."\" "; 
        } else {
	  echo "BGCOLOR=\"".$bg_n_color."\" ";
        }
      { ?> ALIGN="LEFT">
      <?PHP }
	if ($subcat == "DELETE_GENRE") {
	  echo "<FONT COLOR=\"".$fg_a_color."\">\n"; 
        } else {
	  echo "<FONT COLOR=\"".$fg_n_color."\">\n";
        }
        echo "&nbsp;&nbsp;&nbsp;".$strLMAdmDeleteGenre;
        { ?>
        </FONT>
       </TD>
      </TR>

    </TABLE>
    </TD>
   <?PHP }

}

function empty_menu() {
  { ?>
   <TR>
   <TD BGCOLOR="#000084" VALIGN="TOP">
   <TABLE ALIGN=CENTER BORDER=0 CELLSPACING=0 WIDTH="100%">
    <TR>
     <TD BGCOLOR="#000084">&nbsp</TD>
    </TR>
   </TABLE>
   </TD>
   <?PHP }
}

function print_left_menu($active, $subcat, $data) {
  global $config;
  
  switch ($active) {
  case "ARTIST": artist_menu($subcat, $data);
    break;
  case "GENRE": genre_menu($subcat, $data);
    break;
  case "ADMIN": admin_menu($subcat);
    break;
  default: empty_menu();
    break;
  }
  /*
   * inner table comes here (data)
   */
  echo "<TD COLSPAN=".($config["top_menu_items"]-1)." VALIGN=\"TOP\">\n";
  
}

?>
