<?
$settings = simplexml_load_file('engine/config_mods/downloads_settings.xml');
$active = trim($settings->active);
if($active == '0'){
	echo msg('0','Sorry, this feature is temporarily unavailable at the moment.');
}else{
	
$iD_file = file('engine/variables_mods/downloads.tDB');
echo '<table border="0" cellspacing="5" cellpadding="0" width="100%" class="download">';
$count_fc=0;
$count_p=0;
$count_u=0;


foreach ($downloads_cat as $cat_id => $download_cat){
	switch ($cat_id) {
		case 1:
			$class_button='btn btn-primary btn-lg btn-block';
			break;
		
		case 2:
			$class_button='btn btn-warning btn-md btn-block';
			break;

		case 3:
			$class_button='btn btn-danger btn-md btn-block';
			break;
	}
	echo '
	<tr>
	<td><h2><i class="fa fa-download" aria-hidden="true"></i> '.$download_cat.'</h2></td>
	</tr>';

	foreach ($iD_file as $iD_data){
		$iD_data = explode(",",$iD_data);
		if($iD_data[1] == '1'){
			
				if($iD_data[2] == $cat_id){
			echo '
    <tr>
    	<td style="padding-top:5px;padding-bottom:0px;"><a href="'.$iD_data[5].'" target="_blank" class="'.$class_button.'" role="button">
    	<i class="fa fa-download" aria-hidden="true"></i> '.$iD_data[3].' '.htmlspecialchars($iD_data[4]).'</a></td>
	</tr>';
		}
		
	
		}
	}
	echo '<tr>
	<td colspan="2">&nbsp;</td>
	</tr>';



}

echo '</table>';
}
?>