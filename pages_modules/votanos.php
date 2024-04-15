<?
$load_coins_settings = simplexml_load_file('engine/config_mods/mu_coins_settings.xml');
ob_start();
if("1" == "1"){
$load_vote_settings = simplexml_load_file('engine/config_mods/vote_credits_settings.xml');
$active = trim($load_vote_settings->active);
if($active == '0'){
	echo msg('0',text_sorry_feature_disabled);
}else{
$delay_hours = trim($load_vote_settings->delay_hours);
$votef = file('engine/variables_mods/vote_credits.tDB');

$voteid = safe_input($_GET['vid'],'');
if(isset($_GET['vid'])){
	if(!empty($_GET['vid'])){
	$delete_time_script = $core_db->Execute("select deletetime from MUCore_VoteCreditsIp order by  deletetime asc");

	while (!$delete_time_script->EOF){
		$time_check2 = $delete_time_script->fields[0]-time();

		if($time_check2 <= 0){
			$delete_time = $core_db->Execute("Delete from MUCore_VoteCreditsIp where deletetime=?",array($delete_time_script->fields[0]));
		}
		
		$delete_time_script->MoveNext();
	 }
	
	$make_time_hours2 = $delay_hours*3600;
	$time_vote2 = time()+$make_time_hours2;
	
	$check_ip = $core_db->Execute("Select username,ip,deletetime from MUCore_VoteCreditsIp where username=?",array($user_auth_id));
	if($check_ip->EOF){
		$check_ip_2 = $core_db->Execute("Select ip from MUCore_VoteCreditsIp where ip=?",array($_SERVER['REMOTE_ADDR']));
		if(!$check_ip_2->EOF){
			echo msg('0',str_replace("{delay_hours}",$delay_hours,text_module_vote_credits_t1));
		}else{
			$create_ip_acc = $core_db->Execute("Insert into MUCore_VoteCreditsIp (username,deletetime,ip)VALUES(?,?,?)",array($user_auth_id,$time_vote2,$_SERVER['REMOTE_ADDR']));
		/* FIX VOLVER A CARGAR DESPUES DE GRABAR LA IP*/
    header('Location: '.$core_run_script.'&vid='.$_GET['vid'].'');
    }

	}else{
		$voteid = safe_input($_GET['vid'],'');
		foreach ($votef as $vote_dat_re){
			$vote_dat_re = explode("¦",$vote_dat_re);
			if($vote_dat_re[0] == $voteid){
				$vote_credits = $vote_dat_re[3];
				$vote_link = $vote_dat_re[2];
				$vote_id_found = '1';
				$vote_id = $vote_dat_re[0];
				break;
			}
		}
		if($vote_id_found == '1'){
			$select_vote = $core_db->Execute("Select username,vote_time from MUCore_VoteCredits where username=? and vote_id=?",array($user_auth_id,$vote_id));
			$make_time_hours = $delay_hours*3600;
			$time_vote = time()+$make_time_hours;
			if($select_vote->EOF){
				$insert_username = $core_db->Execute("insert into MUCore_VoteCredits(vote_id,username,vote_time)VALUES(?,?,?)",array($vote_id,$user_auth_id,$time_vote));
				if($insert_username){
					$check_memb_acc = $core_db2->Execute("Select memb___id from memb_Credits where memb___id=?",array($user_auth_id));
					if($check_memb_acc->EOF){

						$insert_memb_acc = $core_db2->Execute("INSERT INTO MEMB_CREDITS(memb___id,credits)VALUES(?,?)",array($user_auth_id,$vote_credits));
						if($insert_memb_acc){
							header('Location: '.$vote_link.'');
						}else{
							echo msg('0',text_module_vote_credits_t2);
						}
						
					}else{
					
            if($load_vote_settings->credits_type == '1'){
            	if($load_coins_settings->credits_database==1){
            		$insert_credits = $core_db->Execute("Update ".$load_coins_settings->credits_table." set ".$load_coins_settings->credits_column."=".$load_coins_settings->credits_column."+?  where ".$load_coins_settings->user_column."=?",array($vote_credits,$user_auth_id));
            	}else{
            		$insert_credits = $core_db2->Execute("Update ".$load_coins_settings->credits_table." set ".$load_coins_settings->credits_column."=".$load_coins_settings->credits_column."+?  where ".$load_coins_settings->user_column."=?",array($vote_credits,$user_auth_id));
            	}
            
            }else{
            	if($load_coins_settings->credits2_database==1){
            		$insert_credits = $core_db->Execute("Update ".$load_coins_settings->credits2_table." set ".$load_coins_settings->credits2_column."=".$load_coins_settings->credits2_column."+?  where ".$load_coins_settings->user2_column."=?",array($vote_credits,$user_auth_id));
            	}else{
            		$insert_credits = $core_db2->Execute("Update ".$load_coins_settings->credits2_table." set ".$load_coins_settings->credits2_column."=".$load_coins_settings->credits2_column."+?  where ".$load_coins_settings->user2_column."=?",array($vote_credits,$user_auth_id));
            	}
            
            }

						if($insert_credits){
							header('Location: '.$vote_link.'');
						}else{
							echo msg('0',text_module_vote_credits_t2);
						}
					}
				}
			}else {
				$time_check = $select_vote->fields[1]-time();
				if($time_check > 0){
					echo msg('0',str_replace("{delay_hours}",$delay_hours,text_module_vote_credits_t3));
				}else{
					$update_vote_info = $core_db->Execute("Update MUCore_VoteCredits set [vote_time]=$time_vote where username=? and vote_id=?",array($user_auth_id,$vote_id));
					if($update_vote_info){


            if($load_vote_settings->credits_type == '1'){
            	if($load_coins_settings->credits_database==1) {
            		$insert_credits = $core_db->Execute("Update ".$load_coins_settings->credits_table." set ".$load_coins_settings->credits_column."=".$load_coins_settings->credits_column."+?  where ".$load_coins_settings->user_column."=?",array($vote_credits,$user_auth_id));
            	}else{
            		$insert_credits = $core_db2->Execute("Update ".$load_coins_settings->credits_table." set ".$load_coins_settings->credits_column."=".$load_coins_settings->credits_column."+?  where ".$load_coins_settings->user_column."=?",array($vote_credits,$user_auth_id));
            	}
            
            }else{
            	if($load_coins_settings->credits2_database==1) {
            		$insert_credits = $core_db->Execute("Update ".$load_coins_settings->credits2_table." set ".$load_coins_settings->credits2_column."=".$load_coins_settings->credits2_column."+?  where ".$load_coins_settings->user2_column."=?",array($vote_credits,$user_auth_id));
            	}else{
            		$insert_credits = $core_db2->Execute("Update ".$load_coins_settings->credits2_table." set ".$load_coins_settings->credits2_column."=".$load_coins_settings->credits2_column."+?  where ".$load_coins_settings->user2_column."=?",array($vote_credits,$user_auth_id));
            	}
            
            }

						if($insert_credits){
							header('Location: '.$vote_link.'');
						}else{
							echo msg('0',text_module_vote_credits_t2);
						}
					}
				}
			}
		}
		}
	}
}

echo '
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Lista de Votos</h3>
  </div>
<table class="table table-striped table-fix">
  <thead>
    <tr>
      <th>Nombre</th>
      <th>Premio (Creditos)</th>
      <th>Opcion</th>
    </tr>
  </thead>
  <tbody>
';
$count=0;
foreach ($votef as $vote_data){
	$vote_data = explode("¦",$vote_data);
	$count++;
	echo '
    <tr>
    
    <td>'.htmlspecialchars($vote_data[1]).'</td>
    <td>'.number_format($vote_data[3]).'</td>
    <td>
    <form action="'.$core_run_script.'&vid='.$vote_data[0].'" method="post">
    <input type="submit" value="Vote Now!" class="btn btn-success btn-sm">
    </form>
    </td>
  	</tr>';
}
if($count=='0'){
	echo '
	<tr>
	<td colspan"3">'.msg('0',text_module_vote_credits_t6).'</td>
	</td>';
}
echo '  </tbody>
  </table>
</div>';
}
}

?>