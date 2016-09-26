<?php


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
		</script></head><body>';


/////////////////////////////////
function login_varify()
{
return mysql_connect('127.0.0.1',$_SESSION['login'],$_SESSION['password']);
}

/////////////////////////////////
function select_database($link)
{
	return mysql_select_db('bio_qbank',$link);
}

///////////////////////////////////
function connect()
{
	if(!$link=login_varify())
	{
		exit();
	}


	if(!select_database($link))
	{
		exit();
	}
return $link;
}



function find_questions($link,$sql)
{

	if(!$result=mysql_query($sql,$link)){echo mysql_error();}
	
	while($array=mysql_fetch_assoc($result))
	{
		show_question($array);
	}

}

function show_question($q_array)
{
	echo '<button id=+ onclick="showhide(\''.$q_array['id'].'\')">+</button><div id=question><textarea>'.$q_array['question'].'</textarea></div><div id=meta>'.$q_array['subject1'].'</div>';
	echo '<div style="display:block;" id=answer_\''.$q_array['id'].'\'><textarea>'.$q_array['answer'].'</textarea></div>';
}




if(!isset($_SESSION['login']))
{
	$_SESSION['login']=$_POST['login'];
}


if(!isset($_SESSION['password']))
{
	$_SESSION['password']=$_POST['password'];
}

$link=connect();

find_questions($link,"select * from qbank");

echo '</body></html>';
?>
