<?
$get_config = simplexml_load_file('engine/config_mods/rankings_settings.xml');
if ($get_config->active == '0') {
    echo msg('0', 'Sorry, this feature is temporarily unavailable at the moment.');
} else {

    $hide_stats = trim($get_config->hide_stats);
    
    if (!isset($_GET['rank'])) {
        $rank_type = 'characters';
    } elseif (isset($_GET['rank'])) {
        $rank_type = safe_input($_GET['rank'], '');
    }

    if (!isset($_GET['class'])) {
        $rank_class_type = 'all';

    } elseif (isset($_GET['class'])) {
        $rank_class_type = safe_input($_GET['class'], '');
    }

    /* SCRIPT STADO */
        echo '
<script type="text/javascript">  
load_image= new Image(16,16); 
load_image.src="template/' . $core['config']['template'] . '/images/load_page.gif";  
function get_data(div,id, page, form, append, data){
    document.getElementById(div).innerHTML = \'<img src="template/' . $core['config']['template'] . '/images/load_page.gif" width="16" height="16">\';
    var veri;
    if( typeof(data) == "string")
        veri = data;
    else 
        veri = $(form).serialize();
    $.ajax({
   type: "POST",
   url: page,
   data: veri,
   error: function(html)
   {
           alert("Falied to get data.");
   },
   success: function(html)
   {
        if( typeof(append) == "boolean")
            $(id).append(html);
        else
            $(id).html(html);
   }
  });
  return false;
}
</script>';


    /* LISTA DE TIPOS DE RANKING */
    echo '<div class="iR_rank_type" style="margin-top: 3px;">';
    if($rank_type=='rankings') {
            echo '<span class="label label-default lbl-fix">Characters </span> - <a class="label label-success lbl-fix" href="' . $core_run_script . '&rank=guilds">Guilds</a> - <a class="label label-success lbl-fix" href="' . $core_run_script . '&rank=gens">Top Gens</a> - <a class="label label-success lbl-fix" href="' . $core_run_script . '&rank=horas">Top Horas</a> - <a class="label label-success lbl-fix" href="' . $core_run_script . '&rank=online">Usuarios Online</a>';
     }elseif($rank_type=='characters') {
            echo '<span class="label label-default lbl-fix">Characters</span> - <a class="label label-success lbl-fix" href="' . $core_run_script . '&rank=guilds">Guilds</a> - <a class="label label-success lbl-fix" href="' . $core_run_script . '&rank=gens">Top Gens</a> - <a class="label label-success lbl-fix" href="' . $core_run_script . '&rank=horas">Top Horas</a> - <a class="label label-success lbl-fix" href="' . $core_run_script . '&rank=online">Usuarios Online</a>';
     }elseif($rank_type=='guilds') {
            echo '<a class="label label-success lbl-fix" href="' . $core_run_script . '&rank=characters">Characters</a> - <span class="label label-default lbl-fix">Guilds</span> - <a class="label label-success lbl-fix" href="' . $core_run_script . '&rank=gens">Top Gens</a> - <a class="label label-success lbl-fix" href="' . $core_run_script . '&rank=horas">Top Horas</a> - <a class="label label-success lbl-fix" href="' . $core_run_script . '&rank=online">Usuarios Online</a>';
     }elseif($rank_type=='gens') {
            echo '<a class="label label-success lbl-fix" href="' . $core_run_script . '&rank=characters">Characters</a> - <a class="label label-success lbl-fix" href="' . $core_run_script . '&rank=guilds">Guilds</a> - <span class="label label-default lbl-fix">Top Gens</span> - <a class="label label-success lbl-fix" href="' . $core_run_script . '&rank=horas">Top Horas</a> - <a class="label label-success lbl-fix" href="' . $core_run_script . '&rank=online">Usuarios Online</a>';
     }elseif($rank_type=='horas') {
            echo '<a class="label label-success lbl-fix" href="' . $core_run_script . '&rank=characters">Characters</a> - <a class="label label-success lbl-fix" href="' . $core_run_script . '&rank=guilds">Guilds</a> - <a class="label label-success lbl-fix" href="' . $core_run_script . '&rank=gens">Top Gens</a> - <span class="label label-default lbl-fix">Top Horas</span> - <a class="label label-success lbl-fix" href="' . $core_run_script . '&rank=online">Usuarios Online</a>';
     }elseif($rank_type=='online') {
            echo '<a class="label label-success lbl-fix" href="' . $core_run_script . '&rank=characters">Characters</a> - <a class="label label-success lbl-fix" href="' . $core_run_script . '&rank=guilds">Guilds</a> - <a class="label label-success lbl-fix" href="' . $core_run_script . '&rank=gens">Top Gens</a> - <a class="label label-success lbl-fix" href="' . $core_run_script . '&rank=horas">Top Horas</a> - <span class="label label-default lbl-fix">Usuarios Online</span>';
     }
    echo '</div>';

    /* LISTA DE RAZAS */
    if ($rank_type == 'characters') {
        echo '<div style="margin-left: 4px; border-left: #2A2A2A dashed 1px; border-bottom: #2A2A2A dashed 1px; padding: 4px;line-height: 20px;" class="iR_rank_type_sub">';
        if ($rank_class_type == 'all') {
            echo '<span class="label label-danger lbl-fix">[ All ]</span>';
        } else {
            echo '<a href="' . $core_run_script . '&rank=characters&class=all" class="label label-primary lbl-fix">[ All ]</a>';
        }
        
        
        foreach ($characters_class as $cls => $cls_n) {
            if ($rank_class_type == 'all') {
                echo ' - <a href="' . $core_run_script . '&rank=characters&class=' . $cls . '" class="label label-primary lbl-fix">' . $cls_n[0] . '</a>';
            } else {
                if ($rank_class_type == $cls) {
                    echo ' - <span  class="label label-danger lbl-fix">' . $cls_n[0] . '</span>';
                } else {
                    echo ' - <a href="' . $core_run_script . '&rank=characters&class=' . $cls . '" class="label label-primary lbl-fix">' . $cls_n[0] . '</a>';
                }
            }
            
        }
        echo '</div>';
    }


    /* MOSTRAR RANKINGS */
    if ($rank_type=='characters') {

        if($rank_class_type!='all') {
        $num_total_registros0 = $core_db->Execute("SELECT count(Name) FROM Character where Class= ".$_GET['class']."");
    	}else{
    	$num_total_registros0 = $core_db->Execute("SELECT count(Name) FROM Character");
    	}

        $num_total_registros = $num_total_registros0->fields[0];

        if($num_total_registros < 1){
            echo '<div class="alert alert-info">No hay registros para esta consulta.</div>';
        }
        //Si hay registros
        if ($num_total_registros > 0) {
        //Limito la busqueda
        $TAMANO_PAGINA = $get_config->char_top;
        $pagina = false;
        //examino la pagina a mostrar y el inicio del registro a mostrar
        if (isset($_GET["pagina"]))
            $pagina = $_GET["pagina"];
        
    	if (!$pagina) {
        $inicio = 0;
        $pagina = 1;
    	}
    	else {
        $inicio = ($pagina - 1) * $TAMANO_PAGINA;
    	}
    	//calculo el total de paginas
    	$total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);


    	//Show Class Rankings from SQL
        if($num_total_registros>0){
            if($rank_class_type!='all') {
            $consulta = $core_db->Execute("SELECT TOP $TAMANO_PAGINA mu_id,name,class,clevel,".AOH_Resets_column.",strength,dexterity,vitality,energy,ctlcode,accountid,leadership,grand_resets FROM Character  where Character.Name not in ( SELECT TOP $inicio Name from Character WHERE Class=".$_GET['class']." order by grand_resets desc, ".AOH_Resets_column." desc, clevel desc ) AND Character.Class=".$_GET['class']." order by Character.grand_resets desc, Character.".AOH_Resets_column." desc, Character.clevel desc ");
            //$consulta = $core_db->Execute("SELECT TOP $TAMANO_PAGINA Name FROM Character where Character.Name not in ( SELECT TOP $inicio Name from Character order by Name asc ) order by Character.Name desc");
        
        }else{
            $consulta = $core_db->Execute("SELECT TOP $TAMANO_PAGINA mu_id,name,class,clevel,".AOH_Resets_column.",strength,dexterity,vitality,energy,ctlcode,accountid,leadership,grand_resets FROM Character  where Character.Name not in ( SELECT TOP $inicio Name from Character order by grand_resets desc, ".AOH_Resets_column." desc, clevel desc ) order by Character.grand_resets desc, Character.".AOH_Resets_column." desc, Character.clevel desc ");
        }
        }
        

        //Fix Del Count
    	if($_GET['pagina']=='1' or $_GET['pagina']==''){
    		$count=0;
    	}else{
    		$count=$get_config->char_top*($_GET['pagina']-1);
    	}
        // Fin Fix del Count
        
        //Inicio de Tabla
        echo '<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Lista Ranking</h3>
  </div>
<table class="table table-striped table-fix">';
        echo '<thead>
    <tr>
      <th>#</th>
      <th>Personaje</th>
      <th>Raza</th>
      <th>Stats</th>
      <th>Reset<sup>GR</sup></th>
    </tr>
  </thead>
  <tbody>';
        while (!$consulta->EOF){
                if ($get_config->gm == '1') {
                $count++;
                  if (in_array($consulta->fields[9], get_array_variables($characters_ctlcode))) {
                    if($count > 0 and $count <4){
                        $numero_rank='<img src="AOH_Addons/images/ranking/rank'.$count.'.png">';
                    }else{
                        $numero_rank=$count;
                    }
                    echo '<tr>';
                    echo '<td class="rank_n">' . $numero_rank . '</td>';

                    echo '<td><table>
                    <tr>
                        <td class="iR_name">' . htmlspecialchars($consulta->fields[1]) . '</td>
                    </tr>
                    <tr>
                        <td>' . decode_class($consulta->fields[2]) . '</td>
                    </tr>
                    <tr>
                        <td><b>Level ' . ($consulta->fields[3]) . '</b></td>
                    </tr>
                    <tr>
                        <td>'; if ($get_config->char_status == '1') {
                                echo '<div id="s_' . $count . '"><a class="label label-success lbl-fix" href="javascript:void(0)" onclick="get_data(\'s_' . $count . '\',\'#s_' . $count . '\', \'get.php?aG22=' . base64_encode($consulta->fields[10]) . '\', null, \'data=s_' . $count . '\');">Check Status</a></div>';
                            } echo '</td>
                    </tr>
                    </table></td>';

                    echo '<td><img src="template/' . $core['config']['template'] . '/images/class/' . decode_class($consulta->fields[2], '2') . '" width="45" height="45"></td>';

                    echo '<td><table class="tbl-rank">
                    <tr>
                        <td><span class="label label-success lbl-fix">Str: ';
                            if ($hide_stats == '1') {
                                echo '--';
                            } else {
                                echo number_format($consulta->fields[5]);
                            }
                            echo '</span></td>
                        <td><span class="label label-warning lbl-fix">Vit: ';
                            if ($hide_stats == '1') {
                                echo '--';
                            } else {
                                echo number_format($consulta->fields[7]);
                            }
                            echo '</span></td>
                    </tr>
                    <tr>
                        <td><span class="label label-success lbl-fix">Agi: ';
                            if ($hide_stats == '1') {
                                echo '--';
                            } else {
                                echo number_format($consulta->fields[6]);
                            }
                            echo '</span></td>
                        <td><span class="label label-warning lbl-fix">Eng: ';
                            if ($hide_stats == '1') {
                                echo '--';
                            } else {
                                echo number_format($consulta->fields[8]);
                            }
                            echo '</span></td>
                    </tr>
                    <tr>
                        <td>';
                            if ($get_config->location == '1') {
                                echo '<div id="m_' . $count . '"><a class="label label-danger lbl-fix" href="javascript:void(0)" onclick="get_data(\'m_' . $count . '\',\'#m_' . $count . '\', \'get.php?aM=' . $consulta->fields[0] . '\', null, \'data=m_' . $count . '\');">Location</a></div>';
                            }
                            echo '</td>
                        <td><span class="label label-warning lbl-fix">Com: ';
                            if ($hide_stats == '1') {
                                echo '--';
                            } else {
                                echo number_format($consulta->fields[9]);
                            }
                            echo '</span></td>
                    </tr>
                    </table></td>';

                    echo '<td><span class="label label-primary lbl-fix">Resets ' . ($consulta->fields[4]) . '</span> <sup><span class="label label-danger lbl-fix">GR ' . $consulta->fields[12] . '</sup></span</td>';
                    echo '</tr>';
                  }

              } else {
                if ($consulta->fields[9] == '0') {
                $count++;
                if($count > 0 and $count <4){
                        $numero_rank='<img src="AOH_Addons/images/ranking/rank'.$count.'.png">';
                    }else{
                        $numero_rank=$count;
                    }
                    echo '<tr>';
                    echo '<td class="rank_n">' . $numero_rank . '</td>';

                    echo '<td><table>
                    <tr>
                        <td class="iR_name">' . htmlspecialchars($consulta->fields[1]) . '</td>
                    </tr>
                    <tr>
                        <td>' . decode_class($consulta->fields[2]) . '</td>
                    </tr>
                    <tr>
                        <td><b>Level ' . ($consulta->fields[3]) . '</b></td>
                    </tr>
                    <tr>
                        <td>'; if ($get_config->char_status == '1') {
                                echo '<div id="s_' . $count . '"><a class="label label-success lbl-fix" href="javascript:void(0)" onclick="get_data(\'s_' . $count . '\',\'#s_' . $count . '\', \'get.php?aG22=' . base64_encode($consulta->fields[10]) . '\', null, \'data=s_' . $count . '\');">Check Status</a></div>';
                            } echo '</td>
                    </tr>
                    </table></td>';

                    echo '<td><img src="template/' . $core['config']['template'] . '/images/class/' . decode_class($consulta->fields[2], '2') . '" width="45" height="45"></td>';

                    echo '<td><table class="tbl-rank">
                    <tr>
                        <td><span class="label label-success lbl-fix">Str: ';
                            if ($hide_stats == '1') {
                                echo '--';
                            } else {
                                echo number_format($consulta->fields[5]);
                            }
                            echo '</span></td>
                        <td><span class="label label-warning lbl-fix">Vit: ';
                            if ($hide_stats == '1') {
                                echo '--';
                            } else {
                                echo number_format($consulta->fields[7]);
                            }
                            echo '</span></td>
                    </tr>
                    <tr>
                        <td><span class="label label-success lbl-fix">Agi: ';
                            if ($hide_stats == '1') {
                                echo '--';
                            } else {
                                echo number_format($consulta->fields[6]);
                            }
                            echo '</span></td>
                        <td><span class="label label-warning lbl-fix">Eng: ';
                            if ($hide_stats == '1') {
                                echo '--';
                            } else {
                                echo number_format($consulta->fields[8]);
                            }
                            echo '</span></td>
                    </tr>
                    <tr>
                        <td>';
                            if ($get_config->location == '1') {
                                echo '<div id="m_' . $count . '"><a class="label label-danger lbl-fix" href="javascript:void(0)" onclick="get_data(\'m_' . $count . '\',\'#m_' . $count . '\', \'get.php?aM=' . $consulta->fields[0] . '\', null, \'data=m_' . $count . '\');">Location</a></div>';
                            }
                            echo '</td>
                        <td><span class="label label-warning lbl-fix">Com: ';
                            if ($hide_stats == '1') {
                                echo '--';
                            } else {
                                echo number_format($consulta->fields[9]);
                            }
                            echo '</span></td>
                    </tr>
                    </table></td>';

                    echo '<td><span class="label label-primary lbl-fix">Resets ' . ($consulta->fields[4]) . '</span> <sup><span class="label label-danger lbl-fix">GR ' . $consulta->fields[12] . '</sup></span</td>';
                    echo '</tr>';
                            
                        }
                    }
                $consulta->MoveNext();
            }

echo '</tbody>
  </table>
</div>';



    	/* CONTADOR DE PAGINAS */
    echo '<ul class="pagination">';
    if(isset($_GET['class'])) {
    	$fixurl="&class=".$_GET['class']."";
    }else{
    	$fixurl="";
    }
    if ($total_paginas > 1) {
        if ($pagina != 1)
            echo '<li><a href="'.$core_run_script.'&rank='.$rank_type.''.$fixurl.'&pagina='.($pagina-1).'">&laquo;</a></li>';
        for ($i=1;$i<=$total_paginas;$i++) {
            if ($pagina == $i)
                //si muestro el �ndice de la p�gina actual, no coloco enlace
                echo '<li class="active"><a>'.$pagina.'</a></li>';
            else
                //si el �ndice no corresponde con la p�gina mostrada actualmente,
                //coloco el enlace para ir a esa p�gina
                echo '<li><a href="'.$core_run_script.'&rank='.$rank_type.''.$fixurl.'&pagina='.$i.'">'.$i.'</a></li>';
        }
        if ($pagina != $total_paginas)
            echo '<li><a href="'.$core_run_script.'&rank='.$rank_type.''.$fixurl.'&pagina='.($pagina+1).'">&raquo;</a></li>';
    }
    echo '</ul>';
}

}

if ($_GET['rank']=='guilds') {
$num_total_registros0 = $core_db->Execute("SELECT count(G_name) FROM Guild");
        $num_total_registros = $num_total_registros0->fields[0];
        
        //Si hay registros
        if ($num_total_registros > 0) {
        //Limito la busqueda
        $TAMANO_PAGINA = $get_config->guilds_top;
        $pagina = false;

        //examino la pagina a mostrar y el inicio del registro a mostrar
        if (isset($_GET["pagina"]))
            $pagina = $_GET["pagina"];
        
        if (!$pagina) {
        $inicio = 0;
        $pagina = 1;
        }
        else {
        $inicio = ($pagina - 1) * $TAMANO_PAGINA;
        }
    //calculo el total de paginas
    $total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);
    $consulta = $core_db->Execute("SELECT TOP $TAMANO_PAGINA G_name,G_Mark,G_Score,G_Master  FROM Guild  where Guild.G_name not in ( SELECT TOP $inicio G_name from Guild order by G_name asc ) order by Guild.G_Score desc ");
    if($_GET['pagina']=='1' or $_GET['pagina']==''){
            $count=0;
        }else{
            $count=$get_config->guilds_top*($_GET['pagina']-1);
        }
            //Inicio de Tabla
        echo '<br><div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Lista Guilds</h3>
  </div>
<table class="table table-striped table-fix">';
        echo '<thead>
    <tr>
      <th>#</th>
      <th>Guild</th>
      <th>Logo</th>
      <th>Info</th>
    </tr>
  </thead>
  <tbody>';
            while (!$consulta->EOF){
                $qry_n_m = $core_db->Execute("Select name from GuildMember where G_name=?", array($consulta->fields[0]));
                $count++;
                if($count > 0 and $count <4){
                        $numero_rank='<img src="AOH_Addons/images/ranking/rank'.$count.'.png">';
                    }else{
                        $numero_rank=$count;
                    }
                    echo '<tr>';
                    echo '<td class="rank_n">' . $numero_rank . '</td>';
                echo'<td><table>
                <tr>
                    <td class="iR_name" >'.$consulta->fields[0].'</td>
                </tr>
                <tr>
                    <td>Score: '.$consulta->fields[2].'</td>
                </tr>
                </td></table>

                <td><img src="get.php?aL='.urlencode(bin2hex($consulta->fields[1])).'" width="50" height="50"></td>

                <td><table>
                <tr>
                    <td>Guild Master: '.$consulta->fields[3].'</td>
                </tr>
                <tr>
                    <td>'.$qry_n_m->RecordCount().' members</td>
                </tr>
                </table></td>

                </tr>
                ';
                $consulta->MoveNext();
            }
            
echo '</tbody>
  </table>
</div>';

    /* CONTADOR DE PAGINAS */
    echo '<ul class="pagination">';
    if ($total_paginas > 1) {
        if ($pagina != 1)
            echo '<li><a href="'.$core_run_script.'&rank='.$rank_type.'&pagina='.($pagina-1).'">&laquo;</a></li>';
        for ($i=1;$i<=$total_paginas;$i++) {
            if ($pagina == $i)
                //si muestro el �ndice de la p�gina actual, no coloco enlace
                echo '<li class="active"><a>'.$pagina.'</a></li>';
            else
                //si el �ndice no corresponde con la p�gina mostrada actualmente,
                //coloco el enlace para ir a esa p�gina
                echo '<li><a href="'.$core_run_script.'&rank='.$rank_type.'&pagina='.$i.'">'.$i.'</a></li>';
        }
        if ($pagina != $total_paginas)
            echo '<li><a href="'.$core_run_script.'&rank='.$rank_type.'&pagina='.($pagina+1).'">&raquo;</a></li>';
    }
    echo '</ul>';

    }

    }

if ($_GET['rank']=='gens') {
$num_total_registros0 = $core_db->Execute("SELECT count(".AOH_Gens_Name_Column.") FROM ".AOH_Gens_Table."");
        $num_total_registros = $num_total_registros0->fields[0];
        
        //Si hay registros
        if ($num_total_registros > 0) {
        //Limito la busqueda
        $TAMANO_PAGINA = $get_config->char_top;
        $pagina = false;

        //examino la pagina a mostrar y el inicio del registro a mostrar
        if (isset($_GET["pagina"]))
            $pagina = $_GET["pagina"];
        
        if (!$pagina) {
        $inicio = 0;
        $pagina = 1;
        }
        else {
        $inicio = ($pagina - 1) * $TAMANO_PAGINA;
        }
    //calculo el total de paginas
    $total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);
    $consulta = $core_db->Execute("SELECT TOP $TAMANO_PAGINA ".AOH_Gens_Name_Column.",".AOH_Gens_Family_Column.",".AOH_Gens_Contribution_Column."  FROM ".AOH_Gens_Table."  where ".AOH_Gens_Table.".".AOH_Gens_Family_Column." > 0 and ".AOH_Gens_Table.".".AOH_Gens_Name_Column." not in ( SELECT TOP $inicio ".AOH_Gens_Name_Column." from ".AOH_Gens_Table." order by ".AOH_Gens_Name_Column." asc ) order by ".AOH_Gens_Table.".".AOH_Gens_Contribution_Column." desc ");
    //Fix Del Count
        if($_GET['pagina']=='1' or $_GET['pagina']==''){
            $count=0;
        }else{
            $count=$get_config->char_top*($_GET['pagina']-1);
        }
            //Inicio de Tabla
        echo '<br><div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Top Gens</h3>
  </div>
<table class="table table-striped table-fix">';
        echo '<thead>
    <tr>
      <th>#</th>
      <th>Personaje</th>
      <th>Raza</th>
      <th>Info</th>
    </tr>
  </thead>
  <tbody>';
            while (!$consulta->EOF){
                $qry_n_m = $core_db->Execute("Select Name,Class from Character where Name=?", array($consulta->fields[0]));
                $count++;
                if($count > 0 and $count <4){
                        $numero_rank='<img src="AOH_Addons/images/ranking/rank'.$count.'.png">';
                    }else{
                        $numero_rank=$count;
                    }
                    if($consulta->fields[1] < 1){
                        $img_gens='';
                    }else{
                        $img_gens='<img src="AOH_Addons/images/ranking/gens'.$consulta->fields[1].'.png" width="45" height="45">';
                    }

                    if($consulta->fields[1]==1){
                        $nombre_gens='Drupian';
                    }else{
                        $nombre_gens='Vanert';
                    }
                    echo '<tr>';
                    echo '<td class="rank_n">' . $numero_rank . '</td>';
                echo'<td><table>
                <tr>
                    <td class="iR_name" >'.$consulta->fields[0].'</td>
                </tr>
                <tr>
                    <td>' . decode_class($qry_n_m->fields[1]) . '</td>
                </tr>
                </td></table>

                <td><img src="template/' . $core['config']['template'] . '/images/class/' . decode_class($qry_n_m->fields[1], '2') . '" width="45" height="45"></td>

                <td><table>
                <tr>
                    <td rowspan="2">'.$img_gens.'</td>
                    <td>Contribution: '.$consulta->fields[2].'</td>
                </tr>
                <tr>
                    <td>'.$nombre_gens.'</td>
                </tr>
                </table></td>

                </tr>
                ';
                $consulta->MoveNext();
            }
            
echo '</tbody>
  </table>
</div>';

    /* CONTADOR DE PAGINAS */
    echo '<ul class="pagination">';
    if ($total_paginas > 1) {
        if ($pagina != 1)
            echo '<li><a href="'.$core_run_script.'&rank='.$rank_type.'&pagina='.($pagina-1).'">&laquo;</a></li>';
        for ($i=1;$i<=$total_paginas;$i++) {
            if ($pagina == $i)
                //si muestro el �ndice de la p�gina actual, no coloco enlace
                echo '<li class="active"><a>'.$pagina.'</a></li>';
            else
                //si el �ndice no corresponde con la p�gina mostrada actualmente,
                //coloco el enlace para ir a esa p�gina
                echo '<li><a href="'.$core_run_script.'&rank='.$rank_type.'&pagina='.$i.'">'.$i.'</a></li>';
        }
        if ($pagina != $total_paginas)
            echo '<li><a href="'.$core_run_script.'&rank='.$rank_type.'&pagina='.($pagina+1).'">&raquo;</a></li>';
    }
    echo '</ul>';

    }

    }


if ($_GET['rank']=='horas') {
$num_total_registros0 = $core_db->Execute("SELECT count(memb___id) FROM MEMB_STAT");
        $num_total_registros = $num_total_registros0->fields[0];
        
        //Si hay registros
        if ($num_total_registros > 0) {
        //Limito la busqueda
        $TAMANO_PAGINA = $get_config->char_top;
        $pagina = false;

        //examino la pagina a mostrar y el inicio del registro a mostrar
        if (isset($_GET["pagina"]))
            $pagina = $_GET["pagina"];
        
        if (!$pagina) {
        $inicio = 0;
        $pagina = 1;
        }
        else {
        $inicio = ($pagina - 1) * $TAMANO_PAGINA;
        }
    //calculo el total de paginas
    $total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);
    $consulta = $core_db->Execute("SELECT TOP $TAMANO_PAGINA memb___id,ConnectStat,ServerName,ConnectTM,OnlineHours  FROM MEMB_STAT  where MEMB_STAT.OnlineHours > 0 and MEMB_STAT.memb___id not in ( SELECT TOP $inicio memb___id from MEMB_STAT order by OnlineHours desc ) order by MEMB_STAT.OnlineHours desc ");
    //Fix Del Count
        if($_GET['pagina']=='1' or $_GET['pagina']==''){
            $count=0;
        }else{
            $count=$get_config->char_top*($_GET['pagina']-1);
        }
            //Inicio de Tabla
        echo '<br><div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Top Horas Online</h3>
  </div>
<table class="table table-striped table-fix">';
        echo '<thead>
    <tr>
      <th>#</th>
      <th>Usuario</th>
      <th>Servidor</th>
      <th>Ultima Coneccion</th>
      <th>Horas Online</th>
    </tr>
  </thead>
  <tbody>';
            while (!$consulta->EOF){
            $consulta_npj = $core_db->Execute("SELECT GameIDC from AccountCharacter WHERE Id='".$consulta->fields[0]."'");
            if ($consulta_npj->fields[0] != ''){


                $count++;
                if($count > 0 and $count <4){
                        $numero_rank='<img src="AOH_Addons/images/ranking/rank'.$count.'.png">';
                    }else{
                        $numero_rank=$count;
                    }
                    if($consulta->fields[1] < 1){
                        $on_state='<span class="label label-success lbl-fix">Online </span>';
                    }else{
                        $on_state='<span class="label label-danger lbl-fix">Offline </span>';
                    }

                    echo '<tr>';
                    echo '<td class="rank_n">' . $numero_rank . '</td>';
                echo'<td><table>
                <tr>
                    <td class="iR_name" >'.$consulta_npj->fields[0].'</td>
                </tr>
                <tr>
                    <td>'.$on_state.'</td>
                </tr>
                </td></table>

                <td>'.$consulta->fields[2].'</td>
                <td>'.$consulta->fields[3].'</td>
                <td>'.$consulta->fields[4].'</td>

                </tr>
                ';
                }
                $consulta->MoveNext();
            }
            
echo '</tbody>
  </table>
</div>';

    /* CONTADOR DE PAGINAS */
    echo '<ul class="pagination">';
    if ($total_paginas > 1) {
        if ($pagina != 1)
            echo '<li><a href="'.$core_run_script.'&rank='.$rank_type.'&pagina='.($pagina-1).'">&laquo;</a></li>';
        for ($i=1;$i<=$total_paginas;$i++) {
            if ($pagina == $i)
                //si muestro el �ndice de la p�gina actual, no coloco enlace
                echo '<li class="active"><a>'.$pagina.'</a></li>';
            else
                //si el �ndice no corresponde con la p�gina mostrada actualmente,
                //coloco el enlace para ir a esa p�gina
                echo '<li><a href="'.$core_run_script.'&rank='.$rank_type.'&pagina='.$i.'">'.$i.'</a></li>';
        }
        if ($pagina != $total_paginas)
            echo '<li><a href="'.$core_run_script.'&rank='.$rank_type.'&pagina='.($pagina+1).'">&raquo;</a></li>';
    }
    echo '</ul>';

    }

    }


if ($_GET['rank']=='online') {
$num_total_registros0 = $core_db->Execute("SELECT count(memb___id) FROM MEMB_STAT where ConnectStat = 1");
        $num_total_registros = $num_total_registros0->fields[0];
        
        //Si hay registros
        if ($num_total_registros > 0) {
        //Limito la busqueda
        $TAMANO_PAGINA = $get_config->char_top;
        $pagina = false;

        //examino la pagina a mostrar y el inicio del registro a mostrar
        if (isset($_GET["pagina"]))
            $pagina = $_GET["pagina"];
        
        if (!$pagina) {
        $inicio = 0;
        $pagina = 1;
        }
        else {
        $inicio = ($pagina - 1) * $TAMANO_PAGINA;
        }
    //calculo el total de paginas
    $total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);
    $consulta = $core_db->Execute("SELECT TOP $TAMANO_PAGINA memb___id,ConnectStat,ServerName  FROM MEMB_STAT  where MEMB_STAT.ConnectStat = 1 and MEMB_STAT.memb___id not in ( SELECT TOP $inicio memb___id from MEMB_STAT WHERE ConnectStat = 1 order by memb___id desc ) order by MEMB_STAT.memb___id desc ");
    //Fix Del Count
        if($_GET['pagina']=='1' or $_GET['pagina']==''){
            $count=0;
        }else{
            $count=$get_config->char_top*($_GET['pagina']-1);
        }
            //Inicio de Tabla
        echo '<br><div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Usuarios Online</h3>
  </div>
<table class="table table-striped table-fix">';
        echo '<thead>
    <tr>
      <th>#</th>
      <th>Personaje</th>
      <th>Raza</th>
      <th>Servidor</th>
    </tr>
  </thead>
  <tbody>';
            while (!$consulta->EOF){
                $sq_pj0 = $core_db->Execute("Select GameIDC from AccountCharacter where Id=?", array($consulta->fields[0]));
                $sq_pj1 = $core_db->Execute("Select Name,Class,mapnumber from Character where Name=?", array($sq_pj0->fields[0]));
                $count++;
                if($count > 0 and $count <4){
                        $numero_rank='<img src="AOH_Addons/images/ranking/rank'.$count.'.png">';
                    }else{
                        $numero_rank=$count;
                    }

                    echo '<tr>';
                    echo '<td class="rank_n">' . $numero_rank . '</td>';
                echo'<td><table>
                <tr>
                    <td class="iR_name" >'.$sq_pj0->fields[0].'</td>
                </tr>
                <tr>
                    <td>' . decode_class($sq_pj1->fields[1]) . '</td>
                </tr>
                </td></table>

                <td><img src="template/' . $core['config']['template'] . '/images/class/' . decode_class($sq_pj1->fields[1], '2') . '" width="45" height="45"></td>
                
                <td><table>
                <tr>
                <td>'.$consulta->fields[2].'</td>
                </tr>
                <tr>
                <td>Location: '.decode_map($sq_pj1->fields[2]).'</td>
                </tr>
                </td></table>

                </tr>
                ';
                $consulta->MoveNext();
            }
            
echo '</tbody>
  </table>
</div>';

    /* CONTADOR DE PAGINAS */
    echo '<ul class="pagination">';
    if ($total_paginas > 1) {
        if ($pagina != 1)
            echo '<li><a href="'.$core_run_script.'&rank='.$rank_type.'&pagina='.($pagina-1).'">&laquo;</a></li>';
        for ($i=1;$i<=$total_paginas;$i++) {
            if ($pagina == $i)
                //si muestro el �ndice de la p�gina actual, no coloco enlace
                echo '<li class="active"><a>'.$pagina.'</a></li>';
            else
                //si el �ndice no corresponde con la p�gina mostrada actualmente,
                //coloco el enlace para ir a esa p�gina
                echo '<li><a href="'.$core_run_script.'&rank='.$rank_type.'&pagina='.$i.'">'.$i.'</a></li>';
        }
        if ($pagina != $total_paginas)
            echo '<li><a href="'.$core_run_script.'&rank='.$rank_type.'&pagina='.($pagina+1).'">&raquo;</a></li>';
    }
    echo '</ul>';

    }

    }

//Final de Active
}
?>