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
		
echo 	'<link rel="stylesheet" type="text/css" href="my_styles.css">';

include 'menu.php';
include 'common.php';			
		
echo '<body>';

/////////////////////////////////


function new_form($link)
{
	$sql='desc qbank';
	if(!$result=mysql_query($sql,$link)){echo mysql_error();}
	$tr=1;
	echo '<table class=help><form method=post>';
	echo '	<tr>
				<td colspan=8><input type=submit name=submit value=save></td>';

	while($ar=mysql_fetch_assoc($result))
	{
		echo '<tr>';
		
		if($ar['Field']!='id')
		{
			echo '<td>'.$ar['Field'].'</td><td>';	
		}
		
		echo'<td>';
		
		if($ar['Field']=='type')
		{	
			mk_select_from_table($link,$ar['Field'],'','');
		}

		elseif($ar['Field']=='subject1')
		{		
			mk_select_from_table($link,$ar['Field'],'','');
		}

		elseif($ar['Field']=='subject2')
		{		
			combo_entry($link,'select distinct subject2 from qbank',$ar['Field'],'','');
			//mk_select_from_sql($link,'select distinct subject2 from qbank',$ar['Field'],'','');
		}
	
		elseif($ar['Field']=='subject3')
		{		
			//mk_select_from_sql($link,'select distinct subject3 from qbank',$ar['Field'],'','');
			combo_entry($link,'select distinct subject3 from qbank',$ar['Field'],'','');
		}
		
		//no need to input autonumber			
		elseif($ar['Field']!='id')
		{
			//echo '<input type=text name=\''.$ar['Field'].'\' >';
			echo '<textarea cols=60 name=\''.$ar['Field'].'\'></textarea>';
			
		}

		echo '</td>';
		echo '</tr>';
	}
	echo '</form></table>';
}


function make_insert_sql_qbank($link,$post)
{
	if(isset($post['ck_subject2']))
	{
		$subject2=$post['i_subject2'];
	}
	else
	{
		$subject2=$post['subject2'];
	}
	
	if(isset($post['ck_subject3']))
	{
		$subject3=$post['i_subject3'];
	}
	else
	{
		$subject3=$post['subject3'];
	}
	
	
	$sql= 'insert into qbank 
				(type,subject1,subject2,subject3,question,answer)
				values
				(
					\''.$post['type'].'\',				
					\''.$post['subject1'].'\',
					\''.$subject2.'\',
					\''.$subject3.'\',
					\''.$post['question'].'\',
					\''.$post['answer'].'\')';
	return $sql;
}

function insert_new_question($link,$post)
{
	$sql=make_insert_sql_qbank($link,$post);
	//echo $sql;
	if(!$result=mysql_query($sql,$link)){echo '<h3>New Question is Not Saved</h3>';echo mysql_error();return FALSE;}
	else{echo '<h5>Question Saved</h5>';}
	return mysql_insert_id($link);
}


$link=connect();
menu();
new_form($link);

if(isset($_POST['submit']))
{
	if($_POST['submit']=='save')
	{
		if($id=insert_new_question($link,$_POST))
		{
			find_and_show_questions($link,'select * from qbank where id=\''.$id.'\'');
		}
	}
}


echo '<pre>';print_r($_POST);echo '</pre>';


echo '</body></html>';


?>
