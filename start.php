<?php
session_start();

echo '<html><head><script type="text/javascript" >
		function showhide(one) {
			if(document.getElementById(one).style.display == "block")
			{
				document.getElementById(one).style.display = "none";
			}
			else
			{
				document.getElementById(one).style.display = "block";
			}	
		}
		</script></head>';
		

include 'menu.php';
include 'common.php';		
		
echo '<body>';

/////////////////////////////////




if(!isset($_SESSION['login']))
{
	$_SESSION['login']=$_POST['login'];
}


if(!isset($_SESSION['password']))
{
	$_SESSION['password']=$_POST['password'];
}

$link=connect();
menu();



echo '<pre>';
print_r($_POST);
echo '</pre>';


echo '</body></html>';


?>
