<?php
 require_once("mbbdd.php");

 class clasealumnos
 {
 private $codigoalumno;

 public function __construct($codigoalumno)
 {
 $this->codigoalumno=$codigoalumno;
 }

 public function __destruct()
 {}

 public function obtener_valornombrecampo($nombrecampo)
 {
 return $this->$nombrecampo;
 } 
 public function seleccionar_alumnos()
 {
 $objDatos=new clasebbdd(); //crea un objeto para conectarse a la base de datos.
 $sql="select * from talumnos order by apellidosalumno ";
 $resultado=$objDatos->seleccionar_datos($sql);
 return $resultado;
 $objDatos->cerrarconexion();
 }

 public function seleccionar_alumnos_codigo($codigoalumno)
 {
 $objDatos=new clasebbdd(); //crea un objeto para conectarse a la base de datos.
 $sql="select * from talumnos where codigoalumno=$codigoalumno order by apellidosalumno ";
 $resultado=$objDatos->seleccionar_datos($sql);
 return $resultado;
 $objDatos->cerrarconexion();
 }








 public function insertar_alumno($nombre,$apellidos,$dni,$direccion)
 {
 $objDatos=new clasebbdd(); //crea un objeto para conectarse a la base de datos.
$sql="insert into talumnos values
(0,'".$nombre."','".$apellidos."','".$dni."','".$direccion."')";
 $resultado=$objDatos->ejecutar_sentencias($sql,"insertar");
 return $resultado;
 $objDatos->cerrarconexion();
 }


 public function actualizar_alumno($codigoalumno, $nombre, $apellidos, $dni, $direccion)
 {
 $objDatos=new clasebbdd(); //crea un objeto para conectarse a la base de datos.


$sql  = sprintf("update talumnos set nombrealumno='%s', apellidosalumno='%s', dnialumno='%s', direccionalumno='%s' where codigoalumno=%d", $nombre, $apellidos, $dni, $direccion, $codigoalumno);



 $resultado=$objDatos->ejecutar_sentencias($sql,"actualizar");
 return $resultado;
 $objDatos->cerrarconexion();
 }







 public function eliminar_alumno($codigoalumno)
 {
 $objDatos=new clasebbdd(); //crea un objeto para conectarse a la base de datos.
$sql=sprintf("delete from talumnos where codigoalumno=%d", $codigoalumno);

 $resultado=$objDatos->ejecutar_sentencias($sql,"eliminar");


 return $resultado;
 $objDatos->cerrarconexion();
 }











 }
?> 