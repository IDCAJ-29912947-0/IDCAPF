<?php
require("../../../backend/clase/nomina.class.php");
require("../../../backend/clase/permiso.class.php");

$obj=new nomina;
$objPermiso=new permiso;


$permiso=$objPermiso->validar_acceso($opcion=1,$fky_usuario=1,$token=md5("12345"));
$acceso=$objPermiso->extraer_dato($permiso);

if($acceso["est_per"]=="A")
{

foreach($_REQUEST as $nombre_campo => $valor){
  	$obj->asignar_valor($nombre_campo,$valor);
} 

$resultado=$obj->filtrar($obj->cod_nom,$des_nom="",$est_nom="");
$datos=$obj->extraer_dato($resultado);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Modificar Nómina</title>
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
		    <input type="text" name="des_nom" id="des_nom" required="required" maxlength="80" class="form-control text-capitalize" placeholder="Nombre del Nómina" value="<?php echo $datos['des_nom']; ?>" pattern="[a-zA-Z0-9 ]+" title="Solo valores Alfa-Númericos" required="">
		</div>

	  </div> 

	  <div class="row mt-2 bg-light">

		<div class="col-md-4 col-12 text-left">
		     <label for="">Fecha de Inicio:</label>
		</div>
		<div class="col-md-8 col-12">
		    <input type="date" name="ini_nom" id="ini_nom" required="required" class="form-control" value="<?php echo $datos['ini_nom']; ?>" required="">
		</div>

	  </div>

	  <div class="row mt-2 bg-light">

		<div class="col-md-4 col-12 text-left">
		     <label for="">Fecha de Finalización:</label>
		</div>
		<div class="col-md-8 col-12">
		    <input type="date" name="fin_nom" id="fin_nom" required="required" class="form-control" value="<?php echo $datos['fin_nom']; ?>" required="">
		</div>

	  </div>

	  <div class="row mt-2 bg-light">

		<div class="col-md-4 col-12 text-left">
		     <label for="">Monto Total:</label>
		</div>
		<div class="col-md-8 col-12">
		    <input type="text" name="tot_nom" id="tot_nom" required="required" class="form-control" pattern="[0-9.]+" title="Solo valores Númericos y caracteres especiales cómo ( . )" value="<?php echo $datos['tot_nom']; ?>" readonly>
		</div>

	  </div>

	  <div class="row mt-2 bg-light">

		<div class="col-md-4 col-12 text-left">
		     <label for="">Total de Asignaciones:</label>
		</div>
		<div class="col-md-8 col-12">
		    <input type="text" name="tot_asi" id="tot_asi" required="required" class="form-control" pattern="[0-9.]+" title="Solo valores Númericos y caracteres especiales cómo ( . )" value="<?php echo $datos['tot_asi']; ?>" readonly>
		</div>

	  </div>

	  <div class="row mt-2 bg-light">

		<div class="col-md-4 col-12 text-left">
		     <label for="">Total de Deducciones:</label>
		</div>
		<div class="col-md-8 col-12">
		    <input type="text" name="tot_ded" id="tot_ded" required="required" class="form-control" pattern="[0-9.]+" title="Solo valores Númericos y caracteres especiales cómo ( . )" value="<?php echo $datos['tot_ded']; ?>" readonly>
		</div>

	  </div>
<<<<<<< HEAD


=======
	  
>>>>>>> 7c574f57cb41a9a1b61d8657d9fa45d011f507ec
	  <div class="row mt-2 bg-light">
	  	 <div class="col-12  text-center">
		     <input type="submit" class="btn btn-primary btn-lg" value="Modificar Nómina">
		</div>
	   </div>	
	  
	   </div>
	 </div>  	  
	</div> <!-- Fin Container -->
	<input type="hidden" name="accion" id="accion" value="modificar">
	<input type="hidden" name="cod_nom" id="cod_nom" value="<?php echo $datos['cod_nom']; ?>" >			
</form>	
</body>
</html>

<?php
}else{
	$obj->mensaje("danger","No tienes permiso de accesar a esta p&aacute;gina");
}
?>