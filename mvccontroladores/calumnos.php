<?php
 if($_POST['operacion2']!="")
 {
 require_once("../mvcmodelos/malumnos.php");

 if($_POST['operacion2']=="seleccionar")
 {
 $objDatos=new clasealumnos("");
 $datosobtenidos=$objDatos->seleccionar_alumnos();

 $delante="<p>";
 $detras="</p>";

 $i=1;
 $z=count($datosobtenidos);

 $cadena="";

 for($i=1;$i<=$z;$i++)
 {
 $cadena.="
 <tr>
 <td>".$datosobtenidos[$i]['codigoalumno']."</td>
 <td>".$datosobtenidos[$i]['nombrealumno']."</td>
 <td>".$datosobtenidos[$i]['apellidosalumno']."</td>
 <td>".$datosobtenidos[$i]['dnialumno']."</td>
 <td>".$datosobtenidos[$i]['direccionalumno']."</td>
 </tr>";
 }

 if($z>0)
 {
 $cadena="<table border='1' cellspacing='0' width='100%'>

 <thead><tr><td>Cod.</td><td>Nombre</td><td>Apellidos</td><td>DNI</td><td>Direcc.</td>
</tr></thead>

 <tfoot><tr><td>Cod.</td><td>Nombre</td><td>Apellidos</td><td>DNI</td><td>Direcc.</td>
</tr></tfoot>

<tbody>".$cadena."</tbody></table>";

$cadena.="<input type='hidden' name='hayregistros' id='hayregistrosid' value=1>";
 }
 else
 {
 $cadena="<b>No se han encontrado Registros.</b>";
$cadena.="<input type='hidden' name='hayregistros' id='hayregistrosid'
value=0>";
 }

 $cadena=utf8_encode($delante.$cadena.$detras);
 print($cadena);
 }


 if($_POST['operacion2']=="insertar")
 {
 $objDatos=new clasealumnos(""); 
$resultado=$objDatos->insertar_alumno(utf8_decode($_POST['nombre2']),
utf8_decode($_POST['apellidos2']),utf8_decode($_POST['dni2']),
utf8_decode($_POST['direccion2']));

 $delante="<p>";
 $detras="</p>";

 if($resultado==1) //Se grabó correctamente el registro
 {
 $cadena=$delante."Datos grabados correctamente.".$detras;
$cadena.="<input type='hidden' value='1' name='datoinserta'
id='datoinsertaid'>";
 }
 else
 {
$cadena=$delante."No se han podido insertar los datos en la Base de
datos.<br><br>";
 $cadena.=utf8_encode($resultado).$detras;
$cadena.="<input type='text' value='0' name='datoinserta'
id='datoinsertaid'>";
 }
 print($cadena);
 }









 if($_POST['operacion2']=="insertar2")
 {
 $objDatos=new clasealumnos(""); 
$resultado=$objDatos->actualizar_alumno(utf8_decode($_POST['codigo2']), utf8_decode($_POST['nombre2']),
utf8_decode($_POST['apellidos2']),utf8_decode($_POST['dni2']),
utf8_decode($_POST['direccion2']));

 $delante="<p>";
 $detras="</p>";

 if($resultado==1) //Se grabó correctamente el registro
 {
 $cadena=$delante."Datos grabados correctamente.".$detras;
$cadena.="<input type='hidden' value='1' name='datoinserta'
id='datoinsertaid'>";
 }
 else
 {
$cadena=$delante."No se han podido insertar los datos en la Base de
datos.<br><br>";
 $cadena.=utf8_encode($resultado).$detras;
$cadena.="<input type='text' value='0' name='datoinserta'
id='datoinsertaid'>";
 }
 print($cadena);
 }



































 if($_POST['operacion2']=="actualizar")
 {
  $objDatos=new clasealumnos("");
 $datosobtenidos=$objDatos->seleccionar_alumnos_codigo(utf8_decode($_POST['codigo2']));

 $delante="<p>";
 $detras="</p>";

 $i=1;
 $z=count($datosobtenidos);

 $cadena="";

 for($i=1;$i<=$z;$i++)
 {
 $cadena=sprintf("
 	<table>
<tr><td>Codigo: </td><td><input type='text' name='codigo' id='codigoid' value='%s' size='15'
maxlength='15' disabled></td></tr>


<tr><td>Nombre: </td><td><input type='text' name='nombre' id='nombreid' value='%s' size='15'
maxlength='15'></td></tr>

<tr><td>Apellidos: </td><td><input type='text' name='apellidos' id='apellidosid' value='%s' size='30'
maxlength='30'></td></tr>

<tr><td>DNI: </td><td><input type='text' name='dni' id='dniid' value='%s' size='14'
maxlength='14'></td></tr> 
<tr><td>Direccion: </td><td><input type='text' name='direccion' id='direccionid' value='%s' size='30'
maxlength='60'></td></tr>
</table><br>
<input type='button' value='Actualizar' name='insertalosboton' id='actualizaseleccionbotonid' value='ACTUALIZAR'
onclick='actualizalosdatoscopiados()'/>


 ",$datosobtenidos[$i]['codigoalumno'],$datosobtenidos[$i]['nombrealumno'],$datosobtenidos[$i]['apellidosalumno'],$datosobtenidos[$i]['dnialumno'],$datosobtenidos[$i]['direccionalumno']);
 }

 if($z<=0)
 {

 
 $cadena="<b>No se han encontrado Registros.</b>";
$cadena.="<input type='hidden' name='hayregistros' id='hayregistrosid'
value=0>";
 }

 $cadena=utf8_encode($delante.$cadena.$detras);
 print($cadena);
 }




























 if($_POST['operacion2']=="eliminar")
 {
 $objDatos=new clasealumnos(""); 
 $mialumno=$objDatos->seleccionar_alumnos_codigo(utf8_decode($_POST['codigo2']));
$objDatos->eliminar_alumno(utf8_decode($_POST['codigo2']));

if (!empty($mialumno)) {
	$resultado=1;
} else {
	$resultado=0;
}


 $delante="<p>";
 $detras="</p>";

 if($resultado==1) //Se grabó correctamente el registro
 {
 $cadena=$delante."Datos eliminados correctamente.".$detras;
$cadena.="<input type='hidden' value='1' name='datoinserta'
id='datoinsertaid'>";
 }
 else
 {
$cadena=$delante."No se ha podido realizar el borrado.<br><br>";
 $cadena.=utf8_encode($resultado).$detras;
$cadena.="<input type='hidden' value='0' name='datoinserta'
id='datoinsertaid'>";
 }
 print($cadena);
 }








































 }
 else print("Seguridad implementada.");
?> 

 