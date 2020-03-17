<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="title" content="titulo1">
<meta name="description" content="descripcion1">
<meta name="keywords" content="palabras1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/principal.css" rel="stylesheet" type="text/css">
<link href="css/mediaqueries.css" rel="stylesheet" type="text/css">
<title>Mi primera Web</title>
<script src="js/jquery-3.4.1.min.js"></script>
<script>

 var imagencargando="<img src='../procesando.gif'>";

 //JQuery
 $(document).ready(function(){
 $("#escondedivseleccionid").click(function(){
 $('#seleccioncapaid').hide(1000);
 });

 $("#seleccionbotonid").click(function(){
 $('#seleccioncapaid').show(1000);
  $('#insercioncapaid').hide(1000);
   $('#eliminacioncapaid').hide(1000);
     $('#actualizacioncapaid').hide(1000);
 });


 $("#escondedivinsercionid").click(function(){
 $('#insercioncapaid').hide(1000);
 });

 $("#insercionbotonid").click(function(){
 $('#insercioncapaid').show(1000);
 $('#eliminacioncapaid').hide(1000);
  $('#actualizacioncapaid').hide(1000);
 });


 $("#escondedivactualizacionid").click(function(){
 $('#actualizacioncapaid').hide(1000);
 });

  $("#actualizacionbotonid").click(function(){
 $('#actualizacioncapaid').show(1000);
  $('#seleccioncapaid').show(1000);
  $('#eliminacioncapaid').hide(1000);
   $('#insercioncapaid').hide(1000);
 });


 $("#escondediveliminacionid").click(function(){
 $('#eliminacioncapaid').hide(1000);
 });


   $("#eliminacionbotonid").click(function(){
 $('#eliminacioncapaid').show(1000);
  $('#seleccioncapaid').show(1000);
 $('#actualizacioncapaid').hide(1000);
 $('#insercioncapaid').hide(1000);
 });


 });


 function claseajax()
 {
 var xmlhttp=false;
 try {
 xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
 } catch (e) {
 try {
 xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
 } catch (E) {
 xmlhttp = false; 
 }
 }
 if (!xmlhttp && typeof XMLHttpRequest!="undefined") {
 xmlhttp = new XMLHttpRequest();
 }
 return xmlhttp;
 }

 function seleccionadatos()
 {
 divDevolucion=document.getElementById("seleccioncapaid");

 ajax=claseajax();
 ajax.open("POST","mvccontroladores/calumnos.php",true);
 ajax.onreadystatechange=function()
 {
 if (ajax.readyState==4)
 {
 divDevolucion.innerHTML=ajax.responseText;
 if(document.getElementById('hayregistrosid').value==0)
 {
 alert("No se han encontrado datos de alumnos.");
 }
 }
 else divDevolucion.innerHTML = imagencargando;
 }
 ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
 ajax.send("operacion2=seleccionar");
 }




 function actualizalosdatos()
 {
 //Habría que verificar que todos los campos están cumplimentados.
 codigo=document.getElementById("codigoid").value;

if (codigo==="") {
  alert("Tiene que poner un código");
} else {



 divDevolucion=document.getElementById("actualizacioncapaid");

 ajax=claseajax();
 ajax.open("POST","mvccontroladores/calumnos.php",true);
 ajax.onreadystatechange=function()
 {
 if (ajax.readyState==4)
 {
 divDevolucion.innerHTML=ajax.responseText;
if(document.getElementById('hayregistrosid').value==0)
 {
 alert("No se han encontrado datos de alumnos.");
  }
 }
 else 
  divDevolucion.innerHTML = imagencargando;
 }
 ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded"); 
 ajax.send("&codigo2="+codigo+"&operacion2=actualizar");
 }
}




 function actualizalosdatoscopiados()
 {
 //Habría que verificar que todos los campos están cumplimentados.
 codigo=document.getElementById("codigoid").value;
 nombre=document.getElementById("nombreid").value;
 apellidos=document.getElementById("apellidosid").value;
 dni=document.getElementById("dniid").value;
 direccion=document.getElementById("direccionid").value;

if (codigo==="" || nombre==="" || apellidos==="" || dni==="" || direccion==="") {
  alert("rellene todos los campos por favor");
actualizaciondatos();
} else {


 divDevolucion=document.getElementById("actualizacioncapaid");

 ajax=claseajax();
 ajax.open("POST","mvccontroladores/calumnos.php",true);
 ajax.onreadystatechange=function()
 {
 if (ajax.readyState==4)
 {
 divDevolucion.innerHTML=ajax.responseText;
 if(document.getElementById('datoinsertaid').value==1)
 {
 alert("Registro actualizado correctamente.");
 }
 }
 else divDevolucion.innerHTML = imagencargando;
 }
 ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded"); 
 ajax.send("&codigo2="+codigo+"&nombre2="+nombre+"&apellidos2="+apellidos+"&dni2="+dni+"&direccion2="+direccion+"&operacion2=insertar2");
 }
}















 function insertadatos()
 {
 divDevolucion=document.getElementById("insercioncapaid");

 ajax=claseajax();
 ajax.open("POST","mvcvistas/valumnos.php",true);
 ajax.onreadystatechange=function()
 {
 if (ajax.readyState==4)
 {
 divDevolucion.innerHTML=ajax.responseText;
 document.getElementById("nombreid").focus();
 }
 else divDevolucion.innerHTML = imagencargando;
 }
 ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
 ajax.send("operacion2=vista");
 }

 function insertalosdatos()
 {
 //Habría que verificar que todos los campos están cumplimentados.

 nombre=document.getElementById("nombreid").value;
 apellidos=document.getElementById("apellidosid").value;
 dni=document.getElementById("dniid").value;
 direccion=document.getElementById("direccionid").value;


if (nombre==="" || apellidos==="" || dni==="" || direccion==="") {
  alert("rellene todos los campos por favor");

} else {


 divDevolucion=document.getElementById("insercioncapaid");

 ajax=claseajax();
 ajax.open("POST","mvccontroladores/calumnos.php",true);
 ajax.onreadystatechange=function()
 {
 if (ajax.readyState==4)
 {
 divDevolucion.innerHTML=ajax.responseText;
 if(document.getElementById('datoinsertaid').value==1)
 {
 alert("Registro insertado correctamente.");
 }
 }
 else divDevolucion.innerHTML = imagencargando;
 }
 ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded"); 
 ajax.send("&nombre2="+nombre+"&apellidos2="+apellidos+"&dni2="+dni+"&direccion2="+direccion+"&operacion2=insertar");
 }
}


 function borralosdatos()
 {
 //Habría que verificar que todos los campos están cumplimentados.
 codigo=document.getElementById("codigoid").value;
 divDevolucion=document.getElementById("eliminacioncapaid");
 if (codigo==="") {
  alert("Tiene que poner un código");
 }else {

 ajax=claseajax();
 ajax.open("POST","mvccontroladores/calumnos.php",true);
 ajax.onreadystatechange=function()
 {
 if (ajax.readyState==4)
 {
 divDevolucion.innerHTML=ajax.responseText;
 if(document.getElementById('datoinsertaid').value==1)
 {
  alert("Registro borrado correctamente.");
 }
else
  alert("No se ha podido realizar el borrado.");
//  divDevolucion.innerHTML = imagencargando;
 
 }
 //alert("No se ha podido realizar el borrado.");
}

 
 ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded"); 
 ajax.send("&codigo2="+codigo+"&operacion2=eliminar");
 }

}






 function actualizaciondatos()
 {
 divDevolucion=document.getElementById("actualizacioncapaid");

 ajax=claseajax();
 ajax.open("POST","mvcvistas/valumnosactualizacion.php",true);
 ajax.onreadystatechange=function()
 {
 if (ajax.readyState==4)
 {
 divDevolucion.innerHTML=ajax.responseText;
 document.getElementById("codigoid").focus();
 }
 else divDevolucion.innerHTML = imagencargando;
 }
 ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
 ajax.send("operacion2=vista");
 }





 function eliminaciondatos()
 {
 divDevolucion=document.getElementById("eliminacioncapaid");

 ajax=claseajax();
 ajax.open("POST","mvcvistas/valumnoseliminacion.php",true);
 ajax.onreadystatechange=function()
 {
 if (ajax.readyState==4)
 {
 divDevolucion.innerHTML=ajax.responseText;
 document.getElementById("codigoid").focus();
 }
 else divDevolucion.innerHTML = imagencargando;
 }
 ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
 ajax.send("operacion2=vista");
 }




















</script>
</head>
<body style="font-family:Verdana;">
<div style="background-color:#f1f1f1;padding:15px;">
 <h1>Acceso a Bases de datos</h1>
 <h3>Modelo - Vista - Controlador (MVC)</h3>
</div>
<div style="overflow:auto">
 <div class="menu">
 <div class="menuitem">Selección de datos:
<input type="button" name="seleccionboton" id="seleccionbotonid" value="Selección"
onclick="seleccionadatos()"/>

<input type="button" name="escondedivseleccion" id="escondedivseleccionid" value="X"/>
 </div>

 <div class="menuitem">Inserción de datos:
<input type="button" name="insercionboton" id="insercionbotonid" value="Inserción"
onclick="insertadatos()"/>

<input type="button" name="escondedivinsercion" id="escondedivinsercionid" value="X"/>
 </div>

 <div class="menuitem">Actualización de datos:<br>


<input type="button" name="actualizacionboton" id="actualizacionbotonid" value="Actualización"
onclick="actualizaciondatos()"/>

<input type="button" name="escondedivactualizacion" id="escondedivactualizacionid" value="X"/>


 </div>









 <div class="menuitem">Eliminación de datos<br>


<input type="button" name="eliminacionboton" id="eliminacionbotonid" value="Eliminación"
onclick="eliminaciondatos()"/>

<input type="button" name="escondediveliminacion" id="escondediveliminacionid" value="X"/>
</div>



 </div>
 <div class="main">
 <h2>Operación a realizar</h2>
 <p>Clic en el botón del menú para efectuar la operación.</p>

 <div class="main" id="seleccioncapaid"></div>
 <div class="main" id="insercioncapaid"></div>
 <div class="main" id="actualizacioncapaid"></div>
 <div class="main" id="eliminacioncapaid"></div>

 </div>
 <div class="right">
 <h2>¿Qué es?</h2>
<p>Permite realizar operaciones de selección, inserción, actualización y eliminación de la base
de datos con AJAX.</p>
 <h2>¿Dónde?</h2>
 <p>En la base de datos de educación.</p>
 <h2>¿Precio?</h2>
 <p>Aplicación gratuita.</p>
 </div>
</div>
</body>
</html> 

