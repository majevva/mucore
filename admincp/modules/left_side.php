<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar" style="height: auto;">

      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
 
 <?

 $nav_xml = array();
if ($handle = @opendir('nav_bar')){
	while (($file = readdir($handle)) !== false){
		if (preg_match('#^nav_(.*).xml$#i', $file, $matches)){
			$nav_key = preg_replace('#[^a-z0-9]#i', '', $matches[1]);
			$nav_xml["$nav_key"] = $file;
		}
	}
	closedir($handle);
}
$nav_categories = array();
foreach ($nav_xml as $xml=>$xml_file){
	$o_xml = simplexml_load_file('nav_bar/'.$xml_file.'');
	

	foreach ($o_xml as $nav_cat){
		 $nav_group = $nav_cat['group'];
		 $nav_categories["$nav_cat[group]"][0] = $nav_cat['title'];
		 $nav_categories["$nav_cat[group]"][1] = $nav_cat['icon'];
	}
}




ksort($nav_categories);
foreach ($nav_categories as $cat=>$cat_value){


	echo '<li class="treeview">
          <a href="#"><i class="fa '.$cat_value[1].'"></i><span>'.$cat_value[0].'</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>

          <ul class="treeview-menu">';
	foreach ($nav_xml as $xml=>$xml_file){
		$o_xml = simplexml_load_file('nav_bar/'.$xml_file.'');
		foreach ($o_xml as $nav_cat){
			
			foreach ($nav_cat as $nav_script){
				if($nav_script['opt'] == 'ADM') {
					$addopt='<span class="label label-danger"><i class="fa fa-gavel"></i> '.$nav_script['opt'].'</span>';
				}elseif($nav_script['opt'] == 'NEW') {
					$addopt='<span class="label label-success"><i class="fa fa-star"></i> '.$nav_script['opt'].'</span>';
				}else{
					$addopt='';
				}
				if($nav_script['group'] == $cat){
					echo '<li><a href="'.$nav_script['link'].'" target="body">'.$nav_script[0].' '.$addopt.'</a></li>';
				}
			}
		}
	}
	echo '</ul>
        </li>';
}


 ?>

  


 </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
