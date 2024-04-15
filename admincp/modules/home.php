<?
$sql_cuentas = $core_db->Execute("SELECT count(memb___id) FROM MEMB_INFO");
$cuentas = $sql_cuentas->fields[0];
$sql_personajes = $core_db->Execute("SELECT count(Name) FROM Character");
$personajes = $sql_personajes->fields[0];
$online_characters =  $core_db->Execute("SELECT count(*) FROM memb_stat WHERE connectstat = 1");
$online_characters_done = $online_characters->fields[0];
$sql_guild = $core_db->Execute("SELECT count(*) FROM Guild");
$guild = $sql_guild->fields[0];
?>
<div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?=$cuentas;?></h3>

              <p>Cuentas registradas</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?=$personajes;?></h3>

              <p>Personajes Creados</p>
            </div>
            <div class="icon">
              <i class="fa fa-child"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?=$online_characters_done[0]?></h3>

              <p>Usuarios Online</p>
            </div>
            <div class="icon">
              <i class="fa fa-globe"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?=$guild?></h3>

              <p>Guilds Creados</p>
            </div>
            <div class="icon">
              <i class="fa fa-star-o"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>

  <!--base estadisticas-->
  <div class="row">
  <!--IZQUIERDA-->
  <section class="col-lg-7 connectedSortable ui-sortable">
  <!-- Calendar -->
          <div class="box box-solid bg-green-gradient">
            <div class="box-header">
              <i class="fa fa-calendar"></i>

              <h3 class="box-title">Calendario - <? echo date("d-M-Y")?></h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <!-- button with a dropdown -->
                <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                </button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <!--The calendar -->
              <div id="calendar" style="width: 100%"></div>
            </div>
            <!-- /.box-body -->
          </div>
  </section>
  <!--DERECHA -->
  <section class="col-lg-5 connectedSortable ui-sortable">
  <!-- TO DO List -->
          <div class="box box-primary">
            <div class="box-header">
              <i class="ion ion-clipboard"></i>

              <h3 class="box-title">Informacion</h3>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="todo-list">
                <li>
                  <!-- drag handle -->
                      <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                  <!-- todo text -->
                  <span class="text">Version Actual</span>
                  <!-- Emphasis label -->
                  <small class="label label-danger" style="font-size: 13px;"> <?=$core['version'] ?></small>
                  <!-- General tools such as edit or delete-->
                  <div class="tools">
                    <i class="fa fa-edit"></i>
                    <i class="fa fa-trash-o"></i>
                  </div>
                </li>
                <li>
                      <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                  <span class="text">Licencia</span>
                  <small class="label label-success" style="font-size: 13px;"> RIP 04/05/2018</small>
                  <div class="tools">
                    <i class="fa fa-edit"></i>
                    <i class="fa fa-trash-o"></i>
                  </div>
                </li>
                <li>
                      <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                  <span class="text">Creditos</span>
                  <small class="label label-info" style="font-size: 13px;"> Arnold</small>
                  <div class="tools">
                    <i class="fa fa-edit"></i>
                    <i class="fa fa-trash-o"></i>
                  </div>
                </li>


              </ul>
            </div>
            <!-- /.box-body -->
          </div>
  </section>
  </div>