<?
//FUNCIONES PANEL DE ADMINISTRACION
function SaveVar($Archivo,$Variable,$DatoNuevo) {
$valdd=$DatoNuevo;
$ArchivoNuevo="system/engine_configs/".$Archivo;
$variable_a_modificar= "\$mvcore['$Variable']"; //Cargando nombre de variable
$nuevo_contenido= "\"$valdd\";"; //Cargamdo valor de variable
$file= file ($ArchivoNuevo); 
for ($i=0;$i<count($file);$i++){ 
$dato= explode (" = ", $file[$i]); 
$nombre_variable= $dato[0]; 
$contenido_variable= $dato[1]; 
if ($nombre_variable==$variable_a_modificar){ 
$file[$i]= "$nombre_variable = $nuevo_contenido\n"; 
$fl= fopen ($ArchivoNuevo, "w"); 
for ($i=0;$i<count($file);$i++){ 
fwrite ($fl, $file[$i]); 
} 
fclose ($fl); 
} 
} 
echo'<script>$.jGrowl("Settings successfully saved.", { header: "<font color=green>Success</font>" });</script>';
}

function SaveVarRoot($Archivo,$Variable,$DatoNuevo) {
$valdd=$DatoNuevo;
$ArchivoNuevo=$Archivo;
$variable_a_modificar= "\$$Variable"; //Cargando nombre de variable
$nuevo_contenido= "\"$valdd\";"; //Cargamdo valor de variable
$file= file ($ArchivoNuevo); 
for ($i=0;$i<count($file);$i++){ 
$dato= explode (" = ", $file[$i]); 
$nombre_variable= $dato[0]; 
$contenido_variable= $dato[1]; 
if ($nombre_variable==$variable_a_modificar){ 
$file[$i]= "$nombre_variable = $nuevo_contenido\n"; 
$fl= fopen ($ArchivoNuevo, "w"); 
for ($i=0;$i<count($file);$i++){ 
fwrite ($fl, $file[$i]); 
} 
fclose ($fl); 
} 
} 
echo'<script>$.jGrowl("Settings successfully saved.", { header: "<font color=green>Success</font>" });</script>';
}

function SaveVarTrueFalse($Archivo,$Variable,$DatoNuevo) {
if ($DatoNuevo==="true") { $valdd='1'; } else { $valdd='0'; }
$ArchivoNuevo="system/engine_configs/".$Archivo;
$variable_a_modificar= "\$mvcore['$Variable']"; //Cargando nombre de variable
$nuevo_contenido= "\"$valdd\";"; //Cargamdo valor de variable
$file= file ($ArchivoNuevo); 
for ($i=0;$i<count($file);$i++){ 
$dato= explode (" = ", $file[$i]); 
$nombre_variable= $dato[0]; 
$contenido_variable= $dato[1]; 
if ($nombre_variable==$variable_a_modificar){ 
$file[$i]= "$nombre_variable = $nuevo_contenido\n"; 
$fl= fopen ($ArchivoNuevo, "w"); 
for ($i=0;$i<count($file);$i++){ 
fwrite ($fl, $file[$i]); 
} 
fclose ($fl); 
} 
} 
echo'<script>$.jGrowl("Settings successfully saved.", { header: "<font color=green>Success</font>" });</script>';
}

function SaveVarOnOff($Archivo,$Variable,$DatoNuevo) {
if ($DatoNuevo==="true") { $valdd='on'; } else { $valdd='off'; }
$ArchivoNuevo="system/engine_configs/".$Archivo;
$variable_a_modificar= "\$mvcore['$Variable']"; //Cargando nombre de variable
$nuevo_contenido= "\"$valdd\";"; //Cargamdo valor de variable
$file= file ($ArchivoNuevo); 
for ($i=0;$i<count($file);$i++){ 
$dato= explode (" = ", $file[$i]); 
$nombre_variable= $dato[0]; 
$contenido_variable= $dato[1]; 
if ($nombre_variable==$variable_a_modificar){ 
$file[$i]= "$nombre_variable = $nuevo_contenido\n"; 
$fl= fopen ($ArchivoNuevo, "w"); 
for ($i=0;$i<count($file);$i++){ 
fwrite ($fl, $file[$i]); 
} 
fclose ($fl); 
} 
} 
echo'<script>$.jGrowl("Settings successfully saved.", { header: "<font color=green>Success</font>" });</script>';
}


$tipoDato=$_POST['d'];
$Archivo0=$_POST['e'];
$Variable0=$_POST['f'];
$DatoNuevo0=$_POST['g'];
if($tipoDato=='ip') echo $tipoDato;
elseif($tipoDato=="upd") SaveVar($Archivo0,$Variable0,$DatoNuevo0);
elseif($tipoDato=="updroot") SaveVarRoot($Archivo0,$Variable0,$DatoNuevo0);
elseif($tipoDato=="updtf") SaveVarTrueFalse($Archivo0,$Variable0,$DatoNuevo0);
elseif($tipoDato=="updonoff") SaveVarOnOff($Archivo0,$Variable0,$DatoNuevo0);
?>