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
	<title>Ver area</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../bootstrap-4.0/css/bootstrap.min.css">
</head>
<body>

<form action="../../../backend/controlador/area.php" method="POST">

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
		    <input type="text" name="des_nom" id="des_nom" maxlength="80" class="form-control text-capitalize" placeholder="Nombre del Nómina" value="<?php echo $datos['des_nom']; ?>" pattern="[a-zA-Z0-9 ]+" title="Solo valores Alfa-Númericos" readonly>
		</div>

	  </div> 

	  <div class="row mt-2 bg-light">

		<div class="col-md-4 col-12 text-left">
		     <label for="">Fecha de Inicio:</label>
		</div>
		<div class="col-md-8 col-12">
		    <input type="date" name="ini_nom" id="ini_nom" class="form-control" value="<?php echo $datos['ini_nom']; ?>" readonly>
		</div>

	  </div>

	  <div class="row mt-2 bg-light">

		<div class="col-md-4 col-12 text-left">
		     <label for="">Fecha de Finalización:</label>
		</div>
		<div class="col-md-8 col-12">
		    <input type="date" name="fin_nom" id="fin_nom" required="required" class="form-control" value="<?php echo $datos['fin_nom']; ?>" readonly>
		</div>

	  </div>

	  <div class="row mt-2 bg-light">

		<div class="col-md-4 col-12 text-left">
		     <label for="">Monto Total:</label>
		</div>
		<div class="col-md-8 col-12">
		    <input type="text" name="tot_nom" id="tot_nom" readonly class="form-control" pattern="[0-9.]+" title="Solo valores Númericos y caracteres especiales cómo ( . )" value="<?php echo $datos['tot_nom']; ?>">
		</div>

	  </div>

	  <div class="row mt-2 bg-light">

		<div class="col-md-4 col-12 text-left">
		     <label for="">Total de Asignaciones:</label>
		</div>
		<div class="col-md-8 col-12">
		    <input type="text" name="tot_asi" id="tot_asi" readonly class="form-control" pattern="[0-9.]+" title="Solo valores Númericos y caracteres especiales cómo ( . )" value="<?php echo $datos['tot_asi']; ?>">
		</div>

	  </div>

	  <div class="row mt-2 bg-light">

		<div class="col-md-4 col-12 text-left">
		     <label for="">Total de Deducciones:</label>
		</div>
		<div class="col-md-8 col-12">
		    <input type="text" name="tot_ded" id="tot_ded" readonly class="form-control" pattern="[0-9.]+" title="Solo valores Númericos y caracteres especiales cómo ( . )" value="<?php echo $datos['tot_ded']; ?>">
		</div>

	  </div>


	  <div class="row mt-2 bg-light">
	     <div class="col-md-4 col-12 text-left">
		     <label for="">Estatus:</label>
		</div>
	  <div class="col-md-8 col-12">
	     <select name='est_nom' id='est_nom' class='form-control' readonly>
		 <?php
		 $selected = ($datos['est_nom']=='G') ? "selected":"";
		 echo "<option value='G' $selected>En Proceso</option>";
		 $selected = ($datos['est_nom']=='P') ? "selected":"";
		 echo "<option value='P' $selected>Pagada</option>";
		 ?>
		</select>
	   </div>
	  </div>

  	 </div>
   </div>
  </div> <!-- Fin Container -->
</form>	
</body>
</html>

<?php
}else{
	$obj->mensaje("danger","No tienes permiso de accesar a esta p&aacute;gina");
}
?>