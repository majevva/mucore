<?
$load_config = simplexml_load_file('engine/config_mods/aoh_castle_siege.xml');
?>
<?
$SiegeInfo = $core_db->Execute("SELECT OWNER_GUILD,MONEY,TAX_RATE_CHAOS,TAX_RATE_STORE,TAX_HUNT_ZONE,SIEGE_START_DATE,SIEGE_END_DATE FROM MuCastle_DATA");
			$GuilDuenio = $SiegeInfo->fields[0];
			$Money = $SiegeInfo->fields[1];
			$Chaos = $SiegeInfo->fields[2];
			$Store = $SiegeInfo->fields[3];
			$Hunt = $SiegeInfo->fields[4];
			
$GuildInfo = $core_db->Execute("SELECT G_Master,G_Mark,G_Score,G_Name FROM Guild WHERE G_Name = (SELECT OWNER_GUILD FROM MuCastle_DATA)"); 
			$MasterGuild = $GuildInfo->fields[0]; 
			$LogoGuild = urlencode(bin2hex($GuildInfo->fields[1]));
			$ScoreGuild = $GuildInfo->fields[2]; 
			
$MasterInfo = $core_db->Execute("SELECT ".AOH_Resets_column.",cLevel,AccountID FROM Character WHERE Name='".$MasterGuild."'"); 
			$ResetsMaster = $MasterInfo->fields[0];
			$LevelMaster = $MasterInfo->fields[1];
			$AccountMaster = $MasterInfo->fields[2];

			
$PaisMasterInfo = $core_db2->Execute("SELECT country,memb___id FROM MEMB_INFO WHERE memb___id='".$AccountMaster."'"); 
			$PaisG1 = $PaisMasterInfo->fields[0];
				require("CastleSiege/flags.php");
				
$AsistenteGuildInfo = $core_db->Execute("SELECT Name FROM GuildMember WHERE G_Name = (SELECT OWNER_GUILD FROM MuCastle_DATA) AND G_Status = '64'"); 
			$AsistenteGuild = $AsistenteGuildInfo->fields[0];
			
			if($GuilDueño == ''){ $GuilDueño = '<Font Color="#DF0101"> Nadie </Font>'; }
			if($MasterGuild == ''){ $MasterGuild = '<Font Color="#DF0101"> Nadie </Font>'; }
			if($LevelMaster == ''){ $LevelMaster = '<Font Color="#DF0101"> Ninguno </Font>'; }
			if($ResetsMaster == ''){ $ResetsMaster = '<Font Color="#DF0101"> Ninguno </Font>'; }
			if($PaisG1 == ''){ $PaisG1 = '<Font Color="#DF0101"> Ninguno </Font>'; }
			if($ScoreGuild == ''){ $ScoreGuild = '<Font Color="#DF0101"> Ninguno </Font>'; }
			if($AsistenteGuild == ''){ $AsistenteGuild = '<Font Color="#DF0101"> N/A </Font>'; }
			if($Batallador == ''){ $Batallador = '<Font Color="#DF0101"> N/A </Font>'; }
?>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Propietario del Castillo</h3>
  </div>
<div class="row show-grid">
    <div class="col-md-4 text-center"><img src="AOH_Addons/images/castle/npc-1.png"/></div>
    <div class="col-md-4">
  <table class="table table-bordered table-aoh">
  <tbody>
    <tr>
      <td class="tbtl">Due&ntilde;os del Castillo:</td>
      <td><?=$GuilDuenio?></td>
    </tr>
    <tr>
      <td class="tbtl">Master:</td>
      <td><?=$MasterGuild?></td>
    </tr>
    <tr>
      <td class="tbtl">Nivel:</td>
      <td><?=$LevelMaster?></td>
    </tr>
    <tr>
      <td class="tbtl">Reset:</td>
      <td><?=$ResetsMaster?></td>
    </tr>
    <tr>
      <td colspan="2"><img src="AOH_Addons/fix/logo.php?decode=<?=$LogoGuild;?>.png" alt="" width="40" height="40" /></td>
    </tr>
    <tr>
      <td class="tbtl">Score:</td>
      <td><?=$ScoreGuild?></td>
    </tr>
                  <?
$row=$core_db->Execute("select TOP 3 Name from GuildMember WHERE G_Name = (SELECT OWNER_GUILD FROM MuCastle_DATA) AND G_Status = '32'");
while (!$row->EOF){
$Batallador=$row->fields[0];
?>
                  <tr>
                    <td class="tbtl">Batallador <?=++$countBTM;?>:</td>
                    <td><?=$Batallador?></td>
                  </tr>
<? 
$row->MoveNext();
} ?>
  </tbody>
  </table>
    </div>
    <div class="col-md-4 text-center"><img src="AOH_Addons/images/castle/npc-2.png" /></div>
  </div>
</div>


<!--Alianzas-->
<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">Alianzas</h3>
  </div>
<table class="table table-fix">
<thead>
        <tr>
          <th>#</th>
          <th>Alianza</th>
          <th>Master</th>
          <th>Asistence</th>
          <th>Score</th>
          <th>Logo</th>
        </tr>
    </thead>
  <tbody>
<?
				  
$AlianzasInfo = $core_db->Execute("select Number,G_Name FROM Guild WHERE G_Name= (SELECT OWNER_GUILD FROM MuCastle_DATA)"); 
			$Union = $AlianzasInfo->fields[0];
			
$row=$core_db->Execute("select TOP 4 G_Name,G_Master,G_Score,G_Mark from Guild WHERE G_Union= (SELECT Number FROM Guild WHERE G_Name= (SELECT OWNER_GUILD FROM MuCastle_DATA))");
while (!$row->EOF){
$Alianzas=$row->fields[0];
$Master=$row->fields[1];
$Score=$row->fields[2];
$Logo=urlencode(bin2hex($row->fields[3]));

$AsistenteInfo = $core_db->Execute("SELECT Name FROM GuildMember WHERE G_Name ='".$Alianzas."' AND G_Status = '64'"); 
			$Asistente = $AsistenteInfo->fields[0];
			
$CharacterInfo = $core_db->Execute("SELECT AccountID,Name FROM Character WHERE Name='".$Master."'"); 
			$Account = $CharacterInfo->fields[0];
			
$CountryInfo = $core_db2->Execute("SELECT country,memb___id FROM MEMB_INFO WHERE memb___id='".$Account."'"); 
			$PaisG2 = $CountryInfo->fields[0];
			require("CastleSiege/flags.php");
			
			if($Asistente == ''){ $Asistente = ' N/A '; }


?>
                  <tr>
                    <td><?=++$countAli;?></td>
                    <td><?=$Alianzas?></td>
                    <td><?=$Master?></td>
                    <td><?=$Asistente?></td>
                    <td><?=$Score?></td>
                    <td><img src="AOH_Addons/fix/logo.php?decode=<?=$Logo;?>.png" alt="" width="20" height="20" /></td>
                  </tr>
<? 
$row->MoveNext();
} ?>
  </tbody>
  </table>
</div>


<!--Impuestos-->
<div class="panel panel-warning">
  <div class="panel-heading">
    <h3 class="panel-title">Impuestos</h3>
  </div>
<table class="table table-fix">
  <tbody>
<tr>
                    <td class="tbtl">Dinero del Castillo:</td>
                    <td ><?=$load_config->Dinero;?> de Zen</td>
                  </tr>
                  <tr>
                    <td class="tbtl">Impuesto de la Maquina de Combinaciones:</td>
                    <td ><?=$load_config->Maquina;?> %</td>
                  </tr>
                  <tr>
                    <td class="tbtl">Impuesto en las Tiendas:</td>
                    <td ><?=$load_config->Tiendas;?> %</td>
                  </tr>
                  <tr>
                    <td class="tbtl">Impuesto para ingresar a Land of Trial:</td>
                    <td ><?=$load_config->Impuesto;?> de Zen</td>
                  </tr>
  </tbody>
  </table>
</div>


<!--Registrados-->
<div class="panel panel-success">
  <div class="panel-heading">
    <h3 class="panel-title">Clanes Registrados para la Batalla</h3>
  </div>
<table class="table table-fix">
<thead>
<tr>
  <th>#</th>
  <th>Clan</th>
  <th>Master</th>
  <th>Score</th>
  <th>Sign Of Lord</th>
  <th>Logo</th>
</tr>
</thead>
  <tbody>
           <?
$row=$core_db->Execute("select TOP 50 REG_SIEGE_GUILD,REG_MARKS from MuCastle_REG_SIEGE");

while (!$row->EOF){
$Registrados=$row->fields[0];
$Marks=$row->fields[1];

$GuildReg = $core_db->Execute("SELECT G_Master,G_Score,G_Mark,G_Name FROM Guild WHERE G_Name='".$Registrados."'"); 
			$MasterReg = $GuildReg->fields[0];
			$ScoreReg = $GuildReg->fields[1];
			$LogoReg = urlencode(bin2hex($GuildReg->fields[2]));
			$GuildReg = $GuildReg->fields[3];
			
$PeronsajeInfo = $core_db->Execute("SELECT AccountID,Name FROM Character WHERE Name='".$MasterReg."'"); 
			$AccountReg = $PeronsajeInfo->fields[0];
			
$CountryRegInfo = $core_db2->Execute("SELECT country,memb___id FROM MEMB_INFO WHERE memb___id='".$AccountReg."'"); 
			$PaisG3 = $CountryRegInfo->fields[0];
			require("CastleSiege/flags.php");
?>
     <tr>
     <td><?=++$countReg;?></td>
    <td><?=$Registrados?></td>
    <td><?=$MasterReg?></td>
    <td><?=$ScoreReg?></td>
    <td><?=$Marks?></td>
    <td><img src="AOH_Addons/fix/logo.php?decode=<?=$LogoReg;?>.png" alt="" width="20" height="20" /></td>
    </tr>
<? 
$row->MoveNext();
} ?>
</tbody>
  </table>
</div>           


<!--Periodos-->
<div class="panel panel-danger">
  <div class="panel-heading">
    <h3 class="panel-title">Horarios y Periodos</h3>
  </div>
<table class="table table-fix">
<thead>
<tr>
  <th>Dia</th>
  <th>Hora</th>
  <th>Periodo</th>
</tr>
</thead>
  <tbody>
				  <tr>
	                <td><?=$load_config->periodo_01_dia;?></td>
                    <td><?=$load_config->periodo_01_hora;?> Hs</td>
                    <td>Registro de Clanes (Inicio)</td>
				  </tr>
				  <tr>
	                <td><?=$load_config->periodo_02_dia;?></td>
                    <td><?=$load_config->periodo_02_hora;?>  Hs</td>
                    <td>Registro de Clanes (Fin)</td>
				  </tr>
				   <tr>
	                <td><?=$load_config->periodo_03_dia;?></td>
                    <td><?=$load_config->periodo_03_hora;?>  Hs</td>
                    <td>Registro de Sign Of Lords (Inicio)</td>
				  </tr>
				  <tr>
	                <td><?=$load_config->periodo_04_dia;?></td>
                    <td><?=$load_config->periodo_04_hora;?>  Hs</td>
                    <td>Registro de Sign Of Lords (Fin)</td>
				  </tr>
				  <tr>
	                <td><?=$load_config->periodo_05_dia;?></td>
                    <td><?=$load_config->periodo_05_hora;?>  Hs</td>
                    <td>Notificacion de Clanes</td>
				  </tr>
				  <tr>
	                <td><?=$load_config->periodo_06_dia;?></td>
                    <td><?=$load_config->periodo_06_hora;?>  Hs</td>
                    <td>Preparacion de la Zona de Batalla</td>
				  </tr>
				  <tr>
	                <td><?=$load_config->periodo_07_dia;?></td>
                    <td><?=$load_config->periodo_07_hora;?>  Hs</td>
                    <td>Inicio de la Batalla</td>
				  </tr>
				  <tr>
	                <td><?=$load_config->periodo_08_dia;?></td>
                    <td><?=$load_config->periodo_08_hora;?>  Hs</td>
                    <td>Fin de la Batalla</td>
				  </tr>	 
</tbody>
  </table>
</div>    