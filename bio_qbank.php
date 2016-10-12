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
		</script></head><body>';
echo 	'<link rel="stylesheet" type="text/css" href="my_styles.css">';

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

function main_menu()
{
	echo '<link rel="stylesheet" type="text/css" href="horizontal.css">
	<script type="text/javascript" href=menu.js></script>
	<table border=0><tr><td>
	<div id="navbar">
	<ul>
			<li><button name=new>New</button>
			<li><a href=edit_quation.php>Edit</a>
			<li><a href=delete_question.php>Delete</a>
			<li><a href=search_question.php>Search</a>
			<li><a href="#">EE</a>
				<ul>
							<li><button name=new>New</button>	
				</ul>
	</ul>
	</div>

	</td></tr></table>';
}


function find_questions($link,$sql)
{

	if(!$result=mysql_query($sql,$link)){echo mysql_error();}
	
	while($array=mysql_fetch_assoc($result))
	{
		show_question($array);
	}

}

function mk_select_from_table($link,$field,$disabled,$default)
{
	$sql='select `'.$field.'` from '.$field;
	if(!$result=mysql_query($sql,$link)){return FALSE;}
	
		echo '<select  '.$disabled.' name='.$field.'>';
		while($result_array=mysql_fetch_assoc($result))
		{
		if($result_array[$field]==$default)
		{
			echo '<option selected  > '.$result_array[$field].' </option>';
		}
		else
			{
				echo '<option  > '.$result_array[$field].' </option>';
			}
		}
		echo '</select>';	
		return TRUE;
}

function mk_select_from_sql($link,$sql,$name,$disabled,$default)
{
	if(!$result=mysql_query($sql,$link)){return FALSE;}
	
		echo '<select  '.$disabled.' name='.$name.'>';
		while($result_array=mysql_fetch_assoc($result))
		{
		if($result_array[$name]==$default)
		{
			echo '<option selected  > '.$result_array[$name].' </option>';
		}
		else
			{
				echo '<option  > '.$result_array[$name].' </option>';
			}
		}
		echo '</select>';	
		return TRUE;
}


function combo_entry($link,$sql,$name,$disabled,$default)
{
	echo '<table><tr><td>';
	mk_select_from_sql($link,$sql,$name,$disabled,$default);
	echo '</td><td>';
	echo '<input type=text name=\''.$name.'\'>';
	echo '<input type=checkbox name=ck_\''.$name.'\'>';

	echo '</td></tr></table>';
	
}



function search_form($link)
{
	$sql='desc qbank';
	if(!$result=mysql_query($sql,$link)){echo mysql_error();}
	$tr=1;
	echo '<table class=help><form method=post>';
	echo '	<tr>
				<td colspan=8><input type=submit name=submit value=search></td>';

	while($ar=mysql_fetch_assoc($result))
	{
		echo '<tr>';
		if($ar['Field']=='id')
		{
			echo '<td><input type=checkbox name=\'chk_from_'.$ar['Field'].'\' ></td><td>from_'.$ar['Field'].'</td>';
			echo '<td><input type=text name=\'from_'.$ar['Field'].'\' ></td></tr><tr>';
			echo '<td><input type=checkbox name=\'chk_to_'.$ar['Field'].'\' ></td><td>to_'.$ar['Field'].'</td>';
			echo '<td><input type=text name=\'to_'.$ar['Field'].'\' >';
			$tr++;
		}
		
		elseif($ar['Field']=='qtype')
		{		
			echo '<td><input type=checkbox name=\'chk_'.$ar['Field'].'\' ></td><td>'.$ar['Field'].'</td><td>';
			mk_select_from_table($link,$ar['Field'],'','');
		}

		elseif($ar['Field']=='subject1')
		{		
			echo '<td><input type=checkbox name=\'chk_'.$ar['Field'].'\' ></td><td>'.$ar['Field'].'</td><td>';
			mk_select_from_table($link,$ar['Field'],'','');
		}

		elseif($ar['Field']=='subject2')
		{		
			echo '<td><input type=checkbox name=\'chk_'.$ar['Field'].'\' ></td><td>'.$ar['Field'].'</td><td>';
			mk_select_from_sql($link,'select distinct subject2 from qbank',$ar['Field'],'','');
		}
	
		elseif($ar['Field']=='subject3')
		{		
			echo '<td><input type=checkbox name=\'chk_'.$ar['Field'].'\' ></td><td>'.$ar['Field'].'</td><td>';
			mk_select_from_sql($link,'select distinct subject3 from qbank',$ar['Field'],'','');
		}
					
		else
		{
			echo '<td><input type=checkbox name=\'chk_'.$ar['Field'].'\' ></td><td>'.$ar['Field'].'</td><td>';
			echo '<input type=text name=\''.$ar['Field'].'\' >';
		}

		echo '</td>';
		echo '</tr>';
	}
	echo '</form></table>';
}

function new_form($link)
{
	$sql='desc qbank';
	if(!$result=mysql_query($sql,$link)){echo mysql_error();}
	$tr=1;
	echo '<table class=help><form method=post>';
	echo '	<tr>
				<td colspan=8><input type=submit name=submit value=search></td>';

	while($ar=mysql_fetch_assoc($result))
	{
		echo '<tr>';
		if($ar['Field']=='id')
		{
			echo '<td><input type=checkbox name=\'chk_from_'.$ar['Field'].'\' ></td><td>from_'.$ar['Field'].'</td>';
			echo '<td><input type=text name=\'from_'.$ar['Field'].'\' ></td></tr><tr>';
			echo '<td><input type=checkbox name=\'chk_to_'.$ar['Field'].'\' ></td><td>to_'.$ar['Field'].'</td>';
			echo '<td><input type=text name=\'to_'.$ar['Field'].'\' >';
			$tr++;
		}
		
		elseif($ar['Field']=='qtype')
		{		
			echo '<td><input type=checkbox name=\'chk_'.$ar['Field'].'\' ></td><td>'.$ar['Field'].'</td><td>';
			mk_select_from_table($link,$ar['Field'],'','');
		}

		elseif($ar['Field']=='subject1')
		{		
			echo '<td><input type=checkbox name=\'chk_'.$ar['Field'].'\' ></td><td>'.$ar['Field'].'</td><td>';
			mk_select_from_table($link,$ar['Field'],'','');
		}

		elseif($ar['Field']=='subject2')
		{		
			echo '<td><input type=checkbox name=\'chk_'.$ar['Field'].'\' ></td><td>'.$ar['Field'].'</td><td>';
			mk_select_from_sql($link,'select distinct subject2 from qbank',$ar['Field'],'','');
		}
	
		elseif($ar['Field']=='subject3')
		{		
			echo '<td><input type=checkbox name=\'chk_'.$ar['Field'].'\' ></td><td>'.$ar['Field'].'</td><td>';
			mk_select_from_sql($link,'select distinct subject3 from qbank',$ar['Field'],'','');
		}
					
		else
		{
			echo '<td><input type=checkbox name=\'chk_'.$ar['Field'].'\' ></td><td>'.$ar['Field'].'</td><td>';
			echo '<input type=text name=\''.$ar['Field'].'\' >';
		}

		echo '</td>';
		echo '</tr>';
	}
	echo '</form></table>';
}



function get_search_condition($post)
{
	$sql_pre='select * from qbank where ';
	
	$sql='';
	foreach($post as $key=>$value)
	{
		if(isset($post['chk_'.$key]))
		{
			$sql.= '`'.$key.'` like \''.$value.'\' and ';
		}
	}

	if(strlen($sql)>0)
	{
		$sql=substr($sql,0,-4);
		$sql_final=$sql_pre.$sql;
		return $sql_final;
	}
	else
	{
			return false;
	}
}



function show_question($q_array)
{
	echo '<table class=style2><tr><td><div id=question><textarea cols=40>'.$q_array['question'].'</textarea></div></td></tr>';
	echo '<tr><td><button id=+ onclick="showhide(\'answer_'.$q_array['id'].'\')">Ans</button><div style="display:none;" id=\'answer_'.$q_array['id'].'\'><textarea  cols=40 style="color:blue;">'.$q_array['answer'].'</textarea></div></td></tr></table>';
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

main_menu();
search_form($link);





if($search_condition=get_search_condition($_POST))
{
	echo $search_condition;
	find_questions($link,$search_condition);
}



echo '<pre>';
print_r($_POST);
echo '</pre>';


echo '</body></html>';


?>
