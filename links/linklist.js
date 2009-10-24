     var tip=new Array
           tip[0]='x'
           tip[1]='x'
           tip[2]='x'
           tip[3]='x'
           
     function showtip(current,e,num)
        {
         if (document.layers) // Netscape 4.0+
            {
             theString="<DIV CLASS='tooltip'>"+tip[num]+"</DIV>"
             document.tooltip.document.write(theString)
             document.tooltip.document.close()
             document.tooltip.right=e.pageX+14
             document.tooltip.top=e.pageY+2
             document.tooltip.visibility="show"
            }
         else
           {
            if(document.getElementById) // Netscape 6.0+ and Internet Explorer 5.0+
              {
               elm=document.getElementById("tooltip")
               elml=current
               elm.innerHTML=tip[num]
               elm.style.height=elml.style.height
               elm.style.top=parseInt(elml.offsetTop+elml.offsetHeight)
               elm.style.left=parseInt(elml.offsetRight+elml.offsetWidth+10)
               elm.style.visibility = "visible"
              }
           }
        }

function hidetip()
{
	if (document.layers) // Netscape 4.0+
	{
		document.tooltip.visibility="hidden"
	}
	else
	{
		if(document.getElementById) // Netscape 6.0+ and Internet Explorer 5.0+
		{
			elm.style.visibility="hidden"
		}
	} 
}