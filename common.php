<?php
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



?>
