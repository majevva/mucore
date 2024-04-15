<?
if(isset($_POST['settings'])){
			$new_db = fopen("../engine/seo_config.php", "w");
			$data = "<?\r\n";
			$data .="\$core_seo['meta_keywords'] = \"".str_replace('"',"",$_POST['meta_keywords'])."\";\r\n"; 
			$data .="\$core_seo['meta_description'] = \"".str_replace('"',"",$_POST['meta_description'])."\";\r\n"; 
			$data .="\$core_seo['meta_og_image'] = \"".str_replace('"',"",$_POST['meta_og_image'])."\";\r\n"; 
			$data .="?>";
			fwrite($new_db,$data);
			fclose($new_db);
			echo notice_message_admin('Settings successfully saved',1,0,'index.php?get=seo_head_tags');
	
}else {
	require('../engine/seo_config.php');
	
	echo '
	<form action="" name="form_edit" method="POST">
<div class="box">
<div class="box-header with-border">
          <h3 class="box-title">Head Tags</h3>
          <div class="box-tools pull-right"><button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button><button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button></div></div>
          <div class="box-body">

	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_panel">
<tr>
<td align="left" class="panel_title_sub" colspan="2">Meta Keywords</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Enter the meta keywords for all pages. These are used by search engines to index your pages with more relevance.<br><br>Separe each word with comma<br>e.g: game,muonline,mmorpg,free play,season 5,bugless
</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top"><input type="text" class="form-control" name="meta_keywords" value="'.$core_seo['meta_keywords'].'" size="45"></td>
</tr>
<tr>
<td align="left" class="panel_title_sub" colspan="2">Meta Description</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Enter the meta description for all pages. This is used by search engines to index your pages more relevantly.
</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top"><input type="text" class="form-control" name="meta_description" value="'.$core_seo['meta_description'].'" size="45"></td>
</tr>

<tr>
<td align="left" class="panel_title_sub" colspan="2">Imagen de Presentacion</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Ingrese la url de la imagen que aparecera al compartir en Facebook.
</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top"><input type="text" class="form-control" name="meta_og_image" value="'.$core_seo['meta_og_image'].'" size="150"></td>
</tr>

<tr>
<td align="right" class="box-footer" colspan="2">
<input type="hidden" name="settings">
<input type="submit" class="btn bg-olive margin" value="Save"></td>
</tr>
</table>

</div>
</div>
';
}
?>