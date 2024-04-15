<?
$config = simplexml_load_file('engine/config_mods/rss_feed_settings.xml');
if($config->active == '0'){
	echo msg('0','Sorry, this feature is temporarily unavailable at the moment.');
}else{
	include('engine/rss_feed.php'); 
	$rss = new lastRSS; 
	$rss->cache_dir = './engine/cache/rss';
	$rss->cache_time = trim($config->rss_time)*60; 
	$count_rss = 0;
	

	if ($rs = $rss->get($config->rss_url)) {
		echo '<ul id="rss_feed">';
		foreach ($rs['items'] as $item){
			$count_rss++;
			$item['title'] = str_replace("<![CDATA[","",$item['title']);
			$item['title'] = str_replace("]]>","",$item['title']);
			echo '<li><a href="'.$item['link'].'" target="_blank">'.set_limit($item['title'],trim($config->rss_length),'...').'</a><br></li>';
			
			if($count_rss >= trim($config->rss_count)){
				break;
			}
		}
		echo '</ul>';
		
	}else{
		echo msg('0',''.rss_feed.'');
	}
	
}
?>