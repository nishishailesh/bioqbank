<?php


echo '

<style>
	table {border:0px;border-spacing: 0;border-collapse: collapse;background-color:lightgray;}
</style>

<script type="text/javascript" >
		function showhidemenu(one) 
		{		
			xx=document.getElementsByClassName(\'menu\');			
			for(var i = 0; i < xx.length; i++)
			{
				if(xx[i]!=document.getElementById(one))
				{
					xx[i].style.display = "none";		
				}
				
				else if(xx[i]==document.getElementById(one))
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
		
		function hidemenu() {
		
			xx=document.getElementsByClassName(\'menu\');
			for(var i = 0; i < xx.length; i++)
			{
				xx[i].style.display = "none";		
			}
		}
		
		//document.onclick=function(){hidemenu();};
		</script>';

function menu()
{		
echo '
<form method=post>
<table>
<tr><td>
		<button type=button onclick="showhidemenu(\'button1\')">Question</button>
		<table  id="button1" class="menu" style="position:absolute; display:none;"><tr><td>
			<button formaction=new.php type=submit onclick="hidemenu()" name=new>New</button></td></tr><tr><td>
			<button formaction=edit.php type=submit onclick="hidemenu()" name=edit>Edit</button></td></tr><tr><td>
			<button type=button onclick="hidemenu()" name=delete>Delete</button></td></tr><td>
			<button formaction=search.php type=submit onclick="hidemenu()">Search</button></td></tr>
		</table>
		
</td><td>
		<button  type=button onclick="showhidemenu(\'button2\')">Help</button>
		<table  id="button2" class="menu" style="position: absolute;display:none;"><tr><td>
			<button  type=button onclick="hidemenu()"  >Student</button></td></tr><tr><td>
			<button  formaction=teacher_help.php type=submit onclick="hidemenu()">Teacher</button></td></tr><tr><td>
			<button  formaction=logout.php type=submit onclick="hidemenu()">Logout</button></td></tr>
		</table>
			
</td></tr>
</table>
</form>
';

}

//menu();

?>
