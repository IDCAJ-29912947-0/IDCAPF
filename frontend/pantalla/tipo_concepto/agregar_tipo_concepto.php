<?php
require("../../../backend/clase/tipo_concepto.class.php");
require("../../../backend/clase/permiso.class.php");

$obj=new tipo_concepto;
$objPermiso=new permiso;

$permiso=$objPermiso->validar_acceso($opcion=1,$fky_usuario=1,$token=md5("12345"));
$acceso=$objPermiso->extraer_dato($permiso);

if($acceso["est_per"]=="A")
{

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Agregar Tipo de Concepto</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../bootstrap-4.0/css/bootstrap.min.css">
</head>
<body>

<form action="../../../backend/controlador/tipo_concepto.php" method="POST">

<div class="container">
	<div class="row justify-content-center">
	<div class="col-10 text-center ">

	 <div class="row bg-primary text-white">
	 	 <div class="col-12 text-center">
	  	<h3>Datos del Tipo de Concepto</h3>
	 	 </div>
	  </div>


	  <div class="row mt-2 bg-light">

		<div class="col-md-3 col-12 align-self-center text-left">
		     <label for="">Nombre:</label>
		</div>
		<div class="col-md-8 col-12">
		    <input type="text" name="nom_tip_con" id="nom_tip_con" required="required" maxlength="50" class="form-control" placeholder="Nombre del Tipo de Concepto" onkeyup="return solo_letras();">
		</div>

	  </div>

	  <div class="row mt-2 bg-light">

		<div class="col-md-3 col-12 align-self-center text-left">
		     <label for="">¿Suma o Resta?:</label>
		</div>
		<div class="col-md-8 col-12">
		   <select name="sig_tip_con" id="sig_tip_con" class="form-control">
		   	<option value="X">Seleccione...</option>
		   	<option value="+">Suma</option>
		   	<option value="-">Resta</option>
		   </select>
		</div>

	  </div>


	  <div class="row mt-2 bg-light text-left">
	     <div class="col-md-3 col-12 align-self-center">
		     <label for="">Estatus:</label>
		</div>
	    <div class="col-md-4 col-12">
		<select name="est_tip_con" id="est_tip_con" class="form-control">
			<option value="A" selected="">Activa</option>
			<option value="I">Inactiva</option>	
		</select>
		</div>
	   </div>


	  <div class="row mt-2 bg-light">
	  	 <div class="col-12  text-center">
		     <input type="submit" class="btn btn-primary btn-lg" value="Guardar Tipo de Concepto">
		</div>
	   </div>	  	  
    </div>
  </div>
</div> <!-- Fin Container -->
<input type="hidden" name="accion" id="accion" value="agregar">			
</form>	
</body>
</html>

<?php
}else{
	$obj->mensaje("danger","No tienes permiso de accesar a esta p&aacute;gina");
}
?>