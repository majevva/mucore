<?
if(isset($_GET['delete'])){
	if(empty($_GET['delete'])){
		echo notice_message_admin('Unable to proceed your request.','1','1','index.php?get=doante_paypal_transactions');
	}else{
		$id = safe_input($_GET['delete'],'');
		$delete_txn = $core_db->Execute("Delete from MUCore_PayPal_Donate_Transactions where id=?",array($id));
		if($delete_txn){
			echo notice_message_admin('PayPal Transaction successfully deleted.',1,0,'index.php?get=doante_paypal_transactions');
		}else{
			echo notice_message_admin('Unable to proceed your request.','1','1','index.php?get=doante_paypal_transactions');
		}
	}
	
}else{
echo '
<form action="" name="form_edit" method="POST">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_panel">
<tr>
 <td align="center" class="panel_title" colspan="2">Search PayPal Donate Transactions</td>
</tr>
<tr>
<td align="left" class="panel_title_sub" colspan="2">Transaction ID</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">
Enter PayPal Transaction ID.</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top">
<input type="text" class="form-control" name="txn_id">
</td>
</tr>

<tr>
<td align="left" class="panel_title_sub" colspan="2">User ID</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">
Enter User ID of account.
</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top">
<input type="text" class="form-control" name="userid">
</td>
</tr>




<tr>
<td align="right" class="box-footer" colspan="2">
<input type="hidden" name="search">
<input type="submit" class="btn btn-block btn-success btn-200" value="Search"></td>
</tr>
</table>
</form>
';

if(!isset($_POST['txn_id']) || !isset($_POST['userid'])){
	$txn_select = $core_db->Execute("Select top 50 id,memb___id,transaction_id,amount,currency,order_date,payer_email,credits,status from MUCore_PayPal_Donate_Transactions order by order_date desc");
	$txn_text = 'Last 50 PayPal Donate Transactions';
}else{
	
	if(!empty($_POST['txn_id'])){
		$txn_text = 'Search Results';
		$search = safe_input($_POST['txn_id']);
		$txn_select = $core_db->Execute("Select id,memb___id,transaction_id,amount,currency,order_date,payer_email,credits,status from MUCore_PayPal_Donate_Transactions where transaction_id=? order by order_date desc",array($search));
	}elseif (!empty($_POST['userid'])){
		$txn_text = 'Search Results';
		$search = safe_input($_POST['userid']);
		$txn_select = $core_db->Execute("Select id,memb___id,transaction_id,amount,currency,order_date,payer_email,credits,status from MUCore_PayPal_Donate_Transactions where memb___id=? order by order_date desc",array($search));
	}else{
		$txn_text = 'Last 50 PayPal Donate Transactions';
			$txn_select = $core_db->Execute("Select top 50 id,memb___id,transaction_id,amount,currency,order_date,payer_email,credits,status from MUCore_PayPal_Donate_Transactions order by order_date desc");
	}
	
}

			echo '
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_panel" style="margin-top: 20px;">
<tr>
 <td align="center" class="panel_title" colspan="8">'.$txn_text.'</td>
</tr>
<tr>
<td align="left" class="panel_title_sub2" width="80">User ID</td>
<td align="left" class="panel_title_sub2">Transaction ID</td>
<td align="left" class="panel_title_sub2">PayPal Email</td>
<td align="left" class="panel_title_sub2">Amount</td>
<td align="left" class="panel_title_sub2" width="100">Issued Credits</td>
<td align="left" class="panel_title_sub2" width="140">Processed Date</td>
<td align="left" class="panel_title_sub2" width="100">Payment Status</td>
<td align="left" class="panel_title_sub2" width="50">Controls</td>
</tr>';
			$count = 0;
			
			while (!$txn_select->EOF){
				
				$count++;
				$tr_color = ($count % 2) ? '' : 'even'; 
				echo '<tr class="'.$tr_color.'">
				<td align="left" class="panel_text_alt_list"><strong>'.htmlspecialchars($txn_select->fields[1]).'</strong></td>
				<td align="left" class="panel_text_alt_list">'.$txn_select->fields[2].'</td>
				<td align="left" class="panel_text_alt_list">'.$txn_select->fields[6].'</td>
				<td align="left" class="panel_text_alt_list">'.$txn_select->fields[3].' '.$txn_select->fields[4].'</td>
				<td align="left" class="panel_text_alt_list">'.number_format($txn_select->fields[7]).'</td>
				<td align="left" class="panel_text_alt_list">'.date('F j, Y / H:i',$txn_select->fields[5]).'</td>
				<td align="left" class="panel_text_alt_list">'.$txn_select->fields[8].'</td>
				<td align="left" class="panel_text_alt_list"><a href="#" onclick="ask_url(\'Are you sure you want to delete this transaction?\',\'index.php?get=doante_paypal_transactions&delete='.$txn_select->fields[0].'\')";>[Delete]</a></td>
				</tr>';
				
				$txn_select->MoveNext();
			}
			if($count=='0'){
				echo '<tr>
				<td align="center" class="panel_text_alt_list" colspan="8"><em>No transactions</em></td>
				</tr>';
			}
			echo '</table>';
}
?>