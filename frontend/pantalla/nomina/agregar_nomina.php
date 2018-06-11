<?php
require("../../../backend/clase/nomina.class.php");
require("../../../backend/clase/permiso.class.php");

$obj=new nomina;
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
	<title>Agregar Nómina</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../bootstrap-4.0/css/bootstrap.min.css">
</head>
<body>

<form action="../../../backend/controlador/nomina.php" method="POST">

<div class="container">
	<div class="row justify-content-center">
	<div class="col-12 text-center ">

	 <div class="row bg-primary text-white">
	 	 <div class="col-12 text-center">
	  	<h3>Datos de la Nómina</h3>
	 	 </div>
	  </div>


	  <div class="row mt-2 bg-light">

		<div class="col-md-4 col-12 text-left">
		     <label for="">Nombre:</label>
		</div>
		<div class="col-md-8 col-12">
		    <input type="text" name="des_nom" id="des_nom" required="required" maxlength="80" class="form-control" placeholder="Nombre del Nómina" pattern="[a-zA-Z0-9 ]+" title="Solo valores Alfa-Númericos" required="">
		</div>

	  </div>


	  <div class="row mt-2 bg-light">

		<div class="col-md-4 col-12 text-left">
		     <label for="">Fecha de Inicio:</label>
		</div>
		<div class="col-md-8 col-12">
		    <input type="date" name="ini_nom" id="ini_nom" required="required" class="form-control" required="">
		</div>

	  </div>


	  <div class="row mt-2 bg-light">

		<div class="col-md-4 col-12 text-left">
		     <label for="">Fecha de Finalización:</label>
		</div>
		<div class="col-md-8 col-12">
		    <input type="date" name="fin_nom" id="fin_nom" required="required" class="form-control">
		</div>

	  </div>



	  <div class="row mt-2 bg-light">
	     <div class="col-md-4 col-12 text-left">
		     <label for="">Estatus:</label>
		</div>
	    <div class="col-md-8 col-12">
		<select name="est_nom" id="est_nom" class="form-control" required="">
			<option value="">Seleccione...</option>
			<option value="G">En Proceso</option>
			<option value="P" disabled>Pagada</option>	
		</select>
		</div>
	   </div>


	  <div class="row mt-2 bg-light">
	  	 <div class="col-12  text-center">
		     <input type="submit" class="btn btn-primary btn-lg" value="Continuar">
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