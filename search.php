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
		
		elseif($ar['Field']=='type')
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
			if($key=='from_id')
			{
				if(isset($post['chk_to_id']))
				{
					$sql.= '`id` between \''.$value.'\' and \''.$post['to_id'].'\' and '; 
				}
				else
				{
					$sql.= '`id` =\''.$value.'\' and '; 
				}
			}
			elseif($key=='to_id')
			{
				//do nothing
			}
	
			else
			{
				$sql.= '`'.$key.'` like \''.$value.'\' and ';
			}
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
	echo '<table class=style2>
			<tr>
				<td>

						<textarea readonly rows=1 cols=80>'.$q_array['question'].'</textarea>

					<button onclick="showhide(\'answer_'.$q_array['id'].'\')">Ans</button>
				</td>
			</tr>';
	echo '<tr>
				<td>
						
						<div style="display:none;" id=\'answer_'.$q_array['id'].'\'>
								'.$q_array['id'].', '.
								$q_array['type'].', '.
								$q_array['subject1'].', '.
								$q_array['subject2'].', '.
								$q_array['subject3'].'<br>
							<textarea  readonly rows=5 cols=60 
									style="	position:relative;
											left:00px;
											background-color:lightpink;
											color:blue;"
									>'.$q_array['answer'].
							'</textarea>
						</div>
				</td>
			</tr>
		</table>';
}

function find_and_show_questions($link,$sql)
{

	if(!$result=mysql_query($sql,$link)){echo mysql_error();}
	
	while($array=mysql_fetch_assoc($result))
	{
		show_question($array);
	}

}



$link=connect();
menu();
search_form($link);


if($search_condition=get_search_condition($_POST))
{
	//echo $search_condition;
	find_and_show_questions($link,$search_condition);
}


/*
echo '<pre>';
print_r($_POST);
echo '</pre>';
*/

echo '</body></html>';


?>
