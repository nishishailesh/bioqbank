<?php


echo '<html><head>

<link rel="stylesheet" type="text/css" href="my_styles.css">
<script type="text/javascript" >
		function showhide(one) {

			x=document.getElementById(one);
			
			if(x.style.display == "block")
			{
				x.style.display = "none";
			}
			else
			{
				x.style.display = "block";
			}
				
			
			
			
			xx=document.getElementsByClassName(\'menu\');			
			for(var i = 0; i < xx.length; i++)
			{
				if(xx[i]!=document.getElementById(one))
				{
					xx[i].style.display = "none";		
				}
				
				elseif(xx[i]==document.getElementById(one))
				{
					if(xx[i].style.display == "block")
					{
						xx[i].style.display = "none";
					}
					else
					{
						xx[i].style.display = "block";
					}		
				}
			}
			
			
		}
		
		function hide() {
		
			xx=document.getElementsByClassName(\'menu\');
			for(var i = 0; i < xx.length; i++)
			{
				xx[i].style.display = "none";		
			}
		}
		
		</script></head><body>';
		
echo '
<table class="style2">
<tr><td style="width: 100px;">
		<button onclick="showhide(\'button1\')">button1</button>
		<table  id="button1" class="menu style1" style="position:absolute; display:none;"><tr><td>
			<button onclick="hide()" >button11</button></td></tr><tr><td>
			<button onclick="hide()" >button12</button></td></tr><tr><td>
			<button onclick="hide()" >button13</button></td></tr>
		</table>
		
</td><td  style="width: 100px;">
		<button onclick="showhide(\'button2\')">button2</button>
		<table  id="button2" class="menu style1" style="position: absolute;display:none;"><tr><td>
			<button onclick="hide()"  >button11</button></td></tr><tr><td>
			<button onclick="hide()"  >button12</button></td></tr><tr><td>
			<button onclick="hide()"  >button13</button></td></tr>
		</table>
			
</td></tr>
</table>
';

/*
		

*/

echo '<div><p>sdfasdfasdffdsfwerwerwerewrewr ewrwerwerwer ewrwerwekrwerewjrrnnnnnnnnfffffffffffffweeeeeeeeeesdfasdfasdffdsfwerwerwerewrewr ewrwerwerwer ewrwerwekrwerewjrrnnnnnnnnfffffffffffffweeeeeeeeeesdfasdfasdffdsfwerwerwerewrewr ewrwerwerwer ewrwerwekrwerewjrrnnnnnnnnfffffffffffffweeeeeeeeeesdfasdfasdffdsfwerwerwerewrewr ewrwerwerwer ewrwerwekrwerewjrrnnnnnnnnfffffffffffffweeeeeeeeeesdfasdfasdffdsfwerwerwerewrewr ewrwerwerwer ewrwerwekrwerewjrrnnnnnnnnfffffffffffffweeeeeeeeeesdfasdfasdffdsfwerwerwerewrewr ewrwerwerwer ewrwerwekrwerewjrrnnnnnnnnfffffffffffffweeeeeeeeeesdfasdfasdffdsfwerwerwerewrewr ewrwerwerwer ewrwerwekrwerewjrrnnnnnnnnfffffffffffffweeeeeeeeeesdfasdfasdffdsfwerwerwerewrewr ewrwerwerwer ewrwerwekrwerewjrrnnnnnnnnfffffffffffffweeeeeeeeeesdfasdfasdffdsfwerwerwerewrewr ewrwerwerwer ewrwerwekrwerewjrrnnnnnnnnfffffffffffffweeeeeeeeeesdfasdfasdffdsfwerwerwerewrewr ewrwerwerwer ewrwerwekrwerewjrrnnnnnnnnfffffffffffffweeeeeeeeeesdfasdfasdffdsfwerwerwerewrewr ewrwerwerwer ewrwerwekrwerewjrrnnnnnnnnfffffffffffffweeeeeeeeeesdfasdfasdffdsfwerwerwerewrewr ewrwerwerwer ewrwerwekrwerewjrrnnnnnnnnfffffffffffffweeeeeeeeeesdfasdfasdffdsfwerwerwerewrewr ewrwerwerwer ewrwerwekrwerewjrrnnnnnnnnfffffffffffffweeeeeeeeeesdfasdfasdffdsfwerwerwerewrewr ewrwerwerwer ewrwerwekrwerewjrrnnnnnnnnfffffffffffffweeeeeeeeeesdfasdfasdffdsfwerwerwerewrewr ewrwerwerwer ewrwerwekrwerewjrrnnnnnnnnfffffffffffffweeeeeeeeeesdfasdfasdffdsfwerwerwerewrewr ewrwerwerwer ewrwerwekrwerewjrrnnnnnnnnfffffffffffffweeeeeeeeeesdfasdfasdffdsfwerwerwerewrewr ewrwerwerwer ewrwerwekrwerewjrrnnnnnnnnfffffffffffffweeeeeeeeeesdfasdfasdffdsfwerwerwerewrewr ewrwerwerwer ewrwerwekrwerewjrrnnnnnnnnfffffffffffffweeeeeeeeeesdfasdfasdffdsfwerwerwerewrewr ewrwerwerwer ewrwerwekrwerewjrrnnnnnnnnfffffffffffffweeeeeeeeeesdfasdfasdffdsfwerwerwerewrewr ewrwerwerwer ewrwerwekrwerewjrrnnnnnnnnfffffffffffffweeeeeeeeeesdfasdfasdffdsfwerwerwerewrewr ewrwerwerwer ewrwerwekrwerewjrrnnnnnnnnfffffffffffffweeeeeeeeeesdfasdfasdffdsfwerwerwerewrewr ewrwerwerwer ewrwerwekrwerewjrrnnnnnnnnfffffffffffffweeeeeeeeeesdfasdfasdffdsfwerwerwerewrewr ewrwerwerwer ewrwerwekrwerewjrrnnnnnnnnfffffffffffffweeeeeeeeeesdfasdfasdffdsfwerwerwerewrewr ewrwerwerwer ewrwerwekrwerewjrrnnnnnnnnfffffffffffffweeeeeeeeeesdfasdfasdffdsfwerwerwerewrewr ewrwerwerwer ewrwerwekrwerewjrrnnnnnnnnfffffffffffffweeeeeeeeee       rrrrrrrrrrrrrrrrrrrrrrrrrjhjkfjak</p></div>';

?>
