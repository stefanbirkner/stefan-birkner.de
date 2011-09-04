<?php


  class phpHTMLparse {

    function phpHTMLparse() {
    }


    function handle_tag( $data ) {
        xmp_var_dump( $data );
    }

    function handle_content( $data ) {
        xmp_var_dump( "CONTENT = $data" );
    }



	function parse($s) {
		/* Add one opening < to the end just to force parse to force the output, 
           otherwise it would have to do work when main loop ends. */
        $s.="<";
        $len=strlen($s);
        $lastmark=0;
        $curs="";
        $gotopen=FALSE;
        for ($i=0; $i<$len; $i++) {
            switch ($s[$i]) {
                case "<":
                    /* If we are already in a < (unclosed) then this < is just an extra one */
                    if ($gotopen) {
                        $curs.=$s[$i];
                        continue;
                    }
                    $gotopen=TRUE;
                    if ($curs=="") continue;

                    /* Check if we should be calling a local method or a global function */
                    $this->handle_content( $curs );
                    $curs="";
                    break;

                case ">":
                    /* If we are not in an opening tag, then this is just a wondering > */
                    if (!$gotopen) {
                        $curs.=$s[$i];
                        continue;
                    }
                    $data=$this->_parse_tag($curs);
                    $uppervariables=array();
                    /* Setup an arrray of all the variables in upper case (references) */
                    foreach ($data["ATTRIBUTES"] as $k=>$v) {
                        $uppervariables[strtoupper($k)]=&$data["ATTRIBUTES"][$k];
                    }
                    $data["RAWTAG"]="<$curs>";
						
					/* Check if we should be calling a local method or a global function */
                    $this->handle_tag( $data );
                    $curs="";
                    $gotopen=FALSE;
					break;
					
				default:
                    $curs.=$s[$i];
                    break;
			}
        }
    }

	/* Converts all the variables in $tag["VARIABLS"] back to var1="blah1" var2="blah2" */
	function variable_string($variables) {
        $args="";
        foreach ($variables as $k=>$v) {
            /* Make sure we quote the variables with the original quoter, if any.  Just incase they used 
             ' instead of " or maybe they didnt use any! */
            $quotewith=$v["QUOTEWITH"];
            $val=$v["VALUE"];
            if ($v["NOVALUE"]) $args.="$k ";
            else $args.="$k=${quotewith}$val${quotewith} ";
        }
		/* Byebye extra space, return */
		return substr($args, 0, -1);
    }

	function _parse_tag($tagline) {
        $spacing=array(" ", "\t", "\r", "\n");
        $quoters=array("'", '"');
        /* Add an extra white space to the end of the tagline, just to make sure the loop reaches all
           points of the pass data */
        $tagline.=" ";
        $dat=array();
        $dat["ATTRIBUTES"]=array();
        $i=strpos($tagline, " ");
        if ($i===FALSE) {
            /* If we did not find a space, then this is just a tag like <br>, store it and return below. */
            $dat["TAG"]=$tagline;
        } else {
            $dat["TAG"]=substr($tagline, 0, $i);
        }

        /* Store upper case version of the tag, easier for user handlers */
        $dat["UPPERTAG"]=strtoupper($dat["TAG"]);
        if ($i===FALSE) return $dat; /* Return if we did not find a " " in the original string */
        $len=strlen($tagline);
        $varname="";
        $value="";
        $state="VAR";
        $closeon=NULL;
        for ($i++; $i<$len; $i++) {
            $c=$tagline[$i];
            if ($state=="VAR") {
                /* If we reached white space while in var mode, that means its just a single name. 
                  (<a href="moo" FOOO>) */
                if (in_array($c, $spacing)) {
                    $state="VAR";
                    $dat["ATTRIBUTES"][$varname]=array(VALUE=>NULL, NOVALUE=>TRUE, QUOTEWITH=>NULL);
                    $value="";
                    $varname="";
                    if ($c==$closeon) $i++;
                } else if ($c=="=") {
                    /* We got a name=value pair */
                    $state="VAL";
                    $temp=$i;
                    $temp++;
                    /* Skip over any extra white space <a foo=  "bar"> */
                    while ($len>$temp && in_array($tagline[$temp], $spacing)) {
                        $temp++;
                    }
                    /* If we skipped over space, then set $i to where we skipped to */
                    if ($temp!=($i+1)) $i=$temp;
                    $closeon=NULL;
                    /* Do we have a quoter (', ")? If so, store it so we know what to close on.  */
                    if (in_array($tagline[$i+1], $quoters)) { 
                        $closeon=$tagline[$i+1];
                        $i++;
                    }
			    } else {
                    $varname.=$c;
                }
            } else if ($state=="VAL") {
                /* If we got $close on (", ') or closein is NULL and this is white space */
                if ($c==$closeon || ($closeon==NULL && (in_array($c, $spacing)))) {
                    $state="VAR";
                    $dat["ATTRIBUTES"][$varname]=array(VALUE=>$value, NOVALUE=>FALSE, QUOTEWITH=>$closeon);
                    $value="";
                    $varname="";
                    if ($c==$closeon) $i++;
                } else {
                    $value.=$c;
                }
			}
		}
        return $dat;
	}
}
?>
